<?php

namespace App\Http\Controllers\Api;

use App\Components\Yzy;
use App\Http\Controllers\Controller;
use App\Http\Models\Coupon;
use App\Http\Models\CouponLog;
use App\Http\Models\Goods;
use App\Http\Models\GoodsLabel;
use App\Http\Models\Order;
use App\Http\Models\Payment;
use App\Http\Models\PaymentCallback;
use App\Http\Models\ReferralLog;
use App\Http\Models\User;
use App\Http\Models\UserLabel;
use Illuminate\Http\Request;
use Log;
use DB;
use Mockery\Exception;

/**
 * 有赞云支付
 * Class YzyController
 *
 * @package App\Http\Controllers
 */
class YzyController extends Controller
{

    // 接收GET请求
    public function index(Request $request)
    {
        \Log::info("YZY-GET:" . var_export($request->all()));
    }

    // 接收POST请求
    public function store(Request $request)
    {
        \Log::info("YZY-POST:" . var_export($request->all()));

        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        if (!$data) {
            Log::error('YZY-POST:回调数据无法解析，可能是非法请求');
            exit();
        }

        // 判断消息是否合法
        $msg = $data['msg'];
        $sign_string = $this->config['youzan_client_id'] . "" . $msg . "" . $this->config['youzan_client_secret'];
        $sign = md5($sign_string);
        if ($sign != $data['sign']) {
            Log::error('YZY-POST:回调数据签名错误，可能是非法请求');
            exit();
        } else {
            // 返回请求成功标识给有赞
            var_dump(["code" => 0, "msg" => "success"]);
        }

        // 先写入回调日志
        $this->callbackLog($data['client_id'], $data['id'], $data['kdt_id'], array_key_exists('kdt_name',$data)?$data['kdt_name']:'店铺名为空', $data['mode'], $data['msg'], $data['sendCount'], $data['sign'], $data['status'], $data['test'], $data['type'], $data['version']);

        // msg内容经过 urlencode 编码，进行解码
        $msg = json_decode(urldecode($msg), true);

        if ($data['type'] == 'TRADE_ORDER_STATE') {
            // 读取订单信息
            $yzy = new Yzy();
            $result = $yzy->getTradeByTid($msg['tid']);
            if (isset($result['error_response'])) {
                Log::error('【有赞云】回调订单信息错误：' . $result['error_response']['msg']);
                exit();
            }

            $payment = Payment::query()->where('qr_id', $result['response']['trade']['qr_id'])->first();
            if (!$payment) {
                Log::error('【有赞云】回调订单不存在');
                exit();
            }

            // 等待支付
            if ($data['status'] == 'WAIT_BUYER_PAY') {
                Log::info('【有赞云】等待支付' . urldecode($data['msg']));
                exit();
            }

            // 交易成功
            if ($data['status'] == 'TRADE_SUCCESS') {
                if ($payment->status != '0') {
                    Log::error('【有赞云】回调订单状态不正确');
                    exit();
                }

                // 处理订单
                DB::beginTransaction();
                try {
                    // 更新支付单
                    $payment->pay_way = $msg['pay_type'] == '微信支付' ? 1 : 2; // 1-微信、2-支付宝
                    $payment->status = 1;
                    $payment->save();

                    // 更新订单
                    $order = Order::query()->with(['user'])->where('oid', $payment->oid)->first();
                    $result = Order::updateOrderStatusUnit($order->oid,2);
                    if($result['status'] == 'fail'){
                        throw new Exception($result['message']);
                    }
                    $user = User::query()->find($order->user_id);
                    $result = User::updateUserStatus($user->id);
                    if ($result['status'] == 'fail'){
                        throw new Exception($result['message']);
                    }

                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                    Log::error('【有赞云】更新支付单和订单异常：' . $e->getMessage());
                }
                exit();
            }

            // 超时自动关闭订单
            if ($data['status'] == 'TRADE_CLOSED') {
                if ($payment->status != 0) {
                    Log::info('【有赞云】自动关闭支付单异常，本地支付单状态不正确');
                    exit();
                }

                $order = Order::query()->where('oid', $payment->oid)->first();
                if ($order->status != 0) {
                    Log::info('【有赞云】自动关闭支付单异常，本地订单状态不正确');
                    exit();
                }

                DB::beginTransaction();
                try {
                    // 关闭支付单
                    $payment->status = -1;
                    $payment->save();

                    // 关闭订单
                    $result = Order::updateOrderStatusUnit($order->oid,-1);
                    if ($result['status'] == 'fail'){
                        throw new Exception($result['message']);
                    }
                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                    Log::error('【有赞云】更新支付单和订单异常'.$e->getMessage());
                }

                exit();
            }
        }

        if ($data['type'] == 'TRADE') {
            if ($data['status'] == 'WAIT_BUYER_PAY') {
                Log::info('【有赞云】等待支付' . urldecode($data['msg']));
                exit();
            }

            if ($data['status'] == 'TRADE_SUCCESS') {
                Log::info('【有赞云】支付成功' . urldecode($data['msg']));
                exit();
            }

            // 用户已签收
            if ($data['status'] == 'TRADE_BUYER_SIGNED') {
                Log::info('【有赞云】用户已签收' . urldecode($data['msg']));
                exit();
            }

            if ($data['status'] == 'TRADE_CLOSED') {
                Log::info('【有赞云】超时未支付自动支付' . urldecode($data['msg']));
                exit();
            }
        }

        exit();
    }

    public function show(Request $request)
    {
        exit('show');
    }

    // 写入回调请求日志
    private function callbackLog($client_id, $yz_id, $kdt_id, $kdt_name, $mode, $msg, $sendCount, $sign, $status, $test, $type, $version)
    {
        $paymentCallback = new PaymentCallback();
        $paymentCallback->client_id = $client_id;
        $paymentCallback->yz_id = $yz_id;
        $paymentCallback->kdt_id = $kdt_id;
        $paymentCallback->kdt_name = $kdt_name;
        $paymentCallback->mode = $mode;
        $paymentCallback->msg = urldecode($msg);
        $paymentCallback->sendCount = $sendCount;
        $paymentCallback->sign = $sign;
        $paymentCallback->status = $status;
        $paymentCallback->test = $test;
        $paymentCallback->type = $type;
        $paymentCallback->version = $version;
        $paymentCallback->save();

        return $paymentCallback->id;
    }
}

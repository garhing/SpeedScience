<?php
namespace App\Http\Controllers;

use App\Components\Yzy;
use App\Http\Models\Coupon;
use App\Http\Models\Goods;
use App\Http\Models\Order;
use App\Http\Models\Payment;
use App\Http\Models\PaymentCallback;
use App\Http\Models\User;
use Illuminate\Http\Request;
use Response;
use Redirect;
use Log;
use DB;

class PaymentController extends Controller
{

    // 创建支付单
    public function create(Request $request)
    {
        $goods_id = intval($request->get('goods_id'));
        $coupon_sn = $request->get('coupon_sn');
        $user = $request->session()->get('user');
        $coupon_id = -1;

        $goods = Goods::query()->where('id', $goods_id)->where('status', 1)->first();
        if (!$goods) {
            return $this->json(['status' => 'fail', 'data' => '', 'message' => '创建支付单失败：商品或服务已下架']);
        }

        // 判断是否开启有赞云支付
        if (!$this->config['is_youzan']) {
            return $this->json(['status' => 'fail', 'data' => '', 'message' => '创建支付单失败：系统并未开启在线支付功能']);
        }

        // 判断是否存在同个商品的未支付订单
        $existsOrder = Order::query()->where('goods_id', $goods_id)->where('status', 0)->where('user_id', $user['id'])->first();
        if ($existsOrder) {
            return $this->json(['status' => 'fail', 'data' => '', 'message' => '创建支付单失败：尚有未支付的订单，请先去支付']);
        }

        $result = User::addOrder($user['id'],$goods_id, $coupon_sn,0,2);
        if($result['status']=='fail'){
            return $this->json($result);
        }
        $result['data'] = $result['data']['sn'];
        $result['message'] = '订单创建成功，正在转到付款页面，请稍后';
        return $this->json($result);
    }

    // 支付单详情
    public function detail(Request $request, $sn)
    {
        if (empty($sn)) {
            return Redirect::to('user/goodsList');
        }

        $user = $request->session()->get('user');

        $payment = Payment::query()->with(['order', 'order.goods'])->where('sn', $sn)->where('user_id', $user['id'])->first();
        if (!$payment) {
            return Redirect::to('user/goodsList');
        }

        $order = Order::query()->where('oid', $payment->oid)->first();
        if (!$order) {
            $request->session()->flash('errorMsg', '订单不存在');

            return $this->view('payment/' . $sn);
        }

        $view['payment'] = $payment;

        return $this->view('payment/detail', $view);
    }

    // 获取订单支付状态
    public function getStatus(Request $request)
    {
        $sn = $request->get('sn');

        if (empty($sn)) {
            return $this->json(['status' => 'fail', 'data' => '', 'message' => '请求失败']);
        }

        $user = $request->session()->get('user');
        $payment = Payment::query()->where('sn', $sn)->where('user_id', $user['id'])->first();
        if (!$payment) {
            return $this->json(['status' => 'fail', 'data' => '', 'message' => '支付失败']);
        }

        if ($payment->status) {
            return $this->json(['status' => 'success', 'data' => '', 'message' => '支付成功']);
        } else if ($payment->status < 0) {
            return $this->json(['status' => 'fail', 'data' => '', 'message' => '支付失败']);
        } else {
            return $this->json(['status' => 'fail', 'data' => '', 'message' => '等待支付']);
        }
    }

    // 有赞云回调日志
    public function callbackList(Request $request)
    {
        $status = $request->get('status', 0);

        $query = PaymentCallback::query();

        if ($status) {
            $query->where('status', $status);
        }

        $view['list'] = $query->orderBy('id', 'desc')->paginate(10);

        return $this->view('payment/callbackList', $view);
    }
}
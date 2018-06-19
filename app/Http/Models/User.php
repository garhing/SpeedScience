<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;
use App\Components\Yzy;
/**
 * 用户信息
 * Class User
 *
 * @package App\Http\Models
 */
class User extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';

    function payment()
    {
        return $this->hasMany(Payment::class, 'user_id', 'id');
    }

    function label()
    {
        return $this->hasMany(UserLabel::class, 'user_id', 'id');
    }

    function getBalanceAttribute($value)
    {
        return $value / 100;
    }

    function setBalanceAttribute($value)
    {
        return $this->attributes['balance'] = $value * 100;
    }

    public static function getUserLabels($uid)
    {
        $oids = Order::query()->where('uid', $uid)->where('status', 2)->pluck('oid');
        return OrderLabel::query()->whereIn('oid', $oids)->pluck('label_id');
    }


    // 添加一个商品,并触发一系列操作
    /**
     * @param $uid 给哪个用户加上
     * @param $goods_id 商品ID
     * @param null $coupon_id 优惠码id
     * @param $amount 实际支付金额
     * @param int $status 设定订单状态, 仅支持0，1，2
     * @param int $pay_way 支付方式：0-系统支付、1-余额支付、2-有赞云支付
     * @return array 返回添加结果
     */
    public static function addOrder($uid, $goods_id, $coupon_sn=-1, $status = 0, $pay_way = 0)
    {

        $user = User::query()->find($uid);
        $coupon_id = 0;
        DB::beginTransaction();
        try {

            // 检测商品可用状态
            $result = Goods::isAvaliable($goods_id);
            if($result['status'] == 'fail'){
                throw new Exception($result['message']);
            }

            $goods = Goods::query()->find($goods_id);
            // 如果使用优惠券
            if ($coupon_sn!=-1 && !empty($coupon_sn)) {
                $result = Coupon::isAvaliable2($coupon_sn,$goods_id,$uid);
                if($result['status'] == 'fail'){
                    return $result;
                }
                $coupon = Coupon::query()->where('sn',$coupon_sn)->first();
                // 计算实际应支付总价
                $amount = $coupon->type == 2 ? $goods->price * $coupon->discount / 10 : $goods->price - $coupon->amount;
                $amount = $amount > 0 ? $amount : 0;
                $coupon_id = $coupon->id;
            } else {
                $amount = $goods->price;
            }

            // 如果最后总价格为0，则不允许在线支付创建支付单
            if ($amount <= 0 && $pay_way == 2) {
                return ['status' => 'fail', 'data' => '', 'message' => '创建支付单失败：合计价格为0，无需使用在线支付'];
            }

            // 验证账号余额是否充足
            if ($pay_way == 1 ) {
                if($user->balance < $amount)
                return['status' => 'fail', 'data' => '', 'message' => '支付失败：您的余额不足，请先充值'];
            }

            $sn = makeRandStr(12); // 有赞云随机码

            //***************************************************************************************
            // 生成订单
            $order = new Order();
            $order->order_sn = date('ymdHis') . mt_rand(100000, 999999);
            $order->user_id = $uid;
            $order->goods_id = $goods->id;
            $order->coupon_id = $coupon_id;
            $order->origin_amount = $goods->price;
            $order->amount = $amount;
            $order->expire_at = null; //默认为空，有订单状态升级接口统一升级
            $order->is_expire = 0;
            $order->pay_way = $pay_way;
            $order->status = -1; //默认为-1，关闭状态有订单状态升级接口统一升级
            $order->save();

            //***************************************************************************************************
            //存入订单标签，用于节点显示
            // ***写入用户标签*** 不再使用user_label这个表
            // 修改为******写订单标签****
            $goodsLabels = GoodsLabel::query()->where('goods_id', $goods_id)->pluck('label_id')->toArray();
            foreach ($goodsLabels as $vo) {
                $obj = new OrderLabel();
                $obj->oid = $order->oid;
                $obj->label_id = $vo;
                $obj->save();
            }

            //***************************************************************************************************
            // 如果是有赞云支付的话，这一步仅创建订单
            if($pay_way ==2){

                // 生成支付单
                $yzy = new Yzy();
                $result = $yzy->createQrCode($goods->name, $amount * 100, $order->order_sn);
                if (isset($result['error_response'])) {
                    Log::error('【有赞云】创建二维码失败：' . $result['error_response']['msg']);
                    throw new \Exception($result['error_response']['msg']);
                }

                $payment = new Payment();
                $payment->sn = $sn;
                $payment->user_id = $user['id'];
                $payment->oid = $order->oid;
                $payment->order_sn = $order->order_sn;
                $payment->pay_way = 2;
                $payment->amount = $amount;
                $payment->qr_id = $result['response']['qr_id'];
                $payment->qr_url = $result['response']['qr_url'];
                $payment->qr_code = $result['response']['qr_code'];
                $payment->qr_local_url = User::base64ImageSaver($result['response']['qr_code']);
                $payment->status = 0;
                $payment->save();

            }

            // 升级订单状态
            $result = Order::updateOrderStatusUnit($order->oid,$status);

            if ($result['status'] == 'fail'){
                throw new Exception($result['message']);
            }

            // 更新用户状态
            //1、通过用户订单得到商品总流量并更新
            //2、通过用户订单得到用户有效期并更新
            //3、根据已经使用的流量和顺序，失效一些订单
            //4、账号重置日期
            $result = User::updateUserStatus($user->id);
            if ($result['status'] == 'fail'){
                throw new Exception($result['message']);
            }
            DB::commit();
            return ['status' => 'success', 'data' => ['oid'=>$order->order_sn,'sn'=>$sn], 'message' => '支付成功'];
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('支付订单失败：' . $e->getMessage());
            return ['status' => 'fail', 'data' => '', 'message' => '支付失败：' . $e->getMessage()];
        }
    }

    // 系统配置
    public static function systemConfig()
    {
        $config = Config::query()->get();
        $data = [];
        foreach ($config as $vo) {
            $data[$vo->name] = $vo->value;
        }

        return $data;
    }

    //用于前端显示
    public function userExpireTime()
    {
        $result = $this->attributes['expire_time'];
        return strtotime($result)< time() ? '已过期' : $result;
    }

    //用于前端显示
    public static function getUserExpireTime($uid)
    {
        $result = Order::getUserExpireTime($uid);
        return strtotime($result)< time() ? '已过期' : $result;
    }

    public function emptyUserTraffic2(){

        User::query()->where('id',$this->attributes['id'])->update(['u'=>0,'d'=>0]);
    }

    public function emptyUserTraffic($uid){

        User::query()->where('id',$uid)->update(['u'=>0,'d'=>0]);
    }

    public function resetUserTraffic2(){
        User::deactiveUserOrder($this->attributes['id']);
        User::query()->where('id',$this->attributes['id'])->update(['u'=>0,'d'=>0]);
    }

    public static function resetUserTraffic($uid){
        User::deactiveUserOrder($uid);
        User::query()->where('id',$uid)->update(['u'=>0,'d'=>0,]);
    }

    /**
     * 适用于订单状态发生变化时使用
     *
     * 根据用户ID和对应的订单，更新用户状态
     * 1、通过用户订单得到商品总流量并更新
     * 2、通过用户订单得到用户有效期并更新
     * 3、账号重置日期
     * 4、根据已经使用的流量和顺序，失效一些订单，防止失效的订单也能使用非限定服务器流量
     * @param $uid
     */
    static function updateUserStatus($uid)
    {
        DB::beginTransaction();
        try {
            $transfer_enable = Order::getUserTransferEnable($uid);
            $expire_time = Order::getUserExpireTime($uid);
            $next_reset_time = Order::getUserResetDay($uid);
            $status = 1;
            if(strtotime($expire_time)<time()){
                $status = -1;
            }
            User::query()->where('id', $uid)->update(['status'=>$status,'transfer_enable' => $transfer_enable, 'expire_time' => $expire_time, 'traffic_reset_day' => $next_reset_time]);
            DB::commit();
            return ['status' => 'success', 'data' => '', 'message' => '操作成功'];
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return ['status' => 'fail', 'data' => '', 'message' => '操作失败' . $e->getMessage()];
        }

    }

    // 失效用户订单, 防止失效的订单也能使用非限定服务器流量 ，用于自动化任务
    // 同时更新用户状态，所以不需要再次更新用户状态
    static function deactiveUserOrder($uid,$update_user_status=true)
    {
        DB::beginTransaction();
        try {
            $user = User::query()->find($uid);

            // 查询出 '正在使用' 的订单并排序
            $orders = Order::query()
                ->with('goods')
                ->where(['user_id' => $uid, 'status' => 2,'is_expire' => 0])->get()->toArray();

            //按照优先级=》激活时间排序
            uasort($orders, function ($a, $b) {

                if ($a['goods']['order'] > $b['goods']['order']) {
                    return -1;
                }
                if ($a['goods']['order'] < $b['goods']['order']) {
                    return 1;
                }
                $a_active = strtotime("-" . $a['goods']['days'] . " days", strtotime($a['expire_at']));
                $b_active = strtotime("-" . $b['goods']['days'] . " days", strtotime($b['expire_at']));
                return $a_active - $b_active;
            });

            // 查询出已使用流量
            $used = $user->d + $user->u;

            $flag = false;
            // 确定失效订单
            foreach ($orders as $order) {
                $goods_traffice = $order['goods']['traffic'] * 1048576;
                if ($used > $goods_traffice) {
                    $used -= $goods_traffice;

                    $result = Order::updateOrderStatusUnit($order['oid'], 3);
                    if ($result['status'] == 'fail'){
                        throw new Exception($result['message']);
                    }
                    User::query()->where('id', $user->id)->decrement('d', $goods_traffice);
                    $flag = true;
                }
            }
            //失效订单后，更新用户状态
            if ($flag && $update_user_status) {
                $result = User::updateUserStatus($uid);
                if ($result['status'] == 'fail'){
                    throw new Exception($result['message']);
                }
            }
            DB::commit();
            return ['status' => 'success', 'data' => '', 'message' => '操作成功'];
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return ['status' => 'fail', 'data' => '', 'message' => '操作失败' . $e->getMessage()];
        }


    }



    // 将Base64图片转换为本地图片并保存
    static function base64ImageSaver($base64_image_content)
    {
        //匹配出图片的格式
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)) {
            $type = $result[2];

            $directory = date('Ymd');
            $path = '/assets/images/qrcode/' . $directory . '/';
            if (!file_exists(public_path($path))) { //检查是否有该文件夹，如果没有就创建，并给予最高权限
                mkdir(public_path($path), 0700, true);
            }

            $fileName = makeRandStr(18, true) . ".{$type}";
            if (file_put_contents(public_path($path . $fileName), base64_decode(str_replace($result[1], '', $base64_image_content)))) {
                return $path . $fileName;
            } else {
                return '';
            }
        } else {
            return '';
        }
    }
}
<?php

namespace App\Http\Models;

use function GuzzleHttp\Psr7\str;
use Illuminate\Database\Eloquent\Model;
use Mockery\Exception;
use DB;

/**
 * 订单
 * Class Order
 *
 * @package App\Http\Models
 */
class Order extends Model
{
    protected $table = 'order';
    protected $primaryKey = 'oid';

    function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    function goods()
    {
        return $this->hasOne(Goods::class, 'id', 'goods_id');
    }

    function coupon()
    {
        return $this->hasOne(Coupon::class, 'id', 'coupon_id');
    }

    function payment()
    {
        return $this->hasOne(Payment::class, 'oid', 'oid');
    }

    function orderLabels()
    {

        return OrderLabel::query()->where('oid', $this->attributes['oid'])->pluck('label_id');
    }

    //获取订单的标签
    static function getOrderLabels($oid, $data_type = 1)
    {
        if ($data_type == 1) {
            return OrderLabel::query()->where('oid', $oid)->pluck('label_id')->toArray();
        }
        return OrderLabel::query()->where('oid', $oid);
    }

    // 支付方式，用于前端显示
    function hpayWay()
    {
        $pay_way = $this->attributes['pay_way'];
        if ($pay_way == 0) {
            return '系统支付';
        }
        if ($pay_way == 1) {
            return '余额支付';
        }
        if ($pay_way == 2) {
            return '在线支付';
        }
        return '未知方式';

    }

    function hstatus()
    {
        $status = $this->attributes['status'];
        $is_expire = $this->attributes['is_expire'];
        if($is_expire == 1){
            return '已过期';
        }

        if ($status == -1) {
            return '已关闭';
        }
        if ($status == 0) {
            return '未支付';
        }
        if ($status == 1) {
            return '未激活';
        }
        if ($status == 2) {
            return '使用中';
        }
        if ($status == 3) {
            return '流量耗尽';
        }
        return '未知状态';
    }

    function ahstatus()
    {
        $status = $this->attributes['status'];
        if ($status == -1) {
            return '已关闭';
        }
        if ($status == 0) {
            return '未支付';
        }
        if (in_array($status, [1, 2, 3])) {
            return '已完成';
        }
        return '未知状态';
    }

    // 用于前端显示
    function expireAt()
    {
        if ($this->attributes['status'] >= 2) {
            if ($this->attributes['expire_at']) {

                return $this->attributes['expire_at'];
            }
            return '与状态不匹配';
        }
        return '未激活';
    }

    function getOriginAmountAttribute($value)
    {
        return $value / 100;
    }

    function setOriginAmountAttribute($value)
    {
        return $this->attributes['origin_amount'] = $value * 100;
    }

    function getAmountAttribute($value)
    {
        return $value / 100;
    }

    function setAmountAttribute($value)
    {
        return $this->attributes['amount'] = $value * 100;
    }

    // 根据用户ID和对应的订单，查询用户过期时间
    static function getUserExpireTime($uid)
    {
        $result1 = Order::query()->where(['user_id' => $uid, 'status' => '2', 'is_expire' => 0])->max('expire_at');
        $result2 = Order::query()->where(['user_id' => $uid, 'status' => '3', 'is_expire' => 0])
            ->whereHas('goods', function ($q) { $q->where('type', 2); })
            ->max('expire_at');
        $result = $result1>$result2?$result1:$result2;
        if(!$result){
            return '1992-12-25 11:14:00';
        }
        return $result;
    }

    /**
     * 根据用户ID和对应的订单，查询用户生效的标签
     * @param $uid
     * @param int $data_type 1:labelId数组，2:label对象数组
     * @return array
     */
    static function getUserLabels($uid, $data_type = 1)
    {
        $oids = Order::query()->where(['user_id' => $uid, 'status' => '2', 'is_expire' => 0])->pluck('oid')->toArray();
        if ($data_type == 1) {
            return OrderLabel::query()->whereIn('oid', $oids)->pluck('label_id')->toArray();
        }
        return OrderLabel::query()->whereIn('oid', $oids);
    }

    // 根据用户ID和对应的订单，查询用户总流量
    // 单位是B，商品的流量单位是MB,倍数为 1048576
    static function getUserTransferEnable($uid)
    {
        $goods_ids = Order::query()->where(['user_id' => $uid, 'status' => '2', 'is_expire' => 0])->pluck('goods_id')->toArray();
        $trafic_sum = 0;
        foreach ($goods_ids as $goods_id) {

            $trafic_sum += Goods::query()->find($goods_id)->traffic;
        }

        return $trafic_sum * 1048576;
    }

    // 根据订单，查询用户重置日期
    static function getUserResetDay($uid)
    {
        $existTaocanOrder = Order::query()->with('goods')
            ->where(['user_id' => $uid, 'is_expire' => 0])
            ->whereHas('goods', function ($q) {  $q->where('type', 2);})
            ->whereIn('status',['2','3'])
            ->first();
        if ($existTaocanOrder) {
            $goods = $existTaocanOrder->goods;
            $activeTimestamps = strtotime("-" . $goods->days . " days", strtotime($existTaocanOrder->expire_at));
            $next_reset_time = strtotime('+ 30 days',$activeTimestamps);
            while($next_reset_time<time()){
                $next_reset_time = strtotime('+ 30 days',$next_reset_time);
            }
            return date('Y-m-d H:i:s', $next_reset_time);
        }
        return 0;
    }

    /**
     * 可以更新到更高级的状态
     * @param $oid
     * @param $status
     * @return array
     * @throws \Exception
     */
    static function updateOrderStatusUnit($oid, $status)
    {

        DB::beginTransaction();
        try {

            $order = Order::query()->with(['goods', 'user'])->find($oid);
            if (!$order) {
                return ['status' => 'fail', 'message' => '订单不存在'];
            }

            if($status == -1 || $status == 0){
                //订单关闭和在线支付较为特殊
                $result = Order::updateOrderStatus($order->oid, $status);
                if ($result['status'] == 'fail') {
                    return $result;
                }

            } else {
                for ($s = $order->status + 1; $s <= $status; $s++) {

                    $result = Order::updateOrderStatus($order->oid, $s);
                    if ($result['status'] == 'fail') {
                        return $result;
                    }
                }
            }

            DB::commit();
            return ['status' => 'success', 'message' => '操作成功'];

        } catch (Exception $exception) {
            DB::rollBack();
            return ['status' => 'fail', 'message' => $exception->getMessage()];
        }

    }

    /**
     * 使用前一定要检查订单状态，这一步非常关键，将会影响用户的各种参数
     * 设定订单状态，不可跨步升级
     * @param $oid
     * @param $status
     * @return array
     */
    private static function updateOrderStatus($oid, $status)
    {

        DB::beginTransaction();
        try {

            $order = Order::query()->with(['goods', 'user'])->find($oid);
            if (!$order) {
                throw new Exception('没有该订单');
            }
            if (!$order->user) {
                throw new Exception('没有该用户');
            }
            $user = $order->user;
            if (!$order->goods) {
                throw new Exception('订单对应的商品不存在');
            }
            $goods = $order->goods;

            //只能向高处升级除非关闭订单
            if($order->status==0 && $status == -1){
                //订单关闭操作
            }
            else if ($order->status >= $status) {
                throw new Exception('订单状态不得降级');
            }

            //不可跨步升级
            if (abs($status - $order->status) >= 2) {
                throw new Exception('不可跨步升级');
            }

            if ($status == -1) {
                // 记得回复优惠券和商品数量
                if($goods->number != -1 && $goods->number >= 0 ){
                    Goods::query()->where('id',$goods->id)->increment('number',1);
                }

                $coupon = Coupon::query()->where('id',$order->coupon_id)->first();
                if ($coupon) {
                    if($coupon->usage !=-1 && $coupon->usage >=0){
                        $coupon->usage += 1;
                    }
                    $coupon->save();
                }

                //订单关闭
                Order::query()->where('oid', $oid)->update(['status' => $status]);
            }
            else if ($status == 0) {

                //订单创建完成
                Order::query()->where('oid', $oid)->update(['status' => $status]);
            }
            else if ($status == 1) {
                //支付成功
                //写入返利日志(如果是余额支付或在线支付)
                if ($order->user->referral_uid && ($order->pay_way==1 || $order->pay_way==2)) {
                    $referralLog = new ReferralLog();
                    $referralLog->user_id = $user->id;
                    $referralLog->ref_user_id = $user->referral_uid;
                    $referralLog->order_id = $order->oid;
                    $referralLog->amount = $order->amount;
                    $referralLog->ref_amount = $order->amount * User::systemConfig()['referral_percent'];
                    $referralLog->status = 0;
                    $referralLog->save();
                }

                if($order->pay_way ==1){
                    //如果是余额支付,扣除余额并记录日志
                    // 扣余额
                    User::query()->where('id', $user->id)->decrement('balance', $order->amount * 100);

                    // 记录余额操作日志
                    $userBalanceLog = new UserBalanceLog();
                    $userBalanceLog->user_id = $user->id;
                    $userBalanceLog->order_id = $order->oid;
                    $userBalanceLog->before = $user->balance;
                    $userBalanceLog->after = $user->balance - $order->amount;
                    $userBalanceLog->amount = -1 * $order->amount;
                    $userBalanceLog->desc = '购买服务：' . $goods->name;
                    $userBalanceLog->created_at = date('Y-m-d H:i:s');
                    $userBalanceLog->save();
                }

                $coupon = Coupon::query()->where('id',$order->coupon_id)->first();
                if ($coupon) {
                    if($coupon->usage >0){
                        $coupon->usage -= 1;
                    }
                    $coupon->status = 1;
                    $coupon->save();

                    // 写入日志
                    $couponLog = new CouponLog();
                    $couponLog->coupon_id = $coupon->id;
                    $couponLog->goods_id = $order->goods_id;
                    $couponLog->order_id = $order->oid;
                    $couponLog->save();
                }

                // 商品数量-1
                if($goods->number != -1 && $goods->number > 0 ){
                    Goods::query()->where('id',$goods->id)->decrement('number',1);
                }

                //订单支付成功
                Order::query()->where('oid', $oid)->update(['status' => $status]);
            }
            else if ($status == 2) {
                //如果激活的是套餐,将之前正在使用的所有套餐置都无效并充值流量
                if ($order->goods->type == 2) {

                    Order::query()
                        ->with('goods')->whereHas('goods', function ($q) {
                            $q->where('type', 2);
                        })
                        ->where('user_id', $order->user->id)
                        ->where('oid', '<>', $order->oid)
                        ->where('status', 2)
                        ->update(['is_expire' => 1]);

                    // 重置已用流量
                    $result = User::deactiveUserOrder($order->user_id); //流量重置前请先失效用户部分流量单(未满商品的流量的流量包流量没有清除)
                    if ($result['status'] == 'fail'){
                        throw new Exception($result['message']);
                    }
                    $next_reset_time = Order::getUserResetDay($user->id);
                    User::query()->where('id', $user->id)->update(['u' => 0, 'd' =>0 ,'traffic_reset_day'=>$next_reset_time]);
                }

                //激活订单
                $expire_at = date('Y-m-d H:i:s', strtotime("+" . $goods->days . " days"));
                Order::query()->where('oid', $oid)->update(['expire_at' => $expire_at, 'status' => $status]);

                // 激活账户服务
                User::query()->where('id', $user->id)->update(['enable' => 1, 'status' => 1]);

            } else if ($status == 3) {
                //流量已用尽
                Order::query()->where('oid', $oid)->update(['status' => $status]);
            } else {
                throw new Exception('订单状态不正确');
            }

            DB::commit();

            return ['status' => 'success', 'message' => '操作成功'];

        } catch (Exception $exception) {
            DB::rollBack();
            return ['status' => 'fail', 'message' => $exception->getMessage()];
        }

    }




}
<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Mockery\Exception;
/**
 * 优惠券
 * Class Goods
 *
 * @package App\Http\Models
 */
class Coupon extends Model
{
    protected $table = 'coupon';
    protected $primaryKey = 'id';


    function getAmountAttribute($value)
    {
        return $value / 100;
    }

    function setAmountAttribute($value)
    {
        $this->attributes['amount'] = $value * 100;
    }

    function getDiscountAttribute($value)
    {
        return $value * 10;
    }

    function setDiscountAttribute($value)
    {
        $this->attributes['discount'] = $value / 10;
    }

    function huser_ids(){
        if(!$this->attributes['user_ids']){
            return '不限';
        }
        return $this->attributes['user_ids'];
    }
    function hgoods_types(){
        if(!$this->attributes['goods_types']){
            return '不限';
        }
        return $this->attributes['goods_types'];
    }

    function hgoods_ids(){
        if(!$this->attributes['goods_ids']){
            return '不限';
        }
        return $this->attributes['goods_ids'];

    }

    function available_start(){
        if($this->attributes['available_start'] != -1){
            return date('Y-m-d h:i:s',$this->attributes['available_start']);
        }
        return $this->attributes['available_start'];
    }

    function available_end(){
        if($this->attributes['available_end'] != -1){
            return date('Y-m-d h:i:s',$this->attributes['available_end']);
        }
        return $this->attributes['available_end'];
    }

    function havailable_start(){
        if($this->attributes['available_start'] < 100){
            return '未指定：正在生效';
        }
        return date('Y-m-d h:i:s',$this->attributes['available_start']);

    }
    function havailable_end(){
        if($this->attributes['available_end'] < 100){
            return '未指定：永不结束';
        }
        return date('Y-m-d h:i:s',$this->attributes['available_end']);

    }

    // 卡券合法性检验:卡券号码，用于的商品，使用人
    static function isAvaliable2($coupon_sn,$goods_id,$user_id){
        $coupon = Coupon::query()->where('sn',$coupon_sn)->first();
        if(!$coupon){
            return ['status' => 'fail', 'data' => false, 'message' => '该卡券不存在'];
        }
        return Coupon::isAvaliable($coupon->id,$goods_id,$user_id);
    }

    // 卡券合法性检验:卡券ID，用于的商品，使用人
    static function isAvaliable($coupon_id,$goods_id,$user_id){

        try {
            $coupon = Coupon::query()->find($coupon_id);
            if(!$coupon){
                throw new Exception('该卡券不存在');
            }

            $result = Goods::isAvaliable($goods_id);
            if($result['status']=='fail'){
                throw new Exception($result['message']);
            }

            $user = User::query()->find($user_id);
            if(!$user){
                throw new Exception('该用户不存在');
            }

            //检测是否可用于该商品
            $coupon_goods_ids = $coupon->goods_ids;
            if($coupon_goods_ids){
                $coupon_goods_ids = explode(';', $coupon_goods_ids);
                if(!in_array($goods_id,$coupon_goods_ids)){
                    throw new Exception('该卡券不适用于该商品');
                }
            }

            $goods = Goods::query()->find($goods_id);
            $coupon_goods_types = $coupon->goods_types;
            if($coupon_goods_types){
                $coupon_goods_types = explode(';', $coupon_goods_types);
                if(!in_array($goods->type,$coupon_goods_types)){
                    throw new Exception('该卡券不适用于该类型的商品');
                }
            }

            $coupon_user_ids = $coupon->user_ids;
            if($coupon_user_ids){
                $coupon_user_ids = explode(';', $coupon_user_ids);
                if(!in_array($user_id,$coupon_user_ids)){
                    throw new Exception('该用户没有权限使用该优惠券');
                }
            }

            if($coupon->usage == 0){
                throw new Exception('该优惠券次数已用光');
            }

            if (($coupon->available_start > 100 && $coupon->available_start > time())) {
                throw new Exception('该优惠券尚未达到使用时间');
            }

            if (($coupon->available_end > 100 && $coupon->available_end < time())) {
                throw new Exception('该优惠券已过期');
            }

            return ['status' => 'success', 'data' => true, 'message' => '卡券可用'];

        } catch (Exception $exception) {
            return ['status' => 'fail', 'data' => false, 'message' => $exception->getMessage()];
        }
    }

}
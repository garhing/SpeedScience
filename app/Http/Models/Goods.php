<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Mockery\Exception;

/**
 * 商品
 * Class Goods
 *
 * @package App\Http\Models
 */
class Goods extends Model
{
    protected $table = 'goods';
    protected $primaryKey = 'id';

    function label()
    {
        return $this->hasMany(GoodsLabel::class, 'goods_id', 'id');
    }

    function getPriceAttribute($value)
    {
        return $value / 100;
    }

    function setPriceAttribute($value)
    {
        $this->attributes['price'] = $value * 100;
    }

    function hstatus(){
        if($this->attributes['status']==0){
            return '下架';
        }
        if($this->attributes['status']==1){
            return '上架';
        }
        if($this->attributes['status']==2){
            return '仅系统可见';
        }
        return '未知状态';
    }

    function hnumber()
    {

        if ($this->attributes['number'] == -1) {
            return '不限量';
        } elseif ($this->attributes['number'] == 0) {
            return '已售罄';
        }
        return $this->attributes['number'];
    }

    function available_start()
    {
        if ($this->attributes['available_start'] != -1) {
            return date('Y-m-d h:i:s', $this->attributes['available_start']);
        }
        return $this->attributes['available_start'];
    }

    function available_end()
    {
        if ($this->attributes['available_end'] != -1) {
            return date('Y-m-d h:i:s', $this->attributes['available_end']);
        }
        return $this->attributes['available_end'];
    }

    function havailable_start()
    {
        if ($this->attributes['available_start'] < 100) {
            return '已开始';
        }
        return date('Y/m/d h:i:s', $this->attributes['available_start']);

    }

    function havailable_end()
    {
        if ($this->attributes['available_end'] < 100) {
            return '不结束';
        }
        return date('Y/m/d h:i:s', $this->attributes['available_end']);

    }

    function avaliableTime()
    {

        return $this->havailable_start() . ' ~ ' . $this->havailable_end();
    }

    //判断该商品是否可购买
    function is_avaliable()
    {

        //1、判断数量
        if ($this->attributes['number'] == 0) {
            return false;
        }
        //2、判断是否上架
        if ($this->attributes['status'] == 0) {
            return false;
        }
        //3、判断活动开始时间
        if ($this->attributes['available_start'] > 100 and $this->attributes['available_start'] > time()) {
            return false;
        }
        //4、判断活动结束时间
        if ($this->attributes['available_end'] > 100 and $this->attributes['available_end'] < time()) {
            return false;
        }
        return true;
    }

    //判断某个商品是否可购买
    static function isAvaliable($goods_id)
    {

        try {
            $goods = Goods::query()->find($goods_id);
            if (!$goods) {
                throw new Exception('该商品不存在');
            }
            //1、判断数量
            if ($goods->number == 0) {
                throw new Exception('该商品已售罄');
            }

            //2、判断是否上架
            if ($goods->status == 0) {
                throw new Exception('该商品未上架');
            }
            //3、判断活动开始时间
            if ($goods->available_start >100 and $goods->available_start > time()) {
                throw new Exception('活动未开始');
            }
            //4、判断活动结束时间
            if ($goods->available_end >100 and $goods->available_end < time()) {
                throw new Exception('活动已结束');
            }

            return ['status' => 'success', 'data' => true, 'message' => '可购买'];

        } catch (Exception $exception) {
            return ['status' => 'fail', 'data' => false, 'message' => $exception->getMessage()];
        }
    }


}
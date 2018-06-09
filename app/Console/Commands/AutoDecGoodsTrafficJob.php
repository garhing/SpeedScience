<?php

namespace App\Console\Commands;

use App\Http\Models\Config;
use App\Http\Models\GoodsLabel;
use App\Http\Models\UserLabel;
use Illuminate\Console\Command;
use App\Http\Models\Order;
use App\Http\Models\User;
use Log;

class AutoDecGoodsTrafficJob extends Command
{
    protected $signature = 'autoDecGoodsTrafficJob';
    protected $description = '自动扣减用户到期流量包的流量';// TODO 检测用户订单有效状态，自动失效过期订单和流量用尽订单, 并更新用户参数，也包括了用户流量重置操作

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // 查询过期订单
        $orderList = Order::query()->with(['user', 'goods'])->where(['status'=>2,'is_expire'=> 0])->where('expire_at','<=',date('Y-m-d H:i:s'))->get();
        if (!$orderList->isEmpty()) {
            foreach ($orderList as $order) {
                if (empty($order->user) || empty($order->goods)) {
                    continue;
                }
                Order::query()->where($order->oid)->update('is_expire',1);
            }
        }

        //查询需要重置流量的用户
        $users = User::query()->where('traffic_reset_day','<>',0)->where('traffic_reset_day','<=',date('Y-m-d H:i:s'))->get();
        if (!$users->isEmpty()) {
            foreach ($users as $user) {
                User::deactiveUserOrder($user->id,false);
                User::query()->where('id', $user->id)->update(['u' => 0, 'd' => 0,]);

            }
        }

        //更新所有用户状态
        $allUserList = User::query()->get();
        foreach ($allUserList as $user){
            User::updateUserStatus($user->id);
        }

        // 邮件提醒 TODO
        // 前面的操作记录下需要发邮件的用户


        Log::info('定时任务：' . $this->description);
    }

}

<?php

namespace App\Console\Commands;

use App\Http\Models\Config;
use Illuminate\Console\Command;
use App\Http\Models\Order;
use App\Http\Models\User;
use App\Http\Models\UserBanLog;
use App\Http\Models\UserTrafficHourly;
use Log;

class RoutineJob extends Command
{
    protected $signature = 'routineJob';
    protected $description = '例行任务';// TODO 检测用户订单有效状态，自动失效过期订单和流量用尽订单, 并更新用户参数，也包括了用户流量重置操作
    protected $config = null;

    public function __construct()
    {
        parent::__construct();
        $this->config = $this->systemConfig();
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
                Order::query()->where('oid',$order->oid)->update(['is_expire'=>1]);
                User::updateUserStatus($order->user_id);
            }
        }

        //查询需要重置流量的用户
        $users = User::query()->where('traffic_reset_day','<>',0)->where('traffic_reset_day','<=',date('Y-m-d H:i:s'))->get();
        if (!$users->isEmpty()) {
            foreach ($users as $user) {
                User::deactiveUserOrder($user->id,false);
                User::activeUserOrder($user->id,false);
                User::query()->where('id', $user->id)->update(['u' => 0, 'd' => 0]);
                User::updateUserStatus($user->id);
            }
        }

        //更新所有用户状态,禁用用户进入正常状态不需要自动进行
        $allUserList = User::query()->where('enable',1)->get();
        foreach ($allUserList as $user){
            User::deactiveUserOrder($user->id,false);
            User::updateUserStatus($user->id);
        }

        // 自动禁用流量超限的用户
        $userList = User::query()->where('enable', 1)->whereRaw("u + d >= transfer_enable")->get();
        if (!$userList->isEmpty()) {
            foreach ($userList as $user) {
                User::query()->where('id', $user->id)->update(['enable' => 0]);
                // TODO 邮件提醒
                // 写入日志
                $this->log($user->id, '【自动封禁】-流量超限');
            }
        }

        // 自动禁用到期用户,到期账号禁用
        User::query()->where('enable', 1)->where('expire_time', '<', date('Y-m-d h:i:s'))->update(['enable' => 0]);
        // TODO 邮件提醒



        //************************* 分钟级任务 **********************************************************************************
        // 1/2封禁24小时内流量异常账号
        if ($this->config['is_traffic_ban']) {
            $userList = User::query()->where('status', '>=', 0)->where('enable', 1)->get();
            if (!$userList->isEmpty()) {
                foreach ($userList as $user) {
                    $time = date('Y-m-d H:i:s', time() - 24 * 60 * 60);
                    $totalTraffic = UserTrafficHourly::query()->where('user_id', $user->id)->where('node_id', 0)->where('created_at', '>=', $time)->sum('total');
                    if ($totalTraffic >= ($this->config['traffic_ban_value'] * 1024 * 1024 * 1024)) {
                        $ban_time = strtotime(date('Y-m-d H:i:s', strtotime("+" . $this->config['traffic_ban_time'] . " minutes")));
                        User::query()->where('id', $user->id)->update(['enable' => 0, 'ban_time' => $ban_time]);
                        // TODO 邮件提醒
                        // 写入日志
                        $this->log($user->id, $this->config['traffic_ban_time'], '【自动封禁】-24小时内流量异常');
                    }
                }
            }
        }

        // 2/2 解封账号
        $userList = User::query()->where('status', '>=', 0)->where('ban_time', '>', 0)->get();
        foreach ($userList as $user) {
            if ($user->ban_time < time()) {
                User::query()->where('id', $user->id)->update(['enable' => 1, 'ban_time' => 0]);
                // TODO 邮件提醒
                // 写入操作日志
                $this->log($user->id, 0, '【自动解封】-封禁到期');
            }
        }
        //************************* 分钟级任务 **********************************************************************************

        Log::info('定时任务：' . $this->description);
    }

    private function log($user_id, $desc)
    {
        $log = new UserBanLog();
        $log->user_id = $user_id;
        $log->minutes = 0;
        $log->desc = $desc;
        $log->save();
    }

    // 系统配置
    private function systemConfig()
    {
        $config = Config::query()->get();
        $data = [];
        foreach ($config as $vo) {
            $data[$vo->name] = $vo->value;
        }

        return $data;
    }
}

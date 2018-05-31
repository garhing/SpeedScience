<?php

namespace App\Http\Controllers;

use App\Http\Models\Article;
use App\Http\Models\Config;
use App\Http\Models\Country;
use App\Http\Models\Invite;
use App\Http\Models\Label;
use App\Http\Models\Level;
use App\Http\Models\Order;
use App\Http\Models\OrderGoods;
use App\Http\Models\ReferralApply;
use App\Http\Models\ReferralLog;
use App\Http\Models\SsConfig;
use App\Http\Models\SsGroup;
use App\Http\Models\SsGroupNode;
use App\Http\Models\SsNode;
use App\Http\Models\SsNodeInfo;
use App\Http\Models\SsNodeLabel;
use App\Http\Models\SsNodeOnlineLog;
use App\Http\Models\SsNodeTrafficDaily;
use App\Http\Models\SsNodeTrafficHourly;
use App\Http\Models\User;
use App\Http\Models\UserBalanceLog;
use App\Http\Models\UserBanLog;
use App\Http\Models\UserLabel;
use App\Http\Models\UserSubscribe;
use App\Http\Models\UserTrafficDaily;
use App\Http\Models\UserTrafficHourly;
use App\Http\Models\UserTrafficLog;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Redirect;
use Response;
use Log;
use DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $view = [];
        return $this->view('home/index', $view);
    }
    public function features(Request $request)
    {
        $view = [];
        return $this->view('home/features', $view);
    }
    public function datacenter(Request $request)
    {
        $view = [];
        return $this->view('home/datacenter', $view);
    }
    public function panel(Request $request)
    {
        $view = [];
        return $this->view('home/panel', $view);
    }
    public function sla(Request $request)
    {
        $view = [];
        return $this->view('home/sla', $view);
    }
    public function sla_full(Request $request)
    {
        $view = [];
        return $this->view('home/sla_full', $view);
    }
    public function game_pricing(Request $request)
    {
        $view = [];
        return $this->view('home/game_pricing', $view);
    }
    public function client(Request $request)
    {
        $view = [];
        return $this->view('home/client', $view);
    }
    public function speedtest(Request $request)
    {
        $view = [];
        return $this->view('home/speedtest', $view);
    }
    public function status(Request $request)
    {
        $view = [];
        return $this->view('home/status', $view);
    }
    public function about(Request $request)
    {
        $view = [];
        return $this->view('home/about', $view);
    }
    public function aaaa(Request $request)
    {
        $view = [];
        return $this->view('home/index', $view);
    }
    public function contact(Request $request)
    {
        $view = [];
        return $this->view('home/contact', $view);
    }
    public function coupons(Request $request)
    {
        $view = [];
        return $this->view('home/coupons', $view);
    }
    public function aff(Request $request)
    {
        $view = [];
        return $this->view('home/aff', $view);
    }
    public function tos(Request $request)
    {
        $view = [];
        return $this->view('home/tos', $view);
    }
    public function use_policy(Request $request)
    {
        $view = [];
        return $this->view('home/use_policy', $view);
    }
}

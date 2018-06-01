<?php

namespace App\Http\Middleware;

use Closure;
use Redirect;
use Illuminate\Support\Facades\Cookie;
/**
 * 推广中间件，自动将推荐人ID写入cookie
 *
 * Class Aff
 * @package App\Http\Middleware
 */
class Aff
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {


//        $yiyou =  $request->cookie('aff_id');
//        echo '============='.$yiyou.'<br>';

        $aff_id = trim($request->get('aff',0));
        if($aff_id){
            Cookie::queue('aff_id', $aff_id, 129600);
        }
//        echo '+++++++++++++'.$aff_id.'<br>';

        return $next($request);;
    }
}

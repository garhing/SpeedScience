<!DOCTYPE html>
<!--[if IE 8]>
<html lang="{{app()->getLocale()}}" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="{{app()->getLocale()}}" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{{app()->getLocale()}}">
<!--<![endif]-->

<head>
    <meta charset="utf-8"/>
    <title>{{$app_config['website_name']}}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="keywords"
          content="Shadowsocks,Surge,Shadowrocket,Youtube,Twitter,Facebook,Telegram,Instagram等app及网站加速,GTA5,战地,Steam等游戏加速"/>
    <meta name="description" content="Youtube,Twitter,Facebook,Telegram,Instagram等app及网站加速,GTA5,战地,Steam等游戏加速"/>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <meta http-equiv="Content-Language" content="zh"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <!-- Fix chrome language detection -->

    <!-- Styles -->
    <link href="/home/css/core.css" rel="stylesheet"/>
    <link href="/home/css/main.css" rel="stylesheet"/>
    <link href="/home/css/panel.css" rel="stylesheet"/>
    <link href="/home/css/global.css" rel="stylesheet"/>
    <link href="/home/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="{{asset('favicon.png')}}" rel="shortcut icon" />


    <!--[if lt IE 9]>
    <script src="/home/js/selectivizr-min.js"></script>
    <script src="/home/js/html5shiv.min.js"></script>
    <script src="/home/js/respond.min.js"></script>
    <![endif]-->
    @yield('css')
    <style>
        @font-face {
            font-family: 'icons';
            src: url('/home/fonts/icons/icons.eot');
            src: url('/home/fonts/icons/icons.eot') format('embedded-opentype'), url('/home/fonts/icons/icons.ttf') format('truetype'), url('/home/fonts/icons/icons.woff') format('woff'), url('/home/fonts/icons/icons.svg') format('svg');
            font-weight: normal;
            font-style: normal;
        }

        .navbar-main > li > a.user_font {
            color: #fff;
            font-weight: bold;
        }

        @media (max-width: 1199px) {
            .navbar-main > li > a.user_font {
                color: #fff;
                font-weight: bold;
            }
        }

        @media (max-width: 767px) {
            .navbar-main > li > a.user_font {
                color: #363b40;
                font-weight: bold;
            }
        }
    </style>
</head>

<body>
<div class="page-wrapper">
    <div class="page-navbar">
        <nav class="navbar">
            <div class="container">
                <button class="navbar-toggle btn btn-link btn-icon" type="button"><i><span class="icon-bar"></span><span
                                class="icon-bar"></span><span class="icon-bar"></span></i></button>
                <div class="navbar-header">
                    <a class="navbar-brand slogan-title" href="{{url('/')}}">{{$app_config['website_name']}}</a>
                </div>
                <div class="navbar-container">
                    <ul class="nav navbar-nav navbar-main">
                        <li></li>
                        <li class="dropdown">
                            <a href="{{url('/home/features')}}" data-toggle="dropdown">产品特性</a>
                            <ul class="dropdown-menu">
                                <li><a href="{{url('/home/features')}}">加速特性</a></li>
                                <li><a href="{{url('/home/datacenter')}}">数据中心</a></li>
                                <li><a href="{{url('/home/panel')}}">控制面板</a></li>
                                <li><a href="{{url('/home/game_pricing')}}">游戏加速</a></li>
                                <li><a href="{{url('/home/sla')}}">服务保证</a></li>
                            </ul>
                        </li>
                        {{--<li class="dropdown">--}}
                        {{--<a href="index-2.html" data-toggle="dropdown">软件与教程</a>--}}
                        {{--<ul class="dropdown-menu">--}}
                        {{--<li></li>--}}
                        {{--<li><a href="{{url('/home/client')}}">软件下载</a></li>--}}
                        {{--<li><a href="{{url('/home/speedtest')}}">速度测试</a></li>--}}
                        {{--<li><a href="{{url('/home/status')}}">线路状态</a></li>--}}
                        {{--</ul>--}}
                        {{--</li>--}}

                        <li class="dropdown">
                            <a href="index-2.html" data-toggle="dropdown">用户政策</a>
                            <ul class="dropdown-menu">
                                <li><a href="{{url('/home/tos')}}">服务条款</a></li>
                                <li><a href="{{url('/home/use_policy')}}">使用政策</a></li>
                                <li><a href="{{url('/home/sla_full')}}">服务协议</a></li>
                                <li><a href="{{url('/home/about')}}">关于我们</a></li>
                            </ul>
                        </li>
                        <li><a href="{{url('/home/aff')}}">推介计划</a></li>
                        @if(Session::get('user'))
                            <li><a href="{{url('/user/index')}}" class="user_font">我的主页</a></li>
                            <li><a href="{{url('/logout')}}" class="user_font">退出登录</a></li>
                        @endif
                    </ul>
                    @if(!Session::get('user'))
                        <ul class="nav navbar-buttons">
                            <li></li>
                            <li><a href="{{url('/login')}}" class="btn btn-success login-btn"
                                   style="background-color: #5aa700;padding:4px 15px; margin: 12px 0;">登录</a></li>
                            <li><a href="{{url('/register')}}" style="padding:4px 15px; margin: 12px 0;"class="btn btn-dark login-btn">注册</a></li>
                            <li></li>
                        </ul>
                    @endif


                </div>

            </div>
        </nav>
    </div>
@yield('main_content')

<!-- /.page-section -->
    <div class="page-section section-blue section-center">
        <div class="container">
            <h2 align="center" class="section-title">立即加入{{$app_config['website_name']}} 开启全新科研体验！</h2>
            <a href="{{url('/register')}}">
                <button class="btn btn-primary-light btn-lg" type="submit">立即注册</button>
            </a>
        </div>
    </div>
    <!-- /.page-section -->
    <div class="page-footer">
        <footer class="footer-nav">
            <div class="container">
                <div class="row">
                    <div class="col-xs-3">
                        <h4>产品特性</h4>
                        <ul>
                            <li><a href="{{url('/home/game_pricing')}}">游戏加速</a></li>
                            <li><a href="{{url('/home/features')}}">概念加速</a></li>
                            <li><a href="{{url('/home/datacenter')}}">数据中心</a></li>
                            <li><a href="{{url('/home/game_pricing')}}">游戏加速</a></li>

                        </ul>
                    </div>
                    <div class="col-xs-3">
                        <h4>软件与教程</h4>
                        <ul>
                            <li><a href="{{url('/home/client')}}">软件下载</a></li>
                            <li><a href="{{url('/home/speedtest')}}">速度测试</a></li>
                            <li><a href="{{url('/home/status')}}">线路状态</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-3">
                        <h4>关于与优惠</h4>
                        <ul>
                            <li><a href="{{url('/home/about')}}">关于我们</a></li>
                            <li><a href="{{url('/home/coupons')}}">优惠代码</a></li>
                            <li><a href="{{url('/home/aff')}}">推介计划</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-3">
                        <h4>其他特性</h4>
                        <ul>
                            <li><a href="{{url('/home/panel')}}">控制面板</a></li>
                            <li><a href="{{url('/home/sla')}}">质量保证</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <footer class="footer-bottom">
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-12">
                        <p class="footer-copyright"> 京ICP备17039089号 ©2014-2020 <a
                                    href="{{url('/')}}">{{$app_config['website_name']}}</a>.
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- /.page-footer -->
</div>
<div class="modal fade" id="tryscreen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Qrcode</h4>
            </div>
            <div class="modal-body" id="qrcode"></div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
<!-- Scripts -->
<script src="/home/js/jquery.min.js"></script>
<script src="/home/js/core.min.js"></script>
<script src="/home/js/main.js"></script>
<script src="/home/js/global.js"></script>
<script src="/home/js/jquery-ui.min.js"></script>
@yield('script')
</body>


</html>

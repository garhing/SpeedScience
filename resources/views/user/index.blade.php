@extends('user.layouts')

@section('css')
    <link href="/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .ticker {
            background-color: #fff;
            margin-bottom: 20px;
            border: 1px solid #e7ecf1 !important;
            border-radius: 4px;
            -webkit-border-radius: 4px;
        }

        .ticker ul {
            padding: 0;
        }

        .ticker li {
            list-style: none;
            padding: 15px;
        }
        .fancybox > img {
            width: 75px;
            height: 75px;
        }
    </style>
@endsection
@section('content')
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content" style="padding-top:0;">
        <!-- BEGIN PAGE BASE CONTENT -->
        @if (Session::has('successMsg'))
            <div class="alert alert-success">
                <button class="close" data-close="alert"></button>
                {{Session::get('successMsg')}}
            </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light form-fit bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-link font-blue"></i>
                            <span class="caption-subject font-blue bold">快速开始</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="mt-clipboard-container">
                            <p style="font-size: 1.2em">您的订阅地址</p>
                            @if($subscribe_status)
                                <input type="text" id="mt-target-1" class="form-control" value="{{$link}}" />
                                <a href="javascript:exchangeSubscribe();" class="btn green">
                                    {{trans('home.exchange_subscribe')}}
                                </a>
                                <a href="javascript:;" class="btn blue mt-clipboard" data-clipboard-action="copy" data-clipboard-target="#mt-target-1">
                                    {{trans('home.copy_subscribe_address')}}
                                </a>
                            @else
                                <span>{{trans('home.subscribe_baned')}}</span>
                            @endif

                        </div>
                        <div class="mt-clipboard-container"  style="padding-bottom: 30px;">
                            <p style="font-size: 1.2em;">全平台配置过程</p>
                            <p style="font-size: 1.0em;">
                                只需填写一次，即可快捷方便的在客户端设置和同步节点信息。<br>
                                <b style="color: red">请注意, 只有您的账户正常且购买的相应套餐，订阅才能得到正确的信息</b><a href="{{url('user/userAccount')}}"> 查看我的账户</a> <br>
                                <b style="color: red">当您更改了连接密码或者套餐时，从客户端再次请求即可，而不必要重新填写订阅地址，除非您手动更改了它。</b><br>

                            </p>
                            <div class="portlet light" style="padding-left: 0;padding-bottom: 0">
                                <div class="portlet-title tabbable-line">
                                    <ul class="nav nav-tabs" style="float: left">
                                        <li class="active">
                                            <a href="#tab_1" data-toggle="tab"> Mac</a>
                                        </li>
                                        <li>
                                            <a href="#tab_2" data-toggle="tab"> Windows</a>
                                        </li>
                                        <li>
                                            <a href="#tab_3" data-toggle="tab"> Android</a>
                                        </li>
                                        <li>
                                            <a href="#tab_4" data-toggle="tab">iOS</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="portlet-body" style="padding-top:0;">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <p>1、点击下载<a href="{{url('/downloads/ssr-mac.dmg')}}">Mac客户端</a>并启动</p>
                                        <p>2、单击状态栏小飞机，找到 服务器==>>编辑订阅，添加您的订阅地址</p>
                                        <p>3、点击 服务器==>>手动更新订阅，更新您的服务信息</p>
                                        <p>4、更新成功后，请在原"服务器"菜单处选择线路，并点击 打开Shadowsocks</p>
                                        <p>5、单击小飞机，选择PAC自动模式</p>
                                    </div>
                                    <div class="tab-pane" id="tab_2">
                                        <p>1、点击下载<a href="{{url('/downloads/ssr-win.7z')}}">Windows客户端</a>并启动</p>
                                        <p>2、右键任务栏小飞机==>>服务器订阅==>>SSR服务器订阅设置，添加您的订阅地址</p>
                                        <p>3、右键任务栏小飞机==>>服务器订阅==>>更新SSR服务器订阅，更新您的服务信息</p>
                                        <p>4、更新成功后，右键菜单==>>服务器==>>编辑服务器 处，删除原有服务器。</p>
                                        <p>5、右键菜单==>>系统代理模式==>>PAC模式</p>
                                    </div>
                                    <div class="tab-pane" id="tab_3">
                                        <p>1、点击下载<a href="{{url('/downloads/ssr-android.apk')}}">Android客户端</a>并启动</p>
                                        <p>2、</p>
                                        <p>3、</p>
                                        <p>4、</p>
                                        <p>5、</p>
                                    </div>
                                    <div class="tab-pane" id="tab_4">
                                        <p>1、请参照<a href="https://github.com/j-proxy/iossos" target="_blank"> 教程 </a>安装Shadowrocket</p>
                                        <p>2、点击右上角 "+"号，类型选择"Subscribe"</p>
                                        <p>3、粘贴您的订阅地址，然后点击完成</p>
                                        <p>4、更新成功后，选择您的线路</p>
                                        <p>5、点击应用首页的连接开关并测试</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="mt-clipboard-container"  style="padding-bottom: 30px;">
                        <p style="font-size: 1.2em;">
                            更详细视频教程请点击左侧的<a href="{{url('user/articleList')}}">文章教程</a>
                        </p>
                    </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- END PAGE BASE CONTENT -->
    </div>
    <!-- END CONTENT BODY -->
@endsection
@section('script')
    <script src="/assets/global/plugins/jquery-qrcode/jquery.qrcode.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="/js/layer/layer.js" type="text/javascript"></script>

    <script type="text/javascript">
        // 更换订阅地址
        function exchangeSubscribe() {
            layer.confirm('更换订阅地址将导致：<br>1.旧地址立即失效；<br>2.连接密码被更改；', {icon: 7, title:'警告'}, function(index) {
                $.post("{{url('user/exchangeSubscribe')}}", {_token:'{{csrf_token()}}'}, function (ret) {
                    layer.msg(ret.message, {time:1000}, function () {
                        if (ret.status == 'success') {
                            window.location.reload();
                        }
                    });
                });

                layer.close(index);
            });
        }
    </script>
@endsection

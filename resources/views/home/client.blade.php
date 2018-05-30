@extends('home.layouts')
@section('main_content')

    <div class="page-banner page-banner-subpage banner-resources p-b-0">
        <div class="container">
            <div class="banner-slogan banner-slogan-hero text-center">
                <h1 class="slogan-title">ShadowsocksR 客户端</h1>
                <p class="slogan-desc">
                    ShadowsocksR概念加速服务在多平台均可使用，完美支持iOS9、安卓、Windows、macOS等操作系统，甚至可以在极路由（搭配SS插件）、Openwrt、支持梅林固件的路由器上面直接配置使用。</p>
            </div>
            <div class="banner-tabs tabs-responsive">
                <div class="tabs-container">
                    <ul class="nav nav-tabs text-center">
                        <li class="active"><a href="client.html">客户端</a></li>
                        <li><a href="speedtest.html">测速</a></li>
                        <li><a href="status.html">线路状态</a></li>
                    </ul>
                    <button class="btn btn-icon btn-link btn-prev" type="button" data-click="prev-tab"><i
                                class="zmdi zmdi-chevron-left"></i></button>
                    <button class="btn btn-icon btn-link btn-next" type="button" data-click="next-tab"><i
                                class="zmdi zmdi-chevron-right"></i></button>
                </div>
            </div>
        </div>
    </div>



    <div class="page-section section-center">
        <div class="container">
            <div class="blocks row">
                <div class="col-sm-4">
                    <a class="panel panel-block panel-block-icon"
                       href="https://itunes.apple.com/cn/app/potatso-qiang-da-wang-luo/id1070901416">
                        <div class="panel-icon"><img src="img/clients/potatso.svg"></div>
                        <div class="panel-body">
                            <h3 class="panel-title h4">Potatso for iOS</h3>
                            <span class="link">App Store购买下载</span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-4">
                    <a class="panel panel-block panel-block-icon"
                       href="https://itunes.apple.com/cn/app/shadowrocket-for-shadowsocks/id932747118">
                        <div class="panel-icon"><img src="img/clients/shadowrocket.svg"></div>
                        <div class="panel-body">
                            <h3 class="panel-title h4">Shadowrocket for iOS</h3>
                            <span class="link">App Store购买下载</span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-4">
                    <a class="panel panel-block panel-block-icon"
                       href="https://itunes.apple.com/cn/app/surge-web-developer-tool-proxy/id1040100637">
                        <div class="panel-icon"><img src="img/clients/surge.svg"></div>
                        <div class="panel-body">
                            <h3 class="panel-title h4">Surge for iOS</h3>
                            <span class="link">App Store购买下载</span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-4">
                    <a class="panel panel-block panel-block-icon" href="http://home.ustc.edu.cn/~mmmwhy/ssr-win.7z">
                        <div class="panel-icon"><img src="img/clients/ss-windows.svg"></div>
                        <div class="panel-body">
                            <h3 class="panel-title h4">ShadowsocksR for Windows</h3>
                            <span class="link">立即下载</span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-4">
                    <a class="panel panel-block panel-block-icon"
                       href="http://home.ustc.edu.cn/~mmmwhy/ssr-android.apk">
                        <div class="panel-icon"><img src="img/clients/ss-android.png"></div>
                        <div class="panel-body">
                            <h3 class="panel-title h4">ShadowsocksR for Android</h3>
                            <span class="link">立即下载</span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-4">
                    <a class="panel panel-block panel-block-icon" href="http://home.ustc.edu.cn/~mmmwhy/ssr-mac.dmg">
                        <div class="panel-icon"><img src="img/clients/ss-mac.svg"></div>
                        <div class="panel-body">
                            <h3 class="panel-title h4">ShadowsocksR for MacOS</h3>
                            <span class="link">立即下载</span>
                        </div>
                    </a>
                </div>


            </div>
        </div>
    </div>
    <!-- /.page-section -->
@endsection
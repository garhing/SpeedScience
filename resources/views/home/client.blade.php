@extends('home.layouts')
@section('main_content')

    <div class="page-banner page-banner-subpage banner-resources p-b-0">
        <div class="container">
            <div class="banner-slogan banner-slogan-hero text-center">
                <h1 class="slogan-title">{{$app_config['website_name']}} 客户端</h1>
                <p class="slogan-desc">
                    {{$app_config['website_name']}}概念加速服务在多平台均可使用，完美支持iOS9、安卓、Windows、macOS等操作系统，甚至可以在极路由（搭配SS插件）、Openwrt、支持梅林固件的路由器上面直接配置使用。</p>
            </div>
            <div class="banner-tabs tabs-responsive">
                @include('home.subpage.soft_sub')
            </div>
        </div>
    </div>


    <div class="page-section section-center">
        <div class="container">
            <p class="section-desc">{{$app_config['website_name']}}概念加速服务在多平台均可使用，完美支持iOS9、安卓、Windows、macOS等操作系统，甚至可以在极路由（搭配SS插件）、Openwrt、支持梅林固件的路由器上面直接配置使用。</p>
            <div class="blocks row">
                <div class="col-sm-4">
                    <a class="panel panel-block panel-block-icon"
                       href="https://itunes.apple.com/cn/app/potatso-qiang-da-wang-luo/id1070901416">
                        <div class="panel-icon animate zoomIn"><img src="/home/img/clients/potatso.svg"></div>
                        <div class="panel-body">
                            <h3 class="panel-title h4">Potatso for iOS</h3>
                            <span class="link">App Store购买下载</span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-4">
                    <a class="panel panel-block panel-block-icon"
                       href="https://itunes.apple.com/cn/app/shadowrocket-for-shadowsocks/id932747118">
                        <div class="panel-icon animate zoomIn"><img src="/home/img/clients/shadowrocket.svg"></div>
                        <div class="panel-body">
                            <h3 class="panel-title h4">Shadowrocket for iOS</h3>
                            <span class="link">App Store购买下载</span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-4">
                    <a class="panel panel-block panel-block-icon"
                       href="https://itunes.apple.com/cn/app/surge-web-developer-tool-proxy/id1040100637">
                        <div class="panel-icon animate zoomIn"><img src="/home/img/clients/surge.svg"></div>
                        <div class="panel-body">
                            <h3 class="panel-title h4">Surge for iOS</h3>
                            <span class="link">App Store购买下载</span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-4">
                    <a class="panel panel-block panel-block-icon" href="{{url('/downloads/ssr-win.7z')}}">
                        <div class="panel-icon animate zoomIn"><img src="/home/img/clients/ss-windows.svg"></div>
                        <div class="panel-body">
                            <h3 class="panel-title h4">{{$app_config['website_name']}} for Windows</h3>
                            <span class="link">立即下载</span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-4">
                    <a class="panel panel-block panel-block-icon"
                       href="{{url('/downloads/ssr-android.apk')}}">
                        <div class="panel-icon animate zoomIn"><img src="/home/img/clients/ss-android.png"></div>
                        <div class="panel-body">
                            <h3 class="panel-title h4">{{$app_config['website_name']}} for Android</h3>
                            <span class="link">立即下载</span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-4">
                    <a class="panel panel-block panel-block-icon" href="{{url('/downloads/ssr-mac.dmg')}}">
                        <div class="panel-icon animate zoomIn"><img src="/home/img/clients/ss-mac.svg"></div>
                        <div class="panel-body">
                            <h3 class="panel-title h4">{{$app_config['website_name']}} for MacOS</h3>
                            <span class="link">立即下载</span>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <!-- /.page-section -->
@endsection
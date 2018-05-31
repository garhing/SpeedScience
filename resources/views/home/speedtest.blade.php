@extends('home.layouts')
@section('main_content')

    <div class="page-banner page-banner-subpage p-b-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-sm-6">
                    <div class="banner-slogan banner-slogan-hero">
                        <h1 class="slogan-title">{{$app_config['website_name']}}概念加速服务比业内标准速度快 5 倍！</h1>
                        <p class="slogan-desc">为您的所有设备添加{{$app_config['website_name']}}高速服务，立即开启无碍网络体验！</p>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 col-sm-6">
                    <div class="banner-image">
                        <div class="image image-vultr-faster-lg animate lightSpeedIn">
                            <span class="bird-fast bird-fast-lg image-shadow"><span
                                        class="bird-fast-lines"></span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-tabs tabs-responsive">
                @include('home.subpage.soft_sub')
            </div>
        </div>
    </div>
    <!-- /.page-banner -->



@endsection
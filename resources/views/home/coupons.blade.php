@extends('home.layouts')
@section('main_content')
    <!-- /.page-navbar -->

    <div class="page-banner page-banner-subpage banner-resources">
        <div class="container">
            <div class="banner-slogan banner-slogan-hero text-center">
                <h1 class="slogan-title">{{$app_config['website_name']}}优惠代码</h1>
                <p class="slogan-desc">我们提供一些优惠代码和促销政策帮助我们的用户以更低的价格体验和使用{{$app_config['website_name']}}的强大云服务。</p>
            </div>
        </div>
    </div>
    <!-- /.page-banner -->

    <div class="page-main">
        <div class="container">
            <div class="main-content main-content-center main-content-center-lg">

                <div style="margin-bottom: 32px;">
                    <p>{{$app_config['website_name']}}提供业界顶级的加速网络，帮助我们的用户通过{{$app_config['website_name']}}全球加速网络更快更安全地访问国际网际网络上的资源，并保护用户逇隐私。</p>
                </div>

                <a class="panel panel-coupon" href="" data-toggle="modal">
                    <div class="coupon-desc">
                        <div class="display-2 text-primary"><b>年付9折</b> 优惠</div>
                        <p>
                            对于{{$app_config['website_name']}}的新用户而言，在购买概念加速服务年付产品时，你将可以通过该优惠代码获得9折的优惠减免。使用这个优惠码来更加优惠地体验{{$app_config['website_name']}}的优秀服务。我们相信，当您使用过一次{{$app_config['website_name']}}服务后，您将不会再选择其他的同类服务。{{$app_config['website_name']}}提供着业界顶级的服务和支持。</p>
                    </div>
                    <div class="coupon-discount">
                        <span class="link">获取优惠代码<i class="zmdi zmdi-long-arrow-right"></i></span>
                    </div>
                </a>

                <a class="panel panel-coupon" href="{{url('/home/aff')}}">
                    <div class="coupon-desc">
                        <div class="display-2 text-primary"><b>推介</b> 计划</div>
                        <p>
                            所有的{{$app_config['website_name']}}概念加速用户，均可以通过推介计划来从中获取收益。将您独一无二的推介链接发给您的朋友，邀请他们使用{{$app_config['website_name']}}稳定的概念加速服务，将会获得您推荐用户消费额*10%的回报，并能够通过提取佣金来购买{{$app_config['website_name']}}的产品服务。</p>
                    </div>
                    <div class="coupon-discount">
                        <span class="link">了解详情<i class="zmdi zmdi-long-arrow-right"></i></span>
                    </div>
                </a>

            </div>
        </div>
    </div>
    <!-- /.page-section -->

    <div id="20OFF" class="modal modal-hero fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true"><i class="zmdi zmdi-close"></i></span></button>
                    <h3 class="modal-title">获取 <b class="text-primary">年付9折优惠</b> 的代码</h3>
                </div>
                <div class="modal-body">
                    <input id="input-ssdvps" class="form-control input-lg" type="text" value="10free" readonly/>
                    <div class="actions p-b-0">
                        <a href="" id="btn-copy-ssdvps" class="btn btn-block btn-lg btn-primary"
                           data-dismiss="modal">复制到剪贴板</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="FREEINSTALL" class="modal modal-hero fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true"><i class="zmdi zmdi-close"></i></span></button>
                    <h3 class="modal-title">获取 <b class="text-primary">免费安装</b> 的代码</h3>
                </div>
                <div class="modal-body">
                    <input id="input-ssdvps" class="form-control input-lg" type="text" value="FREEINSTALL" readonly/>
                    <div class="actions p-b-0">
                        <a href="{{url('/home/index')}}" id="btn-copy-ssdvps" class="btn btn-block btn-lg btn-primary"
                           data-dismiss="modal">复制到剪贴板</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
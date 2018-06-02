@extends('home.layouts')
@section('main_content')
    <div class="page-banner page-banner-subpage">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-sm-6">
                    <div class="banner-slogan banner-slogan-hero">
                        <h1 class="slogan-title">加入{{$app_config['website_name']}}推介计划！</h1>
                        <h2 class="slogan-desc">通过推荐他人使用{{$app_config['website_name']}}服务来获取高达<b>{{$app_config['referral_percent']*100}}%</b> 的收益！通过推介计划，您甚至可以免费使用问道科研服务。</h2>
                        <div class="actions"><a class="btn btn-lg btn-primary-light" href="{{url('/user/referral')}}">现在就加入推介计划！<i
                                        class="zmdi zmdi-long-arrow-right"></i></a></div>
                    </div>
                </div>
                <div class="col-md-8 col-md-7 col-sm-6">
                    <div class="banner-image">
                        <div class="image image-free-trial">
                            <div class="present animate">
                                <span class="present-top"><span></span></span>
                                <span class="present-body"><span class="server server-lg"></span></span>
                                <span class="present-bottom"><span></span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.banner-tabs -->
    </div>
    <!-- /.page-banner -->

    <div class="page-section">
        <div class="container">
            <div class="section-row row">
                <div class="col-sm-6 col-sm-push-6">
                    <div class="section-image">
                        <div class="image image-storage-how animate">
                            <span class="computer-screen"></span>
                            <span class="file-mobile"></span>
                            <span class="file"></span>
                            <span class="server image-shadow"><span class="server-lines"></span></span>
                            <span class="line line-dashed-y line-screen-top"></span>
                            <span class="line line-dashed-x line-screen"></span>
                            <span class="line line-dashed-x line-mobile"></span>
                            <span class="line line-dashed-y line-file-bottom"></span>
                            <span class="line line-dashed-x line-file animate"></span>
                        </div>
                    </div>
                    <!-- /.section-image -->
                </div>
                <div class="col-md-5 col-sm-6 col-sm-pull-6">
                    <h2 class="section-title">推介系统如何工作？</h2>
                    <p class="section-desc">
                        加入推介计划后，您将获得一个独一无二的链接，当您的朋友通过该链接访问{{$app_config['website_name']}}后，将会有一个Cookies存入他们的浏览器。在90天内，只要该用户注册了{{$app_config['website_name']}}，之后的任何消费您将可以从中获得消费金额<b> {{$app_config['referral_percent']*100}}% </b>的推介收益。无论他是否是第一次访问或直接保存{{$app_config['website_name']}}的直达链接。
                        请注意，若用户在注册之前点击了他人的推广链接，您的推广会被覆盖。
                        <a href="{{url('/user/referral')}}">查看我的推广链接</a></p>
                </div>
            </div>
            <div class="section-row row">

                <div class="col-sm-4">
                    <h3 class="h4">推介收益将何时到账？</h3>
                    <p>推介收益的我们将会在用户购买产品服务后立即记录该推介佣金，您始终可以通过用户中心查看到您的推介情况。<a href="{{url('/user/referral')}}">查看我的推介佣金</a></p>
                </div>

                <div class="col-sm-4">
                    <h3 class="h4">我是否可以提现推介佣金？</h3>
                    <p>当然可以！您只需要在推介佣金界面发起提现申请，并填写具体到账账户，不论是微信还是支付宝，我们就会在处理中直接将佣金打入您的账户中。<a href="{{url('/user/referral')}}">立即提现</a></p>
                </div>

                <div class="col-sm-4">
                    <h3 class="h4">推介佣金是否可以用于购买{{$app_config['website_name']}}服务？</h3>
                    <p>我们也可以提现推介佣金到您的{{$app_config['website_name']}}账户，可以用于购买{{$app_config['website_name']}}的任何服务！通过推介计划，您甚至可以免费使用{{$app_config['website_name']}}服务。</p>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section section-dark section-center">
        <div class="container">
            <div class="section-image m-b-60">
                <div class="image image-no-payment animate">
                    <span class="payment-hand"></span>
                    <span class="payment-coin payment-coin-md"></span>
                    <span class="payment-coin"></span>
                    <span class="payment-cross"></span>
                </div>
            </div>
            <!-- /.section-image -->
            <h2 class="section-title">我是否需要支付费用？</h2>
            <p class="section-desc m-b-20">
                您无需为推介计划支付任何的费用，在您选择加入推介计划后，您将可以直接通过推介{{$app_config['website_name']}}的产品与服务来获取收益，{{$app_config['website_name']}}不会在此过程中收取任何的额外费用。</p>
        </div>
    </div>

    <div class="page-section">
        <div class="container">
            <div class="section-row row">
                <div class="col-sm-6 col-sm-push-6">
                    <div class="section-image">
                        <div class="image image-new-users">
                            <span class="user image-shadow-sm animate zoomIn"></span>
                            <span class="user user-sm image-shadow-sm animate zoomIn"
                                  data-animation-delay="0.2s"></span>
                            <span class="user user-sm image-shadow-sm animate zoomIn"
                                  data-animation-delay="0.4s"></span>
                            <span class="user user-xs image-shadow-sm animate zoomIn"
                                  data-animation-delay="0.6s"></span>
                            <span class="user user-xs image-shadow-sm animate zoomIn"
                                  data-animation-delay="0.8s"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-6 col-sm-pull-6">
                    <h2 class="section-title">谁有资格加入{{$app_config['website_name']}}推介计划？</h2>
                    <p class="section-desc">任何{{$app_config['website_name']}}的客户都可以加入推介计划来从中获取收益。</p>
                </div>
            </div>
            <div class="section-row text-center">
                <h2 class="section-title">有任何问题？我们随时准备协助您！</h2>
                <div class="actions"><a class="btn btn-lg btn-primary btn-outline" href="{{url('/home/about#contact_us')}}">联系我们<i
                                class="zmdi zmdi-long-arrow-right"></i></a></div>
            </div>
        </div>
    </div>
@endsection
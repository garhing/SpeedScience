@extends('home.layouts')
@section('main_content')
    <!-- /.page-navbar -->


    <div class="page-banner page-banner-subpage p-b-0 text-center">
        <div class="container">
            <div class="banner-slogan">
                <h1 class="slogan-title">套餐 &amp; 价格</h1>

                <h2 class="slogan-desc">现在加入{{$app_config['website_name']}}，即可使用高达250Mbps高速加速服务。 新用户注册还可享受年付优惠！</h2>
            </div>
            <!-- /.banner-slogan -->
            <div class="banner-tabs banner-tabs-pricing">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <span><i class="service-icon service-icon-compute image-shadow-sm"></i><span>标准加速</span></span>
                    </li>
                    <li>
                        <a href="{{url('/home/game_pricing')}}"><i
                                    class="service-icon service-icon-storage image-shadow-sm"></i><span>游戏加速</span></a>
                    </li>
                    <li>
                        <a href="{{url('/home/host_pricing')}}"><i
                                    class="service-icon service-icon-dedicated image-shadow-sm"></i><span>Linux主机</span></a>
                    </li>
                </ul>
            </div>
            <!-- /.banner-tabs -->
        </div>
    </div>
    <!-- /.page-banner -->

    <div class="page-section">
        <div class="container">
            <div class="packages-switcher monthly">
                <span>年付优惠</span>
                <span>月付价格</span>
            </div>

            <div class="packages">
                <div class="packages-row row">
                    <div class="col-sm-3 col-xs-6">
                        <a href="#" class="package ">
                            <div class="package-header">
                                <div class="gv"></div>
                                <h3 class="package-title">5GB 流量/月 </h3>
                                <span class="package-price" data-hourly="￥85" data-monthly="￥10"><span>￥10</span></span>
                            </div>
                            <div class="package-body" style="position: relative;">
                                <ul>
                                    <li><strong>9</strong> 数据中心</li>
                                    <li><strong>20TB</strong> 总带宽</li>
                                    <li><strong>40+</strong> 智能线路</li>
                                </ul>
                            </div>
                        </a>
                        <!-- /.package -->
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <a href="#" class="package great_value">
                            <div class="package-header">
                                <div class="gv"></div>
                                <h3 class="package-title">20GB 流量/月</h3>
                                <span class="package-price" data-hourly="￥188"
                                      data-monthly="￥20"><span>￥20</span></span>
                            </div>
                            <div class="package-body" style="position: relative;">
                                <ul>
                                    <li><strong>9</strong> 数据中心</li>
                                    <li><strong>20TB</strong> 总带宽</li>
                                    <li><strong>40+</strong> 智能线路</li>
                                </ul>
                            </div>
                        </a>
                        <!-- /.package -->
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <a href="#" class="package ">
                            <div class="package-header">
                                <div class="gv"></div>
                                <h3 class="package-title">30GB 流量/月</h3>
                                <span class="package-price" data-hourly="￥284"
                                      data-monthly="￥28"><span>￥28</span></span>
                            </div>
                            <div class="package-body" style="position: relative;">
                                <ul>
                                    <li><strong>9</strong> 数据中心</li>
                                    <li><strong>20TB</strong> 总带宽</li>
                                    <li><strong>40+</strong> 智能线路</li>
                                </ul>
                            </div>
                        </a>
                        <!-- /.package -->
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <a href="#" class="package ">
                            <div class="package-header">
                                <div class="gv"></div>
                                <h3 class="package-title">40GB 流量/月</h3>
                                <span class="package-price" data-hourly="￥380"
                                      data-monthly="￥36"><span>￥36</span></span>
                            </div>
                            <div class="package-body" style="position: relative;">
                                <ul>
                                    <li><strong>9</strong> 数据中心</li>
                                    <li><strong>20TB</strong> 总带宽</li>
                                    <li><strong>40+</strong> 智能线路</li>
                                </ul>
                            </div>
                        </a>
                        <!-- /.package -->
                    </div>
                </div>
            </div>
            <div class="packages">
                <div class="packages-row row">
                    <div class="col-sm-3 col-xs-6">
                        <a href="#" class="package ">
                            <div class="package-header">
                                <div class="gv"></div>
                                <h3 class="package-title">50GB 流量/月</h3>
                                <span class="package-price" data-hourly="￥476"
                                      data-monthly="￥44"><span>￥44</span></span>
                            </div>
                            <div class="package-body" style="position: relative;">
                                <ul>
                                    <li><strong>9</strong> 数据中心</li>
                                    <li><strong>20TB</strong> 总带宽</li>
                                    <li><strong>40+</strong> 智能线路</li>
                                </ul>
                            </div>
                        </a>
                        <!-- /.package -->
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <a href="#" class="package ">
                            <div class="package-header">
                                <div class="gv"></div>
                                <h3 class="package-title">60GB 流量/月</h3>
                                <span class="package-price" data-hourly="￥572"
                                      data-monthly="￥52"><span>￥52</span></span>
                            </div>
                            <div class="package-body" style="position: relative;">
                                <ul>
                                    <li><strong>9</strong> 数据中心</li>
                                    <li><strong>20TB</strong> 总带宽</li>
                                    <li><strong>40+</strong> 智能线路</li>
                                </ul>
                            </div>
                        </a>
                        <!-- /.package -->
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <a href="#" class="package ">
                            <div class="package-header">
                                <div class="gv"></div>
                                <h3 class="package-title">70GB 流量/月</h3>
                                <span class="package-price" data-hourly="￥668"
                                      data-monthly="￥60"><span>￥60</span></span>
                            </div>
                            <div class="package-body" style="position: relative;">
                                <ul>
                                    <li><strong>9</strong> 数据中心</li>
                                    <li><strong>20TB</strong> 总带宽</li>
                                    <li><strong>40+</strong> 智能线路</li>
                                </ul>
                            </div>
                        </a>
                        <!-- /.package -->
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <a href="#" class="package ">
                            <div class="package-header">
                                <div class="gv"></div>
                                <h3 class="package-title">无限流量</h3>
                                <span class="package-price" data-hourly="￥588"
                                      data-monthly="￥100"><span>￥100</span></span>
                            </div>
                            <div class="package-body" style="position: relative;">
                                <ul>
                                    <li><strong>9</strong> 数据中心</li>
                                    <li><strong>20TB</strong> 总带宽</li>
                                    <li><strong>40+</strong> 智能线路</li>
                                </ul>
                            </div>
                        </a>
                        <!-- /.package -->
                    </div>
                </div>
            </div>

            <div class="actions text-center">
                <a class="btn btn-primary btn-lg" href="#">立即注册使用高速服务<i class="zmdi zmdi-long-arrow-right"></i></a>
            </div>
        </div>
    </div>
    <!-- /.page-section -->

    <div class="page-section section-blue section-center">
        <div class="container">
            <div class="section-image">
                <div class="image image-vultr-faster animate lightSpeedIn">
                    <span class="bird-fast image-shadow-sm"><span class="bird-fast-lines"></span></span>
                </div>
            </div>
            <h2 class="section-title">{{$app_config['website_name']}}加速服务比业内标准速度快 4 倍！</h2>

            <p class="section-desc">{{$app_config['website_name']}}测试标准服务与同类型供应商速度。查看为何{{$app_config['website_name']}}加速服务生而不同！</p>

            <div class="actions">
                <a class="btn btn-light btn-outline btn-lg" href="{{url('/home/speedtest')}}">查看测试结果<i
                            class="zmdi zmdi-long-arrow-right"></i></a>
            </div>
        </div>
    </div>
    <!-- /.page-section -->

    <div class="page-section section-center">
        <div class="container">

            <h2 class="section-title">简单、高效、易用</h2>

            <p class="section-desc">现在就开始享用{{$app_config['website_name']}}的全球加速网络带来的便捷体验！</p>

            <div class="features features-icon-top features-center">
                <div class="row">
                    <div class="col-sm-3 col-xs-6">
                        <div class="feature"><i class="icon icon-lg icon-realtime-protection animate zoomIn"></i>
                            <h4>全天候工单支持，业界最佳技术支持</h4>
                        </div>
                    </div>
                    <!-- /.feature -->
                    <div class="col-sm-3 col-xs-6">
                        <div class="feature"><i class="icon icon-lg icon-globe animate zoomIn"></i>
                            <h4>超过40个全球{{$app_config['website_name']}}加速网络连接点</h4>
                        </div>
                    </div>
                    <!-- /.feature -->
                    <div class="clear-xs"></div>
                    <div class="col-sm-3 col-xs-6">
                        <div class="feature"><i class="icon icon-lg icon-helping-hand animate zoomIn"></i>
                            <h4>100%全节点SLA保证，随时畅通的高效加速</h4>
                        </div>
                    </div>
                    <!-- /.feature -->
                    <div class="col-sm-3 col-xs-6">
                        <div class="feature"><i class="icon icon-lg icon-electronics animate zoomIn"></i>
                            <h4>安全稳定的流加密算法，安全与速度兼得</h4>
                        </div>
                    </div>
                    <!-- /.feature -->
                </div>
                <div class="row">
                    <div class="col-sm-3 col-xs-6">
                        <div class="feature"><i class="icon icon-lg icon-broadcasting animate zoomIn"></i>
                            <h4>连接点智能分流，多重负载均衡机制</h4>
                        </div>
                    </div>
                    <!-- /.feature -->
                    <div class="col-sm-3 col-xs-6">
                        <div class="feature"><i class="icon icon-lg icon-multiple-devices animate zoomIn"></i>
                            <h4>全平台支持，一个帐号畅通你的所有设备</h4>
                        </div>
                    </div>
                    <!-- /.feature -->
                    <div class="clear-xs"></div>
                    <div class="col-sm-3 col-xs-6">
                        <div class="feature"><i class="icon icon-lg icon-admin-tools animate zoomIn"></i>
                            <h4>简单易用的控制面板，无需任何学习成本</h4>
                        </div>
                    </div>
                    <!-- /.feature -->
                    <div class="col-sm-3 col-xs-6">
                        <div class="feature"><i class="icon icon-lg icon-last-hour animate zoomIn"></i>
                            <h4>秒级开通，付款后瞬间部署完成，无需等待</h4>
                        </div>
                    </div>
                    <!-- /.feature -->
                </div>
            </div>
            <!-- /.features -->
            <div class="actions">
                <a class="btn btn-lg btn-primary btn-outline" href="{{url('/home/features')}}">查看所有特性<i
                            class="zmdi zmdi-long-arrow-right"></i></a>
            </div>
        </div>
    </div>
    <!-- /.page-section -->

    <div class="page-section section-center">
        <div class="container">
            <h2 class="section-title">常见问题</h2>
            <ul class="accordion">

                <li class="open">
                    <h3 class="accordion-title h4"><span
                                class="plus-icon animate zoomIn"><span></span><span></span></span>
                        怎么付款购买加速服务？
                    </h3>
                    <div class="accordion-body collapse in">
                        {{$app_config['website_name']}}采用支付宝付款。所有的{{$app_config['website_name']}}套餐服务都为预付费，在购买服务后，即可使用加速服务。{{$app_config['website_name']}}的月付套餐，包含30天内有效期；年付的套餐，包含365天有效期限。在账单到期前一个星期，{{$app_config['website_name']}}会自动生成续费账单。在支付帐单后，即可延长相应有效期。
                    </div>
                </li>


                <li>
                    <h3 class="accordion-title h4">
                        <span class="plus-icon animate zoomIn"><span></span><span></span></span>
                        我可以在多少设备上使用？
                    </h3>
                    <div class="accordion-body collapse">
                        我们不限制您的设备登录数量，但是为了避免用户将{{$app_config['website_name']}}账户泄漏或者主动分享带来的问题，我们限制标准服务只能在两个公网IP同时登录，这已经足够满足您在家和在外同时使用{{$app_config['website_name']}}的加速服务。
                    </div>
                </li>


                <li>
                    <h3 class="accordion-title h4">
                        <span class="plus-icon animate zoomIn"><span></span><span></span></span>
                        你们都支持什么系统，手机支持吗？
                    </h3>
                    <div class="accordion-body collapse">
                        {{$app_config['website_name']}}加速服务，目前支持的系统包含：iOS9、Android、Windows、OSX、Ubuntu、Openwrt路由器、极路由。其中，在Openwrt路由器使用，需您自行安装对应插件；在极路由（1S以上）使用，需配合{{$app_config['website_name']}}专属插件。在您订购服务后，可提交工单，获取插件安装及使用方法。
                    </div>
                </li>
            </ul>
        </div>
    </div>
@endsection
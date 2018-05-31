@extends('home.layouts')
@section('main_content')

    <div class="page-banner page-banner-subpage p-b-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-sm-6">
                    <div class="banner-slogan banner-slogan-hero">
                        <h1 class="slogan-title">科研加速</h1>
                        <h2 class="slogan-desc">{{$app_config['website_name']}}加速服务拥有比业内平均速度快 5
                            倍的体验！为您的所有设备添加{{$app_config['website_name']}}服务，立即开启无碍网络体验！</h2>
                        <div class="actions"><a class="btn btn-lg btn-primary-light" href="{{url('/user/index')}}">购买加速服务<i
                                        class="zmdi zmdi-long-arrow-right"></i></a></div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 col-sm-6">
                    <div class="banner-image">
                        <i class="service-icon service-icon-xlg service-icon-compute image-shadow"></i>
                    </div>
                </div>
            </div>
            <div class="banner-tabs tabs-responsive">
                @include('home.subpage.feas_sub')
            </div>
        </div>
    </div>
    <!-- /.page-banner -->

    <div class="page-section">
        <div class="container">
            <div class="section-row row">
                <div class="col-sm-6 col-sm-push-6">
                    <div class="section-image">
                        <div class="image image-intstant-deployment">
                            <div class="location-map location-map-sm location-map-grey">
                                <div class="location-container">
                                    <div class="location location-seattle animate zoomIn">
                                        <span class="location-name"><span>西雅图</span></span><span
                                                class="location-pin"></span></div>
                                    <div class="location location-los-angeles animate zoomIn">
                                        <span class="location-name"><span>洛杉矶</span></span><span
                                                class="location-pin"></span>
                                    </div>
                                    <div class="location location-dallas animate zoomIn"><span
                                                class="location-name"><span>达拉斯</span></span><span
                                                class="location-pin"></span>
                                    </div>
                                    <div class="location location-atlanta animate zoomIn">
                                        <span class="location-name"><span>亚特兰大</span></span><span
                                                class="location-pin"></span></div>
                                    <div class="location location-hongkong animate zoomIn">
                                        <span class="location-name"><span>香港</span></span><span
                                                class="location-pin"></span>
                                    </div>
                                    <div class="location location-singapore animate zoomIn">
                                        <span class="location-name"><span>新加坡</span></span><span
                                                class="location-pin"></span>
                                    </div>
                                    <div class="location location-amsterdam animate zoomIn">
                                        <span class="location-name"><span>阿姆斯特丹</span></span><span
                                                class="location-pin"></span>
                                    </div>
                                    <div class="location location-frankfurt animate zoomIn">
                                        <span class="location-name"><span>法兰克福</span></span><span
                                                class="location-pin"></span>
                                    </div>

                                    <div class="location location-tokyo animate zoomIn">
                                        <span class="location-name"><span>日本</span></span><span
                                                class="location-pin"></span></div>

                                    <div class="map map-grey"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.section-image -->
                </div>
                <div class="col-md-5 col-sm-6 col-sm-pull-6">
                    <h2 class="section-title">遍布全球的服务器</h2>
                    <p class="section-desc">
                        {{$app_config['website_name']}}提供分布全球的加速服务，使得您可以在任何地方开展国际贸易、收发Gmail及观看视频。位于西雅图、洛杉矶、达拉斯、亚特兰大、法兰克福、阿姆斯特丹、香港、日本、新加坡等九个城市。</p>
                </div>
            </div>
            <div class="features features-icon-left">
                <div class="row">
                    <div class="col-sm-4 col-xs-6">
                        <div class="feature"><i class="icon icon-lg icon-processor animate zoomIn"></i>
                            <h3 class="h4">安全加密</h3>
                            <p>安全稳定的流加密算法，安全与速度兼得。支持多种256位安全加密，保障您的使用。</p>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-6">
                        <div class="feature"><i class="icon icon-lg icon-infinity animate zoomIn"></i>
                            <h3 class="h4">智能分流</h3>
                            <p>连接点智能分流，多重负载均衡机制。在超过40个全球{{$app_config['website_name']}}加速网络连接点间流动。</p>
                        </div>
                    </div>
                    <div class="clear-xs"></div>
                    <div class="col-sm-4 col-xs-6">
                        <div class="feature"><i class="icon icon-lg icon-admin-tools animate zoomIn"></i>
                            <h3 class="h4">简单后台</h3>
                            <p>简单易用的控制面板，无需任何学习成本。付款后一秒开通，快捷迅速。</p>
                        </div>
                    </div>
                    <div class="clear-sm"></div>
                    <div class="col-sm-4 col-xs-6">
                        <div class="feature"><i class="icon icon-lg icon-agreement animate zoomIn"></i>
                            <h3 class="h4">协议保障</h3>
                            <p>100%全节点SLA保证，随时畅通的高效加速。全天候工单支持，业界最佳技术售后。</p>
                        </div>
                    </div>
                    <div class="clear-xs"></div>
                    <div class="col-sm-4 col-xs-6">
                        <div class="feature"><i class="icon icon-lg icon-settings animate zoomIn"></i>
                            <h3 class="h4">强力服务器</h3>
                            <p>所有{{$app_config['website_name']}}服务器，均采用强劲Intel内核。不仅快速，更高效。</p>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-6">
                        <div class="feature"><i class="icon icon-lg icon-multiple-devices animate zoomIn"></i>
                            <h3 class="h4">全平台通用</h3>
                            <p>全平台支持，一个帐号畅通你的所有设备。iOS、安卓、Windows、OSX均支持。</p>
                        </div>
                    </div>
                </div>
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
            <h2 class="section-title">{{$app_config['website_name']}}概念加速服务比业内标准速度快 5 倍！</h2>

            <p class="section-desc">为您的所有设备添加{{$app_config['website_name']}}高速服务，立即开启无碍网络体验！</p>

        </div>
    </div>
    <!-- /.page-section -->
    <div class="page-section section-center">
        <div class="container">
            <h2 class="section-title">{{$app_config['website_name']}}概念加速服务测试</h2>

            <p class="section-desc">我们将{{$app_config['website_name']}}概念加速服务速度与业内平均水平作比较。</p>

            <div class="row">
                <div class="col-sm-4">
                    <div class="benchmark benchmark-unixbench benchmark-low-end">
                        <div class="benchmark-title">
                            <h3>下载速度</h3>
                            <small>越大越好</small>
                        </div>
                        <div class="benchmark-graph">
                            <div class="graph">
                                <ul class="graph-grid">
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ul>
                                <ul class="graph-bars">
                                    <li>
                                        <div class="bar-holder">
                                            <span class="bar bar-vultr animate"><span>{{$app_config['website_name']}}</span></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="bar-holder">
                                            <span class="bar bar-rackspace animate"><span>业内高端</span></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="bar-holder">
                                            <span class="bar bar-aws animate"><span>业内普通</span></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <ul class="axis axis-y">
                                <li>350 Mbps</li>
                                <li>300 Mbps</li>
                                <li>250 Mbps</li>
                                <li>200 Mbps</li>
                                <li>150 Mbps</li>
                                <li>100 Mbps</li>
                                <li>50 Mbps</li>
                                <li>0 Mbps</li>
                            </ul>
                            <ul class="axis axis-x">
                                <li>{{$app_config['website_name']}}</li>
                                <li>业内高端</li>
                                <li>业内普通</li>
                            </ul>
                        </div>
                        <!-- /.benchmark-graph -->
                    </div>
                    <!-- /.benchmark -->
                </div>
                <div class="col-sm-4">
                    <div class="benchmark benchmark-performance benchmark-low-end">
                        <div class="benchmark-title">
                            <h3>节点数目</h3>
                            <small>越多越好</small>
                        </div>
                        <div class="benchmark-graph">
                            <div class="graph">
                                <ul class="graph-grid">
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ul>
                                <ul class="graph-bars">
                                    <li>
                                        <div class="bar-holder">
                                            <span class="bar bar-vultr animate"><span>{{$app_config['website_name']}}</span></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="bar-holder">
                                            <span class="bar bar-rackspace animate"><span>业内高端</span></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="bar-holder">
                                            <span class="bar bar-aws animate"><span>业内普通</span></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <ul class="axis axis-y">
                                <li>70</li>
                                <li>60</li>
                                <li>50</li>
                                <li>40</li>
                                <li>30</li>
                                <li>20</li>
                                <li>10</li>
                                <li>0</li>
                            </ul>
                            <ul class="axis axis-x">
                                <li>{{$app_config['website_name']}}</li>
                                <li>业内高端</li>
                                <li>业内普通</li>
                            </ul>
                        </div>
                        <!-- /.benchmark-graph -->
                    </div>
                    <!-- /.benchmark -->
                </div>
                <div class="col-sm-4">
                    <div class="benchmark benchmark-io benchmark-low-end">
                        <div class="benchmark-title">
                            <h3>客户满意度</h3>
                            <small>百分比越高越好</small>
                        </div>
                        <div class="benchmark-graph">
                            <div class="graph">
                                <ul class="graph-grid">
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ul>
                                <ul class="graph-bars">
                                    <li>
                                        <div class="bar-holder">
                                            <span class="bar bar-vultr animate"><span>{{$app_config['website_name']}}<sup>*</sup></span></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="bar-holder">
                                            <span class="bar bar-rackspace animate"><span>业内高端</span></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="bar-holder">
                                            <span class="bar bar-aws animate"><span>业内普通</span></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <ul class="axis axis-y">
                                <li>100%</li>
                                <li>95%</li>
                                <li>90%</li>
                                <li>...</li>
                                <li>20%</li>
                                <li>15%</li>
                                <li>10%</li>
                                <li>5%</li>
                            </ul>
                            <ul class="axis axis-x">
                                <li>{{$app_config['website_name']}}</li>
                                <li>业内高端</li>
                                <li>业内普通</li>
                            </ul>
                        </div>
                        <!-- /.benchmark-graph -->
                        * 针对{{$app_config['website_name']}} 200位用户抽查
                    </div>
                    <!-- /.benchmark -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.page-section -->
    <div class="page-section">
        <div class="container">
            <div class="section-row row">
                <div class="col-sm-6 col-sm-push-6">
                    <div class="section-image">
                        <div class="image image-active-in-sec"><span class="stop-watch image-shadow animate fadeInLeft"><span
                                        class="stop-watch-lines"></span><span class="stop-watch-hand animate rotateIn"
                                                                              data-animation-delay=".5s"
                                                                              data-animation-duration="5s"></span></span><i
                                    class="arrow-right zmdi zmdi-long-arrow-right animate fadeInLeft"></i>
                            <span class="server animate fadeInRight"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-6 col-sm-pull-6">
                    <h2 class="section-title">一秒内开通，全天候售后</h2>
                    <p class="section-desc">在您付款后，{{$app_config['website_name']}}将在一秒内处理您的订单，并立即开通。快捷迅速。全天候售后支持，随时联系。</p>
                </div>
            </div>
            <div class="section-row row">
                <div class="col-sm-6">
                    <div class="section-image">
                        <div class="image image-advanced-networking"><span
                                    class="globe image-shadow animate zoomIn"></span><span
                                    class="circle circle-lg circle-v4 animate zoomIn"><span>IPv4</span></span><span
                                    class="circle circle-lg circle-v6 animate zoomIn"><span>IPv6</span></span><span
                                    class="line-dashed-x line-v4 animate"></span>
                            <span class="line-dashed-x line-v6 animate"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-6 col-md-push-1">
                    <h2 class="section-title">先进的网络连接</h2>
                    <p class="section-desc">
                        {{$app_config['website_name']}}大多数机房，不仅可以在IPv4环境下使用，还支持与IPv6互通。在您的运营商部署IPv6之后，您即可使用更快捷的IPv6网络服务。</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-push-6">
                    <div class="section-image">
                        <div class="image image-iso-snapshot"><span
                                    class="server image-shadow animate zoomIn"></span><span
                                    class="snapshot animate zoomIn" data-animation-delay=".5s"></span></div>
                    </div>
                    <!-- /.section-image -->
                </div>
                <div class="col-md-5 col-sm-6 col-sm-pull-6">
                    <h2 class="section-title">更高权限</h2>
                    <p class="section-desc">您可以自定义设置您的{{$app_config['website_name']}}密码。此外，若您需要修改连接密码，仅需在后台简单操作即可。您完全掌握您的账户。</p>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('home.layouts')
@section('main_content')
        <!-- /.page-navbar -->
        <div class="page-banner page-banner-subpage p-b-0 text-center">
            <div class="container">
                <div class="banner-slogan">
                    <h1 class="slogan-title">游戏加速</h1>

                    <h2 class="slogan-desc">ShadowsocksR云加速专业服务，精选千兆带宽服务器、日本IIJ中国电信直连线路、韩国直连线路、Windows Azure、LeaseWeb等国际知名数据中心最好网络，将最好的游戏加速服务带给用户。</h2>
                </div>
                <!-- /.banner-slogan -->
                <div class="banner-tabs banner-tabs-pricing">
                    <ul class="nav nav-tabs">
                        <li><a href="{{url('/home/features')}}"><i class="service-icon service-icon-compute image-shadow-sm"></i><span>概念加速</span></a>
                        </li>
                        <li class="active">
                            <span><i class="service-icon service-icon-storage image-shadow-sm"></i><span>游戏加速</span></span>
                        </li>
                        <li>
                            <a href="{{url('/home/datacenter')}}"><i class="service-icon service-icon-dedicated image-shadow-sm"></i><span>数据中心</span></a>
                        </li>
                    </ul>
                </div>
                <!-- /.banner-tabs -->
            </div>
        </div>
        <!-- /.page-banner -->

        <div class="page-section">
            <div class="container">
                <div class="packages">
                    <div class="package package-single package-slider-option">
                        <div class="package-header">
                            <h3 class="package-title"></h3>
                            <span class="package-price">
							<span class="amount"></span>
                            <span class="cycle"></span>
                            </span>

                            <div class="package-slider">
                                <div class="slider">
                                    <div class="slider-handle"></div>
                                </div>
                                <div class="slider-actions">
                                    <button class="btn btn-xs btn-link btn-icon" type="button">
									<i class="zmdi zmdi-minus"></i>
								</button>
                                    <button class="btn btn-xs btn-link btn-icon" type="button">
									<i class="zmdi zmdi-plus"></i>
								</button>
                                </div>
                            </div>
                        </div>
                        <div class="package-body">
                            <ul>
                                <li>延迟低至 <strong>8ms</strong> </li>
                                <li><strong>99.999%</strong> 在线保障</li>
                                <li>仅 <strong>￥6</strong> 每 GB</li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.package -->
                </div>
                <!-- /.packages -->

                <div class="actions text-center">
                    <a class="btn btn-primary btn-lg" href="#">立即注册使用高速服务<i class="zmdi zmdi-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <!-- /.page-section -->

        <div class="page-section section-blue section-center">
            <div class="container">
                <h2 class="section-title">可靠性及延迟</h2>

                <p class="section-desc">ShadowsocksR游戏加速提供100%的可用性。包含九条线路的游戏节点，保障您的放心使用。此外，ShadowsocksR游戏节点，延迟均在8-40ms左右。快的令人惊奇。</p>

                <div class="section-image">

                    <div class="aspect_div_560_400 image-reliability-sm">
                        <div>
                            <div class="server server-lg image-shadow"></div>
                            <div class="server server-left image-shadow">
                                <div class="lock"></div>
                            </div>
                            <div class="server server-right image-shadow">
                                <div class="lock"></div>
                            </div>
                            <div class="server server-center image-shadow">
                                <div class="lock"></div>
                            </div>
                            <div class="line line-dashed-x line-server-top"></div>
                            <div class="line line-dashed-y line-server-left"></div>
                            <div class="line line-dashed-y line-server-right"></div>
                            <div class="line line-dashed-y line-server-center"></div>
                        </div>
                    </div>

                    <div class="image image-reliability animate">
                        <div class="server server-lg image-shadow"></div>
                        <div class="server server-left">
                            <div class="lock image-shadow-sm"></div>
                        </div>
                        <div class="server server-center">
                            <div class="lock image-shadow-sm"></div>
                        </div>
                        <div class="server server-right">
                            <div class="lock image-shadow-sm"></div>
                        </div>
                        <div class="line line-dashed-x line-server-top"></div>
                        <div class="line line-dashed-y line-server-right"></div>
                        <div class="line line-dashed-y line-server-left"></div>
                        <div class="line line-dashed-y line-server-center"></div>
                        <div class="file file-top"></div>
                        <div class="file file-left"></div>
                        <div class="file file-right"></div>
                        <div class="file file-center"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.page-section -->

        <div class="page-section section-center">
            <div class="container">
                <h2 class="section-title">性能</h2>

                <p class="section-desc">ShadowsocksR所提供的游戏加速，下载速度高达16M/s，节点延迟低至8ms！此外，游戏节点所采用服务器，均为高速SSD固态硬盘、Intel高性能CPU及高速网口。</p>

                <div class="section-image">
                    <div class="image image-performance">
                        <div class="ssd"></div>
                        <div class="speedometer image-shadow">
                            <div class="speedometer-hand animate speed infinite"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.page-section -->
@endsection

@section('script')
    <script>
        var g_plan_array = [];

        $(function() {
            g_plan_array = getPlanArray();

            var packageSlider = $('.package-slider .slider');
            packageSlider.slider({
                min: 1,
                max: ((g_plan_array.length >= 1) ? g_plan_array.length : 1),
                step: 1,
                range: 'min',
                slide: function(event, ui) {
                    updatePlan(ui.value - 1);
                },
                change: function(event, ui) {
                    updatePlan(ui.value - 1);
                }
            });
            $('.slider-actions .btn:first-child').on('click', function() {
                packageSlider.slider('value', packageSlider.slider('value') - 1);
            });
            $('.slider-actions .btn:last-child').on('click', function() {
                packageSlider.slider('value', packageSlider.slider('value') + 1);
            });

            updatePlan(0);
        });

        function getPlanArray() {
            var plan_array = [];
            var plan = {};

            plan = {};
            plan['title'] = '5GB\x20流量';
            plan['price_monthly'] = '￥30\x2F月';
            plan['price_hourly'] = '￥1\x2F天';
            plan_array.push(plan);
            plan = {};
            plan['title'] = '10GB\x20流量';
            plan['price_monthly'] = '￥60\x2F月';
            plan['price_hourly'] = '￥2\x2F天';
            plan_array.push(plan);
            plan = {};
            plan['title'] = '15GB\x20流量';
            plan['price_monthly'] = '￥90\x2F月';
            plan['price_hourly'] = '￥0.007\x2Fh';
            plan_array.push(plan);
            plan = {};
            plan['title'] = '20GB\x20流量';
            plan['price_monthly'] = '￥120\x2F月';
            plan['price_hourly'] = '￥0.015\x2Fh';
            plan_array.push(plan);
            plan = {};
            plan['title'] = '3M\x20独立带宽';
            plan['price_monthly'] = '￥100\x2F月';
            plan['price_hourly'] = '￥0.037\x2Fh';
            plan_array.push(plan);
            plan = {};
            plan['title'] = '5M\x20独立带宽';
            plan['price_monthly'] = '￥530\x2F月';
            plan['price_hourly'] = '￥0.074\x2Fh';
            plan_array.push(plan);

            return plan_array;
        }

        function updatePlan(index) {
            if (index >= 0 && index < g_plan_array.length) {
                var plan_selected = g_plan_array[index];

                $(".package-title").html(plan_selected['title']);
                $(".package-price .amount").html(plan_selected['price_monthly']);
                $(".package-price .package-hourly").html(plan_selected['price_hourly']);
            }
        }
    </script>
@endsection
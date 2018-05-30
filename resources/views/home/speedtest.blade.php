@extends('home.layouts')
@section('main_content')

    <div class="page-banner page-banner-subpage p-b-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-sm-6">
                    <div class="banner-slogan banner-slogan-hero">
                        <h1 class="slogan-title">ShadowsocksR概念加速服务比业内标准速度快 5 倍！</h1>
                        <p class="slogan-desc">为您的所有设备添加ShadowsocksR高速服务，立即开启无碍网络体验！</p>
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
                <div class="tabs-container">
                    <ul class="nav nav-tabs text-center">
                        <li><a href="client.html">客户端</a></li>
                        <li class="active"><a href="speedtest.html">测速</a></li>
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
    <!-- /.page-banner -->

    <div class="page-section section-center">
        <div class="container">
            <h2 class="section-title">ShadowsocksR概念加速服务测试</h2>

            <p class="section-desc">我们将ShadowsocksR概念加速服务速度与业内平均水平作比较。</p>

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
                                            <span class="bar bar-vultr animate"><span>ShadowsocksR</span></span>
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
                                <li>ShadowsocksR</li>
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
                                            <span class="bar bar-vultr animate"><span>ShadowsocksR</span></span>
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
                                <li>ShadowsocksR</li>
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
                                            <span class="bar bar-vultr animate"><span>ShadowsocksR<sup>*</sup></span></span>
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
                                <li>ShadowsocksR</li>
                                <li>业内高端</li>
                                <li>业内普通</li>
                            </ul>
                        </div>
                        <!-- /.benchmark-graph -->
                        * 针对ShadowsocksR 200位用户抽查
                    </div>
                    <!-- /.benchmark -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.page-section -->

    <div class="page-section section-center">
        <div class="container">
            <h2 class="section-title">游戏加速测试</h2>

            <p class="section-desc">我们选取ShadowsocksR节点测试，所有结果取平均值。</p>

            <div class="row">
                <div class="col-sm-4">
                    <div class="benchmark benchmark-unixbench benchmark-mid-range">
                        <div class="benchmark-title">
                            <h3>下载速度</h3>
                            <small>越高越好</small>
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
                                            <span class="bar bar-vultr animate"><span>ShadowsocksR</span></span>
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
                                <li>16 MB/s</li>
                                <li>12 MB/s</li>
                                <li>10 MB/s</li>
                                <li>8 MB/s</li>
                                <li>6 MB/s</li>
                                <li>4 MB/s</li>
                                <li>2 MB/s</li>
                                <li>0 MB/s</li>
                            </ul>
                            <ul class="axis axis-x">
                                <li>游戏加速</li>
                                <li>业内高端</li>
                                <li>业内普通</li>
                            </ul>
                        </div>
                        <!-- /.benchmark-graph -->
                    </div>
                    <!-- /.benchmark -->
                </div>
                <div class="col-sm-4">
                    <div class="benchmark benchmark-performance benchmark-mid-range">
                        <div class="benchmark-title">
                            <h3>延迟测试</h3>
                            <small>越低越好</small>
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
                                            <span class="bar bar-vultr animate"><span>ShadowsocksR</span></span>
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
                                <li>400 ms</li>
                                <li>...</li>
                                <li>160 ms</li>
                                <li>...</li>
                                <li>40 ms</li>
                                <li>30 ms</li>
                                <li>20 ms</li>
                                <li>10 ms</li>
                            </ul>
                            <ul class="axis axis-x">
                                <li>游戏加速</li>
                                <li>业内高端</li>
                                <li>业内普通</li>
                            </ul>
                        </div>
                        <!-- /.benchmark-graph -->
                    </div>
                    <!-- /.benchmark -->
                </div>
                <div class="col-sm-4">
                    <div class="benchmark benchmark-io benchmark-mid-range">
                        <div class="benchmark-title">
                            <h3>游戏节点位置</h3>
                            <small>数据中心越多越好</small>
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
                                            <span class="bar bar-vultr animate"><span>ShadowsocksR</span></span>
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
                                <li>9</li>
                                <li>...</li>
                                <li>6</li>
                                <li>5</li>
                                <li>4</li>
                                <li>3</li>
                                <li>2</li>
                                <li>1</li>
                            </ul>
                            <ul class="axis axis-x">
                                <li>游戏加速</li>
                                <li>业内高端</li>
                                <li>业内普通</li>
                            </ul>
                        </div>
                        <!-- /.benchmark-graph -->
                    </div>
                    <!-- /.benchmark -->
                </div>
            </div>
        </div>
    </div>
@endsection
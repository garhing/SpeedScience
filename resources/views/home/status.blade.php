@extends('home.layouts')
@section('main_content')
    <!-- /.page-navbar -->

    <div class="page-banner page-banner-subpage banner-resources p-b-0">
        <div class="container">
            <div class="banner-slogan banner-slogan-hero text-center">
                <h1 class="slogan-title">线路状态</h1>
                <p class="slogan-desc">我们的线路健康状况将在此页面更新，以作为您选择节点的依据。</p>
            </div>
            <div class="banner-tabs tabs-responsive">
                <div class="tabs-container">
                    <ul class="nav nav-tabs text-center">
                        <li><a href="{{url('/home/client')}}">客户端</a></li>
                        <li><a href="{{url('/home/speedtest')}}">测速</a></li>
                        <li class="active"><a href="{{url('/home/status')}}">线路状态</a></li>
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

    <div class="page-section">
        <div class="container">


            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="panel panel-block panel-block-sm panel-location">
                        <div class="location-header">

                            <h3 class="h4"><img src="img/clients/singapore.png"> 新加坡 智能分流 1
                                <small>Singapore</small>
                            </h3>
                            <i class="zmdi zmdi-check-circle text-success"></i>
                        </div>
                        <div class="location-progress">
                            <div class="progress progress-sm">
                                <div class="progress-bar" style="width: 92%;"></div>
                            </div>
                        </div>
                        <ul class="location-info list-styled">
                            <li><span class="list-label">状态:</span> 在线</li>
                            <li><span class="list-label">空闲:</span> 92%</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="panel panel-block panel-block-sm panel-location">
                        <div class="location-header">
                            <h3 class="h4"><img src="img/clients/singapore.png"> 新加坡 智能分流 2
                                <small>Singapore</small>
                            </h3>
                            <i class="zmdi zmdi-check-circle text-success"></i>
                        </div>
                        <div class="location-progress">
                            <div class="progress progress-sm">
                                <div class="progress-bar" style="width: 98%;"></div>
                            </div>
                        </div>
                        <ul class="location-info list-styled">
                            <li><span class="list-label">状态:</span> OK</li>
                            <li><span class="list-label">空闲:</span> 98%</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="panel panel-block panel-block-sm panel-location">
                        <div class="location-header">
                            <h3 class="h4"><img src="img/clients/usa.png"> 美国 智能分流 1
                                <small>USA-LA</small>
                            </h3>
                            <i class="zmdi zmdi-check-circle text-success"></i>
                        </div>
                        <div class="location-progress">
                            <div class="progress progress-sm">
                                <div class="progress-bar" style="width: 90%;"></div>
                            </div>
                        </div>
                        <ul class="location-info list-styled">
                            <li><span class="list-label">状态:</span> OK</li>
                            <li><span class="list-label">空闲:</span> 90%</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="panel panel-block panel-block-sm panel-location">
                        <div class="location-header">
                            <h3 class="h4"><img src="img/clients/usa.png"> 美国 智能分流 2
                                <small>USA-LA</small>
                            </h3>
                            <i class="zmdi zmdi-check-circle text-success"></i>
                        </div>
                        <div class="location-progress">
                            <div class="progress progress-sm">
                                <div class="progress-bar" style="width: 83%;"></div>
                            </div>
                        </div>
                        <ul class="location-info list-styled">
                            <li><span class="list-label">状态:</span> OK</li>
                            <li><span class="list-label">空闲:</span> 83%</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="panel panel-block panel-block-sm panel-location">
                        <div class="location-header">
                            <h3 class="h4"><img src="img/clients/usa.png"> 美国 智能分流 3
                                <small>USA-LA</small>
                            </h3>
                            <i class="zmdi zmdi-check-circle text-success"></i>
                        </div>
                        <div class="location-progress">
                            <div class="progress progress-sm">
                                <div class="progress-bar" style="width: 98%;"></div>
                            </div>
                        </div>
                        <ul class="location-info list-styled">
                            <li><span class="list-label">状态:</span> OK</li>
                            <li><span class="list-label">空闲:</span> 98%</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="panel panel-block panel-block-sm panel-location">
                        <div class="location-header">
                            <h3 class="h4"><img src="img/clients/usa.png"> 美国 智能分流 4
                                <small>USA-LA</small>
                            </h3>
                            <i class="zmdi zmdi-check-circle text-success"></i>
                        </div>
                        <div class="location-progress">
                            <div class="progress progress-sm">
                                <div class="progress-bar" style="width: 100%;"></div>
                            </div>
                        </div>
                        <ul class="location-info list-styled">
                            <li><span class="list-label">状态:</span> 维护中</li>
                            <li><span class="list-label">空闲:</span> 100%</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="panel panel-block panel-block-sm panel-location">
                        <div class="location-header">
                            <h3 class="h4"><img src="img/clients/china.png"> 香港 智能分流 1
                                <small>China-Hongkong</small>
                            </h3>
                            <i class="zmdi zmdi-check-circle text-success"></i>
                        </div>
                        <div class="location-progress">
                            <div class="progress progress-sm">
                                <div class="progress-bar" style="width: 90%;"></div>
                            </div>
                        </div>
                        <ul class="location-info list-styled">
                            <li><span class="list-label">状态:</span> OK</li>
                            <li><span class="list-label">空闲:</span> 90%</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="panel panel-block panel-block-sm panel-location">
                        <div class="location-header">
                            <h3 class="h4"><img src="img/clients/china.png"> 香港 智能分流 2
                                <small>China-Hongkong</small>
                            </h3>
                            <i class="zmdi zmdi-check-circle text-success"></i>
                        </div>
                        <div class="location-progress">
                            <div class="progress progress-sm">
                                <div class="progress-bar" style="width: 96%;"></div>
                            </div>
                        </div>
                        <ul class="location-info list-styled">
                            <li><span class="list-label">状态:</span> OK</li>
                            <li><span class="list-label">空闲:</span> 96%</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="panel panel-block panel-block-sm panel-location">
                        <div class="location-header">
                            <h3 class="h4"><img src="img/clients/china.png"> 香港 智能分流 3
                                <small>China-Hongkong-九龙</small>
                            </h3>
                            <i class="zmdi zmdi-check-circle text-success"></i>
                        </div>
                        <div class="location-progress">
                            <div class="progress progress-sm">
                                <div class="progress-bar" style="width: 98%;"></div>
                            </div>
                        </div>
                        <ul class="location-info list-styled">
                            <li><span class="list-label">状态:</span> OK</li>
                            <li><span class="list-label">空闲:</span> 98%</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="panel panel-block panel-block-sm panel-location">
                        <div class="location-header">
                            <h3 class="h4"><img src="img/clients/china.png"> 香港 智能分流 4
                                <small>China-hongkong</small>
                            </h3>
                            <i class="zmdi zmdi-check-circle text-success"></i>
                        </div>
                        <div class="location-progress">
                            <div class="progress progress-sm">
                                <div class="progress-bar" style="width: 95%;"></div>
                            </div>
                        </div>
                        <ul class="location-info list-styled">
                            <li><span class="list-label">状态:</span> OK</li>
                            <li><span class="list-label">空闲:</span> 95%</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="panel panel-block panel-block-sm panel-location">
                        <div class="location-header">
                            <h3 class="h4"><img src="img/clients/china.png"> 香港 智能分流 5
                                <small>China-hongkong</small>
                            </h3>
                            <i class="zmdi zmdi-check-circle text-success"></i>
                        </div>
                        <div class="location-progress">
                            <div class="progress progress-sm">
                                <div class="progress-bar" style="width: 82%;"></div>
                            </div>
                        </div>
                        <ul class="location-info list-styled">
                            <li><span class="list-label">状态:</span> OK</li>
                            <li><span class="list-label">空闲:</span> 82%</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="panel panel-block panel-block-sm panel-location">
                        <div class="location-header">
                            <h3 class="h4"><img src="img/clients/japan.png"> 日本 智能分流 1
                                <small>Japan-Tokyo</small>
                            </h3>
                            <i class="zmdi zmdi-check-circle text-success"></i>
                        </div>
                        <div class="location-progress">
                            <div class="progress progress-sm">
                                <div class="progress-bar" style="width: 96%;"></div>
                            </div>
                        </div>
                        <ul class="location-info list-styled">
                            <li><span class="list-label">状态:</span> OK</li>
                            <li><span class="list-label">空闲:</span> 96%</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="panel panel-block panel-block-sm panel-location">
                        <div class="location-header">
                            <h3 class="h4"><img src="img/clients/japan.png"> 日本 智能分流 2
                                <small>Japan-Tokyo</small>
                            </h3>
                            <i class="zmdi zmdi-check-circle text-success"></i>
                        </div>
                        <div class="location-progress">
                            <div class="progress progress-sm">
                                <div class="progress-bar" style="width: 73%;"></div>
                            </div>
                        </div>
                        <ul class="location-info list-styled">
                            <li><span class="list-label">状态:</span> OK</li>
                            <li><span class="list-label">空闲:</span> 73%</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="panel panel-block panel-block-sm panel-location">
                        <div class="location-header">
                            <h3 class="h4"><img src="img/clients/japan.png"> 日本 智能分流 3
                                <small>Japan-Osaka</small>
                            </h3>
                            <i class="zmdi zmdi-check-circle text-success"></i>
                        </div>
                        <div class="location-progress">
                            <div class="progress progress-sm">
                                <div class="progress-bar" style="width: 91%;"></div>
                            </div>
                        </div>
                        <ul class="location-info list-styled">
                            <li><span class="list-label">状态:</span> OK</li>
                            <li><span class="list-label">空闲:</span> 91%</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="panel panel-block panel-block-sm panel-location">
                        <div class="location-header">
                            <h3 class="h4"><img src="img/clients/japan.png"> 日本 智能分流 4
                                <small>Japan-Osaka</small>
                            </h3>
                            <i class="zmdi zmdi-check-circle text-success"></i>
                        </div>
                        <div class="location-progress">
                            <div class="progress progress-sm">
                                <div class="progress-bar" style="width: 95%;"></div>
                            </div>
                        </div>
                        <ul class="location-info list-styled">
                            <li><span class="list-label">状态:</span> OK</li>
                            <li><span class="list-label">空闲:</span> 95%</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
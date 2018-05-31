@extends('home.layouts')
@section('main_content')
    <!-- /.page-navbar -->

    <div class="page-banner page-banner-subpage p-b-0">
        <div class="container">
            <div class="banner-slogan banner-slogan-hero">
                <h1 class="slogan-title text-center">关于{{$app_config['website_name']}}</h1>
                <h2 class="slogan-desc text-center">我们的使命：提供高效、稳定、可靠、安全的概念加速服务。<br/>
                    {{$app_config['website_name']}}开始于2014年
                    我们通过数年的加速服务提供经历，从向游戏玩家群体内部提供到向小微企业和外贸公司提供稳定国际互联线路，再到向个人用户提供公有云加速服务，我们经历了很多，并拥有丰富的经验。</h2>
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
                        <div class="image image-vultr-team">
                            <span class="bird-fast image-shadow-sm animate fadeInRight"></span>
                            <span class="bird-fast bird-fast-sm image-shadow-sm animate fadeInRight"></span>
                            <span class="bird-fast bird-fast-sm image-shadow-sm animate fadeInRight"></span>
                            <span class="bird-fast bird-fast-sm image-shadow-sm animate fadeInRight"></span>
                            <span class="bird-fast bird-fast-sm image-shadow-sm animate fadeInRight"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-6 col-sm-pull-6">
                    <h2 class="section-title">一个颠覆传统、全球性的概念加速。</h2>

                    <p class="section-desc">
                        {{$app_config['website_name']}}提供了在亚洲、美洲和欧洲超过60个云节点，并且接近全球主要的城市，以便阁下可以在{{$app_config['website_name']}}提供的服务下畅享全球的精彩内容。</p>

                    <p class="section-desc">{{$app_config['website_name']}}采用一系列措施来提高我们服务的可靠性，从{{$app_config['website_name']}}
                        的用户中心中启动{{$app_config['website_name']}}的全球加速网络，如此简单，不需要任何额外的设置和特定的服务。</p>
                </div>
            </div>
            <div class="features features-icon-left">
                <div class="row">
                    <div class="col-sm-3 col-xs-6">
                        <div class="display-3 text-primary">1000+</div>
                        <h3 class="h4">{{$app_config['website_name']}}用户</h3>
                        <p>我们的用户来自于中国不同的省份和国外不同城市，他们遍布全球。通过{{$app_config['website_name']}}的全球加速网络来便捷地使用全球网络资源。</p>
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <div class="display-3 text-primary">20PB+</div>
                        <h3 class="h4">流量消耗</h3>
                        <p>{{$app_config['website_name']}}和其子品牌已经稳定运行并向我们的客户提供了多年的加速服务，遍及全球的网络资源触手可及。</p>
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <div class="display-3 text-primary">40+</div>
                        <h3 class="h4">加速节点</h3>
                        <p>通过智能分流和负载均衡技术，{{$app_config['website_name']}}和合作伙伴部署在全球各地的60余加速节点向所有的用户提供者稳定可靠的服务。</p>
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <div class="display-3 text-primary">600+</div>
                        <h3 class="h4">用户问题处理</h3>
                        <p>我们提供先进的管理型服务，通过优秀的技术支持帮助用户处理任何使用上的问题。</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.page-section -->

    <div class="page-section section-blue section-center">
        <div class="container">
            <div class="section-image">
                <div class="image image-vultr-lanch animate zoomIn">
                    <span class="bird bird-md image-shadow"><span class="lanch-flag"></span></span>
                </div>
            </div>
            <h2 class="section-title">{{$app_config['website_name']}}开始于2014年</h2>

            <p class="section-desc m-b-30">
                我们通过数年的加速服务提供经历，从向游戏玩家群体内部提供到向小微企业和外贸公司提供稳定国际互联线路，再到向个人用户提供公有云加速服务，我们经历了很多，并拥有丰富的经验。</p>
            <ul class="time-line">
                <li>
                    <div class="time-date animate fadeInLeft">
                        <h3 class="h4">2014年7月</h3>
                        <p>我们的初创人开始向小规模内部玩家群体提供游戏加速服务</p>
                    </div>
                    <span class="time-pin"></span>
                </li>
                <li>
                    <div class="time-date animate fadeInRight textleft" data-animation-delay="0.2s">
                        <h3 class="h4">2014年10月</h3>
                        <p>我们开始为小微企业和外贸组织提供国际访问线路。</p>
                    </div>
                    <span class="time-pin"></span>
                </li>
                <li>
                    <div class="time-date animate fadeInLeft" data-animation-delay="0.4s">
                        <h3 class="h4">2015年1月</h3>
                        <p>我们向路由器用户提供可运行于路由的SSH管道服务。</p>
                    </div>
                    <span class="time-pin"></span>
                </li>
                <li>
                    <div class="time-date animate fadeInRight textleft" data-animation-delay="0.6s">
                        <h3 class="h4">2015年3月</h3>
                        <p>我们启用了日本数据中心，为日本页游玩家提供了游戏专线。</p>
                    </div>
                    <span class="time-pin"></span>
                </li>
                <li>
                    <div class="animate fadeInLeft" data-animation-delay="0.8s">
                        <h3 class="h4">2015年6月</h3>
                        <p>我的SS俱乐部myss.club成立，开始面向公开用户提供加速服务。</p>
                    </div>
                    <span class="time-pin"></span>
                </li>
                <li>
                    <div class="animate fadeInRight textleft" data-animation-delay="1s">
                        <h3 class="h4">2015年7月</h3>
                        <p>我们开始提供用于高速访问和稳定国际网络的私有线路。</p>
                    </div>
                    <span class="time-pin"></span>
                </li>
                <li>
                    <div class="animate fadeInLeft" data-animation-delay="1.2s">
                        <h3 class="h4">2015年10月</h3>
                        <p>我的SS俱乐部向路由器用户和游戏用户提供稳定可靠的加速服务</p>
                    </div>
                    <span class="time-pin"></span>
                </li>
                <li>
                    <div class="animate fadeInRight textleft" data-animation-delay="1.4s">
                        <h3 class="h4">2016年1月</h3>
                        <p>正式启用www.myssvpn.com域名，并为用户提供更佳的线路和体验。</p>
                    </div>
                    <span class="time-pin"></span>
                </li>
                <li>
                    <div class="animate fadeInLeft" data-animation-delay="1.6s">
                        <h3 class="h4">2016年3月</h3>
                        <p>开始使用混淆协议，数据加密传输，让数据传输更稳定、更安全。</p>
                    </div>
                    <span class="time-pin"></span>
                </li>
                <li>
                    <div class="animate fadeInLeft" data-animation-delay="1.8s">
                        <h3 class="h4">2016年6月</h3>
                        <p>正式启用www.{{$app_config['website_name']}}.com域名，并对网站进行全新改版。</p>
                    </div>
                    <span class="time-pin"></span>
                </li>
                <li>
                    <div class="animate fadeInLeft" data-animation-delay="2.0s">
                        <h3 class="h4">2016年9月</h3>
                        <p>开始使用GeoTrust EV SSL证书，从最大限度上确保网站的安全性。</p>
                    </div>
                    <span class="time-pin"></span>
                </li>
            </ul>
        </div>
    </div>
    <!-- /.page-section -->

    <div class="page-section">
        <div class="container">
            <h2 class="section-title text-center">我们的主要区别</h2>

            <div class="features features-icon-left">
                <div class="row">
                    <div class="col-sm-4 col-xs-6">
                        <div class="feature"><i class="icon icon-lg icon-globe animate zoomIn"></i>

                            <h3 class="h4">全球加速网络</h3>

                            <p>{{$app_config['website_name']}}及合作伙伴在全球部署的超过40个加速网络节点能够帮助用户突破网络审查并更快地使用国际网际网络资源，帮助您的业务更进一步！</p>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-6">
                        <div class="feature"><i class="icon icon-lg icon-server animate zoomIn"></i>

                            <h3 class="h4">操作简易</h3>

                            <p>
                                {{$app_config['website_name']}}的服务无需配置繁杂的设置，只需要根据{{$app_config['website_name']}}提供的帮助下载软件扫描二维码，就可以轻松地在任何地方连接到{{$app_config['website_name']}}加速网络。</p>
                        </div>
                    </div>
                    <div class="clear-xs"></div>
                    <div class="col-sm-4 col-xs-6">
                        <div class="feature"><i class="icon icon-lg icon-broadcasting animate zoomIn"></i>

                            <h3 class="h4">智能分流</h3>

                            <p>{{$app_config['website_name']}}的加速网络通过智能分流 - 负载均衡技术，将用户的访问压力分配到各个连接点上，使得用户在无需变更任何设置的情况下就可以享受更快速度。</p>
                        </div>
                    </div>
                    <div class="clear-sm"></div>
                    <div class="col-sm-4 col-xs-6">
                        <div class="feature"><i class="icon icon-lg icon-disc animate zoomIn"></i>

                            <h3 class="h4">完善技术支持</h3>

                            <p>通过购买{{$app_config['website_name']}}的管理型服务，将可以获取{{$app_config['website_name']}}的扩展技术支持，帮助您处理您在使用过程中遇到的任何问题，更加方便地使用各种服务。</p>
                        </div>
                    </div>
                    <div class="clear-xs"></div>
                    <div class="col-sm-4 col-xs-6">
                        <div class="feature"><i class="icon icon-lg icon-multiple-devices animate zoomIn"></i>

                            <h3 class="h4">全平台支持</h3>

                            <p>{{$app_config['website_name']}}的云加速服务可以用于您的所有设备上，无论是Windows PC、Mac、iPhone、Android手机，甚至是路由器上，只需要一个帐号！</p>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-6">
                        <div class="feature"><i class="icon icon-lg icon-agreement animate zoomIn"></i>

                            <h3 class="h4">正规商业运营</h3>

                            <p>{{$app_config['website_name']}}隶属于我的SS俱乐部，可以按照正规流程向企业用户提供正规的机打发票，以便您向企业和组织报销费用。</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.page-section -->
    <div class="page-section section-center">
        <div class="container">
            <h2 class="section-title text-center">我们的合作伙伴</h2>
            <div class="partner-logos">
                <div><img src="/home/img/services/telecom.svg" alt="Telecom"/></div>
                <div><img src="/home/img/services/alicloud.svg" alt="AliCloud"/></div>
                <div><img src="/home/img/services/azure.svg" alt="Azure"/></div>
                <div><img src="/home/img/services/linode.svg" alt="Linode"/></div>
                <div><img src="/home/img/services/idcf.svg" alt="IDCF"/></div>
            </div>
        </div>
    </div>
    <a name="contact_us"></a>
    <!-- /.page-section -->
    <div class="page-section section-center">
        <div class="container">
            <h2 class="section-title text-center">希望寻求合作或是定制服务？</h2>
            <div class="partner-logos">
                希望寻求合作或是定制服务？请通过 <a href="{{url('/user/ticketList')}}">工单系统</a> 联系我们或者QQ交流群：<a>674788156 </a>
            </div>
        </div>
    </div>
@endsection
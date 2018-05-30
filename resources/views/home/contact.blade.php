@extends('home.layouts')
@section('main_content')

    <div class="page-banner page-banner-subpage p-b-0">
        <div class="container">
            <div class="banner-slogan banner-slogan-hero">
                <h1 class="slogan-title text-center">联系ShadowsocksR</h1>
                <h2 class="slogan-desc text-center">希望寻求合作或是定制服务？请通过 <a href="#">工单系统</a> 联系我们</h2>
            </div>
            <div class="banner-tabs tabs-responsive">
                <div class="tabs-container">
                    <ul class="nav nav-tabs text-center">
                        <li><a href="about.html">关于我们</a></li>
                        <li><a href="sla.html">服务协议</a></li>
                        <li class="active"><a href="contact.html">联系我们</a></li>
                    </ul>
                    <button class="btn btn-icon btn-link btn-prev" type="button" data-click="prev-tab"><i
                                class="zmdi zmdi-chevron-left"></i></button>
                    <button class="btn btn-icon btn-link btn-next" type="button" data-click="next-tab"><i
                                class="zmdi zmdi-chevron-right"></i></button>
                </div>
            </div>
        </div>
        <!-- /.banner-tabs -->
    </div>
    <!-- /.page-banner -->


    <div class="page-main">
        <div class="container">
            <!-- /.main-sidebar -->
            <div class="main-content main-content-center">

                <div class="row">
                    <div class="col-sm-8">

                        <a href="/user" class="btn btn-block btn-default m-b-40">已经是我们的客户？ <span class="text-normal">请通过工单联系我们</span></a>
                        <h2>邮件咨询：</h2>


                        <div class="col-sm-3 col-sm-offset-1">

                            <address>
                                mmmwhy12@gmail.com
                            </address>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>
@endsection
@extends('home.layouts')
@section('main_content')

    <div class="page-banner page-banner-subpage p-b-0">
        <div class="container">
            <div class="banner-slogan banner-slogan-hero">
                <h1 class="slogan-title text-center">联系{{$app_config['website_name']}}</h1>
                <h2 class="slogan-desc text-center">希望寻求合作或是定制服务？请通过 <a href="{{url('/user/ticketList')}}">工单系统</a> 联系我们</h2>
            </div>
            <div class="banner-tabs tabs-responsive">
                @include('home.subpage.about_sub')
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
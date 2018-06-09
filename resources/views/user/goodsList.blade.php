@extends('user.layouts')

@section('css')
    <link href="/assets/pages/css/pricing.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" type="text/css" />
    <style>
        .fancybox > img {
            width: 75px;
            height: 75px;
        }
    </style>
@endsection
@section('content')
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content" style="padding-top:0;">
        <!-- BEGIN PAGE BASE CONTENT -->

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-link font-blue"></i>
                            <span class="caption-subject font-blue bold">购买必读</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="mt-clipboard-container">
                            流量可购买多次，每次购买会叠加流量；<br>
                            套餐购买会导致之前购买的套餐失效，请谨慎购买！<br>
                            购买任一服务后，凭账单号码加QQ群：674788156 获得后续增值服务或报告异常。<br>
                            <b style="font-size: 1.2em;color: red;">如果您遇到任何问题，<b><a href="{{url('user/ticketList')}}">点我发起服务单，</a></b>我们会第一时间处理您的请求。</b><br>
                            <b style="font-size: 1.2em;color: brown;">您的任何消费，将会给您的推介人带来您消费金额{{$app_config['referral_percent']*100}}%的收益；</b><br>
                            <b style="font-size: 1.2em;color: brown;">同样的，您的推介也会给您带来可提现的收益。<a href="{{url('home/aff')}}">了解推介计划</a></b><br>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-scrollable table-scrollable-borderless">
                            <table class="table table-hover table-light table-checkable order-column">
                                <thead>
                                <tr>
                                    <th style="width: 20%;text-align: center;"> {{trans('home.service_name')}} </th>
                                    <th style="width: 30%;text-align: center;"> {{trans('home.service_desc')}} </th>
                                    <th style="width: 5%;text-align: center;"> {{trans('home.service_type')}} </th>
                                    <th style="width: 5%;text-align: center;"> {{trans('home.service_price')}} </th>
                                    <th style="width: 5%;text-align: center;"> 优先级 </th>
                                    <th style="width: 5%;text-align: center;"> 剩余数量 </th>
                                    <th style="width: 20%;text-align: center;"> 活动时间 </th>
                                    <th style="width: 10%;text-align: center;">操作 </th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($goodsList->isEmpty())
                                    <tr>
                                        <td colspan="5" style="text-align: center;">{{trans('home.services_none')}}</td>
                                    </tr>
                                @else
                                    @foreach($goodsList as $key => $goods)
                                        <tr class="odd gradeX">
                                            <td style="width: 10%; text-align: left;">
                                                {{$goods->name}}；{{trans('home.service_traffic')}}：{{$goods->traffic}}；{{trans('home.service_days')}}：{{$goods->days}} {{trans('home.day')}}
                                            </td>
                                            <td style="text-align: left;"> {{$goods->desc}} </td>
                                            <td style="text-align: center;"> {{$goods->type == '1' ? trans('home.service_type_1') : trans('home.service_type_2')}} </td>
                                            <td style="text-align: center;"> ￥{{$goods->price}} </td>
                                            <td style=" text-align: center;"> {{$goods->order}} </td>
                                            <td style=" text-align: center;"> {{$goods->hnumber()}} </td>
                                            <td style=" text-align: center;"> {{$goods->avaliableTime()}} </td>
                                            <td style="  text-align: center;">
                                                <button onclick="buy('{{$goods->id}}');" class="btn green" {{$goods->is_avaliable()?'':'disabled'}}> 购买 </button>
                                                <!--<button type="button" class="btn btn-sm blue btn-outline" onclick="exchange('{{$goods->id}}')">兑换</button>-->
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="dataTables_paginate paging_bootstrap_full_number pull-right">
                                    {{ $goodsList->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE BASE CONTENT -->
    </div>
    <!-- END CONTENT BODY -->
@endsection
@section('script')
    <script src="/assets/global/plugins/fancybox/source/jquery.fancybox.js" type="text/javascript"></script>

    <script type="text/javascript">
        function buy(goods_id) {
            window.location.href = '{{url('user/addOrder?goods_id=')}}' + goods_id;
        }

        // 编辑商品
        function exchange(id) {
            //
        }

        // 查看商品图片
        $(document).ready(function () {
            $('.fancybox').fancybox({
                openEffect: 'elastic',
                closeEffect: 'elastic'
            })
        })
    </script>
@endsection

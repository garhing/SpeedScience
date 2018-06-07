@extends('user.layouts')

@section('css')
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
    <div class="page-content" style="padding-top: 0;">
        <!-- BEGIN PAGE BASE CONTENT -->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-body">
                        <div class="table-scrollable table-scrollable-borderless">
                            <table class="table table-hover table-light table-checkable order-column">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> {{trans('home.invoice_table_id')}} </th>
                                        <th> {{trans('home.invoice_table_name')}} </th>
                                        <th> {{trans('home.invoice_table_price')}} </th>
                                        <th> 支付方式 </th>
                                        <th> 流量扣减顺序</th>
                                        <th> 有效天数</th>
                                        <th> {{trans('home.invoice_table_create_date')}} </th>
                                        <th> {{trans('home.invoice_expire_date')}} </th>
                                        <th> {{trans('home.invoice_table_status')}} </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if($orderList->isEmpty())
                                    <tr>
                                        <td colspan="6">{{trans('home.invoice_table_none')}}</td>
                                    </tr>
                                @else
                                    @foreach($orderList as $key => $order)
                                        <tr class="odd gradeX">
                                            <td>{{$key + 1}}</td>
                                            <td>{{$order->order_sn}}</td>
                                            <td>{{empty($order->goods) ? '【商品已删除】' : $order->goods->name}}</td>
                                            <td>￥{{$order->amount}}</td>
                                            <td>{{$order->hpayWay()}}</td>
                                            <td> {{$order->goods->order}}</td>
                                            <td> {{$order->goods->days}}</td>
                                            <td>{{$order->created_at}}</td>
                                            <td>{{$order->expireAt()}}</td>
                                            <td>
                                                @if(!$order->is_expire)
                                                    @if($order->status == -1)
                                                        <a href="javascript:;" class="btn btn-sm default disabled"> {{trans('home.invoice_table_closed')}} </a>
                                                    @elseif($order->status == 0)
                                                        <a href="javascript:;" class="btn btn-sm dark disabled"> {{trans('home.invoice_table_wait_payment')}} </a>
                                                        @if(!empty($order->payment))
                                                            <a href="{{url('payment/' . $order->payment->sn)}}" target="_self" class="btn btn-sm red">{{trans('home.pay')}}</a>
                                                        @endif
                                                    @elseif($order->status == 1)
                                                        <a href="javascript:;" class="btn btn-sm yellow disabled">待激活</a>
                                                        <a href="" target="_self" class="btn btn-sm red" onclick="activeOrder({{$order->oid}})">激活</a>
                                                    @elseif($order->status == 2)
                                                        <a href="javascript:;" class="btn btn-sm green disabled"> {{trans('home.invoice_table_wait_active')}} </a>
                                                    @elseif($order->status == 3)
                                                        <a href="javascript:;" class="btn btn-sm default disabled"> 流量耗尽</a>
                                                    @endif
                                                @else
                                                    <a href="javascript:;" class="btn btn-sm default disabled"> {{trans('home.invoice_table_expired')}} </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="dataTables_paginate paging_bootstrap_full_number pull-right">
                                    {{ $orderList->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
        <!-- END PAGE BASE CONTENT -->
    </div>
    <!-- END CONTENT BODY -->
@endsection
@section('script')
    <script src="/js/layer/layer.js" type="text/javascript"></script>
    <script type="text/javascript">
        function activeOrder($oid){
            layer.load(2);
            $.ajax({
                type: "POST",
                url: "{{url('user/activeOrder')}}",
                async: false,
                data: {_token:'{{csrf_token()}}', oid:$oid},
                dataType: 'json',
                success: function (ret) {
                    layer.msg(ret.message, {time:1000},function () {
                        if(ret.status == 'success'){
                            window.location.href="{{url('user/orderList')}}";
                        }
                    });
                },
                error:function (ret) {
                    layer.msg('服务器发生未知异常', {time:1000});
                },
                complete:function (ret) {
                    layer.closeAll('loading');
                }
            });
        }

    </script>
@endsection

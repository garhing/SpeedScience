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
@section('title', trans('home.panel'))
@section('content')
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content" style="padding-top:0;">
        <!-- BEGIN PAGE BASE CONTENT -->
        <div class="row">
            <div class="col-md-12">
                <div class="note note-info">
                    <p>{{trans('home.promote', ['traffic' => $referral_traffic, 'referral_percent' => $referral_percent * 100])}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light form-fit bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-link font-blue"></i>
                            <span class="caption-subject font-blue bold">{{trans('home.referral_my_link')}}</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="mt-clipboard-container">
                            <input type="text" id="mt-target-1" class="form-control" value="{{$link}}" />
                            <a href="javascript:;" class="btn blue mt-clipboard" data-clipboard-action="copy" data-clipboard-target="#mt-target-1">
                                <i class="icon-note"></i> {{trans('home.referral_button')}}
                            </a>
                        </div>
                    </div>
                </div>
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <span class="caption-subject bold"> {{trans('home.referral_title')}} </span>
                        </div>
                        <div class="actions">
                            <form class="form-inline" action="#">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">类型</div>
                                        <input type="text" class="form-control" id="acc_type_id" placeholder="如支付宝，微信等" name="acc_type">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">账户</div>
                                        <input type="text" class="form-control" id="acc_id" placeholder="填写具体账户" name="acc">
                                    </div>
                                </div>
                                <button class="btn red" onclick="extractMoney();" type="button"> {{trans('home.referral_table_apply')}}￥{{$canAmount}} </button>
                            </form>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-scrollable">
                            <table class="table table-striped table-bordered table-hover table-checkable order-column">
                                <thead>
                                <tr>
                                    <th> # </th>
                                    <th> {{trans('home.referral_table_user')}} </th>
                                    <th> {{trans('home.referral_table_amount')}} </th>
                                    <th> {{trans('home.referral_table_commission')}} </th>
                                    <th> {{trans('home.referral_table_status')}} </th>
                                    <th> {{trans('home.referral_table_date')}} </th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($referralLogList->isEmpty())
                                    <tr>
                                        <td colspan="6" style="text-align: center;"> {{trans('home.referral_table_none')}} </td>
                                    </tr>
                                @else
                                    @foreach($referralLogList as $key => $referralLog)
                                        <tr class="odd gradeX">
                                            <td> {{$key + 1}} </td>
                                            <td> {{$referralLog->user->username}} </td>
                                            <td> ￥{{$referralLog->amount}} </td>
                                            <td> ￥{{$referralLog->ref_amount}} </td>
                                            <td>
                                                @if ($referralLog->status == 1)
                                                    <span class="label label-sm label-danger">申请中</span>
                                                @elseif($referralLog->status == 2)
                                                    <span class="label label-sm label-default">已提现</span>
                                                @else
                                                    <span class="label label-sm label-info">未提现</span>
                                                @endif
                                            </td>
                                            <td> {{$referralLog->created_at}} </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-5 col-sm-5">
                                <div class="dataTables_info" role="status" aria-live="polite">{{trans('home.referral_summary', ['total' => $referralLogList->total(), 'amount' => $canAmount, 'money' => $referral_money])}}</div>
                            </div>
                            <div class="col-md-7 col-sm-7">
                                <div class="dataTables_paginate paging_bootstrap_full_number pull-right">
                                    {{ $referralLogList->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <span class="caption-subject bold"> 我的提现申请 </span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-scrollable">
                            <table class="table table-hover table-light">
                                <thead>
                                <tr class="uppercase">
                                    <th> # </th>
                                    <th> 提现金额 </th>
                                    <th> 提现账号 </th>
                                    <th> 账号类型 </th>
                                    <th> 账单号码 </th>
                                    <th> 申请时间 </th>
                                    <th> 状态 </th>
                                    <th> 处理时间 </th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($applyList->isEmpty())
                                    <tr>
                                        <td colspan="7" style="text-align: center;">暂无数据</td>
                                    </tr>
                                @else
                                    @foreach($applyList as $apply)
                                        <tr>
                                            <td> {{$apply->id}} </td>
                                            <td> ￥{{$apply->amount/100}} </td>
                                            <td> {{$apply->account_num}} </td>
                                            <td> {{$apply->account_type}} </td>
                                            <td> {{$apply->bill_num}} </td>
                                            <td> {{$apply->created_at}} </td>
                                            <td>
                                                @if($apply->status == -1)
                                                    <span class="label label-default label-danger"> 驳回 </span>
                                                @elseif($apply->status == 0)
                                                    <span class="label label-default label-info"> 待审核 </span>
                                                @elseif($apply->status == 2)
                                                    <span class="label label-default label-success"> 已打款 </span>
                                                @else
                                                    <span class="label label-default label-default"> 审核通过待打款 </span>
                                                @endif
                                            </td>
                                            <td> {{$apply->created_at == $apply->updated_at ? '' : $apply->updated_at}} </td>

                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-7 col-sm-7">
                                <div class="dataTables_paginate paging_bootstrap_full_number pull-right">
                                    {{ $applyList->links() }}
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
    <script src="/assets/global/plugins/clipboardjs/clipboard.min.js" type="text/javascript"></script>
    <script src="/assets/pages/scripts/components-clipboard.min.js" type="text/javascript"></script>
    <script src="/js/layer/layer.js" type="text/javascript"></script>

    <script type="text/javascript">
        // 申请提现
        function extractMoney() {
            if ($('#acc_id').val() == null || $('#acc_id').val()==""){
                layer.msg('账户不能为空', {time:1000});
                return;
            }
            if ($('#acc_type_id').val() == null || $('#acc_type_id').val()==""){
                layer.msg("类型不能为空", {time:1000});
                return;
            }

            $.post("{{url('user/extractMoney')}}", {_token:'{{csrf_token()}}','acc':$('#acc_id').val(),'acc_type':$('#acc_type_id').val()}, function (ret) {
                layer.msg(ret.message, {time:1000},function () {
                    window.location.reload();
                });
            });
        }
    </script>
@endsection

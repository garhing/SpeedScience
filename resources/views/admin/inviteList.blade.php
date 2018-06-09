@extends('admin.layouts')

@section('css')
@endsection
@section('content')
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content" style="padding-top:0;">
        <div class="row">
            <div class="col-md-12">
                <div class="tab-pane active">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <span class="caption-subject font-dark bold">邀请管理</span>
                            </div>
                            <div class="actions pull-right">
                                <div class="mt-radio-inline">
                                    <label class="mt-radio">
                                        <input type="radio" name="is_free" value="1" checked> 免费邀请码
                                        <span></span>
                                    </label>
                                    <label class="mt-radio">
                                        <input type="radio" name="is_free" value="0" > 计入推广返利
                                        <span></span>
                                    </label>
                                    <button type="button" class="btn blue" onclick="makeInvite()">生成 5 个邀请码</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <b style="font-size: 1.2em;color: #ed6b75;">注意免费邀请码会出现在公共页面，且不会计入推广返利</b><br>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-scrollable table-scrollable-borderless">
                                <table class="table table-hover table-light table-checkable order-column">
                                    <thead>
                                    <tr class="uppercase">
                                        <th> # </th>
                                        <th> 邀请码 </th>
                                        <th> 有效期 </th>
                                        <th> 生成者 </th>
                                        <th> 免费邀请码 </th>
                                        <th> 状态 </th>
                                        <th> 使用者 </th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @if($inviteList->isEmpty())
                                        <tr>
                                            <td colspan="6" style="text-align: center;">暂无数据</td>
                                        </tr>
                                    @else
                                        @foreach($inviteList as $invite)
                                            <tr>
                                                <td> {{$invite->id}} </td>
                                                <td> <a href="{{url('register?aff='.Session::get('user')['id'].'&code='.$invite->code)}}" target="_blank">{{$invite->code}}</a> </td>
                                                <td> {{$invite->dateline}} </td>
                                                <td> {{empty($invite->generator) ? '【账号已删除】' : $invite->generator->username}} </td>
                                                <td> {{$invite->is_free?'是':'否'}} </td>
                                                <td>
                                                    @if($invite->status == '0')
                                                        <span class="label label-sm label-success"> 未使用 </span>
                                                    @elseif($invite->status == '1')
                                                        <span class="label label-sm label-danger"> 已使用 </span>
                                                    @else
                                                        <span class="label label-sm label-default"> 已过期 </span>
                                                    @endif
                                                </td>
                                                <td> {{empty($invite->user) ? '' : $invite->user->username}} </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <div class="dataTables_info" role="status" aria-live="polite">{{trans('home.invite_code_summary', ['total' => $inviteList->total()])}}</div>
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <div class="dataTables_paginate paging_bootstrap_full_number pull-right">
                                        {{ $inviteList->links() }}
                                    </div>
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
    <script src="/js/layer/layer.js" type="text/javascript"></script>

    <script type="text/javascript">
        // 生成邀请码
        function makeInvite() {
            var _token = '{{csrf_token()}}';
            var is_free = $("input[name='is_free']:checked").val();

            $.ajax({
                type: "POST",
                url: "{{url('admin/makeInvite')}}",
                async: false,
                data: {_token:_token,is_free:is_free},
                dataType: 'json',
                success: function (ret) {
                    layer.msg(ret.message, {time:1000}, function() {
                        if (ret.status == 'success') {
                            window.location.reload();
                        }
                    });
                }
            });

            return false;
        }

        // 导出邀请码
        function exportInvite() {
            window.location.href = '{{url('admin/exportInvite')}}';
        }
    </script>
@endsection
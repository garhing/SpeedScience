@extends('admin.layouts')

@section('css')
@endsection
@section('content')
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content" style="padding-top:0;">
        <!-- BEGIN PAGE BASE CONTENT -->
        <div class="row">
            <div class="col-md-12">
                @if (Session::has('successMsg'))
                    <div class="alert alert-success">
                        <button class="close" data-close="alert"></button>
                        {{Session::get('successMsg')}}
                    </div>
                @endif
                @if (Session::has('errorMsg'))
                    <div class="alert alert-danger">
                        <button class="close" data-close="alert"></button>
                        <strong>错误：</strong> {{Session::get('errorMsg')}}
                    </div>
                @endif
                <!-- BEGIN PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject font-dark sbold uppercase">更新可见线路</span>
                        </div>
                        <div class="actions"></div>
                    </div>
                    <div class="portlet-body form">

                        <!-- BEGIN FORM-->
                        <form action="{{url('shop/refreshLabel')}}" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">说明</label>
                                    <label class="control-label col-md-4" style="text-align: left;">
                                        <span>本功能旨在为已购买商品的用户更新线路产品。可用线路在用户购买时已经记录到数据库中，
                                        所以后期如果新增线路，那么已购买的用户无法使用新线路。
                                        </span><br/>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">请注意</label>
                                    <label class="control-label col-md-4" style="text-align: left;color:#f00;">
                                        <span>如果您不明白此次操作的含义，请勿进行操作，以免发生危险</span><br/>
                                    </label>
                                </div>
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <div class="form-group last">
                                    <label class="control-label col-md-3">确认选项</label>
                                    <div class="col-md-4">
                                        <div class="mt-radio-inline">
                                            <label class="mt-radio">
                                                <input type="radio" name="refresh" value="0" checked> 不刷新
                                                <span></span>
                                            </label>
                                            <label class="mt-radio">
                                                <input type="radio" name="refresh" value="1" > 确认刷新
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-4">
                                        <button type="submit" class="btn green"> <i class="fa fa-check"></i> 提 交</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- END FORM-->
                    </div>
                </div>
                <!-- END PORTLET-->
            </div>
        </div>
        <!-- END PAGE BASE CONTENT -->
    </div>
    <!-- END CONTENT BODY -->
@endsection
@section('script')
    <script type="text/javascript">


    </script>
@endsection
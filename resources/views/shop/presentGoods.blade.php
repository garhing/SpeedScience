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
                            <span class="caption-subject font-dark sbold uppercase">编辑赠送参数</span>
                        </div>
                        <div class="actions"></div>
                    </div>
                    <div class="portlet-body form">

                        <!-- BEGIN FORM-->
                        <form action="{{url('shop/presentGoods')}}" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">请注意</label>
                                    <label class="control-label col-md-4" style="text-align: left">
                                        <span>用于ID或商品ID中有一个不合法，将会全部操作失败</span><br/>
                                        <span>后期需要做：1、通过条件筛选，确定用户ID；2、通过选择框，选择商品ID</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">用户IDS</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="user_ids" value="{{Request::old('user_ids')}}" id="user_ids" placeholder="用英文分号分隔" required>
                                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">商品IDS</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="goods_ids" value="{{Request::old('goods_ids')}}" id="goods_ids" placeholder="用英文分号分隔" required>
                                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                    </div>
                                </div>

                                <div class="form-group last">
                                    <label class="control-label col-md-3">添加状态</label>
                                    <div class="col-md-4">
                                        <div class="mt-radio-inline">
                                            <label class="mt-radio">
                                                <input type="radio" name="status" value="1" checked> 待激活
                                                <span></span>
                                            </label>
                                            <label class="mt-radio">
                                                <input type="radio" name="status" value="2" > 激活使用中
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
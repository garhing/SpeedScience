@extends('admin.layouts')

@section('css')
    <link href="/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
    <link href="/js/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
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
                            <span class="caption-subject font-dark sbold uppercase">生成卡券</span>
                        </div>
                        <div class="actions"></div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="{{url('coupon/addCoupon')}}" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">卡券名称</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="name" value="" id="name" placeholder="" required>
                                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                    </div>
                                </div>
                                {{--<div class="form-group">--}}
                                    {{--<label class="control-label col-md-3">LOGO</label>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="fileinput fileinput-new" data-provides="fileinput">--}}
                                            {{--<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">--}}
                                                {{--<img src="/assets/images/noimage.png" alt="" />--}}
                                            {{--</div>--}}
                                            {{--<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>--}}
                                            {{--<div>--}}
                                                {{--<span class="btn default btn-file">--}}
                                                    {{--<span class="fileinput-new"> 选择 </span>--}}
                                                    {{--<span class="fileinput-exists"> 更换 </span>--}}
                                                    {{--<input type="file" name="logo" id="logo">--}}
                                                {{--</span>--}}
                                                {{--<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> 移除 </a>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                <div class="form-group">
                                    <label class="control-label col-md-3">类型</label>
                                    <div class="col-md-4">
                                        <div class="mt-radio-inline">
                                            <label class="mt-radio">
                                                <input type="radio" name="type" value="1" checked> 抵用券
                                                <span></span>
                                            </label>
                                            <label class="mt-radio">
                                                <input type="radio" name="type" value="3"> 充值券
                                                <span></span>
                                            </label>
                                            <label class="mt-radio">
                                                <input type="radio" name="type" value="2"> 折扣券
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">使用次数</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="usage" value="{{Request::old('discount')}}" id="times" placeholder="">
                                            <span class="input-group-addon">次</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">用户限制</label>
                                    <div class="col-md-4">
                                            <input type="text" class="form-control" name="user_ids" value="{{Request::old('user_ids')}}" id="user_ids" placeholder="填写用户ID，用英文分号分隔">
                                    </div>
                                </div>

                                <div class="form-group" id="goods_ids_form">
                                    <label class="control-label col-md-3">固定商品</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="goods_ids" value="{{Request::old('goods_ids')}}" id="goods_ids" placeholder="填写商品ID，用英文分号分隔">
                                    </div>
                                </div>

                                <div class="form-group" id="goods_types_form">
                                    <label class="control-label col-md-3">商品类型</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="goods_types" value="{{Request::old('goods_types')}}" id="goods_types" placeholder="填写商品类型数字，用英文分号分隔">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">生成数量</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="num" value="{{Request::old('num')}}" id="num" placeholder="" required>
                                            <span class="input-group-addon">张</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">金额</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="amount" value="{{Request::old('amount')}}" id="amount" placeholder="" required>
                                            <span class="input-group-addon">元</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group hide">
                                    <label class="control-label col-md-3">折扣</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="discount" value="{{Request::old('discount')}}" id="discount" placeholder="">
                                            <span class="input-group-addon">折</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">指定日期</label>
                                    <div class="col-md-4">
                                        <div class="mt-radio-inline">
                                            <label class="mt-radio">
                                                <input type="radio" name="set_avliable" value="1" checked>是
                                                <span></span>
                                            </label>
                                            <label class="mt-radio">
                                                <input type="radio" name="set_avliable" value="2"> 否
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group"  id="set_avaliable_form_id">
                                    <label class="control-label col-md-3">有效期</label>
                                    <div class="col-md-4 col-sm-5">
                                        <div class="input-group date-time">
                                            <input type="text" class="form-control" name="available_start" value="{{date('Y-m-d h:i:00')}}" id="available_start" >
                                            <span class="input-group-addon"> 至 </span>
                                            <input type="text" class="form-control" name="available_end"  value="{{date('Y-m-d h:i:00',strtotime('+ 180 days'))}}" id="available_end">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-4">
                                        <button type="submit" class="btn green">提交</button>
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
    {{--<script src="/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>--}}
    {{--<script src="/assets/global/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.zh-CN.min.js" type="text/javascript"></script>--}}
    <script src="/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js" type="text/javascript"></script>
    <script src="/js/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js" type="text/javascript"></script>

    <script src="/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        // 有效期
        $('.date-time input').each(function() {
            $(this).datetimepicker({
                minView:0,
                language: 'zh-CN',
                autoclose: true,
                todayHighlight: true,
                format: 'yyyy-mm-dd hh:ii:ss'
            });
        });

        // 根据类型显示
        $("input[name='type']").change(function(){
            var type = $(this).val();
            if (type == '1' || type == '3') {
                $("#amount").parent("div").parent("div").parent("div").removeClass("hide");
                $("#discount").parent("div").parent("div").parent("div").addClass("hide");
                $("#amount").prop('required', 'required');
                $("#discount").removeAttr('required');
                $("#discount").val('');
            } else if (type == '2' ){
                $("#amount").parent("div").parent("div").parent("div").addClass("hide");
                $("#discount").parent("div").parent("div").parent("div").removeClass("hide");
                $("#discount").prop('required', 'required');
                $("#amount").removeAttr('required');
                $("#amount").val('');
            }
            if(type == '3'){
                $('#goods_ids_form').addClass('hide');
                $('#goods_types_form').addClass('hide');
            }
            if (type == '1' || type == '2'){
                $('#goods_ids_form').removeClass('hide');
                $('#goods_types_form').removeClass('hide');
            }

        });

        available_start = "{{ date('Y-m-d h:i:00')}}"
        available_end = "{{ date('Y-m-d h:i:00',strtotime('+ 180 days'))}}"

        $("input[name='set_avliable']").change(function(){
            var type = $(this).val();
            if(type==2){
                $('#available_start').val(-1);
                $('#available_end').val(-1);
                $('#set_avaliable_form_id').addClass('hide');

            }else{
                $('#available_start').val(available_start);
                $('#available_end').val(available_end);
                $('#set_avaliable_form_id').removeClass('hide');
            }
        });
    </script>
@endsection
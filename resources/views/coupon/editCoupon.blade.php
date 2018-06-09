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
                            <span class="caption-subject font-dark sbold uppercase">编辑卡券</span>
                        </div>
                        <div class="actions"></div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="{{url('coupon/editCoupon')}}" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">卡券名称</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="name" value="{{$coupon->name}}" id="name" placeholder="" required>
                                        <input type="hidden"  name="_token" value="{{csrf_token()}}" />
                                        <input type="hidden"  name="id" value="{{$coupon->id}}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">类型</label>
                                    <div class="col-md-4">
                                        <div class="mt-radio-inline">
                                            <label class="mt-radio">
                                                <input type="radio" name="type" value="1" {{$coupon->type==1?'checked':''}} {{$coupon->status!=0?'disabled':''}}> 抵用券
                                                <span></span>
                                            </label>
                                            <label class="mt-radio">
                                                <input type="radio" name="type" value="3" {{$coupon->type==3?'checked':''}} {{$coupon->status!=0?'disabled':''}}> 充值券
                                                <span></span>
                                            </label>
                                            <label class="mt-radio">
                                                <input type="radio" name="type" value="2"{{$coupon->type==2?'checked':''}} {{$coupon->status!=0?'disabled':''}}> 折扣券
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">使用次数</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="usage" value="{{$coupon->usage}}" id="usage" placeholder="">
                                            <span class="input-group-addon">次</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">用户限制</label>
                                    <div class="col-md-4">
                                            <input type="text" class="form-control" name="user_ids" value="{{$coupon->user_ids}}" id="user_ids" placeholder="填写用户ID，用英文分号分隔">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">固定商品</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="goods_ids" value="{{$coupon->goods_ids}}" id="goods_ids" placeholder="填写商品ID，用英文分号分隔">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">商品类型</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="goods_types" value="{{$coupon->goods_types}}" id="goods_types" placeholder="填写商品类型数字，用英文分号分隔">
                                    </div>
                                </div>

                                <div class="form-group {{$coupon->type!=2?'':'hide'}}" >
                                    <label class="control-label col-md-3">金额</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="amount" value="{{$coupon->amount}}" id="amount" placeholder="" required {{$coupon->status!=0?'disabled':''}}>
                                            <span class="input-group-addon">元</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group {{$coupon->type!=2?'hide':''}}">
                                    <label class="control-label col-md-3">折扣</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="discount" value="{{$coupon->discount}}" id="discount" placeholder="" {{$coupon->status!=0?'disabled':''}}>
                                            <span class="input-group-addon">折</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">指定日期</label>
                                    <div class="col-md-4">
                                        <div class="mt-radio-inline">
                                            <label class="mt-radio">
                                                <input type="radio" name="set_avliable" value="1" {{$is_date?'checked':''}}>是
                                                <span></span>
                                            </label>
                                            <label class="mt-radio">
                                                <input type="radio" name="set_avliable" value="2" {{$is_date?'':'checked'}}> 否
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group {{$is_date?'':"hide"}}"  id="set_avaliable_form_id">
                                    <label class="control-label col-md-3">有效期</label>
                                    <div class="col-md-4 col-sm-5">
                                        <div class="input-group date-time">
                                            <input type="text" class="form-control" name="available_start" value="{{$coupon->available_start()}}" id="available_start">
                                            <span class="input-group-addon"> 至 </span>
                                            <input type="text" class="form-control" name="available_end"  value="{{$coupon->available_end()}}" id="available_end">
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
        amount = '{{$coupon->amount}}'
        discount = '{{$coupon->discount}}'
        // 根据类型显示
        $("input[name='type']").change(function(){
            var type = $(this).val();
            if (type == '1' || type == '3') {
                $("#amount").parent("div").parent("div").parent("div").removeClass("hide");
                $("#discount").parent("div").parent("div").parent("div").addClass("hide");
                $("#amount").prop('required', 'required');
                $("#discount").removeAttr('required');
                $("#discount").val(discount);
            } else {
                $("#amount").parent("div").parent("div").parent("div").addClass("hide");
                $("#discount").parent("div").parent("div").parent("div").removeClass("hide");
                $("#discount").prop('required', 'required');
                $("#amount").removeAttr('required');
                $("#amount").val(amount);
            }
        });

        available_start = "{{ $is_date?$coupon->available_start():date('Y-m-d h:i:00')}}"
        available_end = "{{ $is_date?$coupon->available_end():date('Y-m-d h:i:00',strtotime('+ 180 days'))}}"

        $("input[name='set_avliable']").change(function(){
            var type = $(this).val();
            if(type==2){
                $('#available_start').val('-1');
                $('#available_end').val('-1');
                $('#set_avaliable_form_id').addClass('hide');

            }else{
                $('#available_start').val(available_start);
                $('#available_end').val(available_end);
                $('#set_avaliable_form_id').removeClass('hide');
            }
        });
    </script>
@endsection
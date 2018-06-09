@extends('admin.layouts')

@section('css')
    <link href="/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
    <link href="/js/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
    <link href="/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
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
                <div class="note note-danger">
                    <p>警告：用户购买新套餐则会覆盖所有已购但未过期的旧套餐并删除这些旧套餐对应的流量，所以设置商品时请务必注意类型和有效期，流量包则可叠加。</p>
                </div>
                <!-- BEGIN PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject font-dark sbold uppercase">添加商品</span>
                        </div>
                        <div class="actions"></div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="{{url('shop/addGoods')}}" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="type" class="control-label col-md-3">类型</label>
                                    <div class="col-md-6">
                                        <div class="mt-radio-inline">
                                            <label class="mt-radio">
                                                <input type="radio" name="type" value="1" checked> 流量包
                                                <span></span>
                                            </label>
                                            <label class="mt-radio">
                                                <input type="radio" name="type" value="2"> 套餐
                                                <span></span>
                                            </label>
                                        </div>
                                        <span class="help-block"> 套餐与账号有效期有关，流量包只扣可用流量，不影响有效期 </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">名称</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="name" value="" id="name" placeholder="" required>
                                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                    </div>
                                </div>
                                <!--
                                <div class="form-group">
                                    <label class="control-label col-md-3">LOGO</label>
                                    <div class="col-md-6">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="/assets/images/noimage.png" alt="" /> </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                            <div>
                                                <span class="btn default btn-file">
                                                    <span class="fileinput-new"> 选择 </span>
                                                    <span class="fileinput-exists"> 更换 </span>
                                                    <input type="file" name="logo" id="logo">
                                                </span>
                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> 移除 </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                -->
                                <div class="form-group">
                                    <label class="control-label col-md-3">描述</label>
                                    <div class="col-md-6">
                                        <textarea class="form-control" rows="2" name="desc" id="desc" placeholder="商品的简单描述"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">售价</label>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="price" value="" id="price" placeholder="" required>
                                            <span class="input-group-addon">元</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3" id="traffic_id">内含流量</label>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="traffic" value="1024" id="traffic" placeholder="" required="">
                                            <span class="input-group-addon">MiB</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="labels" class="col-md-3 control-label">标签</label>
                                    <div class="col-md-6">
                                        <select id="labels" class="form-control select2-multiple" name="labels[]" multiple>
                                            @foreach($label_list as $label)
                                                <option value="{{$label->id}}">{{$label->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="help-block"> 自动给购买此商品的用户打上相应的标签 </span>
                                    </div>
                                </div>
                                <!--
                                <div class="form-group">
                                    <label class="control-label col-md-3">所需积分</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="score" value="0" id="score" placeholder="" required>
                                        <span class="help-block">换购该商品需要的积分值</span>
                                    </div>
                                </div>
                                -->
                                <div class="form-group">
                                    <label class="control-label col-md-3">有效期</label>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="days" value="30" id="days" placeholder="" required="">
                                            <span class="input-group-addon">天</span>
                                        </div>
                                        <span class="help-block"> 到期后会自动从总流量扣减对应的流量 </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">流量扣减优先级</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="order" value="0" id="order" placeholder="" required="">
                                        <span class="help-block">使用的流量扣减顺序,数字越大优先级越高</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">商品数量</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="number" value="-1" id="number" placeholder="填写商品数量，-1为不限量" required="">
                                        <span class="help-block">商品数量，-1为不限量</span>
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
                                <div class="form-group last">
                                    <label class="control-label col-md-3">状态</label>
                                    <div class="col-md-6">
                                        <div class="mt-radio-inline">
                                            <label class="mt-radio">
                                                <input type="radio" name="status" value="0"> 下架
                                                <span></span>
                                            </label>
                                            <label class="mt-radio">
                                                <input type="radio" name="status" value="1" checked> 上架
                                                <span></span>
                                            </label>
                                            <label class="mt-radio">
                                                <input type="radio" name="status" value="2" > 仅系统可见(用于赠送商品)
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
    <script src="/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
    <script src="/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js" type="text/javascript"></script>
    <script src="/js/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script type="text/javascript">

        // 用户标签选择器
        $('#labels').select2({
            placeholder: '设置后当用户购买此商品则可见相同标签的节点',
            allowClear: true
        });
        $("input[name='type']").change(function(){
            var type = $(this).val();
            if(type==2){
                $('#traffic_id').text('每月流量');
            }else{
                $('#traffic_id').text('内含流量');
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
    </script>
@endsection
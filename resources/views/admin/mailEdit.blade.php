@extends('admin.layouts')

@section('css')
    <link href="/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet"
          type="text/css"/>
    <link href="/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <style type="text/css">
        .ticker {
            background-color: #fff;
            margin-bottom: 20px;
            border: 1px solid #e7ecf1 !important;
            border-radius: 4px;
            -webkit-border-radius: 4px;
        }

        .ticker ul {
            padding: 0;
        }

        .ticker li {
            list-style: none;
            padding: 15px;
        }

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
        @if (Session::has('successMsg'))
            <div class="alert alert-success">
                <button class="close" data-close="alert"></button>
                {{Session::get('successMsg')}}
            </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light form-fit bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-link font-blue"></i>
                            <span class="caption-subject font-blue bold">邮件群发</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="mt-clipboard-container">
                            <form action="{{url('admin/mailQuery')}}" method="post" enctype="multipart/form-data"
                                  class="form-horizontal"  style="margin:0 4px" id="query_form">
                                <div class="form-group">
                                    <label class="control-label col-md-1">筛选条件</label>

                                    <div class="col-md-2 col-sm-2">
                                        <input type="text" class="col-md-4 form-control input-sm" name="username"
                                               value="{{Request::get('username')}}" id="username" placeholder="用户名" >
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    </div>

                                    <div class="col-md-2 col-sm-2">
                                        <select class="form-control input-sm" name="status" id="status" >
                                            <option value="" @if(Request::get('status') == '') selected @endif>状态
                                            </option>
                                            <option value="-1" @if(Request::get('status') == '-1') selected @endif>
                                                禁用
                                            </option>
                                            <option value="0" @if(Request::get('status') == '0') selected @endif>未激活
                                            </option>
                                            <option value="1" @if(Request::get('status') == '1') selected @endif>正常
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-sm-2">
                                        <select class="form-control input-sm" name="enable" id="enable" >
                                            <option value="" @if(Request::get('enable') == '') selected @endif>
                                                SSR(R)状态
                                            </option>
                                            <option value="1" @if(Request::get('enable') == '1') selected @endif>启用
                                            </option>
                                            <option value="0" @if(Request::get('enable') == '0') selected @endif>禁用
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <select id="initial_labels_for_user" class="form-control select2-multiple"
                                                name="labels" multiple="multiple">
                                            @foreach($labels as $label)
                                                <option value="{{$label->id}}">{{$label->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-sm-2">
                                        <button type="button" class="btn btn-sm blue" onclick="do_query();">查询
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="mt-clipboard-container">
                            <form action="{{url('admin/mailSend')}}" method="post" enctype="multipart/form-data"
                                  class="form-horizontal"  id="email_form">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-1">收件人</label>
                                        <div class="col-md-11">
                                                <textarea class="form-control" id="userEmails" placeholder="Email" rows="5" name="email_addresses"> </textarea>
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-1">标题</label>
                                        <div class="col-md-11">
                                                <input type="text" class="form-control" placeholder="请填写邮件标题" name="email_title">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-1">正文</label>
                                        <div class="col-md-11">
                                                <pan id="editor" type="text/plain"
                                                     style="height:200px;width: 100%" name="email_content"></pan>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12 text-right">
                                            <button type="button" class="btn btn-success" onclick="do_submit();">Submit</button>
                                        </div>

                                    </div>
                                </div>
                            </form>

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
    <script src="/assets/global/plugins/jquery-qrcode/jquery.qrcode.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="/js/ueditor/ueditor.config.js" type="text/javascript" charset="utf-8"></script>
    <script src="/js/ueditor/ueditor.all.js" type="text/javascript" charset="utf-8"></script>
    <script src="/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

    <script src="/js/layer/layer.js" type="text/javascript"></script>
    <script type="text/javascript">

        var ue = UE.getEditor('editor', {
            toolbars: [['source', 'undo', 'redo', 'bold', 'italic', 'underline', 'insertimage', 'insertvideo', 'lineheight', 'fontfamily', 'fontsize', 'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', 'forecolor', 'backcolor', 'link', 'unlink']],
            wordCount: true,                //关闭字数统计
            elementPathEnabled: false,    //是否启用元素路径
            maximumWords: 2000,              //允许的最大字符数
            initialContent: '',             //初始化编辑器的内容
            initialFrameWidth: null,        //初始化宽度
            autoClearinitialContent: false, //是否自动清除编辑器初始内容
        });
        function do_submit() {
            $.ajax({
                type: "POST",
                url: "{{url('admin/mailSend')}}",
                async: false,
                data: $("#email_form").serializeArray(),
                dataType: 'json',
                beforeSend: function () {
                    index = layer.load(1, {
                        shade: [0.7,'#CCC']
                    });
                },
                success: function (ret) {
                    layer.msg(ret.message, {time:1000},function () {

                        if(ret.status == 'success'){
                            window.location.href="{{url('admin/mailEdit')}}";
                        }
                    });

                },
                error:function (ret) {
                    layer.msg('服务器发生未知异常', {time:1000});
                },
                complete:function (ret) {
                    layer.close(index);
                }
            });

        }

        // 搜索
        function do_query() {

            $.ajax({
                type: "POST",
                url: "{{url('admin/mailQuery')}}",
                async: false,
                data: $("#query_form").serializeArray(),
                dataType: 'json',
                beforeSend: function () {
                    index = layer.load(1, {
                        shade: [0.7,'#CCC']
                    });
                },
                success: function (ret) {
                    layer.msg(ret.message, {time:1000});
                    $('#userEmails').val(ret.data);
                },
                complete:function (ret) {
                    layer.close(index);
                }
            });

        }

        $('#initial_labels_for_user').select2({
            placeholder: '按标签筛选',
            allowClear: true,
            width: '100%'
        });
    </script>
@endsection

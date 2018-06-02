@extends('user.layouts')

@section('css')
    <link href="/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content" style="padding-top:0;">
        <!-- BEGIN PAGE BASE CONTENT -->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <span class="caption-subject bold uppercase"> 文章列表 </span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-scrollable table-scrollable-borderless">
                            <table class="table table-hover table-light">
                                <thead>
                                <tr>
                                    <th> # </th>
                                    <th> 标题 </th>
                                    <th> 类型 </th>
                                    <th> 排序 </th>
                                    <th> 发布日期 </th>
                                    <th> 操作 </th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($articleList->isEmpty())
                                    <tr>
                                        <td colspan="6" style="text-align: center;">暂无数据</td>
                                    </tr>
                                @else
                                    @foreach($articleList as $article)
                                        <tr class="odd gradeX">
                                            <td> {{$article->id}} </td>
                                            <td> <a href="{{url('user/article?id=' . $article->id)}}" target="_blank"> {{str_limit($article->title, 80)}} </a> </td>
                                            <td> {{$article->type == '1' ? '文章' : '公告'}} </td>
                                            <td> {{$article->sort}} </td>
                                            <td> {{$article->created_at}} </td>
                                            <td>
                                                <button type="button" class="btn btn-sm blue btn-outline" onclick="viewArticle({{$article->id}})">
                                                    查看
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <div class="dataTables_info" role="status" aria-live="polite">共 {{$articleList->total()}} 篇文章</div>
                            </div>
                            <div class="col-md-8 col-sm-8">
                                <div class="dataTables_paginate paging_bootstrap_full_number pull-right">
                                    {{ $articleList->links() }}
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
        // 添加文章
        function viewArticle(id) {
            window.location.href = '{{url('user/article')}}?id='+ id;
        }

    </script>
@endsection
<div class="tabs-container">
    <ul class="nav nav-tabs text-center">
        <li class="{{in_array(Request::path(), ['home/tos']) ? 'active' : ''}}"><a href="{{url('/home/tos')}}">服务条款</a></li>
        <li class="{{in_array(Request::path(), ['home/use_policy']) ? 'active' : ''}}"><a href="{{url('/home/use_policy')}}">使用政策</a></li>
        <li class="{{in_array(Request::path(), ['home/sla_full']) ? 'active' : ''}}"><a href="{{url('/home/sla_full')}}">服务等级协议</a></li>
    </ul>
    <button class="btn btn-icon btn-link btn-prev" type="button" data-click="prev-tab">
        <i class="zmdi zmdi-chevron-left"></i>
    </button>
    <button class="btn btn-icon btn-link btn-next" type="button" data-click="next-tab">
        <i class="zmdi zmdi-chevron-right"></i>
    </button>
</div>
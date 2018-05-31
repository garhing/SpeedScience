
<div class="tabs-container">
    <ul class="nav nav-tabs text-center">
        <li class="{{in_array(Request::path(), ['home/client']) ? 'active' : ''}}"><a href="{{url('/home/client')}}">客户端下载</a></li>
        <li class="{{in_array(Request::path(), ['home/speedtest']) ? 'active' : ''}}"><a href="{{url('/home/speedtest')}}">测速测试</a></li>
        <li class="{{in_array(Request::path(), ['home/status']) ? 'active' : ''}}"><a href="{{url('/home/status')}}">线路状态</a></li>
    </ul>
    <button class="btn btn-icon btn-link btn-prev" type="button" data-click="prev-tab"><i
                class="zmdi zmdi-chevron-left"></i></button>
    <button class="btn btn-icon btn-link btn-next" type="button" data-click="next-tab"><i
                class="zmdi zmdi-chevron-right"></i></button>
</div>
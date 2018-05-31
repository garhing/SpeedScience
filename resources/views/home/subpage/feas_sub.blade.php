<div class="tabs-container">
    <ul class="nav nav-tabs">
        <li class="{{in_array(Request::path(), ['home/features']) ? 'active' : ''}}"><a href="{{url('/home/features')}}">概念加速</a></li>
        <li class="{{in_array(Request::path(), ['home/datacenter']) ? 'active' : ''}}"><a href="{{url('/home/datacenter')}}">数据中心</a></li>
        <li class="{{in_array(Request::path(), ['home/panel']) ? 'active' : ''}}"><a href="{{url('/home/panel')}}">控制面板</a></li>
        <li class="{{in_array(Request::path(), ['home/game_pricing']) ? 'active' : ''}}"><a href="{{url('/home/game_pricing')}}">游戏加速</a></li>
        <li class="{{in_array(Request::path(), ['home/sla']) ? 'active' : ''}}"><a href="{{url('/home/sla')}}">服务保证</a></li>
    </ul>
    <button class="btn btn-icon btn-link btn-prev" type="button" data-click="prev-tab"><i
                class="zmdi zmdi-chevron-left"></i></button>
    <button class="btn btn-icon btn-link btn-next" type="button" data-click="next-tab"><i
                class="zmdi zmdi-chevron-right"></i></button>
</div>
<div class="tabs-container">
    <ul class="nav nav-tabs text-center">
        <li class="{{in_array(Request::path(), ['home/about']) ? 'active' : ''}}"><a href="{{url('/home/about')}}">关于我们</a></li>
        <li class="{{in_array(Request::path(), ['home/contact']) ? 'active' : ''}}"><a href="{{url('/home/contact')}}">联系我们</a></li>
    </ul>
    <button class="btn btn-icon btn-link btn-prev" type="button" data-click="prev-tab"><i
                class="zmdi zmdi-chevron-left"></i></button>
    <button class="btn btn-icon btn-link btn-next" type="button" data-click="next-tab"><i
                class="zmdi zmdi-chevron-right"></i></button>
</div>
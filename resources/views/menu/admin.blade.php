<ul class="nav nav-main">
    <li class="@yield('homeclass')">
        <a href="{{ URL::route('home') }}">
            <i class="fa fa-home" aria-hidden="true"></i>
            <span>{{trans('member.home')}}</span>
        </a>
    </li>
    <li>
        <a href="#">
            <i class="fa fa-power-off" aria-hidden="true"></i>
            <span>{{trans('member.logout')}}</span>
        </a>
    </li>

</ul>
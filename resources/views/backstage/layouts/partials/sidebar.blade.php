<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        {{--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">--}}
            {{--<span class="sr-only">Toggle navigation</span>--}}
            {{--<span class="icon-bar"></span>--}}
            {{--<span class="icon-bar"></span>--}}
            {{--<span class="icon-bar"></span>--}}
        {{--</button>--}}
        <a class="navbar-brand" href="{{ route('backstage.dashboard.index') }}"><font color="#ffffff" face="微軟正黑體">餐廳點餐系統後台</font></a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <font color="#ffffff" face="微軟正黑體"><i class="fa fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span></font>
            </a>
            {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown"><font color="#ffffff" face="微軟正黑體"><i class="fa fa-user"></i> 管理員<b class="caret"></b></font></a>--}}
            <ul class="dropdown-menu">
                <li>
                    <a href="{{ route('logout') }}"><font color="#000000" face="微軟正黑體"><i class="fa fa-fw fa-gear"></i> Logout</font></a>
                </li>
                {{--<li class="divider"></li>--}}
                {{--<li>--}}
                    {{--<a href="{{ route('logout') }}"--}}
                       {{--onclick="event.preventDefault();--}}
                        {{--document.getElementById('logout-form').submit();">--}}
                        {{--<i class="fa fa-fw fa-power-off"></i> Log Out</a>--}}
                    {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                        {{--@csrf--}}
                    {{--</form>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="{{ route('auth.login11') }}">--}}
                        {{--<font color="#000000" face="微軟正黑體"><i class="fa fa-fw fa-power-off"></i> Log Out</font></a>--}}
                    {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                        {{--@csrf--}}
                    {{--</form>--}}
                {{--</li>--}}
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li class="active">
                <a href="{{ route('backstage.dashboard.index') }}"><font color="#ffffff" face="微軟正黑體"><i class="fa fa-home"></i>　Home</font></a>
            </li>
            <li>
                <a href="{{ route('backstage.manager.staff.index') }}"><font color="#ffffff" face="微軟正黑體"><i class="fa fa-users"></i>　人員管理</font></a>
            </li>
            {{--<li>--}}
            {{--<a href="{{ route('back.manager.staff.index') }}"><font color="#ffffff" face="微軟正黑體"><i class="fa fa-edit"></i> 餐點管理</font></a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="{{ route('back.manager.staff.index') }}"><font color="#ffffff" face="微軟正黑體"><i class="fa fa-edit"></i> 優惠券管理</font></a>--}}
            {{--</li>--}}
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>

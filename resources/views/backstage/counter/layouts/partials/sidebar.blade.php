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
            <li>
                <a href="{{ route('counter.login.index') }}"><font color="#ffffff" face="微軟正黑體"><i class="fa fa-home"></i>  櫃台_Home</font></a>
            </li>
            <li>
                <a href="{{ route('counter.history.index') }}"><font color="#ffffff" face="微軟正黑體"><i class="fa fa-history"></i>  歷史用餐紀錄_History</font></a>
            </li>
            <li>
                <a href="{{ route('counter.dining.index') }}"><font color="#ffffff" face="微軟正黑體"><i class="fa fa-cutlery"></i>  用餐中_Dining</font></a>
            </li>
            <li>
                <a href="{{ route('counter.booking.index') }}"><font color="#ffffff" face="微軟正黑體"><i class="fa fa-edit"></i>  新增訂位_Booking</font></a>
            </li>
            <li>
                <a href=""><font color="#ffffff" face="微軟正黑體"><i class="fa fa-check-square-o"></i>  確認餐點_Check</font></a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>

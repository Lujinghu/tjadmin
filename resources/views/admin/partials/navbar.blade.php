<ul class="nav navbar-nav">
    <li><a href="/">官网主页</a></li>
    @if (Auth::check())
        <li @if (Request::is('admin/student*')) class="active" @endif>
            <a href="/admin/student">学生管理</a>
        </li>
        <li @if (Request::is('admin/teacher*')) class="active" @endif>
            <a href="/admin/teacher">教师管理</a>
        </li>
        <li @if (Request::is('admin/classtable*')) class="active" @endif>
            <a href="/admin/classtable">课程管理</a>
        </li>
    @endif
</ul>

<ul class="nav navbar-nav navbar-right">
    @if (Auth::guest())
        <li><a href="/auth/login">Login</a></li>
    @else
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
               aria-expanded="false">
                {{ Auth::user()->name }}
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="/auth/logout">Logout</a></li>
            </ul>
        </li>
    @endif
</ul>
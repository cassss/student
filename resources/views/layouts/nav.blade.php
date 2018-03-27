{{--nav start--}}
<nav class="navbar navbar-inverse" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
            <span class="sr-only">切换导航</span>
        </button>
        <a class="navbar-brand" href="/">网课</a>
    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse-01">
        <ul class="nav navbar-nav">
            @if(Auth::check())
                @if(Auth::user()->root == 1)
                    <li><a href="/admin/newteacher">添加教师</a></li>
                    <li><a href="/admin/teachers">教师列表</a></li>
                    <li><a href="/admin/newclass">添加课程</a></li>
                    <li><a href="/admin">课程列表</a></li>
                    <li><a href="/admin/newdata">添加课件资料</a></li>
                @endif
                    <li><a href="/datas">课件资料列表</a></li>
            @endif
        </ul>
        @if(Auth::check())
            <div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            欢迎你，{{Auth::user()->name}}
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            @if(Auth::user()->root == 1)
                                <li><a href="/admin">后台管理中心</a></li>
                            @endif
                            <li><a href="/user">个人中心</a></li>
                            <li><a href="/logout">登出</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        @else
            <ul class="nav navbar-nav navbar-right">
                <li ><a href="/login">登录</a></li>
                <li ><a href="/register">注册</a></li>
            </ul>
        @endif
    </div><!-- /.navbar-collapse -->
</nav><!-- /navbar -->
{{--nav end--}}
@extends('layouts.app')
@section('title', '登录')
@section('style')
    @include('auth.input')
@endsection
@section('content')
    <form href="/register"  method="post">
        {{csrf_field()}}
        @if (count($errors) > 0)
            <div class="alert alert-danger input">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="input">
            <span>用户名：</span><input type="text" name="name" placeholder="请输入用户名" class="form-control" />
        </div>
        <div class="input">
            <span>邮箱：</span><input type="text" name="email" placeholder="请输入邮箱" class="form-control" />
        </div>
        <div class="input">
            <span>密码：</span><input type="password" name="password" placeholder="请输入密码" class="form-control" />
        </div>
        <div class="input">
            <span>确认密码：</span><input type="password" name="password_confirmation" placeholder="请输入密码" class="form-control" />
        </div>
        <div class="input">
            <center><button type="submit" class="btn btn-hg btn-primary">注册</button></center>
        </div>

    </form>
@endsection
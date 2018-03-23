@extends('layouts.app')
@section('title', '登录')
@section('style')
    <style>
        .card{
            width: 250px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
            text-align: center;
            margin: 25px 31.25px;
            float: left;
            overflow: hidden;
        }
        .body{
            padding: 10px;
        }
        .card img{width: 100%;}
        .klass{
            width: 90%;
            margin-left:5%;
            overflow: hidden;
        }
    </style>
@endsection
@section('content')
    <div class="klass">
        <div class="card">
            <a href="/class/1">
                <img src="http://static.runoob.com/images/mix/img_avatar.png"  alt="课程名称">
                <div class="body">
                    <p>课程名称</p>
                </div>
            </a>
        </div>
    </div>

@endsection
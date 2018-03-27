@extends('layouts.app')
@section('title', '个人中心')
@section('style')
    <style type="text/css">
        .card{width: 250px;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);text-align: center;}
        .header{
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            font-size: 40px;
        }
        .body{
            padding: 10px;
        }
        .card img{width: 100%;}
    </style>
@endsection
@section('content')
    <center>
        <div class="card">
            <div class="header">
                <h1>{{$user->name}}</h1>
            </div>
            <div class="body">
                    <p>积分：{{count($user->fractions)}}分</p>
                @if(count($user->fractions) >20 )
                    <p>恭喜获得终极学霸称号</p>
                @endif
            </div>
        </div>
    </center>
@endsection
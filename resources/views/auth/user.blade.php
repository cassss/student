@extends('layouts.app')
@section('title', '登录')
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
                @if($user->section == null)
                    <p>积分：0分</p>
                @else
                    <p>积分：{{$user->section}}分</p>
                @endif
            </div>
        </div>
    </center>
@endsection
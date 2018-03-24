@extends('layouts.app')
@section('title', '课程列表')
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
    @foreach($classs as $class)
        <div class="klass">
            <div class="card">
                <a href="/class/{{$class->id}}">
                    <img src="{{$class->img}}"  alt="{{$class->name}}">
                    <div class="body">
                        <p>{{$class->name}}</p>
                    </div>
                </a>
            </div>
        </div>
    @endforeach
@endsection
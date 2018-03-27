@extends('layouts.app')
@section('title', '课程列表')
@section('style')
    <style>
        .section{
            width: 20%;
            float: left;
        }
        .video-css{
            width: 70%;
            float: right;
            margin-right: 10%;
        }
    </style>
@endsection
@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1>{{$class->name}}</h1>
            <p>{{$class->introduce}}</p>
        </div>
    </div>
    @if(count($sections)>0)
        <ul class="nav nav-pills nav-stacked section">
            @foreach($sections as $section)
                <li><a href="/class/{{$class->id}}?section={{$section->id}}">{{$section->name}}</a></li>
            @endforeach
        </ul>
        <div class="video-css">
            <video class="video-js " preload="auto"  data-setup="{}">
                @if($video != null)
                    <source src="{{$video}}" type="video/mp4">
                @elseif(count($sections)>0)
                    <source src="{{$sections->first()->video}}" type="video/mp4">
                @endif
            </video>
        </div>
    @else
        <div class="alert alert-danger">对不起该课程暂时无课</div>
    @endif
@endsection
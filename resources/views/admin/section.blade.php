@extends('layouts.app')
@section('title', $title)
@section('style')
    <style>
        .video-css{
            width: 80%;
            float: left;
            margin-left: 10%;
        }
    </style>
@endsection
@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1>{{$section->name}}</h1>
            <p><a href="{{$section->video}}">点击下载视频</a></p>
        </div>
    </div>
    <div class="video-css">
        <video class="video-js " preload="auto"  data-setup="{}">
                <source src="{{$section->video}}" type="video/mp4">
        </video>
    </div>
@endsection
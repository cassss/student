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
            float: left;
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
    <ul class="nav nav-pills nav-stacked section">
        @foreach($sections as $section)
            <li><a href="/class/{{$class->id}}?section={{$section->id}}">{{$section->name}}</a></li>
        @endforeach
    </ul>
    <div class="video-css">
        <video class="video-js " preload="auto"  data-setup="{}">
            @if($video != '')
                <source src="{{$video}}" type="video/mp4">
            @else
                <source src="{{$sections->first()->video}}" type="video/mp4">
            @endif
        </video>
    </div>
@endsection
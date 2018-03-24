@extends('layouts.app')
@section('title', '登录')
@section('style')

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
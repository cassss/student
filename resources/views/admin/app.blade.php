@extends('layouts.app')
@section('title', '后台管理页面')
@section('style')
    @include('auth.input')
@endsection
@section('content')
    @if (session('success'))
        <div class="alert alert-success input">
            <ul>
                <li>{{ session('success') }}</li>
            </ul>
        </div>
    @endif
    @if (count($errors) > 0)
        <div class="alert alert-danger input">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <table class="table table-hover">
        <thead>
        <tr>
            <th>课程名</th>
            <th>课程课时</th>
        </tr>
        </thead>
        <tbody>
        @foreach($classs as $class)
            <tr>
                <td><a href="/admin/class/{{$class->id}}">{{$class->name}}</a></td>
                <td>{{$class->sections->count()}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
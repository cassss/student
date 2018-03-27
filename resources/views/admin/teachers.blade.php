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
            <th>教师名</th>
            <th>课程数</th>
        </tr>
        </thead>
        <tbody>
        @foreach($teachers as $teacher)
            <tr>
                <td>{{$teacher->name}}</td>
                <td>{{$teacher->klasss->count()}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
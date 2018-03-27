@extends('layouts.app')
@section('title', $title.'-章节列表页面')
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
            <th>章节名</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sections as $section)
            <tr>
                <td><a href="/admin/section/{{$section->id}}">{{$section->name}}</a></td>
            </tr>
        @endforeach
        @if(count($sections) == 0)
            <tr>
                <td><div class="alert alert-danger">对不起该课程暂时无课</div></td>
            </tr>
        @endif
        <tr>
            <td><a href="/admin/class/{{$id}}/newsection">添加章节</a></td>
        </tr>
        </tbody>
    </table>
@endsection
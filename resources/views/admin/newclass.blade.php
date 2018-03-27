@extends('layouts.app')
@section('title', '添加课程')
@section('style')
    @include('auth.input')
    <style>
        .file {
            margin-top: 1em;
        }
    </style>
@endsection
@section('content')
    <form action="/admin/newclass" enctype="multipart/form-data"  method="post">
            @if (count($errors) > 0)
                <div class="alert alert-danger input">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        {{csrf_field()}}
        <div class="input">
            <span>课程名：</span><input type="text" name="name" placeholder="课程名" class="form-control" />
        </div>
        <div class="input">
            <span>教师名：</span><input class="form-control" name="teacher_name" rows="3" placeholder="教师名"/>
        </div>
        <div class="input">
            <span>课程介绍：</span><textarea class="form-control" name="introduce" rows="3" placeholder="课程介绍"></textarea>
        </div>

        <div class="form-group file">
            <center>
                <label class="sr-only" for="inputfile">文件输入</label>
                <input type="file" name="file"><br>
            </center>
        </div>
        <div class="input">
            <center><button type="submit" class="btn btn-hg btn-primary">添加</button></center>
        </div>

    </form>
@endsection
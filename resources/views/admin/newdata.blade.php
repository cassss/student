@extends('layouts.app')
@section('title', '添加章节')
@section('style')
    @include('auth.input')
    <style>
        .file {
            margin-top: 1em;
        }
    </style>
@endsection
@section('content')
    <form href="/admin/newdata" enctype="multipart/form-data"  method="post">
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
            <span>资料名：</span><input type="text" name="name" placeholder="资料名" class="form-control" />
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
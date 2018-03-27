@extends('layouts.app')
@section('title', '资料列表页面')
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
            <th>资料名</th>
        </tr>
        </thead>
        <tbody>
        @foreach($datas as $data)
            <tr>
                <td><a href="{{$data->data}}">{{$data->name}}</a></td>
            </tr>
        @endforeach
        @if(count($datas) == 0)
            <tr>
                <td><div class="alert alert-danger">对不起暂时无资料</div></td>
            </tr>
        @endif
        </tbody>
    </table>
@endsection
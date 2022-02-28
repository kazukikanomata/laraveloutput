@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>タスク追加</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header">タスクを追加</div>
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if(session('message'))
                            <div class="alert alert-success">{{ session('message') }}</div>
                        @endif
                        
                        <div class="card-body">
                            <form action="{{ route('tasks.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <p>タスクの内容</p>
                                    <textarea name="content" placeholder="内容" class="form-control">{{old('content')}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="due_time">期限</label>
                                    <input type="date" name="due_time" placeholder="いつまで？" class="form-control" value="{{old('due_time')}}"/>
                                </div>
                                <div class="form-group">
                                    <label for="status">状態</label>
                                    <select name="status" class="form-control">
                                        <option value="未" selected　@if(old('status')=='未') selected  @endif>未</option>
                                        <option value="進行中" @if(old('status')=='進行中') selected  @endif>進行中</option>
                                        <option value="完了" @if(old('status')=='完了') selected  @endif>完了</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="time">時間</label>
                                    <input type="time" name="time" value="{{old('time')}}" placeholder="どれくらいかかる？" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select name="category_id" class="form-control">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">送信</button>
                                <button type="button" onClick="history.back()" class="btn btn-danger">戻る</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
@endsection
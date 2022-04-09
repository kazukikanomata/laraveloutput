@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>タスク編集</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header">編集画面</div>
                        <div class="card-body">
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
                            <div class="content">
                                <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="content" class="my-2">タスクの内容</label>
                                        <textarea name="content" placeholder="内容" class="form-control">{{ old('content', $task->content) }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="due_time">期限</label>
                                        <input type="date" name="due_time" placeholder="いつまで？" class="form-control" value="{{ old('due_time', $task->due_time->format('Y-m-d')) }}"/>                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="status">状態</label>
                                        <select name="status" class="form-control">
                                            <option value="未"  @if(old('status', $task->status =='未')) selected  @endif>未</option>
                                            <option value="進行中" @if(old('status', $task->status =='進行中')) selected  @endif>進行中</option>
                                            <option value="完了" @if(old('status', $task->status =='完了')) selected  @endif>完了</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="time">時 : 分</label>
                                        <input type="time" name="time" value="{{ old('time', $task->time) }}" placeholder="どれくらいかかる？" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <select name="category_id" class="form-control">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="button">
                                        <button type="submit" class="btn btn-secondary">更新</button>
                                        <button type="button" onClick="history.back()" class="btn btn-primary">戻る</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
@endsection
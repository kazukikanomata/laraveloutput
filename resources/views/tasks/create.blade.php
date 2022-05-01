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
                                    <label for="content" class="my-2">タスクの内容</label>
                                    <textarea class="textarea textarea-primary form-control" name="content" placeholder="内容"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="due_time">期限</label><br>
                                    <input type="date" name="due_time" placeholder="いつまで？" class="input input-bordered input-primary w-full max-w-xs">
                                </div>
                                <div class="form-group">
                                    <label for="status">状態</label><br>
                                    <select name="status" class="select select-primary w-full max-w-xs form-control">
                                        <option value="未">未</option>
                                        <option value="進行中">進行中</option>
                                        <option value="完了">完了</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="time">h:m</label><br>
                                    <input type="time" name="time" placeholder="どれくらいかかる？" class="input input-bordered input-primary w-full max-w-xs">
                                </div>
                                <div class="form-group">
                                    <label for="category">Category</label><br>
                                    <select name="category_id" class="select select-primary w-full max-w-xs form-control">
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
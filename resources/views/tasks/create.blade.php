@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Task</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col col-md-offset-1 col-md-10">
                    <div class="card">
                        <div class="card-header">タスクを追加する</div>
                        <div class="card-body">
                            <form action="{{ route('tasks.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <p>タスクの内容</p>
                                    <textarea name="task[content]" placeholder="内容"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="due_time">期限</label>
                                    <input type="date" name="task[due_time]" placeholder="いつまで？"/>
                                </div>
                                <div class="form-group">
                                    <label for="status">状態</label>
                                    <select name="task[status]">
                                          <option value="未" name="first">未</option>
                                          <option value="進行中" name="second">進行中</option>
                                          <option value="完了" name="third">完了</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="time">時間</label>
                                    <input type="number" name="task[time]" placeholder="どれくらいかかる？"/>
                                </div>
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select name="task[category_id]">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">送信</button>
                                <a href="{{ route('categories.index') }}" class="btn btn-danger">戻る</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
@endsection
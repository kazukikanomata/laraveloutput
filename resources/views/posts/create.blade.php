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
                <div class="col col-md-offset-3 col-md-6">
                    <nav class="panel panel-default">
                        <div class="panel-heading">タスクを追加する</div>
                        <form action="/posts" method="POST">
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
                                      <option value="first">未</option>
                                      <option value="second">進行中</option>
                                      <option value="third">完了</option>
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
                        </form>
                        <div class="back">[<a href="/">back</a>]</div>
                    </nav>
                </div>
            </div>
        </div>
        
    </body>
</html>
@endsection
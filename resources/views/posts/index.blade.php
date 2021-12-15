@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>テーブル一覧</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <main>
            <div class="container">
                <div class="row justify-center-center">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">タスク追加・詳細</div>
                            <div class="card-body">
                                <a href="posts/create">タスク追加</a><br>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">タスク</div>
                            <div class="card-body">
                                <div class="tasks">
                                    <div class="task">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="id"></th>
                                                    <th class="content">タスクの内容</th>
                                                    <th class="due_time">期限</th>
                                                    <th class="status">状態</th>
                                                    <th class="time">かかる時間</th>
                                                    <th class="icon"></th>
                                                    <th class="icon"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($tasks as $task)
                                                <tr>
                                                    <td>{{$task->id}}</td>
                                                    <td><a href="/posts/{{$task->id}}">{{$task->content}}</a></td>
                                                    <td>{{$task->due_time}}</td>
                                                    <td>{{$task->status}}</td>
                                                    <td>{{$task->time}}時間</td>
                                                    <td><a href="posts/{{ $task->id }}/edit">編集️</a></td>
                                                    <td><a href="/">削除️</a></td>
                                                </tr>
                                            </tbody>
                                                @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>
<script>
function deleteTask(e) {
    'use strict';
    if (confirm('本当に削除しますか？')){
        document.getElementById('form_{{ $task->id }}').submit();
    }
}
</script>



@endsection
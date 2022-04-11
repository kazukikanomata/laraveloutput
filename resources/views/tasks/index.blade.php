@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>テーブル一覧</title>
    </head>
    <body>
        <main>
            <div class="container">
                <div class="row justify-center-center">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">FoCus</div>
                            <div class="card-body">
                                @foreach($categories as $category_tip)
                                    <h3><a href="{{ route('categories.show',['category'=> $category_tip->name ]) }}">{{ $category_tip->name }}</a></h3><hr>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">タスク：{{$category}}
                                <a href="{{ route('tasks.create') }}" class="btn btn-secondary float-right">+タスク</a>
                            </div>
                            <div class="card-body">
                                <div class="tasks">
                                    <div class="task">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="id"></th>
                                                    <th class="content">内容</th>
                                                    <th class="due_time">期限</th>
                                                    <th class="status">状態</th>
                                                    <th class="time">h : m</th>
                                                    <th class="icon"></th>
                                                    <th class="icon"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($tasks as $task)
                                                <tr>
                                                    <td>
                                                        <li></li>
                                                    </td>
                                                    <td>
                                                        <a href ="{{ route('tasks.show', ['category'=> $category,'task' => $task->id]) }}">{{ $task->content }}</a>
                                                    </td>
                                                    <td>{{ substr($task->due_time,0,10) }}</td>
                                                    <td>{{ $task->status }}</td>
                                                    <td>{{ substr($task->time,0,5) }}</td>
                                                    <td>
                                                        <a href ="{{ route('tasks.edit', ['task'=> $task->id ]) }}" class="btn btn-success">編集️</a>
                                                    </td>
                                                    <td>
                                                        <form method="post" action="{{ route('tasks.destory', $task->id) }}" id="delete_{{ $task->id }}" >
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger" onclick="return confirm('本当に削除しますか？');">-タスク</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
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
@endsection
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>テーブル一覧</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <h1>タスク追加</h1>
            [<a href="posts/create">追加</a>]
            <h1>カテゴリー名</h1>
            <div class="tasks">
                <div class="task">
                    <table>
                    @foreach ($tasks as $task)
                        <thead>
                            <tr>
                                <th class="id"></th>
                                <th class="content">タスクの内容</th>
                                <th class="due_time">期限</th>
                                <th class="status">状態</th>
                                <th class="time">かかる時間</th>
                                <th class="icon">編集</th>
                                <th class="icon">削除</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$task->id}}</td>
                                <td>{{$task->content}}</td>
                                <td>{{$task->due_time}}</td>
                                <td>{{$task->status}}</td>
                                <td>{{$task->time}}</td>
                                <td><a href="">🖊️</a></td>
                                <td><a href="">🗑️</a></td>
                            </tr>
                        </tbody>
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
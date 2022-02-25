<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tasks</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <div class="container">
            <div class="row justify-center-center mx-auto">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">タスク詳細</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>内容</th>
                                        <th>期限</th>
                                        <th>状態</th>
                                        <th>時間</th>
                                        <th>カテゴリー名</th>
                                        <th></th>
                                        <th></th>
                                    </tr>    
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $task->content }}</td>
                                        <td>{{ $task->due_time }}</td>
                                        <td>{{ $task->status }}</td>
                                        <td>{{ $task->time }}時間</td>
                                        <td>{{ $task->category_id }}</td>
                                        <td><a href="/tasks/{{ $task->id }}/edit" class="btn btn-success">編集</a></td>
                                        <td>
                                            <form method="post" action="{{ action('TaskController@destory', $task->id) }}" id="delete_{{ $task->id }}" >
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('本当に削除しますか？');">削除</button>
                                            </form>
                                        </td>
                                        <button type="submit" onClick="history.back()" class="btn btn-secondary">戻る</button>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
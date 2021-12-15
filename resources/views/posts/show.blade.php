<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
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
                                        <td><a href="/posts/{{ $task->id }}/edit">編集</a></td>
                                        <td><a href="">削除️</a></td>
                                        <a href="/">戻る</a>
                                    </tr>
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
            <!--<p class="delete">　削除まだ途中-->　
            <!--    <form action"/posts/{{ $task->id }}" id="form_{{ $task->id }}" method="post">-->
            <!--    @csrf-->
            <!--    @method('DELETE')-->
                
            <!--    </form>-->
            <!--</p>-->
        <script>
function deleteTask(e) {
    'use strict';
    if (confirm('本当に削除しますか？')){
        document.getElementById('form_{{ $task->id }}').submit();
    }
}

</script>
    </body>
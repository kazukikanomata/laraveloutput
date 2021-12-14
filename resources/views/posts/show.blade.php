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
        <h1 class="title">
            {{ $task->content }}
        </h1>
        <h3>期限</h3>
        <p>{{ $task->due_time }}</p>
        <h3>状態</h3>
        <p>{{ $task->status }}</p>
        <h3>時間</h3>
        <p>{{ $task->time }}</p>
        <h3>カテゴリー名</h3>
        <p>{{ $task->category_id }}</p>
        <div class="footer">
            <p class="edit">[<a href="/posts/{{ $task->id }}/edit">編集</a>]</p>
            <a href="/">戻る</a>
        </div>
    </body>
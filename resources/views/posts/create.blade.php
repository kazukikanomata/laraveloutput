<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Task</title>
    </head>
    <body>
        <h1>リスト追加</h1>
        <form action="/posts" method="POST">
            @csrf
            <h2>タスクの内容</h2>
            <input type="text" name="task[content]" placeholder="タイトル"/>
                <div class="body">
                    <h2>期限</h2>
                    <input type="date" name="task[due_time]" placeholder=""/>
                    <h2>状態</h2>
                    <select name="task[status]">
                          <option value="first">未</option>
                          <option value="second">進行中</option>
                          <option value="third">完了</option>
                    </select>
                    <h2>時間</h2>
                    <input type="number" name="task[time]" placeholder=""/>
                </div>
                <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
    </body>
</html>
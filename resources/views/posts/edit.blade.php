@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<body>
    <h1 class="title">編集画面</h1>
    <div class="content">
        <form action="/posts/{{ $task->id }}" method="POST">
            @csrf
            @method('PUT')
            <h2>タスクの内容</h2>
            <textarea name="task[content]" placeholder="内容"></textarea>
                <div class="body">
                    <h2>期限</h2>
                    <input type="date" name="task[due_time]" placeholder="いつまで？"/>
                    <h2>状態</h2>
                    <select name="task[status]">
                          <option value="first">未</option>
                          <option value="second">進行中</option>
                          <option value="third">完了</option>
                    </select>
                    <h2>時間</h2>
                    <input type="number" name="task[time]" placeholder="どれくらいかかる？"/>
                    <div class="category">
                        <h2>Category</h2>
                    </div>
                </div>
            <input type="submit" value="保存">
        </form>
    </div>
</body>
@endsection
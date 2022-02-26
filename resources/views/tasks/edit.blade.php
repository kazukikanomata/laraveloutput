@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<body>
    <div class="container">
        <div class="row" >
            <div class="col-md-10 col-md-offset-1">
                <div class="card">
                    <div class="card-header">編集画面</div>
                    <div class="card-body">
                        <div class="content">
                            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <p class="my-2">タスクの内容</p>
                                // 全部の内容を編集しなくてはならない
                                <textarea name="task[content]" placeholder="{{ $task->content }}"></textarea>
                                <p class="my-2">期限</p>
                                <input type="date" name="task[due_time]" placeholder="{{ $task->due_time }}"/>
                                <p class="my-2">状態</p>
                                <select name="task[status]">
                                      <option value="first">未</option>
                                      <option value="second">進行中</option>
                                      <option value="third">完了</option>
                                </select>
                                <p class="my-2">時間</p>
                                <input type="number" name="task[time]" placeholder="{{ $task->time }}"/><br>
                                <div class="button">
                                    <button type="submit" class="btn btn-secondary">更新</button>
                                    <button type="submit" onClick="history.back()" class="btn btn-primary">戻る</button>    
                                </div>
                            </form>
                            
                        </div>        
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
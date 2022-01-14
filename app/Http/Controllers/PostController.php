<?php

namespace App\Http\Controllers;
use App\Task;
use App\Category;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Task $task)
    {
        //tasksという変数名でtaskテーブルの全データを渡す
        return view('posts/index')->with(['tasks' => $task->get()]);
    }
    public function show(Task $task)
    {
        return view('posts/show')->with(['task' => $task]);
    }
    
    public function create(Category $category)
    {
        return view('posts/create')->with(['categories' => $category->get()]);
    }
    //保存
    public function store(Request $request, Task $task)
    {
        $input = $request['task'];
        $input += ['user_id' => $request->user()->id];
        $task->fill($input)->save();
        return redirect('/posts/' . $task->id);
    }
    public function edit(Task $task)
    {
        return view('posts/edit')->with(['task' => $task]);
    }
    public function update(Request $request, Task $task)
    {
        $input_task = $request['task'];
        $task->fill($input_task)->save();
        return redirect('/posts/' . $task->id);
    }
    public function destory(Task $task)
    {
        $task->delete();
        //$task->save();
        return redirect('/');
    }
}
?>
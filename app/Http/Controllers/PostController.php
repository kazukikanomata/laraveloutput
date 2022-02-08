<?php

namespace App\Http\Controllers;
use App\Task;
use App\Category;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Task $task)
    {
        return view('tasks/index')->with(['tasks' => $task->get()]);
    }
    public function show(Task $task)
    {
        return view('tasks/show')->with(['task' => $task]);
    }

    public function create(Category $category)
    {
        return view('tasks/create')->with(['categories' => $category->get()]);
    }
    //保存
    public function store(Request $request, Task $task)
    {
        $input = $request['task'];
        $input += ['user_id' => $request->user()->id];
        $task->fill($input)->save();
        return redirect('/tasks/' . $task->id);
    }
    public function edit(Task $task)
    {
        return view('tasks/edit')->with(['task' => $task]);
    }
    public function update(Request $request, Task $task)
    {
        $input_task = $request['task'];
        $task->fill($input_task)->save();
        return redirect('/tasks/' . $task->id);
    }
    public function destory(Task $task)
    {
        $task->delete();
        return redirect('/');
    }
}
?>
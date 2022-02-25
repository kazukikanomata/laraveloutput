<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Category;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create(Category $category)
    {
         return view('tasks/create')->with(['categories' => $category->get()]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Task $task)
    {
        $input = $request['task'];
        $input += ['user_id' => $request->user()->id];
        $task->fill($input)->save();
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $category, $task)
    {
        // ルートパラメータである$categoryと、クエリパラメータを受け取るための$requestを書きます。
        // リクエストされたものをcategoryに代入し、新しく$categoryをつくる。
        $category = $request->category;
        $task = Task::find($task);
        return view('tasks/show')->with(['category'=> $category,'task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request , $category ,Task $task)
    {
        return view('tasks/edit')->with(['category' => $category,'task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $input_task = $request['task'];
        $task->fill($input_task)->save();
        return redirect('/tasks/' . $task->id);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destory(Task $task)
    {
        $task->delete();
        return redirect()->route('categories.index');
    }
}

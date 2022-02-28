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
    public function store(Request $request)
    {
        $inputs = $request->validate([
            'content'=>'required|max:255',
            'due_time'=>'required',
            'status'=>'required',
            'time'=>'required',
            'category_id'=>'required',
            ]);
        
        $task = new Task();
        $task->content = $inputs['content'];
        $task->due_time = $inputs['due_time'];
        $task->status = $inputs['status'];
        $task->time = $inputs['time'];
        $task->category_id = $inputs['category_id'];
        $task->user_id = auth()->user()->id; //もしユーザーidがあったら
        $task->save();
        // Task::create($request->all());
        return back()->with('message','タスクを保存しました');
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
        // 引数の値と連動しているタスクをモデルより引き出す。
        $task = Task::find($task);
        return view('tasks/show')->with(['category'=> $category,'task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,Task $task)
    {
        $categories = Category::all();
        return view('tasks/edit')->with(['task' => $task,'categories'=> $categories]);
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
        //$input_task = $request['task'];
        //$task->fill($input_task)->save();
        $inputs = $request->validate([
            'content'=>'required|max:255',
            'due_time'=>'required',
            'status'=>'required',
            'time'=>'required',
            'category_id'=>'required',
            ]);
        
        $task->content = $inputs['content'];
        $task->due_time = $inputs['due_time'];
        $task->status = $inputs['status'];
        $task->time = $inputs['time'];
        $task->category_id = $inputs['category_id'];
        $task->user_id = auth()->user()->id; //もしユーザーidがあったら
        $task->update();
        // Task::create($request->all());
        return back()->with('message','タスクを更新しました');
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
        return back()->with('message','タスクを削除しました');
    }
}

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
        return redirect('/tasks/' . $task->id);
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
    public function edit(Task $task)
    {
        return view('tasks/edit')->with(['task' => $task]);
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
    
    // public function category(Request $request, $category)
    // {
    //     $request->validate([
    //     // categoriesテーブルにnameのカラム名があるか確認
    //         'category'=>'exists:categories,name'
    //     ]);
        
    //     $category = Category::where('name' , $request->get('category'))->first();
    //     // $categoryに値が存在しているなら
    //     if($category !== null){
    //         return view('tasks.index')->with('name', 'NW')
    //         ->with('name', 'NP')
    //         ->with('name', 'WW')
    //         ->with('name', 'WP');
    //     } else {
    //         return \App::abort(404);    
    //     };
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/tasks');
    }
}

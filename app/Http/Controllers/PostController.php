<?php

namespace App\Http\Controllers;
use App\Task;
use App\Category;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Task $task)
    {
        return view('posts/index')->with(['tasks' => $task->get()]);
    }
    
    public function create(Category $category)
    {
        return view('posts/create')->with(['categories' => $category->get()]);;
    }
    //保存
    public function store(Request $request, Task $task)
    {
        $input = $request['task'];
        $input += ['user_id' => $request->user()->id];
        $task->fill($input)->save();
        return redirect('/posts/' . $task->id);
    }
}
?>
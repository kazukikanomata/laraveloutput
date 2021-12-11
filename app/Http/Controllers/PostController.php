<?php

namespace App\Http\Controllers;
use App\Task;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Task $task)
    {
        return view('posts/index')->with(['tasks' => $task->get()]);
    }
    
    public function create()
    {
        return view('posts/create');
    }
    
    //public funciton 
}
?>
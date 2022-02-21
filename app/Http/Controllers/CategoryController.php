<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        $categories = Category::all();
        return view('tasks/select')->with('categories' , $categories);
    }
    public function show($category)
    {
        // カテゴリーの中から、取得したものとの名前が一致したものを代入
        $current_category_id = Category::where('name', $category)->value('id');
        //　現在取得しているカテゴリーのidとtasksテーブルのcategory_idが等しいものを取得
        $tasks = Task::where('category_id' , $current_category_id)->get();
        return view('tasks/index')->with(['tasks' => $tasks]);
    }
}

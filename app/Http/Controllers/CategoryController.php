<?php

namespace App\Http\Controllers;

use App\Models\Category;

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
        
    }
}

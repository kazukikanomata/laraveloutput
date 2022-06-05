<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function getLists()
    {
        // id と nameのキーのみを取得する
        $categories = Category::orderBy('id','asc')->pluck('name','id');
        return $categories;
    }
    public function tasks()
    {
        return $this->hasMany('App\Models\Task');
    }
}

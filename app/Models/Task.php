<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Task extends Model
{
    use SoftDeletes;
    public function user()
    {
    return $this->belongsTo('App\Models\User');
    }
    public function category()
    {
    return $this->belongsTo('App\Models\Category');
    }
    // 任意のカテゴリを含むものとする（ローカル）スコープ
    public function scopeCategoryAt($query, $category_id)
    {
    if (empty($category_id)) {
        return;
    }
 
    return $query->where('category_id', $category_id);
    }
    
    protected $fillable = [
        'user_id',
        'category_id',
        'content',
        'due_time',
        'status',
        'time',
        ];
    protected $dates = ['due_time'];
}

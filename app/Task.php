<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function user()
    {
    return $this->belongsTo('App\User');
    }
    public function category()
    {
    return $this->belongsTo('App\Category');
    }
    // function getPaginateByLimit(int $limit_count = 5)
    // {
    // return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    // }
    
    protected $fillable = [
        'user_id',
        'category_id',
        'content',
        'due_time',
        'status',
        'time',
        ];
}

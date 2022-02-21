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
    
    protected $fillable = [
        'user_id',
        'category_id',
        'content',
        'due_time',
        'status',
        'time',
        ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;

class Todo extends Model
{
    use HasFactory;

    public function tasks()
    {
        return $this->hasMany(Task::class, 'todo_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

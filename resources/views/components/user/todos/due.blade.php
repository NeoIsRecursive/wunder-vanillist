<?php

use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

// $todos = Todo::select()->where('user_id', 'is', Auth::user()->id)->orderByDesc('due_date')->take(2)->get();
$todos = Todo::query()->where('user_id', 'is', Auth::user()->id);

foreach ($todos  as $todo) {
    print_r($todo['name'] . $todo['due_date']);
}

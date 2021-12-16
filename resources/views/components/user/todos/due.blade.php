<?php

use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

// $todos = Todo::select()->where('user_id', 'is', Auth::user()->id)->orderByDesc('due_date')->take(2)->get();
// $todos = Todo::query()->where('user_id', '=', Auth::user()->id)->orderBy('due_date', 'asc')->take(5)->get();
$todos = Todo::query()->where('user_id', '=', Auth::user()->id)->where('due_date', '=', date('Y-m-d'))->get();

?>

<div>
    <ul>
        @foreach($todos as $todo)
        @include('components.user.todos.todo')
        @endforeach
    </ul>
</div>

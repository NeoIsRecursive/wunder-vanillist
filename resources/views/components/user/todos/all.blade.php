<?php

use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

$todos = Todo::all()->where('user_id', 'is', Auth::user()->id);

?>

@include('components.nav')
<div>
    <ul>
        @foreach($todos as $todo)
        @include('components.user.todos.todo')
        @endforeach
    </ul>
</div>
@include('components.footer')

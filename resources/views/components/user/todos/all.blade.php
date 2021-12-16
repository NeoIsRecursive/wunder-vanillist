<?php

use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

$todos = Todo::all()->where('user_id', 'is', Auth::user()->id);

?>

@include('components.nav')
<div>
    @if (count($todos) < 1) <p>Looks like you dont have anything to do, <a href="{{ route('todo.new') }}">make a new one?</a></p>
        @else
        <ul>
            @foreach($todos as $todo)
            @include('components.user.todos.todo')
            @endforeach
        </ul>
        @endif
</div>
@include('components.footer')

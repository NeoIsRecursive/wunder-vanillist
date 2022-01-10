<?php

use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

$todos = Todo::all()->where('user_id', 'is', Auth::user()->id);

?>

@include('components.nav')
<main>
    <meta name="_token" class="token bg-green-100" content="{{ csrf_token() }}">
    @if (count($todos) < 1) <p>Looks like you dont have anything to do, <a href="{{ route('todo.new') }}">make a new one?</a></p>
        @else
        @foreach($todos as $todo)
        @include('components.user.todos.todo')
        @endforeach
        @endif
</main>
<script type="text/javascript" src="{{ URL::asset('js/tasks/createTask.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/tasks/new.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/tasks/update.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/tasks/fetch.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/remove.js') }}"></script>
@include('components.footer')

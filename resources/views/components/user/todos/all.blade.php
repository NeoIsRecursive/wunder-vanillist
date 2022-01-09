<?php

use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

$todos = Todo::all()->where('user_id', 'is', Auth::user()->id);

?>

@include('components.nav')
<div>
    <meta name="_token" class="token bg-green-100" content="{{ csrf_token() }}">
    @if (count($todos) < 1) <p>Looks like you dont have anything to do, <a href="{{ route('todo.new') }}">make a new one?</a></p>
        @else
        <ul>
            @foreach($todos as $todo)
            @include('components.user.todos.todo')
            @endforeach
        </ul>
        @endif
</div>
<script type="text/javascript" src="{{ URL::asset('js/fetch.js') }}"></script>
@include('components.footer')

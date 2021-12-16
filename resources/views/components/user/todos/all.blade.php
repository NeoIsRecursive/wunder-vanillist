<?php

use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

$todos = Todo::all()->where('user_id', 'is', Auth::user()->id);

?>


@include('components.nav')
<div>
    <ul>
        @foreach($todos as $todo)
        <li>
            <div class="flex justify-between items-center bg-amber-100 p-6 m-4">
                <a href="{{ $todo['id'] }}">
                    <p class="text-md">{{ $todo['name'] }}</p>
                </a>
                <div class="flex gap-2.5 items-center">
                    <p>due to: {{ $todo['due_date'] }}</p>
                    <button class="bg-red-600 p-2">remove</button>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@include('components.footer')

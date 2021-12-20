<li>
    <div class="flex justify-between items-center bg-amber-100 p-6 m-4">
        <a href="{{ route('tasks',$todo['id']) }}">
            <p class="text-md">{{ $todo['name'] }}</p>
        </a>
        <div class="flex gap-2.5 items-center">
            <p>due to: {{ $todo['due_at'] }}</p>
            <button class="bg-red-600 p-2">remove</button>
        </div>
    </div>
</li>

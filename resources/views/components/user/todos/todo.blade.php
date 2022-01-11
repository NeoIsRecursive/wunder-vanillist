<div id="{{ $todo['id'] }}" class="bg-amber-100 p-6 m-4">
    <div class="flex justify-between items-center">
        <p class="text-md" onclick="reveal(<?= $todo['id'] ?>)">{{ $todo['name'] }}</p>
        <div class="flex gap-2.5 items-center">
            <p>due to: {{ $todo['due_at'] }}</p>
            <button class="bg-red-600 p-2" onclick="removeTodo(<?= $todo['id'] ?>)">remove</button>
        </div>
    </div>
</div>

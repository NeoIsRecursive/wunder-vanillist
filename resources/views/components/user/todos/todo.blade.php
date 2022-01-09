<li>
    <div id="{{ $todo['id'] }}" class="flex justify-between items-center bg-amber-100 p-6 m-4">
        <p class="text-md" onclick="reveal(<?= $todo['id'] ?>)">{{ $todo['name'] }}</p>
        <div class="flex gap-2.5 items-center">
            <p>due to: {{ $todo['due_at'] }}</p>
            <button class="bg-red-600 p-2">remove</button>
        </div>
    </div>
</li>

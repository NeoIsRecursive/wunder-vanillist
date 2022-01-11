<div id="{{ $todo['id'] }}" class="bg-amber-100 p-6 m-4">
    <div class="flex justify-between items-center">
        <p class="text-md">{{ $todo['name'] }}</p>
        <div class="flex gap-2.5 items-center">
            <p>
                @if ($todo['due_at'] !== null)
                due
                @if ($todo['due_at'] === date('Y-m-d'))
                today
                @else {{ $todo['due_at'] }}
                @endif
                @endif
            </p>
            <div>
                <button class="bg-green-600 openBtn" onclick="reveal(<?= $todo['id'] ?>)">open</button>
                <button class="bg-red-600" onclick="removeTodo(<?= $todo['id'] ?>)">remove</button>
            </div>
        </div>
    </div>
</div>

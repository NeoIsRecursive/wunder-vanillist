<form method="post" action="{{ route('task.create') }}" class="form">
    <h2 class="text-center underline decoration-black underline-offset-8 font-lg font-bold">New task</h2>
    <div class="input">
        <label for="name">task:</label>
        <input type="text" name="task" id="name">
    </div>
    <input type="hidden" value="{{ Route::input('todo_id') }}" name="todo_id" />
    <button type="submit" class="submit">add</button>
    @if ($errors->any())
    @foreach($errors->all() as $error)
    <p>
        {{ $error }}
    </p>
    @endforeach
    @endif
    @csrf
</form>

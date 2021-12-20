@include('components.nav')
<form method="post" action="{{ route('todo.create') }}" class="form">
    <h2 class="text-center underline decoration-black underline-offset-8 font-lg font-bold">New todo</h2>
    <div class="input">
        <label for="name">name:</label>
        <input type="text" name="name" id="name">
    </div>
    <div class="input">
        <label for="due_date">due date (optional) format(xxxx-xx-xx)</label>
        <input type="date" id="due_date" name="due_date">
    </div>
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
@include('components.footer')

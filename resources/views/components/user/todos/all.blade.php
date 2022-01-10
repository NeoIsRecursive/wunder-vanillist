@include('components.nav')
<main>
    @if (count($todos) < 1) <p>Looks like you dont have anything to do, <a href="{{ route('todo.new') }}">make a new one?</a></p>
        @else
        @include('components.user.todos.list')
        @endif
</main>
@include('components.footer')

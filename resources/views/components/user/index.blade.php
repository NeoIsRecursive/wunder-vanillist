<main class="grid grid-cols-2">
    <div>

    </div>

    <div>
        <h2 class="font-bold m-4 text-center"> due today {{ date('Y-m-d') }}</h2>
        @include('components.user.todos.due')
    </div>
</main>

<main class="grid grid-cols-2">
    <div class="text-center">
        <h2>welcome to wunder vannilist</h2>
        <p>This is the best todolist resource on the entire internet and it rocks a simply beautiful ui</p>
        <p>welcome, to the future.</p>
    </div>

    <div>
        <h2 class="font-bold m-4 text-center"> due today {{ date('Y-m-d') }}</h2>
        @include('components.user.todos.due')
    </div>
</main>

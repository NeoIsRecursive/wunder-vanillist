<main class="flex flex-col">
    <div class="text-center">
        <h2>welcome to wunder vannilist</h2>
        <h3>How it works:</h3>
        <ol class="list-decimal">
            <li>Create a todo</li>
            <li>Add tasks to the todo by clicking on 'open'</li>
            <li>check the checkbox when a todo is completed, uncheck if not</li>
            <li>Delete your todos and all associated tasks by clicking 'delete'</li>
        </ol>
    </div>

    <div>
        <h2 class="font-bold m-4 text-center"> due today {{ date('Y-m-d') }}</h2>
        @include('components.user.todos.due')
    </div>
</main>

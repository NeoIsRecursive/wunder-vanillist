@include('components.nav')

<?php

use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

$tasks = Todo::find(1)->tasks;

foreach ($tasks as $task) {
    print_r($task->id);
    echo '<br>';
    echo '<br>';
}



?>


<main>



    @include('components.user.tasks.new')
</main>
@include('components.footer')

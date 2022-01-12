<?php

declare(strict_types=1);

namespace App\Http\Controllers\task;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Controllers\Controller;

class NewTaskController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
        $data = request()->validate([
            'task' => ['required', 'string', 'max:255'],
            'todo_id' => ['required', 'integer'],
        ]);


        $task = new Task();
        $task->task = trim($data['task']);
        $task->todo_id = $data['todo_id'];
        $task->completed = 0;
        $task->save();

        echo json_encode($task);
    }
}

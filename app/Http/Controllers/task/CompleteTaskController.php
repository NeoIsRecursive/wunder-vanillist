<?php

declare(strict_types=1);

namespace App\Http\Controllers\task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class CompleteTaskController extends Controller
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
            'completed' => ['required', 'integer'],
            'task_id' => ['required', 'integer']
        ]);

        $task = Task::find($data['task_id']);
        if ($data['completed'] == 0) {
            $task->completed = 1;
        } else {
            $task->completed = 0;
        }
        $task->save();

        echo json_encode(request()->completed);
    }
}

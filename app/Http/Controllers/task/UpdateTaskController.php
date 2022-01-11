<?php

namespace App\Http\Controllers\task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateTaskController extends Controller
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
        // $task = Task::find(request()->task_id);
        // $task->task = request()->task_name;
        // $task->save();
        $task = Auth::user()->tasks()->find(request()->task_id);
        $task->task = request()->task_name;
        $task->save();

        echo json_encode($task);
    }
}

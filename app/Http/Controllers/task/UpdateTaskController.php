<?php

declare(strict_types=1);

namespace App\Http\Controllers\Task;

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
        $data = request()->validate([
            'task_id' => ['required', 'integer'],
            'task_name' => ['required', 'string', 'max:255'],
        ]);

        $task = Auth::user()->tasks()->find(request()->task_id);
        $task->task = request()->task_name;
        $task->save();

        echo json_encode($task);
    }
}

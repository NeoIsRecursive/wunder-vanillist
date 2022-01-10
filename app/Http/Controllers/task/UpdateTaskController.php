<?php

namespace App\Http\Controllers\task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\task;

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
        $task = task::find(request()->task_id);
        $task->task = request()->task_name;
        $task->save();

        echo json_encode(request()->task_name);
    }
}

<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DeleteTaskController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = request()->validate([
            'task_id' => ['required', 'integer'],
        ]);

        $tasks = Auth::user()->tasks()->where('tasks.id', '=', $data['task_id']);
        echo json_encode(['tasks_deleted' => $tasks->delete()]);
    }
}

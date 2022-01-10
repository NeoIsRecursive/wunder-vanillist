<?php

namespace App\Http\Controllers\task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\DB;

class GetTaskController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $query = DB::table('todos')->join('tasks', 'tasks.todo_id', '=', 'todos.id')
            ->where('todos.id', '=', request()->todo_id)
            ->where('todos.user_id', '=', auth()->id());
        $tasks = $query->get([
            'todos.id as id',
            'tasks.id as task_id',
            'tasks.task as task_name',
            'tasks.completed as completed',
        ]);
        echo json_encode($tasks);
    }
}

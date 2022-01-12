<?php

declare(strict_types=1);

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $data = request()->validate([
            'todo_id' => ['required', 'integer']
        ]);

        // $query = DB::table('todos')->join('tasks', 'tasks.todo_id', '=', 'todos.id')
        //     ->where('todos.id', '=', request()->todo_id)
        //     ->where('todos.user_id', '=', auth()->id());

        $tasks = Auth::user()->tasks()->where('todos.id', '=', $data['todo_id'])->get([
            'todos.id as id',
            'tasks.id as task_id',
            'tasks.task as task_name',
            'tasks.completed as completed',
        ]);
        // $tasks = $query->get([
        //     'todos.id as id',
        //     'tasks.id as task_id',
        //     'tasks.task as task_name',
        //     'tasks.completed as completed',
        // ]);

        if (count($tasks) === 0) {
            $tasks = 'none';
        }

        echo json_encode($tasks);
    }
}

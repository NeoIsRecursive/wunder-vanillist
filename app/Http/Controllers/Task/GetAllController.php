<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GetAllController extends Controller
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
        $query = Auth::user()->tasks()->orderBy('due_at', 'desc');
        $tasks = $query->get([
            'todos.id as id',
            'tasks.id as task_id',
            'tasks.task as task_name',
            'todos.due_at as due_at',
            'tasks.completed as completed',
        ]);
        echo json_encode($tasks);
    }
}

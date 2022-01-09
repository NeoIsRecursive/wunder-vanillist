<?php

namespace App\Http\Controllers\task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\task;
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
        $data = request()->post('todo_id');

        $tasks = DB::table('todos')->join('tasks', 'todos.id', '=', 'tasks.todo_id')->where('todos.id', 'IS', $data)->where('todos.user_id', 'is', auth()->id())->get();
        echo json_encode($tasks);
    }
}

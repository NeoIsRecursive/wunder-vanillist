<?php

namespace App\Http\Controllers\todo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RemoveTodoController extends Controller
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
        DB::transaction(function () {
            $todo = Auth::user()->todos()->where('id', '=', request()->todo_id);
            $tasks = Auth::user()->tasks()->where('todo_id', '=', request()->todo_id);
            echo json_encode(['tasks deleted' => $tasks->delete(), 'todo deleted' => $todo->delete()]);
        });
    }
}

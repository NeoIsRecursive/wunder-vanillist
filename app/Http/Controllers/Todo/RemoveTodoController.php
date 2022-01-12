<?php

namespace App\Http\Controllers\Todo;

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
            $data = request()->validate([
                'todo_id' => ['required', 'integer'],
            ]);
            $todo = Auth::user()->todos()->where('id', '=', $data['todo_id']);
            $tasks = Auth::user()->tasks()->where('todo_id', '=', $data['todo_id']);
            echo json_encode(['tasks deleted' => $tasks->delete(), 'todo deleted' => $todo->delete()]);
        });
    }
}

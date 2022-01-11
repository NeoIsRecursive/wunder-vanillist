<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use DateTime;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Nullable;

class NewTodoController extends Controller
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

        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'due_date' => ['date_format:Y-m-d', 'after:yesterday', 'Nullable']
        ]);


        $todo = new Todo();
        $todo->name = trim($data['name']);
        $todo->due_at = $data['due_date'];
        $todo->user_id = Auth::user()->id;
        $todo->save();

        return redirect(route('todo.list'));
    }
}

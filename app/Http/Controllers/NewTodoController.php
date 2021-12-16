<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use DateTime;
use Illuminate\Support\Facades\Auth;

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

        if ($request['due_date'] === null) {
            $request['due_date'] = date('Ymd');
        }

        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'due_date' => ['date']
        ]);


        $user = new Todo();
        $user->name = trim($data['name']);
        $user->due_date = $data['due_date'];
        $user->user_id = Auth::user()->id;
        $user->save();

        return redirect(route('todo.list'));
    }
}

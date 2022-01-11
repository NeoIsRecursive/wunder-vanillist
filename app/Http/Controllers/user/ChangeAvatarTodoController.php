<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChangeAvatarTodoController extends Controller
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
        $path = request()->file('avatar')->store('avatars', 'public');
        $user = Auth::user();
        $user->profile_image = $path;
        $user->save();

        return redirect(route('profile'));
    }
}

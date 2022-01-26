<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $image = request()->validate([
            'avatar' => ['required', 'mimes:jpg,png', 'max:2048']
        ]);

        $avatar = Auth::user()->profile_image;

        $path = $image['avatar']->store('avatars', 'public');
        $user = Auth::user();
        $user->profile_image = $path;
        $user->save();

        Storage::delete('public/' . $avatar);

        return redirect(route('profile'));
    }
}

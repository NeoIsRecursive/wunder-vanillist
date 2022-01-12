<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //change password
        $data = request()->validate([
            'password' => ['required'],
            'new_password' => ['required', 'confirmed', 'min:8', 'different:password']
        ]);

        $user = Auth::user();

        if (Hash::check($data['password'], $user->password)) {
            $user->password = Hash::make($data['new_password']);
            $user->save();
            $message = ['passchange' => 'succesfully changed password'];
        } else {
            $message = ['passchange' => 'incorrect pass'];
        }

        return redirect(route('profile'))->with($message);
    }
}

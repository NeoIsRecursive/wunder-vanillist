<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChangeEmailController extends Controller
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
            'current_email' => ['required'],
            'new_email' => ['required', 'different:email', 'string', 'email', 'max:255', 'unique:users,email']
        ]);

        $user = Auth::user();
        if ($user->email === trim($data['current_email'])) {
            $user->email = $data['new_email'];
            $user->save();
            $message = ['emailchange' => 'succesfully changed email'];
        } else {
            $message = ['emailchange' => 'email does not match'];
        }

        return redirect(route('profile'))->with($message);
    }
}

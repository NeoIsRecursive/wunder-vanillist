<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class DeleteUserController extends Controller
{
    public function __invoke(Request $request)
    {
        $avatar = Auth::user()->profile_image;
        $avatar = public_path(Storage::url($avatar));

        DB::transaction(function () {
            $tasks = Auth::user()->tasks()->delete();
            $todo = Auth::user()->todos()->delete();
            $user = Auth::user()->delete();
        });

        unlink($avatar);

        $request->session()->invalidate();

        return redirect('login');
    }
}

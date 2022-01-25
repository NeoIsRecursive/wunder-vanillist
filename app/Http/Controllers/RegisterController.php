<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\WelcomeEmailNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Storage;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $user = new User();
        $user->name = $data['name'];
        $user->password = Hash::make($data['password']);
        $user->email = $data['email'];
        $user->profile_image = $this->createAvatar($user->name);
        $user->save();
        $user->notify(new WelcomeEmailNotification());

        Auth::loginUsingId($user->id);


        return redirect(route('home'));
    }

    private function createAvatar($name)
    {
        $Width = 4;
        $Height = 4;

        $Image = imagecreate($Width, $Height);
        for ($Row = 1; $Row <= $Height; $Row++) {
            for ($Column = 1; $Column <= $Width; $Column++) {
                $Red = random_int(0, 255);
                $Green = random_int(0, 255);
                $Blue = random_int(0, 255);
                $Colour = imagecolorallocate($Image, $Red, $Green, $Blue);
                imagesetpixel($Image, $Column - 1, $Row - 1, $Colour);
            }
        }
        $tmp = 'avatars/' . $name . time() . '.png';
        imagepng($Image, base_path() . '/public/storage/' . $tmp);
        return $tmp;
    }
}

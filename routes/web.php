<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//pages
Route::get('/', function () {
    return view('welcome');
})->name('home');

//user
Route::get('/profile', function () {
    return view('user.profile');
})->middleware('auth.basic')->name('profile');

//auth
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/register', RegisterController::class)->name('register.store');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

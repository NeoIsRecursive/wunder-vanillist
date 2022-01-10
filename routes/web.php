<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\NewTodoController;
use App\Http\Controllers\task\getTaskController;
use App\Http\Controllers\task\NewTaskController;
use App\Http\Controllers\task\UpdateTaskController;
use App\Http\Controllers\task\CompleteTaskController;
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
    return view('components.user.profile');
})->middleware('auth')->name('profile');

//todos

//new todo
Route::post('/newTodo', NewTodoController::class)->middleware('auth')->name('todo.create');

Route::get('/newTodo', function () {
    return view('components.user.todos.new');
})->middleware('auth')->name('todo.new');

//new task
Route::post('newTask', NewTaskController::class)->middleware('auth')->name('task.create');

//json
Route::post('/taskapi', GetTaskController::class)->middleware('auth')->name('tasks.get');
Route::post('/taskComplete', CompleteTaskController::class)->middleware('auth')->name('tasks.complete');
Route::post('/taskChangeName', UpdateTaskController::class)->middleware('auth')->name('tasks.complete');
//list

Route::get('/todos', function () {
    return view('components.user.todos.all');
})->middleware('auth')->name('todo.list');

//auth
Route::post('/login', LoginController::class)->name('login.check');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/logout', LogoutController::class)->name('logout');

Route::post('/register', RegisterController::class)->name('register.store');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

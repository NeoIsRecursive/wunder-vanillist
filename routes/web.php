<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\NewTodoController;
use App\Http\Controllers\task\getTaskController;
use App\Http\Controllers\task\NewTaskController;
use App\Http\Controllers\task\UpdateTaskController;
use App\Http\Controllers\task\CompleteTaskController;
use App\Http\Controllers\todo\RemoveTodoController;

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
//welcome page
Route::get('/', function () {
    if (Auth::user()) {
        $todos = Auth::user()->todos()->where('due_at', '=', date('Y-m-d'))->get();
        return view('welcome')->with('todos', $todos);
    } else {
        return view('welcome');
    }
})->name('home');
//list todos
Route::get('/todos', function () {
    $todos = Auth::user()->todos()->get();
    return view('components.user.todos.all')->with('todos', $todos);
})->middleware('auth')->name('todo.list');
//user
Route::get('/profile', function () {
    return view('components.user.profile');
})->middleware('auth')->name('profile');

//new todo
Route::post('/newTodo', NewTodoController::class)->middleware('auth')->name('todo.create');
Route::get('/newTodo', function () {
    return view('components.user.todos.new');
})->middleware('auth')->name('todo.new');

//new task
Route::post('/newTask', NewTaskController::class)->middleware('auth')->name('task.create');
//todo
Route::post('/removeTodo', RemoveTodoController::class)->middleware('auth')->name('todo.remove');
//task json
Route::post('/taskapi', GetTaskController::class)->middleware('auth')->name('tasks.get');
Route::post('/taskComplete', CompleteTaskController::class)->middleware('auth')->name('tasks.complete');
Route::post('/taskChangeName', UpdateTaskController::class)->middleware('auth')->name('tasks.complete');

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

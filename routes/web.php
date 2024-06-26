<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/tasks', [TaskController::class, 'index'])->middleware('auth');

Auth::routes();

// namiki
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Yuri
//TaskController show-page
Route::get('/tasks/{id}', [TaskController::class, 'show'])->name('tasks.show');

// Yuri
//TaskController edit-page
Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');

Route::delete('/tasks/{id}/', [TaskController::class, 'destroy'])->name('tasks.delete');

// namiki
// Route::resource('tasks', TaskController::class)->only(['index', 'store', 'update', 'destroy'])->middleware('auth');
Route::middleware('auth')->group(function () {
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');

    Route::get('tasks/todo/{id}', [TodoController::class, 'show'])->name('tasks.todo.show');
    Route::post('tasks/todos', [TodoController::class, 'store'])->name('tasks.todos.store');
    Route::put('tasks/todos/{id}', [TodoController::class, 'update'])->name('tasks.todos.update');  
    Route::delete('tasks/todos/{id}', [TodoController::class, 'destroy'])->name('tasks.todos.destroy');

    Route::patch('tasks/todos/{id}', [TodoController::class, 'updateDescription'])->name('tasks.todos.updateDescription');  //詳細ページのコメントの部分横山
    Route::patch('tasks/todos_content/{id}', [TodoController::class, 'updateContent'])->name('tasks.todos.updateContent');  //詳細ページの部分横山
});


// profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');

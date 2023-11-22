<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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
    return redirect()->route('tasks.index');
});

Route::controller(TaskController::class)->group(function () {
    Route::get('tasks', 'index')->name('tasks.index');
    Route::get('tasks/create', 'create')->name('tasks.create');
    Route::post('tasks', 'store')->name('tasks.store');
    Route::get('tasks/{id}', 'show')->name('tasks.show');
});

// Route::get('/tasks', function () use ($tasks) {
//     return view('index', ['tasks' => $tasks]);
// })->name('tasks.index');

// Route::get('/tasks/{id}', function ($id) use ($tasks) {
//     $task = collect($tasks)->firstWhere('id', $id);
//     //return "Task $task->id";

//     if (!$task) {
//         abort(404, "Task $id not found");
//     }

//     return view('show', ['task' => $task]);
// })->name('tasks.show');

Route::fallback(function () {
    return view('index');
});

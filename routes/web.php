<?php

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

class Task
{
    public function __construct(
        public int $id,
        public string $title,
        public string $description,
        public ?string $long_description,
        public bool $completed,
        public string $created_at,
        public string $updated_at
    ) {
    }
}

$tasks = [
    new Task(1, 'Task 1', 'Description 1', 'Long description 1', false, '2021-01-01', '2021-01-01'),
    new Task(2, 'Task 2', 'Description 2', 'Long description 2', false, '2021-01-01', '2021-01-01'),
    new Task(3, 'Task 3', 'Description 3', 'Long description 3', false, '2021-01-01', '2021-01-01'),
    new Task(4, 'Task 4', 'Description 4', 'Long description 4', false, '2021-01-01', '2021-01-01'),
    new Task(5, 'Task 5', 'Description 5', 'Long description 5', false, '2021-01-01', '2021-01-01'),
    new Task(6, 'Task 6', 'Description 6', 'Long description 6', false, '2021-01-01', '2021-01-01'),
    new Task(7, 'Task 7', 'Description 7', 'Long description 7', false, '2021-01-01', '2021-01-01'),
    new Task(8, 'Task 8', 'Description 8', 'Long description 8', false, '2021-01-01', '2021-01-01'),
    new Task(9, 'Task 9', 'Description 9', 'Long description 9', false, '2021-01-01', '2021-01-01'),
    new Task(10, 'Task 10', 'Description 10', 'Long description 10', false, '2021-01-01', '2021-01-01'),
    new Task(11, 'Task 11', 'Description 11', 'Long description 11', false, '2021-01-01', '2021-01-01'),
    new Task(12, 'Task 12', 'Description 12', 'Long description 12', false, '2021-01-01', '2021-01-01'),
    new Task(13, 'Task 13', 'Description 13', 'Long description 13', false, '2021-01-01', '2021-01-01')
];

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () use ($tasks) {
    return view('index', ['tasks' => $tasks]);
})->name('tasks.index');

Route::get('/tasks/{id}', function ($id) use ($tasks) {
    $task = collect($tasks)->firstWhere('id', $id);
    //return "Task $task->id";

    if (!$task) {
        abort(404, "Task $id not found");
    }

    return view('show', ['task' => $task]);
})->name('tasks.show');

Route::fallback(function () {
    return view('index');
});

<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('id', 'desc')->paginate();
        return view('task.index', compact('tasks'));
    }

    public function show($id)
    {
        $task = Task::findOrFail($id);
        return view('task.show', ['task' => $task]);
    }
}

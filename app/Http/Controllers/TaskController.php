<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTask;
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

    public function create()
    {
        //return "Create a task";
        //dd('Create a task');
        return view('task.create');
    }

    public function store(StoreTask $request)
    {
        $task = Task::create($request->all());
        return redirect()->route('tasks.show', $task->id)->with('status', 'Task created successfully!');
    }
}

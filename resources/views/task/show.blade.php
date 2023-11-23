@extends('layouts.app')
@section('title', $task->title)

@section('content')
    <p>{{ $task->description }}</p>
    @if ($task->long_description)
        <p>{{ $task->long_description }}</p>
    @endif

    <p>Created at: {{ $task->created_at }}</p>
    <p>Updated at: {{ $task->updated_at }}</p>

    <p>Task {{ $task->completed ? 'Completed' : 'Not Completed' }}</p>

    <p><a href="{{ route('tasks.edit', $task->id) }}">Edit Task</a></p>
    <p><a href="{{ route('tasks.index') }}">Back to all tasks</a></p>
    <div>
        <form action="{{ route('tasks.toggle-completed', $task) }}" method="POST">
            @csrf
            @method('PATCH')
            <button type="submit">{{ $task->completed ? 'not Completed' : 'Completed' }}</button>
        </form>

        <form action="{{ route('tasks.destroy', $task) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete Task</button>
        </form>
    </div>
@endsection

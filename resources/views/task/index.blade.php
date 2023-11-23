@extends('layouts.app')

@section('title')
    <h1>Tasks</h1>
@endsection


@section('content')
    <p><a href="{{ route('tasks.create') }}">Create a new task</a></p>
    <div>
        @if (count($tasks) > 0)
            <ul>
                @foreach ($tasks as $task)
                    <li><a href="{{ route('tasks.show', $task) }}">{{ $task->title }}</a></li>
                @endforeach
            </ul>
        @else
            <p>No tasks found</p>
        @endif
    </div>
    {{ $tasks->links() }}
@endsection

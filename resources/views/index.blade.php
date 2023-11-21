@extends('layouts.app')

@section('title')
    <h1>Tasks</h1>
@endsection


@section('content')
    <div>
        @if (count($tasks) > 0)
            <ul>
                @foreach ($tasks as $task)
                    <li><a href="{{ route('tasks.show', $task->id) }}">{{ $task->title }}</a></li>
                @endforeach
            </ul>
        @else
            <p>No tasks found</p>
        @endif
    </div>
@endsection

@extends('layouts.app')

@section('title', 'Tasks')

@section('content')
    {{-- Create a task --}}
    <nav class="mb-4">
        <a href="{{ route('tasks.create') }}" class="font-medium text-gray-700 underline decoration-blue-500">Create a new
            task</a>
    </nav>
    <div>
        @if (count($tasks) > 0)
            <ul class="list-disc">
                @foreach ($tasks as $task)
                    <li @class(['text-black', 'text-blue-500' => $task->completed])>
                        <a href="{{ route('tasks.show', $task) }}" @class([
                            'text-m text-black',
                            'line-through font-bold text-blue-500' => $task->completed,
                        ])>{{ $task->title }}</a>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No tasks found</p>
        @endif
    </div>
    <nav class="mt-4">
        {{ $tasks->links() }}
    </nav>
@endsection

@extends('layouts.app')
@section('title', $task->title)

@section('content')
    <div class="flex flex-col justify-start gap-1 text-base">
        <p><span class="font-semibold">Description: </span>{{ $task->description }}</p>
        @if ($task->long_description)
            <p><span class="font-semibold">Long Description: </span>{{ $task->long_description }}</p>
        @endif

        <p><span class="font-semibold">Task Created at: </span>{{ $task->created_at->diffForHumans() }}</p>
        <p><span class="font-semibold">Task Updated at: </span>{{ $task->updated_at->diffForHumans() }}</p>

        <p><span class="font-semibold">This task is: </span><span
                @class(['text-red-500', 'text-green-500' => $task->completed])>{{ $task->completed ? 'Completed' : 'Not Completed' }}</span></p>
        <a href="{{ route('tasks.index') }}" class="mt-6 font-bold text-gray-700 hover:underline decoration-blue-500">
            Go back to the tasks list
        </a>
    </div>


    <div class="flex gap-4 mt-4 font-bold text-gray-700">
        <a href="{{ route('tasks.edit', $task->id) }}" class="btn">
            Edit Task
        </a>

        <form action="{{ route('tasks.toggle-completed', $task) }}" method="POST">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn">{{ $task->completed ? 'not Completed' : 'Completed' }}</button>
        </form>

        <form action="{{ route('tasks.destroy', $task) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn">Delete Task</button>
        </form>
    </div>
@endsection

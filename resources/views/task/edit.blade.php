@extends('layouts.app')
@section('title', 'Update Task: ' . $task->title)
@section('styles')

@endsection
@section('content')
    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="title">Title:</label>
            <br>
            <input type="text" name="title" id="title" @class(['border-red-500', $errors->has('title')])
                value="{{ old('title', $task->title) }}">
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="description">Description:</label>
            <br>
            <textarea name="description" id="description" @class(['border-red-500', $errors->has('description')]) rows="5">{{ old('description', $task->description) }}</textarea>
            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="long_description">Long Description:</label>
            <br>
            <textarea name="long_description" id="long_description" @class(['border-red-500', $errors->has('long_description')]) rows="10">{{ old('long_description', $task->long_description) }}</textarea>
            @error('long_description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex gap-2">
            <button type="submit" class="btn mt-4 bg-gray-500/50">Edit Task</button>
            <a href="{{ route('tasks.index') }}" class="btn mt-4 bg-gray-500/50">Go back to the tasks list</a>
        </div>
    </form>

@endsection

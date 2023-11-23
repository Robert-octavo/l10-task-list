@extends('layouts.app')
@section('title', 'Update Task: ' . $task->title)
@section('styles')
    <style>
        .error {
            color: red;
            font-size: .8rem;
        }
    </style>
@endsection
@section('content')
    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title:</label>
            <br>
            <input type="text" name="title" id="title" value="{{ old('title', $task->title) }}">
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="description">Description:</label>
            <br>
            <textarea name="description" id="description" rows="5">{{ old('description', $task->description) }}</textarea>
            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="long_description">Long Description:</label>
            <br>
            <textarea name="long_description" id="long_description" rows="10">{{ old('long_description', $task->long_description) }}</textarea>
            @error('long_description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <button type="submit">Edit Task</button>
        </div>
    </form>

@endsection

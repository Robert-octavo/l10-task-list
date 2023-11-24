@extends('layouts.app')
@section('title', 'Create a New Task')
@section('styles')

@endsection
@section('content')
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="title">Title:</label>
            <br>
            <input type="text" name="title" id="title" value="{{ old('title') }}" @class(['border-red-500', $errors->has('title')])>
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="description">Description:</label>
            <br>
            <textarea name="description" id="description" @class(['border-red-500', $errors->has('description')]) rows="5">{{ old('description') }}</textarea>
            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="long_description">Long Description:</label>
            <br>
            <textarea name="long_description" id="long_description" @class(['border-red-500', $errors->has('long_description')]) rows="10">{{ old('long_description') }}</textarea>
            @error('long_description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex gap-2">
            <button type="submit" class="btn mt-4 bg-gray-500/50">Create Task</button>
            <a href="{{ route('tasks.index') }}" class="btn mt-4 bg-gray-500/50">Go back to the tasks list</a>
        </div>
    </form>

@endsection

@extends('layouts.app')

@section('title', isset($task) ? 'Edit task' : 'Add task')

@section('content')
    <form action="{{ isset($task) ? route('tasks.update', ['task' => $task]) : route('tasks.store') }}"
          method="POST">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div class="form__group">
            <label for="title">Title</label>
            <input @class(['border-red-300' => $errors->has('title')]) type="text" name="title" id="title"
                   value="{{ $task->title ?? old('title') }}">
            @error('title')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="form__group">
            <label for="description">Description</label>
            <textarea @class(['border-red-300' => $errors->has('description')]) name="description" id="description"
                      rows="5">{{ $task->description ?? old('description') }}</textarea>
            @error('description')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="form__group">
            <label for="long_description">Long Description</label>
            <textarea @class(['border-red-300' => $errors->has('long_description')]) name="long_description"
                      id="long_description"
                      rows="10">{{ $task->long_description ?? old('long_description') }}</textarea>
            @error('long_description')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex gap-4 w-full justify-between">
            @if(!isset($task))
                <a href="{{ route('tasks.index') }}" class="btn">Cancel</a>
            @endif
            <button type="submit"
                    class="btn btn--dark">
                {{ isset($task) ? 'Save' : 'Add task' }}
            </button>
        </div>
    </form>
@endsection

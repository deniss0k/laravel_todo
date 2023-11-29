@extends('layouts.app')

@section('title', 'Add task')

@section('styles')
    <style>
        .error {
            color: red;
            font-size: .8rem;
        }
    </style>
@endsection

@section('content')
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title">
            @error('title')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="descr">Description</label>
            <textarea name="descr" id="descr" rows="5"></textarea>
            @error('descr')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="long_descr">Long Description</label>
            <textarea name="long_descr" id="long_descr" rows="10"></textarea>
            @error('long_descr')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <button type="submit">Add Task</button>
        </div>
    </form>
@endsection

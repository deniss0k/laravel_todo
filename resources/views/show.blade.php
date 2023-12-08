@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <nav class="mb-4">
        <a href="{{ route('tasks.index') }}">
            ← Go back
        </a>
    </nav>

    @if($task->completed)
        <p class="text-green-700 font-bold">Completed</p>
    @else
        <p class="text-slate-400 font-bold">Not completed</p>
    @endif

    <p class="mb-4">{{ $task->description }}</p>

    @if( $task->long_description )
        <p class="mb-4">{{ $task->long_description }}</p>
    @endif

    <p class="text-sm text-slate-400 mb-4">
        Created {{ $task->created_at->diffForHumans() }}
        •
        Updated {{ $task->updated_at->diffForHumans() }}
    </p>

    <div class="flex gap-4 w-full justify-between">
        <a href="{{ route('tasks.edit', ['task' => $task->id]) }}"
           class="btn">Edit
            task</a>
        <form action="{{ route('tasks.toggle-complete', ['task' => $task]) }}" method="POST">
            @csrf
            @method('PUT')
            <button type="submit"
                    class="btn">
                Mark as {{ $task->completed ? 'not completed' : 'completed' }}
            </button>
        </form>
        <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="btn btn--red">
                Delete
            </button>
        </form>
    </div>
@endsection

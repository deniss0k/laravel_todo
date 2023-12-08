@extends('layouts.app')

@section('title', 'Task list')

@section('content')
    <nav class="mb-4">
        <a href="{{ route('tasks.create') }}"
           class="btn mt-4">
            Add task
        </a>
    </nav>
    @forelse ($tasks as $task)
        <div class="flex gap-2">
            <form action="{{ route('tasks.toggle-complete', ['task' => $task]) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit"
                    @class(['w-6 h-6 rounded-xl', 'bg-green-600' => $task->completed, 'bg-slate-200' => !$task->completed])>
                </button>
            </form>
            <div>
                <a @class(['line-through' => $task->completed])
                   href="{{ route('tasks.show', ['task' => $task->id]) }}">{{ $task->title }}</a>
            </div>
        </div>
    @empty
        <div>There are no tasks!</div>
    @endforelse

    @if($tasks->count())
        {{ $tasks->links() }}
    @endif
@endsection

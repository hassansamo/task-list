@extends('layouts.app')

@section('title', $task->title)

@section('content')
  <div class="mb-6">
    <a href="{{ route('tasks.index') }}" class="link inline-flex items-center">
      <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
      </svg>
      Back to Tasks
    </a>
  </div>

  <div class="task-card p-8">
    <div class="flex items-start justify-between mb-6">
      <div class="flex-1">
        <h2 class="text-2xl font-bold text-gray-900 @if($task->completed) line-through text-gray-500 @endif">
          {{ $task->title }}
        </h2>
      </div>
      <div class="ml-4">
        @if ($task->completed)
          <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-green-100 text-green-800">
            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
            </svg>
            Completed
          </span>
        @else
          <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-orange-100 text-orange-800">
            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
            </svg>
            Pending
          </span>
        @endif
      </div>
    </div>

    @if($task->description)
      <div class="mb-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-3">Description</h3>
        <div class="bg-gray-50 rounded-lg p-4">
          <p class="text-gray-700 leading-relaxed">{{ $task->description }}</p>
        </div>
      </div>
    @endif

    @if ($task->long_description)
      <div class="mb-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-3">Details</h3>
        <div class="bg-gray-50 rounded-lg p-4">
          <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $task->long_description }}</p>
        </div>
      </div>
    @endif

    <div class="flex items-center text-sm text-gray-500 mb-8 space-x-6">
      <div class="flex items-center">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        Created {{ $task->created_at->diffForHumans() }}
      </div>
      <div class="flex items-center">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
        </svg>
        Updated {{ $task->updated_at->diffForHumans() }}
      </div>
    </div>

    <div class="flex flex-wrap gap-3">
      <a href="{{ route('tasks.edit', ['task' => $task]) }}" class="btn btn-secondary inline-flex items-center">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
        </svg>
        Edit Task
      </a>

      <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task]) }}" class="inline">
        @csrf
        @method('PUT')
        <button type="submit" class="btn {{ $task->completed ? 'btn-secondary' : 'btn-success' }} inline-flex items-center">
          @if($task->completed)
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path>
            </svg>
            Mark as Pending
          @else
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            Mark as Complete
          @endif
        </button>
      </form>

      <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this task?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger inline-flex items-center">
          <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
          </svg>
          Delete Task
        </button>
      </form>
    </div>
  </div>
@endsection

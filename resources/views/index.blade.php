@extends('layouts.app')

@section('title', '✨ My Tasks')

@section('content')
  <div class="mb-8">
    <a href="{{ route('tasks.create') }}" class="btn btn-primary inline-flex items-center">
      <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
      </svg>
      Add New Task
    </a>
  </div>

  <div class="space-y-4">
    @forelse ($tasks as $task)
      <div class="task-card p-6 @if($task->completed) opacity-75 @endif">
        <div class="flex items-start justify-between">
          <div class="flex-1">
            <a href="{{ route('tasks.show', ['task' => $task->id]) }}" 
               class="block group">
              <h3 class="text-lg font-semibold text-gray-900 group-hover:text-blue-600 transition-colors duration-200 @if($task->completed) line-through text-gray-500 @endif">
                {{ $task->title }}
              </h3>
              @if($task->description)
                <p class="text-gray-600 mt-2 line-clamp-2">{{ Str::limit($task->description, 120) }}</p>
              @endif
            </a>
            <div class="flex items-center mt-3 text-sm text-gray-500">
              <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
              Created {{ $task->created_at->diffForHumans() }}
            </div>
          </div>
          <div class="ml-4 flex items-center">
            @if ($task->completed)
              <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                Completed
              </span>
            @else
              <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-orange-100 text-orange-800">
                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                </svg>
                Pending
              </span>
            @endif
          </div>
        </div>
      </div>
    @empty
      <div class="text-center py-12">
        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
        </svg>
        <h3 class="mt-2 text-lg font-medium text-gray-900">No tasks yet</h3>
        <p class="mt-1 text-gray-500">Get started by creating your first task!</p>
        <div class="mt-6">
          <a href="{{ route('tasks.create') }}" class="btn btn-primary inline-flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Add Your First Task
          </a>
        </div>
      </div>
    @endforelse
  </div>

  @if ($tasks->count())
    <div class="mt-8 flex justify-center">
      {{ $tasks->links() }}
    </div>
  @endif
@endsection

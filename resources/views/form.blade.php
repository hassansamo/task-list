@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Create New Task')

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
    <form method="POST"
      action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}">
      @csrf
      @isset($task)
        @method('PUT')
      @endisset
      
      <div class="mb-6">
        <label for="title" class="flex items-center">
          <svg class="w-4 h-4 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
          </svg>
          Task Title
        </label>
        <input type="text" name="title" id="title"
          @class(['border-red-500 ring-red-500' => $errors->has('title')])
          value="{{ $task->title ?? old('title') }}" 
          placeholder="Enter a descriptive title for your task..." />
        @error('title')
          <p class="error">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="description" class="flex items-center">
          <svg class="w-4 h-4 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
          </svg>
          Description
        </label>
        <textarea name="description" id="description"
          @class(['border-red-500 ring-red-500' => $errors->has('description')])
          rows="4" 
          placeholder="Provide a brief description of what needs to be done...">{{ $task->description ?? old('description') }}</textarea>
        @error('description')
          <p class="error">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-8">
        <label for="long_description" class="flex items-center">
          <svg class="w-4 h-4 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
          </svg>
          Additional Details
        </label>
        <textarea name="long_description" id="long_description"
          @class(['border-red-500 ring-red-500' => $errors->has('long_description')])
          rows="8" 
          placeholder="Add any additional details, requirements, or notes...">{{ $task->long_description ?? old('long_description') }}</textarea>
        @error('long_description')
          <p class="error">{{ $message }}</p>
        @enderror
      </div>

      <div class="flex flex-wrap gap-3">
        <button type="submit" class="btn btn-primary inline-flex items-center">
          @isset($task)
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
            </svg>
            Update Task
          @else
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Create Task
          @endisset
        </button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary inline-flex items-center">
          <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
          Cancel
        </a>
      </div>
    </form>
  </div>
@endsection

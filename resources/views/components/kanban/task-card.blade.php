{{--
    Task Card Component
    Individual task card with all details
    Usage: <x-kanban.task-card :task="$task" />
--}}

@props([
    'task' => []
])

@php
    // Extract task data with defaults
    $title = $task['title'] ?? 'Untitled Task';
    $progress = $task['progress'] ?? 0;
    $completed = $task['completed'] ?? 0;
    $total = $task['total'] ?? 1;
    $dueDate = $task['dueDate'] ?? null;
    $avatar = $task['avatar'] ?? null;
    $priority = $task['priority'] ?? 'medium';

    // Priority colors
    $priorityColors = [
        'low' => 'bg-green-500',
        'medium' => 'bg-yellow-500',
        'high' => 'bg-red-600',
    ];

    $progressBarColor = $priorityColors[$priority] ?? $priorityColors['medium'];

    // Format progress text
    $progressText = $completed . '/' . $total . ' • ' . $progress . '% completed';

    // Format due date
    $dueDateFormatted = $dueDate ? \Carbon\Carbon::parse($dueDate)->format('M j') : null;
@endphp

{{-- Task Card Container --}}
<div class="bg-white rounded-xl border border-gray-200 p-4 shadow-sm hover:shadow-md transition-all duration-200 cursor-pointer group"
     data-task-card="true"
     data-title="{{ $title }}"
     data-description="{{ $task['description'] ?? '' }}"
     data-status="{{ $task['status'] ?? 'todo' }}"
     data-priority="{{ $priority }}"
     data-due-date="{{ $task['dueDate'] ?? $dueDate ?? '' }}">

    {{-- Task Header --}}
    <div class="flex items-start justify-between mb-3">

        {{-- Title with Priority --}}
        <div class="flex-1">
            <div class="flex items-center mb-2">
                <div class="w-2 h-2 {{ $progressBarColor }} rounded-full mr-2"></div>
                <h4 class="font-bold text-gray-900 text-sm leading-tight group-hover:text-red-600 transition-colors">
                    {{ $title }}
                </h4>
            </div>
        </div>

        {{-- Options Menu --}}
        <button class="opacity-0 group-hover:opacity-100 transition-opacity p-1 hover:bg-gray-100 rounded">
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
            </svg>
        </button>

    </div>

    {{-- Progress Section --}}
    <div class="mb-3">
        <p class="text-xs text-gray-600 mb-2">{{ $progressText }}</p>
        <div class="w-full bg-gray-100 rounded-full h-1.5 overflow-hidden">
            <div class="{{ $progressBarColor }} h-full rounded-full transition-all duration-300" style="width: {{ $progress }}%"></div>
        </div>
    </div>

    {{-- Meta Information --}}
    <div class="flex items-center justify-between">

        {{-- Due Date --}}
        @if($dueDate)
            <div class="flex items-center text-xs text-gray-500">
                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                {{ $dueDateFormatted }}
            </div>
        @else
            <div class="text-xs text-gray-400">No due date</div>
        @endif

        {{-- Avatar --}}
        @if($avatar)
            <div class="w-6 h-6 bg-gray-300 rounded-full flex items-center justify-center">
                <span class="text-xs text-gray-600">{{ substr($avatar, 0, 1) }}</span>
            </div>
        @else
            <div class="w-6 h-6 bg-gray-200 rounded-full flex items-center justify-center">
                <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
            </div>
        @endif

    </div>

</div>

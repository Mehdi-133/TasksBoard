{{--
    Task Card Component
    Individual task card with all details
    Usage: <x-kanban.task-card :task="$task" />
--}}

@props([
    'task' => []
])

@php
    /*
    |--------------------------------------------------------------------------
    | Extract task data (array + object safe)
    |--------------------------------------------------------------------------
    */
    $taskId      = data_get($task, 'id');
    $title       = data_get($task, 'title', 'Untitled Task');
    $description = data_get($task, 'description', '');
    $status      = data_get($task, 'status', 'todo');
    $progress    = data_get($task, 'progress', 0);
    $completed   = data_get($task, 'completed', 0);
    $total       = data_get($task, 'total', 1);
    $priority    = data_get($task, 'priority', 'medium');
    $avatar      = data_get($task, 'avatar');

    $dueDate = data_get($task, 'due_date')
            ?? data_get($task, 'dueDate')
            ?? data_get($task, 'deadline');

    /*
    |--------------------------------------------------------------------------
    | UI helpers
    |--------------------------------------------------------------------------
    */
    $priorityColors = [
        'low'    => 'bg-green-500',
        'medium' => 'bg-yellow-500',
        'high'   => 'bg-red-600',
    ];

    $progressBarColor = $priorityColors[$priority] ?? $priorityColors['medium'];

    $progressText = "{$completed}/{$total} • {$progress}% completed";

    $dueDateFormatted = $dueDate
        ? \Carbon\Carbon::parse($dueDate)->format('M j')
        : null;
@endphp

{{-- Task Card --}}
<div
    @click="$dispatch('open-update-modal', @js([
        'id' => $taskId,
        'title' => $title,
        'description' => $description,
        'status' => $status,
        'due_date' => $dueDate,
        'priority' => $priority,
    ]))"
    class="bg-white rounded-xl border border-gray-200 p-4 shadow-sm hover:shadow-md transition-all duration-200 cursor-pointer group"
>

    {{-- Header --}}
    <div class="flex items-start justify-between mb-3">

        {{-- Title --}}
        <div class="flex-1">
            <div class="flex items-center mb-2">
                <div class="w-2 h-2 {{ $progressBarColor }} rounded-full mr-2"></div>
                <h4 class="font-bold text-gray-900 text-sm leading-tight group-hover:text-red-600 transition-colors">
                    {{ $title }}
                </h4>
            </div>
        </div>

        {{-- Delete Button --}}
        <button
            @click.stop="$dispatch('open-delete-modal', @js([
                'id' => $taskId,
                'title' => $title,
                'description' => $description,
                'status' => $status,
                'priority' => $priority,
            ]))"
            class="opacity-0 group-hover:opacity-100 transition-opacity p-1.5 hover:bg-red-50 rounded-lg"
            title="Delete task"
        >
            <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862
                         a2 2 0 01-1.995-1.858L5 7
                         m5 4v6m4-6v6
                         m1-10V4a1 1 0 00-1-1h-4
                         a1 1 0 00-1 1v3M4 7h16" />
            </svg>
        </button>

    </div>

    {{-- Progress --}}
    <div class="mb-3">
        <p class="text-xs text-gray-600 mb-2">{{ $progressText }}</p>
        <div class="w-full bg-gray-100 rounded-full h-1.5 overflow-hidden">
            <div class="{{ $progressBarColor }} h-full rounded-full transition-all duration-300"
                 style="width: {{ $progress }}%">
            </div>
        </div>
    </div>

    {{-- Footer --}}
    <div class="flex items-center justify-between">

        {{-- Due Date --}}
        @if ($dueDate)
            <div class="flex items-center text-xs text-gray-500">
                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M8 7V3m8 4V3m-9 8h10
                             M5 21h14a2 2 0 002-2V7
                             a2 2 0 00-2-2H5
                             a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                {{ $dueDateFormatted }}
            </div>
        @else
            <div class="text-xs text-gray-400">No due date</div>
        @endif

        {{-- Avatar --}}
        @if ($avatar)
            <div class="w-6 h-6 bg-gray-300 rounded-full flex items-center justify-center">
                <span class="text-xs text-gray-700 font-semibold">
                    {{ strtoupper(substr($avatar, 0, 1)) }}
                </span>
            </div>
        @else
            <div class="w-6 h-6 bg-gray-200 rounded-full flex items-center justify-center">
                <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M16 7a4 4 0 11-8 0
                             4 4 0 018 0z
                             M12 14a7 7 0 00-7 7h14
                             a7 7 0 00-7-7z"/>
                </svg>
            </div>
        @endif

    </div>

</div>

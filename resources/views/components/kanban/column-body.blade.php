{{--
    Column Body Component
    Displays the list of task cards with scrolling
    Usage: <x-kanban.column-body :tasks="$tasks" />
--}}

@props([
    'tasks' => [],
    'status' => 'blue'
])

@php
    // Status Color Mapping - inline instead of include
    $statusColors = [
        'blue' => [
            'dot' => 'bg-blue-500',
            'header' => 'bg-blue-100',
            'text' => 'text-blue-700',
            'border' => 'border-blue-200'
        ],
        'yellow' => [
            'dot' => 'bg-yellow-500',
            'header' => 'bg-yellow-100',
            'text' => 'text-yellow-700',
            'border' => 'border-yellow-200'
        ],
        'green' => [
            'dot' => 'bg-green-500',
            'header' => 'bg-green-100',
            'text' => 'text-green-700',
            'border' => 'border-green-200'
        ],
        'red' => [
            'dot' => 'bg-red-500',
            'header' => 'bg-red-100',
            'text' => 'text-red-700',
            'border' => 'border-red-200'
        ],
        'purple' => [
            'dot' => 'bg-purple-500',
            'header' => 'bg-purple-100',
            'text' => 'text-purple-700',
            'border' => 'border-purple-200'
        ]
    ];
    
    $colors = $statusColors[$status] ?? $statusColors['blue'];
@endphp

<div class="bg-white rounded-b-xl border-x border-b border-{{ $colors['border'] }} min-h-[400px] max-h-[600px] overflow-y-auto">
    
    @if(empty($tasks))
        {{-- Empty State --}}
        <div class="p-8 text-center">
            <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3">
                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
            </div>
            <p class="text-sm text-gray-500">No tasks yet</p>
            <p class="text-xs text-gray-400 mt-1">Drag tasks here or create new ones</p>
        </div>
    @else
        {{-- Task List --}}
        <div class="p-3 space-y-3">
            @foreach($tasks as $task)
                <x-kanban.task-card :task="$task" />
            @endforeach
        </div>
    @endif
    
</div>

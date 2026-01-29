{{--
    Column Header Component
    Displays column title, status dot, and task count
    Usage: <x-kanban.column-header title="Todo" status="blue" :task-count="5" />
--}}

@props([
    'title' => 'Column',
    'status' => 'blue',
    'taskCount' => 0
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

<div class="{{ $colors['header'] }} rounded-t-xl border border-{{ $colors['border'] }} px-4 py-3">
    <div class="flex items-center justify-between">
        
        {{-- Left Side - Title and Status --}}
        <div class="flex items-center space-x-3">
            
            {{-- Status Dot --}}
            <div class="flex items-center">
                <div class="w-2 h-2 {{ $colors['dot'] }} rounded-full"></div>
            </div>
            
            {{-- Column Title --}}
            <h3 class="font-semibold {{ $colors['text'] }}">
                {{ $title }}
            </h3>
            
        </div>
        
        {{-- Right Side - Task Count --}}
        <div>
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-white border border-gray-200 text-gray-600">
                {{ $taskCount }}
            </span>
        </div>
        
    </div>
</div>

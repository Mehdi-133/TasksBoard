{{--
    Kanban Column Component
    Complete column with header, body, and footer
    Usage: <x-kanban.column title="Todo" status="blue" :tasks="$tasks" />
--}}

@props([
    'title' => 'Column',
    'status' => 'blue',
    'tasks' => [],
    'showAddButton' => true,
    'width' => 'w-80'
])

<div class="flex-shrink-0 {{ $width }}">

    {{-- Column Header --}}
    <x-kanban.column-header
        :title="$title"
        :status="$status"
        :task-count="count($tasks)"
    />

    {{-- Column Body --}}
    <x-kanban.column-body
        :tasks="$tasks"
        :status="$status"
    />

    {{-- Column Footer --}}
    @if($showAddButton)
        <x-kanban.column-footer />
    @endif

</div>

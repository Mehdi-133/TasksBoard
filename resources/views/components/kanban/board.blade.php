{{--
    Kanban Board Component
    Main board container with navigation and columns
    Usage: <x-kanban.board title="Project Dashboard">
              <x-kanban.column title="Todo" status="blue" :tasks="$todoTasks" />
          </x-kanban.board>
--}}

@props([
    'title' => 'Task Board',
    'showHeader' => true,
    'currentPage' => null
])

<div class="min-h-screen bg-gray-50">
    
    {{-- Navigation Header --}}
    @if($showHeader)
        <x-kanban.navigation :currentPage="$currentPage" />
    @endif
    
    {{-- Board Content --}}
    <div class="p-6">
        <div class="flex gap-6 overflow-x-auto pb-6 kanban-scroll">
            {{ $slot }}
        </div>
    </div>
    
</div>

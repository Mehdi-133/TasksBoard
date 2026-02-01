{{--
    Kanban Navigation Component
    Clean navigation header with logo, menu, and user actions
    Usage: <x-kanban.navigation />
--}}

@props([
    'currentPage' => null
])

<div class="bg-white border-b border-gray-200 shadow-sm sticky top-0 z-50">
    <div class="px-6 py-4">
        <div class="flex items-center justify-between">

            {{-- Left Side - Logo --}}
            <div class="flex items-center">
                <x-kanban.brand-logo />
            </div>

            {{-- Center - Navigation Links --}}
            <div class="flex-1 flex items-center justify-center">
                <nav class="hidden md:flex items-center space-x-8">
                    <x-kanban.nav-link href="/board" icon="board" :active="$currentPage === 'board'">Board</x-kanban.nav-link>
                    <x-kanban.nav-link href="/statistics" icon="analytics" :active="$currentPage === 'statistics'">Statistics</x-kanban.nav-link>
                </nav>
            </div>

            {{-- Right Side - Actions and User --}}
            <div class="flex items-center space-x-4">
                <x-kanban.search-bar />
                <x-kanban.action-buttons />
                <x-kanban.user-menu />
            </div>

        </div>
    </div>
</div>
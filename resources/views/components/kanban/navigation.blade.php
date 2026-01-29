{{--
    Kanban Navigation Component
    Clean navigation header with logo, menu, and user actions
    Usage: <x-kanban.navigation />
--}}

<div class="bg-white border-b border-gray-200 shadow-sm sticky top-0 z-50">
    <div class="px-6 py-4">
        <div class="flex items-center justify-between">

            {{-- Left Side - Logo and Navigation --}}
            <div class="flex items-center space-x-8">

                {{-- Logo/Brand --}}
                <x-kanban.brand-logo />

                {{-- Navigation Links --}}
                <nav class="hidden md:flex items-center space-x-6">
                    <x-kanban.nav-link href="/board" icon="board">Board</x-kanban.nav-link>
                    <x-kanban.nav-link href="/statistics" icon="analytics">Statistics</x-kanban.nav-link>
                    <x-kanban.nav-link href="/settings" icon="settings">Settings</x-kanban.nav-link>

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

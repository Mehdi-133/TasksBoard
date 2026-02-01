{{--
    Action Buttons Component
    Notification and New Task buttons
    Usage: <x-kanban.action-buttons />
--}}

<div class="flex items-center space-x-2">

    {{-- Notifications Button --}}
    <button class="p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-colors" title="Notifications">
    </button>

    {{-- New Task Button --}}
    <button
        @click="openModal('create')"
        class="flex items-center space-x-2 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors duration-200"
    >
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        <span>New Task</span>
    </button>

</div>

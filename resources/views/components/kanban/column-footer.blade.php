{{--
    Column Footer Component
    Displays the "Add Task" button
    Usage: <x-kanban.column-footer />
--}}

<div class="bg-white rounded-b-xl border-x border-b border-gray-200 p-3">
    <button class="w-full p-3 text-sm font-medium text-gray-600 bg-gray-50 border-2 border-dashed border-gray-300 rounded-lg hover:bg-gray-100 hover:border-gray-400 hover:text-gray-700 transition-all duration-200 flex items-center justify-center group">
        
        {{-- Plus Icon --}}
        <svg class="w-4 h-4 mr-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        
        {{-- Button Text --}}
        <span>Add Task</span>
        
    </button>
</div>

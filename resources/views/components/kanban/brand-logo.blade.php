{{--
    Brand Logo Component
    Displays the TaskBoard logo and branding
    Usage: <x-kanban.brand-logo />
--}}

<a href="/board" class="flex items-center space-x-3 hover:opacity-80 transition-opacity">
    
    {{-- Logo Icon --}}
    <div class="w-8 h-8 bg-red-600 rounded-lg flex items-center justify-center">
        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
        </svg>
    </div>
    
    {{-- Brand Text --}}
    <div>
        <h1 class="text-2xl font-bold text-gray-900">kanbanX</h1>
        <div class="w-12 h-1 bg-red-500 rounded-full"></div>
    </div>
    
</a>

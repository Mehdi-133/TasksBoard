{{-- 
    Chart Card Component
    Displays chart containers with title and subtitle
    
    @props string $title
    @props string $subtitle
    @props string $chartType (line, pie, bar)
    @slot $content (chart content)
--}}
<div class="bg-white shadow-sm rounded-lg border border-gray-200 overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
    {{-- Header --}}
    <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-medium text-gray-900 hover:text-blue-600 transition-colors duration-200">{{ $title }}</h3>
                <p class="text-sm text-gray-500 hover:text-gray-700 transition-colors duration-200">{{ $subtitle }}</p>
            </div>
            
            {{-- Chart Type Indicator --}}
            <div class="flex items-center space-x-2">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 hover:bg-gray-200 transition-colors duration-200">
                    {{ strtoupper($chartType) }}
                </span>
                
                {{-- Options Menu (UI Only) --}}
                <button class="p-1 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded transition-all duration-200">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    
    {{-- Chart Content --}}
    <div class="p-6">
        {{ $slot }}
    </div>
</div>

{{-- 
    KPI Card Component
    Displays key performance indicators with icon, value, and trend
    
    @props string $iconColor (blue, green, yellow, red)
    @props string $iconPath (SVG path data)
    @props string $label
    @props string $value
    @props string $trend
    @props bool $trendPositive
--}}
<div class="bg-white shadow-sm rounded-lg border border-gray-200 p-6 hover:shadow-md transition-shadow duration-200">
    <div class="flex items-center">
        <div class="flex-shrink-0">
            {{-- Icon Circle --}}
            <div class="w-8 h-8 rounded-full flex items-center justify-center
                @if($iconColor === 'blue') bg-blue-100 @endif
                @if($iconColor === 'green') bg-green-100 @endif
                @if($iconColor === 'yellow') bg-yellow-100 @endif
                @if($iconColor === 'red') bg-red-100 @endif
            ">
                <svg class="w-4 h-4
                    @if($iconColor === 'blue') text-blue-600 @endif
                    @if($iconColor === 'green') text-green-600 @endif
                    @if($iconColor === 'yellow') text-yellow-600 @endif
                    @if($iconColor === 'red') text-red-600 @endif
                " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $iconPath }}" />
                </svg>
            </div>
        </div>
        
        <div class="ml-4 flex-1">
            {{-- Label --}}
            <p class="text-sm font-medium text-gray-600">{{ $label }}</p>
            
            {{-- Value --}}
            <div class="flex items-baseline">
                <p class="text-2xl font-semibold text-gray-900">{{ $value }}</p>
            </div>
            
            {{-- Trend --}}
            <div class="mt-1 flex items-center">
                <svg class="w-4 h-4
                    @if($trendPositive) text-green-500 @else text-red-500 @endif
                " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    @if($trendPositive)
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    @else
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6" />
                    @endif
                </svg>
                <span class="ml-1 text-xs font-medium
                    @if($trendPositive) text-green-600 @else text-red-600 @endif
                ">
                    {{ $trend }}
                </span>
            </div>
        </div>
    </div>
</div>

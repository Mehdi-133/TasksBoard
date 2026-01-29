{{-- 
    Progress Card Component
    Displays overall progress overview with multiple metrics
    
    @props int $totalTasks
    @props int $completedTasks
    @props int $completionRate
--}}
<div class="bg-white shadow-sm rounded-lg border border-gray-200 overflow-hidden hover:shadow-lg transition-all duration-300">
    {{-- Header --}}
    <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
        <h3 class="text-lg font-medium text-gray-900">Progress Overview</h3>
        <p class="text-sm text-gray-500">Your task completion metrics</p>
    </div>
    
    {{-- Content --}}
    <div class="p-6 space-y-6">
        
        {{-- Overall Progress --}}
        <div>
            <div class="flex items-center justify-between mb-2">
                <span class="text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors duration-200">Overall Progress</span>
                <span class="text-sm text-gray-500 font-semibold hover:text-blue-600 transition-colors duration-200">{{ $completionRate }}%</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2 overflow-hidden">
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-2 rounded-full transition-all duration-1000 ease-out hover:from-blue-600 hover:to-blue-700" style="width: {{ $completionRate }}%"></div>
            </div>
        </div>

        {{-- Individual Metrics --}}
        <div class="space-y-4">
            {{-- Tasks Completed --}}
            <div>
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-gray-700 hover:text-green-600 transition-colors duration-200">Tasks Completed</span>
                    <span class="text-sm text-gray-500 font-semibold hover:text-green-600 transition-colors duration-200">{{ $completedTasks }}/{{ $totalTasks }}</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2 overflow-hidden">
                    <div class="bg-gradient-to-r from-green-500 to-green-600 h-2 rounded-full transition-all duration-1000 ease-out hover:from-green-600 hover:to-green-700" style="width: {{ $totalTasks > 0 ? ($completedTasks / $totalTasks * 100) : 0 }}%"></div>
                </div>
            </div>

            {{-- Productivity Score --}}
            <div>
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-gray-700 hover:text-yellow-600 transition-colors duration-200">Productivity Score</span>
                    <span class="text-sm text-gray-500 font-semibold hover:text-yellow-600 transition-colors duration-200">{{ min(100, $completionRate + 10) }}%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2 overflow-hidden">
                    <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 h-2 rounded-full transition-all duration-1000 ease-out hover:from-yellow-600 hover:to-yellow-700" style="width: {{ min(100, $completionRate + 10) }}%"></div>
                </div>
            </div>

            {{-- Efficiency Rate --}}
            <div>
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-gray-700 hover:text-purple-600 transition-colors duration-200">Efficiency Rate</span>
                    <span class="text-sm text-gray-500 font-semibold hover:text-purple-600 transition-colors duration-200">{{ $totalTasks > 0 ? min(100, round(($completedTasks / $totalTasks) * 120)) : 0 }}%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2 overflow-hidden">
                    <div class="bg-gradient-to-r from-purple-500 to-purple-600 h-2 rounded-full transition-all duration-1000 ease-out hover:from-purple-600 hover:to-purple-700" style="width: {{ $totalTasks > 0 ? min(100, round(($completedTasks / $totalTasks) * 120)) : 0 }}%"></div>
                </div>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="grid grid-cols-3 gap-4 pt-4 border-t border-gray-200">
            <div class="text-center p-3 rounded-lg hover:bg-gray-50 transition-colors duration-200 cursor-pointer group">
                <p class="text-2xl font-bold text-gray-900 group-hover:text-blue-600 transition-colors duration-200">{{ $totalTasks > 0 ? round($completedTasks / max(1, $totalTasks) * 5, 1) : 0 }}</p>
                <p class="text-xs text-gray-500 group-hover:text-gray-700 transition-colors duration-200">Avg. Tasks/Day</p>
            </div>
            <div class="text-center p-3 rounded-lg hover:bg-gray-50 transition-colors duration-200 cursor-pointer group">
                <p class="text-2xl font-bold text-gray-900 group-hover:text-green-600 transition-colors duration-200">{{ $completionRate }}%</p>
                <p class="text-xs text-gray-500 group-hover:text-gray-700 transition-colors duration-200">Completion Rate</p>
            </div>
            <div class="text-center p-3 rounded-lg hover:bg-gray-50 transition-colors duration-200 cursor-pointer group">
                <p class="text-2xl font-bold text-gray-900 group-hover:text-purple-600 transition-colors duration-200">{{ $totalTasks - $completedTasks }}</p>
                <p class="text-xs text-gray-500 group-hover:text-gray-700 transition-colors duration-200">Remaining</p>
            </div>
        </div>
    </div>
</div>

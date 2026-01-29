{{-- 
    Progress Card Component
    Displays overall progress overview with multiple metrics
--}}
<div class="bg-white shadow-sm rounded-lg border border-gray-200 overflow-hidden">
    {{-- Header --}}
    <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
        <h3 class="text-lg font-medium text-gray-900">Progress Overview</h3>
        <p class="text-sm text-gray-500">Weekly productivity metrics</p>
    </div>
    
    {{-- Content --}}
    <div class="p-6 space-y-6">
        
        {{-- Overall Progress --}}
        <div>
            <div class="flex items-center justify-between mb-2">
                <span class="text-sm font-medium text-gray-700">Overall Progress</span>
                <span class="text-sm text-gray-500">75%</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2">
                <div class="bg-blue-600 h-2 rounded-full" style="width: 75%"></div>
            </div>
        </div>

        {{-- Individual Metrics --}}
        <div class="space-y-4">
            {{-- Tasks Completed --}}
            <div>
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-gray-700">Tasks Completed</span>
                    <span class="text-sm text-gray-500">18/24</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-green-600 h-2 rounded-full" style="width: 75%"></div>
                </div>
            </div>

            {{-- Time Management --}}
            <div>
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-gray-700">Time Management</span>
                    <span class="text-sm text-gray-500">82%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-yellow-600 h-2 rounded-full" style="width: 82%"></div>
                </div>
            </div>

            {{-- Quality Score --}}
            <div>
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-gray-700">Quality Score</span>
                    <span class="text-sm text-gray-500">91%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-purple-600 h-2 rounded-full" style="width: 91%"></div>
                </div>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="grid grid-cols-3 gap-4 pt-4 border-t border-gray-200">
            <div class="text-center">
                <p class="text-2xl font-bold text-gray-900">4.8</p>
                <p class="text-xs text-gray-500">Avg. Tasks/Day</p>
            </div>
            <div class="text-center">
                <p class="text-2xl font-bold text-gray-900">92%</p>
                <p class="text-xs text-gray-500">On-Time Rate</p>
            </div>
            <div class="text-center">
                <p class="text-2xl font-bold text-gray-900">6h</p>
                <p class="text-xs text-gray-500">Avg. Time/Task</p>
            </div>
        </div>
    </div>
</div>

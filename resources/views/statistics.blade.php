@extends('layouts.kanban')

@section('content')
{{-- 
    Statistics & Analytics Dashboard
    Modern SaaS style with soft colors and clean spacing
    Component-based architecture
--}}
<div class="min-h-screen bg-gray-50">
    
    {{-- Navigation Header --}}
    <x-kanban.navigation currentPage="statistics" />
    
    {{-- Main Content --}}
    <div class="flex justify-center">
        <div class="w-full max-w-7xl px-4 sm:px-6 lg:px-8 py-8">
    
    {{-- Header Section --}}
    <div class="mb-8">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 hover:text-blue-600 transition-colors duration-200">Statistics</h1>
                <p class="mt-1 text-sm text-gray-500 hover:text-gray-700 transition-colors duration-200">Overview of your productivity</p>
            </div>
            
            {{-- Date Range Dropdown (UI Only) --}}
            <div class="mt-4 sm:mt-0">
                <select class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-lg border bg-white hover:border-blue-400 transition-colors duration-200">
                    <option>Last 7 days</option>
                    <option>Last 30 days</option>
                    <option>Last 3 months</option>
                    <option>This year</option>
                </select>
            </div>
        </div>
    </div>

    {{-- KPI Cards Row --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        
        {{-- Total Tasks Card --}}
        <x-statistics.kpi-card 
            iconColor="blue"
            iconPath="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"
            label="Total Tasks"
            value="{{ $totalTasks }}"
            trend="Your total tasks"
            trendPositive=true
        />

        {{-- Completed Card --}}
        <x-statistics.kpi-card 
            iconColor="green"
            iconPath="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
            label="Completed"
            value="{{ $completedTasks }}"
            trend="{{ $completionRate }}% completion rate"
            trendPositive=true
        />

        {{-- In Progress Card --}}
        <x-statistics.kpi-card 
            iconColor="yellow"
            iconPath="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
            label="In Progress"
            value="{{ $inProgressTasks }}"
            trend="Tasks being worked on"
            trendPositive=false
        />

        {{-- Overdue Card --}}
        <x-statistics.kpi-card 
            iconColor="red"
            iconPath="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
            label="Overdue"
            value="{{ $overdueTasks }}"
            trend="Need attention"
            trendPositive=false
        />
    </div>

    {{-- Charts Section --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        
        {{-- Line Chart (Large) --}}
        <div class="lg:col-span-2">
            <x-statistics.chart-card 
                title="Tasks Over Time"
                subtitle="Daily task completion trend"
                chartType="line"
            >
                <div class="h-64 flex items-center justify-center bg-gray-50 rounded-lg">
                    <div class="text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        <p class="mt-2 text-sm text-gray-500">Task Completion Trend</p>
                        <p class="text-xs text-gray-400">{{ $completedTasks }} of {{ $totalTasks }} tasks completed</p>
                    </div>
                </div>
            </x-statistics.chart-card>
        </div>

        {{-- Pie Chart --}}
        <div class="lg:col-span-1">
            <x-statistics.chart-card 
                title="Task Distribution"
                subtitle="Tasks by status"
                chartType="pie"
            >
                <div class="h-48 flex items-center justify-center bg-gray-50 rounded-lg">
                    <div class="text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                        </svg>
                        <p class="mt-2 text-sm text-gray-500">Status Distribution</p>
                        <p class="text-xs text-gray-400">Todo: {{ $todoTasks }} | In Progress: {{ $inProgressTasks }} | Done: {{ $completedTasks }}</p>
                    </div>
                </div>
            </x-statistics.chart-card>
        </div>
    </div>

    {{-- Bottom Charts Row --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        
        {{-- Bar Chart --}}
        <x-statistics.chart-card 
            title="Completion by Day"
            subtitle="Tasks completed each day this week"
            chartType="bar"
        >
            <div class="h-48 flex items-center justify-center bg-gray-50 rounded-lg">
                <div class="text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <p class="mt-2 text-sm text-gray-500">Weekly Progress</p>
                    <p class="text-xs text-gray-400">{{ $completionRate }}% completion rate • {{ $overdueTasks }} overdue</p>
                </div>
            </div>
        </x-statistics.chart-card>

        {{-- Progress Overview --}}
        <x-statistics.progress-card 
            :totalTasks="$totalTasks"
            :completedTasks="$completedTasks"
            :completionRate="$completionRate"
        />
    </div>

    {{-- Recent Activity Table --}}
    <div class="bg-white shadow-sm rounded-lg border border-gray-200 overflow-hidden hover:shadow-lg transition-all duration-300">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900 hover:text-blue-600 transition-colors duration-200">Recent Activity</h3>
            <p class="text-sm text-gray-500 hover:text-gray-700 transition-colors duration-200">Latest task updates</p>
        </div>
        <div class="overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hover:text-gray-700 transition-colors duration-200">Task</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hover:text-gray-700 transition-colors duration-200">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hover:text-gray-700 transition-colors duration-200">Updated</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hover:text-gray-700 transition-colors duration-200">Priority</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($tasks->take(5) as $task)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900 hover:text-blue-600 transition-colors duration-200">{{ $task->title }}</div>
                            <div class="text-sm text-gray-500 hover:text-gray-700 transition-colors duration-200">{{ Str::limit($task->description ?? '', 50) }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full transition-all duration-200 hover:scale-105
                                @if($task->status == 'done') bg-green-100 text-green-800 hover:bg-green-200
                                @elseif($task->status == 'in_progress') bg-yellow-100 text-yellow-800 hover:bg-yellow-200
                                @else bg-blue-100 text-blue-800 hover:bg-blue-200
                                @endif">
                                {{ ucfirst($task->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 hover:text-gray-700 transition-colors duration-200">
                            {{ $task->updated_at->diffForHumans() }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full transition-all duration-200 hover:scale-105
                                @if($task->priority == 'high') bg-red-100 text-red-800 hover:bg-red-200
                                @elseif($task->priority == 'medium') bg-gray-100 text-gray-800 hover:bg-gray-200
                                @else bg-green-100 text-green-800 hover:bg-green-200
                                @endif">
                                {{ ucfirst($task->priority) }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500 hover:text-gray-700 transition-colors duration-200">
                            No tasks found. Start by creating your first task!
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    </div>
    
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add click animations to KPI cards
    const kpiCards = document.querySelectorAll('.bg-white.shadow-sm.rounded-lg');
    kpiCards.forEach(card => {
        card.addEventListener('click', function() {
            this.style.transform = 'scale(0.98)';
            setTimeout(() => {
                this.style.transform = '';
            }, 150);
        });
    });

    // Animate progress bars on page load
    const progressBars = document.querySelectorAll('.bg-gradient-to-r');
    progressBars.forEach((bar, index) => {
        const width = bar.style.width;
        bar.style.width = '0%';
        setTimeout(() => {
            bar.style.width = width;
        }, 100 * (index + 1));
    });

    // Add hover sound effect simulation (visual feedback)
    const interactiveElements = document.querySelectorAll('button, .cursor-pointer, .hover\\:bg-gray-50 tr');
    interactiveElements.forEach(element => {
        element.addEventListener('mouseenter', function() {
            this.style.transition = 'all 0.2s ease';
        });
    });

    // Smooth scroll for any internal links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });
});
</script>

@endsection

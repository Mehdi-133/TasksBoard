{{--
    Kanban Board Component
    Main board container with navigation and columns
    Usage: <x-kanban.board title="Project Dashboard">
              <x-kanban.column title="Todo" status="blue" :tasks="$todoTasks" />
          </x-kanban.board>
--}}

@props([
    'title' => 'Task Board',
    'showHeader' => true,
    'currentPage' => null
])

<div class="min-h-screen bg-gray-50" x-data="{ createTaskModalOpen: {{ $errors->any() ? 'true' : 'false' }} }">

    {{-- Navigation Header --}}
    @if($showHeader)
        <x-kanban.navigation :currentPage="$currentPage" />
    @endif

    {{-- Board Content --}}
    <div class="p-6">
        <div class="flex gap-6 overflow-x-auto pb-6 kanban-scroll">
            {{ $slot }}
        </div>
    </div>

    {{-- Create Task Modal --}}
    <div x-show="createTaskModalOpen"
         x-cloak
         class="fixed inset-0 z-50 overflow-y-auto"
         x-cloak>

        {{-- Background Overlay --}}
        <div class="fixed inset-0 bg-black bg-opacity-50" @click="createTaskModalOpen = false"></div>

        {{-- Modal Container --}}
        <div class="flex min-h-full items-center justify-center p-4">
            <div x-show="createTaskModalOpen"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform scale-95"
                 x-transition:enter-end="opacity-100 transform scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 transform scale-100"
                 x-transition:leave-end="opacity-0 transform scale-95"
                 class="relative w-full max-w-lg transform rounded-2xl bg-white p-6 shadow-xl">

                {{-- Modal Header --}}
                <div class="flex items-start justify-between mb-6">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900">Create New Task</h3>
                        <p class="text-sm text-gray-500 mt-1">Add details for your task</p>
                    </div>

                    {{-- Close Button --}}
                    <button @click="createTaskModalOpen = false" class="text-gray-400 hover:text-gray-600 transition-colors duration-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                {{-- Modal Body --}}
                <form class="space-y-5" action="{{ route('tasks.store') }}" method="POST" novalidate>
                    @csrf

                    {{-- Task Title --}}
                    <div>
                        <label for="task-title" class="block text-sm font-medium text-gray-700 mb-2">
                            Task Title <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="text"
                            id="task-title"
                            name="title"
                            value="{{ old('title') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-colors duration-200 {{ $errors->has('title') ? 'border-red-500 focus:ring-red-500' : '' }}"
                            placeholder="Enter task title..."
                        >
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div>
                        <label for="task-description" class="block text-sm font-medium text-gray-700 mb-2">
                            Description
                        </label>
                        <textarea
                            id="task-description"
                            name="description"
                            rows="3"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-colors duration-200 resize-none {{ $errors->has('description') ? 'border-red-500 focus:ring-red-500' : '' }}"
                            placeholder="Add task description..."
                        >{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">
                            {{ Str::length(old('description')) }}/1000 characters
                        </p>
                    </div>

                    {{-- Status and Due Date Row --}}
                    <div class="grid grid-cols-2 gap-4">

                        {{-- Status --}}
                        <div>
                            <label for="task-status" class="block text-sm font-medium text-gray-700 mb-2">
                                Status <span class="text-red-500">*</span>
                            </label>
                            <select
                                id="task-status"
                                name="status"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-colors duration-200 {{ $errors->has('status') ? 'border-red-500 focus:ring-red-500' : '' }}"
                            >
                                <option value="todo" {{ old('status', 'todo') === 'todo' ? 'selected' : '' }}>Todo</option>
                                <option value="in_progress" {{ old('status') === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="done" {{ old('status') === 'done' ? 'selected' : '' }}>Done</option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Due Date --}}
                        <div>
                            <label for="task-due-date" class="block text-sm font-medium text-gray-700 mb-2">
                                Due Date
                            </label>
                            <input
                                type="date"
                                id="task-due-date"
                                name="due_date"
                                value="{{ old('due_date') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-colors duration-200 {{ $errors->has('due_date') ? 'border-red-500 focus:ring-red-500' : '' }}"
                            >
                            @error('due_date')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Priority and Assignee Row --}}
                    <div class="grid grid-cols-2 gap-4">

                        {{-- Priority --}}
                        <div>
                            <label for="task-priority" class="block text-sm font-medium text-gray-700 mb-2">
                                Priority <span class="text-red-500">*</span>
                            </label>
                            <select
                                id="task-priority"
                                name="priority"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-colors duration-200 {{ $errors->has('priority') ? 'border-red-500 focus:ring-red-500' : '' }}"
                            >
                                <option value="low" {{ old('priority', 'medium') === 'low' ? 'selected' : '' }}>Low</option>
                                <option value="medium" {{ old('priority') === 'medium' ? 'selected' : '' }}>Medium</option>
                                <option value="high" {{ old('priority') === 'high' ? 'selected' : '' }}>High</option>
                            </select>
                            @error('priority')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>


                    {{-- Action Buttons --}}
                    <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">

                        {{-- Cancel Button --}}
                        <button
                            type="button"
                            @click="createTaskModalOpen = false"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors duration-200"
                        >
                            Cancel
                        </button>

                        {{-- Create Task Button --}}
                        <button
                            type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-colors duration-200"
                        >
                            Create Task
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    {{-- Task Details Modal --}}
    <x-kanban.task-details-modal />

</div>

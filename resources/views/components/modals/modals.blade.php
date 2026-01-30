{{--
    Task Modals Component
    Contains update and delete modals for task management
    Uses parent Alpine data from board component
--}}


    <div x-show="updateTaskModalOpen"
         x-cloak
         class="fixed inset-0 z-50 overflow-y-auto">

        <div class="fixed inset-0 bg-black bg-opacity-50" @click="updateTaskModalOpen = false"></div>

        <div class="flex min-h-full items-center justify-center p-4">
            <div x-show="updateTaskModalOpen"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform scale-95"
                 x-transition:enter-end="opacity-100 transform scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 transform scale-100"
                 x-transition:leave-end="opacity-0 transform scale-95"
                 class="relative w-full max-w-lg transform rounded-2xl bg-white p-6 shadow-xl">

                <div class="flex items-start justify-between mb-6">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900">Update Task</h3>
                        <p class="text-sm text-gray-500 mt-1">Edit your task details</p>
                    </div>

                    <button @click="updateTaskModalOpen = false" class="text-gray-400 hover:text-gray-600 transition-colors duration-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <form class="space-y-5"
                      :action="selectedTask ? `/tasks/${selectedTask.id}` : '#'"
                      method="POST">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="update-task-title" class="block text-sm font-medium text-gray-700 mb-2">
                            Task Title <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="text"
                            id="update-task-title"
                            name="title"
                            :value="selectedTask ? selectedTask.title : ''"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                            placeholder="Enter task title..."
                            required
                        >
                    </div>

                    <div>
                        <label for="update-task-description" class="block text-sm font-medium text-gray-700 mb-2">
                            Description
                        </label>
                        <textarea
                            id="update-task-description"
                            name="description"
                            rows="3"
                            x-model="selectedTask ? selectedTask.description : ''"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 resize-none"
                            placeholder="Add task description..."
                            maxlength="1000"
                        ></textarea>
                        <p class="mt-1 text-xs text-gray-500">
                            <span x-text="selectedTask && selectedTask.description ? selectedTask.description.length : 0"></span>/1000 characters
                        </p>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="update-task-status" class="block text-sm font-medium text-gray-700 mb-2">
                                Status <span class="text-red-500">*</span>
                            </label>
                            <select
                                id="update-task-status"
                                name="status"
                                x-model="selectedTask ? selectedTask.status : 'todo'"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                                required
                            >
                                <option value="todo">Todo</option>
                                <option value="in_progress">In Progress</option>
                                <option value="done">Done</option>
                            </select>
                        </div>

                        <div>
                            <label for="update-task-due-date" class="block text-sm font-medium text-gray-700 mb-2">
                                Due Date
                            </label>
                            <input
                                type="date"
                                id="update-task-due-date"
                                name="due_date"
                                :value="selectedTask ? selectedTask.due_date : ''"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                            >
                        </div>
                    </div>

                    <div>
                        <label for="update-task-priority" class="block text-sm font-medium text-gray-700 mb-2">
                            Priority <span class="text-red-500">*</span>
                        </label>
                        <select
                            id="update-task-priority"
                            name="priority"
                            x-model="selectedTask ? selectedTask.priority : 'medium'"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                            required
                        >
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                        </select>
                    </div>

                    <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
                        <button
                            type="button"
                            @click="updateTaskModalOpen = false"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors duration-200"
                        >
                            Cancel
                        </button>

                        <button
                            type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200"
                        >
                            Update Task
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    {{-- Delete Task Modal --}}
    <div x-show="deleteTaskModalOpen"
         x-cloak
         class="fixed inset-0 z-50 overflow-y-auto">

        <div class="fixed inset-0 bg-black bg-opacity-50" @click="deleteTaskModalOpen = false"></div>

        <div class="flex min-h-full items-center justify-center p-4">
            <div x-show="deleteTaskModalOpen"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform scale-95"
                 x-transition:enter-end="opacity-100 transform scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 transform scale-100"
                 x-transition:leave-end="opacity-0 transform scale-95"
                 class="relative w-full max-w-md transform rounded-2xl bg-white p-6 shadow-xl">

                <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 rounded-full mb-4">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>

                <div class="text-center mb-6">
                    <h3 class="text-xl font-semibold text-gray-900">Delete Task</h3>
                    <p class="text-sm text-gray-500 mt-2">Are you sure you want to delete this task?</p>
                </div>

                <div class="bg-gray-50 rounded-lg p-4 mb-6" x-show="selectedTask">
                    <div class="space-y-2">
                        <div>
                            <p class="text-xs font-medium text-gray-500 uppercase">Task Title</p>
                            <p class="text-sm font-semibold text-gray-900 mt-1" x-text="selectedTask ? selectedTask.title : ''"></p>
                        </div>
                        <div x-show="selectedTask && selectedTask.description">
                            <p class="text-xs font-medium text-gray-500 uppercase">Description</p>
                            <p class="text-sm text-gray-700 mt-1 line-clamp-2" x-text="selectedTask ? selectedTask.description : ''"></p>
                        </div>
                        <div class="flex items-center space-x-4 pt-2">
                            <div class="flex items-center space-x-1">
                                <span class="text-xs font-medium text-gray-500">Status:</span>
                                <span class="text-xs font-semibold px-2 py-1 rounded-full"
                                      :class="{
                                          'bg-blue-100 text-blue-800': selectedTask && selectedTask.status === 'todo',
                                          'bg-yellow-100 text-yellow-800': selectedTask && selectedTask.status === 'in_progress',
                                          'bg-green-100 text-green-800': selectedTask && selectedTask.status === 'done'
                                      }"
                                      x-text="selectedTask ? selectedTask.status.replace('_', ' ').replace(/\b\w/g, l => l.toUpperCase()) : ''">
                                </span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <span class="text-xs font-medium text-gray-500">Priority:</span>
                                <span class="text-xs font-semibold px-2 py-1 rounded-full"
                                      :class="{
                                          'bg-gray-100 text-gray-800': selectedTask && selectedTask.priority === 'low',
                                          'bg-orange-100 text-orange-800': selectedTask && selectedTask.priority === 'medium',
                                          'bg-red-100 text-red-800': selectedTask && selectedTask.priority === 'high'
                                      }"
                                      x-text="selectedTask ? selectedTask.priority.charAt(0).toUpperCase() + selectedTask.priority.slice(1) : ''">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-red-800">
                                This action cannot be undone. The task will be permanently deleted from your board.
                            </p>
                        </div>
                    </div>
                </div>

                <form :action="selectedTask ? `/tasks/${selectedTask.id}` : '#'" method="POST">
                    @csrf
                    @method('DELETE')

                    <div class="flex justify-end space-x-3">
                        <button
                            type="button"
                            @click="deleteTaskModalOpen = false"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors duration-200"
                        >
                            Cancel
                        </button>

                        <button
                            type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-colors duration-200"
                        >
                            Delete Task
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

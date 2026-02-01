            {{-- UPDATE MODAL --}}
            <div x-show="modalType === 'update'">
                {{-- Header --}}
                <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-gray-900">Edit task</h2>
                            <p class="text-sm text-gray-500">Update task details</p>
                        </div>
                    </div>
                    <button @click="closeModal()" class="p-2 hover:bg-gray-100 rounded-lg transition-colors">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                
                {{-- Content --}}
                <div x-show="selectedTask && selectedTask.id">
                    <form :action="'/tasks/' + selectedTask.id" method="POST" class="flex flex-col h-full">
                        @csrf
                        @method('PUT')
                        <div class="px-6 py-4 space-y-4 flex-1 overflow-y-auto">
                            {{-- Title Field --}}
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-gray-700">Title *</label>
                                <input type="text" name="title" :value="selectedTask.title"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" 
                                       required>
                            </div>
                            
                            {{-- Description Field --}}
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-gray-700">Description *</label>
                                <textarea name="description" rows="3" x-model="selectedTask.description"
                                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors resize-none"
                                          required></textarea>
                            </div>
                            
                            {{-- Status & Priority Row --}}
                            <div class="grid grid-cols-2 gap-4">
                                <div class="space-y-2">
                                    <label class="text-sm font-medium text-gray-700">Status *</label>
                                    <select name="status" x-model="selectedTask.status" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                                        <option value="todo">To Do</option>
                                        <option value="in_progress">In Progress</option>
                                        <option value="done">Done</option>
                                    </select>
                                </div>
                                <div class="space-y-2">
                                    <label class="text-sm font-medium text-gray-700">Priority *</label>
                                    <select name="priority" x-model="selectedTask.priority" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                                        <option value="low">Low</option>
                                        <option value="medium">Medium</option>
                                        <option value="high">High</option>
                                    </select>
                                </div>
                            </div>
                            
                            {{-- Due Date --}}
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-gray-700">Due date *</label>
                                <input type="date" name="due_date" :value="selectedTask.due_date"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                       required>
                            </div>
                        </div>
                        
                        {{-- Actions --}}
                        <div class="flex justify-end space-x-3 px-6 py-4 bg-gray-50 border-t border-gray-200">
                            <button type="button" @click="closeModal()" 
                                    class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-gray-900 transition-colors">
                                Cancel
                            </button>
                            <button type="submit" 
                                    class="px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-md transition-colors">
                                Save changes
                            </button>
                        </div>
                    </form>
                </div>
                <div x-show="!selectedTask || !selectedTask.id" class="px-6 py-4">
                    <p class="text-red-600">Error: Task data not found</p>
                </div>
            </div>

            {{-- DELETE MODAL --}}
            <div x-show="modalType === 'delete'">
                {{-- Header --}}
                <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-gray-900">Delete task</h2>
                            <p class="text-sm text-gray-500">This action cannot be undone</p>
                        </div>
                    </div>
                    <button @click="closeModal()" class="p-2 hover:bg-gray-100 rounded-lg transition-colors">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                
                {{-- Content --}}
                <div x-show="selectedTask && selectedTask.id">
                    <div class="px-6 py-4">
                        {{-- Warning Message --}}
                        <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-4">
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-red-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                </svg>
                                <div>
                                    <h3 class="text-sm font-medium text-red-800">You're about to delete:</h3>
                                    <p class="text-sm text-red-700 font-medium mt-1" x-text="selectedTask.title"></p>
                                    <p class="text-sm text-red-600 mt-1" x-show="selectedTask.description" x-text="selectedTask.description"></p>
                                </div>
                            </div>
                        </div>
                        
                        <p class="text-sm text-gray-600">This task will be permanently removed from your project. All associated data will be lost.</p>
                    </div>
                    
                    {{-- Actions --}}
                    <div class="flex justify-end space-x-3 px-6 py-4 bg-gray-50 border-t border-gray-200">
                        <button type="button" @click="closeModal()" 
                                class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-gray-900 transition-colors">
                            Cancel
                        </button>
                        <form :action="'/tasks/' + selectedTask.id" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="px-4 py-2 text-sm font-medium text-white bg-red-600 hover:bg-red-700 rounded-md transition-colors">
                                Delete task
                            </button>
                        </form>
                    </div>
                </div>
                <div x-show="!selectedTask || !selectedTask.id" class="px-6 py-4">
                    <p class="text-red-600">Error: Task data not found</p>
                </div>
            </div>
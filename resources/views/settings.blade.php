@extends('layouts.kanban')

@section('content')
<div class="min-h-screen bg-gray-50">
    <x-kanban.navigation />
    
    <div class="max-w-4xl mx-auto p-6">
        {{-- Page Header --}}
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Settings</h1>
            <p class="text-gray-600 mt-2">Manage your account settings and preferences</p>
        </div>
        
        {{-- Settings Card --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
            <div class="p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-6">Account Settings</h2>
                
                <div class="space-y-6">
                    {{-- Profile Information --}}
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Profile Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                                <input type="text" value="{{ auth()->user()->name ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent" readonly>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                <input type="email" value="{{ auth()->user()->email ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent" readonly>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Preferences --}}
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Preferences</h3>
                        <div class="space-y-3">
                            <label class="flex items-center">
                                <input type="checkbox" class="w-4 h-4 text-red-600 border-gray-300 rounded focus:ring-red-500">
                                <span class="ml-2 text-sm text-gray-700">Enable email notifications</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="w-4 h-4 text-red-600 border-gray-300 rounded focus:ring-red-500">
                                <span class="ml-2 text-sm text-gray-700">Show task completion animations</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="w-4 h-4 text-red-600 border-gray-300 rounded focus:ring-red-500" checked>
                                <span class="ml-2 text-sm text-gray-700">Compact view for Kanban board</span>
                            </label>
                        </div>
                    </div>
                    
                    {{-- Theme --}}
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Appearance</h3>
                        <div class="grid grid-cols-3 gap-3">
                            <button class="p-3 border-2 border-red-500 rounded-lg bg-red-50">
                                <div class="w-6 h-6 bg-red-500 rounded-full mx-auto mb-2"></div>
                                <span class="text-sm font-medium">Red Theme</span>
                            </button>
                            <button class="p-3 border border-gray-300 rounded-lg hover:border-gray-400">
                                <div class="w-6 h-6 bg-blue-500 rounded-full mx-auto mb-2"></div>
                                <span class="text-sm font-medium">Blue Theme</span>
                            </button>
                            <button class="p-3 border border-gray-300 rounded-lg hover:border-gray-400">
                                <div class="w-6 h-6 bg-gray-800 rounded-full mx-auto mb-2"></div>
                                <span class="text-sm font-medium">Dark Theme</span>
                            </button>
                        </div>
                    </div>
                    
                    {{-- Save Button --}}
                    <div class="pt-4">
                        <button class="px-6 py-2 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 transition-colors">
                            Save Changes
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

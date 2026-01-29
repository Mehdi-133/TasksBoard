{{--
    User Menu Component
    Simplified user avatar and dropdown menu with Profile and Logout only
    Usage: <x-kanban.user-menu />
--}}

@php
    $user = auth()->user();
    $userInitials = $user ? substr($user->name, 0, 2) : 'GU';
    $userName = $user ? $user->name : 'Guest User';
    $userEmail = $user ? $user->email : 'guest@example.com';
@endphp

<div class="relative" x-data="{ open: false }">
    <button @click="open = !open" class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-100 transition-colors">
        
        {{-- User Avatar --}}
        <div class="w-8 h-8 bg-gradient-to-br from-red-500 to-red-600 rounded-full flex items-center justify-center text-white text-sm font-medium">
            {{ strtoupper($userInitials) }}
        </div>
        
        {{-- User Info (Desktop) --}}
        <div class="hidden md:block text-left">
            <p class="text-sm font-medium text-gray-900">{{ $userName }}</p>
            <p class="text-xs text-gray-500">{{ $userEmail }}</p>
        </div>
        
        {{-- Dropdown Arrow --}}
        <svg class="w-4 h-4 text-gray-400 transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
        
    </button>
    
    {{-- Dropdown Menu --}}
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-100"
         x-transition:enter-start="transform opacity-0 scale-95"
         x-transition:enter-end="transform opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="transform opacity-100 scale-100"
         x-transition:leave-end="transform opacity-0 scale-95"
         @click.away="open = false"
         class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 py-1 z-50">
        
        {{-- User Info Header --}}
        <div class="px-4 py-3 border-b border-gray-200">
            <p class="text-sm font-medium text-gray-900">{{ $userName }}</p>
            <p class="text-xs text-gray-500">{{ $userEmail }}</p>
        </div>
        
        {{-- Menu Items --}}
        @if($user)
            {{-- Profile Link --}}
            <a href="/profile" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                Profile
            </a>
            
            {{-- Divider --}}
            <div class="border-t border-gray-200 my-1"></div>
            
            {{-- Logout Link --}}
            <form method="POST" action="/logout">
                @csrf
                <button type="submit" class="flex items-center w-full px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors">
                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    logout
                </button>
            </form>
        @else
            {{-- Login Link --}}
            <a href="/login" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                </svg>
                Login
            </a>
        @endif
        
    </div>
</div>

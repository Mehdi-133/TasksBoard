{{--
    Navigation Link Component
    Individual navigation link with icon
    Usage: <x-kanban.nav-link href="#" active="true" icon="board">Board</x-kanban.nav-link>
--}}

@props([
    'href' => '#',
    'active' => false,
    'icon' => null,
    'text' => null
])

@php
    $isActive = $active === true || $active === 'true';
    
    // Determine active color based on the href
    $activeColor = 'text-red-600 border-b-2 border-red-600'; // default red
    if (str_contains($href, 'statistics')) {
        $activeColor = 'text-red-600 border-b-2 border-red-600'; // red for statistics
    } elseif (str_contains($href, 'board')) {
        $activeColor = 'text-blue-600 border-b-2 border-blue-600'; // blue for board
    } elseif (str_contains($href, 'settings')) {
        $activeColor = 'text-gray-600 border-b-2 border-gray-600'; // gray for settings
    }

    $icons = [
        'board' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>',
        'analytics' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>',
        
    ];

    $iconPath = $icons[$icon] ?? $icons['board'];
    $linkText = $text ?? $slot ?? 'Board';

@endphp

<a href="{{ $href }}" class="flex items-center text-sm font-semibold {{ $isActive ? $activeColor : 'text-gray-700 hover:text-gray-900' }} uppercase tracking-wide pb-1 transition-colors">

    {{-- Icon --}}
    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        {!! $iconPath !!}
    </svg>

    {{-- Text --}}
    <span>{{ $linkText }}</span>

</a>

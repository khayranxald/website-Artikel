@props([
    'title' => '',
    'value' => '0',
    'subtitle' => '',
    'icon' => null,
    'color' => 'blue',
])

@php
$colors = [
    'blue' => 'from-blue-500 to-blue-600',
    'green' => 'from-green-500 to-green-600',
    'red' => 'from-red-500 to-pink-600',
    'yellow' => 'from-yellow-500 to-orange-600',
    'purple' => 'from-purple-500 to-purple-600',
];
@endphp

<div {{ $attributes->merge(['class' => 'glass glass-dark rounded-xl p-4 sm:p-6 hover-lift']) }}>
    <div class="flex items-center justify-between">
        <div class="flex-1 min-w-0">
            <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-400 mb-1 truncate">{{ $title }}</p>
            <p class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-white truncate">{{ $value }}</p>
            @if($subtitle)
                <p class="text-xs text-gray-500 dark:text-gray-500 mt-1 truncate">{{ $subtitle }}</p>
            @endif
        </div>
        @if($icon)
            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-gradient-to-br {{ $colors[$color] ?? $colors['blue'] }} rounded-xl flex items-center justify-center flex-shrink-0 ml-3 sm:ml-4">
                {!! $icon !!}
            </div>
        @endif
    </div>
</div>
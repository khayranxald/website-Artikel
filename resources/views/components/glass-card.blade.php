@props(['title' => null])

<div {{ $attributes->merge(['class' => 'glass glass-dark rounded-2xl p-6 hover:shadow-2xl transition-all duration-300']) }}>
    @if($title)
        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">{{ $title }}</h3>
    @endif
    
    {{ $slot }}
</div>
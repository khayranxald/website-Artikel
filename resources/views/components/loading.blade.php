@props(['text' => 'Loading...'])

<div {{ $attributes->merge(['class' => 'flex flex-col items-center justify-center py-12']) }}>
    <div class="relative">
        <div class="w-16 h-16 border-4 border-blue-200 dark:border-blue-900 rounded-full"></div>
        <div class="w-16 h-16 border-4 border-blue-600 dark:border-blue-400 rounded-full border-t-transparent animate-spin absolute top-0 left-0"></div>
    </div>
    @if($text)
        <p class="mt-4 text-gray-600 dark:text-gray-400 animate-pulse">{{ $text }}</p>
    @endif
</div>
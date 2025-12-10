@props([
    'shadow' => 'md',
])

@php
    $baseClasses = 'inline-flex items-center gap-2 rounded-full border-2 border-neutral-900 bg-white px-4 py-2 dark:border-white dark:bg-neutral-900';

    $shadowClasses = match ($shadow) {
        'sm' => 'shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] dark:shadow-[2px_2px_0px_0px_rgba(255,255,255,1)]',
        'md' => 'shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] dark:shadow-[4px_4px_0px_0px_rgba(255,255,255,1)]',
        'none' => '',
        default => 'shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] dark:shadow-[4px_4px_0px_0px_rgba(255,255,255,1)]',
    };

    $classes = "{$baseClasses} {$shadowClasses}";
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>

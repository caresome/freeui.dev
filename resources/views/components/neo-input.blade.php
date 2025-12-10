@props([
    'type' => 'text',
    'shadow' => 'md',
])

@php
    $baseClasses = 'w-full rounded-xl border-2 border-neutral-900 bg-white px-4 py-3 text-neutral-900 placeholder-neutral-500 transition-all focus:ring-2 focus:ring-neutral-900 focus:ring-offset-2 focus:outline-none dark:border-white dark:bg-neutral-900 dark:text-white dark:placeholder-neutral-400 dark:focus:ring-white';

    $shadowClasses = match ($shadow) {
        'sm' => 'shadow-[3px_3px_0px_0px_rgba(0,0,0,1)] dark:shadow-[3px_3px_0px_0px_rgba(255,255,255,1)]',
        'md' => 'shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] dark:shadow-[4px_4px_0px_0px_rgba(255,255,255,1)]',
        'lg' => 'shadow-[6px_6px_0px_0px_rgba(0,0,0,1)] dark:shadow-[6px_6px_0px_0px_rgba(255,255,255,1)]',
        'none' => '',
        default => 'shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] dark:shadow-[4px_4px_0px_0px_rgba(255,255,255,1)]',
    };

    $classes = "{$baseClasses} {$shadowClasses}";
@endphp

<input
    type="{{ $type }}"
    {{ $attributes->merge(['class' => $classes]) }}
/>

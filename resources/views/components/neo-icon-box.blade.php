@props([
    'size' => 'md',
    'shadow' => 'sm',
])

@php
    $baseClasses = 'inline-flex items-center justify-center rounded-xl border-2 border-neutral-900 bg-white text-neutral-900 dark:border-white dark:bg-neutral-900 dark:text-white';

    $sizeClasses = match ($size) {
        'sm' => 'h-8 w-8',
        'md' => 'h-10 w-10',
        'lg' => 'h-12 w-12',
        default => 'h-10 w-10',
    };

    $shadowClasses = match ($shadow) {
        'sm' => 'shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] dark:shadow-[2px_2px_0px_0px_rgba(255,255,255,1)]',
        'md' => 'shadow-[3px_3px_0px_0px_rgba(0,0,0,1)] dark:shadow-[3px_3px_0px_0px_rgba(255,255,255,1)]',
        'none' => '',
        default => 'shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] dark:shadow-[2px_2px_0px_0px_rgba(255,255,255,1)]',
    };

    $classes = "{$baseClasses} {$sizeClasses} {$shadowClasses}";
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>

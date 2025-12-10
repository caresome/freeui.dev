@props([
    'shadow' => 'lg',
    'hover' => true,
    'padding' => 'md',
    'href' => null,
])

@php
    $baseClasses = 'rounded-xl border-2 border-neutral-900 transition-all dark:border-white';

    $bgClasses = 'bg-stone-50 dark:bg-neutral-950';

    $shadowClasses = match ($shadow) {
        'sm' => 'shadow-[3px_3px_0px_0px_rgba(0,0,0,1)] dark:shadow-[3px_3px_0px_0px_rgba(255,255,255,1)]',
        'md' => 'shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] dark:shadow-[4px_4px_0px_0px_rgba(255,255,255,1)]',
        'lg' => 'shadow-[6px_6px_0px_0px_rgba(0,0,0,1)] dark:shadow-[6px_6px_0px_0px_rgba(255,255,255,1)]',
        'xl' => 'shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] dark:shadow-[8px_8px_0px_0px_rgba(255,255,255,1)]',
        'none' => '',
        default => 'shadow-[6px_6px_0px_0px_rgba(0,0,0,1)] dark:shadow-[6px_6px_0px_0px_rgba(255,255,255,1)]',
    };

    $hoverClasses = $hover && $shadow !== 'none' ? 'hover:translate-x-[4px] hover:translate-y-[4px] hover:shadow-none focus-visible:translate-x-[4px] focus-visible:translate-y-[4px] focus-visible:shadow-none' : '';

    $paddingClasses = match ($padding) {
        'none' => '',
        'sm' => 'p-4',
        'md' => 'p-6',
        'lg' => 'p-8',
        default => 'p-6',
    };

    $classes = "{$baseClasses} {$bgClasses} {$shadowClasses} {$hoverClasses} {$paddingClasses}";
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <div {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </div>
@endif

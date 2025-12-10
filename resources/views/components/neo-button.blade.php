@props([
    'variant' => 'primary',
    'size' => 'md',
    'href' => null,
    'shadow' => 'md',
])

@php
    $baseClasses = 'inline-flex items-center justify-center gap-2 rounded-xl border-2 font-bold transition-all';

    $variantClasses = match ($variant) {
        'primary' => 'border-neutral-900 bg-neutral-900 text-white dark:border-white dark:bg-white dark:text-neutral-900',
        'secondary' => 'border-neutral-900 bg-white text-neutral-900 dark:border-white dark:bg-neutral-900 dark:text-white',
        'ghost' => 'border-transparent bg-transparent text-neutral-900 hover:bg-neutral-900/5 dark:text-white dark:hover:bg-white/10',
        default => 'border-neutral-900 bg-white text-neutral-900 dark:border-white dark:bg-neutral-900 dark:text-white',
    };

    $sizeClasses = match ($size) {
        'sm' => 'px-3 py-1.5 text-xs',
        'md' => 'px-4 py-2 text-sm',
        'lg' => 'px-6 py-3 text-sm',
        'xl' => 'px-8 py-4 text-base',
        'icon' => 'h-9 w-9',
        'icon-sm' => 'h-8 w-8',
        default => 'px-4 py-2 text-sm',
    };

    $shadowClasses = match ($shadow) {
        'sm' => 'shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] dark:shadow-[2px_2px_0px_0px_rgba(255,255,255,1)]',
        'md' => 'shadow-[3px_3px_0px_0px_rgba(0,0,0,1)] dark:shadow-[3px_3px_0px_0px_rgba(255,255,255,1)]',
        'lg' => 'shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] dark:shadow-[4px_4px_0px_0px_rgba(255,255,255,1)]',
        'none' => '',
        default => 'shadow-[3px_3px_0px_0px_rgba(0,0,0,1)] dark:shadow-[3px_3px_0px_0px_rgba(255,255,255,1)]',
    };

    // Primary variant uses lighter shadow
    if ($variant === 'primary' && $shadow !== 'none') {
        $shadowClasses = match ($shadow) {
            'sm' => 'shadow-[2px_2px_0px_0px_rgba(0,0,0,0.2)] dark:shadow-[2px_2px_0px_0px_rgba(255,255,255,0.2)]',
            'md' => 'shadow-[3px_3px_0px_0px_rgba(0,0,0,0.2)] dark:shadow-[3px_3px_0px_0px_rgba(255,255,255,0.2)]',
            'lg' => 'shadow-[4px_4px_0px_0px_rgba(0,0,0,0.2)] dark:shadow-[4px_4px_0px_0px_rgba(255,255,255,0.2)]',
            default => 'shadow-[3px_3px_0px_0px_rgba(0,0,0,0.2)] dark:shadow-[3px_3px_0px_0px_rgba(255,255,255,0.2)]',
        };
    }

    $hoverClasses = $shadow !== 'none' && $variant !== 'ghost' ? 'hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-none focus-visible:translate-x-[2px] focus-visible:translate-y-[2px] focus-visible:shadow-none' : '';

    $classes = "{$baseClasses} {$variantClasses} {$sizeClasses} {$shadowClasses} {$hoverClasses}";
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif

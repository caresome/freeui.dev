---
slug: tooltip-with-arrow
title: Tooltip With Arrow
category: overlays
github: caresome
dependencies: []
publish_at: 2025-12-14 10:40:00
---

<div data-preview-only class="flex min-h-[200px] items-center justify-center gap-8 p-8">
    <!-- Tooltip Top with Arrow -->
    <div x-data="{ show: false }" class="relative inline-block">
        <button
            @mouseenter="show = true"
            @mouseleave="show = false"
            @focus="show = true"
            @blur="show = false"
            type="button"
            class="inline-flex h-10 w-10 items-center justify-center rounded-lg bg-neutral-900 text-white shadow-sm transition-all hover:bg-neutral-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 active:scale-95 dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100 dark:focus-visible:outline-neutral-100"
            aria-describedby="arrow-tooltip-top"
        >
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"
                />
            </svg>
        </button>
        <div
            x-show="show"
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            id="arrow-tooltip-top"
            role="tooltip"
            class="absolute bottom-full left-1/2 z-10 mb-3 -translate-x-1/2"
            x-cloak
        >
            <div
                class="rounded-lg bg-neutral-900 px-3 py-1.5 text-xs font-medium whitespace-nowrap text-white shadow-lg dark:bg-white dark:text-neutral-900"
            >
                Add to favorites
            </div>
            <!-- Arrow -->
            <div
                class="absolute top-full left-1/2 -translate-x-1/2 border-4 border-transparent border-t-neutral-900 dark:border-t-white"
            ></div>
        </div>
    </div>

    <!-- Tooltip Right with Arrow -->
    <div x-data="{ show: false }" class="relative inline-block">
        <button
            @mouseenter="show = true"
            @mouseleave="show = false"
            @focus="show = true"
            @blur="show = false"
            type="button"
            class="inline-flex h-10 w-10 items-center justify-center rounded-lg bg-neutral-900 text-white shadow-sm transition-all hover:bg-neutral-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 active:scale-95 dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100 dark:focus-visible:outline-neutral-100"
            aria-describedby="arrow-tooltip-right"
        >
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z"
                />
            </svg>
        </button>
        <div
            x-show="show"
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            id="arrow-tooltip-right"
            role="tooltip"
            class="absolute top-1/2 left-full z-10 ml-3 -translate-y-1/2"
            x-cloak
        >
            <!-- Arrow -->
            <div
                class="absolute top-1/2 right-full -translate-y-1/2 border-4 border-transparent border-r-neutral-900 dark:border-r-white"
            ></div>
            <div
                class="rounded-lg bg-neutral-900 px-3 py-1.5 text-xs font-medium whitespace-nowrap text-white shadow-lg dark:bg-white dark:text-neutral-900"
            >
                Share this
            </div>
        </div>
    </div>

    <!-- Tooltip Bottom with Arrow -->
    <div x-data="{ show: false }" class="relative inline-block">
        <button
            @mouseenter="show = true"
            @mouseleave="show = false"
            @focus="show = true"
            @blur="show = false"
            type="button"
            class="inline-flex h-10 w-10 items-center justify-center rounded-lg bg-neutral-900 text-white shadow-sm transition-all hover:bg-neutral-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 active:scale-95 dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100 dark:focus-visible:outline-neutral-100"
            aria-describedby="arrow-tooltip-bottom"
        >
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3"
                />
            </svg>
        </button>
        <div
            x-show="show"
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            id="arrow-tooltip-bottom"
            role="tooltip"
            class="absolute top-full left-1/2 z-10 mt-3 -translate-x-1/2"
            x-cloak
        >
            <!-- Arrow -->
            <div
                class="absolute bottom-full left-1/2 -translate-x-1/2 border-4 border-transparent border-b-neutral-900 dark:border-b-white"
            ></div>
            <div
                class="rounded-lg bg-neutral-900 px-3 py-1.5 text-xs font-medium whitespace-nowrap text-white shadow-lg dark:bg-white dark:text-neutral-900"
            >
                Download file
            </div>
        </div>
    </div>

    <!-- Tooltip Left with Arrow -->
    <div x-data="{ show: false }" class="relative inline-block">
        <button
            @mouseenter="show = true"
            @mouseleave="show = false"
            @focus="show = true"
            @blur="show = false"
            type="button"
            class="inline-flex h-10 w-10 items-center justify-center rounded-lg bg-neutral-900 text-white shadow-sm transition-all hover:bg-neutral-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 active:scale-95 dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100 dark:focus-visible:outline-neutral-100"
            aria-describedby="arrow-tooltip-left"
        >
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"
                />
            </svg>
        </button>
        <div
            x-show="show"
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            id="arrow-tooltip-left"
            role="tooltip"
            class="absolute top-1/2 right-full z-10 mr-3 -translate-y-1/2"
            x-cloak
        >
            <div
                class="rounded-lg bg-neutral-900 px-3 py-1.5 text-xs font-medium whitespace-nowrap text-white shadow-lg dark:bg-white dark:text-neutral-900"
            >
                Delete item
            </div>
            <!-- Arrow -->
            <div
                class="absolute top-1/2 left-full -translate-y-1/2 border-4 border-transparent border-l-neutral-900 dark:border-l-white"
            ></div>
        </div>
    </div>
</div>

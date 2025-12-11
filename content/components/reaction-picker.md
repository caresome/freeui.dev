---
slug: reaction-picker
title: Reaction Picker
category: voting
github: caresome
dependencies: []
publish_at: 2025-12-07 04:00:00
---

<div data-preview-only class="flex min-h-[120px] items-center justify-center">
    <div x-data="{ open: false, selected: null, hovering: null }" class="relative inline-block">
        <button
            @click="open = !open"
            type="button"
            class="inline-flex items-center gap-2 rounded-lg border border-neutral-200/80 bg-white px-3 py-2 text-sm font-medium text-neutral-700 shadow-sm transition-all duration-150 hover:bg-neutral-50 active:scale-[0.98] dark:border-neutral-700/80 dark:bg-neutral-800 dark:text-neutral-300 dark:hover:bg-neutral-700"
        >
            <span x-text="selected || '😀'" class="text-lg"></span>
            <span x-text="selected ? 'Reacted' : 'React'"></span>
            <svg
                class="h-4 w-4 transition-transform duration-150"
                :class="open ? 'rotate-180' : ''"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
            >
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
        </button>

        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            @click.outside="open = false"
            class="absolute left-0 z-10 mt-2 flex gap-1 rounded-xl border border-neutral-200/80 bg-white p-2 shadow-xl shadow-neutral-900/5 dark:border-neutral-700/80 dark:bg-neutral-800 dark:shadow-neutral-950/50"
            x-cloak
        >
            <button
                @mouseenter="hovering = '1f44d'"
                @mouseleave="hovering = null"
                @click="selected = selected === '👍' ? null : '👍'; open = false"
                type="button"
                :class="selected === '👍' ? 'bg-neutral-100 dark:bg-neutral-700' : 'hover:bg-neutral-100 dark:hover:bg-neutral-700'"
                class="flex h-9 w-9 items-center justify-center rounded-lg transition-all duration-150 hover:scale-125"
            >
                <span x-show="hovering !== '1f44d'" class="text-xl">👍</span>
                <img
                    x-show="hovering === '1f44d'"
                    src="https://fonts.gstatic.com/s/e/notoemoji/latest/1f44d/512.webp"
                    class="h-7 w-7"
                    alt="thumbs up"
                />
            </button>
            <button
                @mouseenter="hovering = '2764_fe0f'"
                @mouseleave="hovering = null"
                @click="selected = selected === '❤️' ? null : '❤️'; open = false"
                type="button"
                :class="selected === '❤️' ? 'bg-neutral-100 dark:bg-neutral-700' : 'hover:bg-neutral-100 dark:hover:bg-neutral-700'"
                class="flex h-9 w-9 items-center justify-center rounded-lg transition-all duration-150 hover:scale-125"
            >
                <span x-show="hovering !== '2764_fe0f'" class="text-xl">❤️</span>
                <img
                    x-show="hovering === '2764_fe0f'"
                    src="https://fonts.gstatic.com/s/e/notoemoji/latest/2764_fe0f/512.webp"
                    class="h-7 w-7"
                    alt="heart"
                />
            </button>
            <button
                @mouseenter="hovering = '1f602'"
                @mouseleave="hovering = null"
                @click="selected = selected === '😂' ? null : '😂'; open = false"
                type="button"
                :class="selected === '😂' ? 'bg-neutral-100 dark:bg-neutral-700' : 'hover:bg-neutral-100 dark:hover:bg-neutral-700'"
                class="flex h-9 w-9 items-center justify-center rounded-lg transition-all duration-150 hover:scale-125"
            >
                <span x-show="hovering !== '1f602'" class="text-xl">😂</span>
                <img
                    x-show="hovering === '1f602'"
                    src="https://fonts.gstatic.com/s/e/notoemoji/latest/1f602/512.webp"
                    class="h-7 w-7"
                    alt="laughing"
                />
            </button>
            <button
                @mouseenter="hovering = '1f62e'"
                @mouseleave="hovering = null"
                @click="selected = selected === '😮' ? null : '😮'; open = false"
                type="button"
                :class="selected === '😮' ? 'bg-neutral-100 dark:bg-neutral-700' : 'hover:bg-neutral-100 dark:hover:bg-neutral-700'"
                class="flex h-9 w-9 items-center justify-center rounded-lg transition-all duration-150 hover:scale-125"
            >
                <span x-show="hovering !== '1f62e'" class="text-xl">😮</span>
                <img
                    x-show="hovering === '1f62e'"
                    src="https://fonts.gstatic.com/s/e/notoemoji/latest/1f62e/512.webp"
                    class="h-7 w-7"
                    alt="surprised"
                />
            </button>
            <button
                @mouseenter="hovering = '1f622'"
                @mouseleave="hovering = null"
                @click="selected = selected === '😢' ? null : '😢'; open = false"
                type="button"
                :class="selected === '😢' ? 'bg-neutral-100 dark:bg-neutral-700' : 'hover:bg-neutral-100 dark:hover:bg-neutral-700'"
                class="flex h-9 w-9 items-center justify-center rounded-lg transition-all duration-150 hover:scale-125"
            >
                <span x-show="hovering !== '1f622'" class="text-xl">😢</span>
                <img
                    x-show="hovering === '1f622'"
                    src="https://fonts.gstatic.com/s/e/notoemoji/latest/1f622/512.webp"
                    class="h-7 w-7"
                    alt="crying"
                />
            </button>
            <button
                @mouseenter="hovering = '1f621'"
                @mouseleave="hovering = null"
                @click="selected = selected === '😡' ? null : '😡'; open = false"
                type="button"
                :class="selected === '😡' ? 'bg-neutral-100 dark:bg-neutral-700' : 'hover:bg-neutral-100 dark:hover:bg-neutral-700'"
                class="flex h-9 w-9 items-center justify-center rounded-lg transition-all duration-150 hover:scale-125"
            >
                <span x-show="hovering !== '1f621'" class="text-xl">😡</span>
                <img
                    x-show="hovering === '1f621'"
                    src="https://fonts.gstatic.com/s/e/notoemoji/latest/1f621/512.webp"
                    class="h-7 w-7"
                    alt="angry"
                />
            </button>
        </div>
    </div>
</div>

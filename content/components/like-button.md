---
slug: like-button
title: Like Button
category: voting
github: caresome
dependencies: []
publish_at: 2025-12-07 03:00:00
---

<div data-preview-only class="flex min-h-[120px] items-center justify-center">
    <div x-data="{ liked: false, count: 24, hovering: false }" class="inline-flex items-center">
        <button
            @click="liked = !liked"
            @mouseenter="hovering = true"
            @mouseleave="hovering = false"
            type="button"
            :class="liked
                ? 'text-red-500 dark:text-red-400'
                : 'text-neutral-400 hover:text-red-500 dark:text-neutral-500 dark:hover:text-red-400'"
            class="inline-flex items-center gap-2 rounded-lg px-3 py-2 text-sm font-medium transition-all duration-150"
        >
            <span class="relative flex h-6 w-6 items-center justify-center">
                <span
                    x-show="!hovering"
                    x-transition:leave="transition ease-in duration-100"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-75"
                    class="absolute text-xl"
                >
                    ❤️
                </span>
                <img
                    x-show="hovering"
                    x-transition:enter="transition ease-out duration-150"
                    x-transition:enter-start="opacity-0 scale-75"
                    x-transition:enter-end="opacity-100 scale-100"
                    src="https://fonts.gstatic.com/s/e/notoemoji/latest/2764_fe0f/512.webp"
                    class="absolute h-6 w-6"
                    alt="heart"
                />
            </span>
            <span class="tabular-nums" x-text="count + (liked ? 1 : 0)"></span>
        </button>
    </div>
</div>

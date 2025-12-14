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
            class="inline-flex items-center gap-2 rounded-lg px-3 py-2 text-sm font-medium transition-all duration-150 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
        >
            <span class="relative flex h-6 w-6 items-center justify-center">
                <span x-show="!hovering" class="absolute text-xl">❤️</span>
                <img
                    x-show="hovering"
                    src="https://fonts.gstatic.com/s/e/notoemoji/latest/2764_fe0f/512.webp"
                    class="absolute h-6 w-6"
                    alt="heart"
                />
            </span>
            <span class="tabular-nums" x-text="count + (liked ? 1 : 0)"></span>
        </button>
    </div>
</div>

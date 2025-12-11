---
slug: upvote-only
title: Upvote Only
category: voting
github: caresome
dependencies: []
publish_at: 2025-12-07 02:00:00
---

<div data-preview-only class="flex min-h-[120px] items-center justify-center">
    <div x-data="{ upvoted: false, count: 128, hovering: false }" class="inline-flex items-center">
        <button
            @click="upvoted = !upvoted"
            @mouseenter="hovering = true"
            @mouseleave="hovering = false"
            type="button"
            :class="upvoted
                ? 'bg-green-50 text-green-600 border-green-200 dark:bg-green-500/10 dark:text-green-400 dark:border-green-500/20'
                : 'bg-white text-neutral-500 border-neutral-200/80 hover:bg-neutral-50 hover:text-green-600 dark:bg-neutral-900 dark:text-neutral-400 dark:border-neutral-800/80 dark:hover:bg-neutral-800 dark:hover:text-green-400'"
            class="inline-flex items-center gap-2 rounded-lg border px-3 py-2 text-sm font-medium shadow-sm transition-all duration-150 hover:scale-[1.02] active:scale-[0.98]"
        >
            <span class="relative flex h-5 w-5 items-center justify-center">
                <span x-show="!hovering" class="absolute text-base">👍</span>
                <img
                    x-show="hovering"
                    src="https://fonts.gstatic.com/s/e/notoemoji/latest/1f44d/512.webp"
                    class="absolute h-5 w-5"
                    alt="thumbs up"
                />
            </span>
            <span class="tabular-nums" x-text="count + (upvoted ? 1 : 0)"></span>
        </button>
    </div>
</div>

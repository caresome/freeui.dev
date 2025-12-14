---
slug: upvote-downvote
title: Upvote Downvote
category: voting
github: caresome
dependencies: []
publish_at: 2025-12-07 01:00:00
---

<div data-preview-only class="flex min-h-[120px] items-center justify-center">
    <div
        x-data="{ vote: null, baseScore: 42 }"
        class="inline-flex items-center gap-1 rounded-xl border border-neutral-200 bg-white p-1 shadow-sm dark:border-neutral-800 dark:bg-neutral-900"
    >
        <button
            @click="vote = vote === 'up' ? null : 'up'"
            type="button"
            :class="vote === 'up'
                ? 'bg-green-50 text-green-600 dark:bg-green-500/10 dark:text-green-400'
                : 'text-neutral-400 hover:bg-neutral-100 hover:text-green-600 dark:text-neutral-500 dark:hover:bg-neutral-800 dark:hover:text-green-400'"
            class="inline-flex h-9 w-9 items-center justify-center rounded-lg transition-all duration-150 hover:scale-105 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 active:scale-95 dark:focus-visible:outline-neutral-100"
            aria-label="Upvote"
        >
            <svg
                class="h-5 w-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="2.5"
                stroke="currentColor"
                aria-hidden="true"
            >
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
            </svg>
        </button>
        <span
            class="min-w-[2.5rem] text-center text-sm font-semibold tabular-nums"
            :class="vote === 'up'
                ? 'text-green-600 dark:text-green-400'
                : vote === 'down'
                    ? 'text-red-600 dark:text-red-400'
                    : 'text-neutral-700 dark:text-neutral-300'"
            x-text="baseScore + (vote === 'up' ? 1 : vote === 'down' ? -1 : 0)"
        ></span>
        <button
            @click="vote = vote === 'down' ? null : 'down'"
            type="button"
            :class="vote === 'down'
                ? 'bg-red-50 text-red-600 dark:bg-red-500/10 dark:text-red-400'
                : 'text-neutral-400 hover:bg-neutral-100 hover:text-red-600 dark:text-neutral-500 dark:hover:bg-neutral-800 dark:hover:text-red-400'"
            class="inline-flex h-9 w-9 items-center justify-center rounded-lg transition-all duration-150 hover:scale-105 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 active:scale-95 dark:focus-visible:outline-neutral-100"
            aria-label="Downvote"
        >
            <svg
                class="h-5 w-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="2.5"
                stroke="currentColor"
                aria-hidden="true"
            >
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
        </button>
    </div>
</div>

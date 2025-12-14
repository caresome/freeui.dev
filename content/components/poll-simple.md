---
slug: poll-simple
title: Poll Simple
category: voting
github: caresome
dependencies: []
publish_at: 2025-12-07 06:00:00
---

<div data-preview-only class="mx-auto max-w-md">
    <div
        x-data="{ selected: null }"
        class="rounded-xl border border-neutral-200 bg-white p-5 shadow-sm dark:border-neutral-800 dark:bg-neutral-900"
    >
        <h3 class="text-base font-semibold text-neutral-900 dark:text-neutral-50">
            What's your favorite JavaScript framework?
        </h3>
        <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">Select one option</p>

        <div class="mt-4 space-y-2">
            <label
                class="flex cursor-pointer items-center gap-3 rounded-lg border p-3 transition-all duration-150 focus-within:outline-1 focus-within:outline-offset-2 focus-within:outline-neutral-900 dark:focus-within:outline-neutral-100"
                :class="selected === 'react'
                    ? 'border-neutral-900 bg-neutral-50 dark:border-neutral-50 dark:bg-neutral-800'
                    : 'border-neutral-200 hover:border-neutral-300 hover:bg-neutral-50 dark:border-neutral-700 dark:hover:border-neutral-600 dark:hover:bg-neutral-800'"
            >
                <input type="radio" name="poll" value="react" x-model="selected" class="sr-only" />
                <span
                    class="flex h-4 w-4 shrink-0 items-center justify-center rounded-full border-2 transition-colors"
                    :class="selected === 'react'
                        ? 'border-neutral-900 dark:border-neutral-50'
                        : 'border-neutral-300 dark:border-neutral-600'"
                >
                    <span
                        x-show="selected === 'react'"
                        class="h-2 w-2 rounded-full bg-neutral-900 dark:bg-neutral-50"
                    ></span>
                </span>
                <span class="text-sm font-medium text-neutral-700 dark:text-neutral-300">React</span>
            </label>

            <label
                class="flex cursor-pointer items-center gap-3 rounded-lg border p-3 transition-all duration-150 focus-within:outline-1 focus-within:outline-offset-2 focus-within:outline-neutral-900 dark:focus-within:outline-neutral-100"
                :class="selected === 'vue'
                    ? 'border-neutral-900 bg-neutral-50 dark:border-neutral-50 dark:bg-neutral-800'
                    : 'border-neutral-200 hover:border-neutral-300 hover:bg-neutral-50 dark:border-neutral-700 dark:hover:border-neutral-600 dark:hover:bg-neutral-800'"
            >
                <input type="radio" name="poll" value="vue" x-model="selected" class="sr-only" />
                <span
                    class="flex h-4 w-4 shrink-0 items-center justify-center rounded-full border-2 transition-colors"
                    :class="selected === 'vue'
                        ? 'border-neutral-900 dark:border-neutral-50'
                        : 'border-neutral-300 dark:border-neutral-600'"
                >
                    <span
                        x-show="selected === 'vue'"
                        class="h-2 w-2 rounded-full bg-neutral-900 dark:bg-neutral-50"
                    ></span>
                </span>
                <span class="text-sm font-medium text-neutral-700 dark:text-neutral-300">Vue</span>
            </label>

            <label
                class="flex cursor-pointer items-center gap-3 rounded-lg border p-3 transition-all duration-150 focus-within:outline-1 focus-within:outline-offset-2 focus-within:outline-neutral-900 dark:focus-within:outline-neutral-100"
                :class="selected === 'angular'
                    ? 'border-neutral-900 bg-neutral-50 dark:border-neutral-50 dark:bg-neutral-800'
                    : 'border-neutral-200 hover:border-neutral-300 hover:bg-neutral-50 dark:border-neutral-700 dark:hover:border-neutral-600 dark:hover:bg-neutral-800'"
            >
                <input type="radio" name="poll" value="angular" x-model="selected" class="sr-only" />
                <span
                    class="flex h-4 w-4 shrink-0 items-center justify-center rounded-full border-2 transition-colors"
                    :class="selected === 'angular'
                        ? 'border-neutral-900 dark:border-neutral-50'
                        : 'border-neutral-300 dark:border-neutral-600'"
                >
                    <span
                        x-show="selected === 'angular'"
                        class="h-2 w-2 rounded-full bg-neutral-900 dark:bg-neutral-50"
                    ></span>
                </span>
                <span class="text-sm font-medium text-neutral-700 dark:text-neutral-300">Angular</span>
            </label>

            <label
                class="flex cursor-pointer items-center gap-3 rounded-lg border p-3 transition-all duration-150 focus-within:outline-1 focus-within:outline-offset-2 focus-within:outline-neutral-900 dark:focus-within:outline-neutral-100"
                :class="selected === 'svelte'
                    ? 'border-neutral-900 bg-neutral-50 dark:border-neutral-50 dark:bg-neutral-800'
                    : 'border-neutral-200 hover:border-neutral-300 hover:bg-neutral-50 dark:border-neutral-700 dark:hover:border-neutral-600 dark:hover:bg-neutral-800'"
            >
                <input type="radio" name="poll" value="svelte" x-model="selected" class="sr-only" />
                <span
                    class="flex h-4 w-4 shrink-0 items-center justify-center rounded-full border-2 transition-colors"
                    :class="selected === 'svelte'
                        ? 'border-neutral-900 dark:border-neutral-50'
                        : 'border-neutral-300 dark:border-neutral-600'"
                >
                    <span
                        x-show="selected === 'svelte'"
                        class="h-2 w-2 rounded-full bg-neutral-900 dark:bg-neutral-50"
                    ></span>
                </span>
                <span class="text-sm font-medium text-neutral-700 dark:text-neutral-300">Svelte</span>
            </label>
        </div>

        <button
            type="button"
            :disabled="!selected"
            :class="selected
                ? 'bg-neutral-900 text-white hover:bg-neutral-800 dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100'
                : 'cursor-not-allowed bg-neutral-100 text-neutral-400 dark:bg-neutral-800 dark:text-neutral-500'"
            class="mt-4 w-full rounded-lg px-4 py-2.5 text-sm font-medium shadow-sm transition-all duration-150 focus-visible:outline focus-visible:outline-1 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 active:scale-[0.98] dark:focus-visible:outline-neutral-100"
        >
            Vote
        </button>
    </div>
</div>

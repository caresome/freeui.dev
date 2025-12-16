---
slug: survey-question-single
title: Survey Question Single
category: user-input
github: caresome
dependencies: []
publish_at: 2025-12-07 09:00:00
---

<div data-preview-only class="mx-auto max-w-md">
    <div
        x-data="{ selected: null }"
        class="rounded-xl border border-neutral-200 bg-white p-5 shadow-sm dark:border-neutral-800 dark:bg-neutral-900"
    >
        <div class="mb-1 flex items-center gap-2">
            <span
                class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-neutral-100 text-xs font-semibold text-neutral-600 dark:bg-neutral-800 dark:text-neutral-400"
            >
                1
            </span>
            <span class="text-xs font-medium tracking-wider text-neutral-500 uppercase dark:text-neutral-400">
                Required
            </span>
        </div>
        <h3 class="text-base font-semibold text-neutral-900 dark:text-neutral-50">How did you hear about us?</h3>
        <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">Please select one option</p>

        <div class="mt-4 space-y-2">
            <label
                class="flex cursor-pointer items-center gap-3 rounded-lg border p-3 transition-all duration-150 has-[:focus-visible]:outline has-[:focus-visible]:outline-2 has-[:focus-visible]:outline-offset-2 has-[:focus-visible]:outline-neutral-900 dark:has-[:focus-visible]:outline-neutral-100"
                :class="selected === 'search'
                    ? 'border-neutral-900 bg-neutral-50 dark:border-neutral-50 dark:bg-neutral-800'
                    : 'border-neutral-200 hover:border-neutral-300 hover:bg-neutral-50 dark:border-neutral-700 dark:hover:border-neutral-600 dark:hover:bg-neutral-800'"
            >
                <input
                    type="radio"
                    name="survey"
                    value="search"
                    x-model="selected"
                    class="sr-only focus:outline-none"
                />
                <span
                    class="flex h-4 w-4 shrink-0 items-center justify-center rounded-full border-2 transition-colors"
                    :class="selected === 'search'
                        ? 'border-neutral-900 dark:border-neutral-50'
                        : 'border-neutral-300 dark:border-neutral-600'"
                >
                    <span
                        x-show="selected === 'search'"
                        class="h-2 w-2 rounded-full bg-neutral-900 dark:bg-neutral-50"
                    ></span>
                </span>
                <span class="text-sm font-medium text-neutral-700 dark:text-neutral-300">
                    Search engine (Google, Bing, etc.)
                </span>
            </label>

            <label
                class="flex cursor-pointer items-center gap-3 rounded-lg border p-3 transition-all duration-150 has-[:focus-visible]:outline has-[:focus-visible]:outline-2 has-[:focus-visible]:outline-offset-2 has-[:focus-visible]:outline-neutral-900 dark:has-[:focus-visible]:outline-neutral-100"
                :class="selected === 'social'
                    ? 'border-neutral-900 bg-neutral-50 dark:border-neutral-50 dark:bg-neutral-800'
                    : 'border-neutral-200 hover:border-neutral-300 hover:bg-neutral-50 dark:border-neutral-700 dark:hover:border-neutral-600 dark:hover:bg-neutral-800'"
            >
                <input
                    type="radio"
                    name="survey"
                    value="social"
                    x-model="selected"
                    class="sr-only focus:outline-none"
                />
                <span
                    class="flex h-4 w-4 shrink-0 items-center justify-center rounded-full border-2 transition-colors"
                    :class="selected === 'social'
                        ? 'border-neutral-900 dark:border-neutral-50'
                        : 'border-neutral-300 dark:border-neutral-600'"
                >
                    <span
                        x-show="selected === 'social'"
                        class="h-2 w-2 rounded-full bg-neutral-900 dark:bg-neutral-50"
                    ></span>
                </span>
                <span class="text-sm font-medium text-neutral-700 dark:text-neutral-300">Social media</span>
            </label>

            <label
                class="flex cursor-pointer items-center gap-3 rounded-lg border p-3 transition-all duration-150 has-[:focus-visible]:outline has-[:focus-visible]:outline-2 has-[:focus-visible]:outline-offset-2 has-[:focus-visible]:outline-neutral-900 dark:has-[:focus-visible]:outline-neutral-100"
                :class="selected === 'friend'
                    ? 'border-neutral-900 bg-neutral-50 dark:border-neutral-50 dark:bg-neutral-800'
                    : 'border-neutral-200 hover:border-neutral-300 hover:bg-neutral-50 dark:border-neutral-700 dark:hover:border-neutral-600 dark:hover:bg-neutral-800'"
            >
                <input
                    type="radio"
                    name="survey"
                    value="friend"
                    x-model="selected"
                    class="sr-only focus:outline-none"
                />
                <span
                    class="flex h-4 w-4 shrink-0 items-center justify-center rounded-full border-2 transition-colors"
                    :class="selected === 'friend'
                        ? 'border-neutral-900 dark:border-neutral-50'
                        : 'border-neutral-300 dark:border-neutral-600'"
                >
                    <span
                        x-show="selected === 'friend'"
                        class="h-2 w-2 rounded-full bg-neutral-900 dark:bg-neutral-50"
                    ></span>
                </span>
                <span class="text-sm font-medium text-neutral-700 dark:text-neutral-300">Friend or colleague</span>
            </label>

            <label
                class="flex cursor-pointer items-center gap-3 rounded-lg border p-3 transition-all duration-150 has-[:focus-visible]:outline has-[:focus-visible]:outline-2 has-[:focus-visible]:outline-offset-2 has-[:focus-visible]:outline-neutral-900 dark:has-[:focus-visible]:outline-neutral-100"
                :class="selected === 'blog'
                    ? 'border-neutral-900 bg-neutral-50 dark:border-neutral-50 dark:bg-neutral-800'
                    : 'border-neutral-200 hover:border-neutral-300 hover:bg-neutral-50 dark:border-neutral-700 dark:hover:border-neutral-600 dark:hover:bg-neutral-800'"
            >
                <input type="radio" name="survey" value="blog" x-model="selected" class="sr-only focus:outline-none" />
                <span
                    class="flex h-4 w-4 shrink-0 items-center justify-center rounded-full border-2 transition-colors"
                    :class="selected === 'blog'
                        ? 'border-neutral-900 dark:border-neutral-50'
                        : 'border-neutral-300 dark:border-neutral-600'"
                >
                    <span
                        x-show="selected === 'blog'"
                        class="h-2 w-2 rounded-full bg-neutral-900 dark:bg-neutral-50"
                    ></span>
                </span>
                <span class="text-sm font-medium text-neutral-700 dark:text-neutral-300">Blog or article</span>
            </label>

            <label
                class="flex cursor-pointer items-center gap-3 rounded-lg border p-3 transition-all duration-150 has-[:focus-visible]:outline has-[:focus-visible]:outline-2 has-[:focus-visible]:outline-offset-2 has-[:focus-visible]:outline-neutral-900 dark:has-[:focus-visible]:outline-neutral-100"
                :class="selected === 'other'
                    ? 'border-neutral-900 bg-neutral-50 dark:border-neutral-50 dark:bg-neutral-800'
                    : 'border-neutral-200 hover:border-neutral-300 hover:bg-neutral-50 dark:border-neutral-700 dark:hover:border-neutral-600 dark:hover:bg-neutral-800'"
            >
                <input type="radio" name="survey" value="other" x-model="selected" class="sr-only focus:outline-none" />
                <span
                    class="flex h-4 w-4 shrink-0 items-center justify-center rounded-full border-2 transition-colors"
                    :class="selected === 'other'
                        ? 'border-neutral-900 dark:border-neutral-50'
                        : 'border-neutral-300 dark:border-neutral-600'"
                >
                    <span
                        x-show="selected === 'other'"
                        class="h-2 w-2 rounded-full bg-neutral-900 dark:bg-neutral-50"
                    ></span>
                </span>
                <span class="text-sm font-medium text-neutral-700 dark:text-neutral-300">Other</span>
            </label>
        </div>

        <div class="mt-4 flex justify-end">
            <button
                type="button"
                :disabled="!selected"
                :class="selected
                    ? 'bg-neutral-900 text-white hover:bg-neutral-800 dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100'
                    : 'cursor-not-allowed bg-neutral-100 text-neutral-400 dark:bg-neutral-800 dark:text-neutral-500'"
                class="inline-flex items-center gap-2 rounded-lg px-4 py-2 text-sm font-medium shadow-sm transition-all duration-150 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 active:scale-[0.98] dark:focus-visible:outline-neutral-100"
            >
                Next
                <svg
                    class="h-4 w-4"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    aria-hidden="true"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                </svg>
            </button>
        </div>
    </div>
</div>

---
slug: survey-question-scale
title: Survey Question Scale
category: voting
github: caresome
dependencies: []
publish_at: 2025-12-07 11:00:00
---

<div data-preview-only class="mx-auto max-w-md">
    <div
        x-data="{ rating: null }"
        class="rounded-xl border border-neutral-200 bg-white p-5 shadow-sm dark:border-neutral-800 dark:bg-neutral-900"
    >
        <div class="mb-1 flex items-center gap-2">
            <span
                class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-neutral-100 text-xs font-semibold text-neutral-600 dark:bg-neutral-800 dark:text-neutral-400"
            >
                3
            </span>
            <span class="text-xs font-medium tracking-wider text-neutral-500 uppercase dark:text-neutral-400">
                Required
            </span>
        </div>
        <h3 class="text-base font-semibold text-neutral-900 dark:text-neutral-50">
            How satisfied are you with our service?
        </h3>

        <div class="mt-4">
            <div class="mb-3 flex items-center justify-between text-xs text-neutral-500 dark:text-neutral-400">
                <span>Very dissatisfied</span>
                <span>Very satisfied</span>
            </div>

            <div class="flex justify-between gap-2">
                <button
                    @click="rating = 1"
                    type="button"
                    :class="rating === 1
                        ? 'bg-neutral-900 text-white dark:bg-white dark:text-neutral-900'
                        : 'bg-neutral-100 text-neutral-600 hover:bg-neutral-200 dark:bg-neutral-800 dark:text-neutral-400 dark:hover:bg-neutral-700'"
                    class="flex h-12 w-12 items-center justify-center rounded-lg text-lg font-semibold transition-all duration-150 hover:scale-105 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 active:scale-95 dark:focus-visible:outline-neutral-100"
                >
                    1
                </button>
                <button
                    @click="rating = 2"
                    type="button"
                    :class="rating === 2
                        ? 'bg-neutral-900 text-white dark:bg-white dark:text-neutral-900'
                        : 'bg-neutral-100 text-neutral-600 hover:bg-neutral-200 dark:bg-neutral-800 dark:text-neutral-400 dark:hover:bg-neutral-700'"
                    class="flex h-12 w-12 items-center justify-center rounded-lg text-lg font-semibold transition-all duration-150 hover:scale-105 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 active:scale-95 dark:focus-visible:outline-neutral-100"
                >
                    2
                </button>
                <button
                    @click="rating = 3"
                    type="button"
                    :class="rating === 3
                        ? 'bg-neutral-900 text-white dark:bg-white dark:text-neutral-900'
                        : 'bg-neutral-100 text-neutral-600 hover:bg-neutral-200 dark:bg-neutral-800 dark:text-neutral-400 dark:hover:bg-neutral-700'"
                    class="flex h-12 w-12 items-center justify-center rounded-lg text-lg font-semibold transition-all duration-150 hover:scale-105 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 active:scale-95 dark:focus-visible:outline-neutral-100"
                >
                    3
                </button>
                <button
                    @click="rating = 4"
                    type="button"
                    :class="rating === 4
                        ? 'bg-neutral-900 text-white dark:bg-white dark:text-neutral-900'
                        : 'bg-neutral-100 text-neutral-600 hover:bg-neutral-200 dark:bg-neutral-800 dark:text-neutral-400 dark:hover:bg-neutral-700'"
                    class="flex h-12 w-12 items-center justify-center rounded-lg text-lg font-semibold transition-all duration-150 hover:scale-105 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 active:scale-95 dark:focus-visible:outline-neutral-100"
                >
                    4
                </button>
                <button
                    @click="rating = 5"
                    type="button"
                    :class="rating === 5
                        ? 'bg-neutral-900 text-white dark:bg-white dark:text-neutral-900'
                        : 'bg-neutral-100 text-neutral-600 hover:bg-neutral-200 dark:bg-neutral-800 dark:text-neutral-400 dark:hover:bg-neutral-700'"
                    class="flex h-12 w-12 items-center justify-center rounded-lg text-lg font-semibold transition-all duration-150 hover:scale-105 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 active:scale-95 dark:focus-visible:outline-neutral-100"
                >
                    5
                </button>
            </div>

            <p
                x-show="rating"
                x-transition:enter="transition ease-out duration-150"
                x-transition:enter-start="opacity-0 translate-y-1"
                x-transition:enter-end="opacity-100 translate-y-0"
                class="mt-3 text-center text-sm font-medium"
                :class="{
                    'text-red-600 dark:text-red-400': rating <= 2,
                    'text-amber-600 dark:text-amber-400': rating === 3,
                    'text-green-600 dark:text-green-400': rating >= 4
                }"
                x-text="rating <= 2 ? 'Sorry to hear that' : rating === 3 ? 'Thank you for your feedback' : 'Great to hear!'"
            ></p>
        </div>

        <div class="mt-5 flex items-center justify-between border-t border-neutral-200 pt-4 dark:border-neutral-800">
            <button
                type="button"
                class="inline-flex items-center gap-2 rounded-lg px-4 py-2 text-sm font-medium text-neutral-600 transition-all duration-150 hover:bg-neutral-100 hover:text-neutral-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:outline-neutral-100"
            >
                <svg
                    class="h-4 w-4"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    aria-hidden="true"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
                Back
            </button>
            <button
                type="button"
                :disabled="!rating"
                :class="rating
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

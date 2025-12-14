---
slug: poll-multiple-choice
title: Poll Multiple Choice
category: voting
github: caresome
dependencies: []
publish_at: 2025-12-07 07:00:00
---

<div data-preview-only class="mx-auto max-w-md">
    <div
        x-data="{ selected: [] }"
        class="rounded-xl border border-neutral-200 bg-white p-5 shadow-sm dark:border-neutral-800 dark:bg-neutral-900"
    >
        <h3 class="text-base font-semibold text-neutral-900 dark:text-neutral-50">
            Which features are most important to you?
        </h3>
        <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">Select all that apply</p>

        <div class="mt-4 space-y-2">
            <label
                class="flex cursor-pointer items-center gap-3 rounded-lg border p-3 transition-all duration-150 has-[:focus-visible]:outline has-[:focus-visible]:outline-1 has-[:focus-visible]:outline-offset-2 has-[:focus-visible]:outline-neutral-900 dark:has-[:focus-visible]:outline-neutral-100"
                :class="selected.includes('performance')
                    ? 'border-neutral-900 bg-neutral-50 dark:border-neutral-50 dark:bg-neutral-800'
                    : 'border-neutral-200 hover:border-neutral-300 hover:bg-neutral-50 dark:border-neutral-700 dark:hover:border-neutral-600 dark:hover:bg-neutral-800'"
            >
                <input type="checkbox" value="performance" x-model="selected" class="sr-only focus:outline-none" />
                <span
                    class="flex h-4 w-4 shrink-0 items-center justify-center rounded border-2 transition-colors"
                    :class="selected.includes('performance')
                        ? 'border-neutral-900 bg-neutral-900 dark:border-neutral-50 dark:bg-neutral-50'
                        : 'border-neutral-300 dark:border-neutral-600'"
                >
                    <svg
                        x-show="selected.includes('performance')"
                        class="h-3 w-3 text-white dark:text-neutral-900"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="3"
                        stroke="currentColor"
                        aria-hidden="true"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                </span>
                <span class="text-sm font-medium text-neutral-700 dark:text-neutral-300">Performance</span>
            </label>

            <label
                class="flex cursor-pointer items-center gap-3 rounded-lg border p-3 transition-all duration-150 has-[:focus-visible]:outline has-[:focus-visible]:outline-1 has-[:focus-visible]:outline-offset-2 has-[:focus-visible]:outline-neutral-900 dark:has-[:focus-visible]:outline-neutral-100"
                :class="selected.includes('security')
                    ? 'border-neutral-900 bg-neutral-50 dark:border-neutral-50 dark:bg-neutral-800'
                    : 'border-neutral-200 hover:border-neutral-300 hover:bg-neutral-50 dark:border-neutral-700 dark:hover:border-neutral-600 dark:hover:bg-neutral-800'"
            >
                <input type="checkbox" value="security" x-model="selected" class="sr-only focus:outline-none" />
                <span
                    class="flex h-4 w-4 shrink-0 items-center justify-center rounded border-2 transition-colors"
                    :class="selected.includes('security')
                        ? 'border-neutral-900 bg-neutral-900 dark:border-neutral-50 dark:bg-neutral-50'
                        : 'border-neutral-300 dark:border-neutral-600'"
                >
                    <svg
                        x-show="selected.includes('security')"
                        class="h-3 w-3 text-white dark:text-neutral-900"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="3"
                        stroke="currentColor"
                        aria-hidden="true"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                </span>
                <span class="text-sm font-medium text-neutral-700 dark:text-neutral-300">Security</span>
            </label>

            <label
                class="flex cursor-pointer items-center gap-3 rounded-lg border p-3 transition-all duration-150 has-[:focus-visible]:outline has-[:focus-visible]:outline-1 has-[:focus-visible]:outline-offset-2 has-[:focus-visible]:outline-neutral-900 dark:has-[:focus-visible]:outline-neutral-100"
                :class="selected.includes('ease-of-use')
                    ? 'border-neutral-900 bg-neutral-50 dark:border-neutral-50 dark:bg-neutral-800'
                    : 'border-neutral-200 hover:border-neutral-300 hover:bg-neutral-50 dark:border-neutral-700 dark:hover:border-neutral-600 dark:hover:bg-neutral-800'"
            >
                <input type="checkbox" value="ease-of-use" x-model="selected" class="sr-only focus:outline-none" />
                <span
                    class="flex h-4 w-4 shrink-0 items-center justify-center rounded border-2 transition-colors"
                    :class="selected.includes('ease-of-use')
                        ? 'border-neutral-900 bg-neutral-900 dark:border-neutral-50 dark:bg-neutral-50'
                        : 'border-neutral-300 dark:border-neutral-600'"
                >
                    <svg
                        x-show="selected.includes('ease-of-use')"
                        class="h-3 w-3 text-white dark:text-neutral-900"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="3"
                        stroke="currentColor"
                        aria-hidden="true"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                </span>
                <span class="text-sm font-medium text-neutral-700 dark:text-neutral-300">Ease of Use</span>
            </label>

            <label
                class="flex cursor-pointer items-center gap-3 rounded-lg border p-3 transition-all duration-150 has-[:focus-visible]:outline has-[:focus-visible]:outline-1 has-[:focus-visible]:outline-offset-2 has-[:focus-visible]:outline-neutral-900 dark:has-[:focus-visible]:outline-neutral-100"
                :class="selected.includes('documentation')
                    ? 'border-neutral-900 bg-neutral-50 dark:border-neutral-50 dark:bg-neutral-800'
                    : 'border-neutral-200 hover:border-neutral-300 hover:bg-neutral-50 dark:border-neutral-700 dark:hover:border-neutral-600 dark:hover:bg-neutral-800'"
            >
                <input type="checkbox" value="documentation" x-model="selected" class="sr-only focus:outline-none" />
                <span
                    class="flex h-4 w-4 shrink-0 items-center justify-center rounded border-2 transition-colors"
                    :class="selected.includes('documentation')
                        ? 'border-neutral-900 bg-neutral-900 dark:border-neutral-50 dark:bg-neutral-50'
                        : 'border-neutral-300 dark:border-neutral-600'"
                >
                    <svg
                        x-show="selected.includes('documentation')"
                        class="h-3 w-3 text-white dark:text-neutral-900"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="3"
                        stroke="currentColor"
                        aria-hidden="true"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                </span>
                <span class="text-sm font-medium text-neutral-700 dark:text-neutral-300">Documentation</span>
            </label>
        </div>

        <div class="mt-4 flex items-center justify-between">
            <span class="text-sm text-neutral-500 dark:text-neutral-400" x-text="selected.length + ' selected'"></span>
            <button
                type="button"
                :disabled="selected.length === 0"
                :class="selected.length > 0
                    ? 'bg-neutral-900 text-white hover:bg-neutral-800 dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100'
                    : 'cursor-not-allowed bg-neutral-100 text-neutral-400 dark:bg-neutral-800 dark:text-neutral-500'"
                class="rounded-lg px-4 py-2 text-sm font-medium shadow-sm transition-all duration-150 focus-visible:outline focus-visible:outline-1 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 active:scale-[0.98] dark:focus-visible:outline-neutral-100"
            >
                Submit
            </button>
        </div>
    </div>
</div>

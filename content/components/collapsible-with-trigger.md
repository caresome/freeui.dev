---
slug: collapsible-with-trigger
title: Collapsible With Trigger
category: tabs-accordions
github: caresome
dependencies:
    - '@alpinejs/collapse https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js'
publish_at: 2025-12-14 00:11:00
---

<div data-preview-only class="flex min-h-[400px] items-start justify-center p-4 sm:p-8">
    <div
        x-data="{ open: true, categories: ['electronics'] }"
        class="w-full max-w-sm overflow-hidden rounded-xl border border-neutral-200 bg-white shadow-sm dark:border-neutral-700 dark:bg-neutral-800"
    >
        <div class="flex items-center justify-between px-3 py-2.5 sm:px-4 sm:py-3">
            <h3 class="font-medium text-neutral-900 dark:text-neutral-50">Filter Options</h3>
            <button
                @click="open = !open"
                type="button"
                class="rounded-lg p-1.5 text-neutral-500 transition-colors hover:bg-neutral-100 hover:text-neutral-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-50 dark:focus-visible:ring-neutral-100"
                :aria-expanded="open"
                aria-label="Toggle filters"
            >
                <svg
                    class="h-5 w-5 transition-transform duration-200"
                    :class="open ? 'rotate-180' : ''"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
        </div>

        <div
            x-show="open"
            x-collapse
            x-cloak
            class="border-t border-neutral-200 px-3 py-3 sm:px-4 sm:py-4 dark:border-neutral-700"
        >
            <div class="space-y-5">
                <div>
                    <label class="mb-3 block text-sm font-medium text-neutral-900 dark:text-neutral-100">
                        Category
                    </label>
                    <div class="space-y-2">
                        <label
                            class="flex cursor-pointer items-center gap-3 rounded-lg border p-3 transition-all duration-150 hover:bg-neutral-50 dark:hover:bg-neutral-800"
                            :class="categories.includes('electronics') ? 'border-neutral-900 bg-neutral-50 dark:border-neutral-50 dark:bg-neutral-800' : 'border-neutral-200 dark:border-neutral-700'"
                        >
                            <input type="checkbox" value="electronics" x-model="categories" class="sr-only" />
                            <span
                                class="flex h-4 w-4 shrink-0 items-center justify-center rounded border-2 transition-colors"
                                :class="categories.includes('electronics') ? 'border-neutral-900 bg-neutral-900 dark:border-neutral-50 dark:bg-neutral-50' : 'border-neutral-300 dark:border-neutral-600'"
                            >
                                <svg
                                    x-show="categories.includes('electronics')"
                                    class="h-3 w-3 text-white dark:text-neutral-900"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="3"
                                    stroke="currentColor"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </span>
                            <span class="text-sm font-medium text-neutral-700 dark:text-neutral-300">Electronics</span>
                        </label>
                        <label
                            class="flex cursor-pointer items-center gap-3 rounded-lg border p-3 transition-all duration-150 hover:bg-neutral-50 dark:hover:bg-neutral-800"
                            :class="categories.includes('clothing') ? 'border-neutral-900 bg-neutral-50 dark:border-neutral-50 dark:bg-neutral-800' : 'border-neutral-200 dark:border-neutral-700'"
                        >
                            <input type="checkbox" value="clothing" x-model="categories" class="sr-only" />
                            <span
                                class="flex h-4 w-4 shrink-0 items-center justify-center rounded border-2 transition-colors"
                                :class="categories.includes('clothing') ? 'border-neutral-900 bg-neutral-900 dark:border-neutral-50 dark:bg-neutral-50' : 'border-neutral-300 dark:border-neutral-600'"
                            >
                                <svg
                                    x-show="categories.includes('clothing')"
                                    class="h-3 w-3 text-white dark:text-neutral-900"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="3"
                                    stroke="currentColor"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </span>
                            <span class="text-sm font-medium text-neutral-700 dark:text-neutral-300">Clothing</span>
                        </label>
                        <label
                            class="flex cursor-pointer items-center gap-3 rounded-lg border p-3 transition-all duration-150 hover:bg-neutral-50 dark:hover:bg-neutral-800"
                            :class="categories.includes('books') ? 'border-neutral-900 bg-neutral-50 dark:border-neutral-50 dark:bg-neutral-800' : 'border-neutral-200 dark:border-neutral-700'"
                        >
                            <input type="checkbox" value="books" x-model="categories" class="sr-only" />
                            <span
                                class="flex h-4 w-4 shrink-0 items-center justify-center rounded border-2 transition-colors"
                                :class="categories.includes('books') ? 'border-neutral-900 bg-neutral-900 dark:border-neutral-50 dark:bg-neutral-50' : 'border-neutral-300 dark:border-neutral-600'"
                            >
                                <svg
                                    x-show="categories.includes('books')"
                                    class="h-3 w-3 text-white dark:text-neutral-900"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="3"
                                    stroke="currentColor"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </span>
                            <span class="text-sm font-medium text-neutral-700 dark:text-neutral-300">Books</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label class="mb-2 block text-sm font-medium text-neutral-900 dark:text-neutral-100">
                        Price Range
                    </label>
                    <div class="flex items-center gap-3">
                        <div class="relative w-full">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <span class="text-neutral-500 sm:text-sm">$</span>
                            </div>
                            <input
                                type="number"
                                placeholder="Min"
                                class="block w-full rounded-lg border border-neutral-300 bg-white p-2.5 pl-7 text-sm text-neutral-900 placeholder-neutral-400 outline-none focus:border-neutral-900 focus:ring-1 focus:ring-neutral-900 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:placeholder-neutral-500 dark:focus:border-neutral-100 dark:focus:ring-neutral-100"
                            />
                        </div>
                        <span class="text-neutral-400">-</span>
                        <div class="relative w-full">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <span class="text-neutral-500 sm:text-sm">$</span>
                            </div>
                            <input
                                type="number"
                                placeholder="Max"
                                class="block w-full rounded-lg border border-neutral-300 bg-white p-2.5 pl-7 text-sm text-neutral-900 placeholder-neutral-400 outline-none focus:border-neutral-900 focus:ring-1 focus:ring-neutral-900 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:placeholder-neutral-500 dark:focus:border-neutral-100 dark:focus:ring-neutral-100"
                            />
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6 flex justify-end">
                <button
                    type="button"
                    class="text-sm font-medium text-neutral-900 underline-offset-4 hover:underline dark:text-neutral-50"
                >
                    Apply Filters
                </button>
            </div>
        </div>
    </div>
</div>

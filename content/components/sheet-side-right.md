---
slug: sheet-side-right
title: Sheet Side Right
category: overlays
github: caresome
dependencies:
    - '@alpinejs/focus https://cdn.jsdelivr.net/npm/@alpinejs/focus@3.x.x/dist/cdn.min.js'
publish_at: 2025-12-14 00:00:00
---

<div data-preview-only class="flex min-h-[400px] items-center justify-center p-4">
    <div
        x-data="{
            open: false,
            categories: ['all'],
            rating: ''
        }"
        @keydown.escape.window="if (open) { open = false; $refs.trigger.focus(); }"
    >
        <!-- Trigger Button -->
        <button
            x-ref="trigger"
            @click="open = true"
            type="button"
            class="inline-flex items-center gap-2 rounded-lg bg-neutral-900 px-4 py-2.5 text-sm font-medium text-white shadow-sm transition-all duration-150 hover:bg-neutral-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 active:scale-[0.98] dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100 dark:focus-visible:outline-neutral-100"
        >
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z"
                />
            </svg>
            Filters
        </button>

        <!-- Backdrop -->
        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click="open = false; $refs.trigger.focus();"
            class="fixed inset-0 z-40 bg-neutral-900/50"
            aria-hidden="true"
            x-cloak
        ></div>

        <!-- Sheet Panel (Right) -->
        <div
            x-show="open"
            x-transition:enter="transition transform ease-out duration-200"
            x-transition:enter-start="translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition transform ease-in duration-150"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full"
            x-trap.inert.noscroll="open"
            class="fixed inset-y-0 right-0 z-50 flex w-full max-w-sm flex-col bg-white shadow-xl dark:bg-neutral-900"
            role="dialog"
            aria-modal="true"
            aria-labelledby="right-sheet-title"
            x-cloak
        >
            <!-- Header -->
            <div
                class="flex h-16 items-center justify-between border-b border-neutral-200 px-4 dark:border-neutral-800"
            >
                <h2 id="right-sheet-title" class="text-base font-semibold text-neutral-900 dark:text-neutral-50">
                    Filters
                </h2>
                <button
                    @click="open = false"
                    type="button"
                    class="-m-2 rounded-lg p-2 text-neutral-400 transition-colors hover:bg-neutral-100 hover:text-neutral-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:hover:bg-neutral-800 dark:hover:text-neutral-300 dark:focus-visible:outline-neutral-100"
                    aria-label="Close filters"
                >
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Filters Content -->
            <div class="flex-1 overflow-y-auto p-4">
                <!-- Category Filter -->
                <div class="border-b border-neutral-200 pb-4 dark:border-neutral-800">
                    <h3 class="text-sm font-medium text-neutral-900 dark:text-neutral-50">Category</h3>
                    <div class="mt-3 space-y-2">
                        <label
                            class="flex cursor-pointer items-center gap-3 rounded-lg border p-3 transition-all duration-150 focus-within:outline-2 focus-within:outline-offset-2 focus-within:outline-neutral-900 dark:focus-within:outline-neutral-100"
                            :class="categories.includes('all')
                                ? 'border-neutral-900 bg-neutral-50 dark:border-neutral-50 dark:bg-neutral-800'
                                : 'border-neutral-200 hover:border-neutral-300 hover:bg-neutral-50 dark:border-neutral-700 dark:hover:border-neutral-600 dark:hover:bg-neutral-800'"
                        >
                            <input type="checkbox" value="all" x-model="categories" class="sr-only" />
                            <span
                                class="flex h-4 w-4 shrink-0 items-center justify-center rounded border-2 transition-colors"
                                :class="categories.includes('all')
                                    ? 'border-neutral-900 bg-neutral-900 dark:border-neutral-50 dark:bg-neutral-50'
                                    : 'border-neutral-300 dark:border-neutral-600'"
                            >
                                <svg
                                    x-show="categories.includes('all')"
                                    class="h-3 w-3 text-white dark:text-neutral-900"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="3"
                                    stroke="currentColor"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </span>
                            <span class="text-sm font-medium text-neutral-700 dark:text-neutral-300">
                                All categories
                            </span>
                        </label>
                        <label
                            class="flex cursor-pointer items-center gap-3 rounded-lg border p-3 transition-all duration-150 has-[:focus-visible]:outline has-[:focus-visible]:outline-2 has-[:focus-visible]:outline-offset-2 has-[:focus-visible]:outline-neutral-900 dark:has-[:focus-visible]:outline-neutral-100"
                            :class="categories.includes('electronics')
                                ? 'border-neutral-900 bg-neutral-50 dark:border-neutral-50 dark:bg-neutral-800'
                                : 'border-neutral-200 hover:border-neutral-300 hover:bg-neutral-50 dark:border-neutral-700 dark:hover:border-neutral-600 dark:hover:bg-neutral-800'"
                        >
                            <input type="checkbox" value="electronics" x-model="categories" class="sr-only" />
                            <span
                                class="flex h-4 w-4 shrink-0 items-center justify-center rounded border-2 transition-colors"
                                :class="categories.includes('electronics')
                                    ? 'border-neutral-900 bg-neutral-900 dark:border-neutral-50 dark:bg-neutral-50'
                                    : 'border-neutral-300 dark:border-neutral-600'"
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
                            class="flex cursor-pointer items-center gap-3 rounded-lg border p-3 transition-all duration-150 has-[:focus-visible]:outline has-[:focus-visible]:outline-2 has-[:focus-visible]:outline-offset-2 has-[:focus-visible]:outline-neutral-900 dark:has-[:focus-visible]:outline-neutral-100"
                            :class="categories.includes('clothing')
                                ? 'border-neutral-900 bg-neutral-50 dark:border-neutral-50 dark:bg-neutral-800'
                                : 'border-neutral-200 hover:border-neutral-300 hover:bg-neutral-50 dark:border-neutral-700 dark:hover:border-neutral-600 dark:hover:bg-neutral-800'"
                        >
                            <input type="checkbox" value="clothing" x-model="categories" class="sr-only" />
                            <span
                                class="flex h-4 w-4 shrink-0 items-center justify-center rounded border-2 transition-colors"
                                :class="categories.includes('clothing')
                                    ? 'border-neutral-900 bg-neutral-900 dark:border-neutral-50 dark:bg-neutral-50'
                                    : 'border-neutral-300 dark:border-neutral-600'"
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
                            class="flex cursor-pointer items-center gap-3 rounded-lg border p-3 transition-all duration-150 focus-within:outline focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
                            :class="categories.includes('home')
                                ? 'border-neutral-900 bg-neutral-50 dark:border-neutral-50 dark:bg-neutral-800'
                                : 'border-neutral-200 hover:border-neutral-300 hover:bg-neutral-50 dark:border-neutral-700 dark:hover:border-neutral-600 dark:hover:bg-neutral-800'"
                        >
                            <input type="checkbox" value="home" x-model="categories" class="sr-only" />
                            <span
                                class="flex h-4 w-4 shrink-0 items-center justify-center rounded border-2 transition-colors"
                                :class="categories.includes('home')
                                    ? 'border-neutral-900 bg-neutral-900 dark:border-neutral-50 dark:bg-neutral-50'
                                    : 'border-neutral-300 dark:border-neutral-600'"
                            >
                                <svg
                                    x-show="categories.includes('home')"
                                    class="h-3 w-3 text-white dark:text-neutral-900"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="3"
                                    stroke="currentColor"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </span>
                            <span class="text-sm font-medium text-neutral-700 dark:text-neutral-300">
                                Home & Garden
                            </span>
                        </label>
                    </div>
                </div>

                <!-- Price Range Filter -->
                <div class="border-b border-neutral-200 py-4 dark:border-neutral-800">
                    <h3 class="text-sm font-medium text-neutral-900 dark:text-neutral-50">Price Range</h3>
                    <div class="mt-3 grid grid-cols-2 gap-3">
                        <div>
                            <label for="min-price" class="sr-only">Minimum price</label>
                            <input
                                type="number"
                                id="min-price"
                                placeholder="Min"
                                class="block w-full rounded-lg border border-neutral-300 bg-white px-3 py-2 text-sm text-neutral-900 placeholder-neutral-400 focus:border-neutral-500 focus:outline-0 focus-visible:outline focus-visible:outline-neutral-900 dark:border-neutral-600 dark:bg-neutral-800 dark:text-neutral-100 dark:placeholder-neutral-500 dark:focus:border-neutral-500 dark:focus-visible:outline-neutral-100"
                            />
                        </div>
                        <div>
                            <label for="max-price" class="sr-only">Maximum price</label>
                            <input
                                type="number"
                                id="max-price"
                                placeholder="Max"
                                class="block w-full rounded-lg border border-neutral-300 bg-white px-3 py-2 text-sm text-neutral-900 placeholder-neutral-400 focus:border-neutral-500 focus:outline-0 focus-visible:outline focus-visible:outline-neutral-900 dark:border-neutral-600 dark:bg-neutral-800 dark:text-neutral-100 dark:placeholder-neutral-500 dark:focus:border-neutral-500 dark:focus-visible:outline-neutral-100"
                            />
                        </div>
                    </div>
                </div>

                <!-- Rating Filter -->
                <div class="py-4">
                    <h3 class="text-sm font-medium text-neutral-900 dark:text-neutral-50">Rating</h3>
                    <div class="mt-3 space-y-2">
                        <label
                            class="flex cursor-pointer items-center gap-3 rounded-lg border p-3 transition-all duration-150 has-[:focus-visible]:outline has-[:focus-visible]:outline-2 has-[:focus-visible]:outline-offset-2 has-[:focus-visible]:outline-neutral-900 dark:has-[:focus-visible]:outline-neutral-100"
                            :class="rating === 'any'
                                ? 'border-neutral-900 bg-neutral-50 dark:border-neutral-50 dark:bg-neutral-800'
                                : 'border-neutral-200 hover:border-neutral-300 hover:bg-neutral-50 dark:border-neutral-700 dark:hover:border-neutral-600 dark:hover:bg-neutral-800'"
                        >
                            <input
                                type="radio"
                                name="rating"
                                value="any"
                                x-model="rating"
                                class="sr-only focus:outline-none"
                            />
                            <span
                                class="flex h-4 w-4 shrink-0 items-center justify-center rounded-full border-2 transition-colors"
                                :class="rating === 'any'
                                    ? 'border-neutral-900 dark:border-neutral-50'
                                    : 'border-neutral-300 dark:border-neutral-600'"
                            >
                                <span
                                    x-show="rating === 'any'"
                                    class="h-2 w-2 rounded-full bg-neutral-900 dark:bg-neutral-50"
                                ></span>
                            </span>
                            <span class="text-sm font-medium text-neutral-700 dark:text-neutral-300">Any rating</span>
                        </label>
                        <label
                            class="flex cursor-pointer items-center gap-3 rounded-lg border p-3 transition-all duration-150 has-[:focus-visible]:outline has-[:focus-visible]:outline-2 has-[:focus-visible]:outline-offset-2 has-[:focus-visible]:outline-neutral-900 dark:has-[:focus-visible]:outline-neutral-100"
                            :class="rating === '4plus'
                                ? 'border-neutral-900 bg-neutral-50 dark:border-neutral-50 dark:bg-neutral-800'
                                : 'border-neutral-200 hover:border-neutral-300 hover:bg-neutral-50 dark:border-neutral-700 dark:hover:border-neutral-600 dark:hover:bg-neutral-800'"
                        >
                            <input
                                type="radio"
                                name="rating"
                                value="4plus"
                                x-model="rating"
                                class="sr-only focus:outline-none"
                            />
                            <span
                                class="flex h-4 w-4 shrink-0 items-center justify-center rounded-full border-2 transition-colors"
                                :class="rating === '4plus'
                                    ? 'border-neutral-900 dark:border-neutral-50'
                                    : 'border-neutral-300 dark:border-neutral-600'"
                            >
                                <span
                                    x-show="rating === '4plus'"
                                    class="h-2 w-2 rounded-full bg-neutral-900 dark:bg-neutral-50"
                                ></span>
                            </span>
                            <span
                                class="flex items-center gap-1 text-sm font-medium text-neutral-700 dark:text-neutral-300"
                            >
                                4+ stars
                                <svg class="h-4 w-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                    />
                                </svg>
                            </span>
                        </label>
                        <label
                            class="flex cursor-pointer items-center gap-3 rounded-lg border p-3 transition-all duration-150 has-[:focus-visible]:outline has-[:focus-visible]:outline-2 has-[:focus-visible]:outline-offset-2 has-[:focus-visible]:outline-neutral-900 dark:has-[:focus-visible]:outline-neutral-100"
                            :class="rating === '3plus'
                                ? 'border-neutral-900 bg-neutral-50 dark:border-neutral-50 dark:bg-neutral-800'
                                : 'border-neutral-200 hover:border-neutral-300 hover:bg-neutral-50 dark:border-neutral-700 dark:hover:border-neutral-600 dark:hover:bg-neutral-800'"
                        >
                            <input type="radio" name="rating" value="3plus" x-model="rating" class="sr-only" />
                            <span
                                class="flex h-4 w-4 shrink-0 items-center justify-center rounded-full border-2 transition-colors"
                                :class="rating === '3plus'
                                    ? 'border-neutral-900 dark:border-neutral-50'
                                    : 'border-neutral-300 dark:border-neutral-600'"
                            >
                                <span
                                    x-show="rating === '3plus'"
                                    class="h-2 w-2 rounded-full bg-neutral-900 dark:bg-neutral-50"
                                ></span>
                            </span>
                            <span
                                class="flex items-center gap-1 text-sm font-medium text-neutral-700 dark:text-neutral-300"
                            >
                                3+ stars
                                <svg class="h-4 w-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                    />
                                </svg>
                            </span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Footer Actions -->
            <div class="flex gap-3 border-t border-neutral-200 p-4 dark:border-neutral-800">
                <button
                    @click="categories = []; rating = ''"
                    type="button"
                    class="flex-1 rounded-lg bg-neutral-100 px-4 py-2.5 text-sm font-medium text-neutral-700 transition-colors hover:bg-neutral-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:bg-neutral-800 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus-visible:outline-neutral-100"
                >
                    Clear all
                </button>
                <button
                    @click="open = false"
                    type="button"
                    class="flex-1 rounded-lg bg-neutral-900 px-4 py-2.5 text-sm font-medium text-white transition-all duration-150 hover:bg-neutral-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 active:scale-[0.98] dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100 dark:focus-visible:outline-neutral-100"
                >
                    Apply filters
                </button>
            </div>
        </div>
    </div>
</div>

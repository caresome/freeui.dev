---
slug: spotlight-search-minimal
title: Spotlight Search Minimal
category: command-search
github: caresome
dependencies:
    - '@alpinejs/focus https://cdn.jsdelivr.net/npm/@alpinejs/focus@3.x.x/dist/cdn.min.js'
publish_at: 2025-12-15 12:00:00
---

<div data-preview-only class="flex min-h-[400px] items-start justify-center p-8">
    <div
        x-data="{
            open: true,
            search: '',
            close() {
                this.open = false;
                this.search = '';
            }
        }"
        @keydown.meta.k.window.prevent="open = true"
        @keydown.ctrl.k.window.prevent="open = true"
        class="relative w-full max-w-md"
    >
        <!-- Trigger Button -->
        <button
            @click="open = true"
            type="button"
            class="flex w-full items-center gap-3 rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-400 transition-colors hover:bg-neutral-50 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:border-neutral-700 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:focus-visible:outline-neutral-100"
        >
            <svg
                class="h-5 w-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
                aria-hidden="true"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                />
            </svg>
            <span>Quick search...</span>
            <kbd
                class="ml-auto rounded border border-neutral-200 bg-neutral-100 px-2 py-0.5 text-xs font-medium dark:border-neutral-600 dark:bg-neutral-700"
            >
                ⌘K
            </kbd>
        </button>

        <!-- Modal Backdrop -->
        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click="close()"
            class="fixed inset-0 z-40 bg-neutral-900/50 backdrop-blur-sm"
            aria-hidden="true"
            x-cloak
        ></div>

        <!-- Search Modal -->
        <div
            x-show="open"
            x-trap.inert.noscroll="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            @keydown.escape.prevent="close()"
            class="fixed top-[25%] left-1/2 z-50 w-full max-w-lg -translate-x-1/2"
            role="dialog"
            aria-modal="true"
            aria-label="Search"
            x-cloak
        >
            <div
                class="overflow-hidden rounded-2xl border border-neutral-200 bg-white shadow-2xl dark:border-neutral-700 dark:bg-neutral-800"
            >
                <div class="flex items-center px-4">
                    <svg
                        class="h-6 w-6 shrink-0 text-neutral-400"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                        aria-hidden="true"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                        />
                    </svg>
                    <input
                        x-model="search"
                        type="text"
                        placeholder="Search anything..."
                        class="h-16 w-full border-0 bg-transparent px-4 text-base text-neutral-900 placeholder-neutral-400 focus:ring-0 focus:outline-none dark:text-neutral-50 dark:placeholder-neutral-500"
                    />
                    <button
                        @click="close()"
                        type="button"
                        class="rounded-lg p-2 text-neutral-400 transition-colors hover:bg-neutral-100 hover:text-neutral-600 dark:hover:bg-neutral-700 dark:hover:text-neutral-300"
                        aria-label="Close search"
                    >
                        <svg
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            aria-hidden="true"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Hint text -->
            <p class="mt-3 text-center text-xs text-neutral-400 dark:text-neutral-500">
                Press
                <kbd
                    class="rounded border border-neutral-300 bg-neutral-100 px-1 py-0.5 font-medium dark:border-neutral-600 dark:bg-neutral-700"
                >
                    Esc
                </kbd>
                to close
            </p>
        </div>
    </div>
</div>

---
slug: slide-over-simple
title: Slide Over Simple
category: overlays
github: caresome
dependencies:
    - '@alpinejs/focus https://cdn.jsdelivr.net/npm/@alpinejs/focus@3.x.x/dist/cdn.min.js'
publish_at: 2025-12-14 11:35:00
---

<div data-preview-only class="flex min-h-[400px] items-center justify-center p-4">
    <div x-data="{ open: false }" @keydown.escape.window="if (open) { open = false; $refs.trigger.focus(); }">
        <!-- Trigger Button -->
        <button
            x-ref="trigger"
            @click="open = true"
            type="button"
            class="inline-flex items-center gap-2 rounded-lg bg-neutral-900 px-4 py-2.5 text-sm font-medium text-white shadow-sm transition-all duration-150 hover:bg-neutral-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 active:scale-[0.98] dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100 dark:focus-visible:outline-neutral-100"
        >
            Open Slide Over
        </button>

        <!-- Backdrop -->
        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click="open = false; $refs.trigger.focus();"
            class="fixed inset-0 z-40 bg-neutral-900/50"
            aria-hidden="true"
            x-cloak
        ></div>

        <!-- Slide Over Panel -->
        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full"
            x-trap.inert.noscroll="open"
            class="fixed inset-y-0 right-0 z-50 flex w-full max-w-md flex-col bg-white shadow-xl dark:bg-neutral-900"
            role="dialog"
            aria-modal="true"
            aria-labelledby="slide-over-title"
            x-cloak
        >
            <!-- Header -->
            <div
                class="flex items-center justify-between border-b border-neutral-200 px-6 py-4 dark:border-neutral-800"
            >
                <h2 id="slide-over-title" class="text-lg font-semibold text-neutral-900 dark:text-neutral-50">
                    Panel Title
                </h2>
                <button
                    @click="open = false; $refs.trigger.focus();"
                    type="button"
                    class="-m-2 rounded-lg p-2 text-neutral-400 transition-colors hover:bg-neutral-100 hover:text-neutral-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-neutral-900 dark:hover:bg-neutral-800 dark:hover:text-neutral-300 dark:focus-visible:outline-neutral-100"
                    aria-label="Close panel"
                >
                    <svg
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                        aria-hidden="true"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Content -->
            <div class="min-h-0 flex-1 overflow-y-auto p-6">
                <p class="text-sm text-neutral-600 dark:text-neutral-400">
                    This is a simple slide-over panel that appears from the right side of the screen. It's perfect for
                    displaying additional details, settings, or secondary content without navigating away from the
                    current page.
                </p>

                <div class="mt-6 space-y-4">
                    <div class="rounded-lg border border-neutral-200 p-4 dark:border-neutral-800">
                        <h4 class="text-sm font-medium text-neutral-900 dark:text-neutral-50">Section 1</h4>
                        <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">
                            Content for the first section goes here.
                        </p>
                    </div>
                    <div class="rounded-lg border border-neutral-200 p-4 dark:border-neutral-800">
                        <h4 class="text-sm font-medium text-neutral-900 dark:text-neutral-50">Section 2</h4>
                        <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">
                            Content for the second section goes here.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="flex shrink-0 justify-end gap-3 border-t border-neutral-200 px-6 py-4 dark:border-neutral-800">
                <button
                    @click="open = false; $refs.trigger.focus();"
                    type="button"
                    class="rounded-lg px-4 py-2 text-sm font-medium text-neutral-700 transition-colors hover:bg-neutral-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus-visible:outline-neutral-100"
                >
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

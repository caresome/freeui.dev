---
slug: modal-simple
title: Modal Simple
category: overlays
github: caresome
dependencies:
    - '@alpinejs/focus https://cdn.jsdelivr.net/npm/@alpinejs/focus@3.x.x/dist/cdn.min.js'
publish_at: 2025-12-14 00:00:00
---

<div data-preview-only class="flex min-h-[400px] items-center justify-center p-4">
    <div x-data="{ open: false }" @keydown.escape.window="if (open) { open = false; $refs.trigger.focus(); }">
        <!-- Trigger Button -->
        <button
            x-ref="trigger"
            @click="open = true"
            type="button"
            class="inline-flex items-center gap-2 rounded-lg bg-neutral-900 px-4 py-2.5 text-sm font-medium text-white shadow-sm transition-all duration-150 hover:bg-neutral-800 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-offset-2 active:scale-[0.98] dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100 dark:focus-visible:ring-neutral-100"
        >
            Open Modal
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
            @click="open = false; $refs.trigger.focus();"
            class="fixed inset-0 z-40 bg-neutral-900/50 backdrop-blur-sm"
            aria-hidden="true"
            x-cloak
        ></div>

        <!-- Modal Panel -->
        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="fixed inset-0 z-50 flex items-center justify-center p-4"
            x-cloak
        >
            <div
                x-trap.inert.noscroll="open"
                @click.stop
                class="w-full max-w-md rounded-xl border border-neutral-200 bg-white p-6 shadow-xl dark:border-neutral-700 dark:bg-neutral-800"
                role="dialog"
                aria-modal="true"
                aria-labelledby="modal-title"
            >
                <!-- Header -->
                <div class="flex items-start justify-between">
                    <h3 id="modal-title" class="text-lg font-semibold text-neutral-900 dark:text-neutral-50">
                        Modal Title
                    </h3>
                    <button
                        @click="open = false; $refs.trigger.focus();"
                        type="button"
                        class="-m-1 rounded-lg p-1 text-neutral-400 transition-colors hover:bg-neutral-100 hover:text-neutral-600 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus-visible:ring-neutral-100"
                        aria-label="Close modal"
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
                <div class="mt-4">
                    <p class="text-sm text-neutral-600 dark:text-neutral-400">
                        This is a simple modal component. You can put any content here, including text, forms, images,
                        or other components. The modal includes smooth animations and accessibility features.
                    </p>
                </div>

                <!-- Footer -->
                <div class="mt-6 flex justify-end gap-3">
                    <button
                        @click="open = false; $refs.trigger.focus();"
                        type="button"
                        class="rounded-lg px-4 py-2 text-sm font-medium text-neutral-700 transition-colors hover:bg-neutral-100 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-offset-2 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus-visible:ring-neutral-100"
                    >
                        Cancel
                    </button>
                    <button
                        @click="open = false; $refs.trigger.focus();"
                        type="button"
                        class="rounded-lg bg-neutral-900 px-4 py-2 text-sm font-medium text-white transition-all duration-150 hover:bg-neutral-800 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-offset-2 active:scale-[0.98] dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100 dark:focus-visible:ring-neutral-100"
                    >
                        Confirm
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

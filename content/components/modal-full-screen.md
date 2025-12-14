---
slug: modal-full-screen
title: Modal Full Screen
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
            class="inline-flex items-center gap-2 rounded-lg bg-neutral-900 px-4 py-2.5 text-sm font-medium text-white shadow-sm transition-all duration-150 hover:bg-neutral-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 active:scale-[0.98] dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100 dark:focus-visible:outline-neutral-100"
        >
            <svg
                class="h-4 w-4"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
                aria-hidden="true"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9M3.75 20.25v-4.5m0 4.5h4.5m-4.5 0L9 15M20.25 3.75h-4.5m4.5 0v4.5m0-4.5L15 9m5.25 11.25h-4.5m4.5 0v-4.5m0 4.5L15 15"
                />
            </svg>
            Open Full Screen
        </button>

        <!-- Modal -->
        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            x-trap.inert.noscroll="open"
            class="fixed inset-0 z-50 flex flex-col bg-white dark:bg-neutral-900"
            role="dialog"
            aria-modal="true"
            aria-labelledby="fullscreen-modal-title"
            x-cloak
        >
            <!-- Header -->
            <header
                class="flex shrink-0 items-center justify-between border-b border-neutral-200 px-4 py-3 sm:px-6 dark:border-neutral-800"
            >
                <div class="flex items-center gap-4">
                    <button
                        @click="open = false; $refs.trigger.focus();"
                        type="button"
                        class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-neutral-500 transition-colors hover:bg-neutral-100 hover:text-neutral-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:outline-neutral-100"
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
                    <h2 id="fullscreen-modal-title" class="text-lg font-semibold text-neutral-900 dark:text-neutral-50">
                        Full Screen Modal
                    </h2>
                </div>
                <div class="flex items-center gap-2">
                    <button
                        type="button"
                        class="rounded-lg px-4 py-2 text-sm font-medium text-neutral-700 transition-colors hover:bg-neutral-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus-visible:outline-neutral-100"
                    >
                        Draft
                    </button>
                    <button
                        @click="open = false; $refs.trigger.focus();"
                        type="button"
                        class="rounded-lg bg-neutral-900 px-4 py-2 text-sm font-medium text-white transition-all duration-150 hover:bg-neutral-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 active:scale-[0.98] dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100 dark:focus-visible:outline-neutral-100"
                    >
                        Publish
                    </button>
                </div>
            </header>

            <!-- Content -->
            <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8">
                <div class="mx-auto max-w-3xl">
                    <div
                        class="rounded-xl border border-neutral-200 bg-neutral-50 p-8 text-center dark:border-neutral-800 dark:bg-neutral-800/50"
                    >
                        <div
                            class="mx-auto flex h-16 w-16 items-center justify-center rounded-xl bg-neutral-100 dark:bg-neutral-700"
                            aria-hidden="true"
                        >
                            <svg
                                class="h-8 w-8 text-neutral-400"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"
                                />
                            </svg>
                        </div>
                        <h3 class="mt-4 text-base font-semibold text-neutral-900 dark:text-neutral-50">
                            Your content goes here
                        </h3>
                        <p class="mt-2 text-sm text-neutral-500 dark:text-neutral-400">
                            This full-screen modal is perfect for complex editing experiences, document previews, or
                            immersive content that requires the user's full attention.
                        </p>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>

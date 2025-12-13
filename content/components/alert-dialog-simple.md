---
slug: alert-dialog-simple
title: Alert Dialog Simple
category: overlays
github: caresome
dependencies:
    - '@alpinejs/focus https://cdn.jsdelivr.net/npm/@alpinejs/focus@3.x.x/dist/cdn.min.js'
publish_at: 2025-12-14 00:00:00
---

<div data-preview-only class="flex min-h-[400px] items-center justify-center p-4">
    <div x-data="{ open: false }" @keydown.escape.window="if (open) { open = false; $refs.trigger.focus(); }">
        <button
            x-ref="trigger"
            @click="open = true"
            type="button"
            class="inline-flex items-center gap-2 rounded-lg bg-neutral-900 px-4 py-2.5 text-sm font-medium text-white shadow-sm transition-all hover:bg-neutral-800 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-offset-2 active:scale-[0.98] dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100 dark:focus-visible:ring-neutral-100"
        >
            Show Alert
        </button>

        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click="open = false; $refs.trigger.focus();"
            class="fixed inset-0 z-40 bg-neutral-900/50 backdrop-blur-sm"
            aria-hidden="true"
            x-cloak
        ></div>

        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="fixed inset-0 z-50 flex items-center justify-center p-4"
            x-cloak
        >
            <div
                x-trap.inert.noscroll="open"
                @click.stop
                class="w-full max-w-sm rounded-xl border border-neutral-200 bg-white p-6 shadow-xl dark:border-neutral-700 dark:bg-neutral-800"
                role="alertdialog"
                aria-modal="true"
                aria-labelledby="alert-simple-title"
                aria-describedby="alert-simple-desc"
            >
                <div
                    class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-blue-100 dark:bg-blue-500/10"
                    aria-hidden="true"
                >
                    <svg
                        class="h-6 w-6 text-blue-600 dark:text-blue-400"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z"
                        />
                    </svg>
                </div>

                <div class="mt-4 text-center">
                    <h3 id="alert-simple-title" class="text-lg font-semibold text-neutral-900 dark:text-neutral-50">
                        Session Expired
                    </h3>
                    <p id="alert-simple-desc" class="mt-2 text-sm text-neutral-600 dark:text-neutral-400">
                        Your session has expired. Please log in again to continue.
                    </p>
                </div>

                <div class="mt-6">
                    <button
                        @click="open = false; $refs.trigger.focus();"
                        type="button"
                        class="w-full rounded-lg bg-neutral-900 px-4 py-2.5 text-sm font-medium text-white transition-all hover:bg-neutral-800 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-offset-2 active:scale-[0.98] dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100 dark:focus-visible:ring-neutral-100"
                    >
                        Log in again
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

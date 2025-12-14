---
slug: alert-dialog-destructive
title: Alert Dialog Destructive
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
            class="inline-flex items-center gap-2 rounded-lg bg-red-600 px-4 py-2.5 text-sm font-medium text-white shadow-sm transition-all hover:bg-red-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600 active:scale-[0.98]"
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
                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"
                />
            </svg>
            Delete Account
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
                aria-labelledby="alert-destructive-title"
                aria-describedby="alert-destructive-desc"
            >
                <div
                    class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-red-100 dark:bg-red-500/10"
                    aria-hidden="true"
                >
                    <svg
                        class="h-6 w-6 text-red-600 dark:text-red-400"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"
                        />
                    </svg>
                </div>

                <div class="mt-4 text-center">
                    <h3
                        id="alert-destructive-title"
                        class="text-lg font-semibold text-neutral-900 dark:text-neutral-50"
                    >
                        Delete Account?
                    </h3>
                    <p id="alert-destructive-desc" class="mt-2 text-sm text-neutral-600 dark:text-neutral-400">
                        This action is permanent and cannot be undone. All your data, including projects, files, and
                        settings, will be permanently deleted.
                    </p>
                </div>

                <div class="mt-6 flex gap-3">
                    <button
                        @click="open = false; $refs.trigger.focus();"
                        type="button"
                        class="flex-1 rounded-lg border border-neutral-300 bg-white px-4 py-2.5 text-sm font-medium text-neutral-700 transition-colors hover:bg-neutral-50 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:border-neutral-600 dark:bg-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-600 dark:focus-visible:outline-neutral-100"
                    >
                        Cancel
                    </button>
                    <button
                        @click="open = false; $refs.trigger.focus();"
                        type="button"
                        class="flex-1 rounded-lg bg-red-600 px-4 py-2.5 text-sm font-medium text-white transition-all hover:bg-red-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600 active:scale-[0.98]"
                    >
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

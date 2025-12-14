---
slug: sheet-simple
title: Sheet Simple
category: overlays
github: caresome
dependencies:
    - '@alpinejs/focus https://cdn.jsdelivr.net/npm/@alpinejs/focus@3.x.x/dist/cdn.min.js'
publish_at: 2025-12-14 00:00:00
---

<div data-preview-only class="flex min-h-[500px] items-end justify-center p-4">
    <div
        x-data="{ open: false }"
        @keydown.escape.window="if (open) { open = false; $refs.trigger.focus(); }"
        class="w-full max-w-md"
    >
        <!-- Trigger Button -->
        <button
            x-ref="trigger"
            @click="open = true"
            type="button"
            class="mx-auto flex items-center gap-2 rounded-lg bg-neutral-900 px-4 py-2.5 text-sm font-medium text-white shadow-sm transition-all duration-150 hover:bg-neutral-800 focus-visible:outline focus-visible:outline-1 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 active:scale-[0.98] dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100 dark:focus-visible:outline-neutral-100"
        >
            Open Sheet
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

        <!-- Sheet Panel (Bottom) -->
        <div
            x-show="open"
            x-transition:enter="transition transform ease-out duration-200"
            x-transition:enter-start="translate-y-full"
            x-transition:enter-end="translate-y-0"
            x-transition:leave="transition transform ease-in duration-150"
            x-transition:leave-start="translate-y-0"
            x-transition:leave-end="translate-y-full"
            x-trap.inert.noscroll="open"
            class="fixed inset-x-0 bottom-0 z-50 rounded-t-2xl border-t border-neutral-200 bg-white shadow-xl dark:border-neutral-700 dark:bg-neutral-900"
            role="dialog"
            aria-modal="true"
            aria-labelledby="sheet-title"
            x-cloak
        >
            <!-- Handle -->
            <div class="flex justify-center pt-3">
                <div class="h-1.5 w-12 rounded-full bg-neutral-300 dark:bg-neutral-700"></div>
            </div>

            <!-- Content -->
            <div class="p-6">
                <h2 id="sheet-title" class="text-lg font-semibold text-neutral-900 dark:text-neutral-50">
                    Sheet Title
                </h2>
                <p class="mt-2 text-sm text-neutral-600 dark:text-neutral-400">
                    This is a simple bottom sheet component. It slides up from the bottom of the screen and is commonly
                    used for mobile-friendly interactions like action menus or quick forms.
                </p>

                <div class="mt-6 space-y-3">
                    <button
                        type="button"
                        class="flex w-full items-center gap-3 rounded-lg px-4 py-3 text-left text-sm font-medium text-neutral-700 transition-colors hover:bg-neutral-100 dark:text-neutral-300 dark:hover:bg-neutral-800"
                    >
                        <svg
                            class="h-5 w-5 text-neutral-400"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z"
                            />
                        </svg>
                        Upload Photo
                    </button>
                    <button
                        type="button"
                        class="flex w-full items-center gap-3 rounded-lg px-4 py-3 text-left text-sm font-medium text-neutral-700 transition-colors hover:bg-neutral-100 dark:text-neutral-300 dark:hover:bg-neutral-800"
                    >
                        <svg
                            class="h-5 w-5 text-neutral-400"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z"
                            />
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z"
                            />
                        </svg>
                        Take Photo
                    </button>
                    <button
                        type="button"
                        class="flex w-full items-center gap-3 rounded-lg px-4 py-3 text-left text-sm font-medium text-neutral-700 transition-colors hover:bg-neutral-100 dark:text-neutral-300 dark:hover:bg-neutral-800"
                    >
                        <svg
                            class="h-5 w-5 text-neutral-400"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"
                            />
                        </svg>
                        Choose File
                    </button>
                </div>

                <button
                    @click="open = false; $refs.trigger.focus();"
                    type="button"
                    class="mt-6 w-full rounded-lg bg-neutral-100 px-4 py-3 text-sm font-medium text-neutral-700 transition-colors hover:bg-neutral-200 dark:bg-neutral-800 dark:text-neutral-300 dark:hover:bg-neutral-700"
                >
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>

---
slug: modal-with-form
title: Modal With Form
category: overlays
github: caresome
dependencies:
    - '@alpinejs/focus https://cdn.jsdelivr.net/npm/@alpinejs/focus@3.x.x/dist/cdn.min.js'
publish_at: 2025-12-14 00:00:00
---

<div data-preview-only class="flex min-h-[500px] items-center justify-center p-4">
    <div
        x-data="{ open: false, loading: false }"
        @keydown.escape.window="if (open) { open = false; $refs.trigger.focus(); }"
    >
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
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Add New Item
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
                class="w-full max-w-md rounded-xl border border-neutral-200 bg-white shadow-xl dark:border-neutral-700 dark:bg-neutral-800"
                role="dialog"
                aria-modal="true"
                aria-labelledby="form-modal-title"
            >
                <!-- Header -->
                <div
                    class="flex items-center justify-between border-b border-neutral-200 px-6 py-4 dark:border-neutral-700"
                >
                    <h3 id="form-modal-title" class="text-lg font-semibold text-neutral-900 dark:text-neutral-50">
                        Create New Item
                    </h3>
                    <button
                        @click="open = false; $refs.trigger.focus();"
                        type="button"
                        class="-m-1 rounded-lg p-1 text-neutral-400 transition-colors hover:bg-neutral-100 hover:text-neutral-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-neutral-900 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus-visible:outline-neutral-100"
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

                <!-- Form Content -->
                <form
                    @submit.prevent="loading = true; setTimeout(() => { loading = false; open = false; $refs.trigger.focus(); }, 1500)"
                    class="p-6"
                >
                    <div class="space-y-4">
                        <!-- Name Field -->
                        <div>
                            <label
                                for="item-name"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-300"
                            >
                                Name
                            </label>
                            <input
                                type="text"
                                id="item-name"
                                placeholder="Enter item name"
                                class="mt-1.5 block w-full rounded-lg border border-neutral-300 bg-white px-3 py-2 text-sm text-neutral-900 placeholder-neutral-400 transition-colors focus:border-neutral-500 focus:outline-0 focus-visible:outline focus-visible:outline-neutral-900 dark:border-neutral-600 dark:bg-neutral-700 dark:text-neutral-100 dark:placeholder-neutral-500 dark:focus:border-neutral-500 dark:focus-visible:outline-neutral-100"
                                required
                            />
                        </div>

                        <!-- Email Field -->
                        <div>
                            <label
                                for="item-email"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-300"
                            >
                                Email
                            </label>
                            <input
                                type="email"
                                id="item-email"
                                placeholder="you@example.com"
                                class="mt-1.5 block w-full rounded-lg border border-neutral-300 bg-white px-3 py-2 text-sm text-neutral-900 placeholder-neutral-400 transition-colors focus:border-neutral-500 focus:outline-0 focus-visible:outline focus-visible:outline-neutral-900 dark:border-neutral-600 dark:bg-neutral-700 dark:text-neutral-100 dark:placeholder-neutral-500 dark:focus:border-neutral-500 dark:focus-visible:outline-neutral-100"
                            />
                        </div>

                        <!-- Description Field -->
                        <div>
                            <label
                                for="item-description"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-300"
                            >
                                Description
                            </label>
                            <textarea
                                id="item-description"
                                rows="3"
                                placeholder="Add a description..."
                                class="mt-1.5 block w-full resize-none rounded-lg border border-neutral-300 bg-white px-3 py-2 text-sm text-neutral-900 placeholder-neutral-400 transition-colors focus:border-neutral-500 focus:outline-0 focus-visible:outline focus-visible:outline-neutral-900 dark:border-neutral-600 dark:bg-neutral-700 dark:text-neutral-100 dark:placeholder-neutral-500 dark:focus:border-neutral-500 dark:focus-visible:outline-neutral-100"
                            ></textarea>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="mt-6 flex justify-end gap-3">
                        <button
                            @click="open = false; $refs.trigger.focus();"
                            type="button"
                            class="rounded-lg px-4 py-2 text-sm font-medium text-neutral-700 transition-colors hover:bg-neutral-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus-visible:outline-neutral-100"
                        >
                            Cancel
                        </button>
                        <button
                            type="submit"
                            :disabled="loading"
                            :aria-busy="loading"
                            class="inline-flex items-center gap-2 rounded-lg bg-neutral-900 px-4 py-2 text-sm font-medium text-white transition-all duration-150 hover:bg-neutral-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 disabled:cursor-not-allowed disabled:opacity-50 dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100 dark:focus-visible:outline-neutral-100"
                        >
                            <svg
                                x-show="loading"
                                class="h-4 w-4 animate-spin"
                                fill="none"
                                viewBox="0 0 24 24"
                                aria-hidden="true"
                            >
                                <circle
                                    class="opacity-25"
                                    cx="12"
                                    cy="12"
                                    r="10"
                                    stroke="currentColor"
                                    stroke-width="4"
                                ></circle>
                                <path
                                    class="opacity-75"
                                    fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                                ></path>
                            </svg>
                            <span x-text="loading ? 'Creating...' : 'Create Item'"></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

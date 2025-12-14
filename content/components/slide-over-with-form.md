---
slug: slide-over-with-form
title: Slide Over With Form
category: overlays
github: caresome
dependencies:
    - '@alpinejs/focus https://cdn.jsdelivr.net/npm/@alpinejs/focus@3.x.x/dist/cdn.min.js'
publish_at: 2025-12-14 11:30:00
---

<div data-preview-only class="flex min-h-[400px] items-center justify-center p-4">
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
            Add Contact
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

        <!-- Slide Over Panel -->
        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full"
            x-trap.inert.noscroll="open"
            class="fixed inset-y-0 right-0 z-50 flex w-full max-w-md flex-col bg-white shadow-xl dark:bg-neutral-900"
            role="dialog"
            aria-modal="true"
            aria-labelledby="slide-form-title"
            x-cloak
        >
            <!-- Header -->
            <div
                class="flex items-center justify-between border-b border-neutral-200 px-6 py-4 dark:border-neutral-800"
            >
                <div>
                    <h2 id="slide-form-title" class="text-lg font-semibold text-neutral-900 dark:text-neutral-50">
                        New Contact
                    </h2>
                    <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">
                        Fill in the details below to add a new contact.
                    </p>
                </div>
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

            <!-- Form Content -->
            <form
                @submit.prevent="loading = true; setTimeout(() => { loading = false; open = false; $refs.trigger.focus(); }, 1500)"
                class="flex min-h-0 flex-1 flex-col"
            >
                <div class="min-h-0 flex-1 overflow-y-auto px-6 py-4">
                    <div class="space-y-5">
                        <!-- Avatar -->
                        <div class="flex items-center gap-4">
                            <div
                                class="flex h-16 w-16 items-center justify-center rounded-full bg-neutral-100 dark:bg-neutral-800"
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
                                        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"
                                    />
                                </svg>
                            </div>
                            <button
                                type="button"
                                class="text-sm font-medium text-neutral-900 hover:underline dark:text-neutral-100"
                            >
                                Upload photo
                            </button>
                        </div>

                        <!-- First Name -->
                        <div>
                            <label
                                for="first-name"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-300"
                            >
                                First name
                            </label>
                            <input
                                type="text"
                                id="first-name"
                                autocomplete="given-name"
                                class="mt-1.5 block w-full rounded-lg border border-neutral-300 bg-white px-3 py-2 text-sm text-neutral-900 placeholder-neutral-400 transition-colors focus:border-neutral-500 focus:outline-0 focus-visible:outline focus-visible:outline-neutral-900 dark:border-neutral-600 dark:bg-neutral-800 dark:text-neutral-100 dark:placeholder-neutral-500 dark:focus:border-neutral-500 dark:focus-visible:outline-neutral-100"
                            />
                        </div>

                        <!-- Last Name -->
                        <div>
                            <label
                                for="last-name"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-300"
                            >
                                Last name
                            </label>
                            <input
                                type="text"
                                id="last-name"
                                autocomplete="family-name"
                                class="mt-1.5 block w-full rounded-lg border border-neutral-300 bg-white px-3 py-2 text-sm text-neutral-900 placeholder-neutral-400 transition-colors focus:border-neutral-500 focus:outline-0 focus-visible:outline focus-visible:outline-neutral-900 dark:border-neutral-600 dark:bg-neutral-800 dark:text-neutral-100 dark:placeholder-neutral-500 dark:focus:border-neutral-500 dark:focus-visible:outline-neutral-100"
                            />
                        </div>

                        <!-- Email -->
                        <div>
                            <label
                                for="contact-email"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-300"
                            >
                                Email
                            </label>
                            <input
                                type="email"
                                id="contact-email"
                                autocomplete="email"
                                class="mt-1.5 block w-full rounded-lg border border-neutral-300 bg-white px-3 py-2 text-sm text-neutral-900 placeholder-neutral-400 transition-colors focus:border-neutral-500 focus:outline-0 focus-visible:outline dark:border-neutral-600 dark:bg-neutral-800 dark:text-neutral-100 dark:placeholder-neutral-500 dark:focus:border-neutral-500"
                            />
                        </div>

                        <!-- Phone -->
                        <div>
                            <label for="phone" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300">
                                Phone
                            </label>
                            <input
                                type="tel"
                                id="phone"
                                autocomplete="tel"
                                class="mt-1.5 block w-full rounded-lg border border-neutral-300 bg-white px-3 py-2 text-sm text-neutral-900 placeholder-neutral-400 transition-colors focus:border-neutral-500 focus:outline-0 focus-visible:outline dark:border-neutral-600 dark:bg-neutral-800 dark:text-neutral-100 dark:placeholder-neutral-500 dark:focus:border-neutral-500"
                            />
                        </div>

                        <!-- Notes -->
                        <div>
                            <label for="notes" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300">
                                Notes
                            </label>
                            <textarea
                                id="notes"
                                rows="3"
                                class="mt-1.5 block w-full resize-none rounded-lg border border-neutral-300 bg-white px-3 py-2 text-sm text-neutral-900 placeholder-neutral-400 transition-colors focus:border-neutral-500 focus:outline-0 focus-visible:outline focus-visible:outline-neutral-900 dark:border-neutral-600 dark:bg-neutral-800 dark:text-neutral-100 dark:placeholder-neutral-500 dark:focus:border-neutral-500 dark:focus-visible:outline-neutral-100"
                            ></textarea>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div
                    class="flex shrink-0 justify-end gap-3 border-t border-neutral-200 px-6 py-4 dark:border-neutral-800"
                >
                    <button
                        @click="open = false; $refs.trigger.focus();"
                        type="button"
                        class="rounded-lg px-4 py-2 text-sm font-medium text-neutral-700 transition-colors hover:bg-neutral-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus-visible:outline-neutral-100"
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
                        <span x-text="loading ? 'Saving...' : 'Save Contact'"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

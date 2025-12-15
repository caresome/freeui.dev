---
slug: sheet-with-form
title: Sheet With Form
category: overlays
github: caresome
dependencies: ['@alpinejs/focus']
publish_at: 2025-12-14 10:05:00
---

<div data-preview-only class="flex min-h-[500px] items-end justify-center p-4">
    <div x-data="{ open: false, loading: false }" class="w-full max-w-md">
        <!-- Trigger Button -->
        <button
            x-ref="trigger"
            @click="open = true"
            type="button"
            class="mx-auto flex items-center gap-2 rounded-lg bg-neutral-900 px-4 py-2.5 text-sm font-medium text-white shadow-sm transition-all duration-150 hover:bg-neutral-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 active:scale-[0.98] dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100 dark:focus-visible:outline-neutral-100"
        >
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Quick Add
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
            @click="open = false; $refs.trigger.focus()"
            class="fixed inset-0 z-40 bg-neutral-900/50"
            x-cloak
        ></div>

        <!-- Sheet Panel -->
        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="translate-y-full"
            x-transition:enter-end="translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="translate-y-0"
            x-transition:leave-end="translate-y-full"
            @keydown.escape.window="open = false; $refs.trigger.focus()"
            x-trap.inert.noscroll="open"
            class="fixed inset-x-0 bottom-0 z-50 rounded-t-2xl border-t border-neutral-200 bg-white shadow-xl dark:border-neutral-700 dark:bg-neutral-900"
            role="dialog"
            aria-modal="true"
            aria-labelledby="sheet-form-title"
            x-cloak
        >
            <!-- Handle -->
            <div class="flex justify-center pt-3">
                <div class="h-1.5 w-12 rounded-full bg-neutral-300 dark:bg-neutral-700"></div>
            </div>

            <!-- Form -->
            <form
                @submit.prevent="loading = true; setTimeout(() => { loading = false; open = false; }, 1500)"
                class="p-6"
            >
                <div class="flex items-center justify-between">
                    <h2 id="sheet-form-title" class="text-lg font-semibold text-neutral-900 dark:text-neutral-50">
                        Quick Add Task
                    </h2>
                    <button
                        @click="open = false; $refs.trigger.focus()"
                        type="button"
                        class="-m-2 rounded-lg p-2 text-neutral-400 transition-colors duration-150 hover:bg-neutral-100 hover:text-neutral-600 focus-visible:outline focus-visible:outline-neutral-900 dark:hover:bg-neutral-800 dark:hover:text-neutral-300 dark:focus-visible:outline-neutral-100"
                        aria-label="Close"
                    >
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="mt-5 space-y-4">
                    <!-- Task Name -->
                    <div>
                        <label for="task-name" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300">
                            Task name
                        </label>
                        <input
                            type="text"
                            id="task-name"
                            placeholder="What needs to be done?"
                            class="mt-1.5 block w-full rounded-lg border border-neutral-300 bg-white px-3 py-2.5 text-sm text-neutral-900 placeholder-neutral-400 transition-colors focus:border-neutral-500 focus:outline-0 focus-visible:outline focus-visible:outline-neutral-900 dark:border-neutral-600 dark:bg-neutral-800 dark:text-neutral-100 dark:placeholder-neutral-500 dark:focus:border-neutral-500 dark:focus-visible:outline-neutral-100"
                        />
                    </div>

                    <!-- Due Date & Priority Row -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label
                                for="due-date"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-300"
                            >
                                Due date
                            </label>
                            <input
                                type="date"
                                id="due-date"
                                class="mt-1.5 block w-full rounded-lg border border-neutral-300 bg-white px-3 py-2.5 text-sm text-neutral-900 transition-colors focus:border-neutral-500 focus:outline-0 focus-visible:outline focus-visible:outline-neutral-900 dark:border-neutral-600 dark:bg-neutral-800 dark:text-neutral-100 dark:focus:border-neutral-500 dark:focus-visible:outline-neutral-100"
                            />
                        </div>
                        <div>
                            <label
                                for="priority"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-300"
                            >
                                Priority
                            </label>
                            <select
                                id="priority"
                                class="mt-1.5 block w-full rounded-lg border border-neutral-300 bg-white px-3 py-2.5 text-sm text-neutral-900 transition-colors focus:border-neutral-500 focus:outline-0 focus-visible:outline focus-visible:outline-neutral-900 dark:border-neutral-600 dark:bg-neutral-800 dark:text-neutral-100 dark:focus:border-neutral-500 dark:focus-visible:outline-neutral-100"
                            >
                                <option>Low</option>
                                <option>Medium</option>
                                <option selected>High</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="mt-6 flex gap-3">
                    <button
                        @click="open = false; $refs.trigger.focus()"
                        type="button"
                        class="flex-1 rounded-lg bg-neutral-100 px-4 py-3 text-sm font-medium text-neutral-700 transition-colors duration-150 hover:bg-neutral-200 dark:bg-neutral-800 dark:text-neutral-300 dark:hover:bg-neutral-700"
                    >
                        Cancel
                    </button>
                    <button
                        type="submit"
                        :disabled="loading"
                        class="flex flex-1 items-center justify-center gap-2 rounded-lg bg-neutral-900 px-4 py-3 text-sm font-medium text-white transition-all duration-150 hover:bg-neutral-800 disabled:cursor-not-allowed disabled:opacity-50 dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100"
                    >
                        <svg x-show="loading" class="h-4 w-4 animate-spin" fill="none" viewBox="0 0 24 24">
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
                        <span x-text="loading ? 'Adding...' : 'Add Task'"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

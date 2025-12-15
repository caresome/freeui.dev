---
slug: toast-stacked
title: Toast Stacked
category: feedback
github: caresome
dependencies: []
publish_at: 2025-12-14 00:31:00
---

<div data-preview-only class="flex min-h-[400px] items-center justify-center p-8">
    <div
        x-data="{
        toasts: [
            { id: 1, message: 'Changes saved', type: 'success' },
            { id: 2, message: 'New update available', type: 'info' }
        ],
        remove(id) {
            this.toasts = this.toasts.filter(t => t.id !== id);
        },
        add() {
            const id = Date.now();
            this.toasts.push({ id, message: 'Another notification', type: 'info' });
            setTimeout(() => this.remove(id), 5000);
        }
    }"
        class="relative h-64 w-full max-w-sm"
    >
        <!-- Trigger to show dynamic behavior -->
        <div class="absolute -top-16 left-1/2 -translate-x-1/2">
            <button
                @click="add()"
                type="button"
                class="rounded-lg bg-neutral-900 px-4 py-2.5 text-sm font-medium text-white shadow-sm transition-colors duration-150 hover:bg-neutral-800 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-offset-2 dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100 dark:focus-visible:ring-neutral-100"
            >
                Add Notification
            </button>
        </div>

        <div class="absolute right-0 bottom-0 flex w-full flex-col gap-2 p-4">
            <template x-for="toast in toasts" :key="toast.id">
                <div
                    x-show="true"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
                    x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
                    x-transition:leave="transition ease-in duration-100"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="flex items-center justify-between gap-3 rounded-xl border border-neutral-200 bg-white p-4 shadow-lg dark:border-neutral-700 dark:bg-neutral-800"
                    role="status"
                    aria-live="polite"
                >
                    <div class="flex items-center gap-3">
                        <template x-if="toast.type === 'success'">
                            <svg
                                class="h-5 w-5 text-green-600 dark:text-green-400"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                                aria-hidden="true"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </template>
                        <template x-if="toast.type === 'info'">
                            <svg
                                class="h-5 w-5 text-blue-600 dark:text-blue-400"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"
                                />
                            </svg>
                        </template>
                        <p class="text-sm font-medium text-neutral-900 dark:text-neutral-50" x-text="toast.message"></p>
                    </div>
                    <button
                        @click="remove(toast.id)"
                        type="button"
                        class="rounded-md p-1 text-neutral-400 transition-colors duration-150 hover:bg-neutral-100 hover:text-neutral-500 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 dark:text-neutral-500 dark:hover:bg-neutral-700 dark:hover:text-neutral-400 dark:focus-visible:ring-neutral-100"
                        aria-label="Close"
                    >
                        <svg
                            class="h-4 w-4"
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
            </template>
        </div>
    </div>
</div>

---
slug: slide-over-wide
title: Slide Over Wide
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
            View Details
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

        <!-- Slide Over Panel (Wide) -->
        <div
            x-show="open"
            x-transition:enter="transition transform ease-out duration-200"
            x-transition:enter-start="translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition transform ease-in duration-150"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full"
            x-trap.inert.noscroll="open"
            class="fixed inset-y-0 right-0 z-50 flex w-full max-w-2xl flex-col bg-white shadow-xl dark:bg-neutral-900"
            role="dialog"
            aria-modal="true"
            aria-labelledby="wide-slide-title"
            x-cloak
        >
            <!-- Header -->
            <div
                class="flex items-center justify-between border-b border-neutral-200 px-6 py-4 dark:border-neutral-800"
            >
                <div class="flex items-center gap-4">
                    <div
                        class="flex h-10 w-10 items-center justify-center rounded-lg bg-neutral-100 dark:bg-neutral-800"
                    >
                        <svg
                            class="h-5 w-5 text-neutral-600 dark:text-neutral-400"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"
                            />
                        </svg>
                    </div>
                    <div>
                        <h2 id="wide-slide-title" class="text-lg font-semibold text-neutral-900 dark:text-neutral-50">
                            Project Details
                        </h2>
                        <p class="text-sm text-neutral-500 dark:text-neutral-400">Created on Dec 14, 2025</p>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <button
                        type="button"
                        class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-neutral-500 transition-colors hover:bg-neutral-100 hover:text-neutral-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:outline-neutral-100"
                        aria-label="Edit"
                    >
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"
                            />
                        </svg>
                    </button>
                    <button
                        @click="open = false; $refs.trigger.focus();"
                        type="button"
                        class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-neutral-500 transition-colors hover:bg-neutral-100 hover:text-neutral-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:outline-neutral-100"
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
            </div>

            <!-- Content -->
            <div class="flex-1 overflow-y-auto">
                <!-- Two Column Layout -->
                <div class="grid grid-cols-1 gap-6 p-6 lg:grid-cols-2">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <div>
                            <h3 class="text-sm font-medium text-neutral-900 dark:text-neutral-50">Description</h3>
                            <p class="mt-2 text-sm text-neutral-600 dark:text-neutral-400">
                                This is a wide slide-over panel that provides more horizontal space for complex content
                                layouts. It's ideal for detailed views, two-column forms, or content that requires
                                side-by-side comparison.
                            </p>
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-neutral-900 dark:text-neutral-50">Team Members</h3>
                            <ul class="mt-3 space-y-3">
                                <li class="flex items-center gap-3">
                                    <div
                                        class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-100 text-sm font-medium text-blue-700 dark:bg-blue-500/20 dark:text-blue-400"
                                    >
                                        JD
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-neutral-900 dark:text-neutral-50">
                                            John Doe
                                        </p>
                                        <p class="text-xs text-neutral-500">Project Lead</p>
                                    </div>
                                </li>
                                <li class="flex items-center gap-3">
                                    <div
                                        class="flex h-8 w-8 items-center justify-center rounded-full bg-green-100 text-sm font-medium text-green-700 dark:bg-green-500/20 dark:text-green-400"
                                    >
                                        AS
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-neutral-900 dark:text-neutral-50">
                                            Alice Smith
                                        </p>
                                        <p class="text-xs text-neutral-500">Developer</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <div>
                            <h3 class="text-sm font-medium text-neutral-900 dark:text-neutral-50">Status</h3>
                            <div class="mt-2">
                                <span
                                    class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-green-500/20 dark:text-green-400"
                                >
                                    Active
                                </span>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-neutral-900 dark:text-neutral-50">Details</h3>
                            <dl class="mt-3 space-y-3">
                                <div class="flex justify-between">
                                    <dt class="text-sm text-neutral-500 dark:text-neutral-400">Budget</dt>
                                    <dd class="text-sm font-medium text-neutral-900 dark:text-neutral-50">$12,500</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm text-neutral-500 dark:text-neutral-400">Timeline</dt>
                                    <dd class="text-sm font-medium text-neutral-900 dark:text-neutral-50">3 months</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm text-neutral-500 dark:text-neutral-400">Progress</dt>
                                    <dd class="text-sm font-medium text-neutral-900 dark:text-neutral-50">65%</dd>
                                </div>
                            </dl>
                        </div>

                        <!-- Progress Bar -->
                        <div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="font-medium text-neutral-900 dark:text-neutral-50">Completion</span>
                                <span class="text-neutral-500">65%</span>
                            </div>
                            <div class="mt-2 h-2 overflow-hidden rounded-full bg-neutral-200 dark:bg-neutral-700">
                                <div class="h-full w-[65%] rounded-full bg-neutral-900 dark:bg-white"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div
                class="flex shrink-0 items-center justify-between border-t border-neutral-200 px-6 py-4 dark:border-neutral-800"
            >
                <button
                    type="button"
                    class="text-sm font-medium text-red-600 hover:text-red-700 focus-visible:outline focus-visible:outline-neutral-900 dark:text-red-400 dark:hover:text-red-300 dark:focus-visible:outline-neutral-100"
                >
                    Delete Project
                </button>
                <div class="flex gap-3">
                    <button
                        @click="open = false; $refs.trigger.focus();"
                        type="button"
                        class="rounded-lg px-4 py-2 text-sm font-medium text-neutral-700 transition-colors hover:bg-neutral-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus-visible:outline-neutral-100"
                    >
                        Close
                    </button>
                    <button
                        type="button"
                        class="rounded-lg bg-neutral-900 px-4 py-2 text-sm font-medium text-white transition-all duration-150 hover:bg-neutral-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 active:scale-[0.98] dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100 dark:focus-visible:outline-neutral-100"
                    >
                        Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

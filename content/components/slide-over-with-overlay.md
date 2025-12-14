---
slug: slide-over-with-overlay
title: Slide Over With Overlay
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
            Open with Overlay
        </button>

        <!-- Backdrop with blur -->
        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click="open = false; $refs.trigger.focus();"
            class="fixed inset-0 z-40 bg-neutral-900/60 backdrop-blur-sm"
            aria-hidden="true"
            x-cloak
        ></div>

        <!-- Slide Over Panel -->
        <div
            x-show="open"
            x-transition:enter="transition transform ease-out duration-200"
            x-transition:enter-start="translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition transform ease-in duration-150"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full"
            x-trap.inert.noscroll="open"
            class="fixed inset-y-0 right-0 z-50 flex w-full max-w-md flex-col border-l border-neutral-200 bg-white/95 shadow-2xl backdrop-blur-xl dark:border-neutral-700 dark:bg-neutral-900/95"
            role="dialog"
            aria-modal="true"
            aria-labelledby="overlay-slide-title"
            x-cloak
        >
            <!-- Header -->
            <div class="flex items-center justify-between px-6 py-4">
                <h2 id="overlay-slide-title" class="text-lg font-semibold text-neutral-900 dark:text-neutral-50">
                    Notifications
                </h2>
                <div class="flex items-center gap-2">
                    <button
                        type="button"
                        class="rounded text-sm font-medium text-neutral-500 hover:text-neutral-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:text-neutral-400 dark:hover:text-neutral-50 dark:focus-visible:outline-neutral-100"
                    >
                        Mark all read
                    </button>
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
            </div>

            <!-- Content -->
            <div class="min-h-0 flex-1 overflow-y-auto" role="list" aria-label="Notifications">
                <!-- Notification Items -->
                <div class="divide-y divide-neutral-100 dark:divide-neutral-800">
                    <!-- Unread notification -->
                    <div class="flex gap-4 bg-blue-50/50 px-6 py-4 dark:bg-blue-500/5" role="listitem">
                        <div class="relative">
                            <div
                                class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-100 dark:bg-blue-500/20"
                                aria-hidden="true"
                            >
                                <svg
                                    class="h-5 w-5 text-blue-600 dark:text-blue-400"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="2"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"
                                    />
                                </svg>
                            </div>
                            <span
                                class="absolute -top-0.5 -right-0.5 h-3 w-3 rounded-full border-2 border-white bg-blue-500 dark:border-neutral-900"
                                aria-label="Unread"
                            ></span>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-neutral-900 dark:text-neutral-50">
                                New message received
                            </p>
                            <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">
                                You have a new message from Sarah regarding the project update.
                            </p>
                            <p class="mt-2 text-xs text-neutral-400 dark:text-neutral-500">2 minutes ago</p>
                        </div>
                    </div>

                    <!-- Read notification -->
                    <div class="flex gap-4 px-6 py-4" role="listitem">
                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-full bg-green-100 dark:bg-green-500/20"
                            aria-hidden="true"
                        >
                            <svg
                                class="h-5 w-5 text-green-600 dark:text-green-400"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                                />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-neutral-900 dark:text-neutral-50">Task completed</p>
                            <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">
                                Your scheduled backup has completed successfully.
                            </p>
                            <p class="mt-2 text-xs text-neutral-400 dark:text-neutral-500">1 hour ago</p>
                        </div>
                    </div>

                    <!-- Another notification -->
                    <div class="flex gap-4 px-6 py-4" role="listitem">
                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-full bg-amber-100 dark:bg-amber-500/20"
                            aria-hidden="true"
                        >
                            <svg
                                class="h-5 w-5 text-amber-600 dark:text-amber-400"
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
                        <div class="flex-1">
                            <p class="text-sm font-medium text-neutral-900 dark:text-neutral-50">System warning</p>
                            <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">
                                Your storage is 80% full. Consider upgrading your plan.
                            </p>
                            <p class="mt-2 text-xs text-neutral-400 dark:text-neutral-500">3 hours ago</p>
                        </div>
                    </div>

                    <!-- More notification -->
                    <div class="flex gap-4 px-6 py-4" role="listitem">
                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-full bg-neutral-100 dark:bg-neutral-800"
                            aria-hidden="true"
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
                                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"
                                />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-neutral-900 dark:text-neutral-50">New team member</p>
                            <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">
                                Alex Johnson has joined the design team.
                            </p>
                            <p class="mt-2 text-xs text-neutral-400 dark:text-neutral-500">Yesterday</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="shrink-0 border-t border-neutral-200 px-6 py-4 dark:border-neutral-800">
                <button
                    type="button"
                    class="w-full rounded-lg bg-neutral-100 px-4 py-2.5 text-sm font-medium text-neutral-700 transition-colors hover:bg-neutral-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:bg-neutral-800 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus-visible:outline-neutral-100"
                >
                    View all notifications
                </button>
            </div>
        </div>
    </div>
</div>

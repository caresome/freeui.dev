---
slug: notification-panel
title: Notification Panel
category: overlays
github: caresome
dependencies: []
publish_at: 2025-12-14 00:00:00
---

<div data-preview-only class="flex min-h-[500px] items-start justify-center p-8">
    <div
        x-data="{ open: false }"
        @keydown.escape.window="if (open) { open = false; $refs.trigger.focus(); }"
        class="relative"
    >
        <!-- Trigger Button -->
        <button
            x-ref="trigger"
            @click="open = !open"
            type="button"
            class="relative inline-flex h-10 w-10 items-center justify-center rounded-lg text-neutral-500 transition-colors hover:bg-neutral-100 hover:text-neutral-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-offset-2 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:ring-neutral-100"
            :aria-expanded="open"
            aria-haspopup="true"
            aria-label="Notifications"
        >
            <svg
                class="h-5 w-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
                aria-hidden="true"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"
                />
            </svg>
            <!-- Badge -->
            <span
                class="absolute -top-0.5 -right-0.5 flex h-5 w-5 items-center justify-center rounded-full bg-red-500 text-[10px] font-bold text-white"
            >
                3
            </span>
        </button>

        <!-- Notification Panel -->
        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            @click.outside="open = false; $refs.trigger.focus()"
            class="absolute right-0 z-10 mt-2 w-80 origin-top-right rounded-xl border border-neutral-200 bg-white shadow-lg dark:border-neutral-700 dark:bg-neutral-800"
            role="menu"
            x-cloak
        >
            <!-- Header -->
            <div
                class="flex items-center justify-between border-b border-neutral-200 px-4 py-3 dark:border-neutral-700"
            >
                <h3 class="text-sm font-semibold text-neutral-900 dark:text-neutral-50">Notifications</h3>
                <button
                    type="button"
                    class="text-xs font-medium text-neutral-500 hover:text-neutral-900 dark:text-neutral-400 dark:hover:text-neutral-50"
                >
                    Mark all read
                </button>
            </div>

            <!-- Notifications List -->
            <div class="max-h-80 overflow-y-auto">
                <!-- Unread notification -->
                <div class="flex gap-3 bg-blue-50/50 px-4 py-3 dark:bg-blue-500/5">
                    <div class="relative shrink-0">
                        <img class="h-9 w-9 rounded-full" src="https://github.com/caresome.png" alt="" />
                        <span
                            class="absolute -right-0.5 -bottom-0.5 flex h-4 w-4 items-center justify-center rounded-full bg-blue-500 ring-2 ring-white dark:ring-neutral-800"
                        >
                            <svg
                                class="h-2.5 w-2.5 text-white"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="3"
                                stroke="currentColor"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </span>
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="text-sm text-neutral-900 dark:text-neutral-50">
                            <span class="font-medium">Ankit</span>
                            mentioned you in a comment
                        </p>
                        <p class="mt-0.5 text-xs text-neutral-500 dark:text-neutral-400">2 minutes ago</p>
                    </div>
                    <div class="shrink-0">
                        <span class="block h-2 w-2 rounded-full bg-blue-500"></span>
                    </div>
                </div>

                <!-- Another unread -->
                <div class="flex gap-3 bg-blue-50/50 px-4 py-3 dark:bg-blue-500/5">
                    <div class="relative shrink-0">
                        <div
                            class="flex h-9 w-9 items-center justify-center rounded-full bg-green-100 dark:bg-green-500/20"
                        >
                            <svg
                                class="h-4 w-4 text-green-600 dark:text-green-400"
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
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="text-sm text-neutral-900 dark:text-neutral-50">Your export is ready to download</p>
                        <p class="mt-0.5 text-xs text-neutral-500 dark:text-neutral-400">15 minutes ago</p>
                    </div>
                    <div class="shrink-0">
                        <span class="block h-2 w-2 rounded-full bg-blue-500"></span>
                    </div>
                </div>

                <!-- Read notification -->
                <div class="flex gap-3 px-4 py-3">
                    <div class="relative shrink-0">
                        <div
                            class="flex h-9 w-9 items-center justify-center rounded-full bg-amber-100 dark:bg-amber-500/20"
                        >
                            <svg
                                class="h-4 w-4 text-amber-600 dark:text-amber-400"
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
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="text-sm text-neutral-600 dark:text-neutral-300">Storage usage is at 80%</p>
                        <p class="mt-0.5 text-xs text-neutral-500 dark:text-neutral-400">1 hour ago</p>
                    </div>
                </div>

                <!-- Another read notification -->
                <div class="flex gap-3 px-4 py-3">
                    <div class="relative shrink-0">
                        <img class="h-9 w-9 rounded-full" src="https://github.com/github.png" alt="" />
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="text-sm text-neutral-600 dark:text-neutral-300">
                            <span class="font-medium text-neutral-900 dark:text-neutral-50">GitHub</span>
                            sent you a security alert
                        </p>
                        <p class="mt-0.5 text-xs text-neutral-500 dark:text-neutral-400">Yesterday</p>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="border-t border-neutral-200 px-4 py-3 dark:border-neutral-700">
                <a
                    href="#"
                    class="block text-center text-sm font-medium text-neutral-900 hover:underline dark:text-neutral-50"
                >
                    View all notifications
                </a>
            </div>
        </div>
    </div>
</div>

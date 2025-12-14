---
slug: alert-with-actions
title: Alert With Actions
category: feedback
github: caresome
dependencies: []
publish_at: 2025-12-14 00:23:00
---

<div data-preview-only class="flex min-h-[400px] items-center justify-center p-8">
    <div class="w-full max-w-md space-y-4">
        <!-- Info Alert -->
        <div
            class="flex items-center gap-3 rounded-lg bg-blue-50 p-4 text-sm text-blue-800 dark:bg-blue-500/10 dark:text-blue-400"
            role="alert"
        >
            <svg class="h-5 w-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                <path
                    fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"
                />
            </svg>
            <div class="flex-1">A new software update is available.</div>
            <button
                type="button"
                class="ml-auto flex-shrink-0 rounded-md bg-blue-50 p-1.5 text-blue-500 hover:bg-blue-100 focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 focus:ring-offset-blue-50 focus:outline-none dark:bg-transparent dark:text-blue-400 dark:hover:bg-blue-500/20 dark:focus:ring-blue-400 dark:focus:ring-offset-neutral-900"
            >
                <span class="sr-only">View details</span>
                <span class="text-xs font-semibold">Details</span>
            </button>
        </div>

        <!-- Success Alert -->
        <div
            class="flex items-center gap-3 rounded-lg bg-green-50 p-4 text-sm text-green-800 dark:bg-green-500/10 dark:text-green-400"
            role="alert"
        >
            <svg class="h-5 w-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                <path
                    fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                    clip-rule="evenodd"
                />
            </svg>
            <div class="flex-1">Profile updated successfully.</div>
            <div class="ml-auto flex flex-shrink-0 gap-2">
                <button
                    type="button"
                    class="font-medium text-green-700 hover:text-green-800 hover:underline dark:text-green-400 dark:hover:text-green-300"
                >
                    Undo
                </button>
                <button
                    type="button"
                    class="font-medium text-green-700 hover:text-green-800 hover:underline dark:text-green-400 dark:hover:text-green-300"
                >
                    View
                </button>
            </div>
        </div>

        <!-- Warning Alert with close -->
        <div
            x-data="{ show: true }"
            x-show="show"
            class="flex items-start gap-3 rounded-lg bg-amber-50 p-4 text-sm text-amber-800 dark:bg-amber-500/10 dark:text-amber-400"
            role="alert"
        >
            <svg class="mt-0.5 h-5 w-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                <path
                    fill-rule="evenodd"
                    d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                    clip-rule="evenodd"
                />
            </svg>
            <div class="flex-1">
                <h3 class="font-medium text-amber-800 dark:text-amber-400">Attention required</h3>
                <div class="mt-1 text-amber-700 dark:text-amber-300">
                    Your account subscription is expiring soon. Please renew to avoid interruption.
                </div>
                <div class="mt-2 text-sm">
                    <button
                        type="button"
                        class="rounded bg-amber-100 px-2 py-1.5 font-medium text-amber-800 hover:bg-amber-200 focus:ring-2 focus:ring-amber-400 focus:ring-offset-2 focus:ring-offset-amber-50 focus:outline-none dark:bg-amber-500/20 dark:text-amber-300 dark:hover:bg-amber-500/30 dark:focus:ring-offset-neutral-900"
                    >
                        Renew now
                    </button>
                    <button
                        @click="show = false"
                        type="button"
                        class="ml-2 rounded bg-amber-50 px-2 py-1.5 font-medium text-amber-800 hover:bg-amber-100 focus:ring-2 focus:ring-amber-400 focus:ring-offset-2 focus:ring-offset-amber-50 focus:outline-none dark:bg-transparent dark:text-amber-300 dark:hover:bg-amber-500/20 dark:focus:ring-offset-neutral-900"
                    >
                        Dismiss
                    </button>
                </div>
            </div>
            <button
                @click="show = false"
                type="button"
                class="ml-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 p-1.5 text-amber-500 hover:bg-amber-200 focus:ring-2 focus:ring-amber-400 dark:bg-transparent dark:text-amber-400 dark:hover:bg-amber-500/30"
            >
                <span class="sr-only">Close</span>
                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path
                        fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"
                    ></path>
                </svg>
            </button>
        </div>
    </div>
</div>

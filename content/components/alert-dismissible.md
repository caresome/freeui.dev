---
slug: alert-dismissible
title: Alert Dismissible
category: feedback
github: caresome
dependencies: []
publish_at: 2025-12-14 00:21:00
---

<div data-preview-only class="flex min-h-[400px] items-center justify-center p-8">
    <div class="w-full max-w-md space-y-4">
        <!-- Dismissible Info Alert -->
        <div
            x-data="{ show: true }"
            x-show="show"
            x-transition.opacity
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
            <div class="flex-1">This is an info alert you can dismiss.</div>
            <button
                @click="show = false"
                type="button"
                class="-mx-1.5 -my-1.5 inline-flex h-8 w-8 items-center justify-center rounded-lg bg-blue-50 p-1.5 text-blue-500 hover:bg-blue-200 focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 focus:ring-offset-blue-50 focus:outline-none dark:bg-transparent dark:text-blue-400 dark:hover:bg-blue-500/20 dark:focus:ring-offset-neutral-900"
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

        <!-- Dismissible Success Alert -->
        <div
            x-data="{ show: true }"
            x-show="show"
            x-transition.opacity
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
            <div class="flex-1">Success! Changes have been saved.</div>
            <button
                @click="show = false"
                type="button"
                class="-mx-1.5 -my-1.5 inline-flex h-8 w-8 items-center justify-center rounded-lg bg-green-50 p-1.5 text-green-500 hover:bg-green-200 focus:ring-2 focus:ring-green-400 focus:ring-offset-2 focus:ring-offset-green-50 focus:outline-none dark:bg-transparent dark:text-green-400 dark:hover:bg-green-500/20 dark:focus:ring-offset-neutral-900"
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

        <!-- Dismissible Warning Alert -->
        <div
            x-data="{ show: true }"
            x-show="show"
            x-transition.opacity
            class="flex items-center gap-3 rounded-lg bg-amber-50 p-4 text-sm text-amber-800 dark:bg-amber-500/10 dark:text-amber-400"
            role="alert"
        >
            <svg class="h-5 w-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                <path
                    fill-rule="evenodd"
                    d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                    clip-rule="evenodd"
                />
            </svg>
            <div class="flex-1">Warning: Your session is about to expire.</div>
            <button
                @click="show = false"
                type="button"
                class="-mx-1.5 -my-1.5 inline-flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 p-1.5 text-amber-500 hover:bg-amber-200 focus:ring-2 focus:ring-amber-400 focus:ring-offset-2 focus:ring-offset-amber-50 focus:outline-none dark:bg-transparent dark:text-amber-400 dark:hover:bg-amber-500/20 dark:focus:ring-offset-neutral-900"
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

        <!-- Dismissible Red Alert -->
        <div
            x-data="{ show: true }"
            x-show="show"
            x-transition.opacity
            class="flex items-center gap-3 rounded-lg bg-red-50 p-4 text-sm text-red-800 dark:bg-red-500/10 dark:text-red-400"
            role="alert"
        >
            <svg class="h-5 w-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                <path
                    fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                    clip-rule="evenodd"
                />
            </svg>
            <div class="flex-1">Error: Something went wrong.</div>
            <button
                @click="show = false"
                type="button"
                class="-mx-1.5 -my-1.5 inline-flex h-8 w-8 items-center justify-center rounded-lg bg-red-50 p-1.5 text-red-500 hover:bg-red-200 focus:ring-2 focus:ring-red-400 focus:ring-offset-2 focus:ring-offset-red-50 focus:outline-none dark:bg-transparent dark:text-red-400 dark:hover:bg-red-500/20 dark:focus:ring-offset-neutral-900"
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

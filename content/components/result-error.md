---
slug: result-error
title: Result Error
category: empty-states
github: caresome
dependencies: []
publish_at: 2025-12-14 00:05:00
---

<div data-preview-only class="flex min-h-[400px] items-center justify-center p-8">
    <div class="text-center">
        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-red-100 dark:bg-red-500/10">
            <svg
                class="h-8 w-8 text-red-600 dark:text-red-400"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
            >
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </div>
        <h2 class="mt-4 text-xl font-semibold text-neutral-900 dark:text-neutral-50">Transaction Failed</h2>
        <p class="mt-2 text-neutral-500 dark:text-neutral-400">
            We were unable to process your payment. Please check your card details and try again.
        </p>
        <div class="mt-6 flex justify-center gap-3">
            <button
                type="button"
                class="rounded-lg border border-neutral-200 bg-white px-4 py-2.5 text-sm font-medium text-neutral-700 transition-colors duration-150 hover:bg-neutral-50 focus:ring-2 focus:ring-neutral-900 focus:ring-offset-2 focus:outline-none dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:ring-neutral-100"
            >
                Contact Support
            </button>
            <button
                type="button"
                class="rounded-lg bg-red-600 px-4 py-2.5 text-sm font-medium text-white shadow-sm transition-colors duration-150 hover:bg-red-700 focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:outline-none dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-500 dark:focus:ring-offset-neutral-900"
            >
                Try Again
            </button>
        </div>
    </div>
</div>

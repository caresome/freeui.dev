---
slug: loading-overlay-with-spinner
title: Loading Overlay With Spinner
category: feedback
github: caresome
dependencies: []
publish_at: 2025-12-14 00:07:00
---

<div data-preview-only class="flex min-h-[400px] items-center justify-center p-8">
    <div
        class="relative w-full max-w-sm overflow-hidden rounded-xl border border-neutral-200 bg-white shadow-sm dark:border-neutral-700 dark:bg-neutral-800"
    >
        <!-- Content behind overlay -->
        <div class="p-4">
            <div class="space-y-3">
                <div class="h-4 w-3/4 rounded bg-neutral-100 dark:bg-neutral-700"></div>
                <div class="h-4 w-full rounded bg-neutral-100 dark:bg-neutral-700"></div>
                <div class="h-4 w-5/6 rounded bg-neutral-100 dark:bg-neutral-700"></div>
                <div class="h-32 w-full rounded bg-neutral-100 dark:bg-neutral-700"></div>
            </div>
            <div class="mt-4 flex justify-end">
                <div class="h-8 w-20 rounded bg-neutral-200 dark:bg-neutral-700"></div>
            </div>
        </div>

        <!-- Overlay -->
        <div
            class="absolute inset-0 flex flex-col items-center justify-center rounded-xl bg-white/50 backdrop-blur-sm dark:bg-neutral-900/50"
        >
            <svg
                class="h-8 w-8 animate-spin text-neutral-900 dark:text-neutral-50"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
            >
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path
                    class="opacity-75"
                    fill="currentColor"
                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                ></path>
            </svg>
            <span class="mt-2 text-sm font-medium text-neutral-900 dark:text-neutral-50">Processing...</span>
        </div>
    </div>
</div>

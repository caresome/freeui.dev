---
slug: spinner
title: Spinner
category: feedback
github: caresome
dependencies: []
publish_at: 2025-12-14 00:16:00
---

<div data-preview-only class="flex min-h-[200px] flex-wrap items-center justify-center gap-12 p-8">
    <!-- Small -->
    <div role="status">
        <svg
            class="h-5 w-5 animate-spin text-neutral-900 dark:text-neutral-50"
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
        <span class="sr-only">Loading...</span>
    </div>

    <!-- Medium -->
    <div role="status">
        <svg
            class="h-8 w-8 animate-spin text-blue-600 dark:text-blue-500"
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
        <span class="sr-only">Loading...</span>
    </div>

    <!-- Large -->
    <div role="status">
        <svg
            class="h-12 w-12 animate-spin text-green-500 dark:text-green-400"
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
        <span class="sr-only">Loading...</span>
    </div>

    <!-- Button with Spinner -->
    <button
        type="button"
        class="inline-flex cursor-not-allowed items-center rounded-lg bg-neutral-900 px-4 py-2.5 text-sm font-medium text-white shadow-sm hover:bg-neutral-800 disabled:opacity-75 dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100"
        disabled
    >
        <svg
            class="mr-3 -ml-1 h-5 w-5 animate-spin text-white dark:text-neutral-900"
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
        Processing...
    </button>
</div>

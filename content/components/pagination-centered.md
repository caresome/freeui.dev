---
slug: pagination-centered
title: Pagination Centered
category: navigation
github: caresome
dependencies: []
publish_at: 2025-12-15 12:00:00
---

<div data-preview-only class="flex min-h-[200px] items-center justify-center p-8">
    <nav x-data="{ currentPage: 5, totalPages: 12 }" aria-label="Pagination" class="flex flex-col items-center gap-4">
        <!-- Pagination controls -->
        <div
            class="flex items-center gap-2 rounded-xl border border-neutral-200 bg-white p-1.5 dark:border-neutral-700 dark:bg-neutral-800"
        >
            <!-- Previous -->
            <button
                @click="if (currentPage > 1) currentPage--"
                type="button"
                class="flex h-9 w-9 items-center justify-center rounded-lg transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
                :class="currentPage === 1 ? 'cursor-not-allowed text-neutral-300 dark:text-neutral-600' : 'text-neutral-600 hover:bg-neutral-100 hover:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-50'"
                :disabled="currentPage === 1"
                aria-label="Previous page"
            >
                <svg
                    class="h-4 w-4"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    aria-hidden="true"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
            </button>

            <!-- Page indicator -->
            <div class="flex items-center gap-2 px-3">
                <span class="text-sm font-medium text-neutral-900 dark:text-neutral-50" x-text="currentPage"></span>
                <span class="text-sm text-neutral-400 dark:text-neutral-500">/</span>
                <span class="text-sm text-neutral-500 dark:text-neutral-400" x-text="totalPages"></span>
            </div>

            <!-- Next -->
            <button
                @click="if (currentPage < totalPages) currentPage++"
                type="button"
                class="flex h-9 w-9 items-center justify-center rounded-lg transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
                :class="currentPage === totalPages ? 'cursor-not-allowed text-neutral-300 dark:text-neutral-600' : 'text-neutral-600 hover:bg-neutral-100 hover:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-50'"
                :disabled="currentPage === totalPages"
                aria-label="Next page"
            >
                <svg
                    class="h-4 w-4"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    aria-hidden="true"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </button>
        </div>

        <!-- Results info -->
        <p class="text-sm text-neutral-500 dark:text-neutral-400">
            Showing
            <span class="font-medium text-neutral-700 dark:text-neutral-300" x-text="(currentPage - 1) * 10 + 1"></span>
            to
            <span
                class="font-medium text-neutral-700 dark:text-neutral-300"
                x-text="Math.min(currentPage * 10, 120)"
            ></span>
            of
            <span class="font-medium text-neutral-700 dark:text-neutral-300">120</span>
            results
        </p>
    </nav>
</div>

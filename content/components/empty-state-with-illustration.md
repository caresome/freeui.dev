---
slug: empty-state-with-illustration
title: Empty State With Illustration
category: feedback
github: caresome
dependencies: []
publish_at: 2025-12-14 00:28:00
---

<div data-preview-only class="flex min-h-[400px] items-center justify-center p-8">
    <div class="max-w-md text-center">
        <!-- Illustration -->
        <div class="mx-auto h-48 w-48 text-neutral-300 dark:text-neutral-700">
            <svg class="h-full w-full" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                    d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"
                />
            </svg>
        </div>

        <h3 class="mt-4 text-lg font-semibold text-neutral-900 dark:text-neutral-50">No documents found</h3>
        <p class="mt-2 text-sm text-neutral-500 dark:text-neutral-400">
            We couldn't find any documents matching your search criteria. Try adjusting your filters or creating a new
            document.
        </p>

        <div class="mt-8 flex justify-center gap-3">
            <button
                type="button"
                class="rounded-lg border border-neutral-200 bg-white px-4 py-2.5 text-sm font-medium text-neutral-700 hover:bg-neutral-50 focus:ring-2 focus:ring-neutral-900 focus:ring-offset-2 focus:outline-none dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:ring-neutral-100"
            >
                Clear filters
            </button>
            <button
                type="button"
                class="inline-flex items-center rounded-lg bg-neutral-900 px-4 py-2.5 text-sm font-medium text-white shadow-sm hover:bg-neutral-800 focus:ring-2 focus:ring-neutral-900 focus:ring-offset-2 focus:outline-none dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100 dark:focus:ring-neutral-100"
            >
                <svg class="mr-2 -ml-1 h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path
                        fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-11.25a.75.75 0 00-1.5 0v2.5h-2.5a.75.75 0 000 1.5h2.5v2.5a.75.75 0 001.5 0v-2.5h2.5a.75.75 0 000-1.5h-2.5v-2.5z"
                        clip-rule="evenodd"
                    />
                </svg>
                New Document
            </button>
        </div>
    </div>
</div>

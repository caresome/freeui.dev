---
slug: pagination-with-icons
title: Pagination with Icons
category: pagination
github: caresome
dependencies: []
publish_at: 2025-12-15 12:00:00
---

<div data-preview-only class="flex min-h-[200px] items-center justify-center p-8">
    <nav x-data="{ currentPage: 3, totalPages: 10 }" aria-label="Pagination" class="flex items-center gap-1">
        <!-- First -->
        <button
            @click="currentPage = 1"
            type="button"
            class="flex h-10 w-10 items-center justify-center rounded-lg transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
            :class="currentPage === 1 ? 'cursor-not-allowed text-neutral-300 dark:text-neutral-600' : 'text-neutral-600 hover:bg-neutral-100 hover:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50'"
            :disabled="currentPage === 1"
            aria-label="First page"
        >
            <svg
                class="h-4 w-4"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
                aria-hidden="true"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5"
                />
            </svg>
        </button>

        <!-- Previous -->
        <button
            @click="if (currentPage > 1) currentPage--"
            type="button"
            class="flex h-10 w-10 items-center justify-center rounded-lg transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
            :class="currentPage === 1 ? 'cursor-not-allowed text-neutral-300 dark:text-neutral-600' : 'text-neutral-600 hover:bg-neutral-100 hover:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50'"
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

        <!-- Page numbers -->
        <div class="flex items-center gap-1">
            <template x-for="page in [1, 2, 3, '...', 8, 9, 10]" :key="page">
                <template x-if="page === '...'">
                    <span
                        class="flex h-10 w-10 items-center justify-center text-sm text-neutral-400 dark:text-neutral-500"
                    >
                        ...
                    </span>
                </template>
                <template x-if="page !== '...'">
                    <button
                        @click="currentPage = page"
                        type="button"
                        class="h-10 min-w-10 rounded-lg px-3 text-sm font-medium transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
                        :class="currentPage === page ? 'bg-neutral-900 text-white dark:bg-neutral-100 dark:text-neutral-900' : 'text-neutral-600 hover:bg-neutral-100 hover:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50'"
                        :aria-current="currentPage === page ? 'page' : null"
                        x-text="page"
                    ></button>
                </template>
            </template>
        </div>

        <!-- Next -->
        <button
            @click="if (currentPage < totalPages) currentPage++"
            type="button"
            class="flex h-10 w-10 items-center justify-center rounded-lg transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
            :class="currentPage === totalPages ? 'cursor-not-allowed text-neutral-300 dark:text-neutral-600' : 'text-neutral-600 hover:bg-neutral-100 hover:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50'"
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

        <!-- Last -->
        <button
            @click="currentPage = totalPages"
            type="button"
            class="flex h-10 w-10 items-center justify-center rounded-lg transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
            :class="currentPage === totalPages ? 'cursor-not-allowed text-neutral-300 dark:text-neutral-600' : 'text-neutral-600 hover:bg-neutral-100 hover:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50'"
            :disabled="currentPage === totalPages"
            aria-label="Last page"
        >
            <svg
                class="h-4 w-4"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
                aria-hidden="true"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5"
                />
            </svg>
        </button>
    </nav>
</div>

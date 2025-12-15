---
slug: pagination-simple
title: Pagination Simple
category: navigation
github: caresome
dependencies: []
publish_at: 2025-12-15 12:00:00
---

<div data-preview-only class="flex min-h-[200px] items-center justify-center p-8">
    <nav x-data="{ currentPage: 3, totalPages: 10 }" aria-label="Pagination" class="flex items-center gap-1">
        <!-- Previous -->
        <button
            @click="if (currentPage > 1) currentPage--"
            type="button"
            class="rounded-lg px-3 py-2 text-sm font-medium transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
            :class="currentPage === 1 ? 'cursor-not-allowed text-neutral-300 dark:text-neutral-600' : 'text-neutral-600 hover:bg-neutral-100 hover:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50'"
            :disabled="currentPage === 1"
            aria-label="Previous page"
        >
            Previous
        </button>

        <!-- Page numbers -->
        <div class="flex items-center gap-1">
            <template x-for="page in totalPages" :key="page">
                <button
                    @click="currentPage = page"
                    type="button"
                    class="h-10 min-w-10 rounded-lg px-3 text-sm font-medium transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
                    :class="currentPage === page ? 'bg-neutral-900 text-white dark:bg-neutral-100 dark:text-neutral-900' : 'text-neutral-600 hover:bg-neutral-100 hover:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50'"
                    :aria-current="currentPage === page ? 'page' : null"
                    x-text="page"
                ></button>
            </template>
        </div>

        <!-- Next -->
        <button
            @click="if (currentPage < totalPages) currentPage++"
            type="button"
            class="rounded-lg px-3 py-2 text-sm font-medium transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
            :class="currentPage === totalPages ? 'cursor-not-allowed text-neutral-300 dark:text-neutral-600' : 'text-neutral-600 hover:bg-neutral-100 hover:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50'"
            :disabled="currentPage === totalPages"
            aria-label="Next page"
        >
            Next
        </button>
    </nav>
</div>

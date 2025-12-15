---
slug: steps-circles
title: Steps Circles
category: navigation
github: caresome
dependencies: []
publish_at: 2025-12-15 12:00:00
---

<div data-preview-only class="flex min-h-[200px] items-center justify-center p-8">
    <nav aria-label="Progress" class="w-full max-w-md">
        <ol class="flex items-center justify-between">
            <!-- Step 1 - Completed -->
            <li class="relative flex flex-col items-center">
                <div
                    class="flex h-10 w-10 items-center justify-center rounded-full bg-neutral-900 ring-4 ring-white dark:bg-neutral-100 dark:ring-neutral-900"
                >
                    <svg
                        class="h-5 w-5 text-white dark:text-neutral-900"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2.5"
                        stroke="currentColor"
                        aria-hidden="true"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>
                </div>
                <span class="sr-only">Step 1: Complete</span>
            </li>

            <!-- Connector -->
            <div class="h-1 flex-1 rounded-full bg-neutral-900 dark:bg-neutral-100" aria-hidden="true"></div>

            <!-- Step 2 - Completed -->
            <li class="relative flex flex-col items-center">
                <div
                    class="flex h-10 w-10 items-center justify-center rounded-full bg-neutral-900 ring-4 ring-white dark:bg-neutral-100 dark:ring-neutral-900"
                >
                    <svg
                        class="h-5 w-5 text-white dark:text-neutral-900"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2.5"
                        stroke="currentColor"
                        aria-hidden="true"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>
                </div>
                <span class="sr-only">Step 2: Complete</span>
            </li>

            <!-- Connector -->
            <div class="h-1 flex-1 rounded-full bg-neutral-200 dark:bg-neutral-700" aria-hidden="true"></div>

            <!-- Step 3 - Current -->
            <li class="relative flex flex-col items-center">
                <div
                    class="relative flex h-10 w-10 items-center justify-center rounded-full border-2 border-neutral-900 bg-white ring-4 ring-white dark:border-neutral-100 dark:bg-neutral-900 dark:ring-neutral-900"
                    aria-current="step"
                >
                    <span class="h-3 w-3 rounded-full bg-neutral-900 dark:bg-neutral-100"></span>
                </div>
                <span class="sr-only">Step 3: Current</span>
            </li>

            <!-- Connector -->
            <div class="h-1 flex-1 rounded-full bg-neutral-200 dark:bg-neutral-700" aria-hidden="true"></div>

            <!-- Step 4 - Upcoming -->
            <li class="relative flex flex-col items-center">
                <div
                    class="flex h-10 w-10 items-center justify-center rounded-full border-2 border-neutral-200 bg-white ring-4 ring-white dark:border-neutral-700 dark:bg-neutral-900 dark:ring-neutral-900"
                >
                    <span class="h-3 w-3 rounded-full bg-neutral-200 dark:bg-neutral-700"></span>
                </div>
                <span class="sr-only">Step 4: Upcoming</span>
            </li>

            <!-- Connector -->
            <div class="h-1 flex-1 rounded-full bg-neutral-200 dark:bg-neutral-700" aria-hidden="true"></div>

            <!-- Step 5 - Upcoming -->
            <li class="relative flex flex-col items-center">
                <div
                    class="flex h-10 w-10 items-center justify-center rounded-full border-2 border-neutral-200 bg-white ring-4 ring-white dark:border-neutral-700 dark:bg-neutral-900 dark:ring-neutral-900"
                >
                    <span class="h-3 w-3 rounded-full bg-neutral-200 dark:bg-neutral-700"></span>
                </div>
                <span class="sr-only">Step 5: Upcoming</span>
            </li>
        </ol>

        <!-- Labels -->
        <div class="mt-4 flex justify-between text-sm">
            <span class="font-medium text-neutral-900 dark:text-neutral-50">Details</span>
            <span class="font-medium text-neutral-900 dark:text-neutral-50">Address</span>
            <span class="font-medium text-neutral-900 dark:text-neutral-50">Payment</span>
            <span class="text-neutral-500 dark:text-neutral-400">Review</span>
            <span class="text-neutral-500 dark:text-neutral-400">Complete</span>
        </div>
    </nav>
</div>

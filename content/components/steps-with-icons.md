---
slug: steps-with-icons
title: Steps with Icons
category: navigation
github: caresome
dependencies: []
publish_at: 2025-12-15 12:00:00
---

<div data-preview-only class="flex min-h-[220px] items-center justify-center p-8">
    <nav aria-label="Progress" class="w-full max-w-2xl">
        <ol class="flex items-center justify-between">
            <!-- Step 1 - Completed -->
            <li class="flex flex-col items-center">
                <div
                    class="flex h-12 w-12 items-center justify-center rounded-xl bg-neutral-900 text-white dark:bg-neutral-100 dark:text-neutral-900"
                >
                    <svg
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2.5"
                        stroke="currentColor"
                        aria-hidden="true"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>
                </div>
                <span class="mt-3 text-sm font-medium text-neutral-900 dark:text-neutral-50">Cart</span>
            </li>

            <!-- Connector -->
            <div class="h-0.5 flex-1 bg-neutral-900 dark:bg-neutral-100" aria-hidden="true"></div>

            <!-- Step 2 - Completed -->
            <li class="flex flex-col items-center">
                <div
                    class="flex h-12 w-12 items-center justify-center rounded-xl bg-neutral-900 text-white dark:bg-neutral-100 dark:text-neutral-900"
                >
                    <svg
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2.5"
                        stroke="currentColor"
                        aria-hidden="true"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>
                </div>
                <span class="mt-3 text-sm font-medium text-neutral-900 dark:text-neutral-50">Shipping</span>
            </li>

            <!-- Connector -->
            <div class="h-0.5 flex-1 bg-neutral-200 dark:bg-neutral-700" aria-hidden="true"></div>

            <!-- Step 3 - Current -->
            <li class="flex flex-col items-center">
                <div
                    class="flex h-12 w-12 items-center justify-center rounded-xl border-2 border-neutral-900 bg-white dark:border-neutral-100 dark:bg-neutral-900"
                    aria-current="step"
                >
                    <svg
                        class="h-5 w-5 text-neutral-900 dark:text-neutral-100"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                        aria-hidden="true"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z"
                        />
                    </svg>
                </div>
                <span class="mt-3 text-sm font-medium text-neutral-900 dark:text-neutral-50">Payment</span>
            </li>

            <!-- Connector -->
            <div class="h-0.5 flex-1 bg-neutral-200 dark:bg-neutral-700" aria-hidden="true"></div>

            <!-- Step 4 - Upcoming -->
            <li class="flex flex-col items-center">
                <div
                    class="flex h-12 w-12 items-center justify-center rounded-xl border-2 border-neutral-200 bg-white dark:border-neutral-700 dark:bg-neutral-900"
                >
                    <svg
                        class="h-5 w-5 text-neutral-400 dark:text-neutral-500"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                        aria-hidden="true"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>
                </div>
                <span class="mt-3 text-sm text-neutral-500 dark:text-neutral-400">Confirm</span>
            </li>
        </ol>
    </nav>
</div>

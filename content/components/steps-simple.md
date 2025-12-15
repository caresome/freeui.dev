---
slug: steps-simple
title: Steps Simple
category: navigation
github: caresome
dependencies: []
publish_at: 2025-12-15 12:00:00
---

<div data-preview-only class="flex min-h-[200px] items-center justify-center p-8">
    <nav aria-label="Progress" class="w-full max-w-2xl">
        <ol class="flex items-start">
            <!-- Step 1 - Completed -->
            <li class="flex flex-1 items-center">
                <div class="flex flex-col items-center">
                    <div
                        class="flex h-8 w-8 items-center justify-center rounded-full bg-neutral-900 text-sm font-medium text-white dark:bg-neutral-100 dark:text-neutral-900"
                    >
                        <svg
                            class="h-4 w-4"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2.5"
                            stroke="currentColor"
                            aria-hidden="true"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                        </svg>
                    </div>
                    <span class="mt-2 text-sm font-medium text-neutral-900 dark:text-neutral-50">Account</span>
                </div>
                <div class="h-0.5 flex-1 bg-neutral-900 dark:bg-neutral-100" aria-hidden="true"></div>
            </li>

            <!-- Step 2 - Current -->
            <li class="flex flex-1 items-center">
                <div class="flex flex-col items-center">
                    <div
                        class="flex h-8 w-8 items-center justify-center rounded-full border-2 border-neutral-900 bg-white text-sm font-medium text-neutral-900 dark:border-neutral-100 dark:bg-neutral-900 dark:text-neutral-100"
                        aria-current="step"
                    >
                        2
                    </div>
                    <span class="mt-2 text-sm font-medium text-neutral-900 dark:text-neutral-50">Profile</span>
                </div>
                <div class="h-0.5 flex-1 bg-neutral-200 dark:bg-neutral-700" aria-hidden="true"></div>
            </li>

            <!-- Step 3 - Upcoming -->
            <li class="flex flex-1 items-center">
                <div class="flex flex-col items-center">
                    <div
                        class="flex h-8 w-8 items-center justify-center rounded-full border-2 border-neutral-200 bg-white text-sm font-medium text-neutral-400 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-500"
                    >
                        3
                    </div>
                    <span class="mt-2 text-sm text-neutral-500 dark:text-neutral-400">Settings</span>
                </div>
                <div class="h-0.5 flex-1 bg-neutral-200 dark:bg-neutral-700" aria-hidden="true"></div>
            </li>

            <!-- Step 4 - Upcoming -->
            <li class="flex items-center">
                <div class="flex flex-col items-center">
                    <div
                        class="flex h-8 w-8 items-center justify-center rounded-full border-2 border-neutral-200 bg-white text-sm font-medium text-neutral-400 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-500"
                    >
                        4
                    </div>
                    <span class="mt-2 text-sm text-neutral-500 dark:text-neutral-400">Review</span>
                </div>
            </li>
        </ol>
    </nav>
</div>

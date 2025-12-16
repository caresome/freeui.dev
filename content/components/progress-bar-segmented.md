---
slug: progress-bar-segmented
title: Progress Bar Segmented
category: loading-progress
github: caresome
dependencies: []
publish_at: 2025-12-14 00:18:00
---

<div data-preview-only class="flex min-h-[200px] items-center justify-center p-8">
    <div class="w-full max-w-sm space-y-8">
        <!-- 3 Steps -->
        <div class="space-y-2">
            <div
                class="flex gap-1"
                role="progressbar"
                aria-valuenow="2"
                aria-valuemin="1"
                aria-valuemax="3"
                aria-label="Step 2 of 3"
            >
                <div class="h-2 flex-1 rounded-full bg-neutral-900 dark:bg-neutral-50"></div>
                <div class="h-2 flex-1 rounded-full bg-neutral-900 dark:bg-neutral-50"></div>
                <div class="h-2 flex-1 rounded-full bg-neutral-200 dark:bg-neutral-700"></div>
            </div>
            <div class="text-center text-xs font-medium text-neutral-500 dark:text-neutral-400">Step 2 of 3</div>
        </div>

        <!-- 5 Steps -->
        <div class="space-y-2">
            <div
                class="flex gap-1"
                role="progressbar"
                aria-valuenow="3"
                aria-valuemin="1"
                aria-valuemax="5"
                aria-label="Step 3 of 5"
            >
                <div class="h-1.5 flex-1 rounded-full bg-blue-600 dark:bg-blue-400"></div>
                <div class="h-1.5 flex-1 rounded-full bg-blue-600 dark:bg-blue-400"></div>
                <div class="h-1.5 flex-1 rounded-full bg-blue-600 dark:bg-blue-400"></div>
                <div class="h-1.5 flex-1 rounded-full bg-neutral-200 dark:bg-neutral-700"></div>
                <div class="h-1.5 flex-1 rounded-full bg-neutral-200 dark:bg-neutral-700"></div>
            </div>
            <div class="flex justify-between text-xs font-medium text-neutral-500 dark:text-neutral-400">
                <span>Details</span>
                <span class="text-neutral-900 dark:text-neutral-50">Profile</span>
                <span>Review</span>
                <span>Payment</span>
                <span>Done</span>
            </div>
        </div>
    </div>
</div>

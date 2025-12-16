---
slug: progress-bar-with-label
title: Progress Bar With Label
category: loading-progress
github: caresome
dependencies: []
publish_at: 2025-12-14 00:19:00
---

<div data-preview-only class="flex min-h-[200px] items-center justify-center p-8">
    <div class="w-full max-w-sm space-y-8">
        <!-- Label Outside -->
        <div x-data="{ progress: 45 }" class="space-y-2">
            <div class="flex justify-between text-sm font-medium text-neutral-900 dark:text-neutral-50">
                <span>Uploading...</span>
                <span x-text="`${progress}%`"></span>
            </div>
            <div
                class="h-2 w-full overflow-hidden rounded-full bg-neutral-100 dark:bg-neutral-800"
                role="progressbar"
                :aria-valuenow="progress"
                aria-valuemin="0"
                aria-valuemax="100"
            >
                <div
                    class="h-full rounded-full bg-neutral-900 transition-all duration-300 dark:bg-neutral-50"
                    :style="`width: ${progress}%`"
                ></div>
            </div>
        </div>

        <!-- Label Inside -->
        <div x-data="{ progress: 60 }" class="space-y-2">
            <div
                class="h-5 w-full overflow-hidden rounded-full bg-neutral-100 dark:bg-neutral-800"
                role="progressbar"
                :aria-valuenow="progress"
                aria-valuemin="0"
                aria-valuemax="100"
            >
                <div
                    class="flex h-full items-center justify-center rounded-full bg-neutral-900 text-[10px] font-bold text-white transition-all duration-300 dark:bg-neutral-50 dark:text-neutral-900"
                    :style="`width: ${Math.max(progress, 10)}%`"
                    x-text="`${progress}%`"
                ></div>
            </div>
        </div>

        <!-- Label Bottom with Size -->
        <div x-data="{ progress: 75, used: 750, total: 1000 }" class="space-y-2">
            <div
                class="h-2 w-full overflow-hidden rounded-full bg-neutral-100 dark:bg-neutral-800"
                role="progressbar"
                :aria-valuenow="progress"
                aria-valuemin="0"
                aria-valuemax="100"
            >
                <div
                    class="h-full rounded-full bg-neutral-900 transition-all duration-300 dark:bg-neutral-50"
                    :style="`width: ${progress}%`"
                ></div>
            </div>
            <div class="flex justify-end text-sm text-neutral-500 dark:text-neutral-400">
                <span class="font-medium text-neutral-900 dark:text-neutral-50" x-text="`${used}MB`"></span>
                <span x-text="`/ ${total / 1000}GB`"></span>
            </div>
        </div>
    </div>
</div>

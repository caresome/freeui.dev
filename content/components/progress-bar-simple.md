---
slug: progress-bar-simple
title: Progress Bar Simple
category: feedback
github: caresome
dependencies: []
publish_at: 2025-12-14 00:20:00
---

<div data-preview-only class="flex min-h-[200px] items-center justify-center p-8">
    <div class="w-full max-w-sm space-y-8">
        <!-- 0% -->
        <div
            x-data="{ progress: 0 }"
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

        <!-- 25% -->
        <div
            x-data="{ progress: 25 }"
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

        <!-- 50% -->
        <div
            x-data="{ progress: 50 }"
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

        <!-- 75% -->
        <div
            x-data="{ progress: 75 }"
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

        <!-- 100% -->
        <div
            x-data="{ progress: 100 }"
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
</div>

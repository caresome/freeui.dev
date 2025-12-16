---
slug: semi-circle-progress
title: Semi Circle Progress
category: loading-progress
github: caresome
dependencies: []
publish_at: 2025-12-14 00:09:00
---

<div data-preview-only class="flex min-h-[300px] flex-wrap items-center justify-center gap-12 p-8">
    <!-- Performance Gauge -->
    <div class="flex flex-col items-center">
        <div
            x-data="{ progress: 70, circumference: Math.PI * 40 }"
            class="relative h-20 w-40"
            role="progressbar"
            :aria-valuenow="progress"
            aria-valuemin="0"
            aria-valuemax="100"
        >
            <svg class="h-full w-full" viewBox="0 0 100 50" overflow="visible">
                <path
                    class="text-neutral-100 dark:text-neutral-800"
                    d="M 10 50 A 40 40 0 0 1 90 50"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="12"
                    stroke-linecap="round"
                />
                <path
                    class="text-blue-600 transition-all duration-500 dark:text-blue-500"
                    d="M 10 50 A 40 40 0 0 1 90 50"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="12"
                    stroke-linecap="round"
                    :stroke-dasharray="circumference"
                    :stroke-dashoffset="circumference - (progress / 100) * circumference"
                />
            </svg>
            <div class="absolute inset-x-0 bottom-0 flex flex-col items-center">
                <span class="text-2xl font-bold text-neutral-900 dark:text-neutral-50" x-text="`${progress}%`"></span>
                <span class="text-xs font-medium text-neutral-500 dark:text-neutral-400">Performance</span>
            </div>
        </div>
    </div>

    <!-- Rating Gauge -->
    <div class="flex flex-col items-center">
        <div
            x-data="{ progress: 90, rating: 9.0, circumference: Math.PI * 40 }"
            class="relative h-20 w-40"
            role="progressbar"
            :aria-valuenow="progress"
            aria-valuemin="0"
            aria-valuemax="100"
        >
            <svg class="h-full w-full" viewBox="0 0 100 50" overflow="visible">
                <path
                    class="text-neutral-100 dark:text-neutral-800"
                    d="M 10 50 A 40 40 0 0 1 90 50"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="8"
                    stroke-linecap="round"
                />
                <path
                    class="text-purple-600 transition-all duration-500 dark:text-purple-500"
                    d="M 10 50 A 40 40 0 0 1 90 50"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="8"
                    stroke-linecap="round"
                    :stroke-dasharray="circumference"
                    :stroke-dashoffset="circumference - (progress / 100) * circumference"
                />
            </svg>
            <div class="absolute inset-x-0 bottom-0 flex flex-col items-center">
                <span class="text-3xl font-bold text-neutral-900 dark:text-neutral-50" x-text="rating"></span>
                <span class="text-xs font-medium text-neutral-500 dark:text-neutral-400">Rating</span>
            </div>
        </div>
    </div>

    <!-- Speed Gauge -->
    <div class="flex flex-col items-center">
        <div
            x-data="{ progress: 45, circumference: Math.PI * 40 }"
            class="relative h-20 w-40"
            role="progressbar"
            :aria-valuenow="progress"
            aria-valuemin="0"
            aria-valuemax="100"
        >
            <svg class="h-full w-full" viewBox="0 0 100 50" overflow="visible">
                <path
                    class="text-neutral-100 dark:text-neutral-800"
                    d="M 10 50 A 40 40 0 0 1 90 50"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="10"
                    stroke-linecap="round"
                />
                <path
                    class="text-amber-500 transition-all duration-500 dark:text-amber-400"
                    d="M 10 50 A 40 40 0 0 1 90 50"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="10"
                    stroke-linecap="round"
                    :stroke-dasharray="circumference"
                    :stroke-dashoffset="circumference - (progress / 100) * circumference"
                />
            </svg>
            <div class="absolute inset-x-0 bottom-0 flex flex-col items-center">
                <span class="text-2xl font-bold text-neutral-900 dark:text-neutral-50" x-text="`${progress}%`"></span>
                <span class="text-xs font-medium text-neutral-500 dark:text-neutral-400">Speed</span>
            </div>
        </div>
    </div>
</div>

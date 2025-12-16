---
slug: progress-circle
title: Progress Circle
category: loading-progress
github: caresome
dependencies: []
publish_at: 2025-12-14 00:17:00
---

<div data-preview-only class="flex min-h-[200px] items-center justify-center gap-12 p-8">
    <!-- Small -->
    <div
        x-data="{ progress: 75, circumference: 2 * Math.PI * 15.9155 }"
        class="relative h-12 w-12"
        role="progressbar"
        :aria-valuenow="progress"
        aria-valuemin="0"
        aria-valuemax="100"
    >
        <svg class="h-full w-full -rotate-90 transform" viewBox="0 0 36 36">
            <circle
                class="text-neutral-100 dark:text-neutral-800"
                stroke="currentColor"
                stroke-width="3"
                fill="none"
                cx="18"
                cy="18"
                r="15.9155"
            />
            <circle
                class="text-neutral-900 transition-all duration-500 dark:text-neutral-50"
                stroke="currentColor"
                stroke-width="3"
                stroke-linecap="round"
                fill="none"
                cx="18"
                cy="18"
                r="15.9155"
                :stroke-dasharray="circumference"
                :stroke-dashoffset="circumference - (progress / 100) * circumference"
            />
        </svg>
        <div
            class="absolute inset-0 flex items-center justify-center text-xs font-semibold text-neutral-900 dark:text-neutral-50"
        >
            <span x-text="`${progress}%`"></span>
        </div>
    </div>

    <!-- Medium -->
    <div
        x-data="{ progress: 60, circumference: 2 * Math.PI * 15.9155 }"
        class="relative h-20 w-20"
        role="progressbar"
        :aria-valuenow="progress"
        aria-valuemin="0"
        aria-valuemax="100"
    >
        <svg class="h-full w-full -rotate-90 transform" viewBox="0 0 36 36">
            <circle
                class="text-neutral-100 dark:text-neutral-800"
                stroke="currentColor"
                stroke-width="3"
                fill="none"
                cx="18"
                cy="18"
                r="15.9155"
            />
            <circle
                class="text-blue-600 transition-all duration-500 dark:text-blue-500"
                stroke="currentColor"
                stroke-width="3"
                stroke-linecap="round"
                fill="none"
                cx="18"
                cy="18"
                r="15.9155"
                :stroke-dasharray="circumference"
                :stroke-dashoffset="circumference - (progress / 100) * circumference"
            />
        </svg>
        <div class="absolute inset-0 flex flex-col items-center justify-center">
            <span class="text-xs text-neutral-500 dark:text-neutral-400">Score</span>
            <span class="text-sm font-bold text-neutral-900 dark:text-neutral-50" x-text="progress"></span>
        </div>
    </div>

    <!-- Large -->
    <div
        x-data="{ progress: 45, circumference: 2 * Math.PI * 15.9155 }"
        class="relative h-32 w-32"
        role="progressbar"
        :aria-valuenow="progress"
        aria-valuemin="0"
        aria-valuemax="100"
    >
        <svg class="h-full w-full -rotate-90 transform" viewBox="0 0 36 36">
            <circle
                class="text-neutral-100 dark:text-neutral-800"
                stroke="currentColor"
                stroke-width="2"
                fill="none"
                cx="18"
                cy="18"
                r="15.9155"
            />
            <circle
                class="text-green-500 transition-all duration-500 dark:text-green-400"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                fill="none"
                cx="18"
                cy="18"
                r="15.9155"
                :stroke-dasharray="circumference"
                :stroke-dashoffset="circumference - (progress / 100) * circumference"
            />
        </svg>
        <div class="absolute inset-0 flex flex-col items-center justify-center">
            <span class="text-3xl font-bold text-neutral-900 dark:text-neutral-50" x-text="`${progress}%`"></span>
            <span class="text-xs tracking-wide text-neutral-500 uppercase dark:text-neutral-400">Complete</span>
        </div>
    </div>
</div>

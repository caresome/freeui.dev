---
slug: ring-progress
title: Ring Progress
category: feedback
github: caresome
dependencies: []
publish_at: 2025-12-14 00:10:00
---

<div data-preview-only class="flex min-h-[200px] flex-wrap items-center justify-center gap-12 p-8">
    <!-- Storage Usage -->
    <div class="flex flex-col items-center">
        <div
            x-data="{ progress: 75, radius: 40, circumference: 2 * Math.PI * 40 }"
            class="relative h-32 w-32"
            role="progressbar"
            :aria-valuenow="progress"
            aria-valuemin="0"
            aria-valuemax="100"
        >
            <svg class="h-full w-full -rotate-90 transform" viewBox="0 0 100 100">
                <circle
                    class="text-neutral-100 dark:text-neutral-800"
                    stroke="currentColor"
                    stroke-width="12"
                    fill="none"
                    cx="50"
                    cy="50"
                    r="40"
                />
                <circle
                    class="text-indigo-600 transition-all duration-500 dark:text-indigo-500"
                    stroke="currentColor"
                    stroke-width="12"
                    stroke-linecap="round"
                    fill="none"
                    cx="50"
                    cy="50"
                    r="40"
                    :stroke-dasharray="circumference"
                    :stroke-dashoffset="circumference - (progress / 100) * circumference"
                />
            </svg>
            <div class="absolute inset-0 flex flex-col items-center justify-center">
                <span class="text-xs font-medium text-neutral-500 dark:text-neutral-400">Used</span>
                <span class="text-xl font-bold text-neutral-900 dark:text-neutral-50" x-text="`${progress}%`"></span>
            </div>
        </div>
        <p class="mt-2 text-sm font-medium text-neutral-900 dark:text-neutral-50">Storage</p>
    </div>

    <!-- Tasks Done -->
    <div class="flex flex-col items-center">
        <div
            x-data="{ progress: 60, radius: 40, circumference: 2 * Math.PI * 40 }"
            class="relative h-32 w-32"
            role="progressbar"
            :aria-valuenow="progress"
            aria-valuemin="0"
            aria-valuemax="100"
        >
            <svg class="h-full w-full -rotate-90 transform" viewBox="0 0 100 100">
                <circle
                    class="text-neutral-100 dark:text-neutral-800"
                    stroke="currentColor"
                    stroke-width="8"
                    fill="none"
                    cx="50"
                    cy="50"
                    r="40"
                />
                <circle
                    class="text-emerald-500 transition-all duration-500 dark:text-emerald-400"
                    stroke="currentColor"
                    stroke-width="8"
                    stroke-linecap="round"
                    fill="none"
                    cx="50"
                    cy="50"
                    r="40"
                    :stroke-dasharray="circumference"
                    :stroke-dashoffset="circumference - (progress / 100) * circumference"
                />
            </svg>
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="rounded-full bg-emerald-50 p-3 dark:bg-emerald-500/10">
                    <svg
                        class="h-6 w-6 text-emerald-500 dark:text-emerald-400"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
            </div>
        </div>
        <p class="mt-2 text-sm font-medium text-neutral-900 dark:text-neutral-50">Tasks Done</p>
    </div>

    <!-- Pending -->
    <div class="flex flex-col items-center">
        <div
            x-data="{ progress: 30, radius: 40, circumference: 2 * Math.PI * 40 }"
            class="relative h-32 w-32"
            role="progressbar"
            :aria-valuenow="progress"
            aria-valuemin="0"
            aria-valuemax="100"
        >
            <svg class="h-full w-full -rotate-90 transform" viewBox="0 0 100 100">
                <circle
                    class="text-neutral-100 dark:text-neutral-800"
                    stroke="currentColor"
                    stroke-width="10"
                    fill="none"
                    cx="50"
                    cy="50"
                    r="40"
                />
                <circle
                    class="text-amber-500 transition-all duration-500 dark:text-amber-400"
                    stroke="currentColor"
                    stroke-width="10"
                    stroke-linecap="round"
                    fill="none"
                    cx="50"
                    cy="50"
                    r="40"
                    :stroke-dasharray="circumference"
                    :stroke-dashoffset="circumference - (progress / 100) * circumference"
                />
            </svg>
            <div class="absolute inset-0 flex flex-col items-center justify-center">
                <span class="text-2xl font-bold text-neutral-900 dark:text-neutral-50" x-text="`${progress}%`"></span>
            </div>
        </div>
        <p class="mt-2 text-sm font-medium text-neutral-900 dark:text-neutral-50">Pending</p>
    </div>
</div>

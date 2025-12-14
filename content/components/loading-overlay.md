---
slug: loading-overlay
title: Loading Overlay
category: feedback
github: caresome
dependencies: []
publish_at: 2025-12-14 00:08:00
---

<div data-preview-only class="flex min-h-[400px] items-center justify-center p-8">
    <div
        class="relative w-full max-w-sm overflow-hidden rounded-xl border border-neutral-200 bg-white shadow-sm dark:border-neutral-700 dark:bg-neutral-800"
    >
        <!-- Content behind overlay -->
        <div class="p-4">
            <div class="space-y-3">
                <div class="h-4 w-3/4 rounded bg-neutral-100 dark:bg-neutral-700"></div>
                <div class="h-4 w-full rounded bg-neutral-100 dark:bg-neutral-700"></div>
                <div class="h-4 w-5/6 rounded bg-neutral-100 dark:bg-neutral-700"></div>
            </div>
            <div class="mt-4 flex justify-end">
                <div class="h-8 w-20 rounded bg-neutral-200 dark:bg-neutral-700"></div>
            </div>
        </div>

        <!-- Overlay -->
        <div
            class="absolute inset-0 flex items-center justify-center rounded-xl bg-white/50 backdrop-blur-sm dark:bg-neutral-900/50"
        >
            <span class="sr-only">Loading...</span>
            <!-- Simple Pulse Bar -->
            <div class="flex gap-1">
                <div
                    class="h-2 w-2 animate-[pulse_1s_ease-in-out_infinite] rounded-full bg-neutral-900 dark:bg-neutral-50"
                ></div>
                <div
                    class="h-2 w-2 animate-[pulse_1s_ease-in-out_0.2s_infinite] rounded-full bg-neutral-900 dark:bg-neutral-50"
                ></div>
                <div
                    class="h-2 w-2 animate-[pulse_1s_ease-in-out_0.4s_infinite] rounded-full bg-neutral-900 dark:bg-neutral-50"
                ></div>
            </div>
        </div>
    </div>
</div>

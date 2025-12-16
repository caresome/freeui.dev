---
slug: skeleton-text
title: Skeleton Text
category: loading-progress
github: caresome
dependencies: []
publish_at: 2025-12-14 00:15:00
---

<div data-preview-only class="flex min-h-[200px] items-center justify-center p-8">
    <div class="w-full max-w-sm space-y-4">
        <!-- Define Shimmer Animation -->
        <style>
            @keyframes shimmer {
                0% {
                    background-position: 200% 0;
                }
                100% {
                    background-position: -200% 0;
                }
            }
        </style>

        <!-- Single Line -->
        <div class="relative h-4 w-3/4 overflow-hidden rounded bg-neutral-200 dark:bg-neutral-700">
            <div
                class="absolute inset-0 animate-[shimmer_1.5s_infinite] bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.5)_50%,transparent_75%)] bg-[length:200%_100%] dark:bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.15)_50%,transparent_75%)]"
            ></div>
        </div>

        <!-- Paragraph -->
        <div class="space-y-2">
            <div class="relative h-4 w-full overflow-hidden rounded bg-neutral-200 dark:bg-neutral-700">
                <div
                    class="absolute inset-0 animate-[shimmer_1.5s_infinite] bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.5)_50%,transparent_75%)] bg-[length:200%_100%] dark:bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.15)_50%,transparent_75%)]"
                ></div>
            </div>
            <div class="relative h-4 w-full overflow-hidden rounded bg-neutral-200 dark:bg-neutral-700">
                <div
                    class="absolute inset-0 animate-[shimmer_1.5s_infinite] bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.5)_50%,transparent_75%)] bg-[length:200%_100%] dark:bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.15)_50%,transparent_75%)]"
                ></div>
            </div>
            <div class="relative h-4 w-2/3 overflow-hidden rounded bg-neutral-200 dark:bg-neutral-700">
                <div
                    class="absolute inset-0 animate-[shimmer_1.5s_infinite] bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.5)_50%,transparent_75%)] bg-[length:200%_100%] dark:bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.15)_50%,transparent_75%)]"
                ></div>
            </div>
        </div>

        <!-- Heading -->
        <div class="relative h-8 w-1/2 overflow-hidden rounded-lg bg-neutral-200 dark:bg-neutral-700">
            <div
                class="absolute inset-0 animate-[shimmer_1.5s_infinite] bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.5)_50%,transparent_75%)] bg-[length:200%_100%] dark:bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.15)_50%,transparent_75%)]"
            ></div>
        </div>

        <!-- Small Text -->
        <div class="flex gap-2">
            <div class="relative h-3 w-16 overflow-hidden rounded bg-neutral-200 dark:bg-neutral-700">
                <div
                    class="absolute inset-0 animate-[shimmer_1.5s_infinite] bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.5)_50%,transparent_75%)] bg-[length:200%_100%] dark:bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.15)_50%,transparent_75%)]"
                ></div>
            </div>
            <div class="relative h-3 w-12 overflow-hidden rounded bg-neutral-200 dark:bg-neutral-700">
                <div
                    class="absolute inset-0 animate-[shimmer_1.5s_infinite] bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.5)_50%,transparent_75%)] bg-[length:200%_100%] dark:bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.15)_50%,transparent_75%)]"
                ></div>
            </div>
        </div>
    </div>
</div>

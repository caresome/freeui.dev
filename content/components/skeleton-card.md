---
slug: skeleton-card
title: Skeleton Card
category: loading-progress
github: caresome
dependencies: []
publish_at: 2025-12-14 00:14:00
---

<div data-preview-only class="flex min-h-[400px] items-center justify-center p-8">
    <div
        class="w-full max-w-sm rounded-xl border border-neutral-200 bg-white p-4 shadow-sm dark:border-neutral-700 dark:bg-neutral-800"
    >
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

        <!-- Image -->
        <div class="relative h-48 w-full overflow-hidden rounded-lg bg-neutral-200 dark:bg-neutral-700">
            <div
                class="absolute inset-0 animate-[shimmer_1.5s_infinite] bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.5)_50%,transparent_75%)] bg-[length:200%_100%] dark:bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.15)_50%,transparent_75%)]"
            ></div>
        </div>

        <div class="mt-4 space-y-3">
            <!-- Title -->
            <div class="relative h-6 w-2/3 overflow-hidden rounded bg-neutral-200 dark:bg-neutral-700">
                <div
                    class="absolute inset-0 animate-[shimmer_1.5s_infinite] bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.5)_50%,transparent_75%)] bg-[length:200%_100%] dark:bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.15)_50%,transparent_75%)]"
                ></div>
            </div>

            <!-- Description -->
            <div class="space-y-2">
                <div class="relative h-4 w-full overflow-hidden rounded bg-neutral-200 dark:bg-neutral-700">
                    <div
                        class="absolute inset-0 animate-[shimmer_1.5s_infinite] bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.5)_50%,transparent_75%)] bg-[length:200%_100%] dark:bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.15)_50%,transparent_75%)]"
                    ></div>
                </div>
                <div class="relative h-4 w-4/5 overflow-hidden rounded bg-neutral-200 dark:bg-neutral-700">
                    <div
                        class="absolute inset-0 animate-[shimmer_1.5s_infinite] bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.5)_50%,transparent_75%)] bg-[length:200%_100%] dark:bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.15)_50%,transparent_75%)]"
                    ></div>
                </div>
            </div>

            <!-- Footer/Button -->
            <div class="flex items-center justify-between pt-4">
                <div class="relative h-8 w-24 overflow-hidden rounded-lg bg-neutral-200 dark:bg-neutral-700">
                    <div
                        class="absolute inset-0 animate-[shimmer_1.5s_infinite] bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.5)_50%,transparent_75%)] bg-[length:200%_100%] dark:bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.15)_50%,transparent_75%)]"
                    ></div>
                </div>
                <div class="relative h-8 w-8 overflow-hidden rounded-full bg-neutral-200 dark:bg-neutral-700">
                    <div
                        class="absolute inset-0 animate-[shimmer_1.5s_infinite] bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.5)_50%,transparent_75%)] bg-[length:200%_100%] dark:bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.15)_50%,transparent_75%)]"
                    ></div>
                </div>
            </div>
        </div>
    </div>
</div>

---
slug: skeleton-table
title: Skeleton Table
category: loading-progress
github: caresome
dependencies: []
publish_at: 2025-12-14 00:13:00
---

<div data-preview-only class="flex min-h-[400px] items-center justify-center p-8">
    <div
        class="w-full max-w-2xl overflow-hidden rounded-xl border border-neutral-200 bg-white shadow-sm dark:border-neutral-700 dark:bg-neutral-800"
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

        <!-- Header -->
        <div class="border-b border-neutral-200 px-6 py-4 dark:border-neutral-700">
            <div class="relative h-6 w-1/4 overflow-hidden rounded bg-neutral-200 dark:bg-neutral-700">
                <div
                    class="absolute inset-0 animate-[shimmer_1.5s_infinite] bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.5)_50%,transparent_75%)] bg-[length:200%_100%] dark:bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.15)_50%,transparent_75%)]"
                ></div>
            </div>
        </div>

        <!-- Table -->
        <div class="w-full">
            <div class="flex items-center border-b border-neutral-200 px-6 py-4 dark:border-neutral-700">
                <div class="relative h-4 w-1/3 overflow-hidden rounded bg-neutral-200 dark:bg-neutral-700">
                    <div
                        class="absolute inset-0 animate-[shimmer_1.5s_infinite] bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.5)_50%,transparent_75%)] bg-[length:200%_100%] dark:bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.15)_50%,transparent_75%)]"
                    ></div>
                </div>
                <div class="relative ml-auto h-4 w-1/4 overflow-hidden rounded bg-neutral-200 dark:bg-neutral-700">
                    <div
                        class="absolute inset-0 animate-[shimmer_1.5s_infinite] bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.5)_50%,transparent_75%)] bg-[length:200%_100%] dark:bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.15)_50%,transparent_75%)]"
                    ></div>
                </div>
                <div class="relative ml-auto h-4 w-1/6 overflow-hidden rounded bg-neutral-200 dark:bg-neutral-700">
                    <div
                        class="absolute inset-0 animate-[shimmer_1.5s_infinite] bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.5)_50%,transparent_75%)] bg-[length:200%_100%] dark:bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.15)_50%,transparent_75%)]"
                    ></div>
                </div>
            </div>
            <div class="flex items-center border-b border-neutral-200 px-6 py-4 dark:border-neutral-700">
                <div class="flex w-1/3 items-center gap-3">
                    <div class="relative h-8 w-8 overflow-hidden rounded-full bg-neutral-200 dark:bg-neutral-700">
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
                <div class="relative ml-auto h-4 w-1/4 overflow-hidden rounded bg-neutral-200 dark:bg-neutral-700">
                    <div
                        class="absolute inset-0 animate-[shimmer_1.5s_infinite] bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.5)_50%,transparent_75%)] bg-[length:200%_100%] dark:bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.15)_50%,transparent_75%)]"
                    ></div>
                </div>
                <div class="relative ml-auto h-4 w-1/6 overflow-hidden rounded bg-neutral-200 dark:bg-neutral-700">
                    <div
                        class="absolute inset-0 animate-[shimmer_1.5s_infinite] bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.5)_50%,transparent_75%)] bg-[length:200%_100%] dark:bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.15)_50%,transparent_75%)]"
                    ></div>
                </div>
            </div>
            <div class="flex items-center border-b border-neutral-200 px-6 py-4 dark:border-neutral-700">
                <div class="flex w-1/3 items-center gap-3">
                    <div class="relative h-8 w-8 overflow-hidden rounded-full bg-neutral-200 dark:bg-neutral-700">
                        <div
                            class="absolute inset-0 animate-[shimmer_1.5s_infinite] bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.5)_50%,transparent_75%)] bg-[length:200%_100%] dark:bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.15)_50%,transparent_75%)]"
                        ></div>
                    </div>
                    <div class="relative h-4 w-3/4 overflow-hidden rounded bg-neutral-200 dark:bg-neutral-700">
                        <div
                            class="absolute inset-0 animate-[shimmer_1.5s_infinite] bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.5)_50%,transparent_75%)] bg-[length:200%_100%] dark:bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.15)_50%,transparent_75%)]"
                        ></div>
                    </div>
                </div>
                <div class="relative ml-auto h-4 w-1/4 overflow-hidden rounded bg-neutral-200 dark:bg-neutral-700">
                    <div
                        class="absolute inset-0 animate-[shimmer_1.5s_infinite] bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.5)_50%,transparent_75%)] bg-[length:200%_100%] dark:bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.15)_50%,transparent_75%)]"
                    ></div>
                </div>
                <div class="relative ml-auto h-4 w-1/6 overflow-hidden rounded bg-neutral-200 dark:bg-neutral-700">
                    <div
                        class="absolute inset-0 animate-[shimmer_1.5s_infinite] bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.5)_50%,transparent_75%)] bg-[length:200%_100%] dark:bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.15)_50%,transparent_75%)]"
                    ></div>
                </div>
            </div>
            <div class="flex items-center border-b border-neutral-200 px-6 py-4 dark:border-neutral-700">
                <div class="flex w-1/3 items-center gap-3">
                    <div class="relative h-8 w-8 overflow-hidden rounded-full bg-neutral-200 dark:bg-neutral-700">
                        <div
                            class="absolute inset-0 animate-[shimmer_1.5s_infinite] bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.5)_50%,transparent_75%)] bg-[length:200%_100%] dark:bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.15)_50%,transparent_75%)]"
                        ></div>
                    </div>
                    <div class="relative h-4 w-1/2 overflow-hidden rounded bg-neutral-200 dark:bg-neutral-700">
                        <div
                            class="absolute inset-0 animate-[shimmer_1.5s_infinite] bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.5)_50%,transparent_75%)] bg-[length:200%_100%] dark:bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.15)_50%,transparent_75%)]"
                        ></div>
                    </div>
                </div>
                <div class="relative ml-auto h-4 w-1/4 overflow-hidden rounded bg-neutral-200 dark:bg-neutral-700">
                    <div
                        class="absolute inset-0 animate-[shimmer_1.5s_infinite] bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.5)_50%,transparent_75%)] bg-[length:200%_100%] dark:bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.15)_50%,transparent_75%)]"
                    ></div>
                </div>
                <div class="relative ml-auto h-4 w-1/6 overflow-hidden rounded bg-neutral-200 dark:bg-neutral-700">
                    <div
                        class="absolute inset-0 animate-[shimmer_1.5s_infinite] bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.5)_50%,transparent_75%)] bg-[length:200%_100%] dark:bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.15)_50%,transparent_75%)]"
                    ></div>
                </div>
            </div>
            <div class="flex items-center px-6 py-4">
                <div class="flex w-1/3 items-center gap-3">
                    <div class="relative h-8 w-8 overflow-hidden rounded-full bg-neutral-200 dark:bg-neutral-700">
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
                <div class="relative ml-auto h-4 w-1/4 overflow-hidden rounded bg-neutral-200 dark:bg-neutral-700">
                    <div
                        class="absolute inset-0 animate-[shimmer_1.5s_infinite] bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.5)_50%,transparent_75%)] bg-[length:200%_100%] dark:bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.15)_50%,transparent_75%)]"
                    ></div>
                </div>
                <div class="relative ml-auto h-4 w-1/6 overflow-hidden rounded bg-neutral-200 dark:bg-neutral-700">
                    <div
                        class="absolute inset-0 animate-[shimmer_1.5s_infinite] bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.5)_50%,transparent_75%)] bg-[length:200%_100%] dark:bg-[linear-gradient(90deg,transparent_25%,rgba(255,255,255,0.15)_50%,transparent_75%)]"
                    ></div>
                </div>
            </div>
        </div>
    </div>
</div>

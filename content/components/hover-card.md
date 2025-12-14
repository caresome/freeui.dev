---
slug: hover-card
title: Hover Card
category: overlays
github: caresome
dependencies: []
publish_at: 2025-12-14 10:20:00
---

<div data-preview-only class="flex min-h-[300px] items-start justify-center p-8">
    <div x-data="{ show: false }" class="relative inline-block">
        <!-- Trigger Link -->
        <a
            href="#"
            @mouseenter="show = true"
            @mouseleave="show = false"
            @focus="show = true"
            @blur="show = false"
            class="font-medium text-neutral-900 underline decoration-neutral-300 decoration-2 underline-offset-2 transition-colors hover:decoration-neutral-900 dark:text-neutral-100 dark:decoration-neutral-600 dark:hover:decoration-neutral-100"
            aria-describedby="hover-card-content"
        >
            @alexjohnson
        </a>

        <!-- Hover Card Wrapper (padding bridges the gap to prevent flicker) -->
        <div
            x-show="show"
            @mouseenter="show = true"
            @mouseleave="show = false"
            class="absolute left-0 z-10 pt-1"
            x-cloak
        >
            <div
                x-transition:enter="transition ease-out duration-150"
                x-transition:enter-start="opacity-0 translate-y-1"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-100"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 translate-y-1"
                class="w-72 origin-top-left rounded-xl border border-neutral-200 bg-white p-4 shadow-lg dark:border-neutral-700 dark:bg-neutral-800"
                id="hover-card-content"
            >
                <div class="flex items-start gap-4">
                    <img
                        class="h-12 w-12 rounded-full ring-2 ring-neutral-100 dark:ring-neutral-700"
                        src="https://github.com/caresome.png"
                        alt=""
                    />
                    <div class="min-w-0 flex-1">
                        <p class="text-sm font-semibold text-neutral-900 dark:text-neutral-50">Ankit Thapa</p>
                        <p class="text-sm text-neutral-500 dark:text-neutral-400">@caresome</p>
                    </div>
                </div>

                <p class="mt-3 text-sm text-neutral-600 dark:text-neutral-300">
                    Full-stack developer passionate about creating beautiful and functional web experiences. Building
                    things with Laravel & Alpine.js.
                </p>

                <div class="mt-4 flex items-center gap-4 text-sm text-neutral-500 dark:text-neutral-400">
                    <div class="flex items-center gap-1">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                            />
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"
                            />
                        </svg>
                        <span>Nepal</span>
                    </div>
                    <div class="flex items-center gap-1">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244"
                            />
                        </svg>
                        <span>freeui.dev</span>
                    </div>
                </div>

                <div class="mt-4 flex gap-4 border-t border-neutral-200 pt-4 text-sm dark:border-neutral-700">
                    <div>
                        <span class="font-semibold text-neutral-900 dark:text-neutral-50">1.2k</span>
                        <span class="text-neutral-500 dark:text-neutral-400">Followers</span>
                    </div>
                    <div>
                        <span class="font-semibold text-neutral-900 dark:text-neutral-50">48</span>
                        <span class="text-neutral-500 dark:text-neutral-400">Following</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

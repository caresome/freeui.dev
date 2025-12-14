---
slug: hover-card-with-image
title: Hover Card With Image
category: overlays
github: caresome
dependencies: []
publish_at: 2025-12-14 10:15:00
---

<div data-preview-only class="flex min-h-[400px] items-center justify-center p-8">
    <div x-data="{ show: false }" class="relative inline-block">
        <!-- Trigger -->
        <a
            href="#"
            @mouseenter="show = true"
            @mouseleave="show = false"
            @focus="show = true"
            @blur="show = false"
            class="text-sm font-medium text-neutral-900 underline decoration-neutral-300 underline-offset-2 transition-colors hover:decoration-neutral-900 dark:text-neutral-50 dark:decoration-neutral-600 dark:hover:decoration-neutral-50"
        >
            Mountain Retreat Resort
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
                class="w-80 origin-top-left overflow-hidden rounded-xl border border-neutral-200 bg-white shadow-lg dark:border-neutral-700 dark:bg-neutral-800"
            >
                <!-- Image -->
                <div class="relative h-40">
                    <img
                        src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400&h=200&fit=crop"
                        alt="Mountain landscape"
                        class="h-full w-full object-cover"
                    />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <!-- Badge -->
                    <div class="absolute bottom-3 left-3">
                        <span
                            class="inline-flex items-center rounded-full bg-white/90 px-2 py-0.5 text-xs font-medium text-neutral-900 backdrop-blur"
                        >
                            <svg class="mr-0.5 h-3 w-3 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                />
                            </svg>
                            4.9
                        </span>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-4">
                    <h3 class="text-base font-semibold text-neutral-900 dark:text-neutral-50">
                        Mountain Retreat Resort
                    </h3>
                    <p class="mt-1 flex items-center gap-1 text-sm text-neutral-500 dark:text-neutral-400">
                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
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
                        Swiss Alps, Switzerland
                    </p>

                    <p class="mt-3 text-sm text-neutral-600 dark:text-neutral-300">
                        A luxurious mountain retreat offering stunning alpine views, world-class amenities, and
                        unforgettable experiences.
                    </p>

                    <div class="mt-4 flex items-center justify-between">
                        <div>
                            <span class="text-lg font-bold text-neutral-900 dark:text-neutral-50">$299</span>
                            <span class="text-sm text-neutral-500 dark:text-neutral-400">/night</span>
                        </div>
                        <button
                            type="button"
                            class="rounded-lg bg-neutral-900 px-3 py-1.5 text-sm font-medium text-white transition-all hover:bg-neutral-800 active:scale-[0.98] dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100"
                        >
                            Book now
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

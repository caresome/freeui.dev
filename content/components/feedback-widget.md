---
slug: feedback-widget
title: Feedback Widget
category: voting
github: caresome
dependencies: []
publish_at: 2025-12-07 13:00:00
---

<div data-preview-only class="flex min-h-[400px] items-end justify-center pb-8">
    <div x-data="{ open: false, mood: null, submitted: false, hovering: null }" class="relative">
        <!-- Feedback Button -->
        <button
            @click="open = !open; submitted = false"
            type="button"
            :class="open
                ? 'bg-neutral-800 text-white dark:bg-neutral-200 dark:text-neutral-900'
                : 'bg-neutral-900 text-white hover:bg-neutral-800 dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100'"
            class="inline-flex items-center gap-2 rounded-full px-4 py-2.5 text-sm font-medium shadow-lg transition-all duration-150 hover:scale-105 active:scale-95"
        >
            <svg
                class="h-4 w-4 transition-transform duration-200"
                :class="open ? 'rotate-45' : ''"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
            >
                <path
                    x-show="!open"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z"
                />
                <path x-show="open" stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
            <span x-text="open ? 'Close' : 'Feedback'"></span>
        </button>

        <!-- Feedback Panel -->
        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 translate-y-2 scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0 scale-100"
            x-transition:leave-end="opacity-0 translate-y-2 scale-95"
            class="absolute bottom-full left-0 mb-3 w-80 origin-bottom-left rounded-xl border border-neutral-200/80 bg-white p-4 shadow-xl dark:border-neutral-700/80 dark:bg-neutral-800"
            @click.outside="open = false"
            x-cloak
        >
            <!-- Success State -->
            <div x-show="submitted" class="py-6 text-center">
                <div
                    class="mx-auto mb-3 flex h-12 w-12 items-center justify-center rounded-full bg-green-100 dark:bg-green-500/10"
                >
                    <svg
                        class="h-6 w-6 text-green-600 dark:text-green-400"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                </div>
                <h4 class="text-base font-semibold text-neutral-900 dark:text-neutral-50">Thank you!</h4>
                <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">Your feedback helps us improve.</p>
            </div>

            <!-- Form State -->
            <div x-show="!submitted">
                <h4 class="text-base font-semibold text-neutral-900 dark:text-neutral-50">Send us feedback</h4>
                <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">
                    How are you feeling about our product?
                </p>

                <!-- Mood Selector -->
                <div class="mt-4 flex justify-center gap-2">
                    <button
                        @click="mood = 'sad'"
                        @mouseenter="hovering = 'sad'"
                        @mouseleave="hovering = null"
                        type="button"
                        :class="mood === 'sad'
                            ? 'bg-red-100 ring-2 ring-red-500 dark:bg-red-500/20'
                            : 'bg-neutral-100 hover:bg-neutral-200 dark:bg-neutral-700 dark:hover:bg-neutral-600'"
                        class="flex h-12 w-12 items-center justify-center rounded-xl transition-all duration-150 hover:scale-110"
                    >
                        <span x-show="hovering !== 'sad'" class="text-2xl">😞</span>
                        <img
                            x-show="hovering === 'sad'"
                            src="https://fonts.gstatic.com/s/e/notoemoji/latest/1f61e/512.webp"
                            class="h-8 w-8"
                            alt="sad"
                        />
                    </button>
                    <button
                        @click="mood = 'neutral'"
                        @mouseenter="hovering = 'neutral'"
                        @mouseleave="hovering = null"
                        type="button"
                        :class="mood === 'neutral'
                            ? 'bg-amber-100 ring-2 ring-amber-500 dark:bg-amber-500/20'
                            : 'bg-neutral-100 hover:bg-neutral-200 dark:bg-neutral-700 dark:hover:bg-neutral-600'"
                        class="flex h-12 w-12 items-center justify-center rounded-xl transition-all duration-150 hover:scale-110"
                    >
                        <span x-show="hovering !== 'neutral'" class="text-2xl">😐</span>
                        <img
                            x-show="hovering === 'neutral'"
                            src="https://fonts.gstatic.com/s/e/notoemoji/latest/1f610/512.webp"
                            class="h-8 w-8"
                            alt="neutral"
                        />
                    </button>
                    <button
                        @click="mood = 'happy'"
                        @mouseenter="hovering = 'happy'"
                        @mouseleave="hovering = null"
                        type="button"
                        :class="mood === 'happy'
                            ? 'bg-green-100 ring-2 ring-green-500 dark:bg-green-500/20'
                            : 'bg-neutral-100 hover:bg-neutral-200 dark:bg-neutral-700 dark:hover:bg-neutral-600'"
                        class="flex h-12 w-12 items-center justify-center rounded-xl transition-all duration-150 hover:scale-110"
                    >
                        <span x-show="hovering !== 'happy'" class="text-2xl">😊</span>
                        <img
                            x-show="hovering === 'happy'"
                            src="https://fonts.gstatic.com/s/e/notoemoji/latest/1f60a/512.webp"
                            class="h-8 w-8"
                            alt="happy"
                        />
                    </button>
                </div>

                <!-- Feedback Textarea -->
                <div class="mt-4">
                    <textarea
                        rows="3"
                        placeholder="Tell us more about your experience..."
                        class="block w-full resize-none rounded-lg border border-neutral-200/80 bg-white px-3 py-2 text-sm text-neutral-900 placeholder-neutral-400 transition-colors focus:border-neutral-400 focus:ring-0 focus:outline-none dark:border-neutral-600 dark:bg-neutral-700 dark:text-neutral-100 dark:placeholder-neutral-500 dark:focus:border-neutral-500"
                    ></textarea>
                </div>

                <!-- Submit Button -->
                <button
                    @click="submitted = true"
                    type="button"
                    :disabled="!mood"
                    :class="mood
                        ? 'bg-neutral-900 text-white hover:bg-neutral-800 dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100'
                        : 'cursor-not-allowed bg-neutral-100 text-neutral-400 dark:bg-neutral-700 dark:text-neutral-500'"
                    class="mt-4 w-full rounded-lg px-4 py-2.5 text-sm font-medium shadow-sm transition-all duration-150 active:scale-[0.98]"
                >
                    Submit Feedback
                </button>
            </div>
        </div>
    </div>
</div>

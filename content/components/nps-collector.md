---
slug: nps-collector
title: NPS Collector
category: voting
github: caresome
dependencies: []
publish_at: 2025-12-07 12:00:00
---

<div data-preview-only class="mx-auto max-w-lg">
    <div
        x-data="{ score: null, showFollowUp: false }"
        class="rounded-xl border border-neutral-200 bg-white p-5 shadow-sm dark:border-neutral-800 dark:bg-neutral-900"
    >
        <h3 class="text-base font-semibold text-neutral-900 dark:text-neutral-50">
            How likely are you to recommend us to a friend or colleague?
        </h3>

        <div class="mt-4">
            <div class="mb-2 flex items-center justify-between text-xs text-neutral-500 dark:text-neutral-400">
                <span>Not at all likely</span>
                <span>Extremely likely</span>
            </div>

            <div class="flex justify-between gap-1">
                <template x-for="n in 11" :key="n">
                    <button
                        @click="score = n - 1; showFollowUp = true"
                        type="button"
                        :class="{
                            'bg-red-500 text-white dark:bg-red-500': score === n - 1 && n - 1 <= 6,
                            'bg-amber-500 text-white dark:bg-amber-500': score === n - 1 && (n - 1 === 7 || n - 1 === 8),
                            'bg-green-500 text-white dark:bg-green-500': score === n - 1 && n - 1 >= 9,
                            'bg-red-50 text-red-600 hover:bg-red-100 dark:bg-red-500/10 dark:text-red-400 dark:hover:bg-red-500/20': score !== n - 1 && n - 1 <= 6,
                            'bg-amber-50 text-amber-600 hover:bg-amber-100 dark:bg-amber-500/10 dark:text-amber-400 dark:hover:bg-amber-500/20': score !== n - 1 && (n - 1 === 7 || n - 1 === 8),
                            'bg-green-50 text-green-600 hover:bg-green-100 dark:bg-green-500/10 dark:text-green-400 dark:hover:bg-green-500/20': score !== n - 1 && n - 1 >= 9
                        }"
                        class="flex h-10 w-10 items-center justify-center rounded-lg text-sm font-semibold transition-all duration-150 hover:scale-105 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-offset-2 active:scale-95 dark:focus-visible:ring-neutral-100"
                        x-text="n - 1"
                    ></button>
                </template>
            </div>

            <div class="mt-3 flex justify-between text-xs">
                <span
                    class="rounded-full bg-red-50 px-2 py-0.5 font-medium text-red-600 dark:bg-red-500/10 dark:text-red-400"
                >
                    Detractors (0-6)
                </span>
                <span
                    class="rounded-full bg-amber-50 px-2 py-0.5 font-medium text-amber-600 dark:bg-amber-500/10 dark:text-amber-400"
                >
                    Passives (7-8)
                </span>
                <span
                    class="rounded-full bg-green-50 px-2 py-0.5 font-medium text-green-600 dark:bg-green-500/10 dark:text-green-400"
                >
                    Promoters (9-10)
                </span>
            </div>
        </div>

        <div
            x-show="showFollowUp"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            class="mt-4 border-t border-neutral-200 pt-4 dark:border-neutral-800"
        >
            <label for="nps-feedback" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300">
                <span
                    x-text="score <= 6 ? 'What could we do better?' : score <= 8 ? 'What would make us a 10?' : 'What do you love most about us?'"
                ></span>
            </label>
            <textarea
                id="nps-feedback"
                rows="3"
                placeholder="Your feedback helps us improve..."
                class="mt-2 block w-full rounded-lg border border-neutral-200 bg-white px-3 py-2 text-sm text-neutral-900 placeholder-neutral-400 transition-colors focus:border-neutral-400 focus:ring-0 focus:outline-none dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-100 dark:placeholder-neutral-500 dark:focus:border-neutral-600"
            ></textarea>

            <div class="mt-4 flex justify-end">
                <button
                    type="button"
                    class="rounded-lg bg-neutral-900 px-4 py-2 text-sm font-medium text-white shadow-sm transition-all duration-150 hover:bg-neutral-800 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-offset-2 active:scale-[0.98] dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100 dark:focus-visible:ring-neutral-100"
                >
                    Submit Feedback
                </button>
            </div>
        </div>
    </div>
</div>

---
slug: report-button
title: Report Button
category: voting
github: caresome
dependencies: []
publish_at: 2025-12-07 14:00:00
---

<div data-preview-only class="flex min-h-[120px] items-center justify-center">
    <div x-data="{ open: false, selected: null, submitted: false }" class="relative inline-block">
        <!-- Report Button -->
        <button
            @click="open = !open; submitted = false; selected = null"
            type="button"
            :class="open || submitted
                ? 'text-red-600 dark:text-red-400'
                : 'text-neutral-400 hover:text-red-600 dark:hover:text-red-400'"
            class="inline-flex items-center gap-1.5 rounded-lg px-3 py-2 text-sm font-medium transition-all duration-150 hover:bg-red-50 dark:hover:bg-red-500/10"
        >
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M3 3v1.5M3 21v-6m0 0l2.77-.693a9 9 0 016.208.682l.108.054a9 9 0 006.086.71l3.114-.732a48.524 48.524 0 01-.005-10.499l-3.11.732a9 9 0 01-6.085-.711l-.108-.054a9 9 0 00-6.208-.682L3 4.5M3 15V4.5"
                />
            </svg>
            <span x-text="submitted ? 'Reported' : 'Report'"></span>
        </button>

        <!-- Dropdown Menu -->
        <div
            x-show="open && !submitted"
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            @click.outside="open = false"
            class="absolute left-0 z-10 mt-1 w-56 origin-top-left rounded-xl border border-neutral-200/80 bg-white p-1.5 shadow-xl shadow-neutral-900/5 dark:border-neutral-700/80 dark:bg-neutral-800 dark:shadow-neutral-950/50"
            x-cloak
        >
            <p class="px-3 py-2 text-xs font-medium tracking-wider text-neutral-500 uppercase dark:text-neutral-400">
                Report this content as:
            </p>

            <button
                @click="selected = 'spam'"
                type="button"
                :class="selected === 'spam'
                    ? 'bg-red-50 text-red-600 dark:bg-red-500/10 dark:text-red-400'
                    : 'text-neutral-700 hover:bg-neutral-100 dark:text-neutral-300 dark:hover:bg-neutral-700'"
                class="flex w-full items-center gap-3 rounded-lg px-3 py-2 text-left text-sm transition-colors"
            >
                <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"
                    />
                </svg>
                Spam or misleading
            </button>

            <button
                @click="selected = 'inappropriate'"
                type="button"
                :class="selected === 'inappropriate'
                    ? 'bg-red-50 text-red-600 dark:bg-red-500/10 dark:text-red-400'
                    : 'text-neutral-700 hover:bg-neutral-100 dark:text-neutral-300 dark:hover:bg-neutral-700'"
                class="flex w-full items-center gap-3 rounded-lg px-3 py-2 text-left text-sm transition-colors"
            >
                <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"
                    />
                </svg>
                Inappropriate content
            </button>

            <button
                @click="selected = 'harassment'"
                type="button"
                :class="selected === 'harassment'
                    ? 'bg-red-50 text-red-600 dark:bg-red-500/10 dark:text-red-400'
                    : 'text-neutral-700 hover:bg-neutral-100 dark:text-neutral-300 dark:hover:bg-neutral-700'"
                class="flex w-full items-center gap-3 rounded-lg px-3 py-2 text-left text-sm transition-colors"
            >
                <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"
                    />
                </svg>
                Harassment or hate speech
            </button>

            <button
                @click="selected = 'misinformation'"
                type="button"
                :class="selected === 'misinformation'
                    ? 'bg-red-50 text-red-600 dark:bg-red-500/10 dark:text-red-400'
                    : 'text-neutral-700 hover:bg-neutral-100 dark:text-neutral-300 dark:hover:bg-neutral-700'"
                class="flex w-full items-center gap-3 rounded-lg px-3 py-2 text-left text-sm transition-colors"
            >
                <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"
                    />
                </svg>
                Misinformation
            </button>

            <div class="my-1.5 border-t border-neutral-200/80 dark:border-neutral-700/80"></div>

            <button
                @click="submitted = true; open = false"
                type="button"
                :disabled="!selected"
                :class="selected
                    ? 'bg-red-600 text-white hover:bg-red-700 dark:bg-red-600 dark:hover:bg-red-700'
                    : 'cursor-not-allowed bg-neutral-100 text-neutral-400 dark:bg-neutral-700 dark:text-neutral-500'"
                class="flex w-full items-center justify-center gap-2 rounded-lg px-3 py-2 text-sm font-medium transition-all duration-150 active:scale-[0.98]"
            >
                Submit Report
            </button>
        </div>

        <!-- Submitted Confirmation Tooltip -->
        <div
            x-show="submitted"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 translate-y-1"
            x-transition:enter-end="opacity-100 translate-y-0"
            class="absolute left-0 z-10 mt-1 flex w-72 items-start gap-3 rounded-lg border border-green-200 bg-green-50 p-3 shadow-lg dark:border-green-800 dark:bg-green-900/50"
        >
            <svg
                class="h-5 w-5 shrink-0 text-green-600 dark:text-green-400"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                />
            </svg>
            <p class="flex-1 text-sm text-green-700 dark:text-green-300">
                Thanks for reporting. We'll review this content.
            </p>
            <button
                @click="submitted = false"
                type="button"
                class="shrink-0 rounded p-0.5 text-green-600 transition-colors hover:bg-green-100 hover:text-green-800 dark:text-green-400 dark:hover:bg-green-800/50 dark:hover:text-green-300"
            >
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
</div>

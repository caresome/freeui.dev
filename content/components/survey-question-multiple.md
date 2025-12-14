---
slug: survey-question-multiple
title: Survey Question Multiple
category: voting
github: caresome
dependencies: []
publish_at: 2025-12-07 10:00:00
---

<div data-preview-only class="mx-auto max-w-md">
    <div
        x-data="{ selected: [] }"
        class="rounded-xl border border-neutral-200 bg-white p-5 shadow-sm dark:border-neutral-800 dark:bg-neutral-900"
    >
        <div class="mb-1 flex items-center gap-2">
            <span
                class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-neutral-100 text-xs font-semibold text-neutral-600 dark:bg-neutral-800 dark:text-neutral-400"
            >
                2
            </span>
            <span class="text-xs font-medium tracking-wider text-neutral-500 uppercase dark:text-neutral-400">
                Optional
            </span>
        </div>
        <h3 class="text-base font-semibold text-neutral-900 dark:text-neutral-50">
            Which features do you use most often?
        </h3>
        <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">Select all that apply</p>

        <div class="mt-4 space-y-2">
            <label
                class="flex cursor-pointer items-center gap-3 rounded-lg border p-3 transition-all duration-150 has-[:focus-visible]:outline has-[:focus-visible]:outline-2 has-[:focus-visible]:outline-offset-2 has-[:focus-visible]:outline-neutral-900 dark:has-[:focus-visible]:outline-neutral-100"
                :class="selected.includes('dashboard')
                    ? 'border-neutral-900 bg-neutral-50 dark:border-neutral-50 dark:bg-neutral-800'
                    : 'border-neutral-200 hover:border-neutral-300 hover:bg-neutral-50 dark:border-neutral-700 dark:hover:border-neutral-600 dark:hover:bg-neutral-800'"
            >
                <input type="checkbox" value="dashboard" x-model="selected" class="sr-only focus:outline-none" />
                <span
                    class="flex h-4 w-4 shrink-0 items-center justify-center rounded border-2 transition-colors"
                    :class="selected.includes('dashboard')
                        ? 'border-neutral-900 bg-neutral-900 dark:border-neutral-50 dark:bg-neutral-50'
                        : 'border-neutral-300 dark:border-neutral-600'"
                >
                    <svg
                        x-show="selected.includes('dashboard')"
                        class="h-3 w-3 text-white dark:text-neutral-900"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="3"
                        stroke="currentColor"
                        aria-hidden="true"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                </span>
                <span class="text-sm font-medium text-neutral-700 dark:text-neutral-300">Dashboard & Analytics</span>
            </label>

            <label
                class="flex cursor-pointer items-center gap-3 rounded-lg border p-3 transition-all duration-150 has-[:focus-visible]:outline has-[:focus-visible]:outline-2 has-[:focus-visible]:outline-offset-2 has-[:focus-visible]:outline-neutral-900 dark:has-[:focus-visible]:outline-neutral-100"
                :class="selected.includes('reports')
                    ? 'border-neutral-900 bg-neutral-50 dark:border-neutral-50 dark:bg-neutral-800'
                    : 'border-neutral-200 hover:border-neutral-300 hover:bg-neutral-50 dark:border-neutral-700 dark:hover:border-neutral-600 dark:hover:bg-neutral-800'"
            >
                <input type="checkbox" value="reports" x-model="selected" class="sr-only focus:outline-none" />
                <span
                    class="flex h-4 w-4 shrink-0 items-center justify-center rounded border-2 transition-colors"
                    :class="selected.includes('reports')
                        ? 'border-neutral-900 bg-neutral-900 dark:border-neutral-50 dark:bg-neutral-50'
                        : 'border-neutral-300 dark:border-neutral-600'"
                >
                    <svg
                        x-show="selected.includes('reports')"
                        class="h-3 w-3 text-white dark:text-neutral-900"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="3"
                        stroke="currentColor"
                        aria-hidden="true"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                </span>
                <span class="text-sm font-medium text-neutral-700 dark:text-neutral-300">Reports & Exports</span>
            </label>

            <label
                class="flex cursor-pointer items-center gap-3 rounded-lg border p-3 transition-all duration-150 has-[:focus-visible]:outline has-[:focus-visible]:outline-2 has-[:focus-visible]:outline-offset-2 has-[:focus-visible]:outline-neutral-900 dark:has-[:focus-visible]:outline-neutral-100"
                :class="selected.includes('team')
                    ? 'border-neutral-900 bg-neutral-50 dark:border-neutral-50 dark:bg-neutral-800'
                    : 'border-neutral-200 hover:border-neutral-300 hover:bg-neutral-50 dark:border-neutral-700 dark:hover:border-neutral-600 dark:hover:bg-neutral-800'"
            >
                <input type="checkbox" value="team" x-model="selected" class="sr-only focus:outline-none" />
                <span
                    class="flex h-4 w-4 shrink-0 items-center justify-center rounded border-2 transition-colors"
                    :class="selected.includes('team')
                        ? 'border-neutral-900 bg-neutral-900 dark:border-neutral-50 dark:bg-neutral-50'
                        : 'border-neutral-300 dark:border-neutral-600'"
                >
                    <svg
                        x-show="selected.includes('team')"
                        class="h-3 w-3 text-white dark:text-neutral-900"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="3"
                        stroke="currentColor"
                        aria-hidden="true"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                </span>
                <span class="text-sm font-medium text-neutral-700 dark:text-neutral-300">Team Collaboration</span>
            </label>

            <label
                class="flex cursor-pointer items-center gap-3 rounded-lg border p-3 transition-all duration-150 has-[:focus-visible]:outline has-[:focus-visible]:outline-2 has-[:focus-visible]:outline-offset-2 has-[:focus-visible]:outline-neutral-900 dark:has-[:focus-visible]:outline-neutral-100"
                :class="selected.includes('integrations')
                    ? 'border-neutral-900 bg-neutral-50 dark:border-neutral-50 dark:bg-neutral-800'
                    : 'border-neutral-200 hover:border-neutral-300 hover:bg-neutral-50 dark:border-neutral-700 dark:hover:border-neutral-600 dark:hover:bg-neutral-800'"
            >
                <input type="checkbox" value="integrations" x-model="selected" class="sr-only focus:outline-none" />
                <span
                    class="flex h-4 w-4 shrink-0 items-center justify-center rounded border-2 transition-colors"
                    :class="selected.includes('integrations')
                        ? 'border-neutral-900 bg-neutral-900 dark:border-neutral-50 dark:bg-neutral-50'
                        : 'border-neutral-300 dark:border-neutral-600'"
                >
                    <svg
                        x-show="selected.includes('integrations')"
                        class="h-3 w-3 text-white dark:text-neutral-900"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="3"
                        stroke="currentColor"
                        aria-hidden="true"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                </span>
                <span class="text-sm font-medium text-neutral-700 dark:text-neutral-300">Integrations & API</span>
            </label>

            <label
                class="flex cursor-pointer items-center gap-3 rounded-lg border p-3 transition-all duration-150 has-[:focus-visible]:outline has-[:focus-visible]:outline-2 has-[:focus-visible]:outline-offset-2 has-[:focus-visible]:outline-neutral-900 dark:has-[:focus-visible]:outline-neutral-100"
                :class="selected.includes('settings')
                    ? 'border-neutral-900 bg-neutral-50 dark:border-neutral-50 dark:bg-neutral-800'
                    : 'border-neutral-200 hover:border-neutral-300 hover:bg-neutral-50 dark:border-neutral-700 dark:hover:border-neutral-600 dark:hover:bg-neutral-800'"
            >
                <input type="checkbox" value="settings" x-model="selected" class="sr-only focus:outline-none" />
                <span
                    class="flex h-4 w-4 shrink-0 items-center justify-center rounded border-2 transition-colors"
                    :class="selected.includes('settings')
                        ? 'border-neutral-900 bg-neutral-900 dark:border-neutral-50 dark:bg-neutral-50'
                        : 'border-neutral-300 dark:border-neutral-600'"
                >
                    <svg
                        x-show="selected.includes('settings')"
                        class="h-3 w-3 text-white dark:text-neutral-900"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="3"
                        stroke="currentColor"
                        aria-hidden="true"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                </span>
                <span class="text-sm font-medium text-neutral-700 dark:text-neutral-300">Settings & Customization</span>
            </label>
        </div>

        <div class="mt-4 flex items-center justify-between">
            <span class="text-sm text-neutral-500 dark:text-neutral-400" x-text="selected.length + ' selected'"></span>
            <div class="flex gap-2">
                <button
                    type="button"
                    class="rounded-lg px-4 py-2 text-sm font-medium text-neutral-600 transition-all duration-150 hover:bg-neutral-100 hover:text-neutral-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:outline-neutral-100"
                >
                    Skip
                </button>
                <button
                    type="button"
                    class="inline-flex items-center gap-2 rounded-lg bg-neutral-900 px-4 py-2 text-sm font-medium text-white shadow-sm transition-all duration-150 hover:bg-neutral-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 active:scale-[0.98] dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100 dark:focus-visible:outline-neutral-100"
                >
                    Next
                    <svg
                        class="h-4 w-4"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                        aria-hidden="true"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>

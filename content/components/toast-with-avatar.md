---
slug: toast-with-avatar
title: Toast With Avatar
category: feedback
github: caresome
dependencies: []
publish_at: 2025-12-14 00:30:00
---

<div data-preview-only class="flex min-h-[200px] items-center justify-center p-8">
    <div x-data="{ open: true }" class="relative">
        <button
            @click="open = true"
            type="button"
            class="rounded-lg bg-neutral-900 px-4 py-2.5 text-sm font-medium text-white shadow-sm transition-colors duration-150 hover:bg-neutral-800 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-offset-2 dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100 dark:focus-visible:ring-neutral-100"
        >
            Show Toast
        </button>

        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="absolute bottom-full left-1/2 mb-4 flex w-max -translate-x-1/2 items-center gap-3 rounded-xl border border-neutral-200 bg-white p-4 shadow-lg dark:border-neutral-700 dark:bg-neutral-800"
            role="status"
            aria-live="polite"
        >
            <div class="relative">
                <img
                    src="https://ui-avatars.com/api/?name=Alex+Morgan&background=random"
                    alt="Alex Morgan"
                    class="h-9 w-9 rounded-full object-cover"
                />
                <span
                    class="absolute right-0 bottom-0 block h-2.5 w-2.5 rounded-full bg-green-500 ring-2 ring-white dark:ring-neutral-800"
                ></span>
            </div>

            <div class="flex flex-col">
                <p class="text-sm font-medium text-neutral-900 dark:text-neutral-50">Alex Morgan</p>
                <p class="text-xs text-neutral-500 dark:text-neutral-400">Sent you a message</p>
            </div>

            <button
                @click="open = false"
                type="button"
                class="ml-2 rounded-md p-1 text-neutral-400 transition-colors duration-150 hover:bg-neutral-100 hover:text-neutral-500 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 dark:text-neutral-500 dark:hover:bg-neutral-700 dark:hover:text-neutral-400 dark:focus-visible:ring-neutral-100"
                aria-label="Close"
            >
                <svg
                    class="h-4 w-4"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    aria-hidden="true"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
</div>

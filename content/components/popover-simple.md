---
slug: popover-simple
title: Popover Simple
category: menus-dropdowns
github: caresome
dependencies: []
publish_at: 2025-12-14 10:55:00
---

<div data-preview-only class="flex min-h-[300px] items-start justify-center p-8">
    <div
        x-data="{ open: false }"
        @keydown.escape.window="if (open) { open = false; $refs.trigger.focus(); }"
        class="relative"
    >
        <!-- Trigger Button -->
        <button
            x-ref="trigger"
            @click="open = !open"
            type="button"
            class="inline-flex items-center gap-2 rounded-lg bg-white px-4 py-2.5 text-sm font-medium text-neutral-700 shadow-sm ring-1 ring-neutral-200 transition-all hover:bg-neutral-50 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:bg-neutral-800 dark:text-neutral-300 dark:ring-neutral-700 dark:hover:bg-neutral-700 dark:focus-visible:outline-neutral-100"
            :aria-expanded="open"
            aria-haspopup="dialog"
        >
            <svg
                class="h-4 w-4 text-neutral-400"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
                aria-hidden="true"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z"
                />
            </svg>
            More info
        </button>

        <!-- Popover -->
        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            @click.outside="open = false; $refs.trigger.focus()"
            class="absolute left-0 z-10 mt-2 w-72 origin-top-left rounded-lg border border-neutral-200 bg-white p-4 shadow-lg dark:border-neutral-700 dark:bg-neutral-800"
            role="dialog"
            aria-modal="false"
            x-cloak
        >
            <h3 class="text-sm font-semibold text-neutral-900 dark:text-neutral-50">Quick tip</h3>
            <p class="mt-2 text-sm text-neutral-600 dark:text-neutral-400">
                This is a simple popover component that can display additional information, tips, or context about an
                element without navigating away from the current page.
            </p>
            <div class="mt-3">
                <a
                    href="#"
                    class="rounded-lg text-sm font-medium text-neutral-900 hover:underline focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:text-neutral-100 dark:focus-visible:outline-neutral-100"
                >
                    Learn more →
                </a>
            </div>
        </div>
    </div>
</div>

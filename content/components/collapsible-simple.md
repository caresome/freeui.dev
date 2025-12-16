---
slug: collapsible-simple
title: Collapsible Simple
category: tabs-accordions
github: caresome
dependencies:
    - '@alpinejs/collapse https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js'
publish_at: 2025-12-14 00:12:00
---

<div data-preview-only class="flex min-h-[400px] items-start justify-center p-4 sm:p-8">
    <div class="w-full max-w-md space-y-3 sm:space-y-4">
        <!-- Item 1 -->
        <div
            x-data="{ open: false }"
            class="overflow-hidden rounded-xl border border-neutral-200 bg-white dark:border-neutral-700 dark:bg-neutral-800"
        >
            <button
                @click="open = !open"
                type="button"
                class="flex w-full items-center justify-between gap-3 px-3 py-2.5 text-left text-sm font-medium text-neutral-900 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-inset sm:px-4 sm:py-3 dark:text-neutral-50 dark:focus-visible:ring-neutral-100"
                :class="open ? 'bg-neutral-50 dark:bg-neutral-700' : 'hover:bg-neutral-50 dark:hover:bg-neutral-700'"
                :aria-expanded="open"
            >
                <span>What is included in the free plan?</span>
                <svg
                    class="h-5 w-5 shrink-0 text-neutral-500 transition-transform duration-200 dark:text-neutral-400"
                    :class="open ? 'rotate-180' : ''"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div
                x-show="open"
                x-collapse
                x-cloak
                class="border-t border-neutral-200 px-3 py-2.5 text-sm text-neutral-500 sm:px-4 sm:py-3 dark:border-neutral-700 dark:text-neutral-400"
            >
                The free plan includes up to 3 projects, 100MB of storage, and basic support. You can upgrade at any
                time to access more features.
            </div>
        </div>

        <!-- Item 2 -->
        <div
            x-data="{ open: false }"
            class="overflow-hidden rounded-xl border border-neutral-200 bg-white dark:border-neutral-700 dark:bg-neutral-800"
        >
            <button
                @click="open = !open"
                type="button"
                class="flex w-full items-center justify-between gap-3 px-3 py-2.5 text-left text-sm font-medium text-neutral-900 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-inset sm:px-4 sm:py-3 dark:text-neutral-50 dark:focus-visible:ring-neutral-100"
                :class="open ? 'bg-neutral-50 dark:bg-neutral-700' : 'hover:bg-neutral-50 dark:hover:bg-neutral-700'"
                :aria-expanded="open"
            >
                <span>Can I cancel my subscription?</span>
                <svg
                    class="h-5 w-5 shrink-0 text-neutral-500 transition-transform duration-200 dark:text-neutral-400"
                    :class="open ? 'rotate-180' : ''"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div
                x-show="open"
                x-collapse
                x-cloak
                class="border-t border-neutral-200 px-3 py-2.5 text-sm text-neutral-500 sm:px-4 sm:py-3 dark:border-neutral-700 dark:text-neutral-400"
            >
                Yes, you can cancel your subscription at any time. Your access will continue until the end of the
                current billing period.
            </div>
        </div>

        <!-- Item 3 -->
        <div
            x-data="{ open: false }"
            class="overflow-hidden rounded-xl border border-neutral-200 bg-white dark:border-neutral-700 dark:bg-neutral-800"
        >
            <button
                @click="open = !open"
                type="button"
                class="flex w-full items-center justify-between gap-3 px-3 py-2.5 text-left text-sm font-medium text-neutral-900 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-inset sm:px-4 sm:py-3 dark:text-neutral-50 dark:focus-visible:ring-neutral-100"
                :class="open ? 'bg-neutral-50 dark:bg-neutral-700' : 'hover:bg-neutral-50 dark:hover:bg-neutral-700'"
                :aria-expanded="open"
            >
                <span>Do you offer refunds?</span>
                <svg
                    class="h-5 w-5 shrink-0 text-neutral-500 transition-transform duration-200 dark:text-neutral-400"
                    :class="open ? 'rotate-180' : ''"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div
                x-show="open"
                x-collapse
                x-cloak
                class="border-t border-neutral-200 px-3 py-2.5 text-sm text-neutral-500 sm:px-4 sm:py-3 dark:border-neutral-700 dark:text-neutral-400"
            >
                We offer a 30-day money-back guarantee for all new subscriptions. If you're not satisfied, contact
                support for a full refund.
            </div>
        </div>
    </div>
</div>

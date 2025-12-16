---
slug: accordion-simple
title: Accordion Simple
category: tabs-accordions
github: caresome
dependencies:
    - '@alpinejs/collapse https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js'
publish_at: 2025-12-15 12:00:00
---

<div data-preview-only class="flex min-h-[400px] items-start justify-center p-4 sm:p-8">
    <div
        x-data="{ activeItem: null }"
        class="w-full max-w-lg divide-y divide-neutral-200 overflow-hidden rounded-xl border border-neutral-200 bg-white dark:divide-neutral-700 dark:border-neutral-700 dark:bg-neutral-800"
    >
        <!-- Item 1 -->
        <div>
            <button
                @click="activeItem = activeItem === 1 ? null : 1"
                type="button"
                class="flex w-full items-center justify-between gap-3 px-3 py-3 text-left text-sm font-medium text-neutral-900 transition-colors hover:bg-neutral-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-inset sm:px-4 sm:py-4 dark:text-neutral-50 dark:hover:bg-neutral-700 dark:focus-visible:ring-neutral-100"
                :class="activeItem === 1 ? 'bg-neutral-50 dark:bg-neutral-700' : ''"
                :aria-expanded="activeItem === 1"
                aria-controls="accordion-content-1"
            >
                <span>What is your refund policy?</span>
                <svg
                    :class="activeItem === 1 ? 'rotate-180' : ''"
                    class="h-5 w-5 shrink-0 text-neutral-500 transition-transform duration-150 dark:text-neutral-400"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    aria-hidden="true"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>
            </button>
            <div x-show="activeItem === 1" x-collapse id="accordion-content-1">
                <div class="px-3 py-3 text-sm text-neutral-600 sm:px-4 sm:py-4 dark:text-neutral-400">
                    If you're unhappy with your purchase for any reason, email us within 90 days and we'll refund you in
                    full, no questions asked.
                </div>
            </div>
        </div>

        <!-- Item 2 -->
        <div>
            <button
                @click="activeItem = activeItem === 2 ? null : 2"
                type="button"
                class="flex w-full items-center justify-between gap-3 px-3 py-3 text-left text-sm font-medium text-neutral-900 transition-colors hover:bg-neutral-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-inset sm:px-4 sm:py-4 dark:text-neutral-50 dark:hover:bg-neutral-700 dark:focus-visible:ring-neutral-100"
                :class="activeItem === 2 ? 'bg-neutral-50 dark:bg-neutral-700' : ''"
                :aria-expanded="activeItem === 2"
                aria-controls="accordion-content-2"
            >
                <span>How do I cancel my subscription?</span>
                <svg
                    :class="activeItem === 2 ? 'rotate-180' : ''"
                    class="h-5 w-5 shrink-0 text-neutral-500 transition-transform duration-150 dark:text-neutral-400"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    aria-hidden="true"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>
            </button>
            <div x-show="activeItem === 2" x-collapse id="accordion-content-2">
                <div class="px-3 py-3 text-sm text-neutral-600 sm:px-4 sm:py-4 dark:text-neutral-400">
                    You can cancel your subscription at any time from your account settings. Your access will continue
                    until the end of your billing period.
                </div>
            </div>
        </div>

        <!-- Item 3 -->
        <div>
            <button
                @click="activeItem = activeItem === 3 ? null : 3"
                type="button"
                class="flex w-full items-center justify-between gap-3 px-3 py-3 text-left text-sm font-medium text-neutral-900 transition-colors hover:bg-neutral-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-inset sm:px-4 sm:py-4 dark:text-neutral-50 dark:hover:bg-neutral-700 dark:focus-visible:ring-neutral-100"
                :class="activeItem === 3 ? 'bg-neutral-50 dark:bg-neutral-700' : ''"
                :aria-expanded="activeItem === 3"
                aria-controls="accordion-content-3"
            >
                <span>Can I change my plan later?</span>
                <svg
                    :class="activeItem === 3 ? 'rotate-180' : ''"
                    class="h-5 w-5 shrink-0 text-neutral-500 transition-transform duration-150 dark:text-neutral-400"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    aria-hidden="true"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>
            </button>
            <div x-show="activeItem === 3" x-collapse id="accordion-content-3">
                <div class="px-3 py-3 text-sm text-neutral-600 sm:px-4 sm:py-4 dark:text-neutral-400">
                    Yes, you can upgrade or downgrade your plan at any time. Changes will be reflected in your next
                    billing cycle.
                </div>
            </div>
        </div>

        <!-- Item 4 -->
        <div>
            <button
                @click="activeItem = activeItem === 4 ? null : 4"
                type="button"
                class="flex w-full items-center justify-between gap-3 px-3 py-3 text-left text-sm font-medium text-neutral-900 transition-colors hover:bg-neutral-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-inset sm:px-4 sm:py-4 dark:text-neutral-50 dark:hover:bg-neutral-700 dark:focus-visible:ring-neutral-100"
                :class="activeItem === 4 ? 'bg-neutral-50 dark:bg-neutral-700' : ''"
                :aria-expanded="activeItem === 4"
                aria-controls="accordion-content-4"
            >
                <span>Do you offer team discounts?</span>
                <svg
                    :class="activeItem === 4 ? 'rotate-180' : ''"
                    class="h-5 w-5 shrink-0 text-neutral-500 transition-transform duration-150 dark:text-neutral-400"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    aria-hidden="true"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>
            </button>
            <div x-show="activeItem === 4" x-collapse id="accordion-content-4">
                <div class="px-3 py-3 text-sm text-neutral-600 sm:px-4 sm:py-4 dark:text-neutral-400">
                    Yes! We offer volume discounts for teams of 5 or more. Contact our sales team for a custom quote.
                </div>
            </div>
        </div>
    </div>
</div>

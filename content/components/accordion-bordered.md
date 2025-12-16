---
slug: accordion-bordered
title: Accordion Bordered
category: tabs-accordions
github: caresome
dependencies:
    - '@alpinejs/collapse https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js'
publish_at: 2025-12-15 12:00:00
---

<div data-preview-only class="flex min-h-[450px] items-start justify-center p-4 sm:p-8">
    <div x-data="{ activeItem: 1 }" class="w-full max-w-lg space-y-2 sm:space-y-3">
        <!-- Item 1 -->
        <div
            class="overflow-hidden rounded-xl border border-neutral-200 bg-white dark:border-neutral-700 dark:bg-neutral-800"
            :class="activeItem === 1 ? 'ring-2 ring-neutral-900 dark:ring-neutral-100' : ''"
        >
            <button
                @click="activeItem = activeItem === 1 ? null : 1"
                type="button"
                class="flex w-full items-center justify-between gap-3 px-3 py-3 text-left text-sm font-medium text-neutral-900 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-inset sm:px-4 sm:py-4 dark:text-neutral-50 dark:focus-visible:ring-neutral-100"
                :aria-expanded="activeItem === 1"
                aria-controls="accordion-bordered-content-1"
            >
                <span>Getting Started</span>
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
            <div x-show="activeItem === 1" x-collapse id="accordion-bordered-content-1">
                <div
                    class="border-t border-neutral-200 px-3 py-3 text-sm text-neutral-600 sm:px-4 sm:py-4 dark:border-neutral-700 dark:text-neutral-400"
                >
                    Welcome! To get started, create an account and complete your profile setup. Our onboarding wizard
                    will guide you through the essential features.
                </div>
            </div>
        </div>

        <!-- Item 2 -->
        <div
            class="overflow-hidden rounded-xl border border-neutral-200 bg-white dark:border-neutral-700 dark:bg-neutral-800"
            :class="activeItem === 2 ? 'ring-2 ring-neutral-900 dark:ring-neutral-100' : ''"
        >
            <button
                @click="activeItem = activeItem === 2 ? null : 2"
                type="button"
                class="flex w-full items-center justify-between gap-3 px-3 py-3 text-left text-sm font-medium text-neutral-900 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-inset sm:px-4 sm:py-4 dark:text-neutral-50 dark:focus-visible:ring-neutral-100"
                :aria-expanded="activeItem === 2"
                aria-controls="accordion-bordered-content-2"
            >
                <span>Account Settings</span>
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
            <div x-show="activeItem === 2" x-collapse id="accordion-bordered-content-2">
                <div
                    class="border-t border-neutral-200 px-3 py-3 text-sm text-neutral-600 sm:px-4 sm:py-4 dark:border-neutral-700 dark:text-neutral-400"
                >
                    Manage your account preferences, notification settings, and security options from the Settings page.
                    Enable two-factor authentication for added security.
                </div>
            </div>
        </div>

        <!-- Item 3 -->
        <div
            class="overflow-hidden rounded-xl border border-neutral-200 bg-white dark:border-neutral-700 dark:bg-neutral-800"
            :class="activeItem === 3 ? 'ring-2 ring-neutral-900 dark:ring-neutral-100' : ''"
        >
            <button
                @click="activeItem = activeItem === 3 ? null : 3"
                type="button"
                class="flex w-full items-center justify-between gap-3 px-3 py-3 text-left text-sm font-medium text-neutral-900 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-inset sm:px-4 sm:py-4 dark:text-neutral-50 dark:focus-visible:ring-neutral-100"
                :aria-expanded="activeItem === 3"
                aria-controls="accordion-bordered-content-3"
            >
                <span>Integrations</span>
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
            <div x-show="activeItem === 3" x-collapse id="accordion-bordered-content-3">
                <div
                    class="border-t border-neutral-200 px-3 py-3 text-sm text-neutral-600 sm:px-4 sm:py-4 dark:border-neutral-700 dark:text-neutral-400"
                >
                    Connect your favorite tools and services. We support integrations with Slack, GitHub, Jira, and many
                    more. Visit the Integrations page to explore options.
                </div>
            </div>
        </div>

        <!-- Item 4 -->
        <div
            class="overflow-hidden rounded-xl border border-neutral-200 bg-white dark:border-neutral-700 dark:bg-neutral-800"
            :class="activeItem === 4 ? 'ring-2 ring-neutral-900 dark:ring-neutral-100' : ''"
        >
            <button
                @click="activeItem = activeItem === 4 ? null : 4"
                type="button"
                class="flex w-full items-center justify-between gap-3 px-3 py-3 text-left text-sm font-medium text-neutral-900 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-inset sm:px-4 sm:py-4 dark:text-neutral-50 dark:focus-visible:ring-neutral-100"
                :aria-expanded="activeItem === 4"
                aria-controls="accordion-bordered-content-4"
            >
                <span>Troubleshooting</span>
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
            <div x-show="activeItem === 4" x-collapse id="accordion-bordered-content-4">
                <div
                    class="border-t border-neutral-200 px-3 py-3 text-sm text-neutral-600 sm:px-4 sm:py-4 dark:border-neutral-700 dark:text-neutral-400"
                >
                    Having issues? Check our troubleshooting guide for common problems and solutions. If you need
                    further assistance, contact our support team.
                </div>
            </div>
        </div>
    </div>
</div>

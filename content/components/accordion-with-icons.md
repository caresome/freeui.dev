---
slug: accordion-with-icons
title: Accordion with Icons
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
                aria-controls="accordion-icon-content-1"
            >
                <span class="flex items-center gap-2 sm:gap-3">
                    <div
                        class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-neutral-100 sm:h-8 sm:w-8 dark:bg-neutral-600"
                    >
                        <svg
                            class="h-3.5 w-3.5 text-neutral-600 sm:h-4 sm:w-4 dark:text-neutral-300"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            aria-hidden="true"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z"
                            />
                        </svg>
                    </div>
                    <span>Payments & Billing</span>
                </span>
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
            <div x-show="activeItem === 1" x-collapse id="accordion-icon-content-1">
                <div class="py-3 pr-3 pl-12 text-sm text-neutral-600 sm:py-4 sm:pr-4 sm:pl-16 dark:text-neutral-400">
                    We accept all major credit cards including Visa, Mastercard, and American Express. PayPal and bank
                    transfers are also available for annual plans.
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
                aria-controls="accordion-icon-content-2"
            >
                <span class="flex items-center gap-2 sm:gap-3">
                    <div
                        class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-neutral-100 sm:h-8 sm:w-8 dark:bg-neutral-600"
                    >
                        <svg
                            class="h-3.5 w-3.5 text-neutral-600 sm:h-4 sm:w-4 dark:text-neutral-300"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            aria-hidden="true"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"
                            />
                        </svg>
                    </div>
                    <span>Security & Privacy</span>
                </span>
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
            <div x-show="activeItem === 2" x-collapse id="accordion-icon-content-2">
                <div class="py-3 pr-3 pl-12 text-sm text-neutral-600 sm:py-4 sm:pr-4 sm:pl-16 dark:text-neutral-400">
                    Your data is encrypted at rest and in transit. We're SOC 2 Type II certified and GDPR compliant. We
                    never sell your personal information.
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
                aria-controls="accordion-icon-content-3"
            >
                <span class="flex items-center gap-2 sm:gap-3">
                    <div
                        class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-neutral-100 sm:h-8 sm:w-8 dark:bg-neutral-600"
                    >
                        <svg
                            class="h-3.5 w-3.5 text-neutral-600 sm:h-4 sm:w-4 dark:text-neutral-300"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            aria-hidden="true"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"
                            />
                        </svg>
                    </div>
                    <span>Team Management</span>
                </span>
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
            <div x-show="activeItem === 3" x-collapse id="accordion-icon-content-3">
                <div class="py-3 pr-3 pl-12 text-sm text-neutral-600 sm:py-4 sm:pr-4 sm:pl-16 dark:text-neutral-400">
                    Invite unlimited team members, assign roles and permissions, and manage access levels. SSO
                    integration is available on Enterprise plans.
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
                aria-controls="accordion-icon-content-4"
            >
                <span class="flex items-center gap-2 sm:gap-3">
                    <div
                        class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-neutral-100 sm:h-8 sm:w-8 dark:bg-neutral-600"
                    >
                        <svg
                            class="h-3.5 w-3.5 text-neutral-600 sm:h-4 sm:w-4 dark:text-neutral-300"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            aria-hidden="true"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z"
                            />
                        </svg>
                    </div>
                    <span>Support & Help</span>
                </span>
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
            <div x-show="activeItem === 4" x-collapse id="accordion-icon-content-4">
                <div class="py-3 pr-3 pl-12 text-sm text-neutral-600 sm:py-4 sm:pr-4 sm:pl-16 dark:text-neutral-400">
                    Our support team is available 24/7 via chat and email. Pro and Enterprise customers get access to
                    priority phone support and a dedicated account manager.
                </div>
            </div>
        </div>
    </div>
</div>

---
slug: accordion-nested
title: Accordion Nested
category: tabs-accordions
github: caresome
dependencies:
    - '@alpinejs/collapse https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js'
publish_at: 2025-12-15 12:00:00
---

<div data-preview-only class="flex min-h-[500px] items-start justify-center p-4 sm:p-8">
    <div
        x-data="{ activeParent: 1, activeChild: null }"
        class="w-full max-w-lg divide-y divide-neutral-200 overflow-hidden rounded-xl border border-neutral-200 bg-white dark:divide-neutral-700 dark:border-neutral-700 dark:bg-neutral-800"
    >
        <!-- Parent Item 1 -->
        <div>
            <button
                @click="activeParent = activeParent === 1 ? null : 1; activeChild = null"
                type="button"
                class="flex w-full items-center justify-between gap-3 px-3 py-3 text-left text-sm font-medium text-neutral-900 transition-colors hover:bg-neutral-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-inset sm:px-4 sm:py-4 dark:text-neutral-50 dark:hover:bg-neutral-700 dark:focus-visible:ring-neutral-100"
                :class="activeParent === 1 ? 'bg-neutral-50 dark:bg-neutral-700' : ''"
                :aria-expanded="activeParent === 1"
                aria-controls="accordion-parent-1"
            >
                <span class="flex items-center gap-2 sm:gap-3">
                    <svg
                        class="h-5 w-5 shrink-0 text-neutral-500 dark:text-neutral-400"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                        aria-hidden="true"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"
                        />
                    </svg>
                    <span>Account</span>
                </span>
                <svg
                    :class="activeParent === 1 ? 'rotate-180' : ''"
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
            <div x-show="activeParent === 1" x-collapse id="accordion-parent-1">
                <div class="border-t border-neutral-200 bg-neutral-50 dark:border-neutral-700 dark:bg-neutral-900">
                    <!-- Nested Item 1.1 -->
                    <div class="border-b border-neutral-200 dark:border-neutral-700">
                        <button
                            @click="activeChild = activeChild === '1.1' ? null : '1.1'"
                            type="button"
                            class="flex w-full items-center justify-between gap-3 px-4 py-2.5 text-left text-sm text-neutral-700 transition-colors hover:bg-neutral-100 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-inset sm:px-6 sm:py-3 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus-visible:ring-neutral-100"
                            :aria-expanded="activeChild === '1.1'"
                            aria-controls="accordion-child-1-1"
                        >
                            <span>Profile Settings</span>
                            <svg
                                :class="activeChild === '1.1' ? 'rotate-180' : ''"
                                class="h-4 w-4 shrink-0 text-neutral-400 transition-transform duration-150"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                                aria-hidden="true"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                        <div x-show="activeChild === '1.1'" x-collapse id="accordion-child-1-1">
                            <div
                                class="bg-neutral-100 px-4 py-2.5 text-sm text-neutral-600 sm:px-6 sm:py-3 dark:bg-neutral-800 dark:text-neutral-400"
                            >
                                Update your profile photo, display name, and bio. Your profile is visible to other team
                                members.
                            </div>
                        </div>
                    </div>
                    <!-- Nested Item 1.2 -->
                    <div class="border-b border-neutral-200 dark:border-neutral-700">
                        <button
                            @click="activeChild = activeChild === '1.2' ? null : '1.2'"
                            type="button"
                            class="flex w-full items-center justify-between gap-3 px-4 py-2.5 text-left text-sm text-neutral-700 transition-colors hover:bg-neutral-100 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-inset sm:px-6 sm:py-3 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus-visible:ring-neutral-100"
                            :aria-expanded="activeChild === '1.2'"
                            aria-controls="accordion-child-1-2"
                        >
                            <span>Password & Security</span>
                            <svg
                                :class="activeChild === '1.2' ? 'rotate-180' : ''"
                                class="h-4 w-4 shrink-0 text-neutral-400 transition-transform duration-150"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                                aria-hidden="true"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                        <div x-show="activeChild === '1.2'" x-collapse id="accordion-child-1-2">
                            <div
                                class="bg-neutral-100 px-4 py-2.5 text-sm text-neutral-600 sm:px-6 sm:py-3 dark:bg-neutral-800 dark:text-neutral-400"
                            >
                                Change your password, enable two-factor authentication, and manage active sessions.
                            </div>
                        </div>
                    </div>
                    <!-- Nested Item 1.3 -->
                    <div>
                        <button
                            @click="activeChild = activeChild === '1.3' ? null : '1.3'"
                            type="button"
                            class="flex w-full items-center justify-between gap-3 px-4 py-2.5 text-left text-sm text-neutral-700 transition-colors hover:bg-neutral-100 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-inset sm:px-6 sm:py-3 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus-visible:ring-neutral-100"
                            :aria-expanded="activeChild === '1.3'"
                            aria-controls="accordion-child-1-3"
                        >
                            <span>Notifications</span>
                            <svg
                                :class="activeChild === '1.3' ? 'rotate-180' : ''"
                                class="h-4 w-4 shrink-0 text-neutral-400 transition-transform duration-150"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                                aria-hidden="true"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                        <div x-show="activeChild === '1.3'" x-collapse id="accordion-child-1-3">
                            <div
                                class="bg-neutral-100 px-4 py-2.5 text-sm text-neutral-600 sm:px-6 sm:py-3 dark:bg-neutral-800 dark:text-neutral-400"
                            >
                                Configure email, push, and in-app notification preferences for different activity types.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Parent Item 2 -->
        <div>
            <button
                @click="activeParent = activeParent === 2 ? null : 2; activeChild = null"
                type="button"
                class="flex w-full items-center justify-between gap-3 px-3 py-3 text-left text-sm font-medium text-neutral-900 transition-colors hover:bg-neutral-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-inset sm:px-4 sm:py-4 dark:text-neutral-50 dark:hover:bg-neutral-700 dark:focus-visible:ring-neutral-100"
                :class="activeParent === 2 ? 'bg-neutral-50 dark:bg-neutral-700' : ''"
                :aria-expanded="activeParent === 2"
                aria-controls="accordion-parent-2"
            >
                <span class="flex items-center gap-2 sm:gap-3">
                    <svg
                        class="h-5 w-5 shrink-0 text-neutral-500 dark:text-neutral-400"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                        aria-hidden="true"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21"
                        />
                    </svg>
                    <span>Organization</span>
                </span>
                <svg
                    :class="activeParent === 2 ? 'rotate-180' : ''"
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
            <div x-show="activeParent === 2" x-collapse id="accordion-parent-2">
                <div class="border-t border-neutral-200 bg-neutral-50 dark:border-neutral-700 dark:bg-neutral-900">
                    <!-- Nested Item 2.1 -->
                    <div class="border-b border-neutral-200 dark:border-neutral-700">
                        <button
                            @click="activeChild = activeChild === '2.1' ? null : '2.1'"
                            type="button"
                            class="flex w-full items-center justify-between gap-3 px-4 py-2.5 text-left text-sm text-neutral-700 transition-colors hover:bg-neutral-100 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-inset sm:px-6 sm:py-3 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus-visible:ring-neutral-100"
                            :aria-expanded="activeChild === '2.1'"
                            aria-controls="accordion-child-2-1"
                        >
                            <span>Team Members</span>
                            <svg
                                :class="activeChild === '2.1' ? 'rotate-180' : ''"
                                class="h-4 w-4 shrink-0 text-neutral-400 transition-transform duration-150"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                                aria-hidden="true"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                        <div x-show="activeChild === '2.1'" x-collapse id="accordion-child-2-1">
                            <div
                                class="bg-neutral-100 px-4 py-2.5 text-sm text-neutral-600 sm:px-6 sm:py-3 dark:bg-neutral-800 dark:text-neutral-400"
                            >
                                Invite new members, manage roles, and remove inactive users from your organization.
                            </div>
                        </div>
                    </div>
                    <!-- Nested Item 2.2 -->
                    <div>
                        <button
                            @click="activeChild = activeChild === '2.2' ? null : '2.2'"
                            type="button"
                            class="flex w-full items-center justify-between gap-3 px-4 py-2.5 text-left text-sm text-neutral-700 transition-colors hover:bg-neutral-100 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-inset sm:px-6 sm:py-3 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus-visible:ring-neutral-100"
                            :aria-expanded="activeChild === '2.2'"
                            aria-controls="accordion-child-2-2"
                        >
                            <span>Billing & Plans</span>
                            <svg
                                :class="activeChild === '2.2' ? 'rotate-180' : ''"
                                class="h-4 w-4 shrink-0 text-neutral-400 transition-transform duration-150"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                                aria-hidden="true"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                        <div x-show="activeChild === '2.2'" x-collapse id="accordion-child-2-2">
                            <div
                                class="bg-neutral-100 px-4 py-2.5 text-sm text-neutral-600 sm:px-6 sm:py-3 dark:bg-neutral-800 dark:text-neutral-400"
                            >
                                View and update your subscription, manage payment methods, and download invoices.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Parent Item 3 -->
        <div>
            <button
                @click="activeParent = activeParent === 3 ? null : 3; activeChild = null"
                type="button"
                class="flex w-full items-center justify-between gap-3 px-3 py-3 text-left text-sm font-medium text-neutral-900 transition-colors hover:bg-neutral-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-inset sm:px-4 sm:py-4 dark:text-neutral-50 dark:hover:bg-neutral-700 dark:focus-visible:ring-neutral-100"
                :class="activeParent === 3 ? 'bg-neutral-50 dark:bg-neutral-700' : ''"
                :aria-expanded="activeParent === 3"
                aria-controls="accordion-parent-3"
            >
                <span class="flex items-center gap-2 sm:gap-3">
                    <svg
                        class="h-5 w-5 shrink-0 text-neutral-500 dark:text-neutral-400"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                        aria-hidden="true"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M14.25 9.75 16.5 12l-2.25 2.25m-4.5 0L7.5 12l2.25-2.25M6 20.25h12A2.25 2.25 0 0 0 20.25 18V6A2.25 2.25 0 0 0 18 3.75H6A2.25 2.25 0 0 0 3.75 6v12A2.25 2.25 0 0 0 6 20.25Z"
                        />
                    </svg>
                    <span>Developer</span>
                </span>
                <svg
                    :class="activeParent === 3 ? 'rotate-180' : ''"
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
            <div x-show="activeParent === 3" x-collapse id="accordion-parent-3">
                <div
                    class="border-t border-neutral-200 bg-neutral-50 px-4 py-3 text-sm text-neutral-600 sm:px-6 sm:py-4 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400"
                >
                    Access API keys, webhooks, and developer documentation. Build custom integrations with our REST API.
                </div>
            </div>
        </div>
    </div>
</div>

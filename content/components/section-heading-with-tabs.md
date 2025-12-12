---
slug: section-heading-with-tabs
title: Section Heading with Tabs
category: headings
github: caresome
dependencies: []
publish_at: 2025-12-07 05:00:00
---

<div data-preview-only class="mx-auto max-w-3xl px-4">
    <div x-data="{ activeTab: 'all' }" class="bg-white dark:bg-neutral-900">
        <div class="border-b border-neutral-200 dark:border-neutral-800">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h2 class="text-lg font-semibold tracking-tight text-neutral-900 dark:text-neutral-50">
                        Notifications
                    </h2>
                    <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">
                        Stay updated with your latest activity and alerts.
                    </p>
                </div>
            </div>

            <!-- Tabs -->
            <nav class="mt-4 -mb-px flex gap-6" aria-label="Tabs">
                <button
                    @click="activeTab = 'all'"
                    :class="activeTab === 'all'
                    ? 'border-neutral-900 text-neutral-900 dark:border-neutral-50 dark:text-neutral-50'
                    : 'border-transparent text-neutral-500 hover:border-neutral-300 hover:text-neutral-700 dark:text-neutral-400 dark:hover:border-neutral-600 dark:hover:text-neutral-300'"
                    class="border-b-2 px-1 pb-3 text-sm font-medium whitespace-nowrap transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-offset-2 dark:focus-visible:ring-neutral-100"
                >
                    All
                    <span
                        :class="activeTab === 'all'
                        ? 'bg-neutral-100 text-neutral-900 dark:bg-neutral-800 dark:text-neutral-50'
                        : 'bg-neutral-50 text-neutral-500 dark:bg-neutral-900 dark:text-neutral-400'"
                        class="ml-2 rounded-full px-2 py-0.5 text-xs font-medium"
                    >
                        52
                    </span>
                </button>
                <button
                    @click="activeTab = 'unread'"
                    :class="activeTab === 'unread'
                    ? 'border-neutral-900 text-neutral-900 dark:border-neutral-50 dark:text-neutral-50'
                    : 'border-transparent text-neutral-500 hover:border-neutral-300 hover:text-neutral-700 dark:text-neutral-400 dark:hover:border-neutral-600 dark:hover:text-neutral-300'"
                    class="border-b-2 px-1 pb-3 text-sm font-medium whitespace-nowrap transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-offset-2 dark:focus-visible:ring-neutral-100"
                >
                    Unread
                    <span
                        :class="activeTab === 'unread'
                        ? 'bg-neutral-100 text-neutral-900 dark:bg-neutral-800 dark:text-neutral-50'
                        : 'bg-neutral-50 text-neutral-500 dark:bg-neutral-900 dark:text-neutral-400'"
                        class="ml-2 rounded-full px-2 py-0.5 text-xs font-medium"
                    >
                        6
                    </span>
                </button>
                <button
                    @click="activeTab = 'mentions'"
                    :class="activeTab === 'mentions'
                    ? 'border-neutral-900 text-neutral-900 dark:border-neutral-50 dark:text-neutral-50'
                    : 'border-transparent text-neutral-500 hover:border-neutral-300 hover:text-neutral-700 dark:text-neutral-400 dark:hover:border-neutral-600 dark:hover:text-neutral-300'"
                    class="border-b-2 px-1 pb-3 text-sm font-medium whitespace-nowrap transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-offset-2 dark:focus-visible:ring-neutral-100"
                >
                    Mentions
                </button>
                <button
                    @click="activeTab = 'archived'"
                    :class="activeTab === 'archived'
                    ? 'border-neutral-900 text-neutral-900 dark:border-neutral-50 dark:text-neutral-50'
                    : 'border-transparent text-neutral-500 hover:border-neutral-300 hover:text-neutral-700 dark:text-neutral-400 dark:hover:border-neutral-600 dark:hover:text-neutral-300'"
                    class="border-b-2 px-1 pb-3 text-sm font-medium whitespace-nowrap transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-offset-2 dark:focus-visible:ring-neutral-100"
                >
                    Archived
                </button>
            </nav>
        </div>
    </div>
</div>

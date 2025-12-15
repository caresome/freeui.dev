---
slug: tabs-with-underline
title: Tabs with Underline
category: navigation
github: caresome
dependencies: []
publish_at: 2025-12-15 12:00:00
---

<div data-preview-only class="flex min-h-[300px] items-start justify-center p-8">
    <div
        x-data="{
            activeTab: 'overview',
            tabs: ['overview', 'analytics', 'reports', 'settings'],
            focusedIndex: 0,
            focusTab(index) {
                this.focusedIndex = index;
                this.$nextTick(() => {
                    this.$refs[this.tabs[index]]?.focus();
                });
            }
        }"
        class="w-full max-w-2xl"
    >
        <!-- Tab List -->
        <div
            role="tablist"
            aria-label="Dashboard sections"
            class="flex border-b border-neutral-200 dark:border-neutral-700"
            @keydown.arrow-right.prevent="focusTab((focusedIndex + 1) % tabs.length)"
            @keydown.arrow-left.prevent="focusTab((focusedIndex - 1 + tabs.length) % tabs.length)"
            @keydown.home.prevent="focusTab(0)"
            @keydown.end.prevent="focusTab(tabs.length - 1)"
        >
            <button
                x-ref="overview"
                @click="activeTab = 'overview'"
                @focus="focusedIndex = 0"
                type="button"
                role="tab"
                :aria-selected="activeTab === 'overview'"
                :tabindex="activeTab === 'overview' ? 0 : -1"
                aria-controls="panel-overview"
                class="relative px-4 py-3 text-sm font-medium transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
                :class="activeTab === 'overview' ? 'text-neutral-900 dark:text-neutral-50' : 'text-neutral-500 hover:text-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300'"
            >
                Overview
                <span
                    x-show="activeTab === 'overview'"
                    class="absolute right-0 bottom-0 left-0 h-0.5 bg-neutral-900 dark:bg-neutral-50"
                    x-transition:enter="transition ease-out duration-150"
                    x-transition:enter-start="opacity-0 scale-x-0"
                    x-transition:enter-end="opacity-100 scale-x-100"
                ></span>
            </button>
            <button
                x-ref="analytics"
                @click="activeTab = 'analytics'"
                @focus="focusedIndex = 1"
                type="button"
                role="tab"
                :aria-selected="activeTab === 'analytics'"
                :tabindex="activeTab === 'analytics' ? 0 : -1"
                aria-controls="panel-analytics"
                class="relative px-4 py-3 text-sm font-medium transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
                :class="activeTab === 'analytics' ? 'text-neutral-900 dark:text-neutral-50' : 'text-neutral-500 hover:text-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300'"
            >
                Analytics
                <span
                    x-show="activeTab === 'analytics'"
                    class="absolute right-0 bottom-0 left-0 h-0.5 bg-neutral-900 dark:bg-neutral-50"
                    x-transition:enter="transition ease-out duration-150"
                    x-transition:enter-start="opacity-0 scale-x-0"
                    x-transition:enter-end="opacity-100 scale-x-100"
                ></span>
            </button>
            <button
                x-ref="reports"
                @click="activeTab = 'reports'"
                @focus="focusedIndex = 2"
                type="button"
                role="tab"
                :aria-selected="activeTab === 'reports'"
                :tabindex="activeTab === 'reports' ? 0 : -1"
                aria-controls="panel-reports"
                class="relative px-4 py-3 text-sm font-medium transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
                :class="activeTab === 'reports' ? 'text-neutral-900 dark:text-neutral-50' : 'text-neutral-500 hover:text-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300'"
            >
                Reports
                <span
                    x-show="activeTab === 'reports'"
                    class="absolute right-0 bottom-0 left-0 h-0.5 bg-neutral-900 dark:bg-neutral-50"
                    x-transition:enter="transition ease-out duration-150"
                    x-transition:enter-start="opacity-0 scale-x-0"
                    x-transition:enter-end="opacity-100 scale-x-100"
                ></span>
            </button>
            <button
                x-ref="settings"
                @click="activeTab = 'settings'"
                @focus="focusedIndex = 3"
                type="button"
                role="tab"
                :aria-selected="activeTab === 'settings'"
                :tabindex="activeTab === 'settings' ? 0 : -1"
                aria-controls="panel-settings"
                class="relative px-4 py-3 text-sm font-medium transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
                :class="activeTab === 'settings' ? 'text-neutral-900 dark:text-neutral-50' : 'text-neutral-500 hover:text-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300'"
            >
                Settings
                <span
                    x-show="activeTab === 'settings'"
                    class="absolute right-0 bottom-0 left-0 h-0.5 bg-neutral-900 dark:bg-neutral-50"
                    x-transition:enter="transition ease-out duration-150"
                    x-transition:enter-start="opacity-0 scale-x-0"
                    x-transition:enter-end="opacity-100 scale-x-100"
                ></span>
            </button>
        </div>

        <!-- Tab Panels -->
        <div class="mt-6">
            <div
                x-show="activeTab === 'overview'"
                id="panel-overview"
                role="tabpanel"
                aria-labelledby="overview"
                tabindex="0"
                class="focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
            >
                <h3 class="text-lg font-semibold text-neutral-900 dark:text-neutral-50">Overview</h3>
                <p class="mt-2 text-sm text-neutral-600 dark:text-neutral-400">
                    Get a high-level view of your project's performance and key metrics at a glance.
                </p>
            </div>
            <div
                x-show="activeTab === 'analytics'"
                id="panel-analytics"
                role="tabpanel"
                aria-labelledby="analytics"
                tabindex="0"
                class="focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
            >
                <h3 class="text-lg font-semibold text-neutral-900 dark:text-neutral-50">Analytics</h3>
                <p class="mt-2 text-sm text-neutral-600 dark:text-neutral-400">
                    Dive deep into your data with detailed analytics and visualization tools.
                </p>
            </div>
            <div
                x-show="activeTab === 'reports'"
                id="panel-reports"
                role="tabpanel"
                aria-labelledby="reports"
                tabindex="0"
                class="focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
            >
                <h3 class="text-lg font-semibold text-neutral-900 dark:text-neutral-50">Reports</h3>
                <p class="mt-2 text-sm text-neutral-600 dark:text-neutral-400">
                    Generate and download comprehensive reports for your stakeholders.
                </p>
            </div>
            <div
                x-show="activeTab === 'settings'"
                id="panel-settings"
                role="tabpanel"
                aria-labelledby="settings"
                tabindex="0"
                class="focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
            >
                <h3 class="text-lg font-semibold text-neutral-900 dark:text-neutral-50">Settings</h3>
                <p class="mt-2 text-sm text-neutral-600 dark:text-neutral-400">
                    Configure your dashboard preferences and customize your experience.
                </p>
            </div>
        </div>
    </div>
</div>

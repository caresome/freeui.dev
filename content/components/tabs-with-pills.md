---
slug: tabs-with-pills
title: Tabs with Pills
category: tabs-accordions
github: caresome
dependencies: []
publish_at: 2025-12-15 12:00:00
---

<div data-preview-only class="flex min-h-[300px] items-start justify-center p-8">
    <div
        x-data="{
            activeTab: 'all',
            tabs: ['all', 'active', 'completed', 'archived'],
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
            aria-label="Project status"
            class="flex flex-wrap gap-2"
            @keydown.arrow-right.prevent="focusTab((focusedIndex + 1) % tabs.length)"
            @keydown.arrow-left.prevent="focusTab((focusedIndex - 1 + tabs.length) % tabs.length)"
            @keydown.home.prevent="focusTab(0)"
            @keydown.end.prevent="focusTab(tabs.length - 1)"
        >
            <button
                x-ref="all"
                @click="activeTab = 'all'"
                @focus="focusedIndex = 0"
                type="button"
                role="tab"
                :aria-selected="activeTab === 'all'"
                :tabindex="activeTab === 'all' ? 0 : -1"
                aria-controls="panel-all"
                class="rounded-full px-4 py-2 text-sm font-medium transition-all focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
                :class="activeTab === 'all' ? 'bg-neutral-900 text-white dark:bg-neutral-50 dark:text-neutral-900' : 'bg-neutral-100 text-neutral-600 hover:bg-neutral-200 hover:text-neutral-900 dark:bg-neutral-800 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-50'"
            >
                All Projects
            </button>
            <button
                x-ref="active"
                @click="activeTab = 'active'"
                @focus="focusedIndex = 1"
                type="button"
                role="tab"
                :aria-selected="activeTab === 'active'"
                :tabindex="activeTab === 'active' ? 0 : -1"
                aria-controls="panel-active"
                class="rounded-full px-4 py-2 text-sm font-medium transition-all focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
                :class="activeTab === 'active' ? 'bg-neutral-900 text-white dark:bg-neutral-50 dark:text-neutral-900' : 'bg-neutral-100 text-neutral-600 hover:bg-neutral-200 hover:text-neutral-900 dark:bg-neutral-800 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-50'"
            >
                Active
            </button>
            <button
                x-ref="completed"
                @click="activeTab = 'completed'"
                @focus="focusedIndex = 2"
                type="button"
                role="tab"
                :aria-selected="activeTab === 'completed'"
                :tabindex="activeTab === 'completed' ? 0 : -1"
                aria-controls="panel-completed"
                class="rounded-full px-4 py-2 text-sm font-medium transition-all focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
                :class="activeTab === 'completed' ? 'bg-neutral-900 text-white dark:bg-neutral-50 dark:text-neutral-900' : 'bg-neutral-100 text-neutral-600 hover:bg-neutral-200 hover:text-neutral-900 dark:bg-neutral-800 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-50'"
            >
                Completed
            </button>
            <button
                x-ref="archived"
                @click="activeTab = 'archived'"
                @focus="focusedIndex = 3"
                type="button"
                role="tab"
                :aria-selected="activeTab === 'archived'"
                :tabindex="activeTab === 'archived' ? 0 : -1"
                aria-controls="panel-archived"
                class="rounded-full px-4 py-2 text-sm font-medium transition-all focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
                :class="activeTab === 'archived' ? 'bg-neutral-900 text-white dark:bg-neutral-50 dark:text-neutral-900' : 'bg-neutral-100 text-neutral-600 hover:bg-neutral-200 hover:text-neutral-900 dark:bg-neutral-800 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-50'"
            >
                Archived
            </button>
        </div>

        <!-- Tab Panels -->
        <div class="mt-6">
            <div
                x-show="activeTab === 'all'"
                id="panel-all"
                role="tabpanel"
                aria-labelledby="all"
                tabindex="0"
                class="rounded-xl border border-neutral-200 bg-white p-6 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:border-neutral-700 dark:bg-neutral-800 dark:focus-visible:outline-neutral-100"
            >
                <h3 class="text-sm font-medium text-neutral-900 dark:text-neutral-50">All Projects (24)</h3>
                <p class="mt-2 text-sm text-neutral-600 dark:text-neutral-400">
                    Showing all projects across all statuses.
                </p>
            </div>
            <div
                x-show="activeTab === 'active'"
                id="panel-active"
                role="tabpanel"
                aria-labelledby="active"
                tabindex="0"
                class="rounded-xl border border-neutral-200 bg-white p-6 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:border-neutral-700 dark:bg-neutral-800 dark:focus-visible:outline-neutral-100"
            >
                <h3 class="text-sm font-medium text-neutral-900 dark:text-neutral-50">Active Projects (8)</h3>
                <p class="mt-2 text-sm text-neutral-600 dark:text-neutral-400">Projects currently in progress.</p>
            </div>
            <div
                x-show="activeTab === 'completed'"
                id="panel-completed"
                role="tabpanel"
                aria-labelledby="completed"
                tabindex="0"
                class="rounded-xl border border-neutral-200 bg-white p-6 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:border-neutral-700 dark:bg-neutral-800 dark:focus-visible:outline-neutral-100"
            >
                <h3 class="text-sm font-medium text-neutral-900 dark:text-neutral-50">Completed Projects (12)</h3>
                <p class="mt-2 text-sm text-neutral-600 dark:text-neutral-400">Successfully completed projects.</p>
            </div>
            <div
                x-show="activeTab === 'archived'"
                id="panel-archived"
                role="tabpanel"
                aria-labelledby="archived"
                tabindex="0"
                class="rounded-xl border border-neutral-200 bg-white p-6 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:border-neutral-700 dark:bg-neutral-800 dark:focus-visible:outline-neutral-100"
            >
                <h3 class="text-sm font-medium text-neutral-900 dark:text-neutral-50">Archived Projects (4)</h3>
                <p class="mt-2 text-sm text-neutral-600 dark:text-neutral-400">
                    Projects that have been archived for reference.
                </p>
            </div>
        </div>
    </div>
</div>

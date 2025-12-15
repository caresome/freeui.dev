---
slug: global-search-fullscreen
title: Global Search Fullscreen
category: navigation
github: caresome
dependencies:
    - '@alpinejs/focus https://cdn.jsdelivr.net/npm/@alpinejs/focus@3.x.x/dist/cdn.min.js'
publish_at: 2025-12-15 12:00:00
---

<div data-preview-only class="flex min-h-[500px] items-start justify-center p-8">
    <div
        x-data="{
            open: true,
            search: '',
            activeIndex: 0,
            results: [
                { type: 'page', title: 'Dashboard', description: 'Main dashboard overview' },
                { type: 'page', title: 'Settings', description: 'Account and app settings' },
                { type: 'page', title: 'Projects', description: 'View all projects' },
                { type: 'user', title: 'John Doe', description: 'john@example.com' },
                { type: 'user', title: 'Jane Smith', description: 'jane@example.com' }
            ],
            get filteredResults() {
                if (!this.search) return [];
                return this.results.filter(item =>
                    item.title.toLowerCase().includes(this.search.toLowerCase()) ||
                    item.description.toLowerCase().includes(this.search.toLowerCase())
                );
            },
            close() {
                this.open = false;
                this.search = '';
                this.activeIndex = 0;
            },
            next() {
                if (this.filteredResults.length === 0) return;
                this.activeIndex = (this.activeIndex + 1) % this.filteredResults.length;
            },
            prev() {
                if (this.filteredResults.length === 0) return;
                this.activeIndex = (this.activeIndex - 1 + this.filteredResults.length) % this.filteredResults.length;
            }
        }"
        @keydown.meta.k.window.prevent="open = true"
        @keydown.ctrl.k.window.prevent="open = true"
        class="relative w-full max-w-md"
    >
        <!-- Trigger Button -->
        <button
            @click="open = true"
            type="button"
            class="flex w-full items-center gap-3 rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-400 transition-colors hover:bg-neutral-50 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:border-neutral-700 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:focus-visible:outline-neutral-100"
        >
            <svg
                class="h-5 w-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
                aria-hidden="true"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                />
            </svg>
            <span>Global search...</span>
            <kbd
                class="ml-auto rounded border border-neutral-200 bg-neutral-100 px-2 py-0.5 text-xs font-medium dark:border-neutral-600 dark:bg-neutral-700"
            >
                ⌘K
            </kbd>
        </button>

        <!-- Fullscreen Overlay -->
        <div
            x-show="open"
            x-trap.inert.noscroll="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @keydown.escape.prevent="close()"
            @keydown.arrow-down.prevent="next()"
            @keydown.arrow-up.prevent="prev()"
            class="fixed inset-0 z-50 overflow-y-auto bg-neutral-900/95 backdrop-blur-sm"
            role="dialog"
            aria-modal="true"
            aria-label="Global search"
            x-cloak
        >
            <!-- Close button -->
            <button
                @click="close()"
                type="button"
                class="absolute top-6 right-6 rounded-lg p-2 text-neutral-400 transition-colors hover:bg-neutral-800 hover:text-white"
                aria-label="Close search"
            >
                <svg
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    aria-hidden="true"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>

            <div class="mx-auto flex min-h-screen max-w-2xl flex-col px-4 pt-[15vh]">
                <!-- Search Input -->
                <div class="flex items-center gap-4 border-b border-neutral-700 pb-6">
                    <svg
                        class="h-8 w-8 shrink-0 text-neutral-500"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                        aria-hidden="true"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                        />
                    </svg>
                    <input
                        x-model="search"
                        @input="activeIndex = 0"
                        type="text"
                        placeholder="Search pages, users, docs..."
                        class="h-12 w-full border-0 bg-transparent text-2xl font-light text-white placeholder-neutral-500 focus:ring-0 focus:outline-none"
                    />
                </div>

                <!-- Results -->
                <div class="flex-1 py-6">
                    <template x-if="search && filteredResults.length === 0">
                        <div class="py-12 text-center">
                            <svg
                                class="mx-auto h-12 w-12 text-neutral-600"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                                />
                            </svg>
                            <p class="mt-4 text-lg text-neutral-400">
                                No results found for "
                                <span class="text-white" x-text="search"></span>
                                "
                            </p>
                            <p class="mt-2 text-sm text-neutral-500">Try searching for something else</p>
                        </div>
                    </template>

                    <template x-if="!search">
                        <div class="py-12 text-center">
                            <p class="text-lg text-neutral-400">Start typing to search</p>
                            <p class="mt-2 text-sm text-neutral-500">Search across pages, users, and documentation</p>
                        </div>
                    </template>

                    <div class="space-y-2">
                        <template x-for="(item, index) in filteredResults" :key="index">
                            <button
                                @click="close()"
                                @mouseenter="activeIndex = index"
                                type="button"
                                class="flex w-full items-center gap-4 rounded-xl px-4 py-4 text-left transition-colors"
                                :class="activeIndex === index ? 'bg-neutral-800' : 'hover:bg-neutral-800/50'"
                            >
                                <div
                                    class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl"
                                    :class="item.type === 'user' ? 'bg-blue-500/20' : 'bg-neutral-700'"
                                >
                                    <!-- Page icon -->
                                    <svg
                                        x-show="item.type === 'page'"
                                        class="h-6 w-6 text-neutral-400"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        aria-hidden="true"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"
                                        />
                                    </svg>
                                    <!-- User icon -->
                                    <svg
                                        x-show="item.type === 'user'"
                                        class="h-6 w-6 text-blue-400"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        aria-hidden="true"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"
                                        />
                                    </svg>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <p class="text-base font-medium text-white" x-text="item.title"></p>
                                    <p class="truncate text-sm text-neutral-400" x-text="item.description"></p>
                                </div>
                                <svg
                                    class="h-5 w-5 shrink-0 text-neutral-500"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="2"
                                    stroke="currentColor"
                                    aria-hidden="true"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"
                                    />
                                </svg>
                            </button>
                        </template>
                    </div>
                </div>

                <!-- Footer hints -->
                <div class="border-t border-neutral-800 py-4">
                    <div class="flex items-center justify-center gap-6 text-xs text-neutral-500">
                        <span class="flex items-center gap-1">
                            <kbd class="rounded border border-neutral-700 bg-neutral-800 px-1.5 py-0.5 font-medium">
                                ↑
                            </kbd>
                            <kbd class="rounded border border-neutral-700 bg-neutral-800 px-1.5 py-0.5 font-medium">
                                ↓
                            </kbd>
                            Navigate
                        </span>
                        <span class="flex items-center gap-1">
                            <kbd class="rounded border border-neutral-700 bg-neutral-800 px-1.5 py-0.5 font-medium">
                                ↵
                            </kbd>
                            Select
                        </span>
                        <span class="flex items-center gap-1">
                            <kbd class="rounded border border-neutral-700 bg-neutral-800 px-1.5 py-0.5 font-medium">
                                Esc
                            </kbd>
                            Close
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

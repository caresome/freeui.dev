---
slug: command-palette-with-recent
title: Command Palette with Recent
category: navigation
github: caresome
dependencies:
    - '@alpinejs/focus https://cdn.jsdelivr.net/npm/@alpinejs/focus@3.x.x/dist/cdn.min.js'
publish_at: 2025-12-15 12:00:00
---

<div data-preview-only class="flex min-h-[550px] items-start justify-center p-8">
    <div
        x-data="{
            open: true,
            search: '',
            activeIndex: 0,
            recentItems: [
                { id: 'dashboard', label: 'Dashboard', type: 'page' },
                { id: 'new-project', label: 'Create new project', type: 'action' },
                { id: 'settings', label: 'Settings', type: 'page' }
            ],
            allItems: [
                { id: 'home', label: 'Home', type: 'page' },
                { id: 'dashboard', label: 'Dashboard', type: 'page' },
                { id: 'projects', label: 'Projects', type: 'page' },
                { id: 'tasks', label: 'Tasks', type: 'page' },
                { id: 'team', label: 'Team', type: 'page' },
                { id: 'settings', label: 'Settings', type: 'page' },
                { id: 'new-project', label: 'Create new project', type: 'action' },
                { id: 'invite', label: 'Invite member', type: 'action' },
                { id: 'export', label: 'Export data', type: 'action' }
            ],
            get showRecent() {
                return !this.search && this.recentItems.length > 0;
            },
            get filteredItems() {
                if (!this.search) return this.allItems;
                return this.allItems.filter(item =>
                    item.label.toLowerCase().includes(this.search.toLowerCase())
                );
            },
            get displayItems() {
                return this.showRecent ? this.recentItems : this.filteredItems;
            },
            focusItem(index) {
                this.activeIndex = index;
                this.$nextTick(() => {
                    const items = this.$refs.listbox?.querySelectorAll('[role=option]');
                    items?.[index]?.scrollIntoView({ block: 'nearest' });
                });
            },
            next() {
                if (this.displayItems.length === 0) return;
                this.focusItem((this.activeIndex + 1) % this.displayItems.length);
            },
            prev() {
                if (this.displayItems.length === 0) return;
                this.focusItem((this.activeIndex - 1 + this.displayItems.length) % this.displayItems.length);
            },
            selectItem() {
                if (this.displayItems[this.activeIndex]) {
                    console.log('Selected:', this.displayItems[this.activeIndex].label);
                    this.open = false;
                }
            },
            removeRecent(id) {
                this.recentItems = this.recentItems.filter(item => item.id !== id);
            },
            close() {
                this.open = false;
                this.search = '';
                this.activeIndex = 0;
            }
        }"
        @keydown.meta.k.window.prevent="open = true"
        @keydown.ctrl.k.window.prevent="open = true"
        class="relative w-full max-w-lg"
    >
        <!-- Trigger Button -->
        <button
            @click="open = true"
            type="button"
            class="flex w-full items-center justify-between rounded-lg border border-neutral-200 bg-white px-4 py-2.5 text-sm text-neutral-500 transition-colors hover:bg-neutral-50 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:focus-visible:outline-neutral-100"
        >
            <span class="flex items-center gap-2">
                <svg
                    class="h-4 w-4"
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
                Search commands...
            </span>
            <kbd
                class="rounded border border-neutral-200 bg-neutral-100 px-1.5 py-0.5 text-xs font-medium text-neutral-500 dark:border-neutral-600 dark:bg-neutral-700 dark:text-neutral-400"
            >
                ⌘K
            </kbd>
        </button>

        <!-- Modal Backdrop -->
        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click="close()"
            class="fixed inset-0 z-40 bg-neutral-900/50"
            aria-hidden="true"
            x-cloak
        ></div>

        <!-- Command Palette -->
        <div
            x-show="open"
            x-trap.inert.noscroll="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            @keydown.escape.prevent="close()"
            @keydown.arrow-down.prevent="next()"
            @keydown.arrow-up.prevent="prev()"
            @keydown.enter.prevent="selectItem()"
            class="fixed top-[20%] left-1/2 z-50 w-full max-w-lg -translate-x-1/2 overflow-hidden rounded-xl border border-neutral-200 bg-white shadow-2xl dark:border-neutral-700 dark:bg-neutral-800"
            role="dialog"
            aria-modal="true"
            aria-label="Command palette"
            x-cloak
        >
            <!-- Search Input -->
            <div class="border-b border-neutral-200 dark:border-neutral-700">
                <div class="flex items-center px-4">
                    <svg
                        class="h-5 w-5 shrink-0 text-neutral-400"
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
                        placeholder="Search commands..."
                        class="h-14 w-full border-0 bg-transparent px-4 text-sm text-neutral-900 placeholder-neutral-400 focus:ring-0 focus:outline-none dark:text-neutral-50 dark:placeholder-neutral-500"
                        aria-autocomplete="list"
                        aria-controls="command-list-recent"
                    />
                </div>
            </div>

            <!-- Results -->
            <div x-ref="listbox" id="command-list-recent" role="listbox" class="max-h-80 overflow-y-auto p-2">
                <!-- Section Header -->
                <div x-show="showRecent" class="flex items-center justify-between px-3 py-2">
                    <span class="text-xs font-semibold tracking-wider text-neutral-400 uppercase dark:text-neutral-500">
                        Recent
                    </span>
                    <button
                        @click="recentItems = []"
                        type="button"
                        class="text-xs text-neutral-400 hover:text-neutral-600 dark:text-neutral-500 dark:hover:text-neutral-300"
                    >
                        Clear all
                    </button>
                </div>

                <div x-show="!showRecent && search" class="px-3 py-2">
                    <span class="text-xs font-semibold tracking-wider text-neutral-400 uppercase dark:text-neutral-500">
                        Results
                    </span>
                </div>

                <template x-if="displayItems.length === 0">
                    <div class="px-4 py-8 text-center text-sm text-neutral-500 dark:text-neutral-400">
                        No results found.
                    </div>
                </template>

                <template x-for="(item, index) in displayItems" :key="item.id">
                    <div class="group relative">
                        <button
                            @click="selectItem()"
                            @mouseenter="activeIndex = index"
                            type="button"
                            role="option"
                            :aria-selected="activeIndex === index"
                            class="flex w-full items-center gap-3 rounded-lg px-3 py-2.5 text-left text-sm transition-colors focus:outline-none"
                            :class="activeIndex === index ? 'bg-neutral-100 text-neutral-900 dark:bg-neutral-700 dark:text-neutral-50' : 'text-neutral-600 dark:text-neutral-400'"
                        >
                            <!-- Icon based on type -->
                            <div
                                class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg"
                                :class="activeIndex === index ? 'bg-neutral-200 dark:bg-neutral-600' : 'bg-neutral-100 dark:bg-neutral-700'"
                            >
                                <!-- Page icon -->
                                <svg
                                    x-show="item.type === 'page'"
                                    class="h-4 w-4"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="2"
                                    stroke="currentColor"
                                    aria-hidden="true"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"
                                    />
                                </svg>
                                <!-- Action icon -->
                                <svg
                                    x-show="item.type === 'action'"
                                    class="h-4 w-4"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="2"
                                    stroke="currentColor"
                                    aria-hidden="true"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z"
                                    />
                                </svg>
                            </div>
                            <span x-text="item.label"></span>
                        </button>
                        <!-- Remove button (only for recent) -->
                        <button
                            x-show="showRecent"
                            @click.stop="removeRecent(item.id)"
                            type="button"
                            class="absolute top-1/2 right-2 -translate-y-1/2 rounded p-1 text-neutral-400 opacity-0 transition-opacity group-hover:opacity-100 hover:bg-neutral-200 hover:text-neutral-600 dark:hover:bg-neutral-600 dark:hover:text-neutral-300"
                            aria-label="Remove from recent"
                        >
                            <svg
                                class="h-4 w-4"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                                aria-hidden="true"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </template>
            </div>
        </div>
    </div>
</div>

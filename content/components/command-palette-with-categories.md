---
slug: command-palette-with-categories
title: Command Palette with Categories
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
            categories: [
                {
                    name: 'Pages',
                    items: [
                        { id: 'home', label: 'Home' },
                        { id: 'dashboard', label: 'Dashboard' },
                        { id: 'settings', label: 'Settings' }
                    ]
                },
                {
                    name: 'Actions',
                    items: [
                        { id: 'new-project', label: 'Create new project' },
                        { id: 'invite', label: 'Invite team member' },
                        { id: 'export', label: 'Export data' }
                    ]
                },
                {
                    name: 'Help',
                    items: [
                        { id: 'docs', label: 'Documentation' },
                        { id: 'support', label: 'Contact support' }
                    ]
                }
            ],
            get flatItems() {
                return this.categories.flatMap(cat => cat.items);
            },
            get filteredCategories() {
                if (!this.search) return this.categories;
                return this.categories
                    .map(cat => ({
                        ...cat,
                        items: cat.items.filter(item =>
                            item.label.toLowerCase().includes(this.search.toLowerCase())
                        )
                    }))
                    .filter(cat => cat.items.length > 0);
            },
            get filteredItems() {
                return this.filteredCategories.flatMap(cat => cat.items);
            },
            focusItem(index) {
                this.activeIndex = index;
                this.$nextTick(() => {
                    const items = this.$refs.listbox?.querySelectorAll('[role=option]');
                    items?.[index]?.scrollIntoView({ block: 'nearest' });
                });
            },
            next() {
                if (this.filteredItems.length === 0) return;
                this.focusItem((this.activeIndex + 1) % this.filteredItems.length);
            },
            prev() {
                if (this.filteredItems.length === 0) return;
                this.focusItem((this.activeIndex - 1 + this.filteredItems.length) % this.filteredItems.length);
            },
            selectItem() {
                if (this.filteredItems[this.activeIndex]) {
                    console.log('Selected:', this.filteredItems[this.activeIndex].label);
                    this.open = false;
                }
            },
            close() {
                this.open = false;
                this.search = '';
                this.activeIndex = 0;
            },
            getGlobalIndex(catIndex, itemIndex) {
                let index = 0;
                for (let i = 0; i < catIndex; i++) {
                    index += this.filteredCategories[i].items.length;
                }
                return index + itemIndex;
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
                        aria-controls="command-list-categories"
                    />
                </div>
            </div>

            <!-- Results -->
            <div x-ref="listbox" id="command-list-categories" role="listbox" class="max-h-80 overflow-y-auto p-2">
                <template x-if="filteredItems.length === 0">
                    <div class="px-4 py-8 text-center text-sm text-neutral-500 dark:text-neutral-400">
                        No results found.
                    </div>
                </template>

                <template x-for="(category, catIndex) in filteredCategories" :key="category.name">
                    <div class="mb-2">
                        <div
                            class="px-3 py-2 text-xs font-semibold tracking-wider text-neutral-400 uppercase dark:text-neutral-500"
                            x-text="category.name"
                        ></div>
                        <template x-for="(item, itemIndex) in category.items" :key="item.id">
                            <button
                                @click="activeIndex = getGlobalIndex(catIndex, itemIndex); selectItem()"
                                @mouseenter="activeIndex = getGlobalIndex(catIndex, itemIndex)"
                                type="button"
                                role="option"
                                :aria-selected="activeIndex === getGlobalIndex(catIndex, itemIndex)"
                                class="flex w-full items-center gap-3 rounded-lg px-3 py-2.5 text-left text-sm transition-colors focus:outline-none"
                                :class="activeIndex === getGlobalIndex(catIndex, itemIndex) ? 'bg-neutral-100 text-neutral-900 dark:bg-neutral-700 dark:text-neutral-50' : 'text-neutral-600 dark:text-neutral-400'"
                            >
                                <span x-text="item.label"></span>
                            </button>
                        </template>
                    </div>
                </template>
            </div>
        </div>
    </div>
</div>

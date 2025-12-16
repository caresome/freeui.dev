---
slug: command-palette-with-icons
title: Command Palette with Icons
category: command-search
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
            items: [
                { id: 'home', label: 'Home', icon: 'home' },
                { id: 'projects', label: 'Projects', icon: 'folder' },
                { id: 'tasks', label: 'Tasks', icon: 'clipboard' },
                { id: 'calendar', label: 'Calendar', icon: 'calendar' },
                { id: 'team', label: 'Team', icon: 'users' },
                { id: 'settings', label: 'Settings', icon: 'cog' }
            ],
            get filteredItems() {
                if (!this.search) return this.items;
                return this.items.filter(item =>
                    item.label.toLowerCase().includes(this.search.toLowerCase())
                );
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
                        aria-controls="command-list-icons"
                    />
                </div>
            </div>

            <!-- Results -->
            <div x-ref="listbox" id="command-list-icons" role="listbox" class="max-h-72 overflow-y-auto p-2">
                <template x-if="filteredItems.length === 0">
                    <div class="px-4 py-8 text-center text-sm text-neutral-500 dark:text-neutral-400">
                        No results found.
                    </div>
                </template>

                <template x-for="(item, index) in filteredItems" :key="item.id">
                    <button
                        @click="selectItem()"
                        @mouseenter="activeIndex = index"
                        type="button"
                        role="option"
                        :aria-selected="activeIndex === index"
                        class="flex w-full items-center gap-3 rounded-lg px-3 py-2.5 text-left text-sm transition-colors focus:outline-none"
                        :class="activeIndex === index ? 'bg-neutral-100 text-neutral-900 dark:bg-neutral-700 dark:text-neutral-50' : 'text-neutral-600 dark:text-neutral-400'"
                    >
                        <div
                            class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg"
                            :class="activeIndex === index ? 'bg-neutral-200 dark:bg-neutral-600' : 'bg-neutral-100 dark:bg-neutral-700'"
                        >
                            <!-- Home icon -->
                            <svg
                                x-show="item.icon === 'home'"
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
                                    d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"
                                />
                            </svg>
                            <!-- Folder icon -->
                            <svg
                                x-show="item.icon === 'folder'"
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
                                    d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z"
                                />
                            </svg>
                            <!-- Clipboard icon -->
                            <svg
                                x-show="item.icon === 'clipboard'"
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
                                    d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z"
                                />
                            </svg>
                            <!-- Calendar icon -->
                            <svg
                                x-show="item.icon === 'calendar'"
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
                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"
                                />
                            </svg>
                            <!-- Users icon -->
                            <svg
                                x-show="item.icon === 'users'"
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
                                    d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"
                                />
                            </svg>
                            <!-- Cog icon -->
                            <svg
                                x-show="item.icon === 'cog'"
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
                                    d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z"
                                />
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                                />
                            </svg>
                        </div>
                        <span x-text="item.label"></span>
                    </button>
                </template>
            </div>
        </div>
    </div>
</div>

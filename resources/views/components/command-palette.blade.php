<div
    x-data="commandPalette()"
    x-on:keydown.window="
        if (($event.metaKey || $event.ctrlKey) && $event.key === 'k') {
            $event.preventDefault()
            toggle()
        }
    "
    x-on:open-command-palette.window="open = true"
>
    <!-- Backdrop -->
    <div
        x-show="open"
        x-transition:enter="transition duration-100 ease-out"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition duration-75 ease-in"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 bg-neutral-900/50 backdrop-blur-sm dark:bg-black/60"
        x-on:click="close()"
        x-cloak
    ></div>

    <!-- Modal -->
    <div
        x-show="open"
        x-trap.noscroll="open"
        x-transition:enter="transition duration-100 ease-out"
        x-transition:enter-start="scale-95 opacity-0"
        x-transition:enter-end="scale-100 opacity-100"
        x-transition:leave="transition duration-75 ease-in"
        x-transition:leave-start="scale-100 opacity-100"
        x-transition:leave-end="scale-95 opacity-0"
        class="fixed top-[15%] left-1/2 z-50 w-full max-w-lg -translate-x-1/2 px-4"
        x-cloak
    >
        <div
            role="dialog"
            aria-modal="true"
            aria-label="Search components"
            class="overflow-hidden rounded-xl border-2 border-neutral-900 bg-white shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] dark:border-white dark:bg-neutral-900 dark:shadow-[4px_4px_0px_0px_rgba(255,255,255,1)]"
        >
            <!-- Search Input -->
            <div class="relative">
                <svg
                    class="absolute top-1/2 left-3 h-4 w-4 -translate-y-1/2 text-neutral-400 dark:text-neutral-500"
                    xmlns="http://www.w3.org/2000/svg"
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
                <input
                    x-ref="searchInput"
                    x-model="search"
                    type="text"
                    placeholder="Search..."
                    aria-label="Search components"
                    aria-autocomplete="list"
                    aria-controls="search-results"
                    :aria-activedescendant="results.length > 0 ? 'result-' + selectedIndex : ''"
                    class="w-full bg-transparent py-3 pr-3 pl-10 text-sm text-neutral-900 outline-none placeholder:text-neutral-400 dark:text-white dark:placeholder:text-neutral-500"
                    x-on:keydown.arrow-up.prevent="selectPrevious()"
                    x-on:keydown.arrow-down.prevent="selectNext()"
                    x-on:keydown.enter.prevent="goToSelected()"
                    x-on:keydown.escape="close()"
                    x-on:keydown.tab.prevent
                />
                <kbd
                    class="absolute top-1/2 right-3 -translate-y-1/2 rounded border border-neutral-300 bg-neutral-100 px-1.5 py-0.5 font-mono text-[10px] text-neutral-500 dark:border-neutral-600 dark:bg-neutral-800 dark:text-neutral-400"
                >
                    esc
                </kbd>
            </div>

            <!-- Divider -->
            <div class="border-t-2 border-neutral-900 dark:border-white"></div>

            <!-- Results -->
            <div class="max-h-72 overflow-y-auto" x-ref="resultsList">
                <template x-if="search.length < 2">
                    <div class="px-3 py-6 text-center">
                        <p class="text-sm text-neutral-500 dark:text-neutral-400">Type to search components...</p>
                    </div>
                </template>

                <template x-if="search.length >= 2 && results.length === 0">
                    <div class="px-3 py-6 text-center">
                        <p class="text-sm text-neutral-500 dark:text-neutral-400">
                            No results for "
                            <span x-text="search"></span>
                            "
                        </p>
                    </div>
                </template>

                {{-- Screen reader announcement for results --}}
                <div aria-live="polite" class="sr-only">
                    <span x-show="open && search.length >= 2" x-text="resultsCount + ' results found'"></span>
                </div>

                <template x-if="search.length >= 2 && results.length > 0">
                    <div id="search-results" class="p-1.5" role="listbox">
                        <template
                            x-for="
                                (label, type) in
                                    {
                                        collection: 'Collections',
                                        category: 'Categories',
                                        component: 'Components',
                                    }
                            "
                            :key="type"
                        >
                            <template x-if="groupedResults()[type]?.length > 0">
                                <div>
                                    <div class="px-2 pt-2 pb-1">
                                        <span
                                            class="text-[10px] font-semibold tracking-wider text-neutral-400 uppercase dark:text-neutral-500"
                                            x-text="label"
                                        ></span>
                                    </div>
                                    <template x-for="(result, idx) in groupedResults()[type]" :key="result.url">
                                        <a
                                            :href="result.url"
                                            data-result
                                            :id="'result-' + results.indexOf(result)"
                                            :data-index="results.indexOf(result)"
                                            tabindex="-1"
                                            role="option"
                                            :aria-selected="selectedIndex === results.indexOf(result) ? 'true' : 'false'"
                                            class="flex items-center gap-2.5 rounded-lg px-2.5 py-2 transition-colors"
                                            :class="selectedIndex === results.indexOf(result)
                                                ? 'bg-neutral-900 text-white dark:bg-white dark:text-neutral-900'
                                                : 'text-neutral-700 hover:bg-neutral-100 dark:text-neutral-300 dark:hover:bg-neutral-800'"
                                            x-on:mouseenter="selectedIndex = results.indexOf(result)"
                                        >
                                            <div
                                                class="flex h-7 w-7 shrink-0 items-center justify-center rounded-md"
                                                :class="selectedIndex === results.indexOf(result)
                                                    ? 'bg-white/20 dark:bg-neutral-900/20'
                                                    : 'bg-neutral-100 dark:bg-neutral-800'"
                                                x-html="getIcon(result.icon)"
                                            ></div>
                                            <div class="min-w-0 flex-1">
                                                <span
                                                    class="block truncate text-sm font-medium"
                                                    x-text="result.title"
                                                ></span>
                                                <template x-if="result.breadcrumb">
                                                    <span
                                                        class="block truncate text-xs"
                                                        :class="selectedIndex === results.indexOf(result)
                                                            ? 'text-white/60 dark:text-neutral-900/60'
                                                            : 'text-neutral-400 dark:text-neutral-500'"
                                                        x-text="result.breadcrumb"
                                                    ></span>
                                                </template>
                                            </div>
                                            <div class="shrink-0" x-show="selectedIndex === results.indexOf(result)">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                    class="h-3.5 w-3.5"
                                                    aria-hidden="true"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M3 10a.75.75 0 0 1 .75-.75h10.638L10.23 5.29a.75.75 0 1 1 1.04-1.08l5.5 5.25a.75.75 0 0 1 0 1.08l-5.5 5.25a.75.75 0 1 1-1.04-1.08l4.158-3.96H3.75A.75.75 0 0 1 3 10Z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                            </div>
                                        </a>
                                    </template>
                                </div>
                            </template>
                        </template>
                    </div>
                </template>
            </div>

            <!-- Footer -->
            <div
                class="flex items-center gap-3 border-t-2 border-neutral-900 bg-stone-50 px-3 py-2 dark:border-white dark:bg-neutral-800"
            >
                <span class="flex items-center gap-1 text-[10px] text-neutral-400 dark:text-neutral-500">
                    <kbd
                        class="rounded border border-neutral-300 bg-white px-1 py-0.5 font-mono dark:border-neutral-600 dark:bg-neutral-900"
                    >
                        ↑
                    </kbd>
                    <kbd
                        class="rounded border border-neutral-300 bg-white px-1 py-0.5 font-mono dark:border-neutral-600 dark:bg-neutral-900"
                    >
                        ↓
                    </kbd>
                    navigate
                </span>
                <span class="flex items-center gap-1 text-[10px] text-neutral-400 dark:text-neutral-500">
                    <kbd
                        class="rounded border border-neutral-300 bg-white px-1 py-0.5 font-mono dark:border-neutral-600 dark:bg-neutral-900"
                    >
                        ↵
                    </kbd>
                    select
                </span>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('commandPalette', () => ({
            open: false,
            search: '',
            results: [],
            selectedIndex: 0,
            fuse: null,
            searchData: @js($searchData),

            get resultsCount() {
                return this.results.length;
            },

            init() {
                this.fuse = new Fuse(this.searchData, {
                    keys: ['title', 'breadcrumb'],
                    threshold: 0.4,
                    includeScore: true,
                });

                this.$watch('open', (value) => {
                    if (value) {
                        document.body.style.overflow = 'hidden';
                        this.$nextTick(() => this.$refs.searchInput?.focus());
                    } else {
                        document.body.style.overflow = '';
                        this.search = '';
                        this.results = [];
                        this.selectedIndex = 0;
                    }
                });

                this.$watch('search', (value) => {
                    this.selectedIndex = 0;
                    if (value.length < 2) {
                        this.results = [];
                        return;
                    }
                    this.results = this.fuse.search(value).map((r) => r.item);
                });
            },

            toggle() {
                this.open = !this.open;
            },

            close() {
                this.open = false;
                // Return focus to the trigger element
                this.$nextTick(() => {
                    const trigger = document.querySelector('[x-on\\:click="$dispatch(\'open-command-palette\')"]');
                    trigger?.focus();
                });
            },

            selectPrevious() {
                const count = this.resultsCount;
                if (count > 0) {
                    this.selectedIndex = (this.selectedIndex - 1 + count) % count;
                    this.scrollToSelected();
                }
            },

            selectNext() {
                const count = this.resultsCount;
                if (count > 0) {
                    this.selectedIndex = (this.selectedIndex + 1) % count;
                    this.scrollToSelected();
                }
            },

            scrollToSelected() {
                this.$nextTick(() => {
                    const selected = this.$refs.resultsList?.querySelector("[data-index='" + this.selectedIndex + "']");
                    if (selected) {
                        selected.scrollIntoView({ block: 'nearest' });
                    }
                });
            },

            goToSelected() {
                if (this.results[this.selectedIndex]) {
                    const url = this.results[this.selectedIndex].url;
                    const currentUrl = new URL(window.location.href);
                    const targetUrl = new URL(url, window.location.origin);

                    // Check if it's same page navigation (only hash differs)
                    if (currentUrl.pathname === targetUrl.pathname && targetUrl.hash) {
                        this.close();
                        // Small delay to let modal close, then scroll
                        setTimeout(() => {
                            const element = document.querySelector(targetUrl.hash);
                            if (element) {
                                element.scrollIntoView({ behavior: 'smooth' });
                            }
                            // Update URL hash without triggering navigation
                            history.pushState(null, '', targetUrl.hash);
                        }, 100);
                    } else {
                        window.location.href = url;
                    }
                }
            },

            getIcon(iconName) {
                const icons = {
                    'heroicon-o-rectangle-stack': `<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='h-3.5 w-3.5'><path stroke-linecap='round' stroke-linejoin='round' d='M6.429 9.75 2.25 12l4.179 2.25m0-4.5 5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0 4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0-5.571 3-5.571-3' /></svg>`,
                    'heroicon-o-folder': `<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='h-3.5 w-3.5'><path stroke-linecap='round' stroke-linejoin='round' d='M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z' /></svg>`,
                    'heroicon-o-cube': `<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='h-3.5 w-3.5'><path stroke-linecap='round' stroke-linejoin='round' d='m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9' /></svg>`,
                };
                return icons[iconName] || icons['heroicon-o-cube'];
            },

            groupedResults() {
                const groups = { collection: [], category: [], component: [] };
                this.results.forEach((r) => {
                    if (groups[r.type]) groups[r.type].push(r);
                });
                return groups;
            },
        }));
    });
</script>

<div
    x-data="{
        open: false,
        selectedIndex: 0,
        get resultsCount() {
            return this.$refs.resultsList ? this.$refs.resultsList.querySelectorAll('[data-result]').length : 0
        },
        init() {
            this.$watch('open', (value) => {
                if (value) {
                    document.body.style.overflow = 'hidden'
                    this.$nextTick(() => this.$refs.searchInput?.focus())
                } else {
                    document.body.style.overflow = ''
                    $wire.set('search', '')
                    this.selectedIndex = 0
                }
            })
        },
        toggle() {
            this.open = !this.open
        },
        close() {
            this.open = false
        },
        resetSelection() {
            this.selectedIndex = 0
        },
        selectPrevious() {
            const count = this.resultsCount
            if (count > 0) {
                this.selectedIndex = (this.selectedIndex - 1 + count) % count
                this.scrollToSelected()
            }
        },
        selectNext() {
            const count = this.resultsCount
            if (count > 0) {
                this.selectedIndex = (this.selectedIndex + 1) % count
                this.scrollToSelected()
            }
        },
        scrollToSelected() {
            this.$nextTick(() => {
                const selected = this.$refs.resultsList?.querySelector('[data-index=\'' + this.selectedIndex + '\']')
                if (selected) {
                    selected.scrollIntoView({ block: 'nearest' })
                }
            })
        },
        goToSelected() {
            const selected = this.$refs.resultsList?.querySelector('[data-index=\'' + this.selectedIndex + '\']')
            if (selected) {
                const url = selected.getAttribute('href')
                if (url) {
                    window.location.href = url
                }
            }
        },
    }"
    x-on:keydown.window="
        if (($event.metaKey || $event.ctrlKey) && $event.key === 'k') {
            $event.preventDefault()
            toggle()
        }
    "
    x-on:open-command-palette.window="open = true"
    wire:ignore.self
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
                <x-heroicon-o-magnifying-glass
                    class="absolute top-1/2 left-3 h-4 w-4 -translate-y-1/2 text-neutral-400 dark:text-neutral-500"
                    aria-hidden="true"
                />
                <input
                    x-ref="searchInput"
                    wire:model.live.debounce.150ms="search"
                    x-on:input.debounce.200ms="$nextTick(() => resetSelection())"
                    type="text"
                    placeholder="Search..."
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
                @if (strlen($search) < 2)
                    <div class="px-3 py-6 text-center">
                        <p class="text-sm text-neutral-500 dark:text-neutral-400">Type to search components...</p>
                    </div>
                @elseif ($this->results->isEmpty())
                    <div class="px-3 py-6 text-center">
                        <p class="text-sm text-neutral-500 dark:text-neutral-400">No results for "{{ $search }}"</p>
                    </div>
                @else
                    <div class="p-1.5" role="listbox">
                        @php
                            $groupedResults = $this->results->groupBy('type');
                            $globalIndex = 0;
                        @endphp

                        @foreach (['collection' => 'Collections', 'category' => 'Categories', 'component' => 'Components'] as $type => $label)
                            @if ($groupedResults->has($type))
                                <div class="px-2 pt-2 pb-1">
                                    <span
                                        class="text-[10px] font-semibold tracking-wider text-neutral-400 uppercase dark:text-neutral-500"
                                    >
                                        {{ $label }}
                                    </span>
                                </div>
                                @foreach ($groupedResults[$type] as $result)
                                    <a
                                        href="{{ $result['url'] }}"
                                        data-result
                                        data-index="{{ $globalIndex }}"
                                        tabindex="-1"
                                        role="option"
                                        x-bind:aria-selected="selectedIndex === {{ $globalIndex }} ? 'true' : 'false'"
                                        class="flex items-center gap-2.5 rounded-lg px-2.5 py-2 transition-colors"
                                        x-bind:class="
                                            selectedIndex === {{ $globalIndex }}
                                                ? 'bg-neutral-900 text-white dark:bg-white dark:text-neutral-900'
                                                : 'text-neutral-700 hover:bg-neutral-100 dark:text-neutral-300 dark:hover:bg-neutral-800'
                                        "
                                        x-on:mouseenter="selectedIndex = {{ $globalIndex }}"
                                    >
                                        <div
                                            class="flex h-7 w-7 shrink-0 items-center justify-center rounded-md"
                                            x-bind:class="
                                                selectedIndex === {{ $globalIndex }}
                                                    ? 'bg-white/20 dark:bg-neutral-900/20'
                                                    : 'bg-neutral-100 dark:bg-neutral-800'
                                            "
                                        >
                                            @svg($result['icon'], ['class' => 'h-3.5 w-3.5', 'aria-hidden' => 'true'])
                                        </div>
                                        <div class="min-w-0 flex-1">
                                            <span class="block truncate text-sm font-medium">
                                                {{ $result['title'] }}
                                            </span>
                                            @if ($result['breadcrumb'])
                                                <span
                                                    class="block truncate text-xs"
                                                    x-bind:class="
                                                        selectedIndex === {{ $globalIndex }}
                                                            ? 'text-white/60 dark:text-neutral-900/60'
                                                            : 'text-neutral-400 dark:text-neutral-500'
                                                    "
                                                >
                                                    {{ $result['breadcrumb'] }}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="shrink-0" x-show="selectedIndex === {{ $globalIndex }}">
                                            <x-heroicon-s-arrow-right class="h-3.5 w-3.5" aria-hidden="true" />
                                        </div>
                                    </a>
                                    @php
                                        $globalIndex++;
                                    @endphp
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                @endif
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

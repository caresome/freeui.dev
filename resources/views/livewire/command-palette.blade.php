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
        x-transition:enter="transition duration-150 ease-out"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition duration-100 ease-in"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 bg-neutral-900/60 dark:bg-black/70"
        x-on:click="close()"
        x-cloak
    ></div>

    <!-- Modal -->
    <div
        x-show="open"
        x-transition:enter="transition duration-150 ease-out"
        x-transition:enter-start="-translate-y-4 opacity-0"
        x-transition:enter-end="translate-y-0 opacity-100"
        x-transition:leave="transition duration-100 ease-in"
        x-transition:leave-start="translate-y-0 opacity-100"
        x-transition:leave-end="-translate-y-4 opacity-0"
        class="fixed top-[12%] left-1/2 z-50 w-full max-w-2xl -translate-x-1/2 px-4"
        x-cloak
    >
        <div
            class="overflow-hidden rounded-xl border-2 border-neutral-900 bg-white shadow-[6px_6px_0px_0px_rgba(0,0,0,1)] dark:border-white dark:bg-neutral-900 dark:shadow-[6px_6px_0px_0px_rgba(255,255,255,1)]"
        >
            <!-- Search Input -->
            <div class="relative border-b-2 border-neutral-900 dark:border-white">
                <x-heroicon-o-magnifying-glass
                    class="absolute top-1/2 left-4 h-5 w-5 -translate-y-1/2 text-neutral-900 dark:text-white"
                    aria-hidden="true"
                />
                <input
                    x-ref="searchInput"
                    wire:model.live.debounce.150ms="search"
                    x-on:input.debounce.200ms="$nextTick(() => resetSelection())"
                    type="text"
                    placeholder="Search components, categories, collections..."
                    class="w-full bg-transparent py-4 pr-4 pl-12 text-lg font-medium text-neutral-900 outline-none placeholder:text-neutral-400 dark:text-white dark:placeholder:text-neutral-500"
                    x-on:keydown.arrow-up.prevent="selectPrevious()"
                    x-on:keydown.arrow-down.prevent="selectNext()"
                    x-on:keydown.enter.prevent="goToSelected()"
                    x-on:keydown.escape="close()"
                />
            </div>

            <!-- Results -->
            <div class="max-h-[400px] overflow-y-auto" x-ref="resultsList">
                @if (strlen($search) < 2)
                    <div class="px-6 py-12 text-center">
                        <div
                            class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-xl border-2 border-neutral-900 bg-stone-50 dark:border-white dark:bg-neutral-800"
                        >
                            <x-heroicon-o-command-line
                                class="h-7 w-7 text-neutral-900 dark:text-white"
                                aria-hidden="true"
                            />
                        </div>
                        <p class="font-bold text-neutral-900 dark:text-white">Quick Navigation</p>
                        <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">
                            Type to search components, categories, and collections
                        </p>
                    </div>
                @elseif ($this->results->isEmpty())
                    <div class="px-6 py-12 text-center">
                        <div
                            class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-xl border-2 border-neutral-900 bg-stone-50 dark:border-white dark:bg-neutral-800"
                        >
                            <x-heroicon-o-magnifying-glass-minus
                                class="h-7 w-7 text-neutral-900 dark:text-white"
                                aria-hidden="true"
                            />
                        </div>
                        <p class="font-bold text-neutral-900 dark:text-white">No results found</p>
                        <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">
                            Try searching for "{{ $search }}" with different keywords
                        </p>
                    </div>
                @else
                    <ul role="listbox" class="py-2">
                        @foreach ($this->results as $index => $result)
                            <li
                                role="option"
                                x-bind:aria-selected="selectedIndex === {{ $index }} ? 'true' : 'false'"
                            >
                                <a
                                    href="{{ $result['url'] }}"
                                    data-result
                                    data-index="{{ $index }}"
                                    class="mx-2 flex items-center gap-4 rounded-lg px-4 py-3 transition-all"
                                    x-bind:class="
                                        selectedIndex === {{ $index }}
                                            ? 'border-2 border-neutral-900 bg-stone-50 shadow-[3px_3px_0px_0px_rgba(0,0,0,1)] dark:border-white dark:bg-neutral-800 dark:shadow-[3px_3px_0px_0px_rgba(255,255,255,1)]'
                                            : 'border-2 border-transparent hover:bg-stone-50 dark:hover:bg-neutral-800'
                                    "
                                    x-on:mouseenter="selectedIndex = {{ $index }}"
                                >
                                    <!-- Icon -->
                                    <div
                                        class="{{ $result['type'] === 'collection' ? 'bg-neutral-900 text-white dark:bg-white dark:text-neutral-900' : 'bg-white text-neutral-900 dark:bg-neutral-900 dark:text-white' }} flex h-10 w-10 shrink-0 items-center justify-center rounded-lg border-2 border-neutral-900 dark:border-white"
                                    >
                                        @svg($result['icon'], ['class' => 'h-5 w-5', 'aria-hidden' => 'true'])
                                    </div>

                                    <!-- Content -->
                                    <div class="min-w-0 flex-1">
                                        <div class="flex items-center gap-3">
                                            <span class="truncate text-base font-bold text-neutral-900 dark:text-white">
                                                {{ $result['title'] }}
                                            </span>
                                            <span
                                                class="{{ $result['type'] === 'collection' ? 'bg-neutral-900 text-white dark:bg-white dark:text-neutral-900' : 'bg-white text-neutral-900 dark:bg-neutral-900 dark:text-white' }} shrink-0 rounded-md border-2 border-neutral-900 px-2 py-0.5 text-xs font-bold tracking-wide uppercase dark:border-white"
                                            >
                                                {{ $result['type'] }}
                                            </span>
                                        </div>
                                        @if ($result['breadcrumb'])
                                            <p class="mt-0.5 truncate text-sm text-neutral-500 dark:text-neutral-400">
                                                {{ $result['breadcrumb'] }}
                                            </p>
                                        @endif
                                    </div>

                                    <!-- Arrow -->
                                    <div
                                        class="shrink-0 transition-opacity"
                                        x-bind:class="selectedIndex === {{ $index }} ? 'opacity-100' : 'opacity-0'"
                                    >
                                        <x-heroicon-o-arrow-right
                                            class="h-5 w-5 text-neutral-900 dark:text-white"
                                            aria-hidden="true"
                                        />
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <!-- Footer -->
            <div
                class="flex items-center gap-6 border-t-2 border-neutral-900 bg-stone-50 px-4 py-3 dark:border-white dark:bg-neutral-800"
            >
                <span class="flex items-center gap-2 text-xs font-medium text-neutral-600 dark:text-neutral-300">
                    <kbd
                        class="inline-flex h-6 min-w-6 items-center justify-center rounded-md border-2 border-neutral-900 bg-white px-1.5 font-mono text-xs font-bold dark:border-white dark:bg-neutral-900"
                    >
                        &uarr;
                    </kbd>
                    <kbd
                        class="inline-flex h-6 min-w-6 items-center justify-center rounded-md border-2 border-neutral-900 bg-white px-1.5 font-mono text-xs font-bold dark:border-white dark:bg-neutral-900"
                    >
                        &darr;
                    </kbd>
                    <span>Navigate</span>
                </span>
                <span class="flex items-center gap-2 text-xs font-medium text-neutral-600 dark:text-neutral-300">
                    <kbd
                        class="inline-flex h-6 items-center justify-center rounded-md border-2 border-neutral-900 bg-white px-2 font-mono text-xs font-bold dark:border-white dark:bg-neutral-900"
                    >
                        &crarr;
                    </kbd>
                    <span>Select</span>
                </span>
                <span class="flex items-center gap-2 text-xs font-medium text-neutral-600 dark:text-neutral-300">
                    <kbd
                        class="inline-flex h-6 items-center justify-center rounded-md border-2 border-neutral-900 bg-white px-2 font-mono text-xs font-bold dark:border-white dark:bg-neutral-900"
                    >
                        esc
                    </kbd>
                    <span>Close</span>
                </span>
            </div>
        </div>
    </div>
</div>

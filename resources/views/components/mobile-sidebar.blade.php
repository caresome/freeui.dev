@props(['collections' => collect()])

<div
    x-data="{ open: false }"
    x-on:toggle-mobile-sidebar.window="open = !open"
    x-on:keydown.escape.window="open = false"
    class="lg:hidden"
>
    <!-- Backdrop -->
    <div
        x-show="open"
        x-transition:enter="transition-opacity duration-300 ease-out"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity duration-200 ease-in"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click="open = false"
        class="fixed inset-0 z-40 bg-neutral-900/50 backdrop-blur-sm dark:bg-neutral-950/80"
        x-cloak
    ></div>

    <!-- Drawer -->
    <div
        x-show="open"
        x-transition:enter="transition duration-300 ease-out"
        x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition duration-200 ease-in"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        class="fixed inset-y-0 left-0 z-50 flex w-72 flex-col border-r-2 border-neutral-900 bg-white dark:border-white dark:bg-neutral-900"
        x-cloak
    >
        <!-- Header -->
        <div class="flex h-16 items-center justify-between border-b-2 border-neutral-900 px-4 dark:border-white">
            <a href="/" class="flex items-center gap-2" @click="open = false">
                <div
                    class="flex h-8 w-8 items-center justify-center rounded-lg border-2 border-neutral-900 bg-neutral-900 text-white dark:border-white dark:bg-white dark:text-neutral-900"
                >
                    <span class="text-sm font-black">F</span>
                </div>
                <span class="text-lg font-bold text-neutral-900 dark:text-white">FreeUI</span>
            </a>
            <button
                type="button"
                @click="open = false"
                class="flex h-9 w-9 items-center justify-center rounded-xl border-2 border-neutral-900 bg-white text-neutral-900 shadow-[3px_3px_0px_0px_rgba(0,0,0,1)] transition-all hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-none dark:border-white dark:bg-neutral-900 dark:text-white dark:shadow-[3px_3px_0px_0px_rgba(255,255,255,1)]"
            >
                <span class="sr-only">Close menu</span>
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 overflow-y-auto px-3 py-4">
            @foreach ($collections as $collection)
                <div x-data="{ open: true }" class="mb-2">
                    <button
                        type="button"
                        @click="open = !open"
                        class="flex w-full items-center justify-between rounded-lg px-3 py-2 text-sm font-bold text-neutral-900 transition-colors hover:bg-neutral-100 dark:text-white dark:hover:bg-neutral-800"
                    >
                        <span class="flex items-center gap-2">
                            @if ($collection->icon)
                                <x-dynamic-component
                                    :component="$collection->icon"
                                    class="h-4 w-4 text-neutral-500 dark:text-neutral-400"
                                />
                            @endif

                            {{ $collection->title }}
                        </span>
                        <svg
                            class="h-4 w-4 text-neutral-500 transition-transform duration-200 dark:text-neutral-400"
                            :class="open ? 'rotate-180' : ''"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>

                    <ul x-show="open" x-collapse class="mt-1 space-y-0.5 pl-2">
                        @foreach ($collection->categories as $category)
                            @php
                                $isActive = request()->is($collection->slug . '/' . $category->slug . '*');
                            @endphp

                            <li>
                                <a
                                    href="{{ url($collection->slug . '/' . $category->slug) }}"
                                    @click="open = false"
                                    class="{{ $isActive ? 'bg-neutral-900 font-medium text-white dark:bg-white dark:text-neutral-900' : 'text-neutral-600 hover:bg-neutral-100 hover:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-white' }} flex items-center justify-between rounded-lg px-3 py-1.5 text-sm transition-colors"
                                >
                                    <span>{{ $category->title }}</span>
                                    @if ($category->components_count)
                                        <span
                                            class="{{ $isActive ? 'bg-white/20 text-white dark:bg-neutral-900/20 dark:text-neutral-900' : 'bg-neutral-100 text-neutral-500 dark:bg-neutral-800 dark:text-neutral-400' }} rounded-md px-1.5 py-0.5 text-xs font-medium"
                                        >
                                            {{ $category->components_count }}
                                        </span>
                                    @endif
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </nav>
    </div>
</div>

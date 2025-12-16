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
        x-transition:enter="transition-opacity duration-200 ease-out"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity duration-150 ease-in"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click="open = false"
        class="fixed inset-0 z-40 bg-neutral-900/20 backdrop-blur-sm dark:bg-neutral-950/50"
        x-cloak
    ></div>

    <!-- Drawer -->
    <div
        x-show="open"
        x-transition:enter="transition duration-200 ease-out"
        x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition duration-150 ease-in"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        class="fixed inset-y-0 left-0 z-50 flex w-72 flex-col border-r border-neutral-200 bg-white shadow-xl dark:border-neutral-800 dark:bg-neutral-950"
        x-cloak
    >
        <!-- Header -->
        <div class="flex h-14 items-center justify-between border-b border-neutral-200 px-4 dark:border-neutral-800">
            <a href="/" class="flex items-center gap-2" @click="open = false">
                <div
                    class="flex h-7 w-7 items-center justify-center rounded-md border border-neutral-900 bg-neutral-900 text-white dark:border-white dark:bg-white dark:text-neutral-900"
                >
                    <span class="text-xs font-bold">F</span>
                </div>
                <span class="text-base font-semibold text-neutral-900 dark:text-white">FreeUI</span>
            </a>
            <button
                type="button"
                @click="open = false"
                class="flex h-8 w-8 items-center justify-center rounded-lg text-neutral-500 transition-colors hover:bg-neutral-100 hover:text-neutral-700 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-300"
            >
                <span class="sr-only">Close menu</span>
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 overflow-y-auto px-3 py-4">
            @foreach ($collections as $collection)
                <div x-data="{ open: true }" class="mb-1">
                    <button
                        type="button"
                        @click="open = !open"
                        class="flex w-full items-center justify-between rounded-lg px-3 py-2 text-sm font-semibold text-neutral-900 transition-colors hover:bg-neutral-100 dark:text-white dark:hover:bg-neutral-800"
                    >
                        <span class="flex items-center gap-2">
                            @if ($collection->icon)
                                <x-dynamic-component
                                    :component="$collection->icon"
                                    class="h-4 w-4 text-neutral-400 dark:text-neutral-500"
                                />
                            @endif

                            {{ $collection->title }}
                        </span>
                        <svg
                            class="h-4 w-4 text-neutral-400 transition-transform duration-200 dark:text-neutral-500"
                            :class="open ? 'rotate-180' : ''"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>

                    <ul x-show="open" x-collapse class="mt-0.5 space-y-0.5 pl-2">
                        @foreach ($collection->categories as $category)
                            @php
                                $isActive = request()->is($collection->slug . '/' . $category->slug . '*');
                            @endphp

                            <li>
                                <a
                                    href="{{ url($collection->slug . '/' . $category->slug) }}"
                                    @click="open = false"
                                    class="{{ $isActive ? 'bg-neutral-100 font-medium text-neutral-900 dark:bg-neutral-800 dark:text-white' : 'text-neutral-600 hover:bg-neutral-50 hover:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800/50 dark:hover:text-white' }} flex items-center justify-between rounded-md px-3 py-1.5 text-sm transition-colors"
                                >
                                    <span>{{ $category->title }}</span>
                                    @if ($category->components_count)
                                        <span
                                            class="{{ $isActive ? 'text-neutral-500 dark:text-neutral-400' : 'text-neutral-400 dark:text-neutral-500' }} text-xs"
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

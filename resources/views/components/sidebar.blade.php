@props(['collections' => collect()])

<aside
    class="hidden w-64 shrink-0 flex-col border-r border-neutral-200 bg-white lg:flex dark:border-neutral-800 dark:bg-neutral-950"
>
    <nav class="sticky top-14 max-h-[calc(100vh-3.5rem)] overflow-y-auto px-3 py-4">
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
</aside>

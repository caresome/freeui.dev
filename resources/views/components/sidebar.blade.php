@props(['collections' => collect()])

<aside
    class="hidden w-64 shrink-0 flex-col border-r-2 border-neutral-900 bg-white lg:flex dark:border-white dark:bg-neutral-900"
>
    <nav class="sticky top-16 max-h-[calc(100vh-4rem)] overflow-y-auto px-3 py-4">
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
</aside>

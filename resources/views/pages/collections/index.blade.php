<x-layouts.app title="Collections">
    <section class="bg-stone-50 py-16 transition-colors duration-200 sm:py-20 dark:bg-neutral-950">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <div
                    class="mb-6 inline-flex items-center gap-2 rounded-full border-2 border-neutral-900 bg-white px-4 py-2 shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] dark:border-white dark:bg-neutral-900 dark:shadow-[4px_4px_0px_0px_rgba(255,255,255,1)]"
                >
                    <x-heroicon-o-rectangle-stack class="h-4 w-4 text-neutral-900 dark:text-white" aria-hidden="true" />
                    <span class="text-sm font-bold text-neutral-900 dark:text-white">Collections</span>
                </div>

                <h1 class="text-4xl font-black tracking-tight text-neutral-900 sm:text-5xl lg:text-6xl dark:text-white">
                    Browse by
                    <span class="relative inline-block">
                        <span class="relative z-10">Collection</span>
                        <span
                            class="absolute right-0 -bottom-2 left-0 h-4 -rotate-1 bg-neutral-900/10 sm:h-5 dark:bg-white/20"
                        ></span>
                    </span>
                </h1>
                <p class="mx-auto mt-6 max-w-xl text-lg leading-relaxed text-neutral-600 dark:text-neutral-400">
                    Explore components organized by style and purpose.
                </p>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 transition-colors duration-200 sm:py-20 dark:bg-neutral-900">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($collections as $collection)
                    <a
                        href="{{ route('collections.show', $collection->slug) }}"
                        class="group relative overflow-hidden rounded-xl border-2 border-neutral-900 bg-white p-6 shadow-[6px_6px_0px_0px_rgba(0,0,0,1)] transition-all hover:translate-x-[4px] hover:translate-y-[4px] hover:shadow-none focus-visible:translate-x-[4px] focus-visible:translate-y-[4px] focus-visible:shadow-none dark:border-white dark:bg-neutral-900 dark:shadow-[6px_6px_0px_0px_rgba(255,255,255,1)]"
                    >
                        <div
                            class="mb-4 flex h-14 w-14 items-center justify-center rounded-xl border-2 border-neutral-900 bg-stone-50 dark:border-white dark:bg-neutral-950"
                        >
                            @if ($collection->icon)
                                <x-dynamic-component
                                    :component="$collection->icon"
                                    class="h-7 w-7 text-neutral-900 dark:text-white"
                                    aria-hidden="true"
                                />
                            @else
                                <x-heroicon-o-rectangle-stack
                                    class="h-7 w-7 text-neutral-900 dark:text-white"
                                    aria-hidden="true"
                                />
                            @endif
                        </div>

                        <h2 class="text-xl font-bold text-neutral-900 dark:text-white">
                            {{ $collection->title }}
                        </h2>

                        @if ($collection->description)
                            <p class="mt-2 line-clamp-2 text-sm text-neutral-600 dark:text-neutral-400">
                                {{ $collection->description }}
                            </p>
                        @endif

                        <div class="mt-4 flex items-center justify-between">
                            <span class="text-sm font-medium text-neutral-500 dark:text-neutral-400">
                                {{ $collection->categories->count() }}
                                {{ Str::plural('category', $collection->categories->count()) }}
                            </span>
                            <div class="flex items-center gap-1 text-sm font-bold text-neutral-900 dark:text-white">
                                <span>Explore</span>
                                <x-heroicon-o-arrow-right
                                    class="h-4 w-4 transition-transform group-hover:translate-x-1 group-focus-visible:translate-x-1"
                                    aria-hidden="true"
                                />
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
</x-layouts.app>

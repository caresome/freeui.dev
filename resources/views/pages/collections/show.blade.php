<x-layouts.docs :title="$collection->title">
    <section class="bg-stone-50 py-8 transition-colors duration-200 sm:py-12 dark:bg-neutral-950">
        <div class="px-6 lg:px-8">
            <x-breadcrumb :segments="[['label' => $collection->title]]" />

            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <div class="flex items-center gap-4">
                        @if ($collection->icon)
                            <div
                                class="flex h-14 w-14 shrink-0 items-center justify-center rounded-xl border-2 border-neutral-900 bg-white shadow-[3px_3px_0px_0px_rgba(0,0,0,1)] dark:border-white dark:bg-neutral-900 dark:shadow-[3px_3px_0px_0px_rgba(255,255,255,1)]"
                            >
                                <x-dynamic-component
                                    :component="$collection->icon"
                                    class="h-7 w-7 text-neutral-900 dark:text-white"
                                    aria-hidden="true"
                                />
                            </div>
                        @endif

                        <h1
                            class="text-3xl font-black tracking-tight text-neutral-900 sm:text-4xl lg:text-5xl dark:text-white"
                        >
                            {{ $collection->title }}
                        </h1>
                    </div>
                    @if ($collection->description)
                        <p class="mt-3 text-lg text-neutral-600 dark:text-neutral-400">
                            {{ $collection->description }}
                        </p>
                    @endif
                </div>
                <div
                    class="inline-flex items-center gap-2 rounded-full border-2 border-neutral-900 bg-white px-4 py-2 shadow-[3px_3px_0px_0px_rgba(0,0,0,1)] dark:border-white dark:bg-neutral-900 dark:shadow-[3px_3px_0px_0px_rgba(255,255,255,1)]"
                >
                    <span class="text-sm font-bold text-neutral-900 dark:text-white">
                        {{ $collection->categories->count() }}
                        {{ Str::plural('category', $collection->categories->count()) }}
                    </span>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-8 transition-colors duration-200 sm:py-12 dark:bg-neutral-900">
        <div class="px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($collection->categories as $category)
                    <a
                        href="{{ route('components.category', ['collection' => $collection->slug, 'category' => $category->slug]) }}"
                        class="group relative overflow-hidden rounded-xl border-2 border-neutral-900 bg-white p-6 shadow-[6px_6px_0px_0px_rgba(0,0,0,1)] transition-all hover:translate-x-[4px] hover:translate-y-[4px] hover:shadow-none focus-visible:translate-x-[4px] focus-visible:translate-y-[4px] focus-visible:shadow-none dark:border-white dark:bg-neutral-900 dark:shadow-[6px_6px_0px_0px_rgba(255,255,255,1)]"
                    >
                        <div
                            class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl border-2 border-neutral-900 bg-stone-50 dark:border-white dark:bg-neutral-950"
                        >
                            @if ($category->icon)
                                <x-dynamic-component
                                    :component="$category->icon"
                                    class="h-6 w-6 text-neutral-900 dark:text-white"
                                    aria-hidden="true"
                                />
                            @else
                                <x-heroicon-o-cube
                                    class="h-6 w-6 text-neutral-900 dark:text-white"
                                    aria-hidden="true"
                                />
                            @endif
                        </div>

                        <h2 class="text-lg font-bold text-neutral-900 dark:text-white">
                            {{ $category->title }}
                        </h2>

                        @if ($category->description)
                            <p class="mt-2 line-clamp-2 text-sm text-neutral-600 dark:text-neutral-400">
                                {{ $category->description }}
                            </p>
                        @endif

                        <div class="mt-4 flex items-center justify-between">
                            <span class="text-sm font-medium text-neutral-500 dark:text-neutral-400">
                                {{ $category->components_count }}
                                {{ Str::plural('component', $category->components_count) }}
                            </span>
                            <div class="flex items-center gap-1 text-sm font-bold text-neutral-900 dark:text-white">
                                <span>Browse</span>
                                <x-heroicon-o-arrow-right
                                    class="h-4 w-4 transition-transform group-hover:translate-x-1 group-focus-visible:translate-x-1"
                                    aria-hidden="true"
                                />
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            @if ($collection->categories->isEmpty())
                <div
                    class="rounded-xl border-2 border-dashed border-neutral-200 p-12 text-center dark:border-neutral-800"
                >
                    <div
                        class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-xl border-2 border-neutral-900 bg-stone-50 dark:border-white dark:bg-neutral-950"
                    >
                        <x-heroicon-o-folder-open
                            class="h-8 w-8 text-neutral-600 dark:text-neutral-400"
                            aria-hidden="true"
                        />
                    </div>
                    <h3 class="text-lg font-bold text-neutral-900 dark:text-white">
                        No categories in this collection yet
                    </h3>
                    <p class="mt-2 text-neutral-600 dark:text-neutral-400">Check back soon for new categories!</p>
                </div>
            @endif
        </div>
    </section>
</x-layouts.docs>

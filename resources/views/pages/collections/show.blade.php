<x-layouts.docs :title="$collection->title">
    <section class="bg-neutral-50 py-6 transition-colors duration-200 sm:py-8 dark:bg-neutral-950">
        <div class="px-6 lg:px-8">
            <x-breadcrumb :segments="[['label' => $collection->title]]" />

            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <div class="flex items-center gap-3">
                        @if ($collection->icon)
                            <div
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-neutral-100 text-neutral-600 dark:bg-neutral-800 dark:text-neutral-400"
                            >
                                <x-dynamic-component
                                    :component="$collection->icon"
                                    class="h-5 w-5"
                                    aria-hidden="true"
                                />
                            </div>
                        @endif

                        <h1 class="text-2xl font-semibold tracking-tight text-neutral-900 sm:text-3xl dark:text-white">
                            {{ $collection->title }}
                        </h1>
                    </div>
                    @if ($collection->description)
                        <p class="mt-2 text-neutral-600 dark:text-neutral-400">
                            {{ $collection->description }}
                        </p>
                    @endif
                </div>
                <div class="inline-flex items-center rounded-full bg-neutral-100 px-3 py-1 dark:bg-neutral-800">
                    <span class="text-sm font-medium text-neutral-600 dark:text-neutral-400">
                        {{ $collection->categories->count() }}
                        {{ Str::plural('category', $collection->categories->count()) }}
                    </span>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-6 transition-colors duration-200 sm:py-8 dark:bg-neutral-900">
        <div class="px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($collection->categories as $category)
                    <a
                        href="{{ route('components.category', ['collection' => $collection->slug, 'category' => $category->slug]) }}"
                        class="group rounded-xl border border-neutral-200 bg-white p-5 transition-all hover:border-neutral-300 hover:shadow-md dark:border-neutral-800 dark:bg-neutral-900 dark:hover:border-neutral-700"
                    >
                        <div
                            class="mb-3 flex h-10 w-10 items-center justify-center rounded-lg bg-neutral-100 text-neutral-600 dark:bg-neutral-800 dark:text-neutral-400"
                        >
                            @if ($category->icon)
                                <x-dynamic-component :component="$category->icon" class="h-5 w-5" aria-hidden="true" />
                            @else
                                <x-heroicon-o-cube class="h-5 w-5" aria-hidden="true" />
                            @endif
                        </div>

                        <h2 class="font-semibold text-neutral-900 dark:text-white">
                            {{ $category->title }}
                        </h2>

                        @if ($category->description)
                            <p class="mt-1 line-clamp-2 text-sm text-neutral-500 dark:text-neutral-400">
                                {{ $category->description }}
                            </p>
                        @endif

                        <div class="mt-3 flex items-center justify-between">
                            <span class="text-xs text-neutral-400 dark:text-neutral-500">
                                {{ $category->components_count }}
                                {{ Str::plural('component', $category->components_count) }}
                            </span>
                            <x-heroicon-o-arrow-right
                                class="h-4 w-4 text-neutral-400 transition-transform group-hover:translate-x-0.5 dark:text-neutral-500"
                                aria-hidden="true"
                            />
                        </div>
                    </a>
                @endforeach
            </div>

            @if ($collection->categories->isEmpty())
                <div
                    class="rounded-xl border border-dashed border-neutral-200 p-10 text-center dark:border-neutral-800"
                >
                    <div
                        class="mx-auto mb-3 flex h-12 w-12 items-center justify-center rounded-lg bg-neutral-100 dark:bg-neutral-800"
                    >
                        <x-heroicon-o-folder-open
                            class="h-6 w-6 text-neutral-400 dark:text-neutral-500"
                            aria-hidden="true"
                        />
                    </div>
                    <h3 class="font-medium text-neutral-900 dark:text-white">No categories in this collection yet</h3>
                    <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">
                        Check back soon for new categories!
                    </p>
                </div>
            @endif
        </div>
    </section>
</x-layouts.docs>

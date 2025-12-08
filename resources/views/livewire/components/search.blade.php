<div>
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <div class="mt-10">
                <form wire:submit.prevent="$refresh" class="relative mx-auto max-w-xl">
                    <button
                        type="submit"
                        class="absolute top-1/2 left-4 z-10 -translate-y-1/2 text-neutral-500 focus:outline-none dark:text-neutral-400"
                        aria-label="Search"
                        tabindex="-1"
                    >
                        <x-heroicon-o-magnifying-glass class="h-5 w-5" aria-hidden="true" />
                    </button>
                    <input
                        type="text"
                        wire:model="search"
                        placeholder="Search components (e.g. 'pricing', 'hero', 'navbar')..."
                        class="w-full rounded-xl border-2 border-neutral-900 bg-white py-4 pr-4 pl-12 text-base font-bold text-neutral-900 placeholder-neutral-500 shadow-[6px_6px_0px_0px_rgba(0,0,0,1)] transition-all outline-none placeholder:font-medium focus:translate-x-[2px] focus:translate-y-[2px] focus:shadow-none dark:border-white dark:bg-neutral-900 dark:text-white dark:shadow-[6px_6px_0px_0px_rgba(255,255,255,1)]"
                    />
                </form>

                <div class="mt-8 flex flex-wrap justify-center gap-3 pb-4">
                    @foreach ($allCategories as $category)
                        <button
                            wire:click="toggleCategory('{{ $category->slug }}')"
                            class="{{
                                in_array($category->slug, $selectedCategories)
                                    ? 'bg-neutral-900 text-white dark:bg-white dark:text-neutral-900'
                                    : 'bg-white text-neutral-900 dark:bg-neutral-900 dark:text-white'
                            }} rounded-xl border-2 border-neutral-900 px-4 py-2 text-sm font-bold shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-none focus-visible:translate-x-[2px] focus-visible:translate-y-[2px] focus-visible:shadow-none dark:border-white dark:shadow-[4px_4px_0px_0px_rgba(255,255,255,1)]"
                        >
                            {{ $category->title }}
                        </button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <section class="relative min-h-[400px] bg-white py-16 transition-colors duration-200 sm:py-20 dark:bg-neutral-900">
        <div
            wire:loading.flex
            class="absolute inset-0 z-20 flex items-start justify-center bg-white/80 pt-40 backdrop-blur-[2px] dark:bg-neutral-900/80"
        >
            <div
                class="flex items-center gap-3 rounded-xl border-2 border-neutral-900 bg-neutral-900 px-6 py-3 shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] dark:border-white dark:bg-white dark:shadow-[4px_4px_0px_0px_rgba(255,255,255,1)]"
            >
                <x-heroicon-o-arrow-path
                    class="h-6 w-6 animate-spin text-white dark:text-neutral-900"
                    aria-hidden="true"
                />
                <span class="font-bold text-white dark:text-neutral-900">Loading components...</span>
            </div>
        </div>

        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div wire:loading.class="opacity-20 blur-sm" class="transition-all duration-200">
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @php
                        function highlight($text, $search)
                        {
                            if (! $search) {
                                return $text;
                            }
                            return preg_replace(
                                '/(' . preg_quote($search, '/') . ')/i',
                                '<mark class="rounded-sm bg-neutral-900 px-0.5 text-white dark:bg-white dark:text-neutral-900">$1</mark>',
                                e($text),
                            );
                        }
                    @endphp

                    @foreach ($components as $component)
                        <a
                            href="{{ route('components.show', ['category' => $component->category, 'slug' => $component->slug]) }}"
                            class="group relative overflow-hidden rounded-xl border-2 border-neutral-900 bg-white shadow-[6px_6px_0px_0px_rgba(0,0,0,1)] transition-all hover:translate-x-[4px] hover:translate-y-[4px] hover:shadow-none focus-visible:translate-x-[4px] focus-visible:translate-y-[4px] focus-visible:shadow-none dark:border-white dark:bg-neutral-900 dark:shadow-[6px_6px_0px_0px_rgba(255,255,255,1)]"
                        >
                            <div class="relative aspect-[16/10] w-full overflow-hidden bg-stone-50 dark:bg-neutral-950">
                                <div class="flex h-full w-full items-center justify-center">
                                    <div
                                        class="flex h-16 w-16 items-center justify-center rounded-xl border-2 border-neutral-900 bg-white text-neutral-900 shadow-[3px_3px_0px_0px_rgba(0,0,0,1)] dark:border-white dark:bg-neutral-900 dark:text-white dark:shadow-[3px_3px_0px_0px_rgba(255,255,255,1)]"
                                    >
                                        <x-heroicon-o-cube class="h-8 w-8" aria-hidden="true" />
                                    </div>
                                </div>
                            </div>

                            <div class="p-5">
                                <div class="mb-3">
                                    <span
                                        class="inline-flex items-center rounded-xl border-2 border-neutral-900 bg-stone-50 px-2.5 py-1 text-xs font-bold text-neutral-900 dark:border-white dark:bg-neutral-950 dark:text-white"
                                    >
                                        {!! highlight($component->categoryModel ? $component->categoryModel->title : $component->category, $search) !!}
                                    </span>
                                </div>
                                <h3 class="text-lg font-bold text-neutral-900 dark:text-white">
                                    {!! highlight($component->title, $search) !!}
                                </h3>
                                <p class="mt-2 line-clamp-2 text-sm text-neutral-600 dark:text-neutral-400">
                                    {!! highlight($component->description, $search) !!}
                                </p>
                                <div
                                    class="mt-4 flex items-center gap-1 text-sm font-bold text-neutral-900 dark:text-white"
                                >
                                    <span>View component</span>
                                    <x-heroicon-o-arrow-right
                                        class="h-4 w-4 transition-transform group-hover:translate-x-1 group-focus-visible:translate-x-1"
                                        aria-hidden="true"
                                    />
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                @if ($components->isEmpty())
                    <div
                        class="rounded-xl border-2 border-neutral-900 bg-white p-12 text-center shadow-[6px_6px_0px_0px_rgba(0,0,0,1)] dark:border-white dark:bg-neutral-900 dark:shadow-[6px_6px_0px_0px_rgba(255,255,255,1)]"
                    >
                        <div
                            class="mx-auto mb-6 flex h-20 w-20 items-center justify-center rounded-full border-2 border-neutral-900 bg-stone-50 dark:border-white dark:bg-neutral-950"
                        >
                            <x-heroicon-o-magnifying-glass
                                class="h-10 w-10 text-neutral-900 dark:text-white"
                                aria-hidden="true"
                            />
                        </div>

                        @if ($search)
                            <h3 class="text-2xl font-black tracking-tight text-neutral-900 dark:text-white">
                                No results found
                            </h3>
                            <p class="mx-auto mt-4 max-w-md text-lg text-neutral-600 dark:text-neutral-400">
                                We couldn't find anything matching "
                                <span class="font-bold text-neutral-900 dark:text-white">{{ $search }}</span>
                                ".
                            </p>
                            <div class="mt-8 flex justify-center gap-4">
                                <button
                                    wire:click="$set('search', '')"
                                    class="items-center rounded-xl border-2 border-neutral-900 bg-white px-6 py-3 text-sm font-bold shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-none focus-visible:translate-x-[2px] focus-visible:translate-y-[2px] focus-visible:shadow-none dark:border-white dark:bg-neutral-900 dark:text-white dark:shadow-[4px_4px_0px_0px_rgba(255,255,255,1)]"
                                >
                                    Clear Search
                                </button>
                                <a
                                    href="{{ route('components.index') }}"
                                    class="flex items-center gap-2 rounded-xl border-2 border-neutral-900 bg-neutral-900 px-6 py-3 text-sm font-bold text-white shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-none focus-visible:translate-x-[2px] focus-visible:translate-y-[2px] focus-visible:shadow-none dark:border-white dark:bg-white dark:text-neutral-900 dark:shadow-[4px_4px_0px_0px_rgba(255,255,255,1)]"
                                >
                                    Browse All
                                </a>
                            </div>
                        @else
                            <h3 class="text-2xl font-black text-neutral-900 dark:text-white">Ready to explore?</h3>
                            <p class="mt-4 text-neutral-600 dark:text-neutral-400">
                                Search for components above to start building.
                            </p>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </section>
</div>

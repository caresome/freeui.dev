<x-layouts.app>
    <!-- Hero Section -->
    <section class="bg-neutral-50 py-16 transition-colors duration-200 sm:py-24 dark:bg-neutral-950">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">
                <!-- Badge -->
                <div
                    class="mb-6 inline-flex items-center gap-2 rounded-full border border-neutral-200 bg-white px-3 py-1.5 dark:border-neutral-800 dark:bg-neutral-900"
                >
                    <span class="relative flex h-2 w-2">
                        <span
                            class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-500 opacity-75"
                        ></span>
                        <span class="relative inline-flex h-2 w-2 rounded-full bg-emerald-500"></span>
                    </span>
                    <span class="text-sm font-medium text-neutral-600 dark:text-neutral-400">
                        New components weekly
                    </span>
                </div>

                <!-- Headline -->
                <h1 class="text-4xl font-bold tracking-tight text-neutral-900 sm:text-5xl lg:text-6xl dark:text-white">
                    Beautiful UI Components
                    <br />
                    <span class="text-neutral-500 dark:text-neutral-400">Made Simple</span>
                </h1>

                <!-- Description -->
                <p class="mx-auto mt-6 max-w-xl text-lg leading-relaxed text-neutral-600 dark:text-neutral-400">
                    Free, open-source Tailwind CSS and Alpine.js components. Copy, paste, and build amazing projects
                    faster than ever.
                </p>

                <!-- CTAs -->
                <div class="mt-8 flex flex-col items-center justify-center gap-3 sm:flex-row">
                    <a
                        href="#components"
                        class="inline-flex items-center gap-2 rounded-lg bg-neutral-900 px-5 py-2.5 text-sm font-medium text-white transition-colors hover:bg-neutral-800 dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100"
                    >
                        Browse Components
                        <x-heroicon-o-arrow-down class="h-4 w-4" aria-hidden="true" />
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Collections & Categories Section -->
    <section
        id="components"
        aria-labelledby="components-heading"
        class="bg-white py-16 transition-colors duration-200 sm:py-24 dark:bg-neutral-900"
    >
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            @foreach ($collections as $collection)
                <div
                    class="@if (!$loop->first) mt-12 border-t border-neutral-200 pt-12 dark:border-neutral-800 @endif"
                >
                    <!-- Collection Header -->
                    <div class="mb-6 flex items-center gap-3">
                        @if ($collection->icon)
                            <div
                                class="inline-flex h-10 w-10 items-center justify-center rounded-lg bg-neutral-100 text-neutral-600 dark:bg-neutral-800 dark:text-neutral-400"
                            >
                                @svg($collection->icon, ['class' => 'h-5 w-5', 'aria-hidden' => 'true'])
                            </div>
                        @endif

                        <div>
                            <h2
                                @if ($loop->first) id="components-heading" @endif
                                class="text-xl font-semibold text-neutral-900 sm:text-2xl dark:text-white"
                            >
                                {{ $collection->title }}
                            </h2>
                            @if ($collection->description)
                                <p class="mt-0.5 text-sm text-neutral-500 dark:text-neutral-400">
                                    {{ $collection->description }}
                                </p>
                            @endif
                        </div>
                    </div>

                    <!-- Category Grid -->
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach ($collection->categories as $category)
                            <a
                                href="{{ route('components.category', ['collection' => $collection->slug, 'category' => $category->slug]) }}"
                                class="group rounded-xl border border-neutral-200 bg-white p-5 transition-all hover:border-neutral-300 hover:shadow-md dark:border-neutral-800 dark:bg-neutral-900 dark:hover:border-neutral-700"
                            >
                                <!-- Icon -->
                                <div
                                    class="mb-3 inline-flex h-10 w-10 items-center justify-center rounded-lg bg-neutral-100 text-neutral-600 dark:bg-neutral-800 dark:text-neutral-400"
                                >
                                    @if ($category->icon)
                                        @svg($category->icon, ['class' => 'h-5 w-5', 'aria-hidden' => 'true'])
                                    @else
                                        <x-heroicon-o-cube class="h-5 w-5" aria-hidden="true" />
                                    @endif
                                </div>

                                <!-- Content -->
                                <h3 class="font-semibold text-neutral-900 dark:text-white">
                                    {{ $category->title }}
                                </h3>
                                <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">
                                    {{ $category->description ?? 'Explore ' . strtolower($category->title) . ' components' }}
                                </p>

                                <!-- Footer -->
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
                </div>
            @endforeach
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-white py-12 transition-colors duration-200 dark:bg-neutral-900">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl rounded-2xl bg-neutral-900 p-8 text-center sm:p-10 dark:bg-white">
                <h2 class="text-xl font-semibold text-white sm:text-2xl dark:text-neutral-900">
                    Ready to build something awesome?
                </h2>
                <p class="mt-2 text-neutral-400 dark:text-neutral-600">
                    Start using our free components today. No sign up required.
                </p>
                <div class="mt-6">
                    <a
                        href="#components"
                        class="inline-flex items-center gap-2 rounded-lg bg-white px-5 py-2.5 text-sm font-medium text-neutral-900 transition-colors hover:bg-neutral-100 dark:bg-neutral-900 dark:text-white dark:hover:bg-neutral-800"
                    >
                        Get Started Free
                        <x-heroicon-o-arrow-right class="h-4 w-4" aria-hidden="true" />
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>

<x-layouts.app title="Components">
    <!-- Hero Section -->
    <section class="bg-neo-bg dark:bg-neo-bg-dark py-16 transition-colors duration-200 sm:py-20">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <!-- Badge -->
                <div
                    class="border-neo-black bg-neo-surface dark:border-neo-text-dark dark:bg-neo-surface-dark mb-6 inline-flex items-center gap-2 rounded-full border-2 px-4 py-2 shadow-[4px_4px_0px_0px_rgba(12,12,12,1)] dark:shadow-[4px_4px_0px_0px_rgba(250,250,250,1)]"
                >
                    <x-heroicon-o-cube class="text-neo-text dark:text-neo-text-dark h-4 w-4" />
                    <span class="text-neo-text dark:text-neo-text-dark text-sm font-bold">All Components</span>
                </div>

                <h1
                    class="text-neo-text dark:text-neo-text-dark text-4xl font-black tracking-tight sm:text-5xl lg:text-6xl"
                >
                    Browse
                    <span class="relative inline-block">
                        <span class="relative z-10">Components</span>
                        <span
                            class="bg-neo-black/10 dark:bg-neo-text-dark/20 absolute right-0 -bottom-2 left-0 h-4 -rotate-1 sm:h-5"
                        ></span>
                    </span>
                </h1>
                <p
                    class="text-neo-text-muted dark:text-neo-text-muted-dark mx-auto mt-6 max-w-xl text-lg leading-relaxed"
                >
                    Explore our collection of fully responsive, professionally designed UI components.
                </p>
            </div>
        </div>
    </section>

    <!-- Components Grid -->
    <section class="bg-neo-surface dark:bg-neo-surface-dark py-16 transition-colors duration-200 sm:py-20">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($components as $component)
                    <a
                        href="{{ route('components.show', ['category' => $component->category, 'slug' => $component->slug]) }}"
                        class="border-neo-black bg-neo-surface dark:border-neo-text-dark dark:bg-neo-surface-dark group relative overflow-hidden rounded-xl border-2 shadow-[6px_6px_0px_0px_rgba(12,12,12,1)] transition-all hover:translate-x-[4px] hover:translate-y-[4px] hover:shadow-none dark:shadow-[6px_6px_0px_0px_rgba(250,250,250,1)]"
                    >
                        <!-- Preview Area -->
                        <div class="bg-neo-bg dark:bg-neo-bg-dark relative aspect-[16/10] w-full overflow-hidden">
                            <div class="flex h-full w-full items-center justify-center">
                                <div
                                    class="border-neo-black bg-neo-surface text-neo-text dark:border-neo-text-dark dark:bg-neo-surface-dark dark:text-neo-text-dark flex h-16 w-16 items-center justify-center rounded-xl border-2 shadow-[3px_3px_0px_0px_rgba(12,12,12,1)] dark:shadow-[3px_3px_0px_0px_rgba(250,250,250,1)]"
                                >
                                    <x-heroicon-o-cube class="h-8 w-8" />
                                </div>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-5">
                            <div class="mb-3">
                                <span
                                    class="border-neo-black bg-neo-bg text-neo-text dark:border-neo-text-dark dark:bg-neo-bg-dark dark:text-neo-text-dark inline-flex items-center rounded-xl border-2 px-2.5 py-1 text-xs font-bold"
                                >
                                    {{ $component->category ?? 'Component' }}
                                </span>
                            </div>
                            <h3 class="text-neo-text dark:text-neo-text-dark text-lg font-bold">
                                {{ $component->title }}
                            </h3>
                            <p class="text-neo-text-muted dark:text-neo-text-muted-dark mt-2 line-clamp-2 text-sm">
                                {{ $component->description }}
                            </p>
                            <div
                                class="text-neo-text dark:text-neo-text-dark mt-4 flex items-center gap-1 text-sm font-bold"
                            >
                                <span>View component</span>
                                <x-heroicon-o-arrow-right
                                    class="h-4 w-4 transition-transform group-hover:translate-x-1"
                                />
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            @if ($components->isEmpty())
                <div
                    class="border-neo-border-light dark:border-neo-border rounded-xl border-2 border-dashed p-12 text-center"
                >
                    <div
                        class="border-neo-black bg-neo-bg dark:border-neo-text-dark dark:bg-neo-bg-dark mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-xl border-2"
                    >
                        <x-heroicon-o-cube class="text-neo-text-muted dark:text-neo-text-muted-dark h-8 w-8" />
                    </div>
                    <h3 class="text-neo-text dark:text-neo-text-dark text-lg font-bold">No components yet</h3>
                    <p class="text-neo-text-muted dark:text-neo-text-muted-dark mt-2">
                        Check back soon for new components!
                    </p>
                </div>
            @endif
        </div>
    </section>
</x-layouts.app>

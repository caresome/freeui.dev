<x-layouts.app title="Components">
    <!-- Hero Section -->
    <section class="bg-stone-50 py-16 transition-colors duration-200 sm:py-20 dark:bg-neutral-950">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <!-- Badge -->
                <div
                    class="mb-6 inline-flex items-center gap-2 rounded-full border-2 border-neutral-900 bg-white px-4 py-2 shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] dark:border-white dark:bg-neutral-900 dark:shadow-[4px_4px_0px_0px_rgba(255,255,255,1)]"
                >
                    <x-heroicon-o-cube class="h-4 w-4 text-neutral-900 dark:text-white" />
                    <span class="text-sm font-bold text-neutral-900 dark:text-white">All Components</span>
                </div>

                <h1 class="text-4xl font-black tracking-tight text-neutral-900 sm:text-5xl lg:text-6xl dark:text-white">
                    Browse
                    <span class="relative inline-block">
                        <span class="relative z-10">Components</span>
                        <span
                            class="absolute right-0 -bottom-2 left-0 h-4 -rotate-1 bg-neutral-900/10 sm:h-5 dark:bg-white/20"
                        ></span>
                    </span>
                </h1>
                <p class="mx-auto mt-6 max-w-xl text-lg leading-relaxed text-neutral-600 dark:text-neutral-400">
                    Explore our collection of fully responsive, professionally designed UI components.
                </p>
            </div>
        </div>
    </section>

    <livewire:components.search />
</x-layouts.app>

<x-layouts.app>
    <!-- Hero Section -->
    <section class="bg-neo-bg dark:bg-neo-bg-dark py-20 transition-colors duration-200 sm:py-28">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">
                <!-- Badge -->
                <div
                    class="border-neo-black bg-neo-surface dark:border-neo-text-dark dark:bg-neo-surface-dark mb-8 inline-flex items-center gap-2 rounded-full border-2 px-4 py-2 shadow-[4px_4px_0px_0px_rgba(12,12,12,1)] dark:shadow-[4px_4px_0px_0px_rgba(250,250,250,1)]"
                >
                    <span class="relative flex h-2 w-2">
                        <span
                            class="bg-neo-black dark:bg-neo-text-dark absolute inline-flex h-full w-full animate-ping rounded-full opacity-75"
                        ></span>
                        <span
                            class="bg-neo-black dark:bg-neo-text-dark relative inline-flex h-2 w-2 rounded-full"
                        ></span>
                    </span>
                    <span class="text-neo-text dark:text-neo-text-dark text-sm font-bold">New components weekly</span>
                </div>

                <!-- Headline -->
                <h1
                    class="text-neo-text dark:text-neo-text-dark text-4xl font-black tracking-tight sm:text-6xl lg:text-7xl"
                >
                    Beautiful UI
                    <span class="relative inline-block">
                        <span class="relative z-10">Components</span>
                        <span
                            class="bg-neo-black/10 dark:bg-neo-text-dark/20 absolute right-0 -bottom-2 left-0 h-4 -rotate-1 sm:h-5"
                        ></span>
                    </span>
                    <br />
                    Made Simple
                </h1>

                <!-- Description -->
                <p
                    class="text-neo-text-muted dark:text-neo-text-muted-dark mx-auto mt-8 max-w-xl text-lg leading-relaxed"
                >
                    Free, open-source Tailwind CSS components. Copy, paste, and build amazing projects faster than ever.
                </p>

                <!-- CTAs -->
                <div class="mt-10 flex flex-col items-center justify-center gap-4 sm:flex-row">
                    <a
                        href="#components"
                        class="border-neo-black bg-neo-black dark:border-neo-text-dark dark:bg-neo-text-dark dark:text-neo-black inline-flex items-center gap-2 rounded-xl border-2 px-6 py-3 text-sm font-bold text-white shadow-[4px_4px_0px_0px_rgba(12,12,12,0.2)] transition-all hover:translate-x-[3px] hover:translate-y-[3px] hover:shadow-none dark:shadow-[4px_4px_0px_0px_rgba(250,250,250,0.2)]"
                    >
                        Browse Components
                        <x-heroicon-o-arrow-down class="h-4 w-4" />
                    </a>
                    <a
                        href="https://github.com/ankitthapa/freeui"
                        target="_blank"
                        class="border-neo-black bg-neo-surface text-neo-text dark:border-neo-text-dark dark:bg-neo-surface-dark dark:text-neo-text-dark inline-flex items-center gap-2 rounded-xl border-2 px-6 py-3 text-sm font-bold shadow-[4px_4px_0px_0px_rgba(12,12,12,1)] transition-all hover:translate-x-[3px] hover:translate-y-[3px] hover:shadow-none dark:shadow-[4px_4px_0px_0px_rgba(250,250,250,1)]"
                    >
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                fill-rule="evenodd"
                                d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                clip-rule="evenodd"
                            />
                        </svg>
                        Star on GitHub
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section
        id="components"
        class="bg-neo-surface dark:bg-neo-surface-dark py-20 transition-colors duration-200 sm:py-28"
    >
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <!-- Section Header -->
            <div class="mb-12 flex items-end justify-between">
                <div>
                    <h2 class="text-neo-text dark:text-neo-text-dark text-3xl font-black sm:text-4xl">Categories</h2>
                    <p class="text-neo-text-muted dark:text-neo-text-muted-dark mt-2">Pick a category to explore</p>
                </div>
                <a
                    href="{{ route('components.index') }}"
                    class="text-neo-text hover:text-neo-text-muted dark:text-neo-text-dark dark:hover:text-neo-text-muted-dark hidden items-center gap-1 text-sm font-bold transition-colors sm:flex"
                >
                    View all
                    <x-heroicon-o-arrow-right class="h-4 w-4" />
                </a>
            </div>

            <!-- Category Grid -->
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($categories as $category)
                    <a
                        href="{{ route('components.category', $category->slug) }}"
                        class="border-neo-black bg-neo-bg dark:border-neo-text-dark dark:bg-neo-bg-dark group relative overflow-hidden rounded-xl border-2 p-6 shadow-[6px_6px_0px_0px_rgba(12,12,12,1)] transition-all hover:translate-x-[4px] hover:translate-y-[4px] hover:shadow-none dark:shadow-[6px_6px_0px_0px_rgba(250,250,250,1)]"
                    >
                        <!-- Icon -->
                        <div
                            class="border-neo-black bg-neo-surface text-neo-text dark:border-neo-text-dark dark:bg-neo-surface-dark dark:text-neo-text-dark mb-4 inline-flex h-12 w-12 items-center justify-center rounded-xl border-2"
                        >
                            @if ($category->icon)
                                @svg($category->icon, 'h-6 w-6')
                            @else
                                <x-heroicon-o-cube class="h-6 w-6" />
                            @endif
                        </div>

                        <!-- Content -->
                        <h3 class="text-neo-text dark:text-neo-text-dark text-xl font-bold">{{ $category->title }}</h3>
                        <p class="text-neo-text-muted dark:text-neo-text-muted-dark mt-1 text-sm">
                            {{ $category->description ?? 'Explore ' . strtolower($category->title) . ' components' }}
                        </p>

                        <!-- Arrow -->
                        <div
                            class="text-neo-text dark:text-neo-text-dark mt-4 flex items-center gap-1 text-sm font-bold"
                        >
                            <span>View components</span>
                            <x-heroicon-o-arrow-right class="h-4 w-4 transition-transform group-hover:translate-x-1" />
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- Mobile view all -->
            <div class="mt-8 text-center sm:hidden">
                <a
                    href="{{ route('components.index') }}"
                    class="text-neo-text dark:text-neo-text-dark inline-flex items-center gap-1 text-sm font-bold"
                >
                    View all components
                    <x-heroicon-o-arrow-right class="h-4 w-4" />
                </a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-neo-surface dark:bg-neo-surface-dark py-16 transition-colors duration-200">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div
                class="border-neo-black bg-neo-black dark:border-neo-text-dark dark:bg-neo-text-dark mx-auto max-w-2xl rounded-xl border-2 p-8 text-center shadow-[8px_8px_0px_0px_rgba(12,12,12,0.2)] sm:p-12 dark:shadow-[8px_8px_0px_0px_rgba(250,250,250,0.2)]"
            >
                <h2 class="dark:text-neo-black text-2xl font-black text-white sm:text-3xl">
                    Ready to build something awesome?
                </h2>
                <p class="dark:text-neo-black/70 mt-4 text-white/70">
                    Start using our free components today. No sign up required.
                </p>
                <div class="mt-8">
                    <a
                        href="#components"
                        class="text-neo-black dark:border-neo-black dark:bg-neo-black dark:text-neo-text-dark inline-flex items-center gap-2 rounded-xl border-2 border-white bg-white px-8 py-3 text-sm font-bold shadow-[4px_4px_0px_0px_rgba(255,255,255,0.3)] transition-all hover:translate-x-[3px] hover:translate-y-[3px] hover:shadow-none dark:shadow-[4px_4px_0px_0px_rgba(12,12,12,0.3)]"
                    >
                        Get Started Free
                        <x-heroicon-o-arrow-right class="h-4 w-4" />
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>

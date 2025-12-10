<x-layouts.app title="Page Not Found" description="The page you're looking for doesn't exist.">
    <section
        class="flex min-h-[calc(100vh-8rem)] items-center bg-stone-50 py-20 transition-colors duration-200 dark:bg-neutral-950">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <!-- Big 404 Number -->
                <div class="relative mb-8">
                    <span
                        class="text-[10rem] leading-none font-black text-neutral-900/10 sm:text-[14rem] dark:text-white/10">
                        404
                    </span>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div
                            class="rounded-xl border-2 border-neutral-900 bg-white p-4 shadow-[6px_6px_0px_0px_rgba(0,0,0,1)] dark:border-white dark:bg-neutral-900 dark:shadow-[6px_6px_0px_0px_rgba(255,255,255,1)]">
                            <x-heroicon-o-face-frown
                                class="h-12 w-12 text-neutral-900 dark:text-white"
                                aria-hidden="true" />
                        </div>
                    </div>
                </div>

                <!-- Headline -->
                <h1 class="text-3xl font-black tracking-tight text-neutral-900 sm:text-5xl dark:text-white">
                    Page Not Found
                </h1>

                <!-- Description -->
                <p class="mx-auto mt-6 max-w-md text-lg leading-relaxed text-neutral-600 dark:text-neutral-400">
                    Oops! The page you're looking for doesn't exist or has been moved. Let's get you back on track.
                </p>

                <!-- CTAs -->
                <div class="mt-10 flex flex-col items-center justify-center gap-4 sm:flex-row">
                    <a
                        href="{{ route('home') }}"
                        class="inline-flex items-center gap-2 rounded-xl border-2 border-neutral-900 bg-neutral-900 px-6 py-3 text-sm font-bold text-white shadow-[4px_4px_0px_0px_rgba(0,0,0,0.2)] transition-all hover:translate-x-[3px] hover:translate-y-[3px] hover:shadow-none focus-visible:translate-x-[3px] focus-visible:translate-y-[3px] focus-visible:shadow-none dark:border-white dark:bg-white dark:text-neutral-900 dark:shadow-[4px_4px_0px_0px_rgba(255,255,255,0.2)]">
                        <x-heroicon-o-home class="h-4 w-4" aria-hidden="true" />
                        Back to Home
                    </a>
                    <a
                        href="{{ route('home') }}#components"
                        class="inline-flex items-center gap-2 rounded-xl border-2 border-neutral-900 bg-white px-6 py-3 text-sm font-bold text-neutral-900 shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all hover:translate-x-[3px] hover:translate-y-[3px] hover:shadow-none focus-visible:translate-x-[3px] focus-visible:translate-y-[3px] focus-visible:shadow-none dark:border-white dark:bg-neutral-900 dark:text-white dark:shadow-[4px_4px_0px_0px_rgba(255,255,255,1)]">
                        Browse Components
                        <x-heroicon-o-arrow-right class="h-4 w-4" aria-hidden="true" />
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>

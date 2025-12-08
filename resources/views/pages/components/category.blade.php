<x-layouts.app :title="$category . ' Components'">
    <!-- Header Section -->
    <section class="bg-neo-bg dark:bg-neo-bg-dark py-12 transition-colors duration-200 sm:py-16">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <!-- Breadcrumb -->
            <a
                href="{{ route('components.index') }}"
                class="border-neo-black bg-neo-surface text-neo-text dark:border-neo-text-dark dark:bg-neo-surface-dark dark:text-neo-text-dark group mb-6 inline-flex items-center gap-2 rounded-xl border-2 px-4 py-2 text-sm font-bold shadow-[3px_3px_0px_0px_rgba(12,12,12,1)] transition-all hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-none dark:shadow-[3px_3px_0px_0px_rgba(250,250,250,1)]"
            >
                <x-heroicon-o-arrow-left class="h-4 w-4 transition-transform group-hover:-translate-x-1" />
                All Components
            </a>

            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <h1
                        class="text-neo-text dark:text-neo-text-dark text-3xl font-black tracking-tight sm:text-4xl lg:text-5xl"
                    >
                        {{ $category }}
                    </h1>
                    <p class="text-neo-text-muted dark:text-neo-text-muted-dark mt-2 text-lg">
                        Browse our collection of {{ strtolower($category) }} components.
                    </p>
                </div>
                <div
                    class="border-neo-black bg-neo-surface dark:border-neo-text-dark dark:bg-neo-surface-dark inline-flex items-center gap-2 rounded-full border-2 px-4 py-2 shadow-[3px_3px_0px_0px_rgba(12,12,12,1)] dark:shadow-[3px_3px_0px_0px_rgba(250,250,250,1)]"
                >
                    <span class="text-neo-text dark:text-neo-text-dark text-sm font-bold">
                        {{ count($components) }} {{ Str::plural('component', count($components)) }}
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- Components List -->
    <section class="bg-neo-surface dark:bg-neo-surface-dark py-12 transition-colors duration-200 sm:py-16">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="space-y-12">
                @foreach ($components as $uiComponent)
                    <div class="scroll-mt-20" id="{{ $uiComponent->slug }}">
                        <!-- Component Header -->
                        <div class="mb-4 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                            <a
                                href="{{ route('components.show', ['category' => $uiComponent->category, 'slug' => $uiComponent->slug]) }}"
                                class="text-neo-text hover:text-neo-text-muted dark:text-neo-text-dark dark:hover:text-neo-text-muted-dark group flex items-center gap-2 text-xl font-bold transition-colors"
                            >
                                {{ $uiComponent->title }}
                                <x-heroicon-o-arrow-right
                                    class="h-5 w-5 opacity-0 transition-all group-hover:translate-x-1 group-hover:opacity-100"
                                />
                            </a>
                        </div>

                        <!-- Component Preview -->
                        <div class="mt-4">
                            <x-code-preview
                                :content="$uiComponent->content"
                                :title="$uiComponent->title"
                                :slug="$uiComponent->slug"
                                :category="$uiComponent->category"
                                :username="$uiComponent->github"
                                :author-avatar="$uiComponent->avatar_url"
                                :author-url="$uiComponent->github_url"
                            />
                        </div>
                    </div>
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
                    <h3 class="text-neo-text dark:text-neo-text-dark text-lg font-bold">
                        No components in this category yet
                    </h3>
                    <p class="text-neo-text-muted dark:text-neo-text-muted-dark mt-2">
                        Check back soon for new components!
                    </p>
                </div>
            @endif
        </div>
    </section>
</x-layouts.app>

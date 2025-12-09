<x-layouts.app :title="$category->title . ' Components'">
    <section class="bg-stone-50 py-12 transition-colors duration-200 sm:py-16 dark:bg-neutral-950">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <x-breadcrumb
                :segments="[
                    ['label' => $collection->title, 'url' => route('collections.show', $collection->slug)],
                    ['label' => $category->title],
                ]"
            />

            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <h1
                        class="text-3xl font-black tracking-tight text-neutral-900 sm:text-4xl lg:text-5xl dark:text-white"
                    >
                        {{ $category->title }}
                    </h1>
                    <p class="mt-2 text-lg text-neutral-600 dark:text-neutral-400">
                        {{ $category->description ?? 'Browse our collection of ' . strtolower($category->title) . ' components.' }}
                    </p>
                </div>
                <div
                    class="inline-flex items-center gap-2 rounded-full border-2 border-neutral-900 bg-white px-4 py-2 shadow-[3px_3px_0px_0px_rgba(0,0,0,1)] dark:border-white dark:bg-neutral-900 dark:shadow-[3px_3px_0px_0px_rgba(255,255,255,1)]"
                >
                    <span class="text-sm font-bold text-neutral-900 dark:text-white">
                        {{ count($components) }} {{ Str::plural('component', count($components)) }}
                    </span>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-12 transition-colors duration-200 sm:py-16 dark:bg-neutral-900">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="space-y-12">
                @foreach ($components as $uiComponent)
                    <div class="scroll-mt-20" id="{{ $uiComponent->slug }}">
                        <div class="mb-4 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                            <a
                                href="{{ route('components.show', ['collection' => $collection->slug, 'category' => $uiComponent->category, 'slug' => $uiComponent->slug]) }}"
                                class="group flex items-center gap-2 text-xl font-bold text-neutral-900 transition-colors hover:text-neutral-600 focus-visible:text-neutral-600 dark:text-white dark:hover:text-neutral-400 dark:focus-visible:text-neutral-400"
                            >
                                {{ $uiComponent->title }}
                                <x-heroicon-o-arrow-right
                                    class="h-5 w-5 opacity-0 transition-all group-hover:translate-x-1 group-hover:opacity-100 group-focus-visible:translate-x-1 group-focus-visible:opacity-100"
                                    aria-hidden="true"
                                />
                            </a>
                        </div>

                        <div class="mt-4">
                            <x-code-preview
                                :content="$uiComponent->content"
                                :title="$uiComponent->title"
                                :slug="$uiComponent->slug"
                                :collection="$collection->slug"
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
                    class="rounded-xl border-2 border-dashed border-neutral-200 p-12 text-center dark:border-neutral-800"
                >
                    <div
                        class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-xl border-2 border-neutral-900 bg-stone-50 dark:border-white dark:bg-neutral-950"
                    >
                        <x-heroicon-o-cube class="h-8 w-8 text-neutral-600 dark:text-neutral-400" aria-hidden="true" />
                    </div>
                    <h3 class="text-lg font-bold text-neutral-900 dark:text-white">
                        No components in this category yet
                    </h3>
                    <p class="mt-2 text-neutral-600 dark:text-neutral-400">Check back soon for new components!</p>
                </div>
            @endif
        </div>
    </section>
</x-layouts.app>

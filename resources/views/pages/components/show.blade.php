<x-layouts.app :title="$uiComponent->title ?? 'Component'" description="A free UI component for your next project.">
    <section class="bg-stone-50 py-12 transition-colors duration-200 dark:bg-neutral-950">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <!-- Breadcrumb -->
            <x-breadcrumb
                :segments="[
                    [
                        'label' => $uiComponent->categoryModel->collectionModel->title,
                        'url' => route('collections.show', $uiComponent->categoryModel->collection),
                    ],
                    [
                        'label' => $uiComponent->categoryModel->title,
                        'url' => route('components.category', ['collection' => $uiComponent->categoryModel->collection, 'category' => $uiComponent->category]),
                    ],
                    ['label' => $uiComponent->title],
                ]"
            />

            <!-- Header -->
            <div class="mb-8">
                <div class="flex flex-wrap items-center gap-3">
                    <h1 class="text-3xl font-black tracking-tight text-neutral-900 sm:text-4xl dark:text-white">
                        {{ $uiComponent->title }}
                    </h1>
                    @if ($uiComponent->dependencies)
                        <div class="flex flex-wrap gap-2">
                            @foreach ($uiComponent->dependencies as $dependency)
                                @php
                                    $parts = explode(' ', $dependency, 2);
                                    $label = count($parts) === 2 ? $parts[0] : basename(parse_url($dependency, PHP_URL_PATH));
                                @endphp

                                <span
                                    class="inline-flex items-center rounded-lg border-2 border-neutral-900 bg-white px-2.5 py-1 text-xs font-bold text-neutral-900 shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] dark:border-white dark:bg-neutral-800 dark:text-white dark:shadow-[2px_2px_0px_0px_rgba(255,255,255,1)]"
                                >
                                    {{ $label }}
                                </span>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <!-- Preview/Code Area -->
            <x-code-preview
                :content="$uiComponent->content"
                :title="$uiComponent->title"
                :slug="$uiComponent->slug"
                :collection="$uiComponent->categoryModel->collection"
                :category="$uiComponent->category"
                :username="$uiComponent->github"
                :author-avatar="$uiComponent->avatar_url"
                :author-url="$uiComponent->github_url"
                :dependencies="$uiComponent->dependencies"
                :tailwind-cdn="config('freeui.tailwind_cdn')"
                :alpine-cdn="config('freeui.alpine_cdn')"
            />
        </div>
    </section>
</x-layouts.app>

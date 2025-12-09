<x-layouts.app
    :title="$uiComponent->title ?? 'Component'"
    description="A free UI component for your next project."
    :og-image="$uiComponent->og_image_url"
>
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
                <h1 class="text-3xl font-black tracking-tight text-neutral-900 sm:text-4xl dark:text-white">
                    {{ $uiComponent->title }}
                </h1>
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
            />
        </div>
    </section>
</x-layouts.app>

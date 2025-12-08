<x-layouts.app :title="$uiComponent->title ?? 'Component'">
    <section class="bg-stone-50 py-12 transition-colors duration-200 dark:bg-neutral-950">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <!-- Breadcrumb -->
            <x-breadcrumb
                :segments="[
                    ['label' => 'Components', 'url' => route('components.index')],
                    [
                        'label' => $uiComponent->categoryModel->title,
                        'url' => route('components.category', $uiComponent->category),
                    ],
                    ['label' => $uiComponent->title],
                ]"
            />

            <!-- Header -->
            <div class="mb-8">
                <div class="flex flex-wrap items-start justify-between gap-4">
                    <div>
                        <h1 class="text-3xl font-black tracking-tight text-neutral-900 sm:text-4xl dark:text-white">
                            {{ $uiComponent->title }}
                        </h1>
                        <p class="mt-3 text-lg text-neutral-600 dark:text-neutral-400">
                            {{ $uiComponent->description }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Preview/Code Area -->
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
    </section>
</x-layouts.app>

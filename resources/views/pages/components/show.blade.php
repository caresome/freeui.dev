<x-layouts.app :title="$uiComponent->title ?? 'Component'">
    <section class="bg-neo-bg dark:bg-neo-bg-dark py-12 transition-colors duration-200">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <!-- Breadcrumb -->
            <a
                href="{{ route('components.index') }}"
                class="border-neo-black bg-neo-surface text-neo-text dark:border-neo-text-dark dark:bg-neo-surface-dark dark:text-neo-text-dark group mb-8 inline-flex items-center gap-2 rounded-xl border-2 px-4 py-2 text-sm font-bold shadow-[3px_3px_0px_0px_rgba(12,12,12,1)] transition-all hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-none dark:shadow-[3px_3px_0px_0px_rgba(250,250,250,1)]"
            >
                <x-heroicon-o-arrow-left class="h-4 w-4 transition-transform group-hover:-translate-x-1" />
                Back to Components
            </a>

            <!-- Header -->
            <div class="mb-8">
                <div class="flex flex-wrap items-start justify-between gap-4">
                    <div>
                        <h1
                            class="text-neo-text dark:text-neo-text-dark text-3xl font-black tracking-tight sm:text-4xl"
                        >
                            {{ $uiComponent->title }}
                        </h1>
                        <p class="text-neo-text-muted dark:text-neo-text-muted-dark mt-3 text-lg">
                            {{ $uiComponent->description }}
                        </p>
                    </div>
                    @if ($uiComponent->categoryModel)
                        <span
                            class="border-neo-black bg-neo-surface text-neo-text dark:border-neo-text-dark dark:bg-neo-surface-dark dark:text-neo-text-dark inline-flex items-center rounded-xl border-2 px-4 py-2 text-sm font-bold shadow-[3px_3px_0px_0px_rgba(12,12,12,1)] dark:shadow-[3px_3px_0px_0px_rgba(250,250,250,1)]"
                        >
                            {{ $uiComponent->categoryModel->title }}
                        </span>
                    @endif
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

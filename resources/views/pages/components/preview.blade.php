<x-layouts.preview
    :title="$uiComponent->title . ' - Preview'"
    description="A free UI component for your next project."
    :component-content="$uiComponent->content"
    :component-title="$uiComponent->title"
    :collection="$uiComponent->categoryModel->collection"
    :category="$uiComponent->category"
    :slug="$uiComponent->slug"
>
    @if ($uiComponent->github && $uiComponent->github !== 'caresome')
        @php
            $avatar = $uiComponent->avatar_url ?? "https://github.com/{$uiComponent->github}.png";
            $profile = $uiComponent->github_url ?? "https://github.com/{$uiComponent->github}";
        @endphp

        <div class="fixed right-8 bottom-6 z-50">
            <a
                href="{{ $profile }}"
                target="_blank"
                rel="noopener noreferrer"
                class="group flex items-center gap-2 rounded-lg border border-neutral-200 bg-white/90 px-3 py-2 text-sm backdrop-blur-sm transition-colors hover:bg-white dark:border-neutral-700 dark:bg-neutral-900/90 dark:hover:bg-neutral-900"
            >
                <img src="{{ $avatar }}" alt="{{ $uiComponent->github }}" class="size-7 rounded-full object-cover" />
                <div class="flex flex-col">
                    <span class="text-left text-[10px] leading-tight text-neutral-500 dark:text-neutral-400">
                        Contributed by
                    </span>
                    <span class="text-xs leading-tight font-medium text-neutral-900 dark:text-white">
                        {{ $uiComponent->github }}
                    </span>
                </div>
            </a>
        </div>
    @endif

    <div class="flex h-[calc(100vh-82px)] w-full items-center justify-center overflow-auto rounded-xl">
        <div class="w-full">
            {!! $uiComponent->content !!}
        </div>
    </div>
</x-layouts.preview>

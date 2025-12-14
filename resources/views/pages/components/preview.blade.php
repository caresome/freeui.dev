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
                class="group flex items-center gap-2 rounded-xl border-2 border-neutral-900 bg-white px-4 py-3 text-sm font-bold shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-none dark:border-white dark:bg-neutral-900 dark:shadow-[4px_4px_0px_0px_rgba(255,255,255,1)]"
            >
                <img
                    src="{{ $avatar }}"
                    alt="{{ $uiComponent->github }}"
                    class="size-8 rounded-lg border-2 border-neutral-900 object-cover dark:border-white"
                />
                <div class="flex flex-col">
                    <span class="text-left text-[10px] leading-tight text-neutral-600 dark:text-neutral-400">
                        Contributed by
                    </span>
                    <span class="leading-tight text-neutral-900 dark:text-white">{{ $uiComponent->github }}</span>
                </div>
            </a>
        </div>
    @endif

    @php
        $embedUrl = route('components.embed', [
            'collection' => $uiComponent->categoryModel->collection,
            'category' => $uiComponent->category,
            'slug' => $uiComponent->slug,
        ]);
    @endphp

    <div class="relative h-[calc(100vh-82px)] w-full overflow-hidden">
        <iframe
            id="preview-iframe"
            src="{{ $embedUrl }}"
            title="Component preview"
            class="h-full w-full rounded-xl border-0"
            loading="lazy"
        ></iframe>
    </div>

    <script>
        (function () {
            const iframe = document.getElementById('preview-iframe');
            if (!iframe) return;

            function syncIframeTheme() {
                const isDark = document.documentElement.classList.contains('dark');
                if (iframe.contentWindow) {
                    iframe.contentWindow.postMessage({ type: 'theme-sync', isDark }, '*');
                }
            }

            // Sync theme after iframe loads
            iframe.addEventListener('load', syncIframeTheme);

            // Watch for theme changes and sync to iframe
            const observer = new MutationObserver((mutations) => {
                mutations.forEach((mutation) => {
                    if (mutation.attributeName === 'class') {
                        syncIframeTheme();
                    }
                });
            });

            observer.observe(document.documentElement, {
                attributes: true,
                attributeFilter: ['class'],
            });
        })();
    </script>
</x-layouts.preview>

<x-layouts.preview
    :title="$uiComponent->title . ' - Preview'"
    description="A free UI component for your next project."
    :component-content="$uiComponent->content"
    :component-title="$uiComponent->title"
    :collection="$uiComponent->categoryModel->collection"
    :category="$uiComponent->category"
    :slug="$uiComponent->slug"
>
    {{-- Hidden template for iframe content --}}
    <template id="preview-content">
        {!! $uiComponent->content !!}
    </template>

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

    <div class="relative h-[calc(100vh-82px)] w-full overflow-hidden">
        <iframe
            id="preview-iframe"
            title="Component preview"
            class="h-full w-full rounded-xl border-0"
            loading="lazy"
        ></iframe>
    </div>

    @php
        $tailwindCdn = config('freeui.tailwind_cdn');
        $alpineCdn = config('freeui.alpine_cdn');
        $dependencies = $uiComponent->dependencies ?? [];
    @endphp

    <script>
        (function () {
                    function initPreviewIframe() {
                        const iframe = document.getElementById('preview-iframe');
                        const template = document.getElementById('preview-content');
                        if (!iframe || !template) return;

                        const content = template.innerHTML;
                        const isDark = document.documentElement.classList.contains('dark');

                        // Build dependency tags
                        let dependencyTags = '';
                        @if ($dependencies)
                            const dependencies = @js($dependencies);
                            if (dependencies && Array.isArray(dependencies)) {
                                dependencies.forEach((dep) => {
                                    const firstSpace = dep.indexOf(' ');
                                    const url = firstSpace === -1 ? dep.trim() : dep.substring(firstSpace + 1).trim();

                                    if (url.endsWith('.css')) {
                                        dependencyTags += `<link rel="stylesheet" href="${url}">`;
                                    } else if (url.endsWith('.js')) {
                                        dependencyTags += `<script src="${url}"><\/script>`;
                                    }
                                });
                            }
                        @endif

                        // Clone parent styles (LINK and STYLE tags only)
                        let parentStyles = '';
                        Array.from(document.head.children).forEach((child) => {
                            if (['LINK', 'STYLE'].includes(child.tagName)) {
                                parentStyles += child.outerHTML;
                            }
                        });

                        // Build complete document as srcdoc
                        const srcdoc = `<!DOCTYPE html>
        <html class="${isDark ? 'dark' : ''}">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            ${parentStyles}
            <script>
                // Suppress Tailwind CDN warning and Alpine errors
                (function() {
                    const originalWarn = console.warn;
                    console.warn = function(...args) {
                        if (args[0] && typeof args[0] === 'string' && (args[0].includes('cdn.tailwindcss.com') || args[0].includes('Alpine'))) return;
                        originalWarn.apply(console, args);
                    };
                    const originalError = console.error;
                    console.error = function(...args) {
                        if (args[0] && typeof args[0] === 'string' && args[0].includes('Alpine')) return;
                        originalError.apply(console, args);
                    };
                    window.addEventListener('error', function(e) {
                        if (e.message && (e.message.includes('is not defined') || e.message.includes('Illegal invocation') || e.message.includes('Invalid or unexpected token'))) {
                            e.preventDefault();
                            return true;
                        }
                    });
                })();
            <\/script>
            <script src="{{ $tailwindCdn }}"><\/script>
            <style type="text/tailwindcss">
                @theme {
                    --font-sans: 'Inter', sans-serif;
                }
                @variant dark (&:where(.dark, .dark *));
            </style>
            ${dependencyTags}
            <script defer src="{{ $alpineCdn }}"><\/script>
            <style>
                html, body {
                    height: 100%;
                    margin: 0;
                    padding: 0;
                    overflow: hidden;
                }
                body {
                    visibility: hidden;
                }
                body.loaded { visibility: visible; }
                [x-cloak] { display: none !important; }
            </style>
        </head>
        <body class="antialiased font-sans">
            <div class="h-full overflow-auto">
                <div class="flex min-h-full items-center justify-center">
                    <div class="w-full">${content}</div>
                </div>
            </div>
            <script>
                // Show body once Tailwind processes styles
                requestAnimationFrame(() => {
                    requestAnimationFrame(() => {
                        document.body.classList.add('loaded');
                    });
                });
                // Prevent hash links from affecting browser history
                document.addEventListener('click', function(e) {
                    const link = e.target.closest('a');
                    if (link && (link.getAttribute('href') === '#' || link.getAttribute('href')?.startsWith('#'))) {
                        e.preventDefault();
                    }
                });
            <\/script>
        </body>
        </html>`;

                        // Single assignment - browser handles parsing efficiently
                        iframe.srcdoc = srcdoc;

                        // Set up theme sync after iframe loads
                        iframe.onload = () => {
                            syncIframeTheme();
                        };

                        function syncIframeTheme() {
                            const isDark = document.documentElement.classList.contains('dark');
                            if (iframe.contentWindow && iframe.contentWindow.document) {
                                iframe.contentWindow.document.documentElement.classList.toggle('dark', isDark);
                            }
                        }

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
                    }

                    // Initialize when DOM is ready
                    if (document.readyState === 'loading') {
                        document.addEventListener('DOMContentLoaded', initPreviewIframe);
                    } else {
                        initPreviewIframe();
                    }
                })();
    </script>
</x-layouts.preview>

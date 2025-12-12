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
        <iframe id="preview-iframe" title="Component preview" class="h-full w-full rounded-xl border-0"></iframe>
    </div>

    <script>
        (function () {
            function initPreviewIframe() {
                const iframe = document.getElementById('preview-iframe');
                const template = document.getElementById('preview-content');
                if (!iframe || !template) return;

                const content = template.innerHTML;
                const doc = iframe.contentWindow.document;

                // 1. Initialize Document
                doc.open();
                doc.write('');
                doc.close();

                const isDark = document.documentElement.classList.contains('dark');
                doc.documentElement.className = isDark ? 'dark' : '';

                // 2. Clone Head Styles from Parent (excluding scripts)
                Array.from(document.head.children).forEach((child) => {
                    if (['LINK', 'STYLE'].includes(child.tagName)) {
                        doc.head.appendChild(child.cloneNode(true));
                    }
                });

                // 3. Inject Core Scripts programmatically

                // Suppress Tailwind CDN warning and Alpine errors in preview iframe
                const suppressScript = doc.createElement('script');
                suppressScript.textContent = `
                    (function() {
                        // Suppress Tailwind CDN warning
                        const originalWarn = console.warn;
                        console.warn = function(...args) {
                            if (args[0] && typeof args[0] === 'string' && args[0].includes('cdn.tailwindcss.com')) return;
                            if (args[0] && typeof args[0] === 'string' && args[0].includes('Alpine')) return;
                            originalWarn.apply(console, args);
                        };
                        // Suppress Alpine errors in preview iframe (components may have incomplete context)
                        const originalError = console.error;
                        console.error = function(...args) {
                            if (args[0] && typeof args[0] === 'string' && args[0].includes('Alpine')) return;
                            originalError.apply(console, args);
                        };
                        // Catch uncaught errors from Alpine expression evaluation
                        window.addEventListener('error', function(e) {
                            if (e.message && (e.message.includes('is not defined') || e.message.includes('Illegal invocation') || e.message.includes('Invalid or unexpected token'))) {
                                e.preventDefault();
                                return true;
                            }
                        });
                    })();
                `;
                doc.head.appendChild(suppressScript);

                // Tailwind CDN
                const tailwindScript = doc.createElement('script');
                tailwindScript.src = '{{ config('freeui.tailwind_cdn') }}';
                tailwindScript.onload = () => {
                    const tailwindConfig = doc.createElement('style');
                    tailwindConfig.type = 'text/tailwindcss';
                    tailwindConfig.textContent = `
                        @theme {
                            --font-sans: 'Inter', sans-serif;
                        }
                        @variant dark (&:where(.dark, .dark *));
                    `;
                    doc.head.appendChild(tailwindConfig);

                    // Re-apply theme just in case
                    const isDark = document.documentElement.classList.contains('dark');
                    doc.documentElement.classList.toggle('dark', isDark);

                    // Wait for Tailwind to process styles before showing content
                    // Double rAF ensures styles are computed and painted
                    requestAnimationFrame(() => {
                        requestAnimationFrame(() => {
                            doc.body.classList.add('loaded');
                        });
                    });
                };
                doc.head.appendChild(tailwindScript);

                // 4. Inject External Dependencies (Before Alpine)
                @if ($uiComponent->dependencies)
                    const dependencies = @js($uiComponent->dependencies);
                    if (dependencies && Array.isArray(dependencies)) {
                        dependencies.forEach((dep) => {
                            const firstSpace = dep.indexOf(' ');
                            const url = firstSpace === -1 ? dep.trim() : dep.substring(firstSpace + 1).trim();

                            if (url.endsWith('.css')) {
                                const link = doc.createElement('link');
                                link.rel = 'stylesheet';
                                link.href = url;
                                doc.head.appendChild(link);
                            } else if (url.endsWith('.js')) {
                                const s = doc.createElement('script');
                                s.src = url;
                                s.async = false; // Important: Force execution order
                                doc.head.appendChild(s);
                            }
                        });
                    }
                @endif

                // Alpine CDN
                const alpineScript = doc.createElement('script');
                alpineScript.async = false; // Important: Force execution order (after plugins)
                alpineScript.src = '{{ config('freeui.alpine_cdn') }}';
                doc.head.appendChild(alpineScript);

                // 4. Iframe Specific Styles
                const style = doc.createElement('style');
                style.textContent = `
                    html, body {
                        height: 100%;
                        margin: 0;
                        padding: 0;
                        overflow: hidden;
                    }
                    body { visibility: hidden; }
                    body.loaded { visibility: visible; }
                `;
                doc.head.appendChild(style);

                // 5. Body Content
                doc.body.className = 'antialiased font-sans';
                doc.body.innerHTML = `<div class="h-full overflow-auto"><div class="flex min-h-full items-center justify-center"><div class="w-full">${content}</div></div></div>`;

                // 6. Prevent hash links from affecting browser history
                const preventHistoryScript = doc.createElement('script');
                preventHistoryScript.textContent = `
                    document.addEventListener('click', function(e) {
                        const link = e.target.closest('a');
                        if (link && (link.getAttribute('href') === '#' || link.getAttribute('href')?.startsWith('#'))) {
                            e.preventDefault();
                        }
                    });
                `;
                doc.body.appendChild(preventHistoryScript);

                // Sync initial theme state
                if (iframe.contentWindow && iframe.contentWindow.document) {
                    iframe.contentWindow.document.documentElement.classList.toggle('dark', isDark);
                }

                // Watch for theme changes and sync to iframe
                const observer = new MutationObserver((mutations) => {
                    mutations.forEach((mutation) => {
                        if (mutation.attributeName === 'class') {
                            const isDark = document.documentElement.classList.contains('dark');
                            if (iframe.contentWindow && iframe.contentWindow.document) {
                                iframe.contentWindow.document.documentElement.classList.toggle('dark', isDark);
                            }
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

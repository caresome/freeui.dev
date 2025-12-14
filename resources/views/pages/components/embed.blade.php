@php
    $tailwindCdn = config('freeui.tailwind_cdn');
    $alpineCdn = config('freeui.alpine_cdn');
    $dependencies = $uiComponent->dependencies ?? [];
@endphp

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="robots" content="noindex, nofollow" />
        <title>{{ $uiComponent->title }} - Embed</title>

        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
            rel="stylesheet"
        />

        <script>
            // Suppress Tailwind CDN warning and Alpine errors
            (function () {
                const originalWarn = console.warn;
                console.warn = function (...args) {
                    if (
                        args[0] &&
                        typeof args[0] === 'string' &&
                        (args[0].includes('cdn.tailwindcss.com') || args[0].includes('Alpine'))
                    )
                        return;
                    originalWarn.apply(console, args);
                };
                const originalError = console.error;
                console.error = function (...args) {
                    if (args[0] && typeof args[0] === 'string' && args[0].includes('Alpine')) return;
                    originalError.apply(console, args);
                };
                window.addEventListener('error', function (e) {
                    if (
                        e.message &&
                        (e.message.includes('is not defined') ||
                            e.message.includes('Illegal invocation') ||
                            e.message.includes('Invalid or unexpected token'))
                    ) {
                        e.preventDefault();
                        return true;
                    }
                });
            })();
        </script>

        <script src="{{ $tailwindCdn }}"></script>
        <style type="text/tailwindcss">
            @theme {
                --font-sans: 'Inter', sans-serif;
            }
            @variant dark (&:where(.dark, .dark *));
        </style>

        @foreach ($dependencies as $dependency)
            @php
                $parts = explode(' ', $dependency, 2);
                $url = count($parts) === 2 ? $parts[1] : $dependency;
            @endphp

            @if (str_ends_with($url, '.css'))
                <link rel="stylesheet" href="{{ $url }}" />
            @elseif (str_ends_with($url, '.js'))
                <script src="{{ $url }}"></script>
            @endif
        @endforeach

        <script defer src="{{ $alpineCdn }}"></script>

        <style>
            html,
            body {
                height: 100%;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: transparent;
            }
            body {
                visibility: hidden;
            }
            body.loaded {
                visibility: visible;
            }
            [x-cloak] {
                display: none !important;
            }
        </style>
    </head>

    <body class="font-sans antialiased">
        <div class="h-full overflow-auto">
            <div class="flex min-h-full items-center justify-center">
                <div class="w-full">
                    {!! $uiComponent->content !!}
                </div>
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
            document.addEventListener('click', function (e) {
                const link = e.target.closest('a');
                if (link && (link.getAttribute('href') === '#' || link.getAttribute('href')?.startsWith('#'))) {
                    e.preventDefault();
                }
            });

            // Listen for theme sync messages from parent
            window.addEventListener('message', function (e) {
                if (e.data && e.data.type === 'theme-sync') {
                    document.documentElement.classList.toggle('dark', e.data.isDark);
                }
            });

            // Notify parent when loaded
            window.addEventListener('load', function () {
                if (window.parent !== window) {
                    window.parent.postMessage({ type: 'embed-loaded' }, '*');
                }
            });
        </script>
    </body>
</html>

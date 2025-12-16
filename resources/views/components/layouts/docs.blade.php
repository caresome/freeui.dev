@php
    $pageTitle = $title ? $title . ' - FreeUI' : 'FreeUI - Free Tailwind CSS & Alpine.js Components';
    $pageDescription = $description;
    $pageOgImage = $ogImage ?? asset('og-default.png');
    $pageUrl = $ogUrl ?? url()->current();
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full antialiased">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>{{ $pageTitle }}</title>
        <meta name="description" content="{{ $pageDescription }}" />

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website" />
        <meta property="og:url" content="{{ $pageUrl }}" />
        <meta property="og:title" content="{{ $pageTitle }}" />
        <meta property="og:description" content="{{ $pageDescription }}" />
        <meta property="og:image" content="{{ $pageOgImage }}" />

        <!-- Twitter -->
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:url" content="{{ $pageUrl }}" />
        <meta name="twitter:title" content="{{ $pageTitle }}" />
        <meta name="twitter:description" content="{{ $pageDescription }}" />
        <meta name="twitter:image" content="{{ $pageOgImage }}" />

        <link rel="canonical" href="{{ $pageUrl }}" />
        <link rel="sitemap" type="application/xml" href="/sitemap.xml" />
        <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any" />
        <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml" />
        <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}" />

        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            rel="preload"
            as="style"
            href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
        />
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
            rel="stylesheet"
            media="print"
            onload="this.media = 'all'"
        />
        <noscript>
            <link
                href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
                rel="stylesheet"
            />
        </noscript>

        <x-theme-scripts />

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>

    <body
        class="flex min-h-full flex-col bg-neutral-50 font-sans transition-colors duration-200 dark:bg-neutral-950"
        x-data="{
            theme: localStorage.getItem('theme') || 'system',
            init() {
                this.$watch('theme', (val) => {
                    localStorage.setItem('theme', val)
                    this.updateTheme()
                })
                window
                    .matchMedia('(prefers-color-scheme: dark)')
                    .addEventListener('change', () => {
                        if (this.theme === 'system') this.updateTheme()
                    })
            },
            updateTheme() {
                let isDark =
                    this.theme === 'dark' ||
                    (this.theme === 'system' &&
                        window.matchMedia('(prefers-color-scheme: dark)').matches)
                document.documentElement.classList.toggle('dark', isDark)
            },
        }"
    >
        <a
            href="#main-content"
            class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-[100] focus:rounded-lg focus:border focus:border-neutral-300 focus:bg-white focus:px-3 focus:py-1.5 focus:text-sm focus:font-medium focus:text-neutral-900 focus:shadow-lg dark:focus:border-neutral-700 dark:focus:bg-neutral-900 dark:focus:text-white"
        >
            Skip to main content
        </a>

        <x-header />

        <x-mobile-sidebar :collections="$sidebarCollections" />

        <div class="flex flex-1">
            <x-sidebar :collections="$sidebarCollections" />

            <main id="main-content" class="min-w-0 flex-1" tabindex="-1">
                {{ $slot }}
            </main>
        </div>

        <x-footer :full-width="true" />

        <x-command-palette />
    </body>
</html>

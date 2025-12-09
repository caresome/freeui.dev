@props([
    'title' => null,
    'description' => 'Free, open-source UI components for your next project. Copy and paste beautiful Tailwind CSS components.',
    'ogImage' => null,
    'ogUrl' => null,
])

@php
    $pageTitle = $title ? $title . ' - FreeUI' : 'Preview - FreeUI';
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

        <script>
            // Immediately apply theme to avoid FOUC
            (function () {
                try {
                    const theme = localStorage.getItem('theme') || 'system';
                    const isDark =
                        theme === 'dark' ||
                        (theme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches);
                    if (isDark) {
                        document.documentElement.classList.add('dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                    }
                } catch (e) {}
            })();
        </script>
        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif

        @livewireStyles
    </head>

    <body
        class="flex min-h-full flex-col bg-stone-50 font-sans transition-colors duration-200 dark:bg-neutral-950"
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
        <x-header-preview>
            {{ $headerRight ?? '' }}
        </x-header-preview>

        <main class="flex-grow">
            {{ $slot }}
        </main>

        @livewireScripts
    </body>
</html>

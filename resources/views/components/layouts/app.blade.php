@props([
    'title' => null,
    'hideFooter' => false,
    'showComponentsLink' => true,
    'showGithub' => true,
    'forceSolidHeader' => false,
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full antialiased">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>{{ $title ?? 'FreeUI' }}</title>

        <link rel="icon" href="/favicon.ico" sizes="any" />
        <link rel="icon" href="/favicon.svg" type="image/svg+xml" />
        <link rel="apple-touch-icon" href="/apple-touch-icon.png" />

        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
            rel="stylesheet"
        />

        <!-- Highlight.js for syntax highlighting -->
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css"
        />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>

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

            /* Make highlight.js background transparent */
            .hljs {
                background: transparent !important;
            }
        </style>

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <script src="https://cdn.tailwindcss.com"></script>
            <script>
                tailwind.config = {
                    darkMode: 'class',
                };
            </script>
            <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
        @endif

        @livewireStyles
    </head>

    <body
        class="bg-neo-bg dark:bg-neo-bg-dark flex min-h-full flex-col font-sans transition-colors duration-200"
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
        <header
            class="{{ $forceSolidHeader ? 'bg-neo-bg dark:bg-neo-bg-dark' : 'bg-neo-bg/80 dark:bg-neo-bg-dark/80 backdrop-blur-xl' }} sticky top-0 z-50 w-full transition-colors duration-200"
        >
            <div class="mx-auto flex h-16 max-w-7xl items-center justify-between px-6 lg:px-8">
                <div class="flex items-center gap-8">
                    <a href="/" class="group flex items-center gap-2">
                        <div
                            class="border-neo-black bg-neo-black dark:border-neo-text-dark dark:bg-neo-text-dark dark:text-neo-black flex h-8 w-8 items-center justify-center rounded-xl border-2 text-white shadow-[3px_3px_0px_0px_rgba(12,12,12,0.2)] transition-all group-hover:translate-x-[2px] group-hover:translate-y-[2px] group-hover:shadow-none dark:shadow-[3px_3px_0px_0px_rgba(250,250,250,0.2)]"
                        >
                            <span class="text-sm font-black">F</span>
                        </div>
                        <span class="text-neo-text dark:text-neo-text-dark text-lg font-bold">FreeUI</span>
                    </a>
                    <nav class="hidden gap-1 md:flex">
                        @if ($showComponentsLink)
                            <a
                                href="{{ route('components.index') }}"
                                class="{{
                                    request()->is('components*')
                                        ? 'bg-neo-black/5 text-neo-text dark:text-neo-text-dark dark:bg-white/10'
                                        : 'text-neo-text-muted hover:bg-neo-black/5 hover:text-neo-text dark:text-neo-text-muted-dark dark:hover:text-neo-text-dark dark:hover:bg-white/10'
                                }} rounded-xl px-3 py-2 text-sm font-medium transition-colors"
                            >
                                Components
                            </a>
                        @endif
                    </nav>
                </div>
                <div class="flex items-center gap-2">
                    <!-- Theme Toggle -->
                    <button
                        @click="theme = theme === 'light' ? 'dark' : (theme === 'dark' ? 'system' : 'light')"
                        class="border-neo-black bg-neo-surface text-neo-text dark:border-neo-text-dark dark:bg-neo-surface-dark dark:text-neo-text-dark flex h-9 items-center gap-2 rounded-xl border-2 px-3 text-sm font-semibold shadow-[3px_3px_0px_0px_rgba(12,12,12,1)] transition-all hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-none dark:shadow-[3px_3px_0px_0px_rgba(250,250,250,1)]"
                        title="Toggle Theme"
                    >
                        <x-heroicon-o-sun class="h-4 w-4" x-show="theme === 'light'" />
                        <x-heroicon-o-moon class="h-4 w-4" x-show="theme === 'dark'" x-cloak />
                        <x-heroicon-o-computer-desktop class="h-4 w-4" x-show="theme === 'system'" x-cloak />
                        <span
                            class="hidden sm:inline"
                            x-text="theme === 'system' ? 'System' : theme === 'light' ? 'Light' : 'Dark'"
                        ></span>
                    </button>

                    @if ($showGithub)
                        <a
                            href="https://github.com/ankitthapa/freeui"
                            target="_blank"
                            class="border-neo-black bg-neo-surface text-neo-text dark:border-neo-text-dark dark:bg-neo-surface-dark dark:text-neo-text-dark flex h-9 w-9 items-center justify-center rounded-xl border-2 shadow-[3px_3px_0px_0px_rgba(12,12,12,1)] transition-all hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-none dark:shadow-[3px_3px_0px_0px_rgba(250,250,250,1)]"
                        >
                            <span class="sr-only">GitHub</span>
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    fill-rule="evenodd"
                                    d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </a>
                    @endif

                    {{ $headerRight ?? '' }}
                </div>
            </div>
        </header>

        <main class="flex-grow">
            {{ $slot }}
        </main>

        @unless ($hideFooter)
            <footer class="bg-neo-bg dark:bg-neo-bg-dark transition-colors duration-200">
                <div class="mx-auto max-w-7xl px-6 py-12 lg:px-8">
                    <div class="flex flex-col items-center justify-between gap-6 sm:flex-row">
                        <div class="flex items-center gap-2">
                            <div
                                class="border-neo-black bg-neo-black dark:border-neo-text-dark dark:bg-neo-text-dark dark:text-neo-black flex h-8 w-8 items-center justify-center rounded-xl border-2 text-white"
                            >
                                <span class="text-sm font-black">F</span>
                            </div>
                            <span class="text-neo-text dark:text-neo-text-dark text-lg font-bold">FreeUI</span>
                        </div>
                        <div class="flex items-center gap-6">
                            <a
                                href="{{ route('components.index') }}"
                                class="text-neo-text-muted hover:text-neo-text dark:text-neo-text-muted-dark dark:hover:text-neo-text-dark text-sm font-medium transition-colors"
                            >
                                Components
                            </a>
                            <a
                                href="https://github.com/ankitthapa/freeui"
                                target="_blank"
                                class="text-neo-text-muted hover:text-neo-text dark:text-neo-text-muted-dark dark:hover:text-neo-text-dark text-sm font-medium transition-colors"
                            >
                                GitHub
                            </a>
                        </div>
                    </div>
                    <div
                        class="border-neo-border-light dark:border-neo-border mt-8 border-t-2 border-dashed pt-8 text-center"
                    >
                        <p class="text-neo-text-muted dark:text-neo-text-muted-dark text-sm">
                            &copy; {{ date('Y') }} FreeUI. Open source and free forever.
                        </p>
                    </div>
                </div>
            </footer>
        @endunless

        @livewireScripts
    </body>
</html>

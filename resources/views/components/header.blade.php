@props(['showMenuToggle' => true])

<header
    class="sticky top-0 z-50 w-full border-b border-neutral-200 bg-white/80 backdrop-blur-xl transition-colors duration-200 dark:border-neutral-800 dark:bg-neutral-950/80"
>
    <div class="flex h-14 items-center justify-between px-4 lg:px-6">
        <div class="flex items-center gap-6">
            <a href="/" class="group flex items-center gap-2">
                <div
                    class="flex h-7 w-7 items-center justify-center rounded-md border border-neutral-900 bg-neutral-900 text-white transition-all dark:border-white dark:bg-white dark:text-neutral-900"
                >
                    <span class="text-xs font-bold">F</span>
                </div>
                <span class="text-base font-semibold text-neutral-900 dark:text-white">FreeUI</span>
            </a>
            <nav class="hidden gap-1 md:flex">
                <a
                    href="{{ route('home') }}#components"
                    class="rounded-lg px-3 py-1.5 text-sm font-medium text-neutral-600 transition-colors hover:bg-neutral-100 hover:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-white"
                >
                    Components
                </a>
            </nav>
        </div>
        <div class="flex items-center gap-1.5">
            <x-search-button />

            <!-- Theme Toggle -->
            <button
                type="button"
                @click="theme = theme === 'light' ? 'dark' : (theme === 'dark' ? 'system' : 'light')"
                class="flex h-8 w-8 items-center justify-center rounded-lg text-neutral-500 transition-colors hover:bg-neutral-100 hover:text-neutral-700 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-300"
                :aria-label="'Switch to ' + (theme === 'light' ? 'dark' : (theme === 'dark' ? 'system' : 'light')) + ' theme'"
            >
                <x-heroicon-o-sun class="h-5 w-5" x-show="theme === 'light'" aria-hidden="true" />
                <x-heroicon-o-moon class="h-5 w-5" x-show="theme === 'dark'" x-cloak aria-hidden="true" />
                <x-heroicon-o-computer-desktop class="h-5 w-5" x-show="theme === 'system'" x-cloak aria-hidden="true" />
            </button>

            <!-- GitHub -->
            <a
                href="{{ config('freeui.github_repo') }}"
                target="_blank"
                rel="noopener noreferrer"
                class="flex h-8 w-8 items-center justify-center rounded-lg text-neutral-500 transition-colors hover:bg-neutral-100 hover:text-neutral-700 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-300"
            >
                <span class="sr-only">GitHub</span>
                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path
                        fill-rule="evenodd"
                        d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                        clip-rule="evenodd"
                    />
                </svg>
            </a>

            @if ($showMenuToggle)
                <!-- Mobile Menu Toggle -->
                <button
                    type="button"
                    x-on:click="$dispatch('toggle-mobile-sidebar')"
                    class="flex h-8 w-8 items-center justify-center rounded-lg text-neutral-500 transition-colors hover:bg-neutral-100 hover:text-neutral-700 lg:hidden dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-300"
                >
                    <span class="sr-only">Open menu</span>
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                        />
                    </svg>
                </button>
            @endif
        </div>
    </div>
</header>

<header
    class="sticky top-0 z-50 w-full bg-stone-50/80 backdrop-blur-xl transition-colors duration-200 dark:bg-neutral-950/80"
>
    <div class="mx-auto flex h-16 max-w-7xl items-center justify-between px-6 lg:px-8">
        <div class="flex items-center gap-8">
            <a href="/" class="group flex items-center gap-2">
                <div
                    class="flex h-8 w-8 items-center justify-center rounded-xl border-2 border-neutral-900 bg-neutral-900 text-white shadow-[3px_3px_0px_0px_rgba(0,0,0,0.2)] transition-all group-hover:translate-x-[2px] group-hover:translate-y-[2px] group-hover:shadow-none group-focus-visible:translate-x-[2px] group-focus-visible:translate-y-[2px] group-focus-visible:shadow-none dark:border-white dark:bg-white dark:text-neutral-900 dark:shadow-[3px_3px_0px_0px_rgba(255,255,255,0.2)]"
                >
                    <span class="text-sm font-black">F</span>
                </div>
                <span class="text-lg font-bold text-neutral-900 dark:text-white">FreeUI</span>
            </a>
            <nav class="hidden gap-1 md:flex">
                <a
                    href="{{ route('home') }}#components"
                    class="rounded-xl px-3 py-2 text-sm font-medium text-neutral-600 transition-colors hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/5 focus-visible:text-neutral-900 dark:text-neutral-400 dark:hover:bg-white/10 dark:hover:text-white dark:focus-visible:bg-white/10 dark:focus-visible:text-white"
                >
                    Components
                </a>
            </nav>
        </div>
        <div class="flex items-center gap-2">
            <!-- Search Button -->
            <button
                x-on:click="$dispatch('open-command-palette')"
                class="hidden h-9 items-center gap-2 rounded-xl border-2 border-neutral-900 bg-white px-3 text-sm font-medium text-neutral-600 shadow-[3px_3px_0px_0px_rgba(0,0,0,1)] transition-all hover:translate-x-[2px] hover:translate-y-[2px] hover:text-neutral-900 hover:shadow-none focus-visible:translate-x-[2px] focus-visible:translate-y-[2px] focus-visible:shadow-none sm:flex dark:border-white dark:bg-neutral-900 dark:text-neutral-400 dark:shadow-[3px_3px_0px_0px_rgba(255,255,255,1)] dark:hover:text-white"
            >
                <x-heroicon-o-magnifying-glass class="h-4 w-4" aria-hidden="true" />
                <span>Search</span>
                <kbd
                    class="ml-1 rounded-md border-2 border-neutral-900 bg-stone-50 px-1.5 py-0.5 text-xs font-bold dark:border-white dark:bg-neutral-800"
                    x-text="navigator.platform.includes('Mac') ? '⌘K' : 'Ctrl+K'"
                ></kbd>
            </button>

            <!-- Mobile Search Button -->
            <button
                x-on:click="$dispatch('open-command-palette')"
                class="flex h-9 w-9 items-center justify-center rounded-xl border-2 border-neutral-900 bg-white text-neutral-900 shadow-[3px_3px_0px_0px_rgba(0,0,0,1)] transition-all hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-none focus-visible:translate-x-[2px] focus-visible:translate-y-[2px] focus-visible:shadow-none sm:hidden dark:border-white dark:bg-neutral-900 dark:text-white dark:shadow-[3px_3px_0px_0px_rgba(255,255,255,1)]"
            >
                <span class="sr-only">Search</span>
                <x-heroicon-o-magnifying-glass class="h-5 w-5" aria-hidden="true" />
            </button>

            <!-- Theme Toggle -->
            <button
                @click="theme = theme === 'light' ? 'dark' : (theme === 'dark' ? 'system' : 'light')"
                class="flex h-9 items-center gap-2 rounded-xl border-2 border-neutral-900 bg-white px-3 text-sm font-semibold text-neutral-900 shadow-[3px_3px_0px_0px_rgba(0,0,0,1)] transition-all hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-none focus-visible:translate-x-[2px] focus-visible:translate-y-[2px] focus-visible:shadow-none dark:border-white dark:bg-neutral-900 dark:text-white dark:shadow-[3px_3px_0px_0px_rgba(255,255,255,1)]"
                :aria-label="'Switch to ' + (theme === 'light' ? 'dark' : (theme === 'dark' ? 'system' : 'light')) + ' theme'"
            >
                <x-heroicon-o-sun class="h-4 w-4" x-show="theme === 'light'" aria-hidden="true" />
                <x-heroicon-o-moon class="h-4 w-4" x-show="theme === 'dark'" x-cloak aria-hidden="true" />
                <x-heroicon-o-computer-desktop class="h-4 w-4" x-show="theme === 'system'" x-cloak aria-hidden="true" />
                <span
                    class="hidden sm:inline"
                    x-text="theme === 'system' ? 'System' : theme === 'light' ? 'Light' : 'Dark'"
                ></span>
            </button>

            <!-- GitHub -->
            <a
                href="https://github.com/caresome/freeui.dev"
                target="_blank"
                class="flex h-9 w-9 items-center justify-center rounded-xl border-2 border-neutral-900 bg-white text-neutral-900 shadow-[3px_3px_0px_0px_rgba(0,0,0,1)] transition-all hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-none focus-visible:translate-x-[2px] focus-visible:translate-y-[2px] focus-visible:shadow-none dark:border-white dark:bg-neutral-900 dark:text-white dark:shadow-[3px_3px_0px_0px_rgba(255,255,255,1)]"
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
        </div>
    </div>
</header>

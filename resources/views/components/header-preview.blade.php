<header class="sticky top-0 z-50 w-full bg-stone-50 transition-colors duration-200 dark:bg-neutral-950">
    <div class="mx-auto flex h-16 max-w-7xl items-center justify-between px-6 lg:px-8">
        <a href="/" class="group flex items-center gap-2">
            <div
                class="flex h-8 w-8 items-center justify-center rounded-lg border-2 border-neutral-900 bg-neutral-900 text-white shadow-[3px_3px_0px_0px_rgba(0,0,0,0.2)] transition-all group-hover:translate-x-[2px] group-hover:translate-y-[2px] group-hover:shadow-none group-focus-visible:translate-x-[2px] group-focus-visible:translate-y-[2px] group-focus-visible:shadow-none dark:border-white dark:bg-white dark:text-neutral-900 dark:shadow-[3px_3px_0px_0px_rgba(255,255,255,0.2)]"
            >
                <span class="text-sm font-black">F</span>
            </div>
            <span class="text-lg font-bold text-neutral-900 dark:text-white">FreeUI</span>
        </a>
        <div class="flex items-center gap-2">
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

            {{ $slot }}
        </div>
    </div>
</header>

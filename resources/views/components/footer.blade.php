@props(['fullWidth' => false])

<footer
    class="border-t border-neutral-200 bg-white transition-colors duration-200 dark:border-neutral-800 dark:bg-neutral-950"
>
    <div class="{{ $fullWidth ? 'px-6 lg:px-8' : 'mx-auto max-w-7xl px-6 lg:px-8' }} py-8">
        <div class="flex flex-col items-center justify-between gap-4 sm:flex-row">
            <div class="flex items-center gap-2">
                <div
                    class="flex h-6 w-6 items-center justify-center rounded-md border border-neutral-900 bg-neutral-900 text-white dark:border-white dark:bg-white dark:text-neutral-900"
                >
                    <span class="text-xs font-bold">F</span>
                </div>
                <span class="text-sm font-semibold text-neutral-900 dark:text-white">FreeUI</span>
            </div>
            <nav aria-label="Footer navigation" class="flex items-center gap-6">
                <a
                    href="{{ route('home') }}#components"
                    class="text-sm text-neutral-500 transition-colors hover:text-neutral-900 dark:text-neutral-400 dark:hover:text-white"
                >
                    Components
                </a>
                <a
                    href="https://github.com/caresome/freeui.dev"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="text-sm text-neutral-500 transition-colors hover:text-neutral-900 dark:text-neutral-400 dark:hover:text-white"
                >
                    GitHub
                </a>
            </nav>
        </div>
        <div class="mt-6 border-t border-neutral-100 pt-6 dark:border-neutral-800">
            <p class="text-center text-sm text-neutral-500 dark:text-neutral-500">
                &copy; {{ date('Y') }} FreeUI. Open source and free forever.
            </p>
        </div>
    </div>
</footer>

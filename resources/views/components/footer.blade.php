<footer class="bg-stone-50 transition-colors duration-200 dark:bg-neutral-950">
    <div class="mx-auto max-w-7xl px-6 py-12 lg:px-8">
        <div class="flex flex-col items-center justify-between gap-6 sm:flex-row">
            <div class="flex items-center gap-2">
                <div
                    class="flex h-8 w-8 items-center justify-center rounded-lg border-2 border-neutral-900 bg-neutral-900 text-white dark:border-white dark:bg-white dark:text-neutral-900">
                    <span class="text-sm font-black">F</span>
                </div>
                <span class="text-lg font-bold text-neutral-900 dark:text-white">FreeUI</span>
            </div>
            <div class="flex items-center gap-6">
                <a
                    href="{{ route('home') }}#components"
                    class="text-sm font-medium text-neutral-600 transition-colors hover:text-neutral-900 focus-visible:text-neutral-900 dark:text-neutral-400 dark:hover:text-white dark:focus-visible:text-white">
                    Components
                </a>
                <a
                    href="https://github.com/caresome/freeui.dev"
                    target="_blank"
                    class="text-sm font-medium text-neutral-600 transition-colors hover:text-neutral-900 focus-visible:text-neutral-900 dark:text-neutral-400 dark:hover:text-white dark:focus-visible:text-white">
                    GitHub
                </a>
            </div>
        </div>
        <div class="mt-8 border-t-2 border-dashed border-neutral-200 pt-8 dark:border-neutral-800">
            <div class="flex flex-col items-center justify-between gap-4 sm:flex-row">
                <p class="text-sm text-neutral-600 dark:text-neutral-400">
                    &copy; {{ date('Y') }} FreeUI. Open source and free forever.
                </p>
                <p class="text-xs text-neutral-500 dark:text-neutral-500">
                    Built for Tailwind CSS {{ config('freeui.tailwind_version') }} + Alpine.js
                    {{ config('freeui.alpine_version') }}
                </p>
            </div>
        </div>
    </div>
</footer>

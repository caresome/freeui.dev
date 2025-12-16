{{-- Desktop Search Button --}}
<button
    type="button"
    x-on:click="$dispatch('open-command-palette')"
    class="hidden h-8 items-center gap-2 rounded-lg border border-neutral-200 bg-white px-3 text-sm text-neutral-500 transition-colors hover:bg-neutral-50 hover:text-neutral-700 sm:flex dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300"
>
    <x-heroicon-o-magnifying-glass class="h-4 w-4" aria-hidden="true" />
    <span>Search</span>
    <kbd
        class="ml-1 rounded border border-neutral-200 bg-neutral-100 px-1.5 py-0.5 text-xs text-neutral-500 dark:border-neutral-600 dark:bg-neutral-700 dark:text-neutral-400"
        x-text="navigator.platform.includes('Mac') ? '⌘K' : 'Ctrl+K'"
    ></kbd>
</button>

{{-- Mobile Search Button --}}
<button
    type="button"
    x-on:click="$dispatch('open-command-palette')"
    class="flex h-8 w-8 items-center justify-center rounded-lg text-neutral-500 transition-colors hover:bg-neutral-100 hover:text-neutral-700 sm:hidden dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-300"
>
    <span class="sr-only">Search</span>
    <x-heroicon-o-magnifying-glass class="h-5 w-5" aria-hidden="true" />
</button>

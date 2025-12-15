---
slug: navbar-with-search
title: Navbar with Search
category: navigation
github: caresome
dependencies: []
publish_at: 2025-12-15 12:00:00
---

<div data-preview-only class="min-h-[200px] w-full">
    <nav
        class="border-b border-neutral-200 bg-white dark:border-neutral-800 dark:bg-neutral-900"
        aria-label="Main navigation"
    >
        <div class="mx-auto flex h-16 max-w-7xl items-center justify-between gap-4 px-4 sm:px-6 lg:px-8">
            <!-- Logo -->
            <a
                href="#"
                class="flex shrink-0 items-center gap-2 rounded-lg focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
            >
                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-neutral-900 dark:bg-neutral-100">
                    <span class="text-sm font-bold text-white dark:text-neutral-900">C</span>
                </div>
                <span class="hidden text-sm font-semibold text-neutral-900 sm:block dark:text-neutral-50">Company</span>
            </a>

            <!-- Search -->
            <div class="flex max-w-md flex-1 items-center">
                <div class="relative w-full">
                    <label for="navbar-search" class="sr-only">Search</label>
                    <svg
                        class="absolute top-1/2 left-3 h-4 w-4 -translate-y-1/2 text-neutral-400"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                        aria-hidden="true"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                        />
                    </svg>
                    <input
                        type="search"
                        id="navbar-search"
                        placeholder="Search..."
                        class="h-10 w-full rounded-lg border border-neutral-200 bg-neutral-50 py-2 pr-4 pl-10 text-sm text-neutral-900 placeholder-neutral-400 transition-colors focus:border-neutral-300 focus:bg-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-50 dark:placeholder-neutral-500 dark:focus:border-neutral-600 dark:focus:bg-neutral-700 dark:focus-visible:outline-neutral-100"
                    />
                    <kbd
                        class="pointer-events-none absolute top-1/2 right-3 hidden -translate-y-1/2 rounded border border-neutral-200 bg-neutral-100 px-1.5 py-0.5 text-xs font-medium text-neutral-500 sm:block dark:border-neutral-600 dark:bg-neutral-700 dark:text-neutral-400"
                    >
                        ⌘K
                    </kbd>
                </div>
            </div>

            <!-- Right side -->
            <div class="flex shrink-0 items-center gap-2">
                <!-- Notifications -->
                <button
                    type="button"
                    class="relative inline-flex h-10 w-10 items-center justify-center rounded-lg text-neutral-500 transition-colors hover:bg-neutral-100 hover:text-neutral-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:outline-neutral-100"
                    aria-label="View notifications"
                >
                    <svg
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                        aria-hidden="true"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"
                        />
                    </svg>
                    <span class="absolute top-2 right-2 h-2 w-2 rounded-full bg-red-500" aria-hidden="true"></span>
                </button>

                <!-- User menu -->
                <button
                    type="button"
                    class="flex items-center gap-2 rounded-lg p-1 transition-colors hover:bg-neutral-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:hover:bg-neutral-800 dark:focus-visible:outline-neutral-100"
                    aria-label="Open user menu"
                >
                    <img class="h-8 w-8 rounded-full object-cover" src="https://github.com/caresome.png" alt="" />
                </button>
            </div>
        </div>
    </nav>
</div>

---
slug: stacked-layout-with-nav
title: Stacked Layout With Nav
category: app-shells
github: caresome
dependencies: []
publish_at: 2024-01-06 00:00:00
---

<div x-data="{ mobileMenuOpen: false }" class="min-h-screen bg-neutral-50 dark:bg-neutral-950">
    <!-- Header -->
    <header class="border-b border-neutral-200/80 bg-white dark:border-neutral-800/80 dark:bg-neutral-900">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <!-- Logo -->
                <a href="#" class="flex items-center gap-2">
                    <div class="flex h-8 w-8 items-center justify-center rounded-xl bg-neutral-900 dark:bg-white">
                        <span class="text-sm font-bold text-white dark:text-neutral-900">C</span>
                    </div>
                    <span class="text-sm font-semibold text-neutral-900 dark:text-neutral-50">Caresome</span>
                </a>

                <!-- Right side: Search + Notifications + Avatar -->
                <div class="hidden md:flex md:items-center md:gap-3">
                    <!-- Search -->
                    <div class="relative">
                        <svg
                            class="absolute top-1/2 left-3 h-4 w-4 -translate-y-1/2 text-neutral-400"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                            />
                        </svg>
                        <input
                            type="text"
                            placeholder="Search..."
                            class="h-9 w-64 rounded-lg border border-neutral-200/80 bg-neutral-50 pr-3 pl-9 text-sm text-neutral-900 placeholder-neutral-400 transition-colors duration-150 focus:border-neutral-300/80 focus:bg-white focus:outline-none dark:border-neutral-700 dark:bg-neutral-800 dark:text-white dark:placeholder-neutral-500 dark:focus:border-neutral-600 dark:focus:bg-neutral-700"
                        />
                    </div>

                    <!-- Notification Button -->
                    <button
                        type="button"
                        class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-neutral-500 transition-all duration-150 hover:scale-105 hover:bg-neutral-100 hover:text-neutral-900 active:bg-neutral-200 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:active:bg-neutral-700"
                        aria-label="View notifications"
                    >
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"
                            />
                        </svg>
                    </button>

                    <!-- User Avatar -->
                    <a
                        href="#"
                        class="rounded-full p-0.5 transition-colors duration-150 hover:bg-neutral-100 active:bg-neutral-200 dark:hover:bg-neutral-800 dark:active:bg-neutral-700"
                        aria-label="View profile"
                    >
                        <img
                            class="h-8 w-8 rounded-full object-cover ring-1 ring-neutral-200 dark:ring-neutral-700"
                            src="https://github.com/caresome.png"
                            alt="User avatar"
                        />
                    </a>
                </div>

                <!-- Mobile menu button -->
                <div class="flex md:hidden">
                    <button
                        @click="mobileMenuOpen = !mobileMenuOpen"
                        type="button"
                        class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-neutral-500 transition-all duration-150 hover:scale-105 hover:bg-neutral-100 hover:text-neutral-900 active:bg-neutral-200 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:active:bg-neutral-700"
                        :aria-expanded="mobileMenuOpen"
                        aria-controls="mobile-menu"
                        aria-label="Toggle menu"
                    >
                        <svg
                            x-show="!mobileMenuOpen"
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                            />
                        </svg>
                        <svg
                            x-show="mobileMenuOpen"
                            x-cloak
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Desktop Navigation -->
        <nav
            class="hidden border-t border-neutral-200/80 bg-neutral-50 md:block dark:border-neutral-800/80 dark:bg-neutral-900/50"
        >
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-10 items-center gap-1">
                    <a
                        href="#"
                        class="rounded-lg bg-neutral-100 px-3 py-1.5 text-sm font-medium text-neutral-900 dark:bg-neutral-800 dark:text-neutral-50"
                    >
                        Dashboard
                    </a>
                    <a
                        href="#"
                        class="rounded-lg px-3 py-1.5 text-sm font-medium text-neutral-600 transition-all duration-150 hover:bg-neutral-100 hover:text-neutral-900 focus-visible:bg-neutral-100 focus-visible:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:bg-neutral-800 dark:focus-visible:text-neutral-50"
                    >
                        Team
                    </a>
                    <a
                        href="#"
                        class="rounded-lg px-3 py-1.5 text-sm font-medium text-neutral-600 transition-all duration-150 hover:bg-neutral-100 hover:text-neutral-900 focus-visible:bg-neutral-100 focus-visible:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:bg-neutral-800 dark:focus-visible:text-neutral-50"
                    >
                        Projects
                    </a>
                    <a
                        href="#"
                        class="rounded-lg px-3 py-1.5 text-sm font-medium text-neutral-600 transition-all duration-150 hover:bg-neutral-100 hover:text-neutral-900 focus-visible:bg-neutral-100 focus-visible:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:bg-neutral-800 dark:focus-visible:text-neutral-50"
                    >
                        Calendar
                    </a>
                    <a
                        href="#"
                        class="rounded-lg px-3 py-1.5 text-sm font-medium text-neutral-600 transition-all duration-150 hover:bg-neutral-100 hover:text-neutral-900 focus-visible:bg-neutral-100 focus-visible:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:bg-neutral-800 dark:focus-visible:text-neutral-50"
                    >
                        Reports
                    </a>
                </div>
            </div>
        </nav>

        <!-- Mobile Menu -->
        <div
            x-show="mobileMenuOpen"
            x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 -translate-y-1"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-1"
            @keydown.escape.window="mobileMenuOpen = false"
            class="border-t border-neutral-200/80 bg-white md:hidden dark:border-neutral-800/80 dark:bg-neutral-900"
            id="mobile-menu"
            x-cloak
        >
            <!-- Mobile Search -->
            <div class="px-4 py-3">
                <div class="relative">
                    <svg
                        class="absolute top-1/2 left-3 h-4 w-4 -translate-y-1/2 text-neutral-400"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                        />
                    </svg>
                    <input
                        type="text"
                        placeholder="Search..."
                        class="h-10 w-full rounded-lg border border-neutral-200/80 bg-neutral-50 pr-3 pl-9 text-sm text-neutral-900 placeholder-neutral-400 transition-colors duration-150 focus:border-neutral-300/80 focus:bg-white focus:outline-none dark:border-neutral-700 dark:bg-neutral-800 dark:text-white dark:placeholder-neutral-500 dark:focus:border-neutral-600 dark:focus:bg-neutral-700"
                    />
                </div>
            </div>

            <!-- Mobile Nav Links -->
            <div class="space-y-1 px-4 pb-3">
                <a
                    href="#"
                    class="block rounded-lg bg-neutral-100 px-3 py-2 text-sm font-medium text-neutral-900 dark:bg-neutral-800 dark:text-neutral-50"
                >
                    Dashboard
                </a>
                <a
                    href="#"
                    class="block rounded-lg px-3 py-2 text-sm font-medium text-neutral-600 transition-all duration-150 hover:bg-neutral-100 hover:text-neutral-900 focus-visible:bg-neutral-100 focus-visible:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:bg-neutral-800 dark:focus-visible:text-neutral-50"
                >
                    Team
                </a>
                <a
                    href="#"
                    class="block rounded-lg px-3 py-2 text-sm font-medium text-neutral-600 transition-all duration-150 hover:bg-neutral-100 hover:text-neutral-900 focus-visible:bg-neutral-100 focus-visible:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:bg-neutral-800 dark:focus-visible:text-neutral-50"
                >
                    Projects
                </a>
                <a
                    href="#"
                    class="block rounded-lg px-3 py-2 text-sm font-medium text-neutral-600 transition-all duration-150 hover:bg-neutral-100 hover:text-neutral-900 focus-visible:bg-neutral-100 focus-visible:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:bg-neutral-800 dark:focus-visible:text-neutral-50"
                >
                    Calendar
                </a>
                <a
                    href="#"
                    class="block rounded-lg px-3 py-2 text-sm font-medium text-neutral-600 transition-all duration-150 hover:bg-neutral-100 hover:text-neutral-900 focus-visible:bg-neutral-100 focus-visible:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:bg-neutral-800 dark:focus-visible:text-neutral-50"
                >
                    Reports
                </a>
            </div>

            <!-- Mobile User Section -->
            <div class="border-t border-neutral-200/80 px-4 py-3 dark:border-neutral-800/80">
                <div class="flex items-center gap-3">
                    <a href="#" class="flex items-center gap-3">
                        <img
                            class="h-9 w-9 rounded-full object-cover ring-1 ring-neutral-200 dark:ring-neutral-700"
                            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="User avatar"
                        />
                        <span class="text-sm font-medium text-neutral-900 dark:text-neutral-50">View profile</span>
                    </a>
                    <button
                        type="button"
                        class="ml-auto inline-flex h-9 w-9 items-center justify-center rounded-lg text-neutral-500 transition-all duration-150 hover:scale-105 hover:bg-neutral-100 hover:text-neutral-900 active:bg-neutral-200 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:active:bg-neutral-700"
                        aria-label="View notifications"
                    >
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"
                            />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="py-6">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <!-- Content placeholder -->
            <div
                class="rounded-xl border border-dashed border-neutral-300/80 bg-white p-12 text-center dark:border-neutral-700/80 dark:bg-neutral-900"
            >
                <div
                    class="mx-auto flex h-12 w-12 items-center justify-center rounded-xl bg-neutral-100 dark:bg-neutral-800"
                >
                    <svg
                        class="h-6 w-6 text-neutral-500 dark:text-neutral-400"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z"
                        />
                    </svg>
                </div>
                <h3 class="mt-4 text-sm font-medium text-neutral-900 dark:text-neutral-50">Your content goes here</h3>
                <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">
                    This is a placeholder for your main content area.
                </p>
                <button
                    type="button"
                    class="mt-4 inline-flex items-center gap-2 rounded-lg bg-neutral-900 px-3 py-2 text-sm font-medium text-white shadow-sm transition-all duration-150 hover:bg-neutral-800 active:scale-[0.98] active:bg-neutral-950 dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100 dark:active:bg-neutral-200"
                >
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Get Started
                </button>
            </div>
        </div>
    </main>
</div>

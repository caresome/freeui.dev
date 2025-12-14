---
slug: stacked-layout-with-nav
title: Stacked Layout With Nav
category: app-shells
github: caresome
dependencies: []
publish_at: 2025-12-06 00:00:00
---

<div
    x-data="{
        mobileMenuOpen: false,
        userMenuOpen: false,
        userMenuIndex: -1,
        userMenuItems: null,
        init() {
            this.$watch('userMenuOpen', (open) => {
                if (open) {
                    this.$nextTick(() => {
                        this.userMenuItems = this.$refs.userMenu.querySelectorAll('[role=menuitem]');
                        this.userMenuIndex = -1;
                    });
                }
            });
            this.$watch('mobileMenuOpen', (open) => {
                if (open) {
                    this.$nextTick(() => {
                        this.$refs.mobileSearchInput?.focus();
                    });
                }
            });
        },
        userMenuNext() {
            if (!this.userMenuItems) return;
            this.userMenuIndex = (this.userMenuIndex + 1) % this.userMenuItems.length;
            this.userMenuItems[this.userMenuIndex].focus();
        },
        userMenuPrev() {
            if (!this.userMenuItems) return;
            this.userMenuIndex = (this.userMenuIndex - 1 + this.userMenuItems.length) % this.userMenuItems.length;
            this.userMenuItems[this.userMenuIndex].focus();
        },
        userMenuFirst() {
            if (!this.userMenuItems) return;
            this.userMenuIndex = 0;
            this.userMenuItems[0].focus();
        },
        userMenuLast() {
            if (!this.userMenuItems) return;
            this.userMenuIndex = this.userMenuItems.length - 1;
            this.userMenuItems[this.userMenuIndex].focus();
        }
    }"
    class="min-h-screen bg-neutral-50 dark:bg-neutral-950"
>
    <!-- Skip Navigation Link -->
    <a
        href="#main-content"
        class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-50 focus:rounded-lg focus:bg-neutral-900 focus:px-4 focus:py-2 focus:text-sm focus:font-medium focus:text-white focus:outline-1 focus:outline-offset-2 focus:outline-neutral-500 focus-visible:outline focus-visible:outline-neutral-900 dark:focus:bg-white dark:focus:text-neutral-900 dark:focus-visible:outline-neutral-100"
    >
        Skip to main content
    </a>

    <!-- Header -->
    <header
        class="sticky top-0 z-40 bg-white shadow-sm shadow-neutral-900/5 dark:bg-neutral-900 dark:shadow-neutral-950/50"
        role="banner"
    >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <!-- Logo -->
                <a
                    href="#"
                    class="group flex items-center gap-2 rounded-lg focus-visible:outline focus-visible:outline-1 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
                    aria-label="Caresome - Go to homepage"
                >
                    <div
                        class="flex h-8 w-8 items-center justify-center rounded-lg bg-neutral-900 shadow-sm transition-transform duration-150 group-hover:scale-105 dark:bg-white"
                        aria-hidden="true"
                    >
                        <span class="text-sm font-bold text-white dark:text-neutral-900">C</span>
                    </div>
                    <span class="text-sm font-semibold text-neutral-900 dark:text-neutral-50">Caresome</span>
                </a>

                <!-- Right side: Search + Notifications + User Menu -->
                <div class="hidden md:flex md:items-center md:gap-3">
                    <!-- Search -->
                    <div class="relative">
                        <label for="desktop-search" class="sr-only">Search</label>
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
                            id="desktop-search"
                            placeholder="Search..."
                            class="h-9 w-64 rounded-lg border border-neutral-200 bg-neutral-50 py-2 pr-3 pl-9 text-sm text-neutral-900 placeholder-neutral-400 transition-all duration-150 focus:border-neutral-300 focus:bg-white focus-visible:outline focus-visible:outline-1 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white dark:placeholder-neutral-500 dark:focus:border-neutral-600 dark:focus:bg-neutral-700 dark:focus-visible:outline-neutral-100"
                        />
                    </div>

                    <!-- Notification Button -->
                    <button
                        type="button"
                        class="relative inline-flex h-9 w-9 items-center justify-center rounded-lg text-neutral-500 transition-all duration-150 hover:scale-105 hover:bg-neutral-100 hover:text-neutral-900 focus-visible:outline focus-visible:outline-1 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 active:scale-95 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:outline-neutral-100"
                        aria-label="View notifications, 3 unread"
                    >
                        <svg
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.75"
                            stroke="currentColor"
                            aria-hidden="true"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"
                            />
                        </svg>
                        <!-- Notification Dot -->
                        <span class="absolute top-1.5 right-1.5 flex h-2 w-2" aria-hidden="true">
                            <span
                                class="absolute inline-flex h-full w-full animate-ping rounded-full bg-neutral-500 opacity-75"
                            ></span>
                            <span
                                class="relative inline-flex h-2 w-2 rounded-full bg-neutral-600 dark:bg-neutral-400"
                            ></span>
                        </span>
                    </button>

                    <!-- Separator -->
                    <div class="h-6 w-px bg-neutral-200 dark:bg-neutral-700" role="separator" aria-hidden="true"></div>

                    <!-- User Dropdown -->
                    <div class="relative">
                        <button
                            @click="userMenuOpen = !userMenuOpen"
                            @keydown.arrow-down.prevent="userMenuOpen = true; $nextTick(() => userMenuFirst())"
                            @keydown.arrow-up.prevent="userMenuOpen = true; $nextTick(() => userMenuLast())"
                            @keydown.escape="userMenuOpen = false"
                            type="button"
                            class="flex items-center gap-2 rounded-lg p-1.5 transition-all duration-150 hover:bg-neutral-100 focus-visible:outline focus-visible:outline-1 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 active:scale-[0.98] dark:hover:bg-neutral-800 dark:focus-visible:outline-neutral-100"
                            :aria-expanded="userMenuOpen.toString()"
                            aria-haspopup="menu"
                            aria-controls="user-menu"
                            id="user-menu-button"
                        >
                            <div class="relative">
                                <img
                                    class="h-7 w-7 rounded-full object-cover ring-2 ring-neutral-100 dark:ring-neutral-800"
                                    src="https://github.com/caresome.png"
                                    alt=""
                                />
                                <!-- Online Status -->
                                <span
                                    class="absolute -right-0.5 -bottom-0.5 block h-2.5 w-2.5 rounded-full bg-emerald-500 ring-2 ring-white dark:ring-neutral-900"
                                    aria-hidden="true"
                                ></span>
                            </div>
                            <span class="sr-only">Open user menu for Ankit Thapa (Online)</span>
                            <svg
                                class="h-4 w-4 text-neutral-400 transition-transform duration-200"
                                :class="userMenuOpen && 'rotate-180'"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                                aria-hidden="true"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>

                        <!-- User Dropdown Menu -->
                        <div
                            x-ref="userMenu"
                            x-show="userMenuOpen"
                            x-transition:enter="transition ease-out duration-150"
                            x-transition:enter-start="opacity-0 scale-95"
                            x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-100"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-95"
                            @click.away="userMenuOpen = false"
                            @keydown.escape.window="userMenuOpen = false; $refs.userMenuButton?.focus()"
                            @keydown.arrow-down.prevent="userMenuNext()"
                            @keydown.arrow-up.prevent="userMenuPrev()"
                            @keydown.home.prevent="userMenuFirst()"
                            @keydown.end.prevent="userMenuLast()"
                            @keydown.tab="userMenuOpen = false"
                            class="absolute right-0 z-50 mt-2 w-60 origin-top-right rounded-xl border border-neutral-200 bg-white p-1.5 shadow-xl shadow-neutral-900/10 dark:border-neutral-800 dark:bg-neutral-900 dark:shadow-neutral-950/50"
                            role="menu"
                            aria-orientation="vertical"
                            aria-labelledby="user-menu-button"
                            id="user-menu"
                            x-cloak
                        >
                            <!-- User Info -->
                            <div
                                class="mb-1.5 rounded-lg bg-neutral-50 px-3 py-2.5 dark:bg-neutral-800"
                                role="presentation"
                            >
                                <p class="text-sm font-medium text-neutral-900 dark:text-neutral-50">Ankit Thapa</p>
                                <p class="text-xs text-neutral-500 dark:text-neutral-400">caresome@proton.me</p>
                            </div>

                            <!-- Menu Items -->
                            <a
                                href="#"
                                class="flex items-center gap-2.5 rounded-lg px-3 py-2 text-sm text-neutral-700 transition-colors duration-150 hover:bg-neutral-100 focus:bg-neutral-100 focus-visible:outline focus-visible:outline-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800 dark:focus-visible:outline-neutral-100"
                                role="menuitem"
                                tabindex="-1"
                            >
                                <svg
                                    class="h-4 w-4 text-neutral-500 dark:text-neutral-400"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.75"
                                    stroke="currentColor"
                                    aria-hidden="true"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"
                                    />
                                </svg>
                                Your Profile
                            </a>
                            <a
                                href="#"
                                class="flex items-center gap-2.5 rounded-lg px-3 py-2 text-sm text-neutral-700 transition-colors duration-150 hover:bg-neutral-100 focus:bg-neutral-100 focus-visible:outline focus-visible:outline-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800 dark:focus-visible:outline-neutral-100"
                                role="menuitem"
                                tabindex="-1"
                            >
                                <svg
                                    class="h-4 w-4 text-neutral-500 dark:text-neutral-400"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.75"
                                    stroke="currentColor"
                                    aria-hidden="true"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z"
                                    />
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                                    />
                                </svg>
                                Settings
                            </a>

                            <!-- Divider -->
                            <div class="my-1.5 h-px bg-neutral-200 dark:bg-neutral-700" role="separator"></div>

                            <!-- Sign Out -->
                            <a
                                href="#"
                                class="flex items-center gap-2.5 rounded-lg px-3 py-2 text-sm text-neutral-700 transition-colors duration-150 hover:bg-neutral-100 focus:bg-neutral-100 focus-visible:outline focus-visible:outline-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800 dark:focus-visible:outline-neutral-100"
                                role="menuitem"
                                tabindex="-1"
                            >
                                <svg
                                    class="h-4 w-4 text-neutral-500 dark:text-neutral-400"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.75"
                                    stroke="currentColor"
                                    aria-hidden="true"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15"
                                    />
                                </svg>
                                Sign out
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="flex md:hidden">
                    <button
                        @click="mobileMenuOpen = !mobileMenuOpen"
                        type="button"
                        class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-neutral-500 transition-all duration-150 hover:scale-105 hover:bg-neutral-100 hover:text-neutral-900 focus-visible:outline focus-visible:outline-1 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 active:scale-95 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:outline-neutral-100"
                        :aria-expanded="mobileMenuOpen.toString()"
                        aria-haspopup="menu"
                        aria-controls="mobile-menu"
                    >
                        <span class="sr-only" x-text="mobileMenuOpen ? 'Close main menu' : 'Open main menu'">
                            Open main menu
                        </span>
                        <svg
                            x-show="!mobileMenuOpen"
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
                            aria-hidden="true"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Desktop Navigation -->
        <nav
            class="hidden border-t border-neutral-100 bg-neutral-50/50 md:block dark:border-neutral-700/50 dark:bg-neutral-900/30"
            aria-label="Primary navigation"
        >
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-12 items-center gap-1" role="menubar" aria-label="Main menu">
                    <a
                        href="#"
                        class="rounded-lg bg-neutral-100 px-3 py-1.5 text-sm font-medium text-neutral-900 focus-visible:outline focus-visible:outline-1 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:bg-neutral-800 dark:text-neutral-50 dark:focus-visible:outline-neutral-100"
                        role="menuitem"
                        aria-current="page"
                    >
                        Dashboard
                    </a>
                    <a
                        href="#"
                        class="rounded-lg px-3 py-1.5 text-sm font-medium text-neutral-600 transition-all duration-150 hover:bg-neutral-100 hover:text-neutral-900 focus-visible:outline focus-visible:outline-1 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 active:scale-[0.98] dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:outline-neutral-100"
                        role="menuitem"
                    >
                        Team
                    </a>
                    <a
                        href="#"
                        class="rounded-lg px-3 py-1.5 text-sm font-medium text-neutral-600 transition-all duration-150 hover:bg-neutral-100 hover:text-neutral-900 focus-visible:outline focus-visible:outline-1 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 active:scale-[0.98] dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:outline-neutral-100"
                        role="menuitem"
                    >
                        Projects
                    </a>
                    <a
                        href="#"
                        class="rounded-lg px-3 py-1.5 text-sm font-medium text-neutral-600 transition-all duration-150 hover:bg-neutral-100 hover:text-neutral-900 focus-visible:outline focus-visible:outline-1 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 active:scale-[0.98] dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:outline-neutral-100"
                        role="menuitem"
                    >
                        Calendar
                    </a>
                    <a
                        href="#"
                        class="rounded-lg px-3 py-1.5 text-sm font-medium text-neutral-600 transition-all duration-150 hover:bg-neutral-100 hover:text-neutral-900 focus-visible:outline focus-visible:outline-1 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 active:scale-[0.98] dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:outline-neutral-100"
                        role="menuitem"
                    >
                        Reports
                    </a>
                </div>
            </div>
        </nav>

        <!-- Mobile Menu -->
        <div
            x-show="mobileMenuOpen"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            @keydown.escape.window="mobileMenuOpen = false"
            class="border-t border-neutral-100 bg-white md:hidden dark:border-neutral-700/50 dark:bg-neutral-900"
            id="mobile-menu"
            role="navigation"
            aria-label="Mobile navigation"
            x-cloak
        >
            <!-- Mobile Search -->
            <div class="px-4 py-3">
                <div class="relative">
                    <label for="mobile-search" class="sr-only">Search</label>
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
                        id="mobile-search"
                        x-ref="mobileSearchInput"
                        placeholder="Search..."
                        class="h-10 w-full rounded-lg border border-neutral-200 bg-neutral-50 py-2 pr-3 pl-9 text-sm text-neutral-900 placeholder-neutral-400 transition-all duration-150 focus:border-neutral-300 focus:bg-white focus-visible:outline focus-visible:outline-1 focus-visible:outline-neutral-900 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white dark:placeholder-neutral-500 dark:focus:border-neutral-600 dark:focus:bg-neutral-700 dark:focus-visible:outline-neutral-100"
                    />
                </div>
            </div>

            <!-- Mobile Nav Links -->
            <div class="space-y-1 px-4 pb-3" role="menu">
                <a
                    href="#"
                    class="block rounded-lg bg-neutral-100 px-3 py-2.5 text-sm font-medium text-neutral-900 focus-visible:outline focus-visible:outline-1 focus-visible:outline-neutral-900 dark:bg-neutral-800 dark:text-neutral-50 dark:focus-visible:outline-neutral-100"
                    role="menuitem"
                    aria-current="page"
                >
                    Dashboard
                </a>
                <a
                    href="#"
                    class="block rounded-lg px-3 py-2.5 text-sm font-medium text-neutral-600 transition-all duration-150 hover:bg-neutral-100 hover:text-neutral-900 focus-visible:outline focus-visible:outline-1 focus-visible:outline-neutral-900 active:scale-[0.98] dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:outline-neutral-100"
                    role="menuitem"
                >
                    Team
                </a>
                <a
                    href="#"
                    class="block rounded-lg px-3 py-2.5 text-sm font-medium text-neutral-600 transition-all duration-150 hover:bg-neutral-100 hover:text-neutral-900 focus-visible:outline focus-visible:outline-1 focus-visible:outline-neutral-900 active:scale-[0.98] dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:outline-neutral-100"
                    role="menuitem"
                >
                    Projects
                </a>
                <a
                    href="#"
                    class="block rounded-lg px-3 py-2.5 text-sm font-medium text-neutral-600 transition-all duration-150 hover:bg-neutral-100 hover:text-neutral-900 focus-visible:outline focus-visible:outline-1 focus-visible:outline-neutral-900 active:scale-[0.98] dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:outline-neutral-100"
                    role="menuitem"
                >
                    Calendar
                </a>
                <a
                    href="#"
                    class="block rounded-lg px-3 py-2.5 text-sm font-medium text-neutral-600 transition-all duration-150 hover:bg-neutral-100 hover:text-neutral-900 focus-visible:outline focus-visible:outline-1 focus-visible:outline-neutral-900 active:scale-[0.98] dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:outline-neutral-100"
                    role="menuitem"
                >
                    Reports
                </a>
            </div>

            <!-- Mobile User Section -->
            <div class="border-t border-neutral-100 px-4 py-4 dark:border-neutral-800">
                <div class="flex items-center gap-3">
                    <div class="relative">
                        <img
                            class="h-10 w-10 rounded-full object-cover ring-2 ring-neutral-100 dark:ring-neutral-800"
                            src="https://github.com/caresome.png"
                            alt="Ankit Thapa's avatar"
                        />
                        <span
                            class="absolute -right-0.5 -bottom-0.5 block h-3 w-3 rounded-full bg-emerald-500 ring-2 ring-white dark:ring-neutral-900"
                            aria-hidden="true"
                        ></span>
                        <span class="sr-only">Online</span>
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="truncate text-sm font-medium text-neutral-900 dark:text-neutral-50">Ankit Thapa</p>
                        <p class="truncate text-xs text-neutral-500 dark:text-neutral-400">caresome@proton.me</p>
                    </div>
                    <button
                        type="button"
                        class="relative inline-flex h-9 w-9 items-center justify-center rounded-lg text-neutral-500 transition-all duration-150 hover:scale-105 hover:bg-neutral-100 hover:text-neutral-900 focus-visible:outline focus-visible:outline-1 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 active:scale-95 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:outline-neutral-100"
                        aria-label="View notifications, 3 unread"
                    >
                        <svg
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.75"
                            stroke="currentColor"
                            aria-hidden="true"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"
                            />
                        </svg>
                        <span class="absolute top-1.5 right-1.5 flex h-2 w-2" aria-hidden="true">
                            <span
                                class="absolute inline-flex h-full w-full animate-ping rounded-full bg-neutral-500 opacity-75"
                            ></span>
                            <span
                                class="relative inline-flex h-2 w-2 rounded-full bg-neutral-600 dark:bg-neutral-400"
                            ></span>
                        </span>
                    </button>
                </div>
                <nav class="mt-3 space-y-1" aria-label="User menu">
                    <a
                        href="#"
                        class="flex items-center gap-2.5 rounded-lg px-3 py-2 text-sm text-neutral-600 transition-colors duration-150 hover:bg-neutral-100 hover:text-neutral-900 focus-visible:outline focus-visible:outline-1 focus-visible:outline-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:outline-neutral-100"
                    >
                        <svg
                            class="h-4 w-4"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.75"
                            stroke="currentColor"
                            aria-hidden="true"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"
                            />
                        </svg>
                        Your Profile
                    </a>
                    <a
                        href="#"
                        class="flex items-center gap-2.5 rounded-lg px-3 py-2 text-sm text-neutral-600 transition-colors duration-150 hover:bg-neutral-100 hover:text-neutral-900 focus-visible:outline focus-visible:outline-1 focus-visible:outline-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:outline-neutral-100"
                    >
                        <svg
                            class="h-4 w-4"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.75"
                            stroke="currentColor"
                            aria-hidden="true"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z"
                            />
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                            />
                        </svg>
                        Settings
                    </a>
                    <a
                        href="#"
                        class="flex items-center gap-2.5 rounded-lg px-3 py-2 text-sm text-neutral-600 transition-colors duration-150 hover:bg-neutral-100 hover:text-neutral-900 focus-visible:outline focus-visible:outline-1 focus-visible:outline-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:outline-neutral-100"
                    >
                        <svg
                            class="h-4 w-4"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.75"
                            stroke="currentColor"
                            aria-hidden="true"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15"
                            />
                        </svg>
                        Sign out
                    </a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Page Header -->
    <header class="bg-neutral-50 dark:bg-neutral-950">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h1 class="text-xl font-semibold text-neutral-900 dark:text-neutral-50">Dashboard</h1>
                    <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">
                        Welcome back, here's what's happening with your projects.
                    </p>
                </div>
                <div class="flex items-center gap-3" role="group" aria-label="Page actions">
                    <button
                        type="button"
                        class="inline-flex items-center gap-2 rounded-lg border border-neutral-200 bg-white px-3.5 py-2 text-sm font-medium text-neutral-700 shadow-sm transition-all duration-150 hover:bg-neutral-50 focus-visible:outline focus-visible:outline-1 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 active:scale-[0.98] dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus-visible:outline-neutral-100"
                    >
                        <svg
                            class="h-4 w-4"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.75"
                            stroke="currentColor"
                            aria-hidden="true"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z"
                            />
                        </svg>
                        Filter
                    </button>
                    <button
                        type="button"
                        class="inline-flex items-center gap-2 rounded-lg bg-neutral-900 px-3.5 py-2 text-sm font-medium text-white shadow-sm transition-all duration-150 hover:bg-neutral-800 focus-visible:outline focus-visible:outline-1 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 active:scale-[0.98] dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100 dark:focus-visible:outline-neutral-100"
                    >
                        <svg
                            class="h-4 w-4"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            aria-hidden="true"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        New Project
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main id="main-content" class="py-8" tabindex="-1">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <!-- Content Card -->
            <article
                class="rounded-2xl border border-neutral-100 bg-white p-12 text-center shadow-sm shadow-neutral-900/5 dark:border-neutral-800 dark:bg-neutral-900 dark:shadow-neutral-950/50"
            >
                <div
                    class="mx-auto flex h-14 w-14 items-center justify-center rounded-xl bg-neutral-100 dark:bg-neutral-800"
                    aria-hidden="true"
                >
                    <svg
                        class="h-7 w-7 text-neutral-500 dark:text-neutral-400"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z"
                        />
                    </svg>
                </div>
                <h2 class="mt-5 text-base font-semibold text-neutral-900 dark:text-neutral-50">
                    Your content goes here
                </h2>
                <p class="mx-auto mt-2 max-w-sm text-sm text-neutral-500 dark:text-neutral-400">
                    This is a placeholder for your main content area. Start building something amazing.
                </p>
                <button
                    type="button"
                    class="mt-6 inline-flex items-center gap-2 rounded-lg bg-neutral-900 px-4 py-2.5 text-sm font-medium text-white shadow-sm transition-all duration-150 hover:bg-neutral-800 focus-visible:outline focus-visible:outline-1 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 active:scale-[0.98] dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100 dark:focus-visible:outline-neutral-100"
                >
                    <svg
                        class="h-4 w-4"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                        aria-hidden="true"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Get Started
                </button>
            </article>
        </div>
    </main>
</div>

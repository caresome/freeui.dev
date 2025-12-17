---
slug: navigation-menu-with-mega-menu
title: Navigation Menu with Mega Menu
category: navigation
github: caresome
dependencies: ['@alpinejs/collapse']
publish_at: 2025-12-15 12:00:00
---

<div data-preview-only class="min-h-[500px] p-4">
    <nav
        x-data="{ mobileMenuOpen: false }"
        class="rounded-xl border border-neutral-200 bg-white shadow-sm dark:border-neutral-800 dark:bg-neutral-900"
        aria-label="Main navigation"
    >
        <div class="flex items-center justify-between px-4 py-3 md:px-6 md:py-4">
            <!-- Logo -->
            <div class="flex items-center gap-3">
                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-neutral-900 dark:bg-white">
                    <span class="text-sm font-bold text-white dark:text-neutral-900">M</span>
                </div>
                <span class="text-sm font-semibold text-neutral-900 dark:text-neutral-50">MegaNav</span>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex md:items-center md:gap-1">
                <a
                    href="#"
                    class="rounded-lg px-3 py-2 text-sm font-medium text-neutral-900 transition-colors hover:bg-neutral-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:text-neutral-50 dark:hover:bg-neutral-800 dark:focus-visible:outline-neutral-100"
                    aria-current="page"
                >
                    Home
                </a>

                <!-- Products Mega Menu -->
                <div
                    x-data="{ open: false }"
                    class="relative"
                    @mouseleave="open = false"
                    @keydown.escape="open = false"
                >
                    <button
                        @mouseenter="open = true"
                        @focus="open = true"
                        @click="open = !open"
                        type="button"
                        class="inline-flex items-center gap-1 rounded-lg px-3 py-2 text-sm font-medium text-neutral-600 transition-colors hover:bg-neutral-100 hover:text-neutral-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:outline-neutral-100"
                        :aria-expanded="open"
                        aria-haspopup="menu"
                    >
                        Products
                        <svg
                            class="h-4 w-4 transition-transform duration-150"
                            :class="open ? 'rotate-180' : ''"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            aria-hidden="true"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>

                    <!-- Mega Menu Wrapper -->
                    <div
                        x-show="open"
                        @mouseenter="open = true"
                        @focusin="open = true"
                        class="absolute left-1/2 z-10 -translate-x-1/2 pt-2"
                        x-cloak
                    >
                        <div
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="opacity-0 -translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 -translate-y-1"
                            class="w-[600px] rounded-xl border border-neutral-200 bg-white p-6 shadow-lg dark:border-neutral-700 dark:bg-neutral-800"
                            role="menu"
                        >
                            <div class="grid grid-cols-3 gap-6">
                                <!-- Column 1: Analytics -->
                                <div>
                                    <h4 class="text-xs font-semibold tracking-wider text-neutral-400 uppercase">
                                        Analytics
                                    </h4>
                                    <ul class="mt-3 space-y-1">
                                        <li>
                                            <a
                                                href="#"
                                                class="group flex items-start gap-3 rounded-lg p-2 transition-colors hover:bg-neutral-100 focus-visible:bg-neutral-100 focus-visible:outline-none dark:hover:bg-neutral-700 dark:focus-visible:bg-neutral-700"
                                                role="menuitem"
                                            >
                                                <div
                                                    class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-blue-600 dark:bg-blue-500/20 dark:text-blue-400"
                                                >
                                                    <svg
                                                        class="h-4 w-4"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke-width="2"
                                                        stroke="currentColor"
                                                        aria-hidden="true"
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z"
                                                        />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <p
                                                        class="text-sm font-medium text-neutral-900 dark:text-neutral-50"
                                                    >
                                                        Dashboard
                                                    </p>
                                                    <p class="text-xs text-neutral-500">Real-time metrics</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                href="#"
                                                class="group flex items-start gap-3 rounded-lg p-2 transition-colors hover:bg-neutral-100 focus-visible:bg-neutral-100 focus-visible:outline-none dark:hover:bg-neutral-700 dark:focus-visible:bg-neutral-700"
                                                role="menuitem"
                                            >
                                                <div
                                                    class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-green-100 text-green-600 dark:bg-green-500/20 dark:text-green-400"
                                                >
                                                    <svg
                                                        class="h-4 w-4"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke-width="2"
                                                        stroke="currentColor"
                                                        aria-hidden="true"
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941"
                                                        />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <p
                                                        class="text-sm font-medium text-neutral-900 dark:text-neutral-50"
                                                    >
                                                        Reports
                                                    </p>
                                                    <p class="text-xs text-neutral-500">Custom reports</p>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Column 2: Platform -->
                                <div>
                                    <h4 class="text-xs font-semibold tracking-wider text-neutral-400 uppercase">
                                        Platform
                                    </h4>
                                    <ul class="mt-3 space-y-1">
                                        <li>
                                            <a
                                                href="#"
                                                class="group flex items-start gap-3 rounded-lg p-2 transition-colors hover:bg-neutral-100 focus-visible:bg-neutral-100 focus-visible:outline-none dark:hover:bg-neutral-700 dark:focus-visible:bg-neutral-700"
                                                role="menuitem"
                                            >
                                                <div
                                                    class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-purple-100 text-purple-600 dark:bg-purple-500/20 dark:text-purple-400"
                                                >
                                                    <svg
                                                        class="h-4 w-4"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke-width="2"
                                                        stroke="currentColor"
                                                        aria-hidden="true"
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            d="M14.25 6.087c0-.355.186-.676.401-.959.221-.29.349-.634.349-1.003 0-1.036-1.007-1.875-2.25-1.875s-2.25.84-2.25 1.875c0 .369.128.713.349 1.003.215.283.401.604.401.959v0a.64.64 0 0 1-.657.643 48.39 48.39 0 0 1-4.163-.3c.186 1.613.293 3.25.315 4.907a.656.656 0 0 1-.658.663v0c-.355 0-.676-.186-.959-.401a1.647 1.647 0 0 0-1.003-.349c-1.036 0-1.875 1.007-1.875 2.25s.84 2.25 1.875 2.25c.369 0 .713-.128 1.003-.349.283-.215.604-.401.959-.401v0c.31 0 .555.26.532.57a48.039 48.039 0 0 1-.642 5.056c1.518.19 3.058.309 4.616.354a.64.64 0 0 0 .657-.643v0c0-.355-.186-.676-.401-.959a1.647 1.647 0 0 1-.349-1.003c0-1.035 1.008-1.875 2.25-1.875 1.243 0 2.25.84 2.25 1.875 0 .369-.128.713-.349 1.003-.215.283-.4.604-.4.959v0c0 .333.277.599.61.58a48.1 48.1 0 0 0 5.427-.63 48.05 48.05 0 0 0 .582-4.717.532.532 0 0 0-.533-.57v0c-.355 0-.676.186-.959.401-.29.221-.634.349-1.003.349-1.035 0-1.875-1.007-1.875-2.25s.84-2.25 1.875-2.25c.37 0 .713.128 1.003.349.283.215.604.401.96.401v0a.656.656 0 0 0 .658-.663 48.422 48.422 0 0 0-.37-5.36c-1.886.342-3.81.574-5.766.689a.578.578 0 0 1-.61-.58v0Z"
                                                        />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <p
                                                        class="text-sm font-medium text-neutral-900 dark:text-neutral-50"
                                                    >
                                                        Integrations
                                                    </p>
                                                    <p class="text-xs text-neutral-500">Connect your tools</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                href="#"
                                                class="group flex items-start gap-3 rounded-lg p-2 transition-colors hover:bg-neutral-100 focus-visible:bg-neutral-100 focus-visible:outline-none dark:hover:bg-neutral-700 dark:focus-visible:bg-neutral-700"
                                                role="menuitem"
                                            >
                                                <div
                                                    class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-amber-100 text-amber-600 dark:bg-amber-500/20 dark:text-amber-400"
                                                >
                                                    <svg
                                                        class="h-4 w-4"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke-width="2"
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
                                                </div>
                                                <div>
                                                    <p
                                                        class="text-sm font-medium text-neutral-900 dark:text-neutral-50"
                                                    >
                                                        Settings
                                                    </p>
                                                    <p class="text-xs text-neutral-500">Configure platform</p>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Column 3: Security -->
                                <div>
                                    <h4 class="text-xs font-semibold tracking-wider text-neutral-400 uppercase">
                                        Security
                                    </h4>
                                    <ul class="mt-3 space-y-1">
                                        <li>
                                            <a
                                                href="#"
                                                class="group flex items-start gap-3 rounded-lg p-2 transition-colors hover:bg-neutral-100 focus-visible:bg-neutral-100 focus-visible:outline-none dark:hover:bg-neutral-700 dark:focus-visible:bg-neutral-700"
                                                role="menuitem"
                                            >
                                                <div
                                                    class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-red-100 text-red-600 dark:bg-red-500/20 dark:text-red-400"
                                                >
                                                    <svg
                                                        class="h-4 w-4"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke-width="2"
                                                        stroke="currentColor"
                                                        aria-hidden="true"
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"
                                                        />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <p
                                                        class="text-sm font-medium text-neutral-900 dark:text-neutral-50"
                                                    >
                                                        Protection
                                                    </p>
                                                    <p class="text-xs text-neutral-500">Advanced security</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                href="#"
                                                class="group flex items-start gap-3 rounded-lg p-2 transition-colors hover:bg-neutral-100 focus-visible:bg-neutral-100 focus-visible:outline-none dark:hover:bg-neutral-700 dark:focus-visible:bg-neutral-700"
                                                role="menuitem"
                                            >
                                                <div
                                                    class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-cyan-100 text-cyan-600 dark:bg-cyan-500/20 dark:text-cyan-400"
                                                >
                                                    <svg
                                                        class="h-4 w-4"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke-width="2"
                                                        stroke="currentColor"
                                                        aria-hidden="true"
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z"
                                                        />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <p
                                                        class="text-sm font-medium text-neutral-900 dark:text-neutral-50"
                                                    >
                                                        Access Control
                                                    </p>
                                                    <p class="text-xs text-neutral-500">Manage permissions</p>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Footer CTA -->
                            <div class="mt-6 rounded-lg bg-neutral-100 p-4 dark:bg-neutral-700">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-neutral-900 dark:text-neutral-50">
                                            Ready to get started?
                                        </p>
                                        <p class="text-xs text-neutral-500 dark:text-neutral-400">
                                            Start your free 14-day trial today.
                                        </p>
                                    </div>
                                    <a
                                        href="#"
                                        class="rounded-lg bg-neutral-900 px-4 py-2 text-sm font-medium text-white transition-all hover:bg-neutral-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 active:scale-[0.98] dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100 dark:focus-visible:outline-neutral-100"
                                    >
                                        Start free trial
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Resources Dropdown -->
                <div
                    x-data="{ open: false }"
                    class="relative"
                    @mouseleave="open = false"
                    @keydown.escape="open = false"
                >
                    <button
                        @mouseenter="open = true"
                        @focus="open = true"
                        @click="open = !open"
                        type="button"
                        class="inline-flex items-center gap-1 rounded-lg px-3 py-2 text-sm font-medium text-neutral-600 transition-colors hover:bg-neutral-100 hover:text-neutral-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:outline-neutral-100"
                        :aria-expanded="open"
                        aria-haspopup="menu"
                    >
                        Resources
                        <svg
                            class="h-4 w-4 transition-transform duration-150"
                            :class="open ? 'rotate-180' : ''"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            aria-hidden="true"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>

                    <!-- Dropdown wrapper -->
                    <div
                        x-show="open"
                        @mouseenter="open = true"
                        @focusin="open = true"
                        class="absolute left-0 z-10 pt-2"
                        x-cloak
                    >
                        <div
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="opacity-0 -translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 -translate-y-1"
                            class="w-56 rounded-xl border border-neutral-200 bg-white py-2 shadow-lg dark:border-neutral-700 dark:bg-neutral-800"
                            role="menu"
                        >
                            <a
                                href="#"
                                class="flex items-center gap-3 px-4 py-2 text-sm text-neutral-700 transition-colors hover:bg-neutral-100 focus-visible:bg-neutral-100 focus-visible:outline-none dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus-visible:bg-neutral-700"
                                role="menuitem"
                            >
                                <svg
                                    class="h-4 w-4 text-neutral-500 dark:text-neutral-400"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="2"
                                    stroke="currentColor"
                                    aria-hidden="true"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25"
                                    />
                                </svg>
                                Documentation
                            </a>
                            <a
                                href="#"
                                class="flex items-center gap-3 px-4 py-2 text-sm text-neutral-700 transition-colors hover:bg-neutral-100 focus-visible:bg-neutral-100 focus-visible:outline-none dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus-visible:bg-neutral-700"
                                role="menuitem"
                            >
                                <svg
                                    class="h-4 w-4 text-neutral-500 dark:text-neutral-400"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="2"
                                    stroke="currentColor"
                                    aria-hidden="true"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5"
                                    />
                                </svg>
                                API Reference
                            </a>
                            <a
                                href="#"
                                class="flex items-center gap-3 px-4 py-2 text-sm text-neutral-700 transition-colors hover:bg-neutral-100 focus-visible:bg-neutral-100 focus-visible:outline-none dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus-visible:bg-neutral-700"
                                role="menuitem"
                            >
                                <svg
                                    class="h-4 w-4 text-neutral-500 dark:text-neutral-400"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="2"
                                    stroke="currentColor"
                                    aria-hidden="true"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="m15.75 10.5 4.72-4.72a.75.75 0 0 1 1.28.53v11.38a.75.75 0 0 1-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25h-9A2.25 2.25 0 0 0 2.25 7.5v9a2.25 2.25 0 0 0 2.25 2.25Z"
                                    />
                                </svg>
                                Video Tutorials
                            </a>
                            <div
                                class="my-2 border-t border-neutral-200 dark:border-neutral-700"
                                role="separator"
                            ></div>
                            <a
                                href="#"
                                class="flex items-center gap-3 px-4 py-2 text-sm text-neutral-700 transition-colors hover:bg-neutral-100 focus-visible:bg-neutral-100 focus-visible:outline-none dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus-visible:bg-neutral-700"
                                role="menuitem"
                            >
                                <svg
                                    class="h-4 w-4 text-neutral-500 dark:text-neutral-400"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="2"
                                    stroke="currentColor"
                                    aria-hidden="true"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"
                                    />
                                </svg>
                                Community
                            </a>
                        </div>
                    </div>
                </div>

                <a
                    href="#"
                    class="rounded-lg px-3 py-2 text-sm font-medium text-neutral-600 transition-colors hover:bg-neutral-100 hover:text-neutral-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:outline-neutral-100"
                >
                    Pricing
                </a>
            </div>

            <!-- Desktop CTA -->
            <div class="hidden md:flex md:items-center md:gap-3">
                <a
                    href="#"
                    class="rounded-lg px-4 py-2 text-sm font-medium text-neutral-600 transition-colors hover:text-neutral-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:text-neutral-400 dark:hover:text-neutral-50 dark:focus-visible:outline-neutral-100"
                >
                    Sign in
                </a>
                <a
                    href="#"
                    class="rounded-lg bg-neutral-900 px-4 py-2 text-sm font-medium text-white transition-all hover:bg-neutral-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 active:scale-[0.98] dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100 dark:focus-visible:outline-neutral-100"
                >
                    Get Started
                </a>
            </div>

            <!-- Mobile Hamburger Button -->
            <button
                @click="mobileMenuOpen = !mobileMenuOpen"
                type="button"
                class="flex h-10 w-10 items-center justify-center rounded-lg text-neutral-600 transition-colors hover:bg-neutral-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 md:hidden dark:text-neutral-400 dark:hover:bg-neutral-800 dark:focus-visible:outline-neutral-100"
                :aria-expanded="mobileMenuOpen"
                aria-controls="mobile-menu"
                aria-label="Toggle navigation menu"
            >
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

        <!-- Mobile Menu Panel -->
        <div
            x-show="mobileMenuOpen"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            @keydown.escape.window="mobileMenuOpen = false"
            id="mobile-menu"
            class="border-t border-neutral-200 md:hidden dark:border-neutral-700"
            x-cloak
        >
            <div class="space-y-1 px-4 py-4">
                <!-- Home -->
                <a
                    href="#"
                    class="block rounded-lg px-3 py-2 text-sm font-medium text-neutral-900 transition-colors hover:bg-neutral-100 dark:text-neutral-50 dark:hover:bg-neutral-800"
                    aria-current="page"
                >
                    Home
                </a>

                <!-- Products Accordion -->
                <div x-data="{ open: false }">
                    <button
                        @click="open = !open"
                        type="button"
                        class="flex w-full items-center justify-between rounded-lg px-3 py-2 text-sm font-medium text-neutral-600 transition-colors hover:bg-neutral-100 hover:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50"
                        :aria-expanded="open"
                    >
                        Products
                        <svg
                            class="h-4 w-4 transition-transform duration-200"
                            :class="open ? 'rotate-180' : ''"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            aria-hidden="true"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                    <div x-show="open" x-collapse class="mt-1 space-y-4 px-3 py-3">
                        <!-- Analytics Section -->
                        <div>
                            <h4 class="text-xs font-semibold tracking-wider text-neutral-400 uppercase">Analytics</h4>
                            <div class="mt-2 space-y-1">
                                <a
                                    href="#"
                                    class="flex items-center gap-3 rounded-lg p-2 transition-colors hover:bg-neutral-100 dark:hover:bg-neutral-700"
                                >
                                    <div
                                        class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-blue-600 dark:bg-blue-500/20 dark:text-blue-400"
                                    >
                                        <svg
                                            class="h-4 w-4"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="2"
                                            stroke="currentColor"
                                            aria-hidden="true"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z"
                                            />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-neutral-900 dark:text-neutral-50">
                                            Dashboard
                                        </p>
                                        <p class="text-xs text-neutral-500">Real-time metrics</p>
                                    </div>
                                </a>
                                <a
                                    href="#"
                                    class="flex items-center gap-3 rounded-lg p-2 transition-colors hover:bg-neutral-100 dark:hover:bg-neutral-700"
                                >
                                    <div
                                        class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-green-100 text-green-600 dark:bg-green-500/20 dark:text-green-400"
                                    >
                                        <svg
                                            class="h-4 w-4"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="2"
                                            stroke="currentColor"
                                            aria-hidden="true"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941"
                                            />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-neutral-900 dark:text-neutral-50">Reports</p>
                                        <p class="text-xs text-neutral-500">Custom reports</p>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- Platform Section -->
                        <div>
                            <h4 class="text-xs font-semibold tracking-wider text-neutral-400 uppercase">Platform</h4>
                            <div class="mt-2 space-y-1">
                                <a
                                    href="#"
                                    class="flex items-center gap-3 rounded-lg p-2 transition-colors hover:bg-neutral-100 dark:hover:bg-neutral-700"
                                >
                                    <div
                                        class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-purple-100 text-purple-600 dark:bg-purple-500/20 dark:text-purple-400"
                                    >
                                        <svg
                                            class="h-4 w-4"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="2"
                                            stroke="currentColor"
                                            aria-hidden="true"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M14.25 6.087c0-.355.186-.676.401-.959.221-.29.349-.634.349-1.003 0-1.036-1.007-1.875-2.25-1.875s-2.25.84-2.25 1.875c0 .369.128.713.349 1.003.215.283.401.604.401.959v0a.64.64 0 0 1-.657.643 48.39 48.39 0 0 1-4.163-.3c.186 1.613.293 3.25.315 4.907a.656.656 0 0 1-.658.663v0c-.355 0-.676-.186-.959-.401a1.647 1.647 0 0 0-1.003-.349c-1.036 0-1.875 1.007-1.875 2.25s.84 2.25 1.875 2.25c.369 0 .713-.128 1.003-.349.283-.215.604-.401.959-.401v0c.31 0 .555.26.532.57a48.039 48.039 0 0 1-.642 5.056c1.518.19 3.058.309 4.616.354a.64.64 0 0 0 .657-.643v0c0-.355-.186-.676-.401-.959a1.647 1.647 0 0 1-.349-1.003c0-1.035 1.008-1.875 2.25-1.875 1.243 0 2.25.84 2.25 1.875 0 .369-.128.713-.349 1.003-.215.283-.4.604-.4.959v0c0 .333.277.599.61.58a48.1 48.1 0 0 0 5.427-.63 48.05 48.05 0 0 0 .582-4.717.532.532 0 0 0-.533-.57v0c-.355 0-.676.186-.959.401-.29.221-.634.349-1.003.349-1.035 0-1.875-1.007-1.875-2.25s.84-2.25 1.875-2.25c.37 0 .713.128 1.003.349.283.215.604.401.96.401v0a.656.656 0 0 0 .658-.663 48.422 48.422 0 0 0-.37-5.36c-1.886.342-3.81.574-5.766.689a.578.578 0 0 1-.61-.58v0Z"
                                            />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-neutral-900 dark:text-neutral-50">
                                            Integrations
                                        </p>
                                        <p class="text-xs text-neutral-500">Connect your tools</p>
                                    </div>
                                </a>
                                <a
                                    href="#"
                                    class="flex items-center gap-3 rounded-lg p-2 transition-colors hover:bg-neutral-100 dark:hover:bg-neutral-700"
                                >
                                    <div
                                        class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-amber-100 text-amber-600 dark:bg-amber-500/20 dark:text-amber-400"
                                    >
                                        <svg
                                            class="h-4 w-4"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="2"
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
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-neutral-900 dark:text-neutral-50">
                                            Settings
                                        </p>
                                        <p class="text-xs text-neutral-500">Configure platform</p>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- Security Section -->
                        <div>
                            <h4 class="text-xs font-semibold tracking-wider text-neutral-400 uppercase">Security</h4>
                            <div class="mt-2 space-y-1">
                                <a
                                    href="#"
                                    class="flex items-center gap-3 rounded-lg p-2 transition-colors hover:bg-neutral-100 dark:hover:bg-neutral-700"
                                >
                                    <div
                                        class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-red-100 text-red-600 dark:bg-red-500/20 dark:text-red-400"
                                    >
                                        <svg
                                            class="h-4 w-4"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="2"
                                            stroke="currentColor"
                                            aria-hidden="true"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"
                                            />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-neutral-900 dark:text-neutral-50">
                                            Protection
                                        </p>
                                        <p class="text-xs text-neutral-500">Advanced security</p>
                                    </div>
                                </a>
                                <a
                                    href="#"
                                    class="flex items-center gap-3 rounded-lg p-2 transition-colors hover:bg-neutral-100 dark:hover:bg-neutral-700"
                                >
                                    <div
                                        class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-cyan-100 text-cyan-600 dark:bg-cyan-500/20 dark:text-cyan-400"
                                    >
                                        <svg
                                            class="h-4 w-4"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="2"
                                            stroke="currentColor"
                                            aria-hidden="true"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z"
                                            />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-neutral-900 dark:text-neutral-50">
                                            Access Control
                                        </p>
                                        <p class="text-xs text-neutral-500">Manage permissions</p>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- CTA in Products -->
                        <div class="rounded-lg bg-neutral-100 p-4 dark:bg-neutral-700">
                            <p class="text-sm font-medium text-neutral-900 dark:text-neutral-50">
                                Ready to get started?
                            </p>
                            <p class="text-xs text-neutral-500 dark:text-neutral-400">
                                Start your free 14-day trial today.
                            </p>
                            <a
                                href="#"
                                class="mt-3 inline-block rounded-lg bg-neutral-900 px-4 py-2 text-sm font-medium text-white transition-all hover:bg-neutral-800 active:scale-[0.98] dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100"
                            >
                                Start free trial
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Resources Accordion -->
                <div x-data="{ open: false }">
                    <button
                        @click="open = !open"
                        type="button"
                        class="flex w-full items-center justify-between rounded-lg px-3 py-2 text-sm font-medium text-neutral-600 transition-colors hover:bg-neutral-100 hover:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50"
                        :aria-expanded="open"
                    >
                        Resources
                        <svg
                            class="h-4 w-4 transition-transform duration-200"
                            :class="open ? 'rotate-180' : ''"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            aria-hidden="true"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                    <div x-show="open" x-collapse class="mt-1 space-y-1 pl-3">
                        <a
                            href="#"
                            class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm text-neutral-700 transition-colors hover:bg-neutral-100 dark:text-neutral-300 dark:hover:bg-neutral-700"
                        >
                            <svg
                                class="h-4 w-4 text-neutral-500 dark:text-neutral-400"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25"
                                />
                            </svg>
                            Documentation
                        </a>
                        <a
                            href="#"
                            class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm text-neutral-700 transition-colors hover:bg-neutral-100 dark:text-neutral-300 dark:hover:bg-neutral-700"
                        >
                            <svg
                                class="h-4 w-4 text-neutral-500 dark:text-neutral-400"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5"
                                />
                            </svg>
                            API Reference
                        </a>
                        <a
                            href="#"
                            class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm text-neutral-700 transition-colors hover:bg-neutral-100 dark:text-neutral-300 dark:hover:bg-neutral-700"
                        >
                            <svg
                                class="h-4 w-4 text-neutral-500 dark:text-neutral-400"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="m15.75 10.5 4.72-4.72a.75.75 0 0 1 1.28.53v11.38a.75.75 0 0 1-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25h-9A2.25 2.25 0 0 0 2.25 7.5v9a2.25 2.25 0 0 0 2.25 2.25Z"
                                />
                            </svg>
                            Video Tutorials
                        </a>
                        <a
                            href="#"
                            class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm text-neutral-700 transition-colors hover:bg-neutral-100 dark:text-neutral-300 dark:hover:bg-neutral-700"
                        >
                            <svg
                                class="h-4 w-4 text-neutral-500 dark:text-neutral-400"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"
                                />
                            </svg>
                            Community
                        </a>
                    </div>
                </div>

                <!-- Pricing -->
                <a
                    href="#"
                    class="block rounded-lg px-3 py-2 text-sm font-medium text-neutral-600 transition-colors hover:bg-neutral-100 hover:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50"
                >
                    Pricing
                </a>
            </div>

            <!-- Mobile CTA -->
            <div class="border-t border-neutral-200 px-4 py-4 dark:border-neutral-700">
                <div class="flex flex-col gap-2">
                    <a
                        href="#"
                        class="rounded-lg bg-neutral-900 px-4 py-2.5 text-center text-sm font-medium text-white transition-all hover:bg-neutral-800 active:scale-[0.98] dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100"
                    >
                        Get Started
                    </a>
                    <a
                        href="#"
                        class="rounded-lg px-4 py-2.5 text-center text-sm font-medium text-neutral-600 transition-colors hover:bg-neutral-100 hover:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50"
                    >
                        Sign in
                    </a>
                </div>
            </div>
        </div>
    </nav>
</div>

---
slug: navigation-menu-simple
title: Navigation Menu Simple
category: navigation
github: caresome
dependencies: []
publish_at: 2025-12-15 12:00:00
---

<div data-preview-only class="min-h-[350px] p-4">
    <nav
        class="rounded-xl border border-neutral-200 bg-white shadow-sm dark:border-neutral-800 dark:bg-neutral-900"
        aria-label="Main navigation"
    >
        <div class="flex items-center justify-between px-6 py-4">
            <!-- Logo -->
            <div class="flex items-center gap-3">
                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-neutral-900 dark:bg-white">
                    <span class="text-sm font-bold text-white dark:text-neutral-900">N</span>
                </div>
                <span class="text-sm font-semibold text-neutral-900 dark:text-neutral-50">NavMenu</span>
            </div>

            <!-- Navigation -->
            <div class="flex items-center gap-1">
                <a
                    href="#"
                    class="rounded-lg px-3 py-2 text-sm font-medium text-neutral-900 transition-colors hover:bg-neutral-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:text-neutral-50 dark:hover:bg-neutral-800 dark:focus-visible:outline-neutral-100"
                    aria-current="page"
                >
                    Home
                </a>

                <!-- Products Dropdown -->
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

                    <!-- Dropdown wrapper with gap bridge -->
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
                                class="block px-4 py-2 text-sm text-neutral-700 transition-colors hover:bg-neutral-100 focus-visible:bg-neutral-100 focus-visible:outline-none dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus-visible:bg-neutral-700"
                                role="menuitem"
                            >
                                Analytics
                            </a>
                            <a
                                href="#"
                                class="block px-4 py-2 text-sm text-neutral-700 transition-colors hover:bg-neutral-100 focus-visible:bg-neutral-100 focus-visible:outline-none dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus-visible:bg-neutral-700"
                                role="menuitem"
                            >
                                Engagement
                            </a>
                            <a
                                href="#"
                                class="block px-4 py-2 text-sm text-neutral-700 transition-colors hover:bg-neutral-100 focus-visible:bg-neutral-100 focus-visible:outline-none dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus-visible:bg-neutral-700"
                                role="menuitem"
                            >
                                Security
                            </a>
                            <a
                                href="#"
                                class="block px-4 py-2 text-sm text-neutral-700 transition-colors hover:bg-neutral-100 focus-visible:bg-neutral-100 focus-visible:outline-none dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus-visible:bg-neutral-700"
                                role="menuitem"
                            >
                                Integrations
                            </a>
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

                    <!-- Dropdown wrapper with gap bridge -->
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
                                class="block px-4 py-2 text-sm text-neutral-700 transition-colors hover:bg-neutral-100 focus-visible:bg-neutral-100 focus-visible:outline-none dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus-visible:bg-neutral-700"
                                role="menuitem"
                            >
                                Documentation
                            </a>
                            <a
                                href="#"
                                class="block px-4 py-2 text-sm text-neutral-700 transition-colors hover:bg-neutral-100 focus-visible:bg-neutral-100 focus-visible:outline-none dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus-visible:bg-neutral-700"
                                role="menuitem"
                            >
                                API Reference
                            </a>
                            <a
                                href="#"
                                class="block px-4 py-2 text-sm text-neutral-700 transition-colors hover:bg-neutral-100 focus-visible:bg-neutral-100 focus-visible:outline-none dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus-visible:bg-neutral-700"
                                role="menuitem"
                            >
                                Guides
                            </a>
                            <div
                                class="my-2 border-t border-neutral-200 dark:border-neutral-700"
                                role="separator"
                            ></div>
                            <a
                                href="#"
                                class="block px-4 py-2 text-sm text-neutral-700 transition-colors hover:bg-neutral-100 focus-visible:bg-neutral-100 focus-visible:outline-none dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus-visible:bg-neutral-700"
                                role="menuitem"
                            >
                                Community
                            </a>
                            <a
                                href="#"
                                class="block px-4 py-2 text-sm text-neutral-700 transition-colors hover:bg-neutral-100 focus-visible:bg-neutral-100 focus-visible:outline-none dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus-visible:bg-neutral-700"
                                role="menuitem"
                            >
                                Support
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

                <a
                    href="#"
                    class="rounded-lg px-3 py-2 text-sm font-medium text-neutral-600 transition-colors hover:bg-neutral-100 hover:text-neutral-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:outline-neutral-100"
                >
                    Contact
                </a>
            </div>

            <!-- CTA -->
            <div class="flex items-center gap-3">
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
        </div>
    </nav>
</div>

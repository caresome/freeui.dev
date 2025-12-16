---
slug: mega-menu
title: Mega Menu
category: navigation
github: caresome
dependencies: []
publish_at: 2025-12-14 10:25:00
---

<div data-preview-only class="min-h-[400px] p-4">
    <nav class="rounded-xl border border-neutral-200 bg-white shadow-sm dark:border-neutral-800 dark:bg-neutral-900">
        <div class="flex items-center justify-between px-6 py-4">
            <!-- Logo -->
            <div class="flex items-center gap-3">
                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-neutral-900 dark:bg-white">
                    <span class="text-sm font-bold text-white dark:text-neutral-900">M</span>
                </div>
                <span class="text-sm font-semibold text-neutral-900 dark:text-neutral-50">MegaMenu</span>
            </div>

            <!-- Navigation -->
            <div class="flex items-center gap-1">
                <a
                    href="#"
                    class="rounded-lg px-3 py-2 text-sm font-medium text-neutral-600 transition-colors hover:bg-neutral-100 hover:text-neutral-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:outline-neutral-100"
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
                        aria-haspopup="true"
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

                    <!-- Mega Menu Wrapper (padding bridges the gap to prevent flicker) -->
                    <div
                        x-show="open"
                        @mouseenter="open = true"
                        @focusin="open = true"
                        class="absolute left-1/2 z-10 -translate-x-1/2 pt-2"
                        x-cloak
                    >
                        <!-- Mega Menu Panel -->
                        <div
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="opacity-0 -translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 -translate-y-1"
                            class="w-[500px] rounded-xl border border-neutral-200 bg-white p-6 shadow-lg dark:border-neutral-700 dark:bg-neutral-800"
                            role="menu"
                        >
                            <div class="grid grid-cols-2 gap-6">
                                <!-- Column 1 -->
                                <div>
                                    <h4 class="text-xs font-semibold tracking-wider text-neutral-400 uppercase">
                                        Features
                                    </h4>
                                    <ul class="mt-3 space-y-2">
                                        <li>
                                            <a
                                                href="#"
                                                class="group flex items-start gap-3 rounded-lg p-2 transition-colors hover:bg-neutral-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:hover:bg-neutral-700 dark:focus-visible:outline-neutral-100"
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
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"
                                                        />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <p
                                                        class="text-sm font-medium text-neutral-900 dark:text-neutral-50"
                                                    >
                                                        Analytics
                                                    </p>
                                                    <p class="text-xs text-neutral-500">Get insights into your data</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                href="#"
                                                class="group flex items-start gap-3 rounded-lg p-2 transition-colors hover:bg-neutral-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:hover:bg-neutral-700 dark:focus-visible:outline-neutral-100"
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
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"
                                                        />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <p
                                                        class="text-sm font-medium text-neutral-900 dark:text-neutral-50"
                                                    >
                                                        Security
                                                    </p>
                                                    <p class="text-xs text-neutral-500">Protect your data</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                href="#"
                                                class="group flex items-start gap-3 rounded-lg p-2 transition-colors hover:bg-neutral-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:hover:bg-neutral-700 dark:focus-visible:outline-neutral-100"
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
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            d="M14.25 6.087c0-.355.186-.676.401-.959.221-.29.349-.634.349-1.003 0-1.036-1.007-1.875-2.25-1.875s-2.25.84-2.25 1.875c0 .369.128.713.349 1.003.215.283.401.604.401.959v0a.64.64 0 01-.657.643 48.39 48.39 0 01-4.163-.3c.186 1.613.293 3.25.315 4.907a.656.656 0 01-.658.663v0c-.355 0-.676-.186-.959-.401a1.647 1.647 0 00-1.003-.349c-1.036 0-1.875 1.007-1.875 2.25s.84 2.25 1.875 2.25c.369 0 .713-.128 1.003-.349.283-.215.604-.401.959-.401v0c.31 0 .555.26.532.57a48.039 48.039 0 01-.642 5.056c1.518.19 3.058.309 4.616.354a.64.64 0 00.657-.643v0c0-.355-.186-.676-.401-.959a1.647 1.647 0 01-.349-1.003c0-1.035 1.008-1.875 2.25-1.875 1.243 0 2.25.84 2.25 1.875 0 .369-.128.713-.349 1.003-.215.283-.4.604-.4.959v0c0 .333.277.599.61.58a48.1 48.1 0 005.427-.63 48.05 48.05 0 00.582-4.717.532.532 0 00-.533-.57v0c-.355 0-.676.186-.959.401-.29.221-.634.349-1.003.349-1.035 0-1.875-1.007-1.875-2.25s.84-2.25 1.875-2.25c.37 0 .713.128 1.003.349.283.215.604.401.96.401v0a.656.656 0 00.658-.663 48.422 48.422 0 00-.37-5.36c-1.886.342-3.81.574-5.766.689a.578.578 0 01-.61-.58v0z"
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
                                    </ul>
                                </div>

                                <!-- Column 2 -->
                                <div>
                                    <h4 class="text-xs font-semibold tracking-wider text-neutral-400 uppercase">
                                        Resources
                                    </h4>
                                    <ul class="mt-3 space-y-2">
                                        <li>
                                            <a
                                                href="#"
                                                class="block rounded-lg p-2 transition-colors hover:bg-neutral-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:hover:bg-neutral-700 dark:focus-visible:outline-neutral-100"
                                            >
                                                <p class="text-sm font-medium text-neutral-900 dark:text-neutral-50">
                                                    Documentation
                                                </p>
                                                <p class="text-xs text-neutral-500">Learn how to use our platform</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                href="#"
                                                class="block rounded-lg p-2 transition-colors hover:bg-neutral-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:hover:bg-neutral-700 dark:focus-visible:outline-neutral-100"
                                            >
                                                <p class="text-sm font-medium text-neutral-900 dark:text-neutral-50">
                                                    API Reference
                                                </p>
                                                <p class="text-xs text-neutral-500">Complete API documentation</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                href="#"
                                                class="block rounded-lg p-2 transition-colors hover:bg-neutral-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:hover:bg-neutral-700 dark:focus-visible:outline-neutral-100"
                                            >
                                                <p class="text-sm font-medium text-neutral-900 dark:text-neutral-50">
                                                    Community
                                                </p>
                                                <p class="text-xs text-neutral-500">Join our Discord server</p>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Footer CTA -->
                            <div class="mt-6 rounded-lg bg-neutral-100 p-4 dark:bg-neutral-700">
                                <p class="text-sm font-medium text-neutral-900 dark:text-neutral-50">Need help?</p>
                                <p class="mt-1 text-xs text-neutral-500 dark:text-neutral-400">
                                    Our support team is here for you 24/7.
                                </p>
                                <a
                                    href="#"
                                    class="mt-2 inline-flex rounded-lg text-sm font-medium text-neutral-900 hover:underline focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:text-neutral-50 dark:focus-visible:outline-neutral-100"
                                >
                                    Contact support →
                                </a>
                            </div>
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
            <button
                type="button"
                class="rounded-lg bg-neutral-900 px-4 py-2 text-sm font-medium text-white transition-all hover:bg-neutral-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 active:scale-[0.98] dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100 dark:focus-visible:outline-neutral-100"
            >
                Get Started
            </button>
        </div>
    </nav>
</div>

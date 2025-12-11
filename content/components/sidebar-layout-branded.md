---
slug: sidebar-layout-branded
title: Sidebar Layout Branded
category: app-shells
github: caresome
dependencies:
    - alpinejs-persist@3.x https://cdn.jsdelivr.net/npm/@alpinejs/persist@3.x.x/dist/cdn.min.js
publish_at: 2025-12-03 00:00:00
---

<div
    x-data="{ sidebarOpen: false, sidebarCollapsed: $persist(false).as('sidebar-layout-branded-collapsed') }"
    class="min-h-screen bg-neutral-50 dark:bg-neutral-950"
>
    <!-- Mobile sidebar backdrop -->
    <div
        x-show="sidebarOpen"
        x-transition:enter="transition-opacity ease-linear duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-linear duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click="sidebarOpen = false"
        class="fixed inset-0 z-40 bg-neutral-900/50 lg:hidden"
        x-cloak
    ></div>

    <!-- Branded Sidebar (always dark) -->
    <aside
        :class="[
            sidebarOpen ? 'translate-x-0' : '-translate-x-full',
            sidebarCollapsed ? 'lg:w-16' : 'lg:w-64'
        ]"
        @keydown.escape.window="sidebarOpen = false"
        class="fixed inset-y-0 left-0 z-50 flex w-64 flex-col overflow-hidden bg-neutral-900 lg:translate-x-0"
    >
        <!-- Logo -->
        <div class="flex h-16 shrink-0 items-center gap-3 border-b border-neutral-800/80 px-4">
            <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-xl bg-white">
                <span class="text-sm font-bold text-neutral-900">C</span>
            </div>
            <span :class="sidebarCollapsed ? 'lg:hidden' : ''" class="text-sm font-semibold text-white">Caresome</span>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 space-y-1 overflow-x-hidden overflow-y-auto px-3 py-4">
            <a
                href="#"
                class="flex items-center gap-3 rounded-lg bg-neutral-800 px-3 py-2 text-sm font-medium text-white"
            >
                <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"
                    />
                </svg>
                <span :class="sidebarCollapsed ? 'lg:hidden' : ''">Dashboard</span>
            </a>
            <a
                href="#"
                class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium text-neutral-300 transition-all duration-150 hover:bg-neutral-800 hover:text-white"
            >
                <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"
                    />
                </svg>
                <span :class="sidebarCollapsed ? 'lg:hidden' : ''">Team</span>
            </a>
            <a
                href="#"
                class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium text-neutral-300 transition-all duration-150 hover:bg-neutral-800 hover:text-white"
            >
                <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z"
                    />
                </svg>
                <span :class="sidebarCollapsed ? 'lg:hidden' : ''">Projects</span>
            </a>
            <a
                href="#"
                class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium text-neutral-300 transition-all duration-150 hover:bg-neutral-800 hover:text-white"
            >
                <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"
                    />
                </svg>
                <span :class="sidebarCollapsed ? 'lg:hidden' : ''">Calendar</span>
            </a>
            <a
                href="#"
                class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium text-neutral-300 transition-all duration-150 hover:bg-neutral-800 hover:text-white"
            >
                <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"
                    />
                </svg>
                <span :class="sidebarCollapsed ? 'lg:hidden' : ''">Reports</span>
            </a>
            <a
                href="#"
                class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium text-neutral-300 transition-all duration-150 hover:bg-neutral-800 hover:text-white"
            >
                <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z"
                    />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                <span :class="sidebarCollapsed ? 'lg:hidden' : ''">Settings</span>
            </a>
        </nav>

        <!-- Collapse toggle -->
        <div class="hidden border-t border-neutral-800/80 p-3 lg:block">
            <button
                @click="sidebarCollapsed = !sidebarCollapsed"
                class="flex w-full items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium text-neutral-300 transition-all duration-150 hover:bg-neutral-800 hover:text-white"
            >
                <svg
                    :class="sidebarCollapsed ? 'rotate-180' : ''"
                    class="h-5 w-5 shrink-0"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
                <span :class="sidebarCollapsed ? 'lg:hidden' : ''">Collapse</span>
            </button>
        </div>

        <!-- User section -->
        <div class="shrink-0 border-t border-neutral-800/80 p-3">
            <a
                href="#"
                :class="sidebarCollapsed ? 'lg:justify-center lg:px-0' : ''"
                class="flex items-center gap-3 rounded-lg px-3 py-2 transition-all duration-150 hover:bg-neutral-800 active:bg-neutral-700"
            >
                <img
                    class="h-9 min-h-9 w-9 min-w-9 shrink-0 rounded-full object-cover ring-2 ring-neutral-700"
                    src="https://github.com/caresome.png"
                    alt="User avatar"
                />
                <div :class="sidebarCollapsed ? 'lg:hidden' : ''" class="min-w-0 flex-1">
                    <p class="truncate text-sm font-medium text-white">Ankit Thapa</p>
                    <p class="truncate text-xs text-neutral-400">caresome@proton.me</p>
                </div>
                <svg
                    :class="sidebarCollapsed ? 'lg:hidden' : ''"
                    class="h-4 w-4 text-neutral-500"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"
                    />
                </svg>
            </a>
        </div>
    </aside>

    <!-- Main content wrapper -->
    <div :class="sidebarCollapsed ? 'lg:pl-16' : 'lg:pl-64'">
        <!-- Top bar -->
        <header
            class="sticky top-0 z-30 flex h-16 items-center gap-4 border-b border-neutral-200/80 bg-white px-4 sm:px-6 lg:px-8 dark:border-neutral-800/80 dark:bg-neutral-900"
        >
            <!-- Mobile menu button -->
            <button
                @click="sidebarOpen = true"
                type="button"
                class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-neutral-500 transition-all duration-150 hover:scale-105 hover:bg-neutral-100 hover:text-neutral-900 active:bg-neutral-200 lg:hidden dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:active:bg-neutral-700"
                aria-label="Open sidebar"
            >
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                    />
                </svg>
            </button>

            <!-- Search -->
            <div class="flex flex-1 items-center gap-4">
                <div class="relative w-full max-w-md">
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
                        class="h-9 w-full rounded-lg border border-neutral-200/80 bg-neutral-50 pr-3 pl-9 text-sm text-neutral-900 placeholder-neutral-400 transition-colors duration-150 focus:border-neutral-300 focus:bg-white focus:outline-none dark:border-neutral-700/80 dark:bg-neutral-800 dark:text-white dark:placeholder-neutral-500 dark:focus:border-neutral-600 dark:focus:bg-neutral-700"
                    />
                </div>
            </div>

            <!-- Right side actions -->
            <div class="flex items-center gap-2">
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
            </div>
        </header>

        <!-- Main content -->
        <main class="py-6">
            <div class="px-4 sm:px-6 lg:px-8">
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
                    <h3 class="mt-4 text-sm font-medium text-neutral-900 dark:text-neutral-50">
                        Your content goes here
                    </h3>
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
</div>

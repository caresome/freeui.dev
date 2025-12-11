---
slug: multi-column-with-sidebar
title: Multi Column With Sidebar
category: app-shells
github: caresome
dependencies:
    - alpinejs-persist@3.x https://cdn.jsdelivr.net/npm/@alpinejs/persist@3.x.x/dist/cdn.min.js
publish_at: 2024-01-01 00:00:00
---

<div
    x-data="{
        sidebarOpen: false,
        sidebarCollapsed: $persist(false).as('multi-column-with-sidebar-collapsed'),
        selectedItem: 1,
        mobileView: 'list'
    }"
    class="flex h-screen bg-neutral-50 dark:bg-neutral-950"
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

    <!-- Sidebar -->
    <aside
        :class="[
            sidebarOpen ? 'translate-x-0' : '-translate-x-full',
            sidebarCollapsed ? 'lg:w-16' : 'lg:w-64'
        ]"
        @keydown.escape.window="sidebarOpen = false"
        class="fixed inset-y-0 left-0 z-50 flex w-64 flex-col border-r border-neutral-200/80 bg-white lg:relative lg:translate-x-0 dark:border-neutral-800/80 dark:bg-neutral-900"
    >
        <!-- Logo -->
        <div
            :class="sidebarCollapsed ? 'lg:justify-center lg:px-0' : 'px-4'"
            class="flex h-16 shrink-0 items-center justify-between border-b border-neutral-200/80 px-4 dark:border-neutral-800/80"
        >
            <a href="#" :class="sidebarCollapsed ? 'lg:justify-center' : ''" class="flex items-center gap-2">
                <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-xl bg-neutral-900 dark:bg-white">
                    <span class="text-sm font-bold text-white dark:text-neutral-900">C</span>
                </div>
                <span
                    :class="sidebarCollapsed ? 'lg:hidden' : ''"
                    class="text-sm font-semibold text-neutral-900 dark:text-neutral-50"
                >
                    Caresome
                </span>
            </a>
            <!-- Mobile close button -->
            <button
                x-show="!sidebarCollapsed"
                @click="sidebarOpen = false"
                type="button"
                class="inline-flex h-8 w-8 items-center justify-center rounded-lg text-neutral-500 transition-all duration-150 hover:scale-105 hover:bg-neutral-100 hover:text-neutral-900 lg:hidden dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50"
                aria-label="Close sidebar"
            >
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 space-y-1 overflow-x-hidden overflow-y-auto px-3 py-4">
            <a
                href="#"
                :class="sidebarCollapsed ? 'lg:justify-center lg:px-0' : ''"
                class="flex items-center gap-3 rounded-lg bg-neutral-100 px-3 py-2 text-sm font-medium text-neutral-900 dark:bg-neutral-800 dark:text-neutral-50"
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
                :class="sidebarCollapsed ? 'lg:justify-center lg:px-0' : ''"
                class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium text-neutral-600 transition-all duration-150 hover:bg-neutral-100 hover:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50"
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
                :class="sidebarCollapsed ? 'lg:justify-center lg:px-0' : ''"
                class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium text-neutral-600 transition-all duration-150 hover:bg-neutral-100 hover:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50"
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
                :class="sidebarCollapsed ? 'lg:justify-center lg:px-0' : ''"
                class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium text-neutral-600 transition-all duration-150 hover:bg-neutral-100 hover:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50"
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
        <div class="hidden border-t border-neutral-200/80 p-3 lg:block dark:border-neutral-800/80">
            <button
                @click="sidebarCollapsed = !sidebarCollapsed"
                :class="sidebarCollapsed ? 'justify-center' : ''"
                class="flex w-full items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium text-neutral-600 transition-all duration-150 hover:bg-neutral-100 hover:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50"
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

        <!-- User -->
        <div class="border-t border-neutral-200/80 p-3 dark:border-neutral-800/80">
            <a
                href="#"
                :class="sidebarCollapsed ? 'lg:justify-center lg:px-0' : ''"
                class="flex items-center gap-3 rounded-lg px-3 py-2 transition-all duration-150 hover:bg-neutral-100 dark:hover:bg-neutral-800"
            >
                <img
                    class="h-8 min-h-8 w-8 min-w-8 shrink-0 rounded-full object-cover"
                    src="https://github.com/caresome.png"
                    alt="User avatar"
                />
                <div :class="sidebarCollapsed ? 'lg:hidden' : ''" class="min-w-0 flex-1">
                    <p class="truncate text-sm font-medium text-neutral-900 dark:text-neutral-50">Ankit Thapa</p>
                    <p class="truncate text-xs text-neutral-500 dark:text-neutral-400">caresome@proton.me</p>
                </div>
            </a>
        </div>
    </aside>

    <!-- Secondary Column -->
    <aside
        :class="mobileView === 'list' ? 'flex' : 'hidden lg:flex'"
        class="w-full flex-col border-r border-neutral-200/80 bg-white lg:w-80 dark:border-neutral-800/80 dark:bg-neutral-900"
    >
        <!-- Header -->
        <div
            class="flex h-16 items-center justify-between border-b border-neutral-200/80 px-4 dark:border-neutral-800/80"
        >
            <div class="flex items-center gap-3">
                <!-- Mobile menu button -->
                <button
                    @click="sidebarOpen = true"
                    type="button"
                    class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-neutral-500 transition-all duration-150 hover:scale-105 hover:bg-neutral-100 hover:text-neutral-900 lg:hidden dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50"
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
                <h2 class="text-sm font-semibold text-neutral-900 dark:text-neutral-50">Projects</h2>
            </div>
            <button
                type="button"
                class="inline-flex h-8 w-8 items-center justify-center rounded-lg text-neutral-500 transition-all duration-150 hover:scale-105 hover:bg-neutral-100 hover:text-neutral-900 active:bg-neutral-200 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:active:bg-neutral-700"
                aria-label="Add project"
            >
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
            </button>
        </div>

        <!-- Search -->
        <div class="border-b border-neutral-200/80 p-3 dark:border-neutral-800/80">
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
                    placeholder="Search projects..."
                    class="h-9 w-full rounded-lg border border-neutral-200/80 bg-neutral-50 pr-3 pl-9 text-sm text-neutral-900 placeholder-neutral-400 transition-colors duration-150 focus:border-neutral-300 focus:bg-white focus:outline-none dark:border-neutral-700/80 dark:bg-neutral-800 dark:text-white dark:placeholder-neutral-500 dark:focus:border-neutral-600 dark:focus:bg-neutral-700"
                />
            </div>
        </div>

        <!-- Project List -->
        <div class="flex-1 overflow-y-auto">
            <button
                @click="selectedItem = 1; mobileView = 'content'"
                type="button"
                :class="selectedItem === 1 ? 'bg-neutral-100 dark:bg-neutral-800' : 'hover:bg-neutral-50 dark:hover:bg-neutral-800/50'"
                class="m-1 flex w-full gap-3 rounded-lg p-3 text-left transition-colors duration-150"
            >
                <div
                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400"
                >
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z"
                        />
                    </svg>
                </div>
                <div class="min-w-0 flex-1">
                    <p class="text-sm font-medium text-neutral-900 dark:text-neutral-50">Website Redesign</p>
                    <p class="mt-0.5 text-xs text-neutral-500 dark:text-neutral-400">12 files · Updated 2h ago</p>
                </div>
            </button>
            <button
                @click="selectedItem = 2; mobileView = 'content'"
                type="button"
                :class="selectedItem === 2 ? 'bg-neutral-100 dark:bg-neutral-800' : 'hover:bg-neutral-50 dark:hover:bg-neutral-800/50'"
                class="m-1 flex w-full gap-3 rounded-lg p-3 text-left transition-colors duration-150"
            >
                <div
                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-green-100 text-green-600 dark:bg-green-900/30 dark:text-green-400"
                >
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z"
                        />
                    </svg>
                </div>
                <div class="min-w-0 flex-1">
                    <p class="text-sm font-medium text-neutral-900 dark:text-neutral-50">Mobile App</p>
                    <p class="mt-0.5 text-xs text-neutral-500 dark:text-neutral-400">8 files · Updated 1d ago</p>
                </div>
            </button>
            <button
                @click="selectedItem = 3; mobileView = 'content'"
                type="button"
                :class="selectedItem === 3 ? 'bg-neutral-100 dark:bg-neutral-800' : 'hover:bg-neutral-50 dark:hover:bg-neutral-800/50'"
                class="m-1 flex w-full gap-3 rounded-lg p-3 text-left transition-colors duration-150"
            >
                <div
                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-purple-100 text-purple-600 dark:bg-purple-900/30 dark:text-purple-400"
                >
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z"
                        />
                    </svg>
                </div>
                <div class="min-w-0 flex-1">
                    <p class="text-sm font-medium text-neutral-900 dark:text-neutral-50">Brand Guidelines</p>
                    <p class="mt-0.5 text-xs text-neutral-500 dark:text-neutral-400">5 files · Updated 3d ago</p>
                </div>
            </button>
            <button
                @click="selectedItem = 4; mobileView = 'content'"
                type="button"
                :class="selectedItem === 4 ? 'bg-neutral-100 dark:bg-neutral-800' : 'hover:bg-neutral-50 dark:hover:bg-neutral-800/50'"
                class="m-1 flex w-full gap-3 rounded-lg p-3 text-left transition-colors duration-150"
            >
                <div
                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-orange-100 text-orange-600 dark:bg-orange-900/30 dark:text-orange-400"
                >
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z"
                        />
                    </svg>
                </div>
                <div class="min-w-0 flex-1">
                    <p class="text-sm font-medium text-neutral-900 dark:text-neutral-50">Marketing Campaign</p>
                    <p class="mt-0.5 text-xs text-neutral-500 dark:text-neutral-400">24 files · Updated 1w ago</p>
                </div>
            </button>
        </div>
    </aside>

    <!-- Main Content -->
    <main
        :class="mobileView === 'content' ? 'flex' : 'hidden lg:flex'"
        class="flex-1 flex-col bg-white dark:bg-neutral-900"
    >
        <!-- Header -->
        <div
            class="flex h-16 items-center justify-between border-b border-neutral-200/80 px-4 dark:border-neutral-800/80"
        >
            <div class="flex items-center gap-3">
                <!-- Mobile Back Button -->
                <button
                    @click="mobileView = 'list'"
                    type="button"
                    class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-neutral-500 transition-all duration-150 hover:scale-105 hover:bg-neutral-100 hover:text-neutral-900 active:bg-neutral-200 lg:hidden dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:active:bg-neutral-700"
                    aria-label="Back to list"
                >
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                    </svg>
                </button>
                <div>
                    <h1 class="text-sm font-semibold text-neutral-900 dark:text-neutral-50">Website Redesign</h1>
                    <p class="text-xs text-neutral-500 dark:text-neutral-400">12 files · 3 team members</p>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <button
                    type="button"
                    class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-neutral-500 transition-all duration-150 hover:scale-105 hover:bg-neutral-100 hover:text-neutral-900 active:bg-neutral-200 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:active:bg-neutral-700"
                    aria-label="Share"
                >
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z"
                        />
                    </svg>
                </button>
                <button
                    type="button"
                    class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-neutral-500 transition-all duration-150 hover:scale-105 hover:bg-neutral-100 hover:text-neutral-900 active:bg-neutral-200 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:active:bg-neutral-700"
                    aria-label="More options"
                >
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z"
                        />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Content -->
        <div class="flex-1 overflow-y-auto p-6">
            <div class="mx-auto max-w-4xl">
                <!-- File Grid -->
                <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-4">
                    <div
                        class="group relative rounded-xl border border-neutral-200/80 bg-neutral-50 p-4 transition-colors duration-150 hover:border-neutral-300 hover:bg-neutral-100 dark:border-neutral-700/80 dark:bg-neutral-800 dark:hover:border-neutral-600 dark:hover:bg-neutral-700"
                    >
                        <div
                            class="mb-3 flex h-12 w-12 items-center justify-center rounded-lg bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400"
                        >
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"
                                />
                            </svg>
                        </div>
                        <p class="truncate text-sm font-medium text-neutral-900 dark:text-neutral-50">Homepage.fig</p>
                        <p class="mt-1 text-xs text-neutral-500 dark:text-neutral-400">2.4 MB</p>
                    </div>
                    <div
                        class="group relative rounded-xl border border-neutral-200/80 bg-neutral-50 p-4 transition-colors duration-150 hover:border-neutral-300 hover:bg-neutral-100 dark:border-neutral-700/80 dark:bg-neutral-800 dark:hover:border-neutral-600 dark:hover:bg-neutral-700"
                    >
                        <div
                            class="mb-3 flex h-12 w-12 items-center justify-center rounded-lg bg-green-100 text-green-600 dark:bg-green-900/30 dark:text-green-400"
                        >
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z"
                                />
                            </svg>
                        </div>
                        <p class="truncate text-sm font-medium text-neutral-900 dark:text-neutral-50">hero-image.png</p>
                        <p class="mt-1 text-xs text-neutral-500 dark:text-neutral-400">1.8 MB</p>
                    </div>
                    <div
                        class="group relative rounded-xl border border-neutral-200/80 bg-neutral-50 p-4 transition-colors duration-150 hover:border-neutral-300 hover:bg-neutral-100 dark:border-neutral-700/80 dark:bg-neutral-800 dark:hover:border-neutral-600 dark:hover:bg-neutral-700"
                    >
                        <div
                            class="mb-3 flex h-12 w-12 items-center justify-center rounded-lg bg-purple-100 text-purple-600 dark:bg-purple-900/30 dark:text-purple-400"
                        >
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"
                                />
                            </svg>
                        </div>
                        <p class="truncate text-sm font-medium text-neutral-900 dark:text-neutral-50">
                            style-guide.pdf
                        </p>
                        <p class="mt-1 text-xs text-neutral-500 dark:text-neutral-400">856 KB</p>
                    </div>
                    <div
                        class="group relative rounded-xl border border-neutral-200/80 bg-neutral-50 p-4 transition-colors duration-150 hover:border-neutral-300 hover:bg-neutral-100 dark:border-neutral-700/80 dark:bg-neutral-800 dark:hover:border-neutral-600 dark:hover:bg-neutral-700"
                    >
                        <div
                            class="mb-3 flex h-12 w-12 items-center justify-center rounded-lg bg-orange-100 text-orange-600 dark:bg-orange-900/30 dark:text-orange-400"
                        >
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5"
                                />
                            </svg>
                        </div>
                        <p class="truncate text-sm font-medium text-neutral-900 dark:text-neutral-50">components.tsx</p>
                        <p class="mt-1 text-xs text-neutral-500 dark:text-neutral-400">24 KB</p>
                    </div>
                    <div
                        class="group relative rounded-xl border border-neutral-200/80 bg-neutral-50 p-4 transition-colors duration-150 hover:border-neutral-300 hover:bg-neutral-100 dark:border-neutral-700/80 dark:bg-neutral-800 dark:hover:border-neutral-600 dark:hover:bg-neutral-700"
                    >
                        <div
                            class="mb-3 flex h-12 w-12 items-center justify-center rounded-lg bg-red-100 text-red-600 dark:bg-red-900/30 dark:text-red-400"
                        >
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="m15.75 10.5 4.72-4.72a.75.75 0 0 1 1.28.53v11.38a.75.75 0 0 1-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25h-9A2.25 2.25 0 0 0 2.25 7.5v9a2.25 2.25 0 0 0 2.25 2.25Z"
                                />
                            </svg>
                        </div>
                        <p class="truncate text-sm font-medium text-neutral-900 dark:text-neutral-50">demo-video.mp4</p>
                        <p class="mt-1 text-xs text-neutral-500 dark:text-neutral-400">48 MB</p>
                    </div>
                    <div
                        class="group relative rounded-xl border border-neutral-200/80 bg-neutral-50 p-4 transition-colors duration-150 hover:border-neutral-300 hover:bg-neutral-100 dark:border-neutral-700/80 dark:bg-neutral-800 dark:hover:border-neutral-600 dark:hover:bg-neutral-700"
                    >
                        <div
                            class="mb-3 flex h-12 w-12 items-center justify-center rounded-lg bg-cyan-100 text-cyan-600 dark:bg-cyan-900/30 dark:text-cyan-400"
                        >
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"
                                />
                            </svg>
                        </div>
                        <p class="truncate text-sm font-medium text-neutral-900 dark:text-neutral-50">notes.md</p>
                        <p class="mt-1 text-xs text-neutral-500 dark:text-neutral-400">12 KB</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

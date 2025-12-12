---
slug: bottom-nav-layout
title: Bottom Navigation Layout
category: app-shells
github: caresome
publish_at: 2025-12-01 00:00:00
---

<div
    x-data="{
        activeTab: 'home'
    }"
    class="flex h-screen flex-col bg-neutral-50 dark:bg-neutral-950"
>
    <!-- Skip Navigation Link -->
    <a
        href="#main-content"
        class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-[60] focus:rounded-lg focus:bg-neutral-900 focus:px-4 focus:py-2 focus:text-sm focus:font-medium focus:text-white focus:ring-2 focus:ring-neutral-500 focus:ring-offset-2 focus:outline-none dark:focus:bg-white dark:focus:text-neutral-900"
    >
        Skip to main content
    </a>

    <!-- Desktop Sidebar (hidden on mobile) -->
    <aside
        class="fixed inset-y-0 left-0 z-40 hidden w-64 flex-col bg-white lg:flex dark:bg-neutral-900"
        role="navigation"
        aria-label="Main navigation"
    >
        <!-- Logo -->
        <div class="flex h-16 shrink-0 items-center gap-3 px-4">
            <a
                href="#"
                class="group flex items-center gap-3 rounded-lg focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-offset-2 dark:focus-visible:ring-neutral-100"
                aria-label="Caresome - Go to homepage"
            >
                <div
                    class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-neutral-900 shadow-sm transition-transform duration-150 group-hover:scale-105 dark:bg-white"
                    aria-hidden="true"
                >
                    <span class="text-sm font-bold text-white dark:text-neutral-900">C</span>
                </div>
                <span class="text-sm font-semibold text-neutral-900 dark:text-neutral-50">Caresome</span>
            </a>
        </div>

        <!-- Desktop Navigation -->
        <nav class="flex-1 space-y-1 overflow-y-auto p-3" aria-label="Sidebar navigation">
            <button
                @click="activeTab = 'home'"
                type="button"
                :class="activeTab === 'home' ? 'bg-neutral-100 text-neutral-900 dark:bg-neutral-800 dark:text-neutral-50' : 'text-neutral-600 hover:bg-neutral-100 hover:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50'"
                class="flex w-full items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition-all duration-150 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-offset-2 dark:focus-visible:ring-neutral-100"
                :aria-current="activeTab === 'home' ? 'page' : null"
            >
                <svg
                    x-show="activeTab !== 'home'"
                    class="h-5 w-5 shrink-0"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    aria-hidden="true"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"
                    />
                </svg>
                <svg
                    x-show="activeTab === 'home'"
                    x-cloak
                    class="h-5 w-5 shrink-0"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    aria-hidden="true"
                >
                    <path
                        d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z"
                    />
                    <path
                        d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z"
                    />
                </svg>
                <span>Home</span>
            </button>
            <button
                @click="activeTab = 'search'"
                type="button"
                :class="activeTab === 'search' ? 'bg-neutral-100 text-neutral-900 dark:bg-neutral-800 dark:text-neutral-50' : 'text-neutral-600 hover:bg-neutral-100 hover:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50'"
                class="flex w-full items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition-all duration-150 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-offset-2 dark:focus-visible:ring-neutral-100"
                :aria-current="activeTab === 'search' ? 'page' : null"
            >
                <svg
                    x-show="activeTab !== 'search'"
                    class="h-5 w-5 shrink-0"
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
                <svg
                    x-show="activeTab === 'search'"
                    x-cloak
                    class="h-5 w-5 shrink-0"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    aria-hidden="true"
                >
                    <path
                        fill-rule="evenodd"
                        d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                        clip-rule="evenodd"
                    />
                </svg>
                <span>Search</span>
            </button>
            <button
                @click="activeTab = 'create'"
                type="button"
                :class="activeTab === 'create' ? 'bg-neutral-100 text-neutral-900 dark:bg-neutral-800 dark:text-neutral-50' : 'text-neutral-600 hover:bg-neutral-100 hover:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50'"
                class="flex w-full items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition-all duration-150 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-offset-2 dark:focus-visible:ring-neutral-100"
                :aria-current="activeTab === 'create' ? 'page' : null"
            >
                <svg
                    x-show="activeTab !== 'create'"
                    class="h-5 w-5 shrink-0"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    aria-hidden="true"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                    />
                </svg>
                <svg
                    x-show="activeTab === 'create'"
                    x-cloak
                    class="h-5 w-5 shrink-0"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    aria-hidden="true"
                >
                    <path
                        fill-rule="evenodd"
                        d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z"
                        clip-rule="evenodd"
                    />
                </svg>
                <span>Create</span>
            </button>
            <button
                @click="activeTab = 'activity'"
                type="button"
                :class="activeTab === 'activity' ? 'bg-neutral-100 text-neutral-900 dark:bg-neutral-800 dark:text-neutral-50' : 'text-neutral-600 hover:bg-neutral-100 hover:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50'"
                class="flex w-full items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition-all duration-150 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-offset-2 dark:focus-visible:ring-neutral-100"
                :aria-current="activeTab === 'activity' ? 'page' : null"
            >
                <svg
                    x-show="activeTab !== 'activity'"
                    class="h-5 w-5 shrink-0"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    aria-hidden="true"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"
                    />
                </svg>
                <svg
                    x-show="activeTab === 'activity'"
                    x-cloak
                    class="h-5 w-5 shrink-0"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    aria-hidden="true"
                >
                    <path
                        d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z"
                    />
                </svg>
                <span>Activity</span>
            </button>
            <button
                @click="activeTab = 'profile'"
                type="button"
                :class="activeTab === 'profile' ? 'bg-neutral-100 text-neutral-900 dark:bg-neutral-800 dark:text-neutral-50' : 'text-neutral-600 hover:bg-neutral-100 hover:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50'"
                class="flex w-full items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition-all duration-150 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-offset-2 dark:focus-visible:ring-neutral-100"
                :aria-current="activeTab === 'profile' ? 'page' : null"
            >
                <svg
                    x-show="activeTab !== 'profile'"
                    class="h-5 w-5 shrink-0"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    aria-hidden="true"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"
                    />
                </svg>
                <svg
                    x-show="activeTab === 'profile'"
                    x-cloak
                    class="h-5 w-5 shrink-0"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    aria-hidden="true"
                >
                    <path
                        fill-rule="evenodd"
                        d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                        clip-rule="evenodd"
                    />
                </svg>
                <span>Profile</span>
            </button>
        </nav>

        <!-- User Profile (Desktop) -->
        <div class="border-t border-neutral-200 p-3 dark:border-neutral-800">
            <a
                href="#"
                class="flex items-center gap-3 rounded-lg px-3 py-2 transition-all duration-150 hover:bg-neutral-100 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-offset-2 dark:hover:bg-neutral-800 dark:focus-visible:ring-neutral-100"
                aria-label="View profile for Ankit Thapa"
            >
                <div class="relative">
                    <img
                        class="h-8 w-8 shrink-0 rounded-full object-cover ring-2 ring-neutral-100 dark:ring-neutral-800"
                        src="https://github.com/caresome.png"
                        alt=""
                    />
                    <span
                        class="absolute -right-0.5 -bottom-0.5 block h-2.5 w-2.5 rounded-full bg-emerald-500 ring-2 ring-white dark:ring-neutral-900"
                        aria-hidden="true"
                    ></span>
                </div>
                <div class="min-w-0 flex-1">
                    <p class="truncate text-sm font-medium text-neutral-900 dark:text-neutral-50">Ankit Thapa</p>
                    <p class="truncate text-xs text-neutral-500 dark:text-neutral-400">@caresome</p>
                </div>
                <span class="sr-only">(Online)</span>
            </a>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="flex flex-1 flex-col lg:pl-64">
        <!-- Top Header -->
        <header
            class="sticky top-0 z-30 flex h-14 items-center justify-between bg-neutral-50 px-4 lg:h-16 dark:bg-neutral-950"
            role="banner"
        >
            <h1 class="text-lg font-semibold text-neutral-900 dark:text-neutral-50">
                <span x-text="activeTab.charAt(0).toUpperCase() + activeTab.slice(1)">Home</span>
            </h1>
            <div class="flex items-center gap-2">
                <button
                    type="button"
                    class="relative inline-flex h-9 w-9 items-center justify-center rounded-lg text-neutral-500 transition-all duration-150 hover:scale-105 hover:bg-neutral-100 hover:text-neutral-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-offset-2 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:ring-neutral-100"
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
                    <!-- Notification Badge -->
                    <span
                        class="absolute top-1.5 right-1.5 h-2 w-2 rounded-full bg-red-500 ring-2 ring-neutral-50 dark:ring-neutral-950"
                        aria-hidden="true"
                    ></span>
                    <span class="sr-only">3 unread notifications</span>
                </button>
                <button
                    type="button"
                    class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-neutral-500 transition-all duration-150 hover:scale-105 hover:bg-neutral-100 hover:text-neutral-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-offset-2 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:ring-neutral-100"
                    aria-label="Messages"
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
                            d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z"
                        />
                    </svg>
                </button>
            </div>
        </header>

        <!-- Main Content -->
        <main id="main-content" class="flex-1 overflow-y-auto pb-20 lg:pb-0" tabindex="-1">
            <!-- Sample Content - Feed -->
            <div class="mx-auto max-w-2xl p-4">
                <div class="space-y-4">
                    <!-- Post Card 1 -->
                    <article
                        class="rounded-xl border border-neutral-200 bg-white p-4 shadow-sm dark:border-neutral-800 dark:bg-neutral-900"
                    >
                        <div class="flex items-start gap-3">
                            <img
                                class="h-10 w-10 shrink-0 rounded-full object-cover ring-2 ring-neutral-100 dark:ring-neutral-800"
                                src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="Sarah Johnson"
                            />
                            <div class="min-w-0 flex-1">
                                <div class="flex items-center gap-2">
                                    <p class="text-sm font-medium text-neutral-900 dark:text-neutral-50">
                                        Sarah Johnson
                                    </p>
                                    <span class="text-xs text-neutral-500 dark:text-neutral-400">· 2h</span>
                                </div>
                                <p class="mt-2 text-sm text-neutral-700 dark:text-neutral-300">
                                    Just finished the new dashboard design! Really happy with how the dark mode turned
                                    out. What do you think? 🎨
                                </p>
                                <div class="mt-3 overflow-hidden rounded-lg">
                                    <div
                                        class="aspect-video bg-gradient-to-br from-neutral-200 to-neutral-300 dark:from-neutral-700 dark:to-neutral-800"
                                    ></div>
                                </div>
                                <div class="mt-3 flex items-center gap-4">
                                    <button
                                        type="button"
                                        class="flex items-center gap-1.5 text-neutral-500 transition-colors hover:text-red-500 dark:text-neutral-400"
                                        aria-label="Like post, 24 likes"
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
                                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"
                                            />
                                        </svg>
                                        <span class="text-xs font-medium">24</span>
                                    </button>
                                    <button
                                        type="button"
                                        class="flex items-center gap-1.5 text-neutral-500 transition-colors hover:text-neutral-900 dark:text-neutral-400 dark:hover:text-neutral-50"
                                        aria-label="Comment on post, 8 comments"
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
                                                d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 0 1-.923 1.785A5.969 5.969 0 0 0 6 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337Z"
                                            />
                                        </svg>
                                        <span class="text-xs font-medium">8</span>
                                    </button>
                                    <button
                                        type="button"
                                        class="flex items-center gap-1.5 text-neutral-500 transition-colors hover:text-neutral-900 dark:text-neutral-400 dark:hover:text-neutral-50"
                                        aria-label="Share post"
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
                                                d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z"
                                            />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </article>

                    <!-- Post Card 2 -->
                    <article
                        class="rounded-xl border border-neutral-200 bg-white p-4 shadow-sm dark:border-neutral-800 dark:bg-neutral-900"
                    >
                        <div class="flex items-start gap-3">
                            <img
                                class="h-10 w-10 shrink-0 rounded-full object-cover ring-2 ring-neutral-100 dark:ring-neutral-800"
                                src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="Michael Chen"
                            />
                            <div class="min-w-0 flex-1">
                                <div class="flex items-center gap-2">
                                    <p class="text-sm font-medium text-neutral-900 dark:text-neutral-50">
                                        Michael Chen
                                    </p>
                                    <span class="text-xs text-neutral-500 dark:text-neutral-400">· 5h</span>
                                </div>
                                <p class="mt-2 text-sm text-neutral-700 dark:text-neutral-300">
                                    Great article on building accessible web applications. Worth a read! 📚
                                </p>
                                <a
                                    href="#"
                                    class="mt-3 block rounded-lg border border-neutral-200 p-3 transition-colors hover:bg-neutral-50 dark:border-neutral-800 dark:hover:bg-neutral-800"
                                >
                                    <p class="text-xs font-medium text-neutral-500 dark:text-neutral-400">medium.com</p>
                                    <p class="mt-1 text-sm font-medium text-neutral-900 dark:text-neutral-50">
                                        Building Accessible Web Applications in 2025
                                    </p>
                                    <p class="mt-1 text-xs text-neutral-500 dark:text-neutral-400">
                                        A comprehensive guide to WCAG 2.1 AA compliance...
                                    </p>
                                </a>
                                <div class="mt-3 flex items-center gap-4">
                                    <button
                                        type="button"
                                        class="flex items-center gap-1.5 text-neutral-500 transition-colors hover:text-red-500 dark:text-neutral-400"
                                        aria-label="Like post, 42 likes"
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
                                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"
                                            />
                                        </svg>
                                        <span class="text-xs font-medium">42</span>
                                    </button>
                                    <button
                                        type="button"
                                        class="flex items-center gap-1.5 text-neutral-500 transition-colors hover:text-neutral-900 dark:text-neutral-400 dark:hover:text-neutral-50"
                                        aria-label="Comment on post, 12 comments"
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
                                                d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 0 1-.923 1.785A5.969 5.969 0 0 0 6 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337Z"
                                            />
                                        </svg>
                                        <span class="text-xs font-medium">12</span>
                                    </button>
                                    <button
                                        type="button"
                                        class="flex items-center gap-1.5 text-neutral-500 transition-colors hover:text-neutral-900 dark:text-neutral-400 dark:hover:text-neutral-50"
                                        aria-label="Share post"
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
                                                d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z"
                                            />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </article>

                    <!-- Post Card 3 -->
                    <article
                        class="rounded-xl border border-neutral-200 bg-white p-4 shadow-sm dark:border-neutral-800 dark:bg-neutral-900"
                    >
                        <div class="flex items-start gap-3">
                            <img
                                class="h-10 w-10 shrink-0 rounded-full object-cover ring-2 ring-neutral-100 dark:ring-neutral-800"
                                src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="Emily Davis"
                            />
                            <div class="min-w-0 flex-1">
                                <div class="flex items-center gap-2">
                                    <p class="text-sm font-medium text-neutral-900 dark:text-neutral-50">Emily Davis</p>
                                    <span class="text-xs text-neutral-500 dark:text-neutral-400">· 1d</span>
                                </div>
                                <p class="mt-2 text-sm text-neutral-700 dark:text-neutral-300">
                                    Working on some new component designs. Can't wait to share more soon! ✨
                                </p>
                                <div class="mt-3 flex items-center gap-4">
                                    <button
                                        type="button"
                                        class="flex items-center gap-1.5 text-red-500"
                                        aria-label="Unlike post, 156 likes"
                                        aria-pressed="true"
                                    >
                                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                            <path
                                                d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z"
                                            />
                                        </svg>
                                        <span class="text-xs font-medium">156</span>
                                    </button>
                                    <button
                                        type="button"
                                        class="flex items-center gap-1.5 text-neutral-500 transition-colors hover:text-neutral-900 dark:text-neutral-400 dark:hover:text-neutral-50"
                                        aria-label="Comment on post, 23 comments"
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
                                                d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 0 1-.923 1.785A5.969 5.969 0 0 0 6 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337Z"
                                            />
                                        </svg>
                                        <span class="text-xs font-medium">23</span>
                                    </button>
                                    <button
                                        type="button"
                                        class="flex items-center gap-1.5 text-neutral-500 transition-colors hover:text-neutral-900 dark:text-neutral-400 dark:hover:text-neutral-50"
                                        aria-label="Share post"
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
                                                d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z"
                                            />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </main>
    </div>

    <!-- Bottom Navigation Bar (Mobile only) -->
    <nav
        class="pb-safe fixed inset-x-0 bottom-0 z-40 flex h-16 items-center justify-around border-t border-neutral-200 bg-white lg:hidden dark:border-neutral-800 dark:bg-neutral-900"
        role="navigation"
        aria-label="Main navigation"
    >
        <button
            @click="activeTab = 'home'"
            type="button"
            :class="activeTab === 'home' ? 'text-neutral-900 dark:text-neutral-50' : 'text-neutral-500 dark:text-neutral-400'"
            class="flex h-full min-w-[64px] flex-col items-center justify-center gap-1 transition-colors focus:outline-none focus-visible:bg-neutral-100 dark:focus-visible:bg-neutral-800"
            :aria-current="activeTab === 'home' ? 'page' : null"
            aria-label="Home"
        >
            <svg
                x-show="activeTab !== 'home'"
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
                aria-hidden="true"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"
                />
            </svg>
            <svg
                x-show="activeTab === 'home'"
                x-cloak
                class="h-6 w-6"
                viewBox="0 0 24 24"
                fill="currentColor"
                aria-hidden="true"
            >
                <path
                    d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z"
                />
                <path
                    d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z"
                />
            </svg>
            <span class="text-[10px] font-medium">Home</span>
        </button>
        <button
            @click="activeTab = 'search'"
            type="button"
            :class="activeTab === 'search' ? 'text-neutral-900 dark:text-neutral-50' : 'text-neutral-500 dark:text-neutral-400'"
            class="flex h-full min-w-[64px] flex-col items-center justify-center gap-1 transition-colors focus:outline-none focus-visible:bg-neutral-100 dark:focus-visible:bg-neutral-800"
            :aria-current="activeTab === 'search' ? 'page' : null"
            aria-label="Search"
        >
            <svg
                x-show="activeTab !== 'search'"
                class="h-6 w-6"
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
            <svg
                x-show="activeTab === 'search'"
                x-cloak
                class="h-6 w-6"
                viewBox="0 0 24 24"
                fill="currentColor"
                aria-hidden="true"
            >
                <path
                    fill-rule="evenodd"
                    d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                    clip-rule="evenodd"
                />
            </svg>
            <span class="text-[10px] font-medium">Search</span>
        </button>
        <button
            @click="activeTab = 'create'"
            type="button"
            :class="activeTab === 'create' ? 'text-neutral-900 dark:text-neutral-50' : 'text-neutral-500 dark:text-neutral-400'"
            class="flex h-full min-w-[64px] flex-col items-center justify-center gap-1 transition-colors focus:outline-none focus-visible:bg-neutral-100 dark:focus-visible:bg-neutral-800"
            :aria-current="activeTab === 'create' ? 'page' : null"
            aria-label="Create"
        >
            <svg
                x-show="activeTab !== 'create'"
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
                aria-hidden="true"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                />
            </svg>
            <svg
                x-show="activeTab === 'create'"
                x-cloak
                class="h-6 w-6"
                viewBox="0 0 24 24"
                fill="currentColor"
                aria-hidden="true"
            >
                <path
                    fill-rule="evenodd"
                    d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z"
                    clip-rule="evenodd"
                />
            </svg>
            <span class="text-[10px] font-medium">Create</span>
        </button>
        <button
            @click="activeTab = 'activity'"
            type="button"
            :class="activeTab === 'activity' ? 'text-neutral-900 dark:text-neutral-50' : 'text-neutral-500 dark:text-neutral-400'"
            class="flex h-full min-w-[64px] flex-col items-center justify-center gap-1 transition-colors focus:outline-none focus-visible:bg-neutral-100 dark:focus-visible:bg-neutral-800"
            :aria-current="activeTab === 'activity' ? 'page' : null"
            aria-label="Activity"
        >
            <svg
                x-show="activeTab !== 'activity'"
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
                aria-hidden="true"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"
                />
            </svg>
            <svg
                x-show="activeTab === 'activity'"
                x-cloak
                class="h-6 w-6"
                viewBox="0 0 24 24"
                fill="currentColor"
                aria-hidden="true"
            >
                <path
                    d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z"
                />
            </svg>
            <span class="text-[10px] font-medium">Activity</span>
        </button>
        <button
            @click="activeTab = 'profile'"
            type="button"
            :class="activeTab === 'profile' ? 'text-neutral-900 dark:text-neutral-50' : 'text-neutral-500 dark:text-neutral-400'"
            class="flex h-full min-w-[64px] flex-col items-center justify-center gap-1 transition-colors focus:outline-none focus-visible:bg-neutral-100 dark:focus-visible:bg-neutral-800"
            :aria-current="activeTab === 'profile' ? 'page' : null"
            aria-label="Profile"
        >
            <svg
                x-show="activeTab !== 'profile'"
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
                aria-hidden="true"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"
                />
            </svg>
            <svg
                x-show="activeTab === 'profile'"
                x-cloak
                class="h-6 w-6"
                viewBox="0 0 24 24"
                fill="currentColor"
                aria-hidden="true"
            >
                <path
                    fill-rule="evenodd"
                    d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                    clip-rule="evenodd"
                />
            </svg>
            <span class="text-[10px] font-medium">Profile</span>
        </button>
    </nav>
</div>

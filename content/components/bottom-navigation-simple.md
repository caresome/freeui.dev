---
slug: bottom-navigation-simple
title: Bottom Navigation Simple
category: navigation
github: caresome
dependencies: []
publish_at: 2025-12-15 12:00:00
---

<div data-preview-only class="flex min-h-screen flex-col">
    <!-- Content area -->
    <div class="flex-1 bg-neutral-50 p-6 dark:bg-neutral-950">
        <div
            class="rounded-xl border border-neutral-200 bg-white p-6 text-center dark:border-neutral-800 dark:bg-neutral-900"
        >
            <p class="text-sm text-neutral-500 dark:text-neutral-400">Content area</p>
        </div>
    </div>

    <!-- Bottom Navigation -->
    <nav
        x-data="{ active: 'home' }"
        class="flex items-center justify-around border-t border-neutral-200 bg-white px-2 py-2 dark:border-neutral-800 dark:bg-neutral-900"
        aria-label="Bottom navigation"
    >
        <button
            @click="active = 'home'"
            type="button"
            class="flex h-12 w-12 items-center justify-center rounded-xl transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
            :class="active === 'home' ? 'bg-neutral-100 text-neutral-900 dark:bg-neutral-800 dark:text-neutral-50' : 'text-neutral-500 hover:text-neutral-900 dark:text-neutral-400 dark:hover:text-neutral-50'"
            :aria-current="active === 'home' ? 'page' : null"
            aria-label="Home"
        >
            <svg
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
        </button>
        <button
            @click="active = 'search'"
            type="button"
            class="flex h-12 w-12 items-center justify-center rounded-xl transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
            :class="active === 'search' ? 'bg-neutral-100 text-neutral-900 dark:bg-neutral-800 dark:text-neutral-50' : 'text-neutral-500 hover:text-neutral-900 dark:text-neutral-400 dark:hover:text-neutral-50'"
            :aria-current="active === 'search' ? 'page' : null"
            aria-label="Search"
        >
            <svg
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
        </button>
        <button
            @click="active = 'notifications'"
            type="button"
            class="flex h-12 w-12 items-center justify-center rounded-xl transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
            :class="active === 'notifications' ? 'bg-neutral-100 text-neutral-900 dark:bg-neutral-800 dark:text-neutral-50' : 'text-neutral-500 hover:text-neutral-900 dark:text-neutral-400 dark:hover:text-neutral-50'"
            :aria-current="active === 'notifications' ? 'page' : null"
            aria-label="Notifications"
        >
            <svg
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
                    d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"
                />
            </svg>
        </button>
        <button
            @click="active = 'profile'"
            type="button"
            class="flex h-12 w-12 items-center justify-center rounded-xl transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
            :class="active === 'profile' ? 'bg-neutral-100 text-neutral-900 dark:bg-neutral-800 dark:text-neutral-50' : 'text-neutral-500 hover:text-neutral-900 dark:text-neutral-400 dark:hover:text-neutral-50'"
            :aria-current="active === 'profile' ? 'page' : null"
            aria-label="Profile"
        >
            <svg
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
        </button>
    </nav>
</div>

---
slug: bottom-navigation-with-indicator
title: Bottom Navigation with Indicator
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
        x-data="{ active: 'home', items: ['home', 'search', 'add', 'messages', 'profile'] }"
        class="relative border-t border-neutral-200 bg-white dark:border-neutral-800 dark:bg-neutral-900"
        aria-label="Bottom navigation"
    >
        <!-- Animated indicator -->
        <div
            class="absolute top-0 h-0.5 w-1/5 bg-neutral-900 transition-all duration-200 dark:bg-neutral-100"
            :style="{ left: (items.indexOf(active) * 20) + '%' }"
            aria-hidden="true"
        ></div>

        <div class="flex items-center justify-around px-2 py-2">
            <button
                @click="active = 'home'"
                type="button"
                class="flex flex-col items-center gap-1 rounded-lg px-4 py-2 transition-all duration-150 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
                :class="active === 'home' ? 'text-neutral-900 dark:text-neutral-50' : 'text-neutral-400 hover:text-neutral-600 dark:text-neutral-500 dark:hover:text-neutral-300'"
                :aria-current="active === 'home' ? 'page' : null"
            >
                <svg
                    class="h-6 w-6 transition-transform duration-150"
                    :class="active === 'home' ? 'scale-110' : ''"
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
                <span class="text-xs font-medium">Home</span>
            </button>
            <button
                @click="active = 'search'"
                type="button"
                class="flex flex-col items-center gap-1 rounded-lg px-4 py-2 transition-all duration-150 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
                :class="active === 'search' ? 'text-neutral-900 dark:text-neutral-50' : 'text-neutral-400 hover:text-neutral-600 dark:text-neutral-500 dark:hover:text-neutral-300'"
                :aria-current="active === 'search' ? 'page' : null"
            >
                <svg
                    class="h-6 w-6 transition-transform duration-150"
                    :class="active === 'search' ? 'scale-110' : ''"
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
                <span class="text-xs font-medium">Search</span>
            </button>
            <button
                @click="active = 'add'"
                type="button"
                class="flex flex-col items-center gap-1 rounded-lg px-4 py-2 transition-all duration-150 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
                :class="active === 'add' ? 'text-neutral-900 dark:text-neutral-50' : 'text-neutral-400 hover:text-neutral-600 dark:text-neutral-500 dark:hover:text-neutral-300'"
                :aria-current="active === 'add' ? 'page' : null"
            >
                <svg
                    class="h-6 w-6 transition-transform duration-150"
                    :class="active === 'add' ? 'scale-110' : ''"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    aria-hidden="true"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                <span class="text-xs font-medium">Create</span>
            </button>
            <button
                @click="active = 'messages'"
                type="button"
                class="flex flex-col items-center gap-1 rounded-lg px-4 py-2 transition-all duration-150 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
                :class="active === 'messages' ? 'text-neutral-900 dark:text-neutral-50' : 'text-neutral-400 hover:text-neutral-600 dark:text-neutral-500 dark:hover:text-neutral-300'"
                :aria-current="active === 'messages' ? 'page' : null"
            >
                <svg
                    class="h-6 w-6 transition-transform duration-150"
                    :class="active === 'messages' ? 'scale-110' : ''"
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
                <span class="text-xs font-medium">Messages</span>
            </button>
            <button
                @click="active = 'profile'"
                type="button"
                class="flex flex-col items-center gap-1 rounded-lg px-4 py-2 transition-all duration-150 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
                :class="active === 'profile' ? 'text-neutral-900 dark:text-neutral-50' : 'text-neutral-400 hover:text-neutral-600 dark:text-neutral-500 dark:hover:text-neutral-300'"
                :aria-current="active === 'profile' ? 'page' : null"
            >
                <svg
                    class="h-6 w-6 transition-transform duration-150"
                    :class="active === 'profile' ? 'scale-110' : ''"
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
                <span class="text-xs font-medium">Profile</span>
            </button>
        </div>
    </nav>
</div>

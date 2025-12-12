---
slug: multi-column-layout
title: Multi Column Layout
category: app-shells
github: caresome
dependencies: []
publish_at: 2025-12-02 00:00:00
---

<div
    x-data="{
        selectedChat: 1,
        mobileView: 'list',
        init() {
            this.$watch('mobileView', (view) => {
                if (view === 'chat') {
                    this.$nextTick(() => {
                        document.getElementById('message-input')?.focus();
                    });
                } else if (view === 'list') {
                    this.$nextTick(() => {
                        document.getElementById('conversation-search')?.focus();
                    });
                }
            });
        }
    }"
    class="flex h-screen bg-neutral-50 dark:bg-neutral-950"
>
    <!-- Skip Navigation Link -->
    <a
        href="#main-content"
        class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-[60] focus:rounded-lg focus:bg-neutral-900 focus:px-4 focus:py-2 focus:text-sm focus:font-medium focus:text-white focus:ring-2 focus:ring-neutral-500 focus:ring-offset-2 focus:outline-none dark:focus:bg-white dark:focus:text-neutral-900"
    >
        Skip to main content
    </a>

    <!-- Narrow Icon Sidebar -->
    <aside
        id="icon-sidebar"
        class="hidden w-16 flex-col bg-white md:flex dark:bg-neutral-900"
        role="navigation"
        aria-label="Quick navigation"
    >
        <!-- Logo -->
        <div class="flex h-16 items-center justify-center border-b border-neutral-200 dark:border-neutral-700">
            <a
                href="#"
                class="group flex items-center justify-center rounded-lg focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-offset-2 dark:focus-visible:ring-neutral-100"
                aria-label="Caresome - Go to homepage"
            >
                <div
                    class="flex h-8 w-8 items-center justify-center rounded-lg bg-neutral-900 shadow-sm transition-transform duration-150 group-hover:scale-105 dark:bg-white"
                    aria-hidden="true"
                >
                    <span class="text-sm font-bold text-white dark:text-neutral-900">C</span>
                </div>
            </a>
        </div>

        <!-- Icon Navigation -->
        <nav id="icon-nav" class="flex flex-1 flex-col items-center gap-1 py-4" aria-label="Main navigation">
            <button
                type="button"
                class="inline-flex h-10 w-10 items-center justify-center rounded-lg bg-neutral-100 text-neutral-900 shadow-sm focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-offset-2 dark:bg-neutral-800 dark:text-neutral-50 dark:focus-visible:ring-neutral-100"
                aria-label="Messages"
                aria-current="page"
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
            <button
                type="button"
                class="inline-flex h-10 w-10 items-center justify-center rounded-lg text-neutral-500 transition-all duration-150 hover:scale-105 hover:bg-neutral-100 hover:text-neutral-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-offset-2 active:bg-neutral-200 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:ring-neutral-100 dark:active:bg-neutral-700"
                aria-label="Contacts"
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
                        d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"
                    />
                </svg>
            </button>
            <button
                type="button"
                class="inline-flex h-10 w-10 items-center justify-center rounded-lg text-neutral-500 transition-all duration-150 hover:scale-105 hover:bg-neutral-100 hover:text-neutral-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-offset-2 active:bg-neutral-200 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:ring-neutral-100 dark:active:bg-neutral-700"
                aria-label="Calls"
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
                        d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"
                    />
                </svg>
            </button>
            <button
                type="button"
                class="inline-flex h-10 w-10 items-center justify-center rounded-lg text-neutral-500 transition-all duration-150 hover:scale-105 hover:bg-neutral-100 hover:text-neutral-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-offset-2 active:bg-neutral-200 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:ring-neutral-100 dark:active:bg-neutral-700"
                aria-label="Settings"
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
                        d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z"
                    />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
            </button>
        </nav>

        <!-- User Avatar -->
        <div class="border-t border-neutral-200 p-3 dark:border-neutral-700">
            <a
                href="#"
                class="flex items-center justify-center rounded-lg p-1 transition-all duration-150 hover:scale-105 hover:bg-neutral-100 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-offset-2 active:bg-neutral-200 dark:hover:bg-neutral-800 dark:focus-visible:ring-neutral-100 dark:active:bg-neutral-700"
                aria-label="View profile for current user"
            >
                <div class="relative">
                    <img
                        class="h-8 w-8 rounded-full object-cover ring-2 ring-neutral-100 dark:ring-neutral-800"
                        src="https://github.com/caresome.png"
                        alt=""
                    />
                    <span
                        class="absolute -right-0.5 -bottom-0.5 block h-2.5 w-2.5 rounded-full bg-emerald-500 ring-2 ring-white dark:ring-neutral-900"
                        aria-hidden="true"
                    ></span>
                </div>
                <span class="sr-only">(Online)</span>
            </a>
        </div>
    </aside>

    <!-- Vertical Divider -->
    <div class="hidden w-px bg-neutral-200 md:block dark:bg-neutral-700" role="separator" aria-hidden="true"></div>

    <!-- Conversations List -->
    <aside
        id="conversations-list"
        :class="mobileView === 'list' ? 'flex' : 'hidden md:flex'"
        class="w-full flex-col bg-white md:w-80 dark:bg-neutral-900"
        role="region"
        aria-label="Conversations"
    >
        <!-- Header -->
        <header class="flex h-16 items-center justify-between border-b border-neutral-200 px-4 dark:border-neutral-700">
            <h2 id="conversations-heading" class="text-sm font-semibold text-neutral-900 dark:text-neutral-50">
                Messages
            </h2>
            <button
                type="button"
                class="inline-flex h-8 w-8 items-center justify-center rounded-lg text-neutral-500 transition-all duration-150 hover:scale-105 hover:bg-neutral-100 hover:text-neutral-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-offset-2 active:bg-neutral-200 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:ring-neutral-100 dark:active:bg-neutral-700"
                aria-label="Compose new message"
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
                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"
                    />
                </svg>
            </button>
        </header>

        <!-- Search -->
        <div class="border-b border-neutral-200 p-3 dark:border-neutral-700">
            <div class="relative">
                <label for="conversation-search" class="sr-only">Search conversations</label>
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
                    id="conversation-search"
                    placeholder="Search conversations..."
                    class="h-9 w-full rounded-lg border border-neutral-300 bg-neutral-50 pr-3 pl-9 text-sm text-neutral-900 placeholder-neutral-400 transition-all duration-150 focus:border-neutral-400 focus:bg-white focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-offset-2 dark:border-neutral-700/50 dark:bg-neutral-800 dark:text-white dark:placeholder-neutral-500 dark:focus:border-neutral-600/50 dark:focus:bg-neutral-700 dark:focus-visible:ring-neutral-100"
                />
            </div>
        </div>

        <!-- Conversation List -->
        <div class="flex-1 space-y-1 overflow-y-auto p-2" role="listbox" aria-labelledby="conversations-heading">
            <button
                @click="selectedChat = 1; mobileView = 'chat'"
                type="button"
                :class="selectedChat === 1 ? 'bg-neutral-100 dark:bg-neutral-800' : 'hover:bg-neutral-50 dark:hover:bg-neutral-800/50'"
                class="flex w-full gap-3 rounded-lg p-3 text-left transition-all duration-150 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-inset dark:focus-visible:ring-neutral-100"
                role="option"
                :aria-selected="(selectedChat === 1).toString()"
                id="conversation-1"
            >
                <div class="relative">
                    <img
                        class="h-12 w-12 shrink-0 rounded-full object-cover ring-2 ring-neutral-100 dark:ring-neutral-800"
                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt=""
                    />
                    <span
                        class="absolute right-0 bottom-0 h-3 w-3 rounded-full border-2 border-white bg-emerald-500 dark:border-neutral-900"
                        aria-hidden="true"
                    ></span>
                </div>
                <div class="min-w-0 flex-1">
                    <div class="flex items-center justify-between gap-2">
                        <p class="truncate text-sm font-medium text-neutral-900 dark:text-neutral-50">Sarah Johnson</p>
                        <span class="shrink-0 text-xs text-neutral-500 dark:text-neutral-400">2m</span>
                    </div>
                    <p class="mt-1 truncate text-sm text-neutral-500 dark:text-neutral-400">
                        Sounds great! Let me know when you're free 😊
                    </p>
                </div>
                <span class="sr-only">Online</span>
            </button>
            <button
                @click="selectedChat = 2; mobileView = 'chat'"
                type="button"
                :class="selectedChat === 2 ? 'bg-neutral-100 dark:bg-neutral-800' : 'hover:bg-neutral-50 dark:hover:bg-neutral-800/50'"
                class="flex w-full gap-3 rounded-lg p-3 text-left transition-all duration-150 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-inset dark:focus-visible:ring-neutral-100"
                role="option"
                :aria-selected="(selectedChat === 2).toString()"
                id="conversation-2"
            >
                <div class="relative">
                    <img
                        class="h-12 w-12 shrink-0 rounded-full object-cover ring-2 ring-neutral-100 dark:ring-neutral-800"
                        src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt=""
                    />
                    <span
                        class="absolute right-0 bottom-0 h-3 w-3 rounded-full border-2 border-white bg-emerald-500 dark:border-neutral-900"
                        aria-hidden="true"
                    ></span>
                </div>
                <div class="min-w-0 flex-1">
                    <div class="flex items-center justify-between gap-2">
                        <p class="truncate text-sm font-medium text-neutral-900 dark:text-neutral-50">Michael Chen</p>
                        <span class="shrink-0 text-xs text-neutral-500 dark:text-neutral-400">1h</span>
                    </div>
                    <p class="mt-1 truncate text-sm text-neutral-500 dark:text-neutral-400">
                        The meeting is confirmed for tomorrow
                    </p>
                </div>
                <span class="sr-only">Online</span>
            </button>
            <button
                @click="selectedChat = 3; mobileView = 'chat'"
                type="button"
                :class="selectedChat === 3 ? 'bg-neutral-100 dark:bg-neutral-800' : 'hover:bg-neutral-50 dark:hover:bg-neutral-800/50'"
                class="flex w-full gap-3 rounded-lg p-3 text-left transition-all duration-150 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-inset dark:focus-visible:ring-neutral-100"
                role="option"
                :aria-selected="(selectedChat === 3).toString()"
                id="conversation-3"
            >
                <div class="relative">
                    <img
                        class="h-12 w-12 shrink-0 rounded-full object-cover ring-2 ring-neutral-100 dark:ring-neutral-800"
                        src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt=""
                    />
                    <span
                        class="absolute right-0 bottom-0 h-3 w-3 rounded-full border-2 border-white bg-neutral-300 dark:border-neutral-900 dark:bg-neutral-600"
                        aria-hidden="true"
                    ></span>
                </div>
                <div class="min-w-0 flex-1">
                    <div class="flex items-center justify-between gap-2">
                        <p class="truncate text-sm font-medium text-neutral-900 dark:text-neutral-50">Emily Davis</p>
                        <span class="shrink-0 text-xs text-neutral-500 dark:text-neutral-400">3h</span>
                    </div>
                    <p class="mt-1 truncate text-sm text-neutral-500 dark:text-neutral-400">
                        I've sent over the design files
                    </p>
                </div>
                <span class="sr-only">Offline</span>
            </button>
            <button
                @click="selectedChat = 4; mobileView = 'chat'"
                type="button"
                :class="selectedChat === 4 ? 'bg-neutral-100 dark:bg-neutral-800' : 'hover:bg-neutral-50 dark:hover:bg-neutral-800/50'"
                class="flex w-full gap-3 rounded-lg p-3 text-left transition-all duration-150 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-inset dark:focus-visible:ring-neutral-100"
                role="option"
                :aria-selected="(selectedChat === 4).toString()"
                id="conversation-4"
            >
                <div class="relative">
                    <img
                        class="h-12 w-12 shrink-0 rounded-full object-cover ring-2 ring-neutral-100 dark:ring-neutral-800"
                        src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt=""
                    />
                    <span
                        class="absolute right-0 bottom-0 h-3 w-3 rounded-full border-2 border-white bg-neutral-300 dark:border-neutral-900 dark:bg-neutral-600"
                        aria-hidden="true"
                    ></span>
                </div>
                <div class="min-w-0 flex-1">
                    <div class="flex items-center justify-between gap-2">
                        <p class="truncate text-sm font-medium text-neutral-900 dark:text-neutral-50">James Wilson</p>
                        <span class="shrink-0 text-xs text-neutral-500 dark:text-neutral-400">1d</span>
                    </div>
                    <p class="mt-1 truncate text-sm text-neutral-500 dark:text-neutral-400">Thanks for your help!</p>
                </div>
                <span class="sr-only">Offline</span>
            </button>
        </div>
    </aside>

    <!-- Vertical Divider -->
    <div class="hidden w-px bg-neutral-200 md:block dark:bg-neutral-700" role="separator" aria-hidden="true"></div>

    <!-- Chat Area -->
    <main
        id="main-content"
        :class="mobileView === 'chat' ? 'flex' : 'hidden md:flex'"
        class="flex-1 flex-col bg-white dark:bg-neutral-900"
        tabindex="-1"
        aria-label="Chat with Sarah Johnson"
    >
        <!-- Chat Header -->
        <header class="flex h-16 items-center justify-between border-b border-neutral-200 px-4 dark:border-neutral-700">
            <div class="flex items-center gap-3">
                <!-- Mobile Back Button -->
                <button
                    @click="mobileView = 'list'"
                    type="button"
                    class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-neutral-500 transition-all duration-150 hover:scale-105 hover:bg-neutral-100 hover:text-neutral-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-offset-2 active:bg-neutral-200 md:hidden dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:ring-neutral-100 dark:active:bg-neutral-700"
                    aria-label="Back to conversations list"
                >
                    <svg
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                        aria-hidden="true"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                    </svg>
                </button>
                <div class="relative">
                    <img
                        class="h-10 w-10 rounded-full object-cover ring-2 ring-neutral-100 dark:ring-neutral-800"
                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt="Sarah Johnson"
                    />
                    <span
                        class="absolute right-0 bottom-0 h-2.5 w-2.5 rounded-full border-2 border-white bg-emerald-500 dark:border-neutral-900"
                        aria-hidden="true"
                    ></span>
                </div>
                <div>
                    <p class="text-sm font-medium text-neutral-900 dark:text-neutral-50">Sarah Johnson</p>
                    <p class="text-xs text-emerald-600 dark:text-emerald-400">
                        <span aria-hidden="true">Online</span>
                        <span class="sr-only">Status: Online</span>
                    </p>
                </div>
            </div>
            <div class="flex items-center gap-1">
                <button
                    type="button"
                    class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-neutral-500 transition-all duration-150 hover:scale-105 hover:bg-neutral-100 hover:text-neutral-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-offset-2 active:bg-neutral-200 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:ring-neutral-100 dark:active:bg-neutral-700"
                    aria-label="Voice call"
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
                            d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"
                        />
                    </svg>
                </button>
                <button
                    type="button"
                    class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-neutral-500 transition-all duration-150 hover:scale-105 hover:bg-neutral-100 hover:text-neutral-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-offset-2 active:bg-neutral-200 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:ring-neutral-100 dark:active:bg-neutral-700"
                    aria-label="Video call"
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
                            d="m15.75 10.5 4.72-4.72a.75.75 0 0 1 1.28.53v11.38a.75.75 0 0 1-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25h-9A2.25 2.25 0 0 0 2.25 7.5v9a2.25 2.25 0 0 0 2.25 2.25Z"
                        />
                    </svg>
                </button>
                <button
                    type="button"
                    class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-neutral-500 transition-all duration-150 hover:scale-105 hover:bg-neutral-100 hover:text-neutral-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-offset-2 active:bg-neutral-200 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:ring-neutral-100 dark:active:bg-neutral-700"
                    aria-label="More options"
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
                            d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z"
                        />
                    </svg>
                </button>
            </div>
        </header>

        <!-- Messages -->
        <div
            class="flex-1 overflow-y-auto p-4"
            role="log"
            aria-live="polite"
            aria-label="Chat messages"
            aria-relevant="additions"
        >
            <div class="mx-auto max-w-2xl space-y-4">
                <!-- Date Divider -->
                <div class="flex items-center justify-center" role="separator" aria-label="Today">
                    <span
                        class="rounded-full bg-neutral-100 px-3 py-1 text-xs font-medium text-neutral-500 shadow-sm dark:bg-neutral-800 dark:text-neutral-400"
                    >
                        Today
                    </span>
                </div>

                <!-- Received Message -->
                <article class="flex gap-3" aria-label="Message from Sarah Johnson at 10:24 AM">
                    <img
                        class="h-8 w-8 shrink-0 rounded-full object-cover ring-1 ring-neutral-100 dark:ring-neutral-800"
                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt="Sarah Johnson"
                    />
                    <div class="max-w-[75%]">
                        <div class="rounded-2xl rounded-tl-md bg-neutral-100 px-4 py-2.5 shadow-sm dark:bg-neutral-800">
                            <p class="text-sm text-neutral-900 dark:text-neutral-50">
                                Hey! How's the project coming along?
                            </p>
                        </div>
                        <time
                            class="mt-1 block text-xs text-neutral-500 dark:text-neutral-400"
                            datetime="2025-12-12T10:24:00"
                        >
                            10:24 AM
                        </time>
                    </div>
                </article>

                <!-- Sent Message -->
                <article class="flex justify-end" aria-label="Your message at 10:26 AM">
                    <div class="max-w-[75%]">
                        <div class="rounded-2xl rounded-tr-md bg-neutral-900 px-4 py-2.5 shadow-sm dark:bg-white">
                            <p class="text-sm text-white dark:text-neutral-900">
                                Going well! Just finished the main layout. Should be ready for review by end of day.
                            </p>
                        </div>
                        <time
                            class="mt-1 block text-right text-xs text-neutral-500 dark:text-neutral-400"
                            datetime="2025-12-12T10:26:00"
                        >
                            10:26 AM
                        </time>
                    </div>
                </article>

                <!-- Received Message -->
                <article class="flex gap-3" aria-label="Message from Sarah Johnson at 10:28 AM">
                    <img
                        class="h-8 w-8 shrink-0 rounded-full object-cover ring-1 ring-neutral-100 dark:ring-neutral-800"
                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt="Sarah Johnson"
                    />
                    <div class="max-w-[75%]">
                        <div class="rounded-2xl rounded-tl-md bg-neutral-100 px-4 py-2.5 shadow-sm dark:bg-neutral-800">
                            <p class="text-sm text-neutral-900 dark:text-neutral-50">
                                That's awesome! Can't wait to see it. Do you need any help with the responsive design?
                            </p>
                        </div>
                        <time
                            class="mt-1 block text-xs text-neutral-500 dark:text-neutral-400"
                            datetime="2025-12-12T10:28:00"
                        >
                            10:28 AM
                        </time>
                    </div>
                </article>

                <!-- Sent Message -->
                <article class="flex justify-end" aria-label="Your message at 10:30 AM">
                    <div class="max-w-[75%]">
                        <div class="rounded-2xl rounded-tr-md bg-neutral-900 px-4 py-2.5 shadow-sm dark:bg-white">
                            <p class="text-sm text-white dark:text-neutral-900">
                                Actually yes! Could use some input on the mobile breakpoints. Free for a quick call
                                later?
                            </p>
                        </div>
                        <time
                            class="mt-1 block text-right text-xs text-neutral-500 dark:text-neutral-400"
                            datetime="2025-12-12T10:30:00"
                        >
                            10:30 AM
                        </time>
                    </div>
                </article>

                <!-- Received Message -->
                <article class="flex gap-3" aria-label="Message from Sarah Johnson at 10:32 AM">
                    <img
                        class="h-8 w-8 shrink-0 rounded-full object-cover ring-1 ring-neutral-100 dark:ring-neutral-800"
                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt="Sarah Johnson"
                    />
                    <div class="max-w-[75%]">
                        <div class="rounded-2xl rounded-tl-md bg-neutral-100 px-4 py-2.5 shadow-sm dark:bg-neutral-800">
                            <p class="text-sm text-neutral-900 dark:text-neutral-50">
                                Sounds great! Let me know when you're free 😊
                            </p>
                        </div>
                        <time
                            class="mt-1 block text-xs text-neutral-500 dark:text-neutral-400"
                            datetime="2025-12-12T10:32:00"
                        >
                            10:32 AM
                        </time>
                    </div>
                </article>
            </div>
        </div>

        <!-- Message Input -->
        <footer class="border-t border-neutral-200 p-4 dark:border-neutral-700">
            <div class="flex items-end gap-3">
                <button
                    type="button"
                    class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-lg text-neutral-500 transition-all duration-150 hover:scale-105 hover:bg-neutral-100 hover:text-neutral-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-offset-2 active:bg-neutral-200 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:ring-neutral-100 dark:active:bg-neutral-700"
                    aria-label="Attach file"
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
                            d="m18.375 12.739-7.693 7.693a4.5 4.5 0 0 1-6.364-6.364l10.94-10.94A3 3 0 1 1 19.5 7.372L8.552 18.32m.009-.01-.01.01m5.699-9.941-7.81 7.81a1.5 1.5 0 0 0 2.112 2.13"
                        />
                    </svg>
                </button>
                <div class="flex-1">
                    <label for="message-input" class="sr-only">Type a message to Sarah Johnson</label>
                    <textarea
                        id="message-input"
                        rows="1"
                        placeholder="Type a message..."
                        class="w-full resize-none rounded-xl border border-neutral-300 bg-neutral-50 px-4 py-2.5 text-sm text-neutral-900 placeholder-neutral-400 shadow-sm transition-all duration-150 focus:border-neutral-400 focus:bg-white focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-offset-2 dark:border-neutral-700/50 dark:bg-neutral-800 dark:text-white dark:placeholder-neutral-500 dark:focus:border-neutral-600/50 dark:focus:bg-neutral-700 dark:focus-visible:ring-neutral-100"
                        aria-describedby="message-hint"
                    ></textarea>
                    <span id="message-hint" class="sr-only">Press Enter to send, Shift+Enter for new line</span>
                </div>
                <button
                    type="submit"
                    class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-neutral-900 text-white shadow-sm transition-all duration-150 hover:bg-neutral-800 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-offset-2 active:scale-[0.98] active:bg-neutral-950 dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100 dark:focus-visible:ring-neutral-100 dark:active:bg-neutral-200"
                    aria-label="Send message"
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
                            d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5"
                        />
                    </svg>
                </button>
            </div>
        </footer>
    </main>
</div>

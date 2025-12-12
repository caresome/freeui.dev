---
slug: card-heading-with-actions
title: Card Heading with Actions
category: headings
github: caresome
dependencies: []
publish_at: 2025-12-07 07:00:00
---

<div data-preview-only class="mx-auto max-w-md">
    <div
        x-data="{ open: false }"
        class="rounded-xl border border-neutral-200 bg-white shadow-sm dark:border-neutral-800 dark:bg-neutral-900"
    >
        <div class="border-b border-neutral-200 px-5 py-4 dark:border-neutral-800">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <img
                        class="h-10 w-10 rounded-full ring-1 ring-neutral-200 dark:ring-neutral-700"
                        src="https://github.com/caresome.png"
                        alt="User avatar"
                    />
                    <div>
                        <h3 class="text-base font-semibold text-neutral-900 dark:text-neutral-50">Project Update</h3>
                        <p class="text-sm text-neutral-500 dark:text-neutral-400">
                            Posted by Caresome &middot; 2 hours ago
                        </p>
                    </div>
                </div>

                <!-- Dropdown -->
                <div class="relative">
                    <button
                        @click="open = !open"
                        type="button"
                        class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-neutral-500 transition-all duration-150 hover:scale-105 hover:bg-neutral-100 hover:text-neutral-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-offset-2 active:bg-neutral-200 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:ring-neutral-100 dark:active:bg-neutral-700"
                        :aria-expanded="open"
                        aria-haspopup="true"
                        aria-label="Open options"
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

                    <!-- Dropdown menu -->
                    <div
                        x-show="open"
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                        @click.outside="open = false"
                        @keydown.escape.window="open = false"
                        class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-xl border border-neutral-200 bg-white py-1 shadow-xl shadow-neutral-900/5 dark:border-neutral-700 dark:bg-neutral-800 dark:shadow-neutral-950/50"
                        role="menu"
                        aria-orientation="vertical"
                        x-cloak
                    >
                        <a
                            href="#"
                            class="flex items-center gap-2 px-4 py-2 text-sm text-neutral-700 transition-colors hover:bg-neutral-50 focus:outline-none focus-visible:bg-neutral-100 dark:text-neutral-300 dark:hover:bg-neutral-700/50 dark:focus-visible:bg-neutral-700"
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
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"
                                />
                            </svg>
                            Edit
                        </a>
                        <a
                            href="#"
                            class="flex items-center gap-2 px-4 py-2 text-sm text-neutral-700 transition-colors hover:bg-neutral-50 focus:outline-none focus-visible:bg-neutral-100 dark:text-neutral-300 dark:hover:bg-neutral-700/50 dark:focus-visible:bg-neutral-700"
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
                                    d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75"
                                />
                            </svg>
                            Duplicate
                        </a>
                        <div class="my-1 border-t border-neutral-200 dark:border-neutral-700"></div>
                        <a
                            href="#"
                            class="flex items-center gap-2 px-4 py-2 text-sm text-red-600 transition-colors hover:bg-red-50 focus:outline-none focus-visible:bg-red-100 dark:text-red-400 dark:hover:bg-red-500/10 dark:focus-visible:bg-red-500/20"
                            role="menuitem"
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
                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"
                                />
                            </svg>
                            Delete
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-5 py-8">
            <p class="text-center text-sm text-neutral-500 dark:text-neutral-400">Card content goes here</p>
        </div>
    </div>
</div>

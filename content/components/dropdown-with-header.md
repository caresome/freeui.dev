---
slug: dropdown-with-header
title: Dropdown With Header
category: menus-dropdowns
github: caresome
dependencies: []
publish_at: 2025-12-14 11:00:00
---

<div data-preview-only class="flex min-h-[400px] items-start justify-center p-8">
    <div
        x-data="{
            open: false,
            activeIndex: -1,
            items: ['profile', 'settings', 'help', 'signout'],
            toggle() {
                this.open = !this.open;
                if (this.open) {
                    this.$nextTick(() => this.focusItem(0));
                }
            },
            close() {
                this.open = false;
                this.activeIndex = -1;
                this.$refs.trigger.focus();
            },
            focusItem(index) {
                this.activeIndex = index;
                this.$nextTick(() => {
                    this.$refs[this.items[index]]?.focus();
                });
            },
            next() {
                const nextIndex = this.activeIndex < this.items.length - 1 ? this.activeIndex + 1 : 0;
                this.focusItem(nextIndex);
            },
            prev() {
                const prevIndex = this.activeIndex > 0 ? this.activeIndex - 1 : this.items.length - 1;
                this.focusItem(prevIndex);
            },
            selectItem() {
                if (this.activeIndex >= 0) {
                    this.$refs[this.items[this.activeIndex]].click();
                }
            }
        }"
        @keydown.escape.window="if (open) close()"
        @keydown.arrow-down.prevent="open ? next() : toggle()"
        @keydown.arrow-up.prevent="open ? prev() : toggle()"
        @keydown.enter.prevent="open && activeIndex >= 0 ? selectItem() : toggle()"
        @keydown.tab="if (open) close()"
        class="relative"
    >
        <!-- Trigger Button (User Avatar) -->
        <button
            x-ref="trigger"
            @click="toggle()"
            type="button"
            class="flex items-center gap-2 rounded-full p-1 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
            :aria-expanded="open"
            aria-haspopup="true"
            aria-label="User menu"
        >
            <img
                class="h-9 w-9 rounded-full ring-2 ring-neutral-200 dark:ring-neutral-700"
                src="https://github.com/caresome.png"
                alt="User avatar"
            />
        </button>

        <!-- Dropdown Menu -->
        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            @click.outside="close()"
            class="absolute right-0 z-10 mt-2 w-64 origin-top-right rounded-xl border border-neutral-200 bg-white p-1.5 shadow-lg dark:border-neutral-700 dark:bg-neutral-800"
            role="menu"
            aria-orientation="vertical"
            x-cloak
        >
            <!-- Header with user info (not navigable) -->
            <div class="border-b border-neutral-200 px-4 py-3 dark:border-neutral-700">
                <div class="flex items-center gap-3">
                    <img
                        class="h-10 w-10 rounded-full"
                        src="https://github.com/caresome.png"
                        alt=""
                        aria-hidden="true"
                    />
                    <div class="min-w-0 flex-1">
                        <p class="truncate text-sm font-medium text-neutral-900 dark:text-neutral-50">Ankit Thapa</p>
                        <p class="truncate text-sm text-neutral-500 dark:text-neutral-400">caresome@proton.me</p>
                    </div>
                </div>
            </div>

            <!-- Menu items -->
            <div class="py-1">
                <a
                    x-ref="profile"
                    href="#"
                    class="flex items-center gap-3 rounded-lg px-4 py-2.5 text-sm text-neutral-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-neutral-900 dark:text-neutral-300 dark:focus-visible:outline-neutral-100"
                    :class="activeIndex === 0 ? 'bg-neutral-100 dark:bg-neutral-700' : 'hover:bg-neutral-100 dark:hover:bg-neutral-700'"
                    role="menuitem"
                    tabindex="-1"
                    @mouseenter="activeIndex = 0"
                    @mouseleave="activeIndex = -1"
                >
                    <svg
                        class="h-4 w-4 text-neutral-400"
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
                    Your Profile
                </a>
                <a
                    x-ref="settings"
                    href="#"
                    class="flex items-center gap-3 rounded-lg px-4 py-2.5 text-sm text-neutral-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-neutral-900 dark:text-neutral-300 dark:focus-visible:outline-neutral-100"
                    :class="activeIndex === 1 ? 'bg-neutral-100 dark:bg-neutral-700' : 'hover:bg-neutral-100 dark:hover:bg-neutral-700'"
                    role="menuitem"
                    tabindex="-1"
                    @mouseenter="activeIndex = 1"
                    @mouseleave="activeIndex = -1"
                >
                    <svg
                        class="h-4 w-4 text-neutral-400"
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
                    Settings
                </a>
                <a
                    x-ref="help"
                    href="#"
                    class="flex items-center gap-3 rounded-lg px-4 py-2.5 text-sm text-neutral-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-neutral-900 dark:text-neutral-300 dark:focus-visible:outline-neutral-100"
                    :class="activeIndex === 2 ? 'bg-neutral-100 dark:bg-neutral-700' : 'hover:bg-neutral-100 dark:hover:bg-neutral-700'"
                    role="menuitem"
                    tabindex="-1"
                    @mouseenter="activeIndex = 2"
                    @mouseleave="activeIndex = -1"
                >
                    <svg
                        class="h-4 w-4 text-neutral-400"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                        aria-hidden="true"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z"
                        />
                    </svg>
                    Help & Support
                </a>
            </div>

            <!-- Footer -->
            <div class="border-t border-neutral-200 py-1 dark:border-neutral-700">
                <a
                    x-ref="signout"
                    href="#"
                    class="flex items-center gap-3 rounded-lg px-4 py-2.5 text-sm text-neutral-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-neutral-900 dark:text-neutral-300 dark:focus-visible:outline-neutral-100"
                    :class="activeIndex === 3 ? 'bg-neutral-100 dark:bg-neutral-700' : 'hover:bg-neutral-100 dark:hover:bg-neutral-700'"
                    role="menuitem"
                    tabindex="-1"
                    @mouseenter="activeIndex = 3"
                    @mouseleave="activeIndex = -1"
                >
                    <svg
                        class="h-4 w-4 text-neutral-400"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                        aria-hidden="true"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9"
                        />
                    </svg>
                    Sign out
                </a>
            </div>
        </div>
    </div>
</div>

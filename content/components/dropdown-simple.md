---
slug: dropdown-simple
title: Dropdown Simple
category: overlays
github: caresome
dependencies: []
publish_at: 2025-12-14 00:00:00
---

<div data-preview-only class="flex min-h-[300px] items-start justify-center p-8">
    <div
        x-data="{
            open: false,
            activeIndex: -1,
            items: ['account', 'support', 'license', 'signout'],
            toggle() {
                this.open = !this.open;
                if (this.open) this.activeIndex = -1;
            },
            close() {
                this.open = false;
                this.activeIndex = -1;
            },
            next() {
                this.activeIndex = this.activeIndex < this.items.length - 1 ? this.activeIndex + 1 : 0;
            },
            prev() {
                this.activeIndex = this.activeIndex > 0 ? this.activeIndex - 1 : this.items.length - 1;
            },
            selectItem() {
                if (this.activeIndex >= 0) {
                    this.$refs[this.items[this.activeIndex]].click();
                }
            }
        }"
        @keydown.escape.window="close()"
        @keydown.arrow-down.prevent="open ? next() : toggle()"
        @keydown.arrow-up.prevent="open ? prev() : toggle()"
        @keydown.enter.prevent="open && activeIndex >= 0 ? selectItem() : toggle()"
        @keydown.space.prevent="open && activeIndex >= 0 ? selectItem() : toggle()"
        @keydown.tab="close()"
        class="relative"
    >
        <!-- Trigger Button -->
        <button
            @click="toggle()"
            type="button"
            class="inline-flex items-center gap-2 rounded-lg bg-white px-4 py-2.5 text-sm font-medium text-neutral-700 shadow-sm ring-1 ring-neutral-200 transition-all hover:bg-neutral-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-offset-2 dark:bg-neutral-800 dark:text-neutral-300 dark:ring-neutral-700 dark:hover:bg-neutral-700 dark:focus-visible:ring-neutral-100"
            :aria-expanded="open"
            aria-haspopup="true"
        >
            Options
            <svg
                :class="open ? 'rotate-180' : ''"
                class="h-4 w-4 text-neutral-400 transition-transform duration-150"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
                aria-hidden="true"
            >
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
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
            class="absolute left-0 z-10 mt-2 w-48 origin-top-left rounded-lg border border-neutral-200 bg-white py-1 shadow-lg dark:border-neutral-700 dark:bg-neutral-800"
            role="menu"
            aria-orientation="vertical"
            x-cloak
        >
            <a
                x-ref="account"
                href="#"
                class="block px-4 py-2 text-sm text-neutral-700 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-inset dark:text-neutral-300 dark:focus-visible:ring-neutral-100"
                :class="activeIndex === 0 ? 'bg-neutral-100 dark:bg-neutral-700' : 'hover:bg-neutral-100 dark:hover:bg-neutral-700'"
                role="menuitem"
                tabindex="-1"
                @mouseenter="activeIndex = 0"
                @mouseleave="activeIndex = -1"
            >
                Account settings
            </a>
            <a
                x-ref="support"
                href="#"
                class="block px-4 py-2 text-sm text-neutral-700 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-inset dark:text-neutral-300 dark:focus-visible:ring-neutral-100"
                :class="activeIndex === 1 ? 'bg-neutral-100 dark:bg-neutral-700' : 'hover:bg-neutral-100 dark:hover:bg-neutral-700'"
                role="menuitem"
                tabindex="-1"
                @mouseenter="activeIndex = 1"
                @mouseleave="activeIndex = -1"
            >
                Support
            </a>
            <a
                x-ref="license"
                href="#"
                class="block px-4 py-2 text-sm text-neutral-700 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-inset dark:text-neutral-300 dark:focus-visible:ring-neutral-100"
                :class="activeIndex === 2 ? 'bg-neutral-100 dark:bg-neutral-700' : 'hover:bg-neutral-100 dark:hover:bg-neutral-700'"
                role="menuitem"
                tabindex="-1"
                @mouseenter="activeIndex = 2"
                @mouseleave="activeIndex = -1"
            >
                License
            </a>
            <a
                x-ref="signout"
                href="#"
                class="block px-4 py-2 text-sm text-neutral-700 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-inset dark:text-neutral-300 dark:focus-visible:ring-neutral-100"
                :class="activeIndex === 3 ? 'bg-neutral-100 dark:bg-neutral-700' : 'hover:bg-neutral-100 dark:hover:bg-neutral-700'"
                role="menuitem"
                tabindex="-1"
                @mouseenter="activeIndex = 3"
                @mouseleave="activeIndex = -1"
            >
                Sign out
            </a>
        </div>
    </div>
</div>

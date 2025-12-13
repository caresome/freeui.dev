---
slug: dropdown-with-icons
title: Dropdown With Icons
category: overlays
github: caresome
dependencies: []
publish_at: 2025-12-14 00:00:00
---

<div data-preview-only class="flex min-h-[350px] items-start justify-center p-8">
    <div
        x-data="{
            open: false,
            activeIndex: -1,
            items: ['edit', 'duplicate', 'share', 'download', 'delete'],
            toggle() {
                this.open = !this.open;
                if (this.open) this.activeIndex = 0;
            },
            close() {
                this.open = false;
                this.activeIndex = -1;
                this.$refs.trigger.focus();
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
        @keydown.escape.window="if (open) close()"
        @keydown.arrow-down.prevent="open ? next() : toggle()"
        @keydown.arrow-up.prevent="open ? prev() : toggle()"
        @keydown.enter.prevent="open && activeIndex >= 0 ? selectItem() : toggle()"
        @keydown.tab="if (open) close()"
        class="relative"
    >
        <!-- Trigger Button -->
        <button
            x-ref="trigger"
            @click="toggle()"
            type="button"
            class="inline-flex items-center gap-2 rounded-lg bg-neutral-900 px-4 py-2.5 text-sm font-medium text-white shadow-sm transition-all hover:bg-neutral-800 focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-offset-2 active:scale-[0.98] dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100 dark:focus-visible:ring-neutral-100"
            :aria-expanded="open"
            aria-haspopup="true"
        >
            Actions
            <svg
                :class="open ? 'rotate-180' : ''"
                class="h-4 w-4 transition-transform duration-150"
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
            class="absolute left-0 z-10 mt-2 w-56 origin-top-left rounded-lg border border-neutral-200 bg-white py-1 shadow-lg dark:border-neutral-700 dark:bg-neutral-800"
            role="menu"
            aria-orientation="vertical"
            x-cloak
        >
            <a
                x-ref="edit"
                href="#"
                class="flex items-center gap-3 px-4 py-2.5 text-sm text-neutral-700 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-inset dark:text-neutral-300 dark:focus-visible:ring-neutral-100"
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
                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"
                    />
                </svg>
                Edit
            </a>
            <a
                x-ref="duplicate"
                href="#"
                class="flex items-center gap-3 px-4 py-2.5 text-sm text-neutral-700 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-inset dark:text-neutral-300 dark:focus-visible:ring-neutral-100"
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
                        d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75"
                    />
                </svg>
                Duplicate
            </a>
            <a
                x-ref="share"
                href="#"
                class="flex items-center gap-3 px-4 py-2.5 text-sm text-neutral-700 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-inset dark:text-neutral-300 dark:focus-visible:ring-neutral-100"
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
                        d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z"
                    />
                </svg>
                Share
            </a>
            <a
                x-ref="download"
                href="#"
                class="flex items-center gap-3 px-4 py-2.5 text-sm text-neutral-700 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-inset dark:text-neutral-300 dark:focus-visible:ring-neutral-100"
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
                        d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3"
                    />
                </svg>
                Download
            </a>
            <a
                x-ref="delete"
                href="#"
                class="flex items-center gap-3 px-4 py-2.5 text-sm text-red-600 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-red-600 focus-visible:ring-inset dark:text-red-400 dark:focus-visible:ring-red-400"
                :class="activeIndex === 4 ? 'bg-red-50 dark:bg-red-500/10' : 'hover:bg-red-50 dark:hover:bg-red-500/10'"
                role="menuitem"
                tabindex="-1"
                @mouseenter="activeIndex = 4"
                @mouseleave="activeIndex = -1"
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

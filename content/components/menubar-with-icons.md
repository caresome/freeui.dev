---
slug: menubar-with-icons
title: Menubar with Icons
category: navigation
github: caresome
dependencies: []
publish_at: 2025-12-15 12:00:00
---

<div data-preview-only class="flex min-h-screen flex-col bg-neutral-100 dark:bg-neutral-950">
    <!-- Menubar -->
    <div
        x-data="{
            openMenu: null,
            activeIndex: -1,
            menuItems: {
                file: ['file-newfile', 'file-open', 'file-save', 'file-saveas', 'file-exit'],
                edit: ['edit-undo', 'edit-redo', 'edit-cut', 'edit-copy', 'edit-paste', 'edit-selectall'],
                view: ['view-zoomin', 'view-zoomout', 'view-resetzoom', 'view-fullscreen'],
                help: ['help-docs', 'help-shortcuts', 'help-about']
            },
            toggle(menu) {
                if (this.openMenu === menu) {
                    this.openMenu = null;
                    this.activeIndex = -1;
                } else {
                    this.openMenu = menu;
                    this.activeIndex = 0;
                    this.$nextTick(() => this.focusCurrentItem());
                }
            },
            close(restoreFocus = false) {
                const triggerRef = this.openMenu ? this.openMenu + 'trigger' : null;
                this.openMenu = null;
                this.activeIndex = -1;
                if (restoreFocus && triggerRef) {
                    this.$nextTick(() => this.$refs[triggerRef]?.focus());
                }
            },
            focusCurrentItem() {
                if (this.openMenu && this.activeIndex >= 0) {
                    const items = this.menuItems[this.openMenu];
                    this.$nextTick(() => this.$refs[items[this.activeIndex]]?.focus());
                }
            },
            next() {
                if (!this.openMenu) return;
                const items = this.menuItems[this.openMenu];
                this.activeIndex = (this.activeIndex + 1) % items.length;
                this.focusCurrentItem();
            },
            prev() {
                if (!this.openMenu) return;
                const items = this.menuItems[this.openMenu];
                this.activeIndex = (this.activeIndex - 1 + items.length) % items.length;
                this.focusCurrentItem();
            },
            first() {
                if (!this.openMenu) return;
                this.activeIndex = 0;
                this.focusCurrentItem();
            },
            last() {
                if (!this.openMenu) return;
                const items = this.menuItems[this.openMenu];
                this.activeIndex = items.length - 1;
                this.focusCurrentItem();
            }
        }"
        @keydown.escape.window="close()"
        @click.outside="close()"
        class="flex items-center border-b border-neutral-200 bg-white px-2 py-1 dark:border-neutral-800 dark:bg-neutral-900"
        role="menubar"
        aria-label="Application menu"
    >
        <!-- File Menu -->
        <div class="relative">
            <button
                x-ref="filetrigger"
                @click="toggle('file')"
                @mouseenter="openMenu && (openMenu = 'file')"
                @keydown.arrow-down.prevent="toggle('file')"
                @keydown.arrow-right.prevent="$refs.edittrigger?.focus(); openMenu && (openMenu = 'edit', activeIndex = 0, $nextTick(() => focusCurrentItem()))"
                type="button"
                class="rounded px-3 py-1.5 text-sm font-medium text-neutral-700 transition-colors hover:bg-neutral-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus-visible:outline-neutral-100"
                :class="openMenu === 'file' ? 'bg-neutral-100 dark:bg-neutral-800' : ''"
                :aria-expanded="openMenu === 'file'"
                aria-haspopup="menu"
            >
                File
            </button>

            <div
                x-show="openMenu === 'file'"
                x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                @keydown.arrow-down.prevent="next()"
                @keydown.arrow-up.prevent="prev()"
                @keydown.home.prevent="first()"
                @keydown.end.prevent="last()"
                @keydown.escape.prevent="close(true)"
                class="absolute top-full left-0 z-50 mt-1 min-w-56 rounded-lg border border-neutral-200 bg-white py-1 shadow-lg dark:border-neutral-700 dark:bg-neutral-800"
                role="menu"
                aria-label="File menu"
                x-cloak
            >
                <button
                    x-ref="file-newfile"
                    @click="close()"
                    type="button"
                    class="flex w-full items-center gap-3 rounded-lg px-4 py-2 text-left text-sm text-neutral-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-neutral-900 dark:text-neutral-300 dark:focus-visible:outline-neutral-100"
                    role="menuitem"
                    tabindex="-1"
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
                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"
                        />
                    </svg>
                    <span class="flex-1">New File</span>
                    <kbd class="text-xs text-neutral-400">⌘N</kbd>
                </button>
                <button
                    x-ref="file-open"
                    @click="close()"
                    type="button"
                    class="flex w-full items-center gap-3 rounded-lg px-4 py-2 text-left text-sm text-neutral-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-neutral-900 dark:text-neutral-300 dark:focus-visible:outline-neutral-100"
                    role="menuitem"
                    tabindex="-1"
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
                            d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 0 0-1.883 2.542l.857 6a2.25 2.25 0 0 0 2.227 1.932H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-1.883-2.542m-16.5 0V6A2.25 2.25 0 0 1 6 3.75h3.879a1.5 1.5 0 0 1 1.06.44l2.122 2.12a1.5 1.5 0 0 0 1.06.44H18A2.25 2.25 0 0 1 20.25 9v.776"
                        />
                    </svg>
                    <span class="flex-1">Open...</span>
                    <kbd class="text-xs text-neutral-400">⌘O</kbd>
                </button>
                <div class="my-1 border-t border-neutral-200 dark:border-neutral-700" role="separator"></div>
                <button
                    x-ref="file-save"
                    @click="close()"
                    type="button"
                    class="flex w-full items-center gap-3 rounded-lg px-4 py-2 text-left text-sm text-neutral-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-neutral-900 dark:text-neutral-300 dark:focus-visible:outline-neutral-100"
                    role="menuitem"
                    tabindex="-1"
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
                            d="M9 3.75H6.912a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H15M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859M12 3v8.25m0 0-3-3m3 3 3-3"
                        />
                    </svg>
                    <span class="flex-1">Save</span>
                    <kbd class="text-xs text-neutral-400">⌘S</kbd>
                </button>
                <button
                    x-ref="file-saveas"
                    @click="close()"
                    type="button"
                    class="flex w-full items-center gap-3 rounded-lg px-4 py-2 text-left text-sm text-neutral-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-neutral-900 dark:text-neutral-300 dark:focus-visible:outline-neutral-100"
                    role="menuitem"
                    tabindex="-1"
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
                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"
                        />
                    </svg>
                    <span class="flex-1">Save As...</span>
                    <kbd class="text-xs text-neutral-400">⇧⌘S</kbd>
                </button>
                <div class="my-1 border-t border-neutral-200 dark:border-neutral-700" role="separator"></div>
                <button
                    x-ref="file-exit"
                    @click="close()"
                    type="button"
                    class="flex w-full items-center gap-3 rounded-lg px-4 py-2 text-left text-sm text-red-600 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-red-600 dark:text-red-400 dark:focus-visible:outline-red-400"
                    role="menuitem"
                    tabindex="-1"
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
                            d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15"
                        />
                    </svg>
                    <span class="flex-1">Exit</span>
                    <kbd class="text-xs text-red-400">⌘Q</kbd>
                </button>
            </div>
        </div>

        <!-- Edit Menu -->
        <div class="relative">
            <button
                x-ref="edittrigger"
                @click="toggle('edit')"
                @mouseenter="openMenu && (openMenu = 'edit')"
                @keydown.arrow-down.prevent="toggle('edit')"
                @keydown.arrow-left.prevent="$refs.filetrigger?.focus(); openMenu && (openMenu = 'file', activeIndex = 0, $nextTick(() => focusCurrentItem()))"
                @keydown.arrow-right.prevent="$refs.viewtrigger?.focus(); openMenu && (openMenu = 'view', activeIndex = 0, $nextTick(() => focusCurrentItem()))"
                type="button"
                class="rounded px-3 py-1.5 text-sm font-medium text-neutral-700 transition-colors hover:bg-neutral-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus-visible:outline-neutral-100"
                :class="openMenu === 'edit' ? 'bg-neutral-100 dark:bg-neutral-800' : ''"
                :aria-expanded="openMenu === 'edit'"
                aria-haspopup="menu"
            >
                Edit
            </button>

            <div
                x-show="openMenu === 'edit'"
                x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                @keydown.arrow-down.prevent="next()"
                @keydown.arrow-up.prevent="prev()"
                @keydown.home.prevent="first()"
                @keydown.end.prevent="last()"
                @keydown.escape.prevent="close(true)"
                class="absolute top-full left-0 z-50 mt-1 min-w-56 rounded-lg border border-neutral-200 bg-white py-1 shadow-lg dark:border-neutral-700 dark:bg-neutral-800"
                role="menu"
                aria-label="Edit menu"
                x-cloak
            >
                <button
                    x-ref="edit-undo"
                    @click="close()"
                    type="button"
                    class="flex w-full items-center gap-3 rounded-lg px-4 py-2 text-left text-sm text-neutral-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-neutral-900 dark:text-neutral-300 dark:focus-visible:outline-neutral-100"
                    role="menuitem"
                    tabindex="-1"
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
                            d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3"
                        />
                    </svg>
                    <span class="flex-1">Undo</span>
                    <kbd class="text-xs text-neutral-400">⌘Z</kbd>
                </button>
                <button
                    x-ref="edit-redo"
                    @click="close()"
                    type="button"
                    class="flex w-full items-center gap-3 rounded-lg px-4 py-2 text-left text-sm text-neutral-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-neutral-900 dark:text-neutral-300 dark:focus-visible:outline-neutral-100"
                    role="menuitem"
                    tabindex="-1"
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
                            d="m15 15 6-6m0 0-6-6m6 6H9a6 6 0 0 0 0 12h3"
                        />
                    </svg>
                    <span class="flex-1">Redo</span>
                    <kbd class="text-xs text-neutral-400">⇧⌘Z</kbd>
                </button>
                <div class="my-1 border-t border-neutral-200 dark:border-neutral-700" role="separator"></div>
                <button
                    x-ref="edit-cut"
                    @click="close()"
                    type="button"
                    class="flex w-full items-center gap-3 rounded-lg px-4 py-2 text-left text-sm text-neutral-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-neutral-900 dark:text-neutral-300 dark:focus-visible:outline-neutral-100"
                    role="menuitem"
                    tabindex="-1"
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
                            d="m7.848 8.25 1.536.887M7.848 8.25a3 3 0 1 1-5.196-3 3 3 0 0 1 5.196 3Zm1.536.887a2.165 2.165 0 0 1 1.083 1.839c.005.351.054.695.14 1.024M9.384 9.137l2.077 1.199M7.848 15.75l1.536-.887m-1.536.887a3 3 0 1 1-5.196 3 3 3 0 0 1 5.196-3Zm1.536-.887a2.165 2.165 0 0 0 1.083-1.838c.005-.352.054-.695.14-1.025m-1.223 2.863 2.077-1.199m0-3.328a4.323 4.323 0 0 1 2.068-1.379l5.325-1.628a4.5 4.5 0 0 1 2.48-.044l.803.215-7.794 4.5m-2.882-1.664A4.33 4.33 0 0 0 10.607 12m3.736 0 7.794 4.5-.802.215a4.5 4.5 0 0 1-2.48-.043l-5.326-1.629a4.324 4.324 0 0 1-2.068-1.379M14.343 12l-2.882 1.664"
                        />
                    </svg>
                    <span class="flex-1">Cut</span>
                    <kbd class="text-xs text-neutral-400">⌘X</kbd>
                </button>
                <button
                    x-ref="edit-copy"
                    @click="close()"
                    type="button"
                    class="flex w-full items-center gap-3 rounded-lg px-4 py-2 text-left text-sm text-neutral-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-neutral-900 dark:text-neutral-300 dark:focus-visible:outline-neutral-100"
                    role="menuitem"
                    tabindex="-1"
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
                    <span class="flex-1">Copy</span>
                    <kbd class="text-xs text-neutral-400">⌘C</kbd>
                </button>
                <button
                    x-ref="edit-paste"
                    @click="close()"
                    type="button"
                    class="flex w-full items-center gap-3 rounded-lg px-4 py-2 text-left text-sm text-neutral-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-neutral-900 dark:text-neutral-300 dark:focus-visible:outline-neutral-100"
                    role="menuitem"
                    tabindex="-1"
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
                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m6.75 12H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"
                        />
                    </svg>
                    <span class="flex-1">Paste</span>
                    <kbd class="text-xs text-neutral-400">⌘V</kbd>
                </button>
                <div class="my-1 border-t border-neutral-200 dark:border-neutral-700" role="separator"></div>
                <button
                    x-ref="edit-selectall"
                    @click="close()"
                    type="button"
                    class="flex w-full items-center gap-3 rounded-lg px-4 py-2 text-left text-sm text-neutral-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-neutral-900 dark:text-neutral-300 dark:focus-visible:outline-neutral-100"
                    role="menuitem"
                    tabindex="-1"
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
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                        />
                    </svg>
                    <span class="flex-1">Select All</span>
                    <kbd class="text-xs text-neutral-400">⌘A</kbd>
                </button>
            </div>
        </div>

        <!-- View Menu -->
        <div class="relative">
            <button
                x-ref="viewtrigger"
                @click="toggle('view')"
                @mouseenter="openMenu && (openMenu = 'view')"
                @keydown.arrow-down.prevent="toggle('view')"
                @keydown.arrow-left.prevent="$refs.edittrigger?.focus(); openMenu && (openMenu = 'edit', activeIndex = 0, $nextTick(() => focusCurrentItem()))"
                @keydown.arrow-right.prevent="$refs.helptrigger?.focus(); openMenu && (openMenu = 'help', activeIndex = 0, $nextTick(() => focusCurrentItem()))"
                type="button"
                class="rounded px-3 py-1.5 text-sm font-medium text-neutral-700 transition-colors hover:bg-neutral-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus-visible:outline-neutral-100"
                :class="openMenu === 'view' ? 'bg-neutral-100 dark:bg-neutral-800' : ''"
                :aria-expanded="openMenu === 'view'"
                aria-haspopup="menu"
            >
                View
            </button>

            <div
                x-show="openMenu === 'view'"
                x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                @keydown.arrow-down.prevent="next()"
                @keydown.arrow-up.prevent="prev()"
                @keydown.home.prevent="first()"
                @keydown.end.prevent="last()"
                @keydown.escape.prevent="close(true)"
                class="absolute top-full left-0 z-50 mt-1 min-w-56 rounded-lg border border-neutral-200 bg-white py-1 shadow-lg dark:border-neutral-700 dark:bg-neutral-800"
                role="menu"
                aria-label="View menu"
                x-cloak
            >
                <button
                    x-ref="view-zoomin"
                    @click="close()"
                    type="button"
                    class="flex w-full items-center gap-3 rounded-lg px-4 py-2 text-left text-sm text-neutral-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-neutral-900 dark:text-neutral-300 dark:focus-visible:outline-neutral-100"
                    role="menuitem"
                    tabindex="-1"
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
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607ZM10.5 7.5v6m3-3h-6"
                        />
                    </svg>
                    <span class="flex-1">Zoom In</span>
                    <kbd class="text-xs text-neutral-400">⌘+</kbd>
                </button>
                <button
                    x-ref="view-zoomout"
                    @click="close()"
                    type="button"
                    class="flex w-full items-center gap-3 rounded-lg px-4 py-2 text-left text-sm text-neutral-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-neutral-900 dark:text-neutral-300 dark:focus-visible:outline-neutral-100"
                    role="menuitem"
                    tabindex="-1"
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
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607ZM13.5 10.5h-6"
                        />
                    </svg>
                    <span class="flex-1">Zoom Out</span>
                    <kbd class="text-xs text-neutral-400">⌘-</kbd>
                </button>
                <button
                    x-ref="view-resetzoom"
                    @click="close()"
                    type="button"
                    class="flex w-full items-center gap-3 rounded-lg px-4 py-2 text-left text-sm text-neutral-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-neutral-900 dark:text-neutral-300 dark:focus-visible:outline-neutral-100"
                    role="menuitem"
                    tabindex="-1"
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
                            d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99"
                        />
                    </svg>
                    <span class="flex-1">Reset Zoom</span>
                    <kbd class="text-xs text-neutral-400">⌘0</kbd>
                </button>
                <div class="my-1 border-t border-neutral-200 dark:border-neutral-700" role="separator"></div>
                <button
                    x-ref="view-fullscreen"
                    @click="close()"
                    type="button"
                    class="flex w-full items-center gap-3 rounded-lg px-4 py-2 text-left text-sm text-neutral-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-neutral-900 dark:text-neutral-300 dark:focus-visible:outline-neutral-100"
                    role="menuitem"
                    tabindex="-1"
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
                            d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9M3.75 20.25v-4.5m0 4.5h4.5m-4.5 0L9 15M20.25 3.75h-4.5m4.5 0v4.5m0-4.5L15 9m5.25 11.25h-4.5m4.5 0v-4.5m0 4.5L15 15"
                        />
                    </svg>
                    <span class="flex-1">Full Screen</span>
                    <kbd class="text-xs text-neutral-400">F11</kbd>
                </button>
            </div>
        </div>

        <!-- Help Menu -->
        <div class="relative">
            <button
                x-ref="helptrigger"
                @click="toggle('help')"
                @mouseenter="openMenu && (openMenu = 'help')"
                @keydown.arrow-down.prevent="toggle('help')"
                @keydown.arrow-left.prevent="$refs.viewtrigger?.focus(); openMenu && (openMenu = 'view', activeIndex = 0, $nextTick(() => focusCurrentItem()))"
                type="button"
                class="rounded px-3 py-1.5 text-sm font-medium text-neutral-700 transition-colors hover:bg-neutral-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus-visible:outline-neutral-100"
                :class="openMenu === 'help' ? 'bg-neutral-100 dark:bg-neutral-800' : ''"
                :aria-expanded="openMenu === 'help'"
                aria-haspopup="menu"
            >
                Help
            </button>

            <div
                x-show="openMenu === 'help'"
                x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                @keydown.arrow-down.prevent="next()"
                @keydown.arrow-up.prevent="prev()"
                @keydown.home.prevent="first()"
                @keydown.end.prevent="last()"
                @keydown.escape.prevent="close(true)"
                class="absolute top-full left-0 z-50 mt-1 min-w-56 rounded-lg border border-neutral-200 bg-white py-1 shadow-lg dark:border-neutral-700 dark:bg-neutral-800"
                role="menu"
                aria-label="Help menu"
                x-cloak
            >
                <button
                    x-ref="help-docs"
                    @click="close()"
                    type="button"
                    class="flex w-full items-center gap-3 rounded-lg px-4 py-2 text-left text-sm text-neutral-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-neutral-900 dark:text-neutral-300 dark:focus-visible:outline-neutral-100"
                    role="menuitem"
                    tabindex="-1"
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
                            d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25"
                        />
                    </svg>
                    <span class="flex-1">Documentation</span>
                    <kbd class="text-xs text-neutral-400">F1</kbd>
                </button>
                <button
                    x-ref="help-shortcuts"
                    @click="close()"
                    type="button"
                    class="flex w-full items-center gap-3 rounded-lg px-4 py-2 text-left text-sm text-neutral-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-neutral-900 dark:text-neutral-300 dark:focus-visible:outline-neutral-100"
                    role="menuitem"
                    tabindex="-1"
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
                            d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z"
                        />
                    </svg>
                    <span class="flex-1">Keyboard Shortcuts</span>
                    <kbd class="text-xs text-neutral-400">⌘/</kbd>
                </button>
                <div class="my-1 border-t border-neutral-200 dark:border-neutral-700" role="separator"></div>
                <button
                    x-ref="help-about"
                    @click="close()"
                    type="button"
                    class="flex w-full items-center gap-3 rounded-lg px-4 py-2 text-left text-sm text-neutral-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-neutral-900 dark:text-neutral-300 dark:focus-visible:outline-neutral-100"
                    role="menuitem"
                    tabindex="-1"
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
                            d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z"
                        />
                    </svg>
                    <span class="flex-1">About</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Content area -->
    <div class="flex-1 p-6">
        <div class="rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-800 dark:bg-neutral-900">
            <p class="text-sm text-neutral-500 dark:text-neutral-400">Application content area</p>
        </div>
    </div>
</div>

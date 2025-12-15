---
slug: menubar-simple
title: Menubar Simple
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
                file: ['newfile', 'open', 'save', 'saveas', 'exit'],
                edit: ['undo', 'redo', 'cut', 'copy', 'paste', 'delete', 'selectall'],
                view: ['zoomin', 'zoomout', 'resetzoom', 'fullscreen'],
                help: ['docs', 'shortcuts', 'about']
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
            close() {
                this.openMenu = null;
                this.activeIndex = -1;
            },
            focusCurrentItem() {
                if (this.openMenu && this.activeIndex >= 0) {
                    const items = this.menuItems[this.openMenu];
                    this.$refs[items[this.activeIndex]]?.focus();
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
                @keydown.escape.prevent="close(); $refs.filetrigger?.focus()"
                @keydown.arrow-left.prevent="close(); $refs.filetrigger?.focus()"
                @keydown.arrow-right.prevent="close(); $refs.edittrigger?.focus(); openMenu = 'edit'; activeIndex = 0; $nextTick(() => focusCurrentItem())"
                class="absolute top-full left-0 z-50 mt-1 min-w-48 rounded-lg border border-neutral-200 bg-white py-1 shadow-lg dark:border-neutral-700 dark:bg-neutral-800"
                role="menu"
                aria-label="File menu"
                x-cloak
            >
                <button
                    x-ref="newfile"
                    @click="close(); $refs.filetrigger?.focus()"
                    type="button"
                    class="flex w-full items-center rounded-lg px-4 py-2 text-left text-sm text-neutral-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-neutral-900 dark:text-neutral-300 dark:focus-visible:outline-neutral-100"
                    role="menuitem"
                    tabindex="-1"
                >
                    New File
                </button>
                <button
                    x-ref="open"
                    @click="close(); $refs.filetrigger?.focus()"
                    type="button"
                    class="flex w-full items-center rounded-lg px-4 py-2 text-left text-sm text-neutral-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-neutral-900 dark:text-neutral-300 dark:focus-visible:outline-neutral-100"
                    role="menuitem"
                    tabindex="-1"
                >
                    Open...
                </button>
                <button
                    x-ref="save"
                    @click="close(); $refs.filetrigger?.focus()"
                    type="button"
                    class="flex w-full items-center rounded-lg px-4 py-2 text-left text-sm text-neutral-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-neutral-900 dark:text-neutral-300 dark:focus-visible:outline-neutral-100"
                    role="menuitem"
                    tabindex="-1"
                >
                    Save
                </button>
                <button
                    x-ref="saveas"
                    @click="close(); $refs.filetrigger?.focus()"
                    type="button"
                    class="flex w-full items-center rounded-lg px-4 py-2 text-left text-sm text-neutral-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-neutral-900 dark:text-neutral-300 dark:focus-visible:outline-neutral-100"
                    role="menuitem"
                    tabindex="-1"
                >
                    Save As...
                </button>
                <div class="my-1 border-t border-neutral-200 dark:border-neutral-700" role="separator"></div>
                <button
                    x-ref="exit"
                    @click="close(); $refs.filetrigger?.focus()"
                    type="button"
                    class="flex w-full items-center rounded-lg px-4 py-2 text-left text-sm text-neutral-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-neutral-900 dark:text-neutral-300 dark:focus-visible:outline-neutral-100"
                    role="menuitem"
                    tabindex="-1"
                >
                    Exit
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
                @keydown.escape.prevent="close(); $refs.edittrigger?.focus()"
                @keydown.arrow-left.prevent="close(); $refs.filetrigger?.focus(); openMenu = 'file'; activeIndex = 0; $nextTick(() => focusCurrentItem())"
                @keydown.arrow-right.prevent="close(); $refs.viewtrigger?.focus(); openMenu = 'view'; activeIndex = 0; $nextTick(() => focusCurrentItem())"
                class="absolute top-full left-0 z-50 mt-1 min-w-48 rounded-lg border border-neutral-200 bg-white py-1 shadow-lg dark:border-neutral-700 dark:bg-neutral-800"
                role="menu"
                aria-label="Edit menu"
                x-cloak
            >
                <button
                    x-ref="undo"
                    @click="close(); $refs.edittrigger?.focus()"
                    type="button"
                    class="flex w-full items-center rounded-lg px-4 py-2 text-left text-sm text-neutral-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-neutral-900 dark:text-neutral-300 dark:focus-visible:outline-neutral-100"
                    role="menuitem"
                    tabindex="-1"
                >
                    Undo
                </button>
                <button
                    x-ref="redo"
                    @click="close(); $refs.edittrigger?.focus()"
                    type="button"
                    class="flex w-full items-center rounded-lg px-4 py-2 text-left text-sm text-neutral-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-neutral-900 dark:text-neutral-300 dark:focus-visible:outline-neutral-100"
                    role="menuitem"
                    tabindex="-1"
                >
                    Redo
                </button>
                <div class="my-1 border-t border-neutral-200 dark:border-neutral-700" role="separator"></div>
                <button
                    x-ref="cut"
                    @click="close(); $refs.edittrigger?.focus()"
                    type="button"
                    class="flex w-full items-center rounded-lg px-4 py-2 text-left text-sm text-neutral-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-neutral-900 dark:text-neutral-300 dark:focus-visible:outline-neutral-100"
                    role="menuitem"
                    tabindex="-1"
                >
                    Cut
                </button>
                <button
                    x-ref="copy"
                    @click="close(); $refs.edittrigger?.focus()"
                    type="button"
                    class="flex w-full items-center rounded-lg px-4 py-2 text-left text-sm text-neutral-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-neutral-900 dark:text-neutral-300 dark:focus-visible:outline-neutral-100"
                    role="menuitem"
                    tabindex="-1"
                >
                    Copy
                </button>
                <button
                    x-ref="paste"
                    @click="close(); $refs.edittrigger?.focus()"
                    type="button"
                    class="flex w-full items-center rounded-lg px-4 py-2 text-left text-sm text-neutral-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-neutral-900 dark:text-neutral-300 dark:focus-visible:outline-neutral-100"
                    role="menuitem"
                    tabindex="-1"
                >
                    Paste
                </button>
                <button
                    x-ref="delete"
                    @click="close(); $refs.edittrigger?.focus()"
                    type="button"
                    class="flex w-full items-center rounded-lg px-4 py-2 text-left text-sm text-neutral-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-neutral-900 dark:text-neutral-300 dark:focus-visible:outline-neutral-100"
                    role="menuitem"
                    tabindex="-1"
                >
                    Delete
                </button>
                <div class="my-1 border-t border-neutral-200 dark:border-neutral-700" role="separator"></div>
                <button
                    x-ref="selectall"
                    @click="close(); $refs.edittrigger?.focus()"
                    type="button"
                    class="flex w-full items-center rounded-lg px-4 py-2 text-left text-sm text-neutral-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-neutral-900 dark:text-neutral-300 dark:focus-visible:outline-neutral-100"
                    role="menuitem"
                    tabindex="-1"
                >
                    Select All
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
                @keydown.escape.prevent="close(); $refs.viewtrigger?.focus()"
                @keydown.arrow-left.prevent="close(); $refs.edittrigger?.focus(); openMenu = 'edit'; activeIndex = 0; $nextTick(() => focusCurrentItem())"
                @keydown.arrow-right.prevent="close(); $refs.helptrigger?.focus(); openMenu = 'help'; activeIndex = 0; $nextTick(() => focusCurrentItem())"
                class="absolute top-full left-0 z-50 mt-1 min-w-48 rounded-lg border border-neutral-200 bg-white py-1 shadow-lg dark:border-neutral-700 dark:bg-neutral-800"
                role="menu"
                aria-label="View menu"
                x-cloak
            >
                <button
                    x-ref="zoomin"
                    @click="close(); $refs.viewtrigger?.focus()"
                    type="button"
                    class="flex w-full items-center rounded-lg px-4 py-2 text-left text-sm text-neutral-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-neutral-900 dark:text-neutral-300 dark:focus-visible:outline-neutral-100"
                    role="menuitem"
                    tabindex="-1"
                >
                    Zoom In
                </button>
                <button
                    x-ref="zoomout"
                    @click="close(); $refs.viewtrigger?.focus()"
                    type="button"
                    class="flex w-full items-center rounded-lg px-4 py-2 text-left text-sm text-neutral-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-neutral-900 dark:text-neutral-300 dark:focus-visible:outline-neutral-100"
                    role="menuitem"
                    tabindex="-1"
                >
                    Zoom Out
                </button>
                <button
                    x-ref="resetzoom"
                    @click="close(); $refs.viewtrigger?.focus()"
                    type="button"
                    class="flex w-full items-center rounded-lg px-4 py-2 text-left text-sm text-neutral-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-neutral-900 dark:text-neutral-300 dark:focus-visible:outline-neutral-100"
                    role="menuitem"
                    tabindex="-1"
                >
                    Reset Zoom
                </button>
                <div class="my-1 border-t border-neutral-200 dark:border-neutral-700" role="separator"></div>
                <button
                    x-ref="fullscreen"
                    @click="close(); $refs.viewtrigger?.focus()"
                    type="button"
                    class="flex w-full items-center rounded-lg px-4 py-2 text-left text-sm text-neutral-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-neutral-900 dark:text-neutral-300 dark:focus-visible:outline-neutral-100"
                    role="menuitem"
                    tabindex="-1"
                >
                    Full Screen
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
                @keydown.escape.prevent="close(); $refs.helptrigger?.focus()"
                @keydown.arrow-left.prevent="close(); $refs.viewtrigger?.focus(); openMenu = 'view'; activeIndex = 0; $nextTick(() => focusCurrentItem())"
                class="absolute top-full left-0 z-50 mt-1 min-w-48 rounded-lg border border-neutral-200 bg-white py-1 shadow-lg dark:border-neutral-700 dark:bg-neutral-800"
                role="menu"
                aria-label="Help menu"
                x-cloak
            >
                <button
                    x-ref="docs"
                    @click="close(); $refs.helptrigger?.focus()"
                    type="button"
                    class="flex w-full items-center rounded-lg px-4 py-2 text-left text-sm text-neutral-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-neutral-900 dark:text-neutral-300 dark:focus-visible:outline-neutral-100"
                    role="menuitem"
                    tabindex="-1"
                >
                    Documentation
                </button>
                <button
                    x-ref="shortcuts"
                    @click="close(); $refs.helptrigger?.focus()"
                    type="button"
                    class="flex w-full items-center rounded-lg px-4 py-2 text-left text-sm text-neutral-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-neutral-900 dark:text-neutral-300 dark:focus-visible:outline-neutral-100"
                    role="menuitem"
                    tabindex="-1"
                >
                    Keyboard Shortcuts
                </button>
                <div class="my-1 border-t border-neutral-200 dark:border-neutral-700" role="separator"></div>
                <button
                    x-ref="about"
                    @click="close(); $refs.helptrigger?.focus()"
                    type="button"
                    class="flex w-full items-center rounded-lg px-4 py-2 text-left text-sm text-neutral-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-neutral-900 dark:text-neutral-300 dark:focus-visible:outline-neutral-100"
                    role="menuitem"
                    tabindex="-1"
                >
                    About
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

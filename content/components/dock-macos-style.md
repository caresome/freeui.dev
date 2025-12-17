---
slug: dock-macos-style
title: Dock macOS Style
category: navigation
github: caresome
dependencies: []
publish_at: 2025-12-15 12:00:00
---

<div data-preview-only class="flex min-h-[350px] items-end justify-center p-8 pb-4">
    <div
        x-data="{
            mouseX: -1000,
            active: 2,
            baseWidth: 40,
            maxWidth: 72,
            distance: 140,
            spring: { current: {}, target: {} },

            init() {
                for (let i = 0; i < 6; i++) {
                    this.spring.current[i] = this.baseWidth;
                    this.spring.target[i] = this.baseWidth;
                }
                this.animate();
            },

            animate() {
                const stiffness = 0.15;
                for (let i = 0; i < 6; i++) {
                    const diff = this.spring.target[i] - this.spring.current[i];
                    this.spring.current[i] += diff * stiffness;
                    if (Math.abs(diff) < 0.5) {
                        this.spring.current[i] = this.spring.target[i];
                    }
                }
                requestAnimationFrame(() => this.animate());
            },

            updateSizes() {
                const items = this.$el.querySelectorAll('[data-dock-item]');
                items.forEach((item, i) => {
                    const rect = item.getBoundingClientRect();
                    const itemCenterX = rect.left + rect.width / 2;
                    const dist = Math.abs(this.mouseX - itemCenterX);
                    if (dist < this.distance) {
                        const scale = Math.cos((dist / this.distance) * (Math.PI / 2));
                        this.spring.target[i] = this.baseWidth + (this.maxWidth - this.baseWidth) * scale;
                    } else {
                        this.spring.target[i] = this.baseWidth;
                    }
                });
            },

            getWidth(index) {
                return this.spring.current[index] || this.baseWidth;
            },

            onMouseMove(e) {
                this.mouseX = e.clientX;
                this.updateSizes();
            },

            onMouseLeave() {
                this.mouseX = -1000;
                for (let i = 0; i < 6; i++) {
                    this.spring.target[i] = this.baseWidth;
                }
            }
        }"
        @mousemove="onMouseMove($event)"
        @mouseleave="onMouseLeave()"
        class="relative"
    >
        <!-- Fixed height dock container -->
        <nav
            class="flex h-14 items-end gap-[3px] rounded-2xl border border-neutral-200 bg-white/90 px-2 pb-2 shadow-lg backdrop-blur-sm sm:h-16 dark:border-neutral-700 dark:bg-neutral-800/90"
            aria-label="Dock"
        >
            <!-- Home -->
            <button
                data-dock-item
                @click="active = 0"
                type="button"
                class="relative flex items-center justify-center rounded-xl bg-neutral-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:bg-neutral-700 dark:focus-visible:outline-neutral-100"
                :style="{ width: getWidth(0) + 'px', height: getWidth(0) + 'px' }"
                :aria-current="active === 0 ? 'page' : null"
                aria-label="Home"
            >
                <svg
                    class="h-1/2 w-1/2 text-neutral-600 dark:text-neutral-300"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    aria-hidden="true"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"
                    />
                </svg>
                <span
                    x-show="active === 0"
                    class="absolute -bottom-1.5 left-1/2 h-1 w-1 -translate-x-1/2 rounded-full bg-neutral-400 dark:bg-neutral-500"
                    aria-hidden="true"
                ></span>
            </button>

            <!-- Search -->
            <button
                data-dock-item
                @click="active = 1"
                type="button"
                class="relative flex items-center justify-center rounded-xl bg-neutral-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:bg-neutral-700 dark:focus-visible:outline-neutral-100"
                :style="{ width: getWidth(1) + 'px', height: getWidth(1) + 'px' }"
                :aria-current="active === 1 ? 'page' : null"
                aria-label="Search"
            >
                <svg
                    class="h-1/2 w-1/2 text-neutral-600 dark:text-neutral-300"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    aria-hidden="true"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                    />
                </svg>
                <span
                    x-show="active === 1"
                    class="absolute -bottom-1.5 left-1/2 h-1 w-1 -translate-x-1/2 rounded-full bg-neutral-400 dark:bg-neutral-500"
                    aria-hidden="true"
                ></span>
            </button>

            <!-- Messages -->
            <button
                data-dock-item
                @click="active = 2"
                type="button"
                class="relative flex items-center justify-center rounded-xl bg-neutral-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:bg-neutral-700 dark:focus-visible:outline-neutral-100"
                :style="{ width: getWidth(2) + 'px', height: getWidth(2) + 'px' }"
                :aria-current="active === 2 ? 'page' : null"
                aria-label="Messages"
            >
                <svg
                    class="h-1/2 w-1/2 text-neutral-600 dark:text-neutral-300"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    aria-hidden="true"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z"
                    />
                </svg>
                <span
                    x-show="active === 2"
                    class="absolute -bottom-1.5 left-1/2 h-1 w-1 -translate-x-1/2 rounded-full bg-neutral-400 dark:bg-neutral-500"
                    aria-hidden="true"
                ></span>
            </button>

            <!-- Calendar -->
            <button
                data-dock-item
                @click="active = 3"
                type="button"
                class="relative flex items-center justify-center rounded-xl bg-neutral-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:bg-neutral-700 dark:focus-visible:outline-neutral-100"
                :style="{ width: getWidth(3) + 'px', height: getWidth(3) + 'px' }"
                :aria-current="active === 3 ? 'page' : null"
                aria-label="Calendar"
            >
                <svg
                    class="h-1/2 w-1/2 text-neutral-600 dark:text-neutral-300"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    aria-hidden="true"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"
                    />
                </svg>
                <span
                    x-show="active === 3"
                    class="absolute -bottom-1.5 left-1/2 h-1 w-1 -translate-x-1/2 rounded-full bg-neutral-400 dark:bg-neutral-500"
                    aria-hidden="true"
                ></span>
            </button>

            <!-- Photos -->
            <button
                data-dock-item
                @click="active = 4"
                type="button"
                class="relative flex items-center justify-center rounded-xl bg-neutral-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:bg-neutral-700 dark:focus-visible:outline-neutral-100"
                :style="{ width: getWidth(4) + 'px', height: getWidth(4) + 'px' }"
                :aria-current="active === 4 ? 'page' : null"
                aria-label="Photos"
            >
                <svg
                    class="h-1/2 w-1/2 text-neutral-600 dark:text-neutral-300"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    aria-hidden="true"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z"
                    />
                </svg>
                <span
                    x-show="active === 4"
                    class="absolute -bottom-1.5 left-1/2 h-1 w-1 -translate-x-1/2 rounded-full bg-neutral-400 dark:bg-neutral-500"
                    aria-hidden="true"
                ></span>
            </button>

            <!-- Settings -->
            <button
                data-dock-item
                @click="active = 5"
                type="button"
                class="relative flex items-center justify-center rounded-xl bg-neutral-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:bg-neutral-700 dark:focus-visible:outline-neutral-100"
                :style="{ width: getWidth(5) + 'px', height: getWidth(5) + 'px' }"
                :aria-current="active === 5 ? 'page' : null"
                aria-label="Settings"
            >
                <svg
                    class="h-1/2 w-1/2 text-neutral-600 dark:text-neutral-300"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
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
                <span
                    x-show="active === 5"
                    class="absolute -bottom-1.5 left-1/2 h-1 w-1 -translate-x-1/2 rounded-full bg-neutral-400 dark:bg-neutral-500"
                    aria-hidden="true"
                ></span>
            </button>
        </nav>
    </div>
</div>

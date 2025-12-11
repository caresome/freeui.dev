---
slug: reaction-bar
title: Reaction Bar
category: voting
github: caresome
dependencies: []
publish_at: 2025-12-07 05:00:00
---

<div data-preview-only class="flex min-h-[120px] items-center justify-center">
    <div
        x-data="{
            reactions: [
                { emoji: '👍', code: '1f44d', count: 12, active: false },
                { emoji: '❤️', code: '2764_fe0f', count: 8, active: false },
                { emoji: '😂', code: '1f602', count: 5, active: false },
                { emoji: '😮', code: '1f62e', count: 2, active: false }
            ],
            hovering: null,
            toggle(index) {
                this.reactions[index].active = !this.reactions[index].active;
                this.reactions[index].count += this.reactions[index].active ? 1 : -1;
            },
            getAnimatedUrl(code) {
                return 'https://fonts.gstatic.com/s/e/notoemoji/latest/' + code + '/512.webp';
            }
        }"
        class="flex flex-wrap gap-2"
    >
        <template x-for="(reaction, index) in reactions" :key="index">
            <button
                @click="toggle(index)"
                @mouseenter="hovering = index"
                @mouseleave="hovering = null"
                type="button"
                :class="reaction.active
                    ? 'border-neutral-900 bg-neutral-50 dark:border-neutral-50 dark:bg-neutral-800'
                    : 'border-neutral-200/80 bg-white hover:bg-neutral-50 dark:border-neutral-700/80 dark:bg-neutral-900 dark:hover:bg-neutral-800'"
                class="inline-flex items-center gap-1.5 rounded-full border px-3 py-1.5 text-sm font-medium shadow-sm transition-all duration-150 hover:scale-105 active:scale-[0.98]"
            >
                <span class="relative flex h-5 w-5 items-center justify-center">
                    <span
                        x-show="hovering !== index"
                        x-transition:leave="transition ease-in duration-100"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-75"
                        x-text="reaction.emoji"
                        class="absolute text-base"
                    ></span>
                    <img
                        x-show="hovering === index"
                        x-transition:enter="transition ease-out duration-150"
                        x-transition:enter-start="opacity-0 scale-75"
                        x-transition:enter-end="opacity-100 scale-100"
                        :src="getAnimatedUrl(reaction.code)"
                        class="absolute h-5 w-5"
                        :alt="reaction.emoji"
                    />
                </span>
                <span
                    x-text="reaction.count"
                    class="tabular-nums"
                    :class="reaction.active
                        ? 'text-neutral-900 dark:text-neutral-50'
                        : 'text-neutral-600 dark:text-neutral-400'"
                ></span>
            </button>
        </template>
        <button
            type="button"
            class="inline-flex h-8 w-8 items-center justify-center rounded-full border border-dashed border-neutral-300 text-neutral-400 transition-all duration-150 hover:border-neutral-400 hover:bg-neutral-50 hover:text-neutral-600 dark:border-neutral-600 dark:hover:border-neutral-500 dark:hover:bg-neutral-800 dark:hover:text-neutral-300"
            aria-label="Add reaction"
        >
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
        </button>
    </div>
</div>

---
slug: tabs-full-width
title: Tabs Full Width
category: navigation
github: caresome
dependencies: []
publish_at: 2025-12-15 12:00:00
---

<div data-preview-only class="flex min-h-[300px] items-start justify-center p-8">
    <div
        x-data="{
            activeTab: 'details',
            tabs: ['details', 'reviews', 'shipping'],
            focusedIndex: 0,
            focusTab(index) {
                this.focusedIndex = index;
                this.$nextTick(() => {
                    this.$refs[this.tabs[index]]?.focus();
                });
            }
        }"
        class="w-full max-w-lg"
    >
        <!-- Tab List -->
        <div
            role="tablist"
            aria-label="Product information"
            class="grid grid-cols-3 rounded-xl border border-neutral-200 bg-white dark:border-neutral-700 dark:bg-neutral-800"
            @keydown.arrow-right.prevent="focusTab((focusedIndex + 1) % tabs.length)"
            @keydown.arrow-left.prevent="focusTab((focusedIndex - 1 + tabs.length) % tabs.length)"
            @keydown.home.prevent="focusTab(0)"
            @keydown.end.prevent="focusTab(tabs.length - 1)"
        >
            <button
                x-ref="details"
                @click="activeTab = 'details'"
                @focus="focusedIndex = 0"
                type="button"
                role="tab"
                :aria-selected="activeTab === 'details'"
                :tabindex="activeTab === 'details' ? 0 : -1"
                aria-controls="panel-details"
                class="rounded-l-xl border-r border-neutral-200 px-4 py-3 text-sm font-medium transition-all focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:border-neutral-700 dark:focus-visible:outline-neutral-100"
                :class="activeTab === 'details' ? 'bg-neutral-100 text-neutral-900 dark:bg-neutral-700 dark:text-neutral-50' : 'text-neutral-600 hover:bg-neutral-50 hover:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-700/50 dark:hover:text-neutral-50'"
            >
                Details
            </button>
            <button
                x-ref="reviews"
                @click="activeTab = 'reviews'"
                @focus="focusedIndex = 1"
                type="button"
                role="tab"
                :aria-selected="activeTab === 'reviews'"
                :tabindex="activeTab === 'reviews' ? 0 : -1"
                aria-controls="panel-reviews"
                class="border-r border-neutral-200 px-4 py-3 text-sm font-medium transition-all focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:border-neutral-700 dark:focus-visible:outline-neutral-100"
                :class="activeTab === 'reviews' ? 'bg-neutral-100 text-neutral-900 dark:bg-neutral-700 dark:text-neutral-50' : 'text-neutral-600 hover:bg-neutral-50 hover:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-700/50 dark:hover:text-neutral-50'"
            >
                Reviews
            </button>
            <button
                x-ref="shipping"
                @click="activeTab = 'shipping'"
                @focus="focusedIndex = 2"
                type="button"
                role="tab"
                :aria-selected="activeTab === 'shipping'"
                :tabindex="activeTab === 'shipping' ? 0 : -1"
                aria-controls="panel-shipping"
                class="rounded-r-xl px-4 py-3 text-sm font-medium transition-all focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
                :class="activeTab === 'shipping' ? 'bg-neutral-100 text-neutral-900 dark:bg-neutral-700 dark:text-neutral-50' : 'text-neutral-600 hover:bg-neutral-50 hover:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-700/50 dark:hover:text-neutral-50'"
            >
                Shipping
            </button>
        </div>

        <!-- Tab Panels -->
        <div class="mt-4">
            <div
                x-show="activeTab === 'details'"
                id="panel-details"
                role="tabpanel"
                aria-labelledby="details"
                tabindex="0"
                class="rounded-xl border border-neutral-200 bg-white p-6 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:border-neutral-700 dark:bg-neutral-800 dark:focus-visible:outline-neutral-100"
            >
                <h3 class="text-sm font-medium text-neutral-900 dark:text-neutral-50">Product Details</h3>
                <ul class="mt-3 space-y-2 text-sm text-neutral-600 dark:text-neutral-400">
                    <li>Material: 100% Cotton</li>
                    <li>Weight: 180 GSM</li>
                    <li>Care: Machine washable</li>
                    <li>Origin: Made in Portugal</li>
                </ul>
            </div>
            <div
                x-show="activeTab === 'reviews'"
                id="panel-reviews"
                role="tabpanel"
                aria-labelledby="reviews"
                tabindex="0"
                class="rounded-xl border border-neutral-200 bg-white p-6 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:border-neutral-700 dark:bg-neutral-800 dark:focus-visible:outline-neutral-100"
            >
                <h3 class="text-sm font-medium text-neutral-900 dark:text-neutral-50">Customer Reviews</h3>
                <div class="mt-3 flex items-center gap-2">
                    <div class="flex text-amber-400">
                        <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20" aria-hidden="true">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                            />
                        </svg>
                        <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20" aria-hidden="true">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                            />
                        </svg>
                        <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20" aria-hidden="true">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                            />
                        </svg>
                        <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20" aria-hidden="true">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                            />
                        </svg>
                        <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20" aria-hidden="true">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                            />
                        </svg>
                    </div>
                    <span class="text-sm text-neutral-600 dark:text-neutral-400">4.9 (128 reviews)</span>
                </div>
            </div>
            <div
                x-show="activeTab === 'shipping'"
                id="panel-shipping"
                role="tabpanel"
                aria-labelledby="shipping"
                tabindex="0"
                class="rounded-xl border border-neutral-200 bg-white p-6 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:border-neutral-700 dark:bg-neutral-800 dark:focus-visible:outline-neutral-100"
            >
                <h3 class="text-sm font-medium text-neutral-900 dark:text-neutral-50">Shipping Information</h3>
                <ul class="mt-3 space-y-2 text-sm text-neutral-600 dark:text-neutral-400">
                    <li>Free shipping on orders over $50</li>
                    <li>Standard delivery: 5-7 business days</li>
                    <li>Express delivery: 2-3 business days</li>
                    <li>International shipping available</li>
                </ul>
            </div>
        </div>
    </div>
</div>

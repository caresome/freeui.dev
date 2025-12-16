---
slug: tabs-simple
title: Tabs Simple
category: tabs-accordions
github: caresome
dependencies: []
publish_at: 2025-12-15 12:00:00
---

<div data-preview-only class="flex min-h-[300px] items-start justify-center p-8">
    <div
        x-data="{
            activeTab: 'account',
            tabs: ['account', 'password', 'notifications'],
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
            aria-label="Account settings"
            class="flex gap-1 rounded-xl bg-neutral-100 p-1 dark:bg-neutral-800"
            @keydown.arrow-right.prevent="focusTab((focusedIndex + 1) % tabs.length)"
            @keydown.arrow-left.prevent="focusTab((focusedIndex - 1 + tabs.length) % tabs.length)"
            @keydown.home.prevent="focusTab(0)"
            @keydown.end.prevent="focusTab(tabs.length - 1)"
        >
            <button
                x-ref="account"
                @click="activeTab = 'account'"
                @focus="focusedIndex = 0"
                type="button"
                role="tab"
                :aria-selected="activeTab === 'account'"
                :tabindex="activeTab === 'account' ? 0 : -1"
                aria-controls="panel-account"
                class="flex-1 rounded-lg px-4 py-2 text-sm font-medium transition-all focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
                :class="activeTab === 'account' ? 'bg-white text-neutral-900 shadow-sm dark:bg-neutral-700 dark:text-neutral-50' : 'text-neutral-600 hover:text-neutral-900 dark:text-neutral-400 dark:hover:text-neutral-50'"
            >
                Account
            </button>
            <button
                x-ref="password"
                @click="activeTab = 'password'"
                @focus="focusedIndex = 1"
                type="button"
                role="tab"
                :aria-selected="activeTab === 'password'"
                :tabindex="activeTab === 'password' ? 0 : -1"
                aria-controls="panel-password"
                class="flex-1 rounded-lg px-4 py-2 text-sm font-medium transition-all focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
                :class="activeTab === 'password' ? 'bg-white text-neutral-900 shadow-sm dark:bg-neutral-700 dark:text-neutral-50' : 'text-neutral-600 hover:text-neutral-900 dark:text-neutral-400 dark:hover:text-neutral-50'"
            >
                Password
            </button>
            <button
                x-ref="notifications"
                @click="activeTab = 'notifications'"
                @focus="focusedIndex = 2"
                type="button"
                role="tab"
                :aria-selected="activeTab === 'notifications'"
                :tabindex="activeTab === 'notifications' ? 0 : -1"
                aria-controls="panel-notifications"
                class="flex-1 rounded-lg px-4 py-2 text-sm font-medium transition-all focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
                :class="activeTab === 'notifications' ? 'bg-white text-neutral-900 shadow-sm dark:bg-neutral-700 dark:text-neutral-50' : 'text-neutral-600 hover:text-neutral-900 dark:text-neutral-400 dark:hover:text-neutral-50'"
            >
                Notifications
            </button>
        </div>

        <!-- Tab Panels -->
        <div class="mt-4">
            <div
                x-show="activeTab === 'account'"
                id="panel-account"
                role="tabpanel"
                aria-labelledby="account"
                tabindex="0"
                class="rounded-xl border border-neutral-200 bg-white p-6 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:border-neutral-700 dark:bg-neutral-800 dark:focus-visible:outline-neutral-100"
            >
                <h3 class="text-sm font-medium text-neutral-900 dark:text-neutral-50">Account Settings</h3>
                <p class="mt-2 text-sm text-neutral-600 dark:text-neutral-400">
                    Manage your account details, profile information, and preferences.
                </p>
            </div>
            <div
                x-show="activeTab === 'password'"
                id="panel-password"
                role="tabpanel"
                aria-labelledby="password"
                tabindex="0"
                class="rounded-xl border border-neutral-200 bg-white p-6 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:border-neutral-700 dark:bg-neutral-800 dark:focus-visible:outline-neutral-100"
            >
                <h3 class="text-sm font-medium text-neutral-900 dark:text-neutral-50">Password Settings</h3>
                <p class="mt-2 text-sm text-neutral-600 dark:text-neutral-400">
                    Change your password and manage two-factor authentication settings.
                </p>
            </div>
            <div
                x-show="activeTab === 'notifications'"
                id="panel-notifications"
                role="tabpanel"
                aria-labelledby="notifications"
                tabindex="0"
                class="rounded-xl border border-neutral-200 bg-white p-6 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:border-neutral-700 dark:bg-neutral-800 dark:focus-visible:outline-neutral-100"
            >
                <h3 class="text-sm font-medium text-neutral-900 dark:text-neutral-50">Notification Preferences</h3>
                <p class="mt-2 text-sm text-neutral-600 dark:text-neutral-400">
                    Configure how and when you receive notifications from us.
                </p>
            </div>
        </div>
    </div>
</div>

---
slug: tabs-vertical
title: Tabs Vertical
category: navigation
github: caresome
dependencies: []
publish_at: 2025-12-15 12:00:00
---

<div data-preview-only class="flex min-h-[400px] items-start justify-center p-8">
    <div
        x-data="{
            activeTab: 'profile',
            tabs: ['profile', 'security', 'billing', 'integrations'],
            focusedIndex: 0,
            focusTab(index) {
                this.focusedIndex = index;
                this.$nextTick(() => {
                    this.$refs[this.tabs[index]]?.focus();
                });
            }
        }"
        class="flex w-full max-w-2xl gap-6"
    >
        <!-- Tab List -->
        <div
            role="tablist"
            aria-label="Settings sections"
            aria-orientation="vertical"
            class="w-48 shrink-0 space-y-1"
            @keydown.arrow-down.prevent="focusTab((focusedIndex + 1) % tabs.length)"
            @keydown.arrow-up.prevent="focusTab((focusedIndex - 1 + tabs.length) % tabs.length)"
            @keydown.home.prevent="focusTab(0)"
            @keydown.end.prevent="focusTab(tabs.length - 1)"
        >
            <button
                x-ref="profile"
                @click="activeTab = 'profile'"
                @focus="focusedIndex = 0"
                type="button"
                role="tab"
                :aria-selected="activeTab === 'profile'"
                :tabindex="activeTab === 'profile' ? 0 : -1"
                aria-controls="panel-profile"
                class="flex w-full items-center gap-3 rounded-lg px-3 py-2 text-left text-sm font-medium transition-all focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
                :class="activeTab === 'profile' ? 'bg-neutral-100 text-neutral-900 dark:bg-neutral-800 dark:text-neutral-50' : 'text-neutral-600 hover:bg-neutral-50 hover:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800/50 dark:hover:text-neutral-50'"
            >
                <svg
                    class="h-5 w-5 shrink-0"
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
                Profile
            </button>
            <button
                x-ref="security"
                @click="activeTab = 'security'"
                @focus="focusedIndex = 1"
                type="button"
                role="tab"
                :aria-selected="activeTab === 'security'"
                :tabindex="activeTab === 'security' ? 0 : -1"
                aria-controls="panel-security"
                class="flex w-full items-center gap-3 rounded-lg px-3 py-2 text-left text-sm font-medium transition-all focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
                :class="activeTab === 'security' ? 'bg-neutral-100 text-neutral-900 dark:bg-neutral-800 dark:text-neutral-50' : 'text-neutral-600 hover:bg-neutral-50 hover:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800/50 dark:hover:text-neutral-50'"
            >
                <svg
                    class="h-5 w-5 shrink-0"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    aria-hidden="true"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"
                    />
                </svg>
                Security
            </button>
            <button
                x-ref="billing"
                @click="activeTab = 'billing'"
                @focus="focusedIndex = 2"
                type="button"
                role="tab"
                :aria-selected="activeTab === 'billing'"
                :tabindex="activeTab === 'billing' ? 0 : -1"
                aria-controls="panel-billing"
                class="flex w-full items-center gap-3 rounded-lg px-3 py-2 text-left text-sm font-medium transition-all focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
                :class="activeTab === 'billing' ? 'bg-neutral-100 text-neutral-900 dark:bg-neutral-800 dark:text-neutral-50' : 'text-neutral-600 hover:bg-neutral-50 hover:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800/50 dark:hover:text-neutral-50'"
            >
                <svg
                    class="h-5 w-5 shrink-0"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    aria-hidden="true"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z"
                    />
                </svg>
                Billing
            </button>
            <button
                x-ref="integrations"
                @click="activeTab = 'integrations'"
                @focus="focusedIndex = 3"
                type="button"
                role="tab"
                :aria-selected="activeTab === 'integrations'"
                :tabindex="activeTab === 'integrations' ? 0 : -1"
                aria-controls="panel-integrations"
                class="flex w-full items-center gap-3 rounded-lg px-3 py-2 text-left text-sm font-medium transition-all focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
                :class="activeTab === 'integrations' ? 'bg-neutral-100 text-neutral-900 dark:bg-neutral-800 dark:text-neutral-50' : 'text-neutral-600 hover:bg-neutral-50 hover:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800/50 dark:hover:text-neutral-50'"
            >
                <svg
                    class="h-5 w-5 shrink-0"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    aria-hidden="true"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M14.25 6.087c0-.355.186-.676.401-.959.221-.29.349-.634.349-1.003 0-1.036-1.007-1.875-2.25-1.875s-2.25.84-2.25 1.875c0 .369.128.713.349 1.003.215.283.401.604.401.959v0a.64.64 0 0 1-.657.643 48.39 48.39 0 0 1-4.163-.3c.186 1.613.293 3.25.315 4.907a.656.656 0 0 1-.658.663v0c-.355 0-.676-.186-.959-.401a1.647 1.647 0 0 0-1.003-.349c-1.036 0-1.875 1.007-1.875 2.25s.84 2.25 1.875 2.25c.369 0 .713-.128 1.003-.349.283-.215.604-.401.959-.401v0c.31 0 .555.26.532.57a48.039 48.039 0 0 1-.642 5.056c1.518.19 3.058.309 4.616.354a.64.64 0 0 0 .657-.643v0c0-.355-.186-.676-.401-.959a1.647 1.647 0 0 1-.349-1.003c0-1.035 1.008-1.875 2.25-1.875 1.243 0 2.25.84 2.25 1.875 0 .369-.128.713-.349 1.003-.215.283-.4.604-.4.959v0c0 .333.277.599.61.58a48.1 48.1 0 0 0 5.427-.63 48.05 48.05 0 0 0 .582-4.717.532.532 0 0 0-.533-.57v0c-.355 0-.676.186-.959.401-.29.221-.634.349-1.003.349-1.035 0-1.875-1.007-1.875-2.25s.84-2.25 1.875-2.25c.37 0 .713.128 1.003.349.283.215.604.401.96.401v0a.656.656 0 0 0 .658-.663 48.422 48.422 0 0 0-.37-5.36c-1.886.342-3.81.574-5.766.689a.578.578 0 0 1-.61-.58v0Z"
                    />
                </svg>
                Integrations
            </button>
        </div>

        <!-- Tab Panels -->
        <div class="flex-1">
            <div
                x-show="activeTab === 'profile'"
                id="panel-profile"
                role="tabpanel"
                aria-labelledby="profile"
                tabindex="0"
                class="rounded-xl border border-neutral-200 bg-white p-6 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:border-neutral-700 dark:bg-neutral-800 dark:focus-visible:outline-neutral-100"
            >
                <h3 class="text-lg font-semibold text-neutral-900 dark:text-neutral-50">Profile Settings</h3>
                <p class="mt-2 text-sm text-neutral-600 dark:text-neutral-400">
                    Manage your personal information, profile photo, and public display name. These details are visible
                    to other users.
                </p>
            </div>
            <div
                x-show="activeTab === 'security'"
                id="panel-security"
                role="tabpanel"
                aria-labelledby="security"
                tabindex="0"
                class="rounded-xl border border-neutral-200 bg-white p-6 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:border-neutral-700 dark:bg-neutral-800 dark:focus-visible:outline-neutral-100"
            >
                <h3 class="text-lg font-semibold text-neutral-900 dark:text-neutral-50">Security Settings</h3>
                <p class="mt-2 text-sm text-neutral-600 dark:text-neutral-400">
                    Update your password, enable two-factor authentication, and manage your active sessions for enhanced
                    security.
                </p>
            </div>
            <div
                x-show="activeTab === 'billing'"
                id="panel-billing"
                role="tabpanel"
                aria-labelledby="billing"
                tabindex="0"
                class="rounded-xl border border-neutral-200 bg-white p-6 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:border-neutral-700 dark:bg-neutral-800 dark:focus-visible:outline-neutral-100"
            >
                <h3 class="text-lg font-semibold text-neutral-900 dark:text-neutral-50">Billing & Subscription</h3>
                <p class="mt-2 text-sm text-neutral-600 dark:text-neutral-400">
                    View and update your payment methods, manage your subscription plan, and download invoices.
                </p>
            </div>
            <div
                x-show="activeTab === 'integrations'"
                id="panel-integrations"
                role="tabpanel"
                aria-labelledby="integrations"
                tabindex="0"
                class="rounded-xl border border-neutral-200 bg-white p-6 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:border-neutral-700 dark:bg-neutral-800 dark:focus-visible:outline-neutral-100"
            >
                <h3 class="text-lg font-semibold text-neutral-900 dark:text-neutral-50">Integrations</h3>
                <p class="mt-2 text-sm text-neutral-600 dark:text-neutral-400">
                    Connect your account to third-party services like Slack, GitHub, and Jira to streamline your
                    workflow.
                </p>
            </div>
        </div>
    </div>
</div>

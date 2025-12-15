---
slug: navbar-simple
title: Navbar Simple
category: navigation
github: caresome
dependencies: []
publish_at: 2025-12-15 12:00:00
---

<div data-preview-only class="min-h-[200px] w-full">
    <nav
        class="border-b border-neutral-200 bg-white dark:border-neutral-800 dark:bg-neutral-900"
        aria-label="Main navigation"
    >
        <div class="mx-auto flex h-16 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">
            <!-- Logo -->
            <a
                href="#"
                class="flex items-center gap-2 rounded-lg focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:focus-visible:outline-neutral-100"
            >
                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-neutral-900 dark:bg-neutral-100">
                    <span class="text-sm font-bold text-white dark:text-neutral-900">C</span>
                </div>
                <span class="text-sm font-semibold text-neutral-900 dark:text-neutral-50">Company</span>
            </a>

            <!-- Navigation Links -->
            <div class="hidden items-center gap-1 md:flex">
                <a
                    href="#"
                    class="rounded-lg px-3 py-2 text-sm font-medium text-neutral-900 transition-colors hover:bg-neutral-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:text-neutral-50 dark:hover:bg-neutral-800 dark:focus-visible:outline-neutral-100"
                >
                    Home
                </a>
                <a
                    href="#"
                    class="rounded-lg px-3 py-2 text-sm font-medium text-neutral-600 transition-colors hover:bg-neutral-100 hover:text-neutral-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:outline-neutral-100"
                >
                    Features
                </a>
                <a
                    href="#"
                    class="rounded-lg px-3 py-2 text-sm font-medium text-neutral-600 transition-colors hover:bg-neutral-100 hover:text-neutral-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:outline-neutral-100"
                >
                    Pricing
                </a>
                <a
                    href="#"
                    class="rounded-lg px-3 py-2 text-sm font-medium text-neutral-600 transition-colors hover:bg-neutral-100 hover:text-neutral-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-50 dark:focus-visible:outline-neutral-100"
                >
                    About
                </a>
            </div>

            <!-- CTA Button -->
            <div class="flex items-center gap-3">
                <a
                    href="#"
                    class="hidden text-sm font-medium text-neutral-600 transition-colors hover:text-neutral-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 sm:block dark:text-neutral-400 dark:hover:text-neutral-50 dark:focus-visible:outline-neutral-100"
                >
                    Sign in
                </a>
                <a
                    href="#"
                    class="rounded-lg bg-neutral-900 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-neutral-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:bg-neutral-100 dark:text-neutral-900 dark:hover:bg-neutral-200 dark:focus-visible:outline-neutral-100"
                >
                    Get Started
                </a>
            </div>
        </div>
    </nav>
</div>

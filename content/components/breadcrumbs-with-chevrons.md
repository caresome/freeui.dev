---
slug: breadcrumbs-with-chevrons
title: Breadcrumbs with Chevrons
category: navigation
github: caresome
dependencies: []
publish_at: 2025-12-15 12:00:00
---

<div data-preview-only class="flex min-h-[150px] items-center justify-center p-8">
    <nav aria-label="Breadcrumb">
        <ol class="flex flex-wrap items-center gap-1 text-sm">
            <li>
                <a
                    href="#"
                    class="flex items-center gap-1 text-neutral-500 transition-colors hover:text-neutral-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:text-neutral-400 dark:hover:text-neutral-50 dark:focus-visible:outline-neutral-100"
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
                            d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"
                        />
                    </svg>
                    <span class="sr-only">Home</span>
                </a>
            </li>
            <li aria-hidden="true">
                <svg
                    class="h-4 w-4 text-neutral-300 dark:text-neutral-600"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </li>
            <li>
                <a
                    href="#"
                    class="text-neutral-500 transition-colors hover:text-neutral-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:text-neutral-400 dark:hover:text-neutral-50 dark:focus-visible:outline-neutral-100"
                >
                    Dashboard
                </a>
            </li>
            <li aria-hidden="true">
                <svg
                    class="h-4 w-4 text-neutral-300 dark:text-neutral-600"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </li>
            <li>
                <a
                    href="#"
                    class="text-neutral-500 transition-colors hover:text-neutral-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:text-neutral-400 dark:hover:text-neutral-50 dark:focus-visible:outline-neutral-100"
                >
                    Projects
                </a>
            </li>
            <li aria-hidden="true">
                <svg
                    class="h-4 w-4 text-neutral-300 dark:text-neutral-600"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </li>
            <li>
                <span class="font-medium text-neutral-900 dark:text-neutral-50" aria-current="page">Project Alpha</span>
            </li>
        </ol>
    </nav>
</div>

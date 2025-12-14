---
slug: alert-with-list
title: Alert With List
category: feedback
github: caresome
dependencies: []
publish_at: 2025-12-14 00:22:00
---

<div data-preview-only class="flex min-h-[400px] items-center justify-center p-8">
    <div class="w-full max-w-md space-y-4">
        <!-- Error Alert with List -->
        <div
            class="flex items-start gap-3 rounded-lg bg-red-50 p-4 text-sm text-red-800 dark:bg-red-500/10 dark:text-red-400"
            role="alert"
        >
            <svg class="mt-0.5 h-5 w-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                <path
                    fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                    clip-rule="evenodd"
                />
            </svg>
            <div>
                <span class="font-medium">There were 2 errors with your submission:</span>
                <ul class="mt-1.5 list-inside list-disc">
                    <li>Your password must be at least 8 characters.</li>
                    <li>Your password must contain at least one symbol.</li>
                </ul>
            </div>
        </div>

        <!-- Info Alert with List -->
        <div
            class="flex items-start gap-3 rounded-lg bg-blue-50 p-4 text-sm text-blue-800 dark:bg-blue-500/10 dark:text-blue-400"
            role="alert"
        >
            <svg class="mt-0.5 h-5 w-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                <path
                    fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"
                />
            </svg>
            <div>
                <span class="font-medium">Please review the following requirements:</span>
                <ul class="mt-1.5 list-inside list-disc">
                    <li>Ensure you have a valid government-issued ID.</li>
                    <li>Ensure your profile picture is recent and clear.</li>
                    <li>Verify your email address is correct.</li>
                </ul>
            </div>
        </div>

        <!-- Warning Alert with List -->
        <div
            class="flex items-start gap-3 rounded-lg bg-amber-50 p-4 text-sm text-amber-800 dark:bg-amber-500/10 dark:text-amber-400"
            role="alert"
        >
            <svg class="mt-0.5 h-5 w-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                <path
                    fill-rule="evenodd"
                    d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                    clip-rule="evenodd"
                />
            </svg>
            <div>
                <span class="font-medium">Before proceeding, please note:</span>
                <ul class="mt-1.5 list-inside list-disc">
                    <li>This action cannot be undone.</li>
                    <li>Deleted data will be permanently removed.</li>
                    <li>Associated accounts will be deactivated.</li>
                </ul>
            </div>
        </div>
    </div>
</div>

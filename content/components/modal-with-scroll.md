---
slug: modal-with-scroll
title: Modal With Scroll
category: overlays
github: caresome
dependencies:
    - '@alpinejs/focus https://cdn.jsdelivr.net/npm/@alpinejs/focus@3.x.x/dist/cdn.min.js'
publish_at: 2025-12-14 00:00:00
---

<div data-preview-only class="flex min-h-[400px] items-center justify-center p-4">
    <div x-data="{ open: false }" @keydown.escape.window="if (open) { open = false; $refs.trigger.focus(); }">
        <!-- Trigger Button -->
        <button
            x-ref="trigger"
            @click="open = true"
            type="button"
            class="inline-flex items-center gap-2 rounded-lg bg-neutral-900 px-4 py-2.5 text-sm font-medium text-white shadow-sm transition-all duration-150 hover:bg-neutral-800 focus-visible:outline focus-visible:outline-1 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 active:scale-[0.98] dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100 dark:focus-visible:outline-neutral-100"
        >
            View Terms & Conditions
        </button>

        <!-- Modal Backdrop -->
        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click="open = false; $refs.trigger.focus();"
            class="fixed inset-0 z-40 bg-neutral-900/50 backdrop-blur-sm"
            aria-hidden="true"
            x-cloak
        ></div>

        <!-- Modal Panel -->
        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="fixed inset-0 z-50 flex items-center justify-center p-4"
            x-cloak
        >
            <div
                x-trap.inert.noscroll="open"
                @click.stop
                class="flex max-h-[80vh] w-full max-w-lg flex-col rounded-xl border border-neutral-200 bg-white shadow-xl dark:border-neutral-700 dark:bg-neutral-800"
                role="dialog"
                aria-modal="true"
                aria-labelledby="scroll-modal-title"
            >
                <!-- Header (Fixed) -->
                <div
                    class="flex shrink-0 items-center justify-between border-b border-neutral-200 px-6 py-4 dark:border-neutral-700"
                >
                    <h3 id="scroll-modal-title" class="text-lg font-semibold text-neutral-900 dark:text-neutral-50">
                        Terms & Conditions
                    </h3>
                    <button
                        @click="open = false; $refs.trigger.focus();"
                        type="button"
                        class="-m-1 rounded-lg p-1 text-neutral-400 transition-colors hover:bg-neutral-100 hover:text-neutral-600 focus-visible:outline focus-visible:outline-1 focus-visible:outline-neutral-900 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus-visible:outline-neutral-100"
                        aria-label="Close modal"
                    >
                        <svg
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            aria-hidden="true"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Scrollable Content -->
                <div class="min-h-0 flex-1 overflow-y-auto px-6 py-4" tabindex="0" role="document">
                    <div class="prose prose-sm prose-neutral dark:prose-invert max-w-none">
                        <h4>1. Acceptance of Terms</h4>
                        <p>
                            By accessing and using this service, you accept and agree to be bound by the terms and
                            provision of this agreement. Additionally, when using this website's particular services,
                            you shall be subject to any posted guidelines or rules applicable to such services.
                        </p>

                        <h4>2. Description of Service</h4>
                        <p>
                            The Service provides users with access to a rich collection of resources, including various
                            communications tools, forums, shopping services, search services, personalized content and
                            branded programming through its network of properties.
                        </p>

                        <h4>3. User Conduct</h4>
                        <p>
                            You agree to use the Service only for lawful purposes. You are prohibited from posting or
                            transmitting through the Service any material that:
                        </p>
                        <ul>
                            <li>Is unlawful, threatening, abusive, harassing, defamatory, or invasive of privacy</li>
                            <li>Infringes any intellectual property or other right of any entity or person</li>
                            <li>Contains any virus or other harmful component</li>
                            <li>Is otherwise objectionable in any way</li>
                        </ul>

                        <h4>4. Privacy Policy</h4>
                        <p>
                            We respect your privacy and are committed to protecting it. Our Privacy Policy governs the
                            processing of all personal data collected from you in connection with your use of the
                            Service.
                        </p>

                        <h4>5. Limitation of Liability</h4>
                        <p>
                            Under no circumstances shall we be liable for any direct, indirect, incidental, special, or
                            consequential damages that result from the use of, or the inability to use, the Service.
                        </p>

                        <h4>6. Modifications to Terms</h4>
                        <p>
                            We reserve the right to change these terms from time to time. Continued use of the Service
                            following such changes shall constitute your consent to such changes.
                        </p>
                    </div>
                </div>

                <!-- Footer (Fixed) -->
                <div
                    class="flex shrink-0 justify-end gap-3 border-t border-neutral-200 px-6 py-4 dark:border-neutral-700"
                >
                    <button
                        @click="open = false; $refs.trigger.focus();"
                        type="button"
                        class="rounded-lg px-4 py-2 text-sm font-medium text-neutral-700 transition-colors hover:bg-neutral-100 focus-visible:outline focus-visible:outline-1 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus-visible:outline-neutral-100"
                    >
                        Decline
                    </button>
                    <button
                        @click="open = false; $refs.trigger.focus();"
                        type="button"
                        class="rounded-lg bg-neutral-900 px-4 py-2 text-sm font-medium text-white transition-all duration-150 hover:bg-neutral-800 focus-visible:outline focus-visible:outline-1 focus-visible:outline-offset-2 focus-visible:outline-neutral-900 active:scale-[0.98] dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100 dark:focus-visible:outline-neutral-100"
                    >
                        Accept
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

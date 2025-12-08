@props([
    'content',
    'title',
    'slug',
    'category' => null,
    'username' => null,
    'authorAvatar' => null,
    'authorUrl' => null,
])

<div x-data="codePreviewComponent()" class="w-full">
    {{-- Data Storage --}}
    <template x-ref="originalContent">
        {!! $content !!}
    </template>

    <div
        class="group relative flex flex-col overflow-hidden rounded-xl border-2 border-neutral-900 bg-white text-neutral-900 shadow-[6px_6px_0px_0px_rgba(0,0,0,1)] dark:border-white dark:bg-neutral-900 dark:text-white dark:shadow-[6px_6px_0px_0px_rgba(255,255,255,1)]"
    >
        {{-- Header Bar --}}
        <div
            class="flex flex-wrap items-center justify-between gap-4 border-b-2 border-neutral-900 bg-white/50 px-4 py-3 backdrop-blur-sm dark:border-white dark:bg-black/20"
        >
            {{-- Left: Dots & Toggles --}}
            <div class="flex items-center gap-4 sm:gap-6">
                {{-- Mac Dots (Neo Style) --}}
                <div class="flex gap-1.5 sm:gap-2">
                    <div
                        class="h-3 w-3 rounded-full border-2 border-neutral-900 bg-[#ff5f57] shadow-[1px_1px_0px_0px_rgba(0,0,0,1)] sm:h-3.5 sm:w-3.5 dark:border-white"
                    ></div>
                    <div
                        class="h-3 w-3 rounded-full border-2 border-neutral-900 bg-[#febc2e] shadow-[1px_1px_0px_0px_rgba(0,0,0,1)] sm:h-3.5 sm:w-3.5 dark:border-white"
                    ></div>
                    <div
                        class="h-3 w-3 rounded-full border-2 border-neutral-900 bg-[#28c840] shadow-[1px_1px_0px_0px_rgba(0,0,0,1)] sm:h-3.5 sm:w-3.5 dark:border-white"
                    ></div>
                </div>

                {{-- View Toggles --}}
                <div
                    class="flex items-center rounded-xl border-2 border-neutral-900 bg-white p-1 shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] dark:border-white dark:bg-neutral-950 dark:shadow-[2px_2px_0px_0px_rgba(255,255,255,1)]"
                >
                    <button
                        @click="switchTab('preview')"
                        :class="activeTab === 'preview' ? 'bg-neutral-900 text-white dark:bg-white dark:text-neutral-900' :
                            'text-neutral-900 hover:bg-neutral-900/5 focus-visible:bg-neutral-900/5 dark:text-white dark:hover:bg-white/10 dark:focus-visible:bg-white/10'"
                        class="flex items-center gap-2 rounded-lg px-3 py-1.5 text-xs font-bold transition-all"
                        aria-label="Show Preview"
                    >
                        <x-heroicon-o-eye class="h-4 w-4" aria-hidden="true" />
                        <span class="hidden sm:inline">Preview</span>
                    </button>
                    <button
                        @click="switchTab('code')"
                        :class="activeTab === 'code' ? 'bg-neutral-900 text-white dark:bg-white dark:text-neutral-900' :
                            'text-neutral-900 hover:bg-neutral-900/5 focus-visible:bg-neutral-900/5 dark:text-white dark:hover:bg-white/10 dark:focus-visible:bg-white/10'"
                        class="flex items-center gap-2 rounded-lg px-3 py-1.5 text-xs font-bold transition-all"
                        aria-label="Show Code"
                    >
                        <x-heroicon-o-code-bracket class="h-4 w-4" aria-hidden="true" />
                        <span class="hidden sm:inline">Code</span>
                    </button>
                </div>
            </div>

            {{-- Right: Actions --}}
            <div class="flex items-center gap-3">
                {{-- Device Resizer --}}
                <div
                    x-show="activeTab === 'preview'"
                    x-transition:enter="transition duration-200 ease-out"
                    x-transition:enter-start="translate-y-1 opacity-0"
                    x-transition:enter-end="translate-y-0 opacity-100"
                    class="hidden items-center gap-1 rounded-xl border-2 border-neutral-900 bg-white p-1 shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] lg:flex dark:border-white dark:bg-neutral-950 dark:shadow-[2px_2px_0px_0px_rgba(255,255,255,1)]"
                >
                    <button
                        @click="setDevice('100%')"
                        title="Desktop"
                        :class="previewWidth === '100%' ?
                            'bg-neutral-900 text-white dark:bg-white dark:text-neutral-900' :
                            'text-gray-500 hover:bg-gray-100 focus-visible:bg-gray-100 dark:text-gray-400 dark:hover:bg-white/5 dark:focus-visible:bg-white/5'"
                        class="rounded-lg p-1.5 transition-colors"
                        aria-label="Desktop specific view"
                    >
                        <x-heroicon-o-computer-desktop class="h-4 w-4" aria-hidden="true" />
                    </button>
                    <button
                        @click="setDevice('768px')"
                        title="Tablet"
                        :class="previewWidth === '768px' ?
                            'bg-neutral-900 text-white dark:bg-white dark:text-neutral-900' :
                            'text-gray-500 hover:bg-gray-100 focus-visible:bg-gray-100 dark:text-gray-400 dark:hover:bg-white/5 dark:focus-visible:bg-white/5'"
                        class="rounded-lg p-1.5 transition-colors"
                        aria-label="Tablet specific view"
                    >
                        <x-heroicon-o-device-tablet class="h-4 w-4" aria-hidden="true" />
                    </button>
                    <button
                        @click="setDevice('375px')"
                        title="Mobile"
                        :class="previewWidth === '375px' ?
                            'bg-neutral-900 text-white dark:bg-white dark:text-neutral-900' :
                            'text-gray-500 hover:bg-gray-100 focus-visible:bg-gray-100 dark:text-gray-400 dark:hover:bg-white/5 dark:focus-visible:bg-white/5'"
                        class="rounded-lg p-1.5 transition-colors"
                        aria-label="Mobile specific view"
                    >
                        <x-heroicon-o-device-phone-mobile class="h-4 w-4" aria-hidden="true" />
                    </button>
                </div>

                {{-- Full Page Button --}}
                @if ($category && $slug)
                    <a
                        href="{{ route('components.preview', ['category' => $category, 'slug' => $slug]) }}"
                        target="_blank"
                        class="group flex items-center gap-2 rounded-xl border-2 border-neutral-900 bg-white px-3 py-2.5 text-xs font-bold shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] transition-all hover:translate-x-[1px] hover:translate-y-[1px] hover:shadow-none focus-visible:translate-x-[1px] focus-visible:translate-y-[1px] focus-visible:shadow-none active:translate-x-[2px] active:translate-y-[2px] active:shadow-none dark:border-white dark:bg-neutral-900 dark:shadow-[2px_2px_0px_0px_rgba(255,255,255,1)]"
                        title="View Full Page"
                    >
                        <x-heroicon-o-arrows-pointing-out class="h-4 w-4" aria-hidden="true" />
                        <span class="hidden sm:inline">Full Screen</span>
                    </a>
                @endif

                {{-- Copy Button --}}
                <button
                    @click="copyCode()"
                    class="group flex items-center gap-2 rounded-xl border-2 border-neutral-900 bg-white px-3 py-2.5 text-xs font-bold shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] transition-all hover:translate-x-[1px] hover:translate-y-[1px] hover:shadow-none focus-visible:translate-x-[1px] focus-visible:translate-y-[1px] focus-visible:shadow-none active:translate-x-[2px] active:translate-y-[2px] active:shadow-none dark:border-white dark:bg-neutral-900 dark:shadow-[2px_2px_0px_0px_rgba(255,255,255,1)]"
                >
                    <span x-show="!copied" class="flex items-center gap-2">
                        <x-heroicon-o-clipboard-document class="h-4 w-4" aria-hidden="true" />
                        <span>Copy</span>
                    </span>
                    <span x-show="copied" class="flex items-center gap-2 text-green-600 dark:text-green-400" x-cloak>
                        <x-heroicon-o-check class="h-4 w-4" aria-hidden="true" />
                        <span>Copied!</span>
                    </span>
                </button>
            </div>
        </div>

        {{-- Main Content Window --}}
        <div
            class="relative flex max-h-[600px] min-h-[600px] flex-1 flex-col border-t-2 border-neutral-900 bg-gray-50/50 dark:border-white dark:bg-black/20"
        >
            {{-- Preview Wrapper --}}
            <div
                x-show="activeTab === 'preview'"
                x-transition:enter="transition duration-200 ease-out"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                class="flex h-full w-full flex-1 overflow-auto bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] [background-size:16px_16px] p-8 dark:bg-[radial-gradient(#333_1px,transparent_1px)]"
            >
                <div :style="{ width: previewWidth }" class="m-auto transition-all duration-500 ease-in-out">
                    <iframe
                        x-ref="previewFrame"
                        class="w-full bg-transparent transition-all"
                        :style="{ height: iframeHeight }"
                        scrolling="no"
                        sandbox="allow-scripts allow-same-origin"
                        tabindex="-1"
                    ></iframe>
                </div>
            </div>

            {{-- Watermark / Author Credit --}}
            @if ($username)
                @php
                    $avatar = $authorAvatar ?? "https://github.com/{$username}.png";
                    $profile = $authorUrl ?? "https://github.com/{$username}";
                @endphp

                <div x-show="activeTab === 'preview'" class="absolute right-4 bottom-4 z-50">
                    <a
                        href="{{ $profile }}"
                        target="_blank"
                        class="group flex items-center gap-2 rounded-xl border-2 border-neutral-900 bg-white px-4 py-3 text-sm font-bold shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-none focus-visible:translate-x-[2px] focus-visible:translate-y-[2px] focus-visible:shadow-none dark:border-white dark:bg-neutral-900 dark:shadow-[4px_4px_0px_0px_rgba(255,255,255,1)]"
                    >
                        @if ($avatar)
                            <img
                                src="{{ $avatar }}"
                                alt="{{ $username }}"
                                class="h-8 w-8 rounded-lg border-2 border-neutral-900 object-cover dark:border-white"
                            />
                        @endif

                        <div class="flex flex-col">
                            <span class="text-left text-[10px] leading-tight text-neutral-600 dark:text-neutral-400">
                                Contributed by
                            </span>
                            <span class="leading-tight text-neutral-900 dark:text-white">{{ $username }}</span>
                        </div>
                    </a>
                </div>
            @endif

            {{-- Code Wrapper --}}
            <div
                x-show="activeTab === 'code'"
                x-transition:enter="transition duration-200 ease-out"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                style="display: none"
                class="h-full w-full flex-1 overflow-auto bg-black p-0 text-sm dark:bg-black/20"
            >
                <pre class="p-3"><code x-ref="codeBlock" class="language-html h-full">{{ $content }}</code></pre>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('codePreviewComponent', () => ({
            activeTab: 'preview',
            copied: false,
            previewWidth: '100%',
            iframeHeight: '100px',

            init() {
                // Handle Iframe messages
                window.addEventListener('message', (event) => {
                    if (
                        event.data.type === 'iframeHeight' &&
                        this.$refs.previewFrame &&
                        event.source === this.$refs.previewFrame.contentWindow
                    ) {
                        this.iframeHeight = event.data.height + 'px';
                    }
                });

                // Watch tab changes
                this.$watch('activeTab', (val) => {
                    if (val === 'code') {
                        // Retry mechanic for hljs if not loaded yet (e.g. slight network delay)
                        let checkCount = 0;
                        const checkHljs = setInterval(() => {
                            checkCount++;
                            if (window.hljs) {
                                clearInterval(checkHljs);
                                this.$nextTick(() => {
                                    if (!this.$refs.codeBlock.dataset.highlighted) {
                                        window.hljs.highlightElement(this.$refs.codeBlock);
                                    }
                                });
                            } else if (checkCount > 20) {
                                // Give up after ~2 seconds (20 * 100ms)
                                clearInterval(checkHljs);
                                console.warn('Highlight.js not loaded');
                            }
                        }, 100);
                    }
                });

                // Load iframe initial content
                this.$nextTick(() => this.updateIframe());
            },

            switchTab(tab) {
                this.activeTab = tab;
            },

            setDevice(width) {
                this.previewWidth = width;
            },

            async copyCode() {
                const code = this.$refs.codeBlock.textContent;

                // Try modern Clipboard API (works in secure contexts)
                try {
                    if (navigator.clipboard && navigator.clipboard.writeText && window.isSecureContext) {
                        await navigator.clipboard.writeText(code);
                        this.copied = true;
                        setTimeout(() => (this.copied = false), 2000);
                        return;
                    }
                } catch (err) {
                    // fall through to legacy
                }

                // Legacy Fallback for non-secure (http) or unsupported browsers
                try {
                    const textArea = document.createElement('textarea');
                    textArea.value = code;

                    // Invisible but part of DOM
                    textArea.style.position = 'fixed';
                    textArea.style.left = '-9999px';
                    textArea.style.top = '0';
                    textArea.style.opacity = '0';

                    document.body.appendChild(textArea);
                    textArea.focus();
                    textArea.select();

                    const successful = document.execCommand('copy');
                    document.body.removeChild(textArea);

                    if (successful) {
                        this.copied = true;
                        setTimeout(() => (this.copied = false), 2000);
                    } else {
                        console.error('Fallback copy command failed');
                    }
                } catch (err) {
                    console.error('Copy failed', err);
                }
            },

            updateIframe() {
                const iframe = this.$refs.previewFrame;
                if (!iframe) return;

                const doc = iframe.contentWindow.document;
                const content = this.$refs.originalContent.innerHTML;

                // Collect styles but exclude generic scripts to prevent double-execution errors
                // We keep <link rel="stylesheet"> and <style>
                const headContent = Array.from(document.head.children)
                    .map((child) => {
                        const tag = child.tagName.toUpperCase();
                        if (tag === 'SCRIPT') {
                            return ''; // Strip scripts for robustness
                        }
                        return child.outerHTML;
                    })
                    .join('');

                const resizeScript = `
                    <script>
                        function updateHeight() {
                            const body = document.body;
                            const html = document.documentElement;
                            if (!body) return;
                            const height = Math.max(body.scrollHeight, body.offsetHeight, html.offsetHeight);
                            window.parent.postMessage({ type: 'iframeHeight', height: height }, '*');
                        }

                        // Wait for images/resources
                        window.addEventListener('load', updateHeight);
                        window.addEventListener('resize', updateHeight);

                        // Observe DOM changes
                        new MutationObserver(updateHeight).observe(document.body, {
                            attributes: true, childList: true, subtree: true
                        });

                        // Immediate check
                        if (document.readyState === 'complete') updateHeight();
                    <\/script>
                `;

                doc.open();
                doc.write(`
                    <!DOCTYPE html>
                    <html class="${document.documentElement.classList.contains('dark') ? 'dark' : ''}">
                    <head>
                        ${headContent}
                        <style>
                            body { background-color: transparent !important; margin: 0; padding: 0; overflow: hidden; }
                            body > * { margin-left: auto !important; margin-right: auto !important; }
                        </style>
                    </head>
                    <body class="antialiased font-sans">
                        ${content}
                        ${resizeScript}
                    </body>
                    </html>
                `);
                doc.close();
            },
        }));
    });
</script>

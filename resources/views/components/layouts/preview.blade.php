@props([
    'title' => null,
    'description' => 'Free, open-source Tailwind CSS and Alpine.js components. Copy, paste, and build amazing projects faster.',
    'ogImage' => null,
    'ogUrl' => null,
    'componentContent' => '',
    'componentTitle' => '',
    'collection' => null,
    'category' => null,
    'slug' => null,
])

@php
    $pageTitle = $title ? $title . ' - FreeUI' : 'Preview - FreeUI';
    $pageDescription = $description;
    $pageOgImage = $ogImage ?? asset('og-default.png');
    $pageUrl = $ogUrl ?? url()->current();
    $codeUrl = $collection && $category && $slug ? route('components.code', ['collection' => $collection, 'category' => $category, 'slug' => $slug]) : null;
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full antialiased">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>{{ $pageTitle }}</title>
        <meta name="description" content="{{ $pageDescription }}" />

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website" />
        <meta property="og:url" content="{{ $pageUrl }}" />
        <meta property="og:title" content="{{ $pageTitle }}" />
        <meta property="og:description" content="{{ $pageDescription }}" />
        <meta property="og:image" content="{{ $pageOgImage }}" />

        <!-- Twitter -->
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:url" content="{{ $pageUrl }}" />
        <meta name="twitter:title" content="{{ $pageTitle }}" />
        <meta name="twitter:description" content="{{ $pageDescription }}" />
        <meta name="twitter:image" content="{{ $pageOgImage }}" />

        <link rel="canonical" href="{{ $pageUrl }}" />
        <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any" />
        <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml" />
        <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}" />

        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            rel="preload"
            as="style"
            href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
        />
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
            rel="stylesheet"
            media="print"
            onload="this.media = 'all'"
        />
        <noscript>
            <link
                href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
                rel="stylesheet"
            />
        </noscript>

        <x-theme-scripts />

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>

    <body
        class="flex min-h-full flex-col bg-neutral-50 font-sans transition-colors duration-200 dark:bg-neutral-950"
        x-data="previewPage({
                    rawCode: @js($componentContent),
                    title: @js($componentTitle),
                    codeUrl: @js($codeUrl),
                })"
    >
        <x-header-preview>
            {{ $headerRight ?? '' }}
        </x-header-preview>

        <main
            class="relative m-4 mt-0 rounded-xl border border-neutral-200 bg-white text-neutral-900 shadow-sm dark:border-neutral-800 dark:bg-black dark:text-white"
        >
            {{ $slot }}
        </main>

        <x-command-palette />

        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('previewPage', (config = {}) => ({
                    // Theme
                    theme: localStorage.getItem('theme') || 'system',

                    // Copy states
                    copied: false,
                    aiPromptCopied: false,
                    boltCopied: false,
                    replitCopied: false,
                    aiMenuOpen: false,

                    // Config
                    rawCode: config.rawCode || '',
                    title: config.title || 'Component',
                    codeUrl: config.codeUrl || null,

                    init() {
                        this.$watch('theme', (val) => {
                            localStorage.setItem('theme', val);
                            this.updateTheme();
                        });
                        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
                            if (this.theme === 'system') this.updateTheme();
                        });
                    },

                    updateTheme() {
                        let isDark =
                            this.theme === 'dark' ||
                            (this.theme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches);
                        document.documentElement.classList.toggle('dark', isDark);
                    },

                    async copyToClipboard(text) {
                        try {
                            if (navigator.clipboard && navigator.clipboard.writeText && window.isSecureContext) {
                                await navigator.clipboard.writeText(text);
                                return true;
                            }
                        } catch (err) {}

                        // Legacy fallback
                        try {
                            const textArea = document.createElement('textarea');
                            textArea.value = text;
                            textArea.style.cssText = 'position:fixed;left:-9999px;top:0;opacity:0';
                            document.body.appendChild(textArea);
                            textArea.focus();
                            textArea.select();
                            const success = document.execCommand('copy');
                            document.body.removeChild(textArea);
                            return success;
                        } catch (err) {
                            return false;
                        }
                    },

                    async copyCode() {
                        if (await this.copyToClipboard(this.rawCode)) {
                            this.copied = true;
                            setTimeout(() => (this.copied = false), 2000);
                        }
                    },

                    async copyAiPrompt() {
                        const prompt = `Here's a Tailwind CSS component called "${this.title}" from FreeUI (https://freeui.dev).
You can view the code here: ${this.codeUrl}

Ready to use - just paste into your project. Ask me to customize colors, layout, or functionality.`;

                        if (await this.copyToClipboard(prompt)) {
                            this.aiPromptCopied = true;
                            setTimeout(() => (this.aiPromptCopied = false), 2000);
                        }
                    },

                    getAiPrompt() {
                        return `I have this Tailwind CSS component called "${this.title}" from FreeUI.
You can view the code here: ${this.codeUrl}

Help me understand and customize this component.`;
                    },

                    openInLovable() {
                        const prompt = `Create a Tailwind CSS project with this FreeUI "${this.title}" component:

\`\`\`html
${this.rawCode}
\`\`\`

Render it centered on the page with proper styling.`;
                        window.open(
                            `https://lovable.dev/?autosubmit=true#prompt=${encodeURIComponent(prompt)}`,
                            '_blank',
                        );
                    },

                    openInChatGPT() {
                        const prompt = this.getAiPrompt();
                        window.open(`https://chatgpt.com/?q=${encodeURIComponent(prompt)}`, '_blank');
                    },

                    openInClaude() {
                        const prompt = this.getAiPrompt();
                        window.open(`https://claude.ai/new?q=${encodeURIComponent(prompt)}`, '_blank');
                    },

                    async copyForBolt() {
                        const prompt = `Create a Tailwind CSS project with this FreeUI "${this.title}" component.
You can view the code here: ${this.codeUrl}

Render it centered on the page with proper styling.`;

                        if (await this.copyToClipboard(prompt)) {
                            this.boltCopied = true;
                            setTimeout(() => (this.boltCopied = false), 2000);
                        }
                    },

                    async copyForReplit() {
                        const prompt = `Create a Tailwind CSS project with this FreeUI "${this.title}" component.
You can view the code here: ${this.codeUrl}

Render it centered on the page with proper styling.`;

                        if (await this.copyToClipboard(prompt)) {
                            this.replitCopied = true;
                            setTimeout(() => (this.replitCopied = false), 2000);
                        }
                    },
                }));
            });
        </script>
    </body>
</html>

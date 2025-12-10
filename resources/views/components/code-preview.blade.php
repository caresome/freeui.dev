@props([
    'content',
    'title',
    'slug',
    'collection' => null,
    'category' => null,
    'username' => null,
    'authorAvatar' => null,
    'authorUrl' => null,
])

@php
    $componentUrl = $collection && $category && $slug ? url("/{$collection}/{$category}/{$slug}") : null;
@endphp

<div
    x-data="codePreviewComponent({
                title: @js($title),
                componentUrl: @js($componentUrl),
                rawCode: @js($content),
                codeUrl: @js(route('components.code', ['collection' => $collection, 'category' => $category, 'slug' => $slug])),
            })"
    class="w-full"
>
    {{-- Data Storage --}}
    <template x-ref="originalContent">
        {!! $content !!}
    </template>

    <div
        class="group relative flex flex-col rounded-xl border-2 border-neutral-900 bg-white text-neutral-900 shadow-[6px_6px_0px_0px_rgba(0,0,0,1)] dark:border-white dark:bg-neutral-900 dark:text-white dark:shadow-[6px_6px_0px_0px_rgba(255,255,255,1)]"
    >
        {{-- Header Bar --}}
        <div
            class="relative z-20 flex flex-wrap items-center justify-between gap-4 rounded-t-[10px] border-b-2 border-neutral-900 bg-white/50 px-4 py-3 backdrop-blur-sm dark:border-white dark:bg-black/20"
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

            {{-- Center: Device Resizer --}}
            <div class="pointer-events-none absolute top-1/2 left-1/2 z-10 -translate-x-1/2 -translate-y-1/2">
                <div
                    x-show="activeTab === 'preview'"
                    x-transition:enter="transition duration-200 ease-out"
                    x-transition:enter-start="translate-y-1 opacity-0"
                    x-transition:enter-end="translate-y-0 opacity-100"
                    class="pointer-events-auto hidden items-center gap-1 rounded-xl border-2 border-neutral-900 bg-white p-1 shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] lg:flex dark:border-white dark:bg-neutral-950 dark:shadow-[2px_2px_0px_0px_rgba(255,255,255,1)]"
                    x-cloak
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
            </div>

            {{-- Right: Actions --}}
            <div class="flex items-center gap-3">
                {{-- Full Page Button --}}
                @if ($collection && $category && $slug)
                    <a
                        href="{{ route('components.preview', ['collection' => $collection, 'category' => $category, 'slug' => $slug]) }}"
                        target="_blank"
                        class="group flex items-center gap-2 rounded-xl border-2 border-neutral-900 bg-white px-3 py-2.5 text-xs font-bold shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] transition-all hover:translate-x-[1px] hover:translate-y-[1px] hover:shadow-none focus-visible:translate-x-[1px] focus-visible:translate-y-[1px] focus-visible:shadow-none active:translate-x-[2px] active:translate-y-[2px] active:shadow-none dark:border-white dark:bg-neutral-900 dark:shadow-[2px_2px_0px_0px_rgba(255,255,255,1)]"
                        title="View Full Page"
                    >
                        <x-heroicon-o-arrows-pointing-out class="h-4 w-4" aria-hidden="true" />
                        <span class="hidden sm:inline">Full Screen</span>
                    </a>
                @endif

                {{-- Split Button (Copy + AI) --}}
                <div
                    class="relative flex rounded-xl border-2 border-neutral-900 bg-white shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] dark:border-white dark:bg-neutral-900 dark:shadow-[2px_2px_0px_0px_rgba(255,255,255,1)]"
                    @click.away="aiMenuOpen = false"
                >
                    {{-- Copy Action (Left) --}}
                    <button
                        @click="copyCode()"
                        class="group flex items-center gap-2 rounded-l-xl px-3 py-2.5 text-xs font-bold transition-all hover:bg-neutral-100 active:translate-y-[1px] dark:hover:bg-neutral-800"
                    >
                        <span x-show="!copied" class="flex items-center gap-2">
                            <x-heroicon-o-clipboard-document class="h-4 w-4" aria-hidden="true" />
                            <span>Copy</span>
                        </span>
                        <span
                            x-show="copied"
                            class="flex items-center gap-2 text-green-600 dark:text-green-400"
                            x-cloak
                        >
                            <x-heroicon-o-check class="h-4 w-4" aria-hidden="true" />
                            <span>Copied!</span>
                        </span>
                    </button>

                    {{-- Divider --}}
                    <div class="w-0.5 bg-neutral-900 dark:bg-white"></div>

                    {{-- AI Menu Trigger (Right) --}}
                    <button
                        @click="aiMenuOpen = !aiMenuOpen"
                        class="group flex items-center rounded-r-xl px-1.5 py-2.5 transition-all hover:bg-neutral-100 active:translate-y-[1px] dark:hover:bg-neutral-800"
                        :class="aiMenuOpen ? 'bg-neutral-100 dark:bg-neutral-800' : ''"
                        aria-label="AI Options"
                    >
                        <span class="transition-transform duration-200" :class="aiMenuOpen && 'rotate-180'">
                            <x-heroicon-o-chevron-down class="h-4 w-4" aria-hidden="true" />
                        </span>
                    </button>

                    {{-- Dropdown Menu --}}
                    <div
                        x-show="aiMenuOpen"
                        x-transition:enter="transition duration-100 ease-out"
                        x-transition:enter-start="scale-95 opacity-0"
                        x-transition:enter-end="scale-100 opacity-100"
                        x-transition:leave="transition duration-75 ease-in"
                        x-transition:leave-start="scale-100 opacity-100"
                        x-transition:leave-end="scale-95 opacity-0"
                        class="absolute top-full right-0 z-[100] mt-2 w-72 origin-top-right rounded-xl border-2 border-neutral-900 bg-white p-1.5 shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] dark:border-white dark:bg-neutral-900 dark:shadow-[4px_4px_0px_0px_rgba(255,255,255,1)]"
                        x-cloak
                    >
                        {{-- Copy AI Prompt --}}
                        <button
                            @click="copyAiPrompt()"
                            type="button"
                            class="flex w-full items-center gap-3 rounded-lg px-3 py-2.5 text-left text-sm font-bold text-neutral-900 transition-colors hover:bg-neutral-900 hover:text-white dark:text-white dark:hover:bg-white dark:hover:text-neutral-900"
                        >
                            <template x-if="!aiPromptCopied">
                                <div class="flex items-center gap-3">
                                    <x-heroicon-o-sparkles class="h-4 w-4" aria-hidden="true" />
                                    <span>Copy AI Prompt</span>
                                </div>
                            </template>
                            <template x-if="aiPromptCopied">
                                <div class="flex items-center gap-3 text-green-600 dark:text-green-500">
                                    <x-heroicon-o-check class="h-4 w-4" aria-hidden="true" />
                                    <span>Copied!</span>
                                </div>
                            </template>
                        </button>

                        <div class="my-1.5 border-t border-neutral-200 dark:border-neutral-700"></div>

                        {{-- Open in Lovable --}}
                        <button
                            @click="openInLovable(); aiMenuOpen = false"
                            type="button"
                            class="flex w-full items-center gap-3 rounded-lg px-3 py-2.5 text-left text-sm font-medium text-neutral-700 transition-colors hover:bg-neutral-100 dark:text-neutral-300 dark:hover:bg-white/10"
                        >
                            <svg class="h-4 w-4" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <title>Lovable</title>
                                <path
                                    clip-rule="evenodd"
                                    d="M7.082 0c3.91 0 7.081 3.179 7.081 7.1v2.7h2.357c3.91 0 7.082 3.178 7.082 7.1 0 3.923-3.17 7.1-7.082 7.1H0V7.1C0 3.18 3.17 0 7.082 0z"
                                    fill="url(#lobe-icons-lovable-fill)"
                                    fill-rule="evenodd"
                                ></path>
                                <defs>
                                    <radialGradient
                                        cx="0"
                                        cy="0"
                                        gradientTransform="matrix(-1 22.49999 -30.45394 -1.3535 14 3)"
                                        gradientUnits="userSpaceOnUse"
                                        id="lobe-icons-lovable-fill"
                                        r="1"
                                    >
                                        <stop offset=".25" stop-color="#FE7B02"></stop>
                                        <stop offset=".433" stop-color="#FE4230"></stop>
                                        <stop offset=".548" stop-color="#FE529A"></stop>
                                        <stop offset=".654" stop-color="#DD67EE"></stop>
                                        <stop offset=".95" stop-color="#4B73FF"></stop>
                                    </radialGradient>
                                </defs>
                            </svg>
                            Open in Lovable
                        </button>

                        <div class="my-1.5 border-t border-neutral-200 dark:border-neutral-700"></div>

                        {{-- Explain in ChatGPT --}}
                        <button
                            @click="openInChatGPT(); aiMenuOpen = false"
                            type="button"
                            class="flex w-full items-center gap-3 rounded-lg px-3 py-2.5 text-left text-sm font-medium text-neutral-700 transition-colors hover:bg-neutral-100 dark:text-neutral-300 dark:hover:bg-white/10"
                        >
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path
                                    d="M22.2819 9.8211a5.9847 5.9847 0 0 0-.5157-4.9108 6.0462 6.0462 0 0 0-6.5098-2.9A6.0651 6.0651 0 0 0 4.9807 4.1818a5.9847 5.9847 0 0 0-3.9977 2.9 6.0462 6.0462 0 0 0 .7427 7.0966 5.98 5.98 0 0 0 .511 4.9107 6.051 6.051 0 0 0 6.5146 2.9001A5.9847 5.9847 0 0 0 13.2599 24a6.0557 6.0557 0 0 0 5.7718-4.2058 5.9894 5.9894 0 0 0 3.9977-2.9001 6.0557 6.0557 0 0 0-.7475-7.0729ZM13.2549 22.4293a4.4755 4.4755 0 0 1-2.8764-1.0408l.1419-.0821 4.7783-2.7582a.7948.7948 0 0 0 .3927-.6813v-6.7369l2.02 1.1686a.071.071 0 0 1 .038.052v5.5826a4.504 4.504 0 0 1-4.4945 4.4961Zm-9.6606-4.125a4.4699 4.4699 0 0 1-.5355-3.0137l.142.0852 4.7831 2.7582a.7712.7712 0 0 0 .7806 0l5.8428-3.3685v2.3324a.0804.0804 0 0 1-.0332.0615L9.74 19.9502a4.4996 4.4996 0 0 1-6.1457-1.6461Zm-1.2546-10.408a4.4849 4.4849 0 0 1 2.3661-1.9726V11.6a.7664.7664 0 0 0 .3879.6761l5.8145 3.3549-2.0201 1.168a.0757.0757 0 0 1-.071 0l-4.8303-2.7865A4.504 4.504 0 0 1 2.3397 7.8963Zm16.5966 3.8551L13.1035 8.364 15.1192 7.2a.0757.0757 0 0 1 .071 0l4.8303 2.7913a4.4941 4.4941 0 0 1-.6765 8.1042v-5.6778a.79.79 0 0 0-.4077-.667Zm2.0101-3.023l-.142-.0852-4.7735-2.7819a.7759.7759 0 0 0-.7852 0L9.4087 9.2297V6.8974a.0662.0662 0 0 1 .0283-.0615l4.8303-2.787a4.5003 4.5003 0 0 1 6.6795 4.6601Zm-12.6397 4.1352-2.0199-1.164a.0804.0804 0 0 1-.0382-.0567V6.0742a4.4996 4.4996 0 0 1 7.3752-3.453l-.142.0805-4.7783 2.7582a.7948.7948 0 0 0-.3927.6813Zm1.097-2.3654 2.602-1.4998 2.6069 1.4998v2.9994l-2.5975 1.4997-2.6068-1.4997Z"
                                />
                            </svg>
                            Explain in ChatGPT
                        </button>

                        {{-- Explain in Claude --}}
                        <button
                            @click="openInClaude(); aiMenuOpen = false"
                            type="button"
                            class="flex w-full items-center gap-3 rounded-lg px-3 py-2.5 text-left text-sm font-medium text-neutral-700 transition-colors hover:bg-neutral-100 dark:text-neutral-300 dark:hover:bg-white/10"
                        >
                            <svg class="h-4 w-4" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <title>Claude</title>
                                <path
                                    d="M4.709 15.955l4.72-2.647.08-.23-.08-.128H9.2l-.79-.048-2.698-.073-2.339-.097-2.266-.122-.571-.121L0 11.784l.055-.352.48-.321.686.06 1.52.103 2.278.158 1.652.097 2.449.255h.389l.055-.157-.134-.098-.103-.097-2.358-1.596-2.552-1.688-1.336-.972-.724-.491-.364-.462-.158-1.008.656-.722.881.06.225.061.893.686 1.908 1.476 2.491 1.833.365.304.145-.103.019-.073-.164-.274-1.355-2.446-1.446-2.49-.644-1.032-.17-.619a2.97 2.97 0 01-.104-.729L6.283.134 6.696 0l.996.134.42.364.62 1.414 1.002 2.229 1.555 3.03.456.898.243.832.091.255h.158V9.01l.128-1.706.237-2.095.23-2.695.08-.76.376-.91.747-.492.584.28.48.685-.067.444-.286 1.851-.559 2.903-.364 1.942h.212l.243-.242.985-1.306 1.652-2.064.73-.82.85-.904.547-.431h1.033l.76 1.129-.34 1.166-1.064 1.347-.881 1.142-1.264 1.7-.79 1.36.073.11.188-.02 2.856-.606 1.543-.28 1.841-.315.833.388.091.395-.328.807-1.969.486-2.309.462-3.439.813-.042.03.049.061 1.549.146.662.036h1.622l3.02.225.79.522.474.638-.079.485-1.215.62-1.64-.389-3.829-.91-1.312-.329h-.182v.11l1.093 1.068 2.006 1.81 2.509 2.33.127.578-.322.455-.34-.049-2.205-1.657-.851-.747-1.926-1.62h-.128v.17l.444.649 2.345 3.521.122 1.08-.17.353-.608.213-.668-.122-1.374-1.925-1.415-2.167-1.143-1.943-.14.08-.674 7.254-.316.37-.729.28-.607-.461-.322-.747.322-1.476.389-1.924.315-1.53.286-1.9.17-.632-.012-.042-.14.018-1.434 1.967-2.18 2.945-1.726 1.845-.414.164-.717-.37.067-.662.401-.589 2.388-3.036 1.44-1.882.93-1.086-.006-.158h-.055L4.132 18.56l-1.13.146-.487-.456.061-.746.231-.243 1.908-1.312-.006.006z"
                                    fill="#D97757"
                                    fill-rule="nonzero"
                                ></path>
                            </svg>
                            Explain in Claude
                        </button>

                        <div class="my-1.5 border-t border-neutral-200 dark:border-neutral-700"></div>

                        {{-- Copy for Bolt --}}
                        <button
                            @click="copyForBolt()"
                            type="button"
                            class="flex w-full items-center gap-3 rounded-lg px-3 py-2.5 text-left text-sm font-medium text-neutral-700 transition-colors hover:bg-neutral-100 dark:text-neutral-300 dark:hover:bg-white/10"
                        >
                            <template x-if="!boltCopied">
                                <div class="flex items-center gap-3">
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path d="M11 15H6L13 1V9H18L11 23V15Z" />
                                    </svg>
                                    <span>Copy for Bolt</span>
                                </div>
                            </template>
                            <template x-if="boltCopied">
                                <div class="flex items-center gap-3 text-green-600 dark:text-green-500">
                                    <x-heroicon-o-check class="h-4 w-4" aria-hidden="true" />
                                    <span>Copied!</span>
                                </div>
                            </template>
                        </button>

                        {{-- Copy for Replit --}}
                        <button
                            @click="copyForReplit()"
                            type="button"
                            class="flex w-full items-center gap-3 rounded-lg px-3 py-2.5 text-left text-sm font-medium text-neutral-700 transition-colors hover:bg-neutral-100 dark:text-neutral-300 dark:hover:bg-white/10"
                        >
                            <template x-if="!replitCopied">
                                <div class="flex items-center gap-3">
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <title>Replit</title>
                                        <path
                                            d="M11.878 7.761H3.482A1.469 1.469 0 012 6.304V1.457C2 .644 2.67 0 3.482 0h6.913c.827 0 1.483.658 1.483 1.457v6.304zM20.882 16.215h-8.995V7.75h8.995c.87 0 1.588.717 1.588 1.586v5.294c0 .885-.717 1.586-1.588 1.586zM10.395 24H3.482C2.67 24 2 23.343 2 22.546v-4.853c0-.797.67-1.454 1.482-1.454h8.396v6.307c0 .797-.67 1.454-1.483 1.454z"
                                            fill="#FD5402"
                                        ></path>
                                    </svg>
                                    <span>Copy for Replit</span>
                                </div>
                            </template>
                            <template x-if="replitCopied">
                                <div class="flex items-center gap-3 text-green-600 dark:text-green-500">
                                    <x-heroicon-o-check class="h-4 w-4" aria-hidden="true" />
                                    <span>Copied!</span>
                                </div>
                            </template>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Main Content Window --}}
        <div
            class="relative z-10 flex max-h-[600px] min-h-[600px] flex-1 flex-col overflow-hidden rounded-b-[10px] border-t-2 border-neutral-900 bg-gray-50/50 dark:border-white dark:bg-black/20"
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
        Alpine.data('codePreviewComponent', (config = {}) => ({
            activeTab: 'preview',
            copied: false,
            aiPromptCopied: false,
            boltCopied: false,
            replitCopied: false,
            previewWidth: '100%',
            iframeHeight: '100px',
            aiMenuOpen: false,
            title: config.title || 'Component',
            componentUrl: config.componentUrl || window.location.href,
            rawCode: config.rawCode || '',
            codeUrl: config.codeUrl || null,

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

                // Watch for theme changes on parent document
                const observer = new MutationObserver((mutations) => {
                    mutations.forEach((mutation) => {
                        if (mutation.attributeName === 'class') {
                            this.syncIframeTheme();
                        }
                    });
                });

                observer.observe(document.documentElement, {
                    attributes: true,
                    attributeFilter: ['class'],
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
                const code = this.rawCode;

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

            syncIframeTheme() {
                const iframe = this.$refs.previewFrame;
                if (!iframe || !iframe.contentWindow) return;

                const isDark = document.documentElement.classList.contains('dark');
                const iframeDoc = iframe.contentWindow.document;

                if (iframeDoc && iframeDoc.documentElement) {
                    iframeDoc.documentElement.classList.toggle('dark', isDark);
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

            // AI Integration Methods
            getCode() {
                return this.rawCode;
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

            async copyAiPrompt() {
                const prompt = `Here's a Tailwind CSS component called "${this.title}" from FreeUI (https://freeui.dev).
You can view the code here: ${this.codeUrl}

Ready to use - just paste into your project. Ask me to customize colors, layout, or functionality.`;

                if (await this.copyToClipboard(prompt)) {
                    this.aiPromptCopied = true;
                    setTimeout(() => (this.aiPromptCopied = false), 2000);
                }
            },

            openInLovable() {
                const code = this.getCode();
                const prompt = `Create a Tailwind CSS project with this FreeUI "${this.title}" component:

\`\`\`html
${code}
\`\`\`

Render it centered on the page with proper styling.`;
                window.open(`https://lovable.dev/?autosubmit=true#prompt=${encodeURIComponent(prompt)}`, '_blank');
            },

            getAiPrompt() {
                return `I have this Tailwind CSS component called "${this.title}" from FreeUI.
You can view the code here: ${this.codeUrl}

Help me understand and customize this component.`;
            },

            openInChatGPT() {
                const prompt = this.getAiPrompt();
                window.open(`https://chatgpt.com/?q=${encodeURIComponent(prompt)}`, '_blank');
            },

            openInClaude() {
                const prompt = this.getAiPrompt();
                // Claude doesn't have a direct URL param for prompt injection currently supported publicly in the same way,
                // but we can start a new chat.
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

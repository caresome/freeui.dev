<header class="w-full bg-stone-50 transition-colors duration-200 dark:bg-neutral-950">
    <div class="mx-auto flex h-16 w-full items-center justify-between px-6 lg:px-8">
        <a href="/" class="group flex items-center gap-2">
            <div
                class="flex h-8 w-8 items-center justify-center rounded-lg border-2 border-neutral-900 bg-neutral-900 text-white shadow-[3px_3px_0px_0px_rgba(0,0,0,0.2)] transition-all group-hover:translate-x-[2px] group-hover:translate-y-[2px] group-hover:shadow-none group-focus-visible:translate-x-[2px] group-focus-visible:translate-y-[2px] group-focus-visible:shadow-none dark:border-white dark:bg-white dark:text-neutral-900 dark:shadow-[3px_3px_0px_0px_rgba(255,255,255,0.2)]"
            >
                <span class="text-sm font-black">F</span>
            </div>
            <span class="text-lg font-bold text-neutral-900 dark:text-white">FreeUI</span>
        </a>

        <div class="flex items-center gap-2">
            {{-- Theme Toggle --}}
            <button
                @click="theme = theme === 'light' ? 'dark' : (theme === 'dark' ? 'system' : 'light')"
                class="flex h-9 items-center gap-2 rounded-xl border-2 border-neutral-900 bg-white px-3 text-sm font-semibold text-neutral-900 shadow-[3px_3px_0px_0px_rgba(0,0,0,1)] transition-all hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-none focus-visible:translate-x-[2px] focus-visible:translate-y-[2px] focus-visible:shadow-none dark:border-white dark:bg-neutral-900 dark:text-white dark:shadow-[3px_3px_0px_0px_rgba(255,255,255,1)]"
                :aria-label="'Switch to ' + (theme === 'light' ? 'dark' : (theme === 'dark' ? 'system' : 'light')) + ' theme'"
            >
                <x-heroicon-o-sun class="h-4 w-4" x-show="theme === 'light'" aria-hidden="true" />
                <x-heroicon-o-moon class="h-4 w-4" x-show="theme === 'dark'" x-cloak aria-hidden="true" />
                <x-heroicon-o-computer-desktop class="h-4 w-4" x-show="theme === 'system'" x-cloak aria-hidden="true" />
                <span
                    class="hidden sm:inline"
                    x-text="theme === 'system' ? 'System' : theme === 'light' ? 'Light' : 'Dark'"
                ></span>
            </button>

            {{-- Copy Button with AI Dropdown --}}
            <div
                class="relative flex rounded-xl border-2 border-neutral-900 bg-white text-neutral-900 shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] dark:border-white dark:bg-neutral-900 dark:text-white dark:shadow-[2px_2px_0px_0px_rgba(255,255,255,1)]"
                @click.away="aiMenuOpen = false"
            >
                {{-- Copy Action (Left) --}}
                <button
                    @click="copyCode()"
                    class="group flex items-center gap-2 rounded-l-xl px-3 py-2 text-sm font-bold transition-all hover:bg-neutral-100 active:translate-y-[1px] dark:hover:bg-neutral-800"
                >
                    <span x-show="!copied" class="flex items-center gap-2">
                        <x-heroicon-o-clipboard-document class="h-4 w-4" aria-hidden="true" />
                        <span class="hidden sm:inline">Copy</span>
                    </span>
                    <span x-show="copied" class="flex items-center gap-2 text-green-600 dark:text-green-400" x-cloak>
                        <x-heroicon-o-check class="h-4 w-4" aria-hidden="true" />
                        <span class="hidden sm:inline">Copied!</span>
                    </span>
                </button>

                {{-- Divider --}}
                <div class="w-0.5 bg-neutral-900 dark:bg-white"></div>

                {{-- AI Menu Trigger (Right) --}}
                <button
                    @click="aiMenuOpen = !aiMenuOpen"
                    class="group flex items-center rounded-r-xl px-1.5 py-2 transition-all hover:bg-neutral-100 active:translate-y-[1px] dark:hover:bg-neutral-800"
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
                                fill="url(#lobe-icons-lovable-fill-header)"
                                fill-rule="evenodd"
                            ></path>
                            <defs>
                                <radialGradient
                                    cx="0"
                                    cy="0"
                                    gradientTransform="matrix(-1 22.49999 -30.45394 -1.3535 14 3)"
                                    gradientUnits="userSpaceOnUse"
                                    id="lobe-icons-lovable-fill-header"
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
                                <svg
                                    class="h-4 w-4"
                                    viewBox="0 0 512 512"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    stroke-linejoin="round"
                                    stroke-miterlimit="2"
                                    aria-hidden="true"
                                >
                                    <path
                                        d="M505.998 130.999v250c0 69-56 124.999-125 124.999h-250C62 505.998 6 449.998 6 380.998v-250C6 62 62 6 131 6h250c69 0 124.999 56 124.999 125z"
                                        fill="currentColor"
                                    />
                                    <path
                                        d="M276.124 373.905c-22.625 0-44.844-8.063-57.594-25.438l-4.5 20.469-83.031 43.312 8.969-43.312 60.468-269.187h74.031l-21.375 94.875c17.25-18.563 33.313-25.438 53.875-25.438 44.406 0 74.031 28.688 74.031 81.156 0 54.125-34.125 123.563-104.874 123.563zm28.374-108.219c0 25.031-18.093 44.031-41.562 44.031-13.156 0-25.062-4.844-32.875-13.344l11.5-49.656c8.625-8.468 18.5-13.312 30.031-13.312 17.688 0 32.906 12.906 32.906 32.281z"
                                        fill="#fff"
                                    />
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

            {{ $slot }}
        </div>
    </div>
</header>

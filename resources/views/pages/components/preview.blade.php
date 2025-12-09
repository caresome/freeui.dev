<x-layouts.preview
    :title="$uiComponent->title . ' - Preview'"
    description="A free UI component for your next project."
>
    <x-slot:headerRight>
        <div
            x-data="{
                copied: false,
                async share() {
                    // Try native share first
                    if (navigator.share) {
                        try {
                            await navigator.share({
                                title: '{{ $uiComponent->title }}',
                                url: window.location.href,
                            })
                            return
                        } catch (err) {
                            // Ignore user cancellation
                            if (err.name !== 'AbortError') console.error(err)
                            return
                        }
                    }

                    // Fallback to Clipboard
                    try {
                        // Check if modern Clipboard API is available and secure
                        if (
                            navigator.clipboard &&
                            navigator.clipboard.writeText &&
                            window.isSecureContext
                        ) {
                            await navigator.clipboard.writeText(window.location.href)
                        } else {
                            throw new Error('Clipboard API unavailable')
                        }
                    } catch (err) {
                        // Legacy execCommand fallback for non-secure contexts (http)
                        const textArea = document.createElement('textarea')
                        textArea.value = window.location.href

                        // Ensure textarea is not visible but part of DOM
                        textArea.style.top = '0'
                        textArea.style.left = '0'
                        textArea.style.position = 'fixed'
                        textArea.style.opacity = '0'

                        document.body.appendChild(textArea)
                        textArea.focus()
                        textArea.select()

                        try {
                            document.execCommand('copy')
                        } catch (e) {
                            console.error('Copy failed', e)
                            return
                        } finally {
                            document.body.removeChild(textArea)
                        }
                    }

                    // Show copied feedback
                    this.copied = true
                    setTimeout(() => (this.copied = false), 2000)
                },
            }"
        >
            <button
                @click="share()"
                class="flex h-9 items-center gap-2 rounded-xl border-2 border-neutral-900 bg-white px-3 text-sm font-bold text-neutral-900 shadow-[3px_3px_0px_0px_rgba(0,0,0,1)] transition-all hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-none dark:border-white dark:bg-neutral-900 dark:text-white dark:shadow-[3px_3px_0px_0px_rgba(255,255,255,1)]"
            >
                <template x-if="!copied">
                    <div class="flex items-center gap-2">
                        <x-heroicon-o-share class="h-4 w-4" />
                        <span class="hidden sm:inline">Share</span>
                    </div>
                </template>
                <template x-if="copied">
                    <div class="flex items-center gap-2 text-green-600 dark:text-green-400">
                        <x-heroicon-o-check class="h-4 w-4" />
                        <span class="hidden sm:inline">Copied!</span>
                    </div>
                </template>
            </button>
        </div>
    </x-slot>

    @if ($uiComponent->github)
        @php
            $avatar = $uiComponent->avatar_url ?? "https://github.com/{$uiComponent->github}.png";
            $profile = $uiComponent->github_url ?? "https://github.com/{$uiComponent->github}";
        @endphp

        <div class="fixed right-6 bottom-6 z-50">
            <a
                href="{{ $profile }}"
                target="_blank"
                class="group flex items-center gap-2 rounded-xl border-2 border-neutral-900 bg-white px-4 py-3 text-sm font-bold shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-none dark:border-white dark:bg-neutral-900 dark:shadow-[4px_4px_0px_0px_rgba(255,255,255,1)]"
            >
                <img
                    src="{{ $avatar }}"
                    alt="{{ $uiComponent->github }}"
                    class="h-8 w-8 rounded-lg border-2 border-neutral-900 object-cover dark:border-white"
                />
                <div class="flex flex-col">
                    <span class="text-left text-[10px] leading-tight text-neutral-600 dark:text-neutral-400">
                        Contributed by
                    </span>
                    <span class="leading-tight text-neutral-900 dark:text-white">{{ $uiComponent->github }}</span>
                </div>
            </a>
        </div>
    @endif

    <div class="mx-auto h-full w-full bg-transparent">
        {!! $uiComponent->content !!}
    </div>
</x-layouts.preview>

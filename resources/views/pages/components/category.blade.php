<x-layouts.docs :title="$category->title . ' Components'">
    <section class="bg-neutral-50 py-6 transition-colors duration-200 sm:py-8 dark:bg-neutral-950">
        <div class="px-6 lg:px-8">
            <x-breadcrumb
                :segments="[
                    ['label' => $collection->title, 'url' => route('collections.show', $collection->slug)],
                    ['label' => $category->title],
                ]"
            />

            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <h1 class="text-2xl font-semibold tracking-tight text-neutral-900 sm:text-3xl dark:text-white">
                        {{ $category->title }}
                    </h1>
                    <p class="mt-2 text-neutral-600 dark:text-neutral-400">
                        {{ $category->description ?? 'Browse our collection of ' . strtolower($category->title) . ' components.' }}
                    </p>
                </div>
                <div class="inline-flex items-center rounded-full bg-neutral-100 px-3 py-1 dark:bg-neutral-800">
                    <span class="text-sm font-medium text-neutral-600 dark:text-neutral-400">
                        {{ count($components) }} {{ Str::plural('component', count($components)) }}
                    </span>
                </div>
            </div>
        </div>
    </section>

    <section
        class="bg-white py-6 transition-colors duration-200 sm:py-8 dark:bg-neutral-900"
        x-data="{
            copiedSlug: null,
            announceMessage: '',
            async copyLink(slug) {
                const url =
                    window.location.origin + window.location.pathname + '#' + slug
                try {
                    await navigator.clipboard.writeText(url)
                    this.copiedSlug = slug
                    this.announceMessage = 'Link copied to clipboard'
                    setTimeout(() => {
                        this.copiedSlug = null
                        this.announceMessage = ''
                    }, 2000)
                } catch (err) {
                    // Fallback for older browsers
                    const textArea = document.createElement('textarea')
                    textArea.value = url
                    textArea.style.cssText =
                        'position:fixed;left:-9999px;top:0;opacity:0'
                    document.body.appendChild(textArea)
                    textArea.select()
                    document.execCommand('copy')
                    document.body.removeChild(textArea)
                    this.copiedSlug = slug
                    this.announceMessage = 'Link copied to clipboard'
                    setTimeout(() => {
                        this.copiedSlug = null
                        this.announceMessage = ''
                    }, 2000)
                }
            },
        }"
    >
        {{-- Screen reader announcement --}}
        <div aria-live="polite" class="sr-only" x-text="announceMessage"></div>

        <div class="px-6 lg:px-8">
            <div class="space-y-12">
                @foreach ($components as $uiComponent)
                    <div class="scroll-mt-20" id="{{ $uiComponent->slug }}">
                        <div class="mb-4 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                            <div class="flex flex-wrap items-center gap-3">
                                <h2 class="text-xl font-bold text-neutral-900 dark:text-white">
                                    {{ $uiComponent->title }}
                                </h2>
                                <button
                                    type="button"
                                    @click="copyLink('{{ $uiComponent->slug }}')"
                                    class="flex h-7 w-7 items-center justify-center rounded-lg text-neutral-400 transition-colors hover:bg-neutral-100 hover:text-neutral-600 dark:text-neutral-500 dark:hover:bg-neutral-800 dark:hover:text-neutral-300"
                                    :aria-label="copiedSlug === '{{ $uiComponent->slug }}' ? 'Link copied' : 'Copy link to {{ $uiComponent->title }}'"
                                >
                                    <x-heroicon-o-link
                                        class="h-3.5 w-3.5"
                                        aria-hidden="true"
                                        x-show="copiedSlug !== '{{ $uiComponent->slug }}'"
                                    />
                                    <x-heroicon-o-check
                                        class="h-3.5 w-3.5 text-green-600 dark:text-green-400"
                                        aria-hidden="true"
                                        x-show="copiedSlug === '{{ $uiComponent->slug }}'"
                                        x-cloak
                                    />
                                </button>
                                @if ($uiComponent->dependencies)
                                    <div class="flex flex-wrap gap-1.5">
                                        @foreach ($uiComponent->dependencies as $dependency)
                                            @php
                                                $parts = explode(' ', $dependency, 2);
                                                $label = count($parts) === 2 ? $parts[0] : basename(parse_url($dependency, PHP_URL_PATH));
                                            @endphp

                                            <span
                                                class="inline-flex items-center rounded-md bg-neutral-100 px-2 py-0.5 text-[10px] font-medium text-neutral-600 dark:bg-neutral-800 dark:text-neutral-400"
                                            >
                                                {{ $label }}
                                            </span>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="mt-4">
                            <x-code-preview
                                :content="$uiComponent->content"
                                :title="$uiComponent->title"
                                :slug="$uiComponent->slug"
                                :collection="$collection->slug"
                                :category="$uiComponent->category"
                                :username="$uiComponent->github"
                                :author-avatar="$uiComponent->avatar_url"
                                :author-url="$uiComponent->github_url"
                                :dependencies="$uiComponent->dependencies"
                            />
                        </div>
                    </div>
                @endforeach
            </div>

            @if ($components->isEmpty())
                <div
                    class="rounded-xl border border-dashed border-neutral-200 p-10 text-center dark:border-neutral-800"
                >
                    <div
                        class="mx-auto mb-3 flex h-12 w-12 items-center justify-center rounded-lg bg-neutral-100 dark:bg-neutral-800"
                    >
                        <x-heroicon-o-cube class="h-6 w-6 text-neutral-400 dark:text-neutral-500" aria-hidden="true" />
                    </div>
                    <h3 class="font-medium text-neutral-900 dark:text-white">No components in this category yet</h3>
                    <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">
                        Check back soon for new components!
                    </p>
                </div>
            @endif
        </div>
    </section>
</x-layouts.docs>

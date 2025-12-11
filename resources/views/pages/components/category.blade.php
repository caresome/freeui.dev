<x-layouts.app :title="$category->title . ' Components'">
    <section class="bg-stone-50 py-12 transition-colors duration-200 sm:py-16 dark:bg-neutral-950">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <x-breadcrumb
                :segments="[
                    ['label' => $collection->title, 'url' => route('collections.show', $collection->slug)],
                    ['label' => $category->title],
                ]"
            />

            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <h1
                        class="text-3xl font-black tracking-tight text-neutral-900 sm:text-4xl lg:text-5xl dark:text-white"
                    >
                        {{ $category->title }}
                    </h1>
                    <p class="mt-2 text-lg text-neutral-600 dark:text-neutral-400">
                        {{ $category->description ?? 'Browse our collection of ' . strtolower($category->title) . ' components.' }}
                    </p>
                </div>
                <div
                    class="inline-flex items-center gap-2 rounded-full border-2 border-neutral-900 bg-white px-4 py-2 shadow-[3px_3px_0px_0px_rgba(0,0,0,1)] dark:border-white dark:bg-neutral-900 dark:shadow-[3px_3px_0px_0px_rgba(255,255,255,1)]"
                >
                    <span class="text-sm font-bold text-neutral-900 dark:text-white">
                        {{ count($components) }} {{ Str::plural('component', count($components)) }}
                    </span>
                </div>
            </div>
        </div>
    </section>

    <section
        class="bg-white py-12 transition-colors duration-200 sm:py-16 dark:bg-neutral-900"
        x-data="{
            copiedSlug: null,
            async copyLink(slug) {
                const url =
                    window.location.origin + window.location.pathname + '#' + slug
                try {
                    await navigator.clipboard.writeText(url)
                    this.copiedSlug = slug
                    setTimeout(() => (this.copiedSlug = null), 2000)
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
                    setTimeout(() => (this.copiedSlug = null), 2000)
                }
            },
        }"
    >
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="space-y-12">
                @foreach ($components as $uiComponent)
                    <div class="scroll-mt-20" id="{{ $uiComponent->slug }}">
                        <div class="mb-4 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                            <div class="flex flex-wrap items-center gap-3">
                                <h2 class="text-xl font-bold text-neutral-900 dark:text-white">
                                    {{ $uiComponent->title }}
                                </h2>
                                <button
                                    @click="copyLink('{{ $uiComponent->slug }}')"
                                    class="group flex h-7 w-7 items-center justify-center rounded-lg border-2 border-neutral-900 bg-white text-neutral-600 shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] transition-all hover:translate-x-[1px] hover:translate-y-[1px] hover:text-neutral-900 hover:shadow-none focus-visible:translate-x-[1px] focus-visible:translate-y-[1px] focus-visible:text-neutral-900 focus-visible:shadow-none dark:border-white dark:bg-neutral-800 dark:text-neutral-400 dark:shadow-[2px_2px_0px_0px_rgba(255,255,255,1)] dark:hover:text-white dark:focus-visible:text-white"
                                    :title="copiedSlug === '{{ $uiComponent->slug }}' ? 'Copied!' : 'Copy link'"
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
                                                class="inline-flex items-center rounded-md border-2 border-neutral-900 bg-white px-2 py-0.5 text-[10px] font-bold text-neutral-900 shadow-[1px_1px_0px_0px_rgba(0,0,0,1)] dark:border-white dark:bg-neutral-800 dark:text-white dark:shadow-[1px_1px_0px_0px_rgba(255,255,255,1)]"
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
                                :dependencies="$uiComponent->dependencies"
                                :username="$uiComponent->github"
                                :author-avatar="$uiComponent->avatar_url"
                                :author-url="$uiComponent->github_url"
                                :tailwind-cdn="config('freeui.tailwind_cdn')"
                                :alpine-cdn="config('freeui.alpine_cdn')"
                            />
                        </div>
                    </div>
                @endforeach
            </div>

            @if ($components->isEmpty())
                <div
                    class="rounded-xl border-2 border-dashed border-neutral-200 p-12 text-center dark:border-neutral-800"
                >
                    <div
                        class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-xl border-2 border-neutral-900 bg-stone-50 dark:border-white dark:bg-neutral-950"
                    >
                        <x-heroicon-o-cube class="h-8 w-8 text-neutral-600 dark:text-neutral-400" aria-hidden="true" />
                    </div>
                    <h3 class="text-lg font-bold text-neutral-900 dark:text-white">
                        No components in this category yet
                    </h3>
                    <p class="mt-2 text-neutral-600 dark:text-neutral-400">Check back soon for new components!</p>
                </div>
            @endif
        </div>
    </section>
</x-layouts.app>

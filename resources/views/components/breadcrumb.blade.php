@props(['segments' => []])

<nav
    {{ $attributes->merge(['class' => 'flex mb-8']) }}
    aria-label="Breadcrumb">
    <ol
        role="list"
        class="flex items-center space-x-2 rounded-xl border-2 border-neutral-900 bg-white px-4 py-2 shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] dark:border-white dark:bg-neutral-900 dark:shadow-[4px_4px_0px_0px_rgba(255,255,255,1)]">
        <li>
            <div>
                <a
                    href="{{ route('home') }}"
                    class="text-neutral-500 transition-colors hover:text-neutral-900 focus-visible:text-neutral-900 dark:text-neutral-400 dark:hover:text-white dark:focus-visible:text-white">
                    <x-heroicon-s-home class="h-5 w-5 flex-shrink-0" aria-hidden="true" />
                    <span class="sr-only">Home</span>
                </a>
            </div>
        </li>

        @foreach ($segments as $segment)
            <li>
                <div class="flex items-center">
                    <svg
                        class="h-5 w-5 flex-shrink-0 text-neutral-400 dark:text-neutral-500"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        aria-hidden="true">
                        <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                    </svg>
                    @if (isset($segment['url']) && ! $loop->last)
                        <a
                            href="{{ $segment['url'] }}"
                            class="ml-2 text-sm font-bold text-neutral-500 transition-colors hover:text-neutral-900 focus-visible:text-neutral-900 dark:text-neutral-400 dark:hover:text-white dark:focus-visible:text-white">
                            {{ $segment['label'] }}
                        </a>
                    @else
                        <span class="ml-2 text-sm font-bold text-neutral-900 dark:text-white" aria-current="page">
                            {{ $segment['label'] }}
                        </span>
                    @endif
                </div>
            </li>
        @endforeach
    </ol>
</nav>

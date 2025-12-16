@props(['segments' => []])

<nav
    {{ $attributes->merge(['class' => 'flex mb-6']) }}
    aria-label="Breadcrumb"
>
    <ol role="list" class="flex items-center space-x-2">
        <li>
            <div>
                <a
                    href="{{ route('home') }}"
                    class="text-neutral-400 transition-colors hover:text-neutral-600 dark:text-neutral-500 dark:hover:text-neutral-300"
                >
                    <x-heroicon-s-home class="h-4 w-4 flex-shrink-0" aria-hidden="true" />
                    <span class="sr-only">Home</span>
                </a>
            </div>
        </li>

        @foreach ($segments as $segment)
            <li>
                <div class="flex items-center">
                    <svg
                        class="h-4 w-4 flex-shrink-0 text-neutral-300 dark:text-neutral-600"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        aria-hidden="true"
                    >
                        <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                    </svg>
                    @if (isset($segment['url']) && ! $loop->last)
                        <a
                            href="{{ $segment['url'] }}"
                            class="ml-2 text-sm font-medium text-neutral-500 transition-colors hover:text-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-200"
                        >
                            {{ $segment['label'] }}
                        </a>
                    @else
                        <span
                            class="ml-2 text-sm font-medium text-neutral-700 dark:text-neutral-200"
                            aria-current="page"
                        >
                            {{ $segment['label'] }}
                        </span>
                    @endif
                </div>
            </li>
        @endforeach
    </ol>
</nav>

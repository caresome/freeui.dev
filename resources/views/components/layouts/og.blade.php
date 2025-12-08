<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>{{ $title ?? 'Component Preview' }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link
            href="https://fonts.bunny.net/css?family=public-sans:400,500,600,700,800,900&display=swap"
            rel="stylesheet"
        />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="overflow-hidden bg-stone-50 font-sans text-neutral-900 antialiased">
        <div
            class="relative flex h-[630px] w-[1200px] flex-col justify-between border-8 border-neutral-900 bg-stone-50 p-12"
        >
            <!-- Dot Pattern Background -->
            <div
                class="absolute inset-0 z-0 opacity-20"
                style="background-image: radial-gradient(#171717 1px, transparent 1px); background-size: 20px 20px"
            ></div>

            <!-- Header -->
            <div class="relative z-10 flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div
                        class="flex h-16 w-16 items-center justify-center border-4 border-neutral-900 bg-white text-3xl font-black text-neutral-900 shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]"
                    >
                        F
                    </div>
                    <div>
                        <h1 class="text-4xl font-black tracking-tight text-neutral-900 uppercase">FreeUI</h1>
                        <p class="text-xl font-bold text-neutral-600">Open Source Components</p>
                    </div>
                </div>

                <div
                    class="border-4 border-neutral-900 bg-white px-6 py-2 text-xl font-bold text-neutral-900 shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]"
                >
                    {{ $category }}
                </div>
            </div>

            <!-- Component Preview Area -->
            <div class="relative z-10 my-4 flex flex-1 flex-col overflow-hidden">
                <div
                    class="relative m-auto w-full max-w-4xl border-4 border-neutral-900 bg-white p-8 shadow-[8px_8px_0px_0px_rgba(0,0,0,1)]"
                >
                    <div class="zoom-container" style="zoom: 0.75">
                        <div class="flex flex-col gap-8">
                            {!! $slot !!}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="relative z-10 flex items-center justify-between">
                <h2 class="text-5xl font-black text-neutral-900">{{ $title }}</h2>
                <div class="font-mono text-xl font-bold text-neutral-600">freeui.dev</div>
            </div>
        </div>
    </body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>{{ $title ?? 'Component Thumbnail' }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link
            href="https://fonts.bunny.net/css?family=public-sans:400,500,600,700,800,900&display=swap"
            rel="stylesheet"
        />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="overflow-hidden bg-stone-50 antialiased dark:bg-neutral-950">
        <!--
        Thumbnail Container
        Standardized size for generation: 800x500 (16:10 aspect ratio)
    -->
        <div class="relative flex h-[500px] w-[800px] flex-col overflow-hidden p-8">
            <!-- Center the content wrapper horizontally, but let it grow vertically -->
            <div class="m-auto w-full" style="zoom: 0.9">
                <!-- Ensure content stacks normally (block layout) -->
                <div class="flex flex-col gap-8">
                    {!! $slot !!}
                </div>
            </div>
        </div>
    </body>
</html>

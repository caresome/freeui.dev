<?php

return [
    /*
    |--------------------------------------------------------------------------
    | GitHub Configuration
    |--------------------------------------------------------------------------
    |
    | Base URL for GitHub profile links and avatar images.
    |
    */
    'github_base_url' => env('GITHUB_BASE_URL', 'https://github.com/'),

    /*
    |--------------------------------------------------------------------------
    | Project Repository
    |--------------------------------------------------------------------------
    |
    | The GitHub repository URL for the FreeUI project.
    |
    */
    'github_repo' => env('GITHUB_REPO', 'https://github.com/caresome/freeui.dev'),

    /*
    |--------------------------------------------------------------------------
    | Framework CDNs
    |--------------------------------------------------------------------------
    |
    | CDN URLs for Tailwind CSS and Alpine.js used in component previews.
    | These can be overridden via environment variables if needed.
    |
    */
    'tailwind_cdn' => env('TAILWIND_CDN', 'https://unpkg.com/@tailwindcss/browser@4'),
    'alpine_cdn' => env('ALPINE_CDN', 'https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js'),
];

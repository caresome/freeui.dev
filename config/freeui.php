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
    | Framework Versions
    |--------------------------------------------------------------------------
    |
    | The versions of Tailwind CSS and Alpine.js that components are built for.
    | Used for display in the UI and README. Components may work with older
    | versions but are primarily tested against these.
    |
    */
    'tailwind_cdn' => 'https://unpkg.com/@tailwindcss/browser@4',
    'alpine_cdn' => 'https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js',
];

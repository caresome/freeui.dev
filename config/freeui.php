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
    'tailwind_version' => '4.0',
    'alpine_version' => '3.0',
];

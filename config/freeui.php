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
    | Registry Schema
    |--------------------------------------------------------------------------
    |
    | The JSON schema URL used for component registry exports.
    |
    */
    'registry_schema' => env('REGISTRY_SCHEMA', 'https://ui.shadcn.com/schema/registry.json'),

    /*
    |--------------------------------------------------------------------------
    | Pagination Settings
    |--------------------------------------------------------------------------
    |
    | Default pagination limits for various parts of the application.
    |
    */
    'pagination' => [
        'search_results' => 12,
        'command_palette' => [
            'collections' => 3,
            'categories' => 5,
            'components' => 10,
        ],
    ],
];

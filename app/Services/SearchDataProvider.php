<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Collection;
use App\Models\Component;
use Illuminate\Support\Facades\Cache;

class SearchDataProvider
{
    /**
     * Cache duration in seconds (1 hour).
     */
    private const CACHE_TTL = 3600;

    /**
     * Cache key for search data.
     */
    private const CACHE_KEY = 'search_data';

    /**
     * Get all searchable data for the command palette.
     * Results are cached since content changes infrequently.
     *
     * @return array<int, array{type: string, title: string, url: string, breadcrumb: string|null, icon: string}>
     */
    public function getSearchData(): array
    {
        return Cache::remember(self::CACHE_KEY, self::CACHE_TTL, fn (): array => $this->buildSearchData());
    }

    /**
     * Clear the search data cache.
     */
    public function clearCache(): void
    {
        Cache::forget(self::CACHE_KEY);
    }

    /**
     * Build the search data from database.
     *
     * @return array<int, array{type: string, title: string, url: string, breadcrumb: string|null, icon: string}>
     */
    private function buildSearchData(): array
    {
        // Load all data with relationships in optimized queries
        $collections = Collection::whereHas('categories.components')->get();

        $categories = Category::with('collectionModel')
            ->whereHas('components')
            ->get();

        $components = Component::with('categoryModel.collectionModel')->get();

        // Map collections to search format
        $collectionData = $collections->map(fn (Collection $c): array => [
            'type' => 'collection',
            'title' => $c->title,
            'url' => route('collections.show', $c->slug),
            'breadcrumb' => null,
            'icon' => $c->icon ?? 'heroicon-o-rectangle-stack',
        ]);

        // Map categories to search format
        $categoryData = $categories->map(fn (Category $c): array => [
            'type' => 'category',
            'title' => $c->title,
            'url' => route('components.category', [
                'collection' => $c->collection,
                'category' => $c->slug,
            ]),
            'breadcrumb' => $c->collectionModel?->title,
            'icon' => $c->icon ?? 'heroicon-o-folder',
        ]);

        // Map components to search format (using hash URLs to scroll to component on category page)
        $componentData = $components->map(fn (Component $c): array => [
            'type' => 'component',
            'title' => $c->title,
            'url' => route('components.category', [
                'collection' => $c->categoryModel->collection ?? 'marketing',
                'category' => $c->category,
            ]).'#'.$c->slug,
            'breadcrumb' => ($c->categoryModel->collectionModel->title ?? '').' → '.($c->categoryModel->title ?? ''),
            'icon' => 'heroicon-o-cube',
        ]);

        return $collectionData->concat($categoryData)->concat($componentData)->values()->all();
    }
}

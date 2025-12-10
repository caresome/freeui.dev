<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Collection;
use App\Models\Component;

class SearchDataProvider
{
    /**
     * Get all searchable data for the command palette.
     *
     * @return array<int, array{type: string, title: string, url: string, breadcrumb: string|null, icon: string}>
     */
    public function getSearchData(): array
    {
        $collections = Collection::whereHas('categories.components')
            ->get()
            ->map(fn (Collection $c): array => [
                'type' => 'collection',
                'title' => $c->title,
                'url' => route('collections.show', $c->slug),
                'breadcrumb' => null,
                'icon' => $c->icon ?? 'heroicon-o-rectangle-stack',
            ]);

        $categories = Category::with('collectionModel')
            ->whereHas('components')
            ->get()
            ->map(fn (Category $c): array => [
                'type' => 'category',
                'title' => $c->title,
                'url' => route('components.category', [
                    'collection' => $c->collection,
                    'category' => $c->slug,
                ]),
                'breadcrumb' => $c->collectionModel->title ?? null,
                'icon' => $c->icon ?? 'heroicon-o-folder',
            ]);

        $components = Component::with('categoryModel.collectionModel')
            ->get()
            ->map(fn (Component $c): array => [
                'type' => 'component',
                'title' => $c->title,
                'url' => route('components.show', [
                    'collection' => $c->categoryModel->collection ?? 'marketing',
                    'category' => $c->category,
                    'slug' => $c->slug,
                ]),
                'breadcrumb' => ($c->categoryModel->collectionModel->title ?? '').' → '.($c->categoryModel->title ?? ''),
                'icon' => 'heroicon-o-cube',
            ]);

        return $collections->concat($categories)->concat($components)->values()->all();
    }
}

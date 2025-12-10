<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Collection;
use App\Models\Component as UiComponent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $search = $request->get('q', '');

        if (strlen((string) $search) < 2) {
            return response()->json([]);
        }

        $term = '%'.$search.'%';

        $collections = Collection::where('title', 'like', $term)
            ->whereHas('categories.components')
            ->limit(config('freeui.pagination.command_palette.collections', 3))
            ->get()
            ->map(fn ($c): array => [
                'type' => 'collection',
                'title' => $c->title,
                'url' => route('collections.show', $c->slug),
                'breadcrumb' => null,
                'icon' => $c->icon ?? 'heroicon-o-rectangle-stack',
            ]);

        $categories = Category::with('collectionModel')
            ->where('title', 'like', $term)
            ->whereHas('components')
            ->limit(config('freeui.pagination.command_palette.categories', 5))
            ->get()
            ->map(fn ($c): array => [
                'type' => 'category',
                'title' => $c->title,
                'url' => route('components.category', [
                    'collection' => $c->collection,
                    'category' => $c->slug,
                ]),
                'breadcrumb' => $c->collectionModel->title ?? null,
                'icon' => $c->icon ?? 'heroicon-o-folder',
            ]);

        $components = UiComponent::with('categoryModel.collectionModel')
            ->where('title', 'like', $term)
            ->limit(config('freeui.pagination.command_palette.components', 10))
            ->get()
            ->map(fn ($c): array => [
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

        return response()->json(
            $collections->concat($categories)->concat($components)->values()
        );
    }
}

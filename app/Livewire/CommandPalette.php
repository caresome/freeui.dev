<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Collection;
use App\Models\Component as UiComponent;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;

class CommandPalette extends Component
{
    public string $search = '';

    #[Computed]
    public function results(): \Illuminate\Support\Collection
    {
        if (strlen($this->search) < 2) {
            return collect();
        }

        $term = '%'.$this->search.'%';

        $collections = Collection::where('title', 'like', $term)
            ->whereHas('categories.components')
            ->limit(3)
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
            ->limit(5)
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
            ->limit(10)
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

        return $collections->concat($categories)->concat($components);
    }

    public function render(): View
    {
        return view('livewire.command-palette');
    }
}

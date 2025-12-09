<?php

namespace App\Livewire\Components;

use App\Models\Category;
use App\Models\Collection;
use App\Models\Component as UiComponent;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class Search extends Component
{
    public $search = '';

    public $selectedCollections = [];

    public $selectedCategories = [];

    public int $perPage = 12;

    public function queryString(): array
    {
        return [
            'search' => ['except' => ''],
            'selectedCollections' => ['except' => []],
            'selectedCategories' => ['except' => []],
        ];
    }

    public function toggleCollection(string $collectionSlug): void
    {
        $this->perPage = 12;

        if (in_array($collectionSlug, $this->selectedCollections)) {
            $this->selectedCollections = array_diff($this->selectedCollections, [$collectionSlug]);
        } else {
            $this->selectedCollections[] = $collectionSlug;
        }
    }

    public function toggleCategory(string $categorySlug): void
    {
        $this->perPage = 12;

        if (in_array($categorySlug, $this->selectedCategories)) {
            $this->selectedCategories = array_diff($this->selectedCategories, [$categorySlug]);
        } else {
            $this->selectedCategories[] = $categorySlug;
        }
    }

    public function updatedSearch(): void
    {
        $this->perPage = 12;
    }

    #[On('load-more')]
    public function loadMore(): void
    {
        $this->perPage += 12;
    }

    public function render(): View
    {
        $allCollections = Collection::orderBy('title')->get();
        $allCategories = Category::with('collectionModel')->orderBy('title')->get();

        $query = UiComponent::with('categoryModel.collectionModel')
            ->when($this->search, function ($query, $search): void {
                $query->where(function ($subQuery) use ($search): void {
                    $term = '%'.$search.'%';
                    $subQuery->where('title', 'like', $term)
                        ->orWhereHas('categoryModel', function ($catQuery) use ($term): void {
                            $catQuery->where('title', 'like', $term);
                        })
                        ->orWhereHas('categoryModel.collectionModel', function ($colQuery) use ($term): void {
                            $colQuery->where('title', 'like', $term);
                        });
                });
            })
            ->when(! empty($this->selectedCollections), function ($query): void {
                $query->whereHas('categoryModel', function ($catQuery): void {
                    $catQuery->whereIn('collection', $this->selectedCollections);
                });
            })
            ->when(! empty($this->selectedCategories), function ($query): void {
                $query->whereIn('category', $this->selectedCategories);
            });

        $totalCount = $query->count();
        $components = $query->take($this->perPage)->get();
        $hasMorePages = $totalCount > $this->perPage;

        return view('livewire.components.search', [
            'components' => $components,
            'allCollections' => $allCollections,
            'allCategories' => $allCategories,
            'hasMorePages' => $hasMorePages,
            'totalCount' => $totalCount,
        ]);
    }
}

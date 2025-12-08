<?php

namespace App\Livewire\Components;

use App\Models\Category;
use App\Models\Component as UiComponent;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class Search extends Component
{
    public $search = '';

    public $selectedCategories = [];

    public int $perPage = 12;

    public function queryString(): array
    {
        return [
            'search' => ['except' => ''],
            'selectedCategories' => ['except' => []],
        ];
    }

    public function toggleCategory(string $categorySlug): void
    {
        // Reset pagination when category changes
        $this->perPage = 12;

        if (in_array($categorySlug, $this->selectedCategories)) {
            $this->selectedCategories = array_diff($this->selectedCategories, [$categorySlug]);
        } else {
            $this->selectedCategories[] = $categorySlug;
        }
    }

    public function updatedSearch(): void
    {
        // Reset pagination when search changes
        $this->perPage = 12;
    }

    #[On('load-more')]
    public function loadMore(): void
    {
        $this->perPage += 12;
    }

    public function render(): View
    {
        $allCategories = Category::orderBy('title')->get();

        $query = UiComponent::with('categoryModel')
            ->when($this->search, function ($query, $search): void {
                $query->where(function ($subQuery) use ($search): void {
                    $term = '%'.$search.'%';
                    $subQuery->where('title', 'like', $term)
                        ->orWhere('description', 'like', $term)
                        ->orWhereHas('categoryModel', function ($catQuery) use ($term): void {
                            $catQuery->where('title', 'like', $term);
                        });
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
            'allCategories' => $allCategories,
            'hasMorePages' => $hasMorePages,
            'totalCount' => $totalCount,
        ]);
    }
}

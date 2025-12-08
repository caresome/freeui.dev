<?php

namespace App\Livewire\Components;

use App\Models\Category;
use App\Models\Component as UiComponent;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Search extends Component
{
    public $search = '';

    public $selectedCategories = [];

    public function queryString(): array
    {
        return [
            'search' => ['except' => ''],
            'selectedCategories' => ['except' => []],
        ];
    }

    public function toggleCategory(string $categorySlug): void
    {
        if (in_array($categorySlug, $this->selectedCategories)) {
            $this->selectedCategories = array_diff($this->selectedCategories, [$categorySlug]);
        } else {
            $this->selectedCategories[] = $categorySlug;
        }
    }

    public function render(): View
    {
        $allCategories = Category::orderBy('title')->get();

        $components = UiComponent::query()
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
            })
            ->get();

        return view('livewire.components.search', [
            'components' => $components,
            'allCategories' => $allCategories,
        ]);
    }
}

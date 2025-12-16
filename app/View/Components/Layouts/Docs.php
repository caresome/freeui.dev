<?php

namespace App\View\Components\Layouts;

use App\Models\Collection;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Docs extends Component
{
    public function __construct(
        public ?string $title = null,
        public string $description = 'Free, open-source Tailwind CSS and Alpine.js components. Copy, paste, and build amazing projects faster.',
        public ?string $ogImage = null,
        public ?string $ogUrl = null,
    ) {}

    public function render(): View
    {
        return view('components.layouts.docs', [
            'sidebarCollections' => $this->getSidebarCollections(),
        ]);
    }

    protected function getSidebarCollections()
    {
        return Collection::withComponents()
            ->withCategoriesAndCounts()
            ->orderBy('title')
            ->get();
    }
}

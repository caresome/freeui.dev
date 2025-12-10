<?php

namespace App\View\Components;

use App\Services\SearchDataProvider;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CommandPalette extends Component
{
    public function __construct(
        protected SearchDataProvider $searchDataProvider
    ) {}

    public function render(): View
    {
        return view('components.command-palette', [
            'searchData' => $this->searchDataProvider->getSearchData(),
        ]);
    }
}

<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchDialog extends Component
{
    public $query = '';

    public function render()
    {
        $searchResults = [];

        if (strlen($this->query) >= 2) {
             $searchResults = Http::withToken(config('services.tmdb.bearer'))
                ->get(config('services.tmdb.url').'/search/movie?query='.$this->query)
                ->json()['results'];
        }

        return view('livewire.search-dialog', [
            'searchResults' => collect($searchResults)->take(10),
        ]);
    }
}

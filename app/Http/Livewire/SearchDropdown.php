<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SearchDropdown extends Component
{
    public $search = '';

    public function render()
    {
        $searchResults = [];
        $searchResults2 = [];

        if (strlen($this->search) >= 2) {
            $searchResults = Http::withToken(config('services.tmdb.token'))
                        ->get('https://api.themoviedb.org/3/search/movie?query='.$this->search)
                        ->json()['results'];

            $searchResults2 = Http::withToken(config('services.tmdb.token'))
                        ->get('https://api.themoviedb.org/3/search/tv?query='.$this->search)
                        ->json()['results'];
        }

        // dump($searchResults);
        
        return view('livewire.search-dropdown', [
            'searchResults' => collect($searchResults)->take(7),
            'searchResults2' => collect($searchResults2)->take(7),
        ]);
    }
}

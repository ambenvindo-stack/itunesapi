<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SearchApiItunes extends Component
{
    public $search;
    public $searchResult = [];

    public function updatedSearch($newValue)
    {
        $response = Http::get('https://itunes.apple.com/search?term='. $this->search .'&limit=10');    

        $this->searchResult = $response->json()['results'];
        
        //dump($this->searchResult);

        //dd($response->json());
    }

    public function render()
    {
        return view('livewire.search-api-itunes');
    }
}

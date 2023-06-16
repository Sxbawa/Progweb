<?php

namespace App\Http\Livewire;

use App\Artikel;
use Livewire\Component;

class CardArtikel extends Component
{
    protected $listenres =[
        'indexArtikel'
    ];
    public function render()
    {
        // $art = Artikel::orderBy('id','desc')->limit(1)->get();
        // return view('livewire.card-artikel', ['art' => $art]);
        return view('livewire.card-artikel'); //dihapus
        
    }

    public function indexArtikel($artikel){
        
    }
}


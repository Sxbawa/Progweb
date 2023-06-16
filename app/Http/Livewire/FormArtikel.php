<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Artikel;


class FormArtikel extends Component
{
    public $judul;

    public $deskripsi;

    public function render()
    {
        return view('livewire.form-artikel');
    }

    public function simpan(){
        $artikel = Artikel::create([
            'judul'=> $this -> judul,
            'deskripsi'=> $this ->deskripsi
        ]);
        $this->resetInput();
    }

    private function resetInput(){

    }
}

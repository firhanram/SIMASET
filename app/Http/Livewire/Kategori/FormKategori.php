<?php

namespace App\Http\Livewire\Kategori;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class FormKategori extends Component
{
    public $nmKategori;

    public function addKategori(){
        $kategori = DB::table('m_kategori')
                        ->insert([
                            'nm_kategori' => $this->nmKategori
                        ]);
      
        $this->emit('kategoriAdded');
        $this->nmKategori = '';
        
    }

    public function render()
    {
        return view('livewire.kategori.form-kategori');
    }
}

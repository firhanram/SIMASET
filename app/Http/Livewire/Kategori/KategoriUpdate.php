<?php

namespace App\Http\Livewire\Kategori;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class KategoriUpdate extends Component
{
    public $nmKategori;
    public $kd_kategori;

    protected $listeners = [
        'getKategori'
    ];

    public function getKategori($kategori){

        foreach($kategori as $row){
            $this->nmKategori = $row['nm_kategori'];
            $this->kd_kategori = $row['kd_kategori'];
        }
    }

    public function updateKategori(){
        $kategori = DB::table('m_kategori')
                        ->where('kd_kategori',$this->kd_kategori)
                        ->update([
                            'nm_kategori' => $this->nmKategori
                        ]);
        if($kategori){
            $this->emit('statusUpdate');   
        }

        $this->emit('kategoriUpdated');
        $this->nmKategori = '';

    }

    public function render()
    {
        return view('livewire.kategori.kategori-update');
    }
}

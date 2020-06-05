<?php

namespace App\Http\Livewire\Lokasi;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class FormLokasi extends Component
{
    public $nmLokasi;
    public $alamat;

    public function addLokasi(){
        $lokasi = DB::table('m_lokasi')
                        ->insert([
                            'nm_lokasi' => $this->nmLokasi,
                            'alamat' => $this->alamat
                        ]);
        if($lokasi) {
            $this->emit('lokasiAdded');
            $this->nmLokasi = '';
            $this->alamat = '';
        }
    }

    public function render()
    {
        return view('livewire.lokasi.form-lokasi');
    }
}

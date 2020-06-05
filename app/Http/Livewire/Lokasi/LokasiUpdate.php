<?php

namespace App\Http\Livewire\Lokasi;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class LokasiUpdate extends Component
{   
    public $kd_lokasi;
    public $nmLokasi;
    public $alamat;

    protected $listeners = [
        'getLokasi'
    ];

    public function getLokasi($lokasi){
        foreach($lokasi as $row){
            $this->kd_lokasi = $row['kd_lokasi'];
            $this->nmLokasi = $row['nm_lokasi'];
            $this->alamat = $row['alamat'];
        }
    }

    public function updateLokasi(){
        $query = DB::table('m_lokasi')
                        ->where('kd_lokasi',$this->kd_lokasi)
                        ->update([
                            'nm_lokasi' => $this->nmLokasi,
                            'alamat' => $this->alamat
                        ]);
        
        if($query) {
            $this->emit('lokasiUpdated');
            $this->emit('statusUpdate');
            
            $this->nmLokasi = '';
            $this->alamat = '';
        }
    }

    public function render()
    {
        return view('livewire.lokasi.lokasi-update');
    }
}

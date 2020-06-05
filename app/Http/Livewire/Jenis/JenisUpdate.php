<?php

namespace App\Http\Livewire\Jenis;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class JenisUpdate extends Component
{
    public $nmJenis;
    public $kd_jenis;

    protected $listeners = [
        'getJenis'
    ];

    public function getJenis($jenis){

        foreach($jenis as $row){
            $this->nmJenis = $row['nm_jenis'];
            $this->kd_jenis = $row['kd_jenis'];
        }
    }

    public function updateJenis(){
        $jenis = DB::table('m_jenis')
                        ->where('kd_jenis',$this->kd_jenis)
                        ->update([
                            'nm_jenis' => $this->nmJenis
                        ]);

        if($jenis){
            $this->emit('statusUpdate');   
            $this->emit('jenisUpdated');
            $this->nmJenis = '';
    
        }
      
    }

    public function render()
    {
        return view('livewire.jenis.jenis-update');
    }
}

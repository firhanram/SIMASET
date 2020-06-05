<?php

namespace App\Http\Livewire\Ruang;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class RuangUpdate extends Component
{
    public $nmRuang;
    public $kd_ruang;
    public $lantai;

    protected $listeners = [
        'getRuang'
    ];

    public function getRuang($ruang){
        foreach($ruang as $row){
            $this->kd_ruang = $row['kd_ruang'];
            $this->nmRuang = $row['nm_ruang'];
            $this->lantai = $row['lantai'];
        }
    }

    public function updateRuang(){
        $ruang = DB::table('m_ruang')
                        ->where('kd_ruang',$this->kd_ruang)
                        ->update([
                            'nm_ruang' => $this->nmRuang,
                            'lantai' => $this->lantai
                        ]);

        if($ruang){
            $this->emit('statusUpdate');
            $this->emit('ruangUpdated');
            $this->nmRuang = '';
            $this->lantai = '';
        }

    }
    public function render()
    {
        return view('livewire.ruang.ruang-update');
    }
}

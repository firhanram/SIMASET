<?php

namespace App\Http\Livewire\Ruang;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class FormRuang extends Component
{
    public $nmRuang;
    public $lantai;

    public function addRuang(){
        $ruang = DB::table('m_ruang')
                        ->insert([
                            'nm_ruang' => $this->nmRuang,
                            'lantai' => $this->lantai
                        ]);
      
        $this->emit('ruangAdded');
        $this->nmRuang = '';
        $this->lantai = '';
        
    }

    public function render()
    {
        return view('livewire.ruang.form-ruang');
    }
}

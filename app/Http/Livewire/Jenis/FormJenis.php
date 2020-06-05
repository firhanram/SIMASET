<?php

namespace App\Http\Livewire\jenis;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class FormJenis extends Component
{
    public $nmJenis;

    public function addJenis(){
        $jenis = DB::table('m_jenis')
                     ->insert([
                         'nm_jenis' => $this->nmJenis
                     ]);
        
        $this->emit('jenisAdded');
        $this->nmJenis = '';

    }
    public function render()
    {
        return view('livewire.jenis.form-jenis');
    }
}

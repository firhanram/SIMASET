<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TableJenis extends Component
{   
    public $jenis;
    
    public function mount($jenis){
        $this->jenis = $jenis;
    }
    
    public function render()
    {
        return view('livewire.table-jenis');
    }
}

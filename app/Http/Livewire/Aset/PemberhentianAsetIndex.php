<?php

namespace App\Http\Livewire\Aset;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class PemberhentianAsetIndex extends Component
{
    use withPagination;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function getPemberhentian(){
        $data = DB::table('t_pemberhentian_aset')
                    ->join('t_aset','t_aset.no_aset','=','t_pemberhentian_aset.no_aset')
                    ->join('t_barang','t_aset.kd_barang','=','t_barang.kd_barang')
                    ->paginate(5);
        return $data;
    }
    public function render()
    {   
        $data = $this->getPemberhentian();
        return view('livewire.aset.pemberhentian-aset-index', ['data' => $data]);
    }
}

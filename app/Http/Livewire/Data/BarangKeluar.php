<?php

namespace App\Http\Livewire\Data;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class BarangKeluar extends Component
{
    use withPagination;

    public $tanggalAwal='';
    public $tanggalAkhir='';

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        if($this->tanggalAwal !='' && $this->tanggalAkhir !=''){
            $data = DB::table('t_barang_keluar')
                        ->join('t_barang','t_barang_keluar.kd_barang','=','t_barang.kd_barang')
                        ->whereBetween('tanggal_keluar',[$this->tanggalAwal,$this->tanggalAkhir])
                        ->paginate(5);
        } else {
            $data = DB::table('t_barang_keluar')
                        ->join('t_barang','t_barang_keluar.kd_barang','=','t_barang.kd_barang')
                        ->paginate(5);
        }

        return view('livewire.data.barang-keluar',[
            'data' => $data
        ]);
    }
}

<?php

namespace App\Http\Livewire\Aset;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class MutasiAsetIndex extends Component
{
    use withPagination;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function getDataMutasiAset(){
        $data = DB::table('t_mutasi_aset')
                    ->join('t_aset','t_mutasi_aset.no_aset','=','t_aset.no_aset')
                    ->join('t_barang','t_aset.kd_barang','=','t_barang.kd_barang')
                    ->join('m_lokasi','t_aset.kd_lokasi','=','m_lokasi.kd_lokasi')
                    ->join('m_ruang','t_aset.kd_ruang','=','m_ruang.kd_ruang')
                    ->paginate(5);
        return $data;
    }

    public function render()
    {
        $data = $this->getDataMutasiAset();
        return view('livewire.aset.mutasi-aset-index',['data' => $data]);
    }
}

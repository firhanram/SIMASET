<?php

namespace App\Http\Livewire\Aset;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class DaftarAset extends Component
{
    use withPagination;

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function formatRupiah($harga){
        $rupiah = "Rp ".number_format($harga,0,",",".");
        return $rupiah;
    }

    public function render()
    {
        if($this->search != ''){
            $data = DB::table('t_aset')
                        ->join('t_barang','t_aset.kd_barang','=','t_barang.kd_barang')
                        ->join('m_jenis','t_barang.kd_jenis','=','m_jenis.kd_jenis')
                        ->join('m_kategori','t_barang.kd_kategori','=','m_kategori.kd_kategori')
                        ->join('m_lokasi','t_aset.kd_lokasi','=','m_lokasi.kd_lokasi')
                        ->join('m_ruang','t_aset.kd_ruang','=','m_ruang.kd_ruang')
                        ->join('t_barang_masuk','t_barang.kd_barang','t_barang_masuk.kd_barang')
                        ->join('t_stok_barang','t_barang.kd_barang','=','t_stok_barang.kd_barang')
                        ->where('t_barang.nm_barang','like','%'.$this->search.'%')
                        ->paginate(5);
        } else {
            $data = DB::table('t_aset')
                        ->join('t_barang','t_aset.kd_barang','=','t_barang.kd_barang')
                        ->join('m_jenis','t_barang.kd_jenis','=','m_jenis.kd_jenis')
                        ->join('m_lokasi','t_aset.kd_lokasi','=','m_lokasi.kd_lokasi')
                        ->join('m_ruang','t_aset.kd_ruang','=','m_ruang.kd_ruang')
                        ->join('m_kategori','t_barang.kd_kategori','=','m_kategori.kd_kategori')
                        ->join('t_barang_masuk','t_barang.kd_barang','t_barang_masuk.kd_barang')
                        ->join('t_stok_barang','t_barang.kd_barang','=','t_stok_barang.kd_barang')
                        ->paginate(5);
        }

        return view('livewire.aset.daftar-aset',[
            'data' => $data
        ]);
    }
}

<?php

namespace App\Http\Livewire\Inventory;

use Livewire\Component;
use App\Http\Controllers\kategori\kategoriController;
use App\Http\Controllers\jenis\jenisController;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class InventoryIndex extends Component
{
    use withPagination;

    public $filterKategori = '';
    public $filterJenis = '';

    public function updatingSearch(){
        $this->resetPage();
    }

    public function deleteInventory($id){
        $query = DB::table('t_inventory')
                        ->where('no_inventory',$id)
                        ->delete();
        if($query){
            session()->flash('message','Data Berhasil Dihapus!');
        }
    }

    public function render()
    {
        $kategori = new kategoriController;
        $jenis = new jenisController;

        if($this->filterKategori !='' && $this->filterJenis !=''){
            $data = DB::table('t_inventory')
                        ->join('t_barang','t_inventory.kd_barang','=','t_barang.kd_barang')
                        ->join('m_jenis','t_barang.kd_jenis','=','m_jenis.kd_jenis')
                        ->join('m_kategori','t_barang.kd_kategori','=','m_kategori.kd_kategori')
                        ->join('t_barang_masuk','t_barang.kd_barang','=','t_barang_masuk.kd_barang')
                        ->join('m_vendor','t_barang_masuk.kd_vendor','=','m_vendor.kd_vendor')
                        ->join('t_stok_barang','t_barang.kd_barang','t_stok_barang.kd_barang')
                        ->where('t_barang.kd_kategori',$this->filterKategori)
                        ->where('t_barang.kd_jenis',$this->filterJenis)
                        ->paginate(5);
        } elseif($this->filterKategori != ''){
            $data = DB::table('t_inventory')
                        ->join('t_barang','t_inventory.kd_barang','=','t_barang.kd_barang')
                        ->join('m_jenis','t_barang.kd_jenis','=','m_jenis.kd_jenis')
                        ->join('m_kategori','t_barang.kd_kategori','=','m_kategori.kd_kategori')
                        ->join('t_barang_masuk','t_barang.kd_barang','=','t_barang_masuk.kd_barang')
                        ->join('m_vendor','t_barang_masuk.kd_vendor','=','m_vendor.kd_vendor')
                        ->join('t_stok_barang','t_barang.kd_barang','t_stok_barang.kd_barang')
                        ->where('t_barang.kd_kategori',$this->filterKategori)
                        ->paginate(5);
        } elseif($this->filterJenis != '') {
            $data = DB::table('t_inventory')
                        ->join('t_barang','t_inventory.kd_barang','=','t_barang.kd_barang')
                        ->join('m_jenis','t_barang.kd_jenis','=','m_jenis.kd_jenis')
                        ->join('m_kategori','t_barang.kd_kategori','=','m_kategori.kd_kategori')
                        ->join('t_barang_masuk','t_barang.kd_barang','=','t_barang_masuk.kd_barang')
                        ->join('m_vendor','t_barang_masuk.kd_vendor','=','m_vendor.kd_vendor')
                        ->join('t_stok_barang','t_barang.kd_barang','t_stok_barang.kd_barang')
                        ->where('t_barang.kd_kategori',$this->filterJenis)
                        ->paginate(5);
        } else {
            $data = DB::table('t_inventory')
                        ->join('t_barang','t_inventory.kd_barang','=','t_barang.kd_barang')
                        ->join('m_jenis','t_barang.kd_jenis','=','m_jenis.kd_jenis')
                        ->join('m_kategori','t_barang.kd_kategori','=','m_kategori.kd_kategori')
                        ->join('t_barang_masuk','t_barang.kd_barang','=','t_barang_masuk.kd_barang')
                        ->join('m_vendor','t_barang_masuk.kd_vendor','=','m_vendor.kd_vendor')
                        ->join('t_stok_barang','t_barang.kd_barang','t_stok_barang.kd_barang')
                        ->paginate(5);
        }
        return view('livewire.inventory.inventory-index',[
            'data' => $data,
            'kategori' => $kategori->getKategori(),
            'jenis' => $jenis->getJenis()
        ]);
    }
}

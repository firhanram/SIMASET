<?php

namespace App\Http\Livewire\Barang;

use Livewire\Component;
use App\Http\Controllers\kategori\kategoriController;
use App\Http\Controllers\jenis\jenisController;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class BarangIndex extends Component
{
    use withPagination;

    public $filterKategori = '';
    public $filterJenis = '';
    
    public function updatingSearch(){
        $this->resetPage();
    }

    public function deleteBarang($id){
        $query = DB::table('t_barang')
                        ->where('kd_barang',$id)
                        ->delete();
        if($query){
            session()->flash('message','Data Berhasil Dihapus!');
        }
        // dd("TEST");
    }
    
    public function render()
    {   
        $kategori = new kategoriController;
        $jenis = new jenisController;

        if($this->filterKategori != '' && $this->filterJenis != ''){
            $data = DB::table('t_barang')
                        ->join('m_jenis','t_barang.kd_jenis','=','m_jenis.kd_jenis')
                        ->join('m_kategori','t_barang.kd_kategori','m_kategori.kd_kategori')
                        ->where('t_barang.kd_kategori',$this->filterKategori)
                        ->where('t_barang.kd_jenis',$this->filterJenis)
                        ->paginate(5);
        } elseif($this->filterKategori != '') {
            $data = DB::table('t_barang')
                        ->join('m_jenis','t_barang.kd_jenis','=','m_jenis.kd_jenis')
                        ->join('m_kategori','t_barang.kd_kategori','=','m_kategori.kd_kategori')
                        ->where('t_barang.kd_kategori',$this->filterKategori)
                        ->paginate(5);
        } elseif($this->filterJenis != ''){
            $data = DB::table('t_barang')
                        ->join('m_jenis','t_barang.kd_jenis','=','m_jenis.kd_jenis')
                        ->join('m_kategori','t_barang.kd_kategori','=','m_kategori.kd_kategori')
                        ->where('t_barang.kd_jenis',$this->filterJenis)
                        ->paginate(5);
        } 
        else {
            $data = DB::table('t_barang')
                        ->join('m_jenis','t_barang.kd_jenis','=','m_jenis.kd_jenis')
                        ->join('m_kategori','t_barang.kd_kategori','=','m_kategori.kd_kategori')
                        ->paginate(5);
        }

        return view('livewire.barang.barang-index',[
            'data' => $data,
            'kategori' => $kategori->getKategori(),
            'jenis' => $jenis->getJenis()
        ]);
    }
}

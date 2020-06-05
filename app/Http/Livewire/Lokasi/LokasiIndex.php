<?php

namespace App\Http\Livewire\Lokasi;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class LokasiIndex extends Component
{
    use withPagination;

    public $search = '';
    public $update;

    protected $listeners = [
        'lokasiAdded',
        'lokasiUpdated',
        'statusUpdate'
    ];

    public function updatingSearch(){
        $this->resetPage();
    }

    public function lokasiAdded(){
        session()->flash('message','Data Berhasil Disimpan!');
    }

    public function lokasiUpdated(){
        session()->flash('message','Data Berhasil Diupdate');
    }

    public function statusUpdate(){
        $this->update = false;
    }

    public function getLokasi($id){
        $this->update = true;

        $lokasi = DB::table('m_lokasi')
                        ->where('kd_lokasi',$id)
                        ->get();
        
        $this->emit('getLokasi',$lokasi);
    }

    public function deleteLokasi($id){
        $query = DB::table('m_lokasi')
                        ->where('kd_lokasi', $id)
                        ->delete();
        if($query){
            session()->flash('message','Data Berhasil Dihapus!');
        }

    }

    public function render()
    {
       $data = DB::table('m_lokasi')
                    ->paginate(5);
        
        if($this->search != ''){
            $data = DB::table('m_lokasi')
                        ->where('nm_lokasi','like','%'.$this->search.'%')
                        ->orWhere('alamat','like','%'.$this->search.'%')
                        ->paginate(5);
        }

        return view('livewire.lokasi.lokasi-index', ['data' => $data]);
    }
}

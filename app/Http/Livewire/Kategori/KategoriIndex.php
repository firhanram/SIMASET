<?php

namespace App\Http\Livewire\Kategori;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class KategoriIndex extends Component
{
    use withPagination;

    public $search = '';
    public $update;

    public function updatingSearch(){
        $this->resetPage();
    }

    protected $listeners = [
        'kategoriAdded',
        'kategoriUpdated',
        'statusUpdate'
    ];

    public function kategoriAdded(){
        session()->flash('message','Data Berhasil Disimpan!');
    }

    public function kategoriUpdated(){
        session()->flash('message','Data Berhasil Diubah!');
    }

    public function statusUpdate(){
        $this->update = false;
    }

    public function deleteKategori($id){
        $query = DB::table('m_kategori')
                        ->where('Kd_kategori',$id)
                        ->delete();
        if($query){
            session()->flash('message','Data Berhasil Dihapus!');
        }
    }

    public function getKategori($id){
        $this->update = true;
        $kategori = DB::table('m_kategori')
                        ->where('kd_kategori',$id)
                        ->get();
        $this->emit('getKategori',$kategori);
    }

    public function render()
    {
        
        $data = DB::table('m_kategori')
                    ->paginate(5);
        
        if($this->search != ''){
            $data = DB::table('m_kategori')
                        ->where('nm_kategori','like','%'.$this->search.'%')
                        ->paginate(5);
        }

        return view('livewire.kategori.kategori-index',['data' => $data ]);
    }
}

<?php

namespace App\Http\Livewire\jenis;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class JenisIndex extends Component
{
    use WithPagination;

    public $search = '';
    public $update;

    public function updatingSearch(){
        $this->resetPage();
    }

    protected $listeners = [
        'jenisAdded',
        'jenisUpdated',
        'statusUpdate'
    ];

    public function jenisAdded(){
        session()->flash('message','Data Berhasil Disimpan!');
    }

    public function jenisUpdated(){
        session()->flash('message','Data Berhasil Diubah!');
    }

    public function getJenis($id){
        $this->update = true;

        $jenis = DB::table('m_jenis')
                        ->where('kd_jenis',$id)
                        ->get();

        $this->emit('getJenis',$jenis);
    }

    public function deleteJenis($id){
        $query = DB::table('m_jenis')
                        ->where('kd_jenis',$id)
                        ->delete();
        if($query){
           session()->flash('message','Data Berhasil Dihapus!');
        }
    }

    public function statusUpdate(){
        $this->update = false;
    }

    public function render()
    {
        $data = DB::table('m_jenis')
                    ->paginate(5);

        if($this->search != ''){
            $data = DB::table('m_jenis')
                        ->where('nm_jenis','like','%'.$this->search.'%')
                        ->paginate(5);
        }

        return view('livewire.jenis.jenis-index',['data' => $data]);
    }
}

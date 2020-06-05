<?php

namespace App\Http\Livewire\Ruang;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;


class RuangIndex extends Component
{
    use withPagination;

    public $search = '';
    public $update;

    public function updatingSearch(){
        $this->resetPage();
    }

    protected $listeners = [
        'ruangAdded',
        'ruangUpdated',
        'statusUpdate'
    ];

    public function ruangAdded(){
        session()->flash('message','Data Berhasil Disimpan!');
    }

    public function ruangUpdated(){
        session()->flash('message','Data Berhasil Diupdate!');
    }

    public function getRuang($id){
        $this->update = true;

        $data = DB::table('m_ruang')
                        ->where('kd_ruang',$id)
                        ->get();

        $this->emit('getRuang',$data);
    }

    public function deleteRuang($id){
        $query = DB::table('m_ruang')
                        ->where('kd_ruang',$id)
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
        $data = DB::table('m_ruang')
                    ->paginate(5);
                    
        if($this->search != ''){
            $data = DB::table('m_ruang')
                    ->where('nm_ruang', 'like','%'.$this->search.'%')
                    ->paginate(5);
        }

        return view('livewire.ruang.ruang-index',['data' => $data]);
    }
}

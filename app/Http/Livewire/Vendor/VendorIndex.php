<?php

namespace App\Http\Livewire\Vendor;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;


class VendorIndex extends Component
{
    use withPagination;

    public $search = '';
    public $update;

    protected $listeners = [
        'vendorAdded',
        'vendorUpdated',
        'statusUpdate'
    ];

    public function updatingSearch(){
        $this->resetPage();
    }

    public function vendorAdded(){
        session()->flash('message','Data Berhasil Disimpan!');
    }

    public function vendorUpdated(){
        session()->flash('message','Data Berhasil Diupdate!');
    }

    public function statusUpdate(){
        $this->update = false;
    }

    public function getVendor($id){
        $this->update = true;

        $vendor = DB::table('m_vendor')
                        ->where('kd_vendor',$id)
                        ->get();
        $this->emit('getVendor',$vendor);
    }

    public function deleteVendor($id){
        $query = DB::table('m_vendor')
                        ->where('kd_vendor',$id)
                        ->delete();
        if($query){
            session()->flash('message','Data Berhasil Dihapus!');
        }
    }

    public function render()
    {
        $data = DB::table('m_vendor')
                    ->paginate(5);

        if($this->search != ''){
            $data = DB::table('m_vendor')
                        ->where('nm_vendor','like','%'.$this->search.'%')
                        ->orWhere('no_telp','like','%'.$this->search.'%')
                        ->orWhere('alamat','like','%'.$this->search.'%')
                        ->orWhere('no_fax','like','%'.$this->search.'%')
                        ->paginate(5);
        }
        
        return view('livewire.vendor.vendor-index',['data' => $data]);
    }
}

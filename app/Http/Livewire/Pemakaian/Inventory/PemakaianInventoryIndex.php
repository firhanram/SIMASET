<?php

namespace App\Http\Livewire\Pemakaian\Inventory;

use App\Http\Controllers\pemakaian\inventory\pemakaianInventoryController;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Livewire\Component;

class PemakaianInventoryIndex extends Component
{
    use withPagination;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function approved($id){
        date_default_timezone_set('Asia/Jakarta');

        $query = DB::table('pemakaian_inventory')
                     ->where('id_pemakaian_inventory',$id)
                     ->update([
                        'status_pemakaian' => 'Disetujui'
                     ]);
        if($query) {
            DB::table('detail_persetujuan_pemakaian_inventory')
                ->insert([
                    'id_pemakaian_inventory' => $id,
                    'tanggal_persetujuan' => date('Y-m-d'),
                    'penyetuju' => session()->get('name'),
                    'keterangan' => 'Pengajuan Pemakaian Inventory Disetujui'
                ]);
            session()->flash('approved','Pemakaian Inventory Disetujui!');
        }
    }

    public function rejected($id){
        date_default_timezone_set('Asia/Jakarta');

        $query = DB::table('pemakaian_inventory')
                     ->where('id_pemakaian_inventory',$id)
                     ->update([
                        'status_pemakaian' => 'Tidak Disetujui'
                     ]);
        if($query) {
            DB::table('detail_persetujuan_pemakaian_inventory')
                ->insert([
                    'id_pemakaian_inventory' => $id,
                    'tanggal_persetujuan' => date('Y-m-d'),
                    'penyetuju' => session()->get('name'),
                    'keterangan' => 'Pengajuan Pemakaian Inventory Tidak Disetujui'
                ]);
            session()->flash('rejected','Pemakaian Inventory Tidak Disetujui!');
        }
    }

    public function render()
    {
        $pemakaianInventory = new pemakaianInventoryController;

        return view('livewire.pemakaian.inventory.pemakaian-inventory-index',[
            'data' => $pemakaianInventory->getDataPemakaianInventory()
        ]);
    }
}

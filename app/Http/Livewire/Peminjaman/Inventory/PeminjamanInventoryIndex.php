<?php

namespace App\Http\Livewire\Peminjaman\Inventory;

use Livewire\Component;
use App\Http\Controllers\peminjaman\inventory\peminjamanInventoryController;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;


class PeminjamanInventoryIndex extends Component
{
    use withPagination;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function approved($id){
        date_default_timezone_set('Asia/Jakarta');

        $query = DB::table('peminjaman_inventory')
                     ->where('id_peminjaman_inventory',$id)
                     ->update([
                        'status_peminjaman' => 'Disetujui'
                     ]);
        if($query) {
            DB::table('detail_persetujuan_peminjaman_inventory')
                ->insert([
                    'id_peminjaman_inventory' => $id,
                    'tanggal_persetujuan' => date('Y-m-d'),
                    'penyetuju' => session()->get('name'),
                    'keterangan' => 'Pengajuan Peminjaman Inventory Disetujui'
                ]);
            session()->flash('approved','Peminjaman Inventory Disetujui!');
        }
    }

    public function rejected($id){
        date_default_timezone_set('Asia/Jakarta');

        $query = DB::table('peminjaman_inventory')
                     ->where('id_peminjaman_inventory',$id)
                     ->update([
                        'status_peminjaman' => 'Tidak Disetujui'
                     ]);
        if($query) {
            DB::table('detail_persetujuan_peminjaman_inventory')
                ->insert([
                    'id_peminjaman_inventory' => $id,
                    'tanggal_persetujuan' => date('Y-m-d'),
                    'penyetuju' => session()->get('name'),
                    'keterangan' => 'Pengajuan Peminjaman Inventory Tidak Disetujui'
                ]);
            session()->flash('rejected','Peminjaman Inventory Tidak Disetujui!');
        }
    }

    public function render()
    {
        $peminjamanInventory = new peminjamanInventoryController;

        return view('livewire.peminjaman.inventory.peminjaman-inventory-index',[
            'data' => $peminjamanInventory->getDataPeminjamanInventory()
        ]);
    }
}

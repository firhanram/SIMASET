<?php

namespace App\Http\Livewire\Peminjaman\Aset;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\peminjaman\aset\peminjamanAsetController;
use Livewire\WithPagination;

class PeminjamanAsetIndex extends Component
{
    use withPagination;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function approved($id){
        date_default_timezone_set('Asia/Jakarta');

        $query = DB::table('peminjaman_aset')
                     ->where('id_peminjaman_aset',$id)
                     ->update([
                        'status_peminjaman' => 'Disetujui'
                     ]);
        if($query) {
            DB::table('detail_persetujuan_peminjaman_aset')
                ->insert([
                    'id_peminjaman_aset' => $id,
                    'tanggal_persetujuan' => date('Y-m-d'),
                    'penyetuju' => session()->get('name'),
                    'keterangan' => 'Pengajuan Peminjaman Aset Disetujui'
                ]);
            session()->flash('approved','Peminjaman Aset Disetujui!');
        }
    }

    public function rejected($id){
        date_default_timezone_set('Asia/Jakarta');

        $query = DB::table('peminjaman_aset')
                     ->where('id_peminjaman_aset',$id)
                     ->update([
                        'status_peminjaman' => 'Tidak Disetujui'
                     ]);
        if($query) {
            DB::table('detail_persetujuan_peminjaman_aset')
                ->insert([
                    'id_peminjaman_aset' => $id,
                    'tanggal_persetujuan' => date('Y-m-d'),
                    'penyetuju' => session()->get('name'),
                    'keterangan' => 'Pengajuan Peminjaman Aset Tidak Disetujui'
                ]);
            session()->flash('rejected','Peminjaman Aset Tidak Disetujui!');
        }
    }

    public function render()
    {
        $peminjamanAset = new peminjamanAsetController;

        return view('livewire.peminjaman.aset.peminjaman-aset-index',[
            'data' => $peminjamanAset->getDataPeminjamanAset()
        ]);
    }
}

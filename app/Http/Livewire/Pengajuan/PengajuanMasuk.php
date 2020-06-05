<?php

namespace App\Http\Livewire\Pengajuan;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class PengajuanMasuk extends Component
{
    use withPagination;

    public $approved;
    public $rejected;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function formatRupiah($harga){
        $rupiah = "Rp ".number_format($harga,0,",",".");
        return $rupiah;
    }

    public function today(){
        date_default_timezone_set('Asia/Jakarta');

        $today = date('Y-m-d');
        return $today;
    }

    public function getPengajuan(){
        $data = DB::table('t_pengajuan_barang')
                    ->join('users','users.user_id','=','t_pengajuan_barang.user_id')
                    ->where('status_pengajuan','Belum Disetujui')
                    ->paginate(5);
        return $data;
    }

    public function approved($id){
        $query = DB::table('t_pengajuan_barang')
            ->where('id_pengajuan',$id)
            ->update([
                'status_pengajuan' => 'Disetujui'
            ]);
        
        if($query){

            DB::table('detail_persetujuan_pengajuan_barang')
                ->insert([
                    'id_pengajuan' => $id,
                    'tanggal_persetujuan' => $this->today(),
                    'penyetuju' => session()->get('name'),
                    'keterangan' => 'Pengajuan Barang Disetujui'
                ]);

            session()->flash('approved','Pengajuan Disetujui!');
        }

    }

    public function rejected($id){

        $query = DB::table('t_pengajuan_barang')
            ->where('id_pengajuan',$id)
            ->update([
                'status_pengajuan' => 'Tidak Disetujui'
            ]);
        if($query){
            DB::table('detail_persetujuan_pengajuan_barang')
                ->insert([
                    'id_pengajuan' => $id,
                    'tanggal_persetujuan' => $this->today(),
                    'penyetuju' => session()->get('name'),
                    'keterangan' => 'Pengajuan Barang Tidak Disetujui'
                ]);
            session()->flash('rejected','Pengajuan Tidak Disetujui!');
        }
    }

    public function render()
    {
        return view('livewire.pengajuan.pengajuan-masuk',[
            'data' => $this->getPengajuan()
        ]);
    }
}

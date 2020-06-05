<?php

namespace App\Http\Controllers\peminjaman\inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class peminjamanInventoryController extends Controller
{
    public function getPeminjamanInventory($id){
        $data = DB::table('t_inventory')
                    ->join('t_barang','t_inventory.kd_barang','=','t_barang.kd_barang')
                    ->join('m_jenis','t_barang.kd_jenis','=','m_jenis.kd_jenis')
                    ->join('m_kategori','t_barang.kd_kategori','=','m_kategori.kd_kategori')
                    ->join('t_stok_barang','t_barang.kd_barang','t_stok_barang.kd_barang')
                    ->where('no_inventory',$id)
                    ->get();
        return $data;
    }

    public function addPeminjamanInventory(Request $request){
        $rules = [
            'jumlah' => 'required',
            'tanggalPeminjaman' => 'required',
            'tanggalPengembalian' => 'required'
        ];

        $messages = [
            'required' => 'Wajib Diisi!'
        ];

        $this->validate($request, $rules, $messages);

        try {

            if($request->jumlah > $request->jumlahTersedia){
                return back()->with('error','Melebihi Jumlah Yang Tersedia!');
            }

            DB::table('peminjaman_inventory')
                        ->insert([
                            'no_inventory' => $request->noInventory,
                            'user_id' => $request->session()->get('user_id'),
                            'tanggal_peminjaman' => $request->tanggalPeminjaman,
                            'tanggal_pengembalian' => $request->tanggalPengembalian,
                            'qty' => $request->jumlah,
                            'keterangan' => $request->keterangan
                        ]);
            return redirect('/manager')->with('message','Pengajuan Peminjaman Inventory Berhasil!');

        } catch (\Exception $e) {
            return back()->with('error','Pengajuan Peminjaman Inventory Gagal!');
        }
    }

    public function getDataPeminjamanInventory(){
        $data = DB::table('peminjaman_inventory')
                    ->join('t_inventory','peminjaman_inventory.no_inventory','=','t_inventory.no_inventory')
                    ->join('users','peminjaman_inventory.user_id','=','users.user_id')
                    ->join('t_barang','t_inventory.kd_barang','=','t_barang.kd_barang')
                    ->join('m_jenis','t_barang.kd_jenis','=','m_jenis.kd_jenis')
                    ->join('m_kategori','t_barang.kd_kategori','=','m_kategori.kd_kategori')
                    ->join('t_stok_barang','t_barang.kd_barang','t_stok_barang.kd_barang')
                    ->where('status_peminjaman','Belum Disetujui')
                    ->paginate(5);
        return $data;
    }

    public function getDataBelumTersetujui(){
        $data = DB::table('peminjaman_inventory')
                    ->join('t_inventory','peminjaman_inventory.no_inventory','=','t_inventory.no_inventory')
                    ->join('users','peminjaman_inventory.user_id','=','users.user_id')
                    ->join('t_barang','t_inventory.kd_barang','=','t_barang.kd_barang')
                    ->join('m_jenis','t_barang.kd_jenis','=','m_jenis.kd_jenis')
                    ->join('m_kategori','t_barang.kd_kategori','=','m_kategori.kd_kategori')
                    ->join('t_stok_barang','t_barang.kd_barang','t_stok_barang.kd_barang')
                    ->where('status_peminjaman','Belum Disetujui')
                    ->count();
        return $data;
    }
}

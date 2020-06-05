<?php

namespace App\Http\Controllers\peminjaman\aset;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class peminjamanAsetController extends Controller
{
    public function getDataAset($id){
        $data = DB::table('t_aset')
                    ->join('t_barang','t_aset.kd_barang','=','t_barang.kd_barang')
                    ->join('m_jenis','t_barang.kd_jenis','=','m_jenis.kd_jenis')
                    ->join('m_kategori','t_barang.kd_kategori','=','m_kategori.kd_kategori')
                    ->join('t_stok_barang','t_barang.kd_barang','=','t_stok_barang.kd_barang')
                    ->join('m_ruang','t_aset.kd_ruang','=','m_ruang.kd_ruang')
                    ->join('m_lokasi','t_aset.kd_lokasi','=','m_lokasi.kd_lokasi')
                    ->where('no_aset',$id)
                    ->get();
        return $data;
    }

    public function addPeminjamanAset(Request $request){
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

            DB::table('peminjaman_aset')
                ->insert([
                    'no_aset' => $request->noAset,
                    'user_id' => $request->session()->get('user_id'),
                    'tanggal_peminjaman' => $request->tanggalPeminjaman,
                    'tanggal_pengembalian' => $request->tanggalPengembalian,
                    'qty' => $request->jumlah,
                    'keterangan' => $request->keterangan
                ]);
            return redirect('/manager')->with('message','Pengajuan Peminjaman Aset Berhasil!');    
        } catch (Exception $e) {
            return back()->with('error','Pengajuan Peminjaman Aset Gagal!');
        }
    }

    public function getDataPeminjamanAset(){
        $data = DB::table('peminjaman_aset')
                    ->join('t_aset','peminjaman_aset.no_aset','=','t_aset.no_aset')
                    ->join('users','peminjaman_aset.user_id','=','users.user_id')
                    ->join('t_barang','t_aset.kd_barang','=','t_barang.kd_barang')
                    ->join('m_jenis','t_barang.kd_jenis','=','m_jenis.kd_jenis')
                    ->join('m_kategori','t_barang.kd_kategori','=','m_kategori.kd_kategori')
                    ->join('t_stok_barang','t_barang.kd_barang','t_stok_barang.kd_barang')
                    ->where('peminjaman_aset.status_peminjaman','Belum Disetujui')
                    ->paginate(5);
        return $data;
    }

    public function getDataBelumTersetujui(){
        $data = DB::table('peminjaman_aset')
                    ->join('t_aset','peminjaman_aset.no_aset','=','t_aset.no_aset')
                    ->join('users','peminjaman_aset.user_id','=','users.user_id')
                    ->join('t_barang','t_aset.kd_barang','=','t_barang.kd_barang')
                    ->join('m_jenis','t_barang.kd_jenis','=','m_jenis.kd_jenis')
                    ->join('m_kategori','t_barang.kd_kategori','=','m_kategori.kd_kategori')
                    ->join('t_stok_barang','t_barang.kd_barang','t_stok_barang.kd_barang')
                    ->where('peminjaman_aset.status_peminjaman','Belum Disetujui')
                    ->count();
        return $data;
    }
}

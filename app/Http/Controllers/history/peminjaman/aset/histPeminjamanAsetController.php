<?php

namespace App\Http\Controllers\history\peminjaman\aset;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class histPeminjamanAsetController extends Controller
{
    public function getAllHistoryPeminjamanAset(){
        $data = DB::table('peminjaman_aset')
                    ->join('detail_persetujuan_peminjaman_aset','detail_persetujuan_peminjaman_aset.id_peminjaman_aset','=','peminjaman_aset.id_peminjaman_aset')
                    ->join('t_aset','peminjaman_aset.no_aset','=','t_aset.no_aset')
                    ->join('t_barang','t_aset.kd_barang','=','t_barang.kd_barang')
                    ->join('m_jenis','t_barang.kd_jenis','=','m_jenis.kd_jenis')
                    ->join('users','peminjaman_aset.user_id','=','users.user_id')
                    ->paginate(5);
        return $data;
    }

    public function getHistoryPeminjamanAset(Request $request){
        $data = DB::table('peminjaman_aset')
                    ->join('detail_persetujuan_peminjaman_aset','detail_persetujuan_peminjaman_aset.id_peminjaman_aset','=','peminjaman_aset.id_peminjaman_aset')
                    ->join('t_aset','peminjaman_aset.no_aset','=','t_aset.no_aset')
                    ->join('t_barang','t_aset.kd_barang','=','t_barang.kd_barang')
                    ->join('m_jenis','t_barang.kd_jenis','=','m_jenis.kd_jenis')
                    ->join('users','peminjaman_aset.user_id','=','users.user_id')
                    ->where('peminjaman_aset.user_id',$request->session()->get('user_id'))
                    ->paginate(5);
        return $data;
    }
}

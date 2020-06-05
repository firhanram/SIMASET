<?php

namespace App\Http\Controllers\history\pengajuan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class histPengajuanBarangController extends Controller
{
    public function getAllHistoryPengajuanBarang(){
        $data = DB::table('t_pengajuan_barang')
                    ->join('detail_persetujuan_pengajuan_barang','detail_persetujuan_pengajuan_barang.id_pengajuan','=','t_pengajuan_barang.id_pengajuan')
                    ->join('users','t_pengajuan_barang.user_id','=','users.user_id')
                    ->paginate(5);
        return $data;
    }

    public function getHistoryPengajuanBarang(Request $request){
        $data = DB::table('t_pengajuan_barang')
                    ->join('users','t_pengajuan_barang.user_id','=','users.user_id')
                    ->join('detail_persetujuan_pengajuan_barang','detail_persetujuan_pengajuan_barang.id_pengajuan','=','t_pengajuan_barang.id_pengajuan')
                    ->where('t_pengajuan_barang.user_id',$request->session()->get('user_id'))
                    ->paginate(5);
        return $data;
    }
}

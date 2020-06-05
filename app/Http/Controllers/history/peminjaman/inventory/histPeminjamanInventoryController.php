<?php

namespace App\Http\Controllers\history\peminjaman\inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class histPeminjamanInventoryController extends Controller
{
    public function getAllHistoryPeminjamanInventory(){
        $data = DB::table('peminjaman_inventory')
                    ->join('detail_persetujuan_peminjaman_inventory','detail_persetujuan_peminjaman_inventory.id_peminjaman_inventory','=','peminjaman_inventory.id_peminjaman_inventory')
                    ->join('t_inventory','peminjaman_inventory.no_inventory','=','t_inventory.no_inventory')
                    ->join('t_barang','t_inventory.kd_barang','=','t_barang.kd_barang')
                    ->join('m_jenis','t_barang.kd_jenis','=','m_jenis.kd_jenis')
                    ->join('users','peminjaman_inventory.user_id','=','users.user_id')
                    ->paginate(5);
        return $data;
    }

    public function getHistoryPeminjamanInventory(Request $request){
        $data = DB::table('peminjaman_inventory')
                    ->join('detail_persetujuan_peminjaman_inventory','detail_persetujuan_peminjaman_inventory.id_peminjaman_inventory','=','peminjaman_inventory.id_peminjaman_inventory')
                    ->join('t_inventory','peminjaman_inventory.no_inventory','=','t_inventory.no_inventory')
                    ->join('t_barang','t_inventory.kd_barang','=','t_barang.kd_barang')
                    ->join('m_jenis','t_barang.kd_jenis','=','m_jenis.kd_jenis')
                    ->join('users','peminjaman_inventory.user_id','=','users.user_id')
                    ->where('peminjaman_inventory.user_id',$request->session()->get('user_id'))
                    ->paginate(5);
        return $data;
    }
}

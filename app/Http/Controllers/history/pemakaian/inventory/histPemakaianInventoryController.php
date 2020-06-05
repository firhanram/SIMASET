<?php

namespace App\Http\Controllers\history\pemakaian\inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class histPemakaianInventoryController extends Controller
{
    public function getAllHistoryPemakaianInventory(){
         $data = DB::table('pemakaian_inventory')
                    ->join('detail_persetujuan_pemakaian_inventory','detail_persetujuan_pemakaian_inventory.id_pemakaian_inventory','=','pemakaian_inventory.id_pemakaian_inventory')
                    ->join('t_inventory','pemakaian_inventory.no_inventory','=','t_inventory.no_inventory')
                    ->join('t_barang','t_inventory.kd_barang','=','t_barang.kd_barang')
                    ->join('m_jenis','t_barang.kd_jenis','=','m_jenis.kd_jenis')
                    ->join('users','pemakaian_inventory.user_id','=','users.user_id')
                    ->paginate(5);
        return $data;
    }

    public function getHistoryPemakaianInventory(Request $request){
        $data = DB::table('pemakaian_inventory')
                    ->join('detail_persetujuan_pemakaian_inventory','detail_persetujuan_pemakaian_inventory.id_pemakaian_inventory','=','pemakaian_inventory.id_pemakaian_inventory')
                    ->join('t_inventory','pemakaian_inventory.no_inventory','=','t_inventory.no_inventory')
                    ->join('t_barang','t_inventory.kd_barang','=','t_barang.kd_barang')
                    ->join('m_jenis','t_barang.kd_jenis','=','m_jenis.kd_jenis')
                    ->join('users','pemakaian_inventory.user_id','=','users.user_id')
                    ->where('pemakaian_inventory.user_id',$request->session()->get('user_id'))
                    ->paginate(5);
        return $data;
    }
}

<?php

namespace App\Http\Controllers\transaksi\inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class inventoryController extends Controller
{
    public function autoNumber(){
        $noInventory = DB::table('t_inventory')
                        ->select(DB::raw('MAX(RIGHT(no_inventory, 12)) as maxKode'));
        
        if($noInventory->count() > 0){
            foreach($noInventory->get() as $row){
                $noUrut = (int) substr($row->maxKode,7, 5);
                $noUrut++;
                $kodeBaru = "RZK-INV".sprintf("%05s", $noUrut);
            }
        } else {
            $kodeBaru = "RZK-INV00001";
        }

        return $kodeBaru;
    }

    public function addInventory(Request $request){
        $rules = [
            'kdBarang' => 'required'
        ];

        $messages = [
            'required' => 'Wajib Diisi!'
        ];

        $this->validate($request, $rules, $messages);

        try {
            $checkBarang = DB::table('t_inventory')->where('kd_barang',$request->kdBarang)->first();

            if($checkBarang){
                return back()->with('gagal','Barang Sudah Diinput Sebelumnya!');
            } else {
                DB::table('t_inventory')
                    ->insert([
                        'no_inventory' => $request->noInventory,
                        'kd_barang' => $request->kdBarang
                    ]); 
                return redirect('/transaksi/inventory')->with('message','Data Berhasil Diinput!');
            }
        } catch (\Exception $e) {
            return back()->with('gagal','Data Gagal Diinput!');
        }
    }

    public function detailInventory($id){
        $data = DB::table('t_inventory')
                    ->join('t_barang','t_inventory.kd_barang','=','t_barang.kd_barang')
                    ->join('m_jenis','t_barang.kd_jenis','=','m_jenis.kd_jenis')
                    ->join('m_kategori','t_barang.kd_kategori','=','m_kategori.kd_kategori')
                    ->join('t_barang_masuk','t_barang.kd_barang','=','t_barang_masuk.kd_barang')
                    ->join('m_vendor','t_barang_masuk.kd_vendor','=','m_vendor.kd_vendor')
                    ->join('t_stok_barang','t_barang.kd_barang','t_stok_barang.kd_barang')
                    ->where('no_inventory',$id)
                    ->get();
        return $data;
    }

    public function totalInventory(){
        $data = DB::table('t_inventory')
                    ->count();
        return $data;
    }

    
}

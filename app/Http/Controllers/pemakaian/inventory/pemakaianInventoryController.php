<?php

namespace App\Http\Controllers\pemakaian\inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pemakaianInventoryController extends Controller
{
    public function getPemakaianInventory($id){
        $data = DB::table('t_inventory')
                    ->join('t_barang','t_inventory.kd_barang','=','t_barang.kd_barang')
                    ->join('m_jenis','t_barang.kd_jenis','=','m_jenis.kd_jenis')
                    ->join('m_kategori','t_barang.kd_kategori','=','m_kategori.kd_kategori')
                    ->join('t_stok_barang','t_barang.kd_barang','t_stok_barang.kd_barang')
                    ->where('no_inventory',$id)
                    ->get();
        return $data;
    }

    public function addPemakaianInventory(Request $request){
        $rules = [
            'jumlah' => 'required',
            'tanggalPemakaian' => 'required'
        ];

        $messages = [
            'required' => 'Wajib Diisi!'
        ];

        $this->validate($request, $rules, $messages);

        try {

            if($request->jumlah > $request->jumlahTersedia){
                return back()->with('error','Melebihi Jumlah Yang Tersedia!');
            }

            DB::table('pemakaian_inventory')
                ->insert([
                    'no_inventory' => $request->noInventory,
                    'tanggal_pemakaian' => $request->tanggalPemakaian,
                    'qty' => $request->jumlah,
                    'user_id' => $request->session()->get('user_id'),
                    'keterangan' => $request->keterangan
                ]);

            return redirect('/manager')->with('message','Pengajuan Pemakaian Inventory Berhasil!');
        } catch (\Exception $e) {
            return back()->with('error','Pengajuan Pemakaian Inventory Gagal!');
        }
    }

    public function getDataPemakaianInventory(){
        $data = DB::table('pemakaian_inventory')
                    ->join('t_inventory','pemakaian_inventory.no_inventory','=','t_inventory.no_inventory')
                    ->join('users','pemakaian_inventory.user_id','=','users.user_id')
                    ->join('t_barang','t_inventory.kd_barang','=','t_barang.kd_barang')
                    ->join('m_jenis','t_barang.kd_jenis','=','m_jenis.kd_jenis')
                    ->join('m_kategori','t_barang.kd_kategori','=','m_kategori.kd_kategori')
                    ->join('t_stok_barang','t_barang.kd_barang','t_stok_barang.kd_barang')
                    ->where('status_pemakaian','Belum Disetujui')
                    ->paginate(5);
        return $data;
    }

    public function getDataBelumTersetujui(){
        $data = DB::table('pemakaian_inventory')
                    ->join('t_inventory','pemakaian_inventory.no_inventory','=','t_inventory.no_inventory')
                    ->join('users','pemakaian_inventory.user_id','=','users.user_id')
                    ->join('t_barang','t_inventory.kd_barang','=','t_barang.kd_barang')
                    ->join('m_jenis','t_barang.kd_jenis','=','m_jenis.kd_jenis')
                    ->join('m_kategori','t_barang.kd_kategori','=','m_kategori.kd_kategori')
                    ->join('t_stok_barang','t_barang.kd_barang','t_stok_barang.kd_barang')
                    ->where('status_pemakaian','Belum Disetujui')
                    ->count();
        return $data;
    }
}

<?php

namespace App\Http\Controllers\transaksi\pengajuan_barang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pengajuanBarangController extends Controller
{
    public function addPengajuan(Request $request){
        date_default_timezone_set('Asia/Jakarta');
        $rules = [
            'nmBarang' => 'required',
            'tanggalPengajuan' => 'required',
            'jenis' => 'required',
            'kategori' => 'required',
            'satuan' => 'required',
            'jumlah' => 'required',
            'harga' => 'required'
        ];

        $messages = [
            'required' => 'Wajib Diisi!'
        ];

        $this->validate($request, $rules, $messages);
        
    

        try {
            $query = DB::table('t_pengajuan_barang')
                            ->insert([
                                'tanggal_pengajuan' => $request->tanggalPengajuan,
                                'nm_barang' => $request->nmBarang,
                                'jenis_barang' => $request->jenis,
                                'kategori_barang' => $request->kategori,
                                'satuan_barang' => $request->satuan,
                                'jumlah' => $request->jumlah,
                                'keterangan' => $request->keterangan,
                                'user_id' => $request->session()->get('user_id'),
                                'harga' => (int)$request->harga
                            ]);

            if($query){
                return redirect('/manager/pengajuan_barang')->with('berhasil','Berhasil Mengirimkan Pengajuan Barang!');
            } else {
                throw new Exception(); 
            }

        } catch (\Exception $e) {
            return back()->with('gagal','Gagal Mengirimkan Pengajuan Barang!');
        }
    }

    public function formatRupiah($harga){
        $rupiah = "Rp ".number_format($harga,0,",",".");
        return $rupiah;
    }

    public function getHistoryPengajuan(Request $request){
        $data = DB::table('t_pengajuan_barang')
                    ->where('user_id',$request->session()->get('user_id'))
                    ->paginate(5);
        return $data;
    }

    public function getPengajuan(){
        $data = DB::table('t_pengajuan_barang')
                    ->join('users','users.user_id','=','t_pengajuan_barang.user_id')
                    ->where('status_pengajuan','Disetujui')
                    ->paginate(5);
        return $data;
    }

    public function getDataBelumTersetujui(){
        $data = DB::table('t_pengajuan_barang')
                    ->where('status_pengajuan','Belum Disetujui')
                    ->count();
        return $data;
    }
}

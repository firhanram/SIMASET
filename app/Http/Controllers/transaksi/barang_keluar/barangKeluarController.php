<?php

namespace App\Http\Controllers\transaksi\barang_keluar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class barangKeluarController extends Controller
{
    public function updateStock(Request $request){
        DB::table('t_stok_barang')
            ->where('kd_barang',$request->kdBarang)
            ->update([
                'jumlah' => DB::raw('jumlah - '.$request->qty)
            ]);
    }

    public function getStokBarang(){
        $data = DB::table('t_stok_barang')
                    ->join('t_barang','t_stok_barang.kd_barang','=','t_barang.kd_barang')
                    ->join('m_jenis','t_barang.kd_jenis','=','m_jenis.kd_jenis')
                    ->join('m_kategori','t_barang.kd_kategori','=','m_kategori.kd_kategori')
                    ->paginate(5);
        return $data;
    }

    public function addBarangKeluar(Request $request){
        date_default_timezone_set('Asia/Jakarta');
        $rules = [
            'kdBarang' => 'required',
            'tanggalKeluar' => 'required'
        ];

        $messages = [
            'required' => 'Wajib Diisi!'
        ];

        $this->validate($request, $rules, $messages);

        if($request->qty > $request->stock){
            return redirect('/transaksi/barang_keluar/tambah_barang_keluar')->with('gagal','Melebihi Stock Awal!');
        } else if($request->stock == 0){
            return redirect('/transaksi/barang_keluar/tambah_barang_keluar')->with('gagal','Stock Telah Abis');
        }

        $query = DB::table('t_barang_keluar')
                        ->insert([
                            'tanggal_keluar' => $request->tanggalKeluar,
                            'kd_barang' => $request->kdBarang,
                            'jumlah' => $request->qty,
                            'keterangan' => $request->keterangan
                        ]);
        if($query){
            $this->updateStock($request);
            return redirect('transaksi/barang_keluar')->with('message','Data Berhasil Diinput!');
        }
    }

    public function lapBarangKeluarPerBulan(Request $request){
        $bulan = date('F',strtotime($request->bulan));
        $data = DB::table('t_barang_keluar')
                    ->join('t_barang','t_barang_keluar.kd_barang','=','t_barang.kd_barang')
                    ->join('m_jenis','t_barang.kd_jenis','=','m_jenis.kd_jenis')
                    ->where(DB::raw('DATE_FORMAT(t_barang_keluar.tanggal_keluar, "%M")'), $bulan);
        return $data;
    }

    public function cetakBarangKeluarPerBulan(Request $request){
        date_default_timezone_set('Asia/Jakarta');
        $data = $this->lapBarangKeluarPerBulan($request);
        $bulan = $request->bulan;
        
        if($data->count() > 0 ){
            $data = $data->get();

            $pdf = PDF::loadview('transaksi.barang_keluar.lap_barang_keluar',[
                'data' => $data,
                'bulan' => $bulan,
            ])
            ->setPaper('a4','landscape')
            ->setWarnings(false);
    
            return $pdf->download('barang_keluar_bulan_'.strtolower($bulan));
        } else {
            return back()->with('gagal','Data Tidak Ada!');
        }
    }
}

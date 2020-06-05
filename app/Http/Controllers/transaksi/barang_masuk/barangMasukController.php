<?php

namespace App\Http\Controllers\transaksi\barang_masuk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class barangMasukController extends Controller
{
    public function updateStock(Request $request){
       DB::table('t_stok_barang')
            ->where('kd_barang',$request->kdBarang)
            ->update([
                'jumlah' => DB::raw('jumlah + '.$request->qty)
            ]);
    }

    public function addDetailBarangMasuk(Request $request){
        DB::table('detail_t_barang_masuk')
            ->insert([
                'id_barang_masuk' => $request->idBarangMasuk,
                'no_transaksi' => $request->noTransaksi,
                'tanggal_transaksi' => $request->tanggalTransaksi,
                'kd_barang' => $request->kdBarang,
                'jumlah' => $request->qty
            ]);
    }

    public function addStokBarang(Request $request){
        DB::table('t_stok_barang')
            ->insert([
                'kd_barang' => $request->kdBarang,
                'jumlah' => $request->qty
            ]);
    }

    public function addBarangMasuk(Request $request){
        date_default_timezone_set('Asia/Jakarta');
        $rules = [
            'tanggalMasuk' => 'required',
            'kdBarang' => 'required',
        ];

        $messages = [
            'required' => 'Wajib Diisi!'
        ];

        $this->validate($request, $rules, $messages);

        $query = DB::table('t_barang_masuk')
                        ->insert([
                            'tanggal_masuk' => $request->tanggalMasuk,
                            'no_transaksi' => $request->noTransaksi,
                            'tanggal_transaksi' => $request->tanggalTransaksi,
                            'kd_barang' => $request->kdBarang,
                            'kd_vendor' => $request->kdVendor,
                            'jumlah' => $request->qty,
                            'harga' => (int)$request->harga,
                            'keterangan' => $request->keterangan,
                            'waktu_input' => date('Y-m-d H:i:s')
                        ]);

        if($query){
            //Cek barang 
            $checkBarang = DB::table('t_stok_barang')->where('kd_barang',$request->kdBarang)->first();
            if($checkBarang){
                //update stock
                $this->updateStock($request);
                return redirect('/transaksi/barang_masuk')->with('message','Berhasil Menambahkan Stock Barang!');
            } else {
                $this->addStokBarang($request);
                return redirect('/transaksi/barang_masuk')->with('message','Data Berhasil Diinput!');
            }
        } else {
            dd($query);
        }

    }

    public function formatRupiah($harga){
        $rupiah = "Rp ".number_format($harga,0,",",".");
        return $rupiah;
    }

    public function lapBarangMasukPerBulan(Request $request){
        $bulan = date('F',strtotime($request->bulan));
        $data = DB::table('t_barang_masuk')
                    ->join('t_barang','t_barang_masuk.kd_barang','=','t_barang.kd_barang')
                    ->join('m_jenis','t_barang.kd_jenis','=','m_jenis.kd_jenis')
                    ->join('m_vendor','t_barang_masuk.kd_vendor','=','m_vendor.kd_vendor')
                    ->where(DB::raw('DATE_FORMAT(t_barang_masuk.tanggal_masuk, "%M")'), $bulan);
        return $data;
    }

    public function totalPengeluaran(){
        $total = DB::table('t_barang_masuk')
                    ->sum('harga');
        return $total;
    }

    public function cetakBarangMasukPerBulan(Request $request){
        date_default_timezone_set('Asia/Jakarta');
        $data = $this->lapBarangMasukPerBulan($request);
        $bulan = $request->bulan;
        $totalPengeluaran = $this->formatRupiah($this->totalPengeluaran());
        $formatRupiah = new barangMasukController;

        if($data->count() > 0 ){
            $data = $data->get();
            $pdf = PDF::loadview('transaksi.barang_masuk.lap_barang_masuk',[
                'data' => $data,
                'bulan' => $bulan,
                'totalPengeluaran' => $totalPengeluaran,
                'formatRupiah' => $formatRupiah
            ])
            ->setPaper('a4','landscape')
            ->setWarnings(false);
    
            return $pdf->download('barang_masuk_bulan_'.strtolower($bulan));
        } else {
            return back()->with('gagal','Data Tidak Ada!');
        }
    }


}

<?php

namespace App\Http\Controllers\transaksi\aset;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class asetController extends Controller
{
    public function autoNumber(){
        $noAset = DB::table('t_aset')
                        ->select(DB::raw('MAX(RIGHT(no_aset, 12)) as maxKode'));
        
        if($noAset->count() > 0){
            foreach($noAset->get() as $row){
                $noUrut = (int) substr($row->maxKode,7, 5);
                $noUrut++;
                $kodeBaru = "RZK-AST".sprintf("%05s", $noUrut);
            }
        } else {
            $kodeBaru = "RZK-AST00001";
        }

        return $kodeBaru;
    }

    public function formatRupiah($harga){
        $rupiah = "Rp ".number_format($harga,0,",",".");
        return $rupiah;
    }

    public function addAset(Request $request){
        $rules = [
            'kdBarang' => 'required',
            'lokasi' => 'required',
            'ruang' => 'required'
        ];

        $messages = [
            'required' => 'Wajib Diisi!'
        ];

        $this->validate($request, $rules, $messages);

        try {
            $checkBarang = DB::table('t_aset')->where('kd_barang',$request->kdBarang)->first();

            if($checkBarang){
                return back()->with('gagal','Barang Sudah Diinput Sebelumnya!');
            } else {
                DB::table('t_aset')
                    ->insert([
                        'no_aset' => $request->noAset,
                        'kd_barang' => $request->kdBarang,
                        'kd_lokasi' => $request->lokasi,
                        'kd_ruang' => $request->ruang,
                        'pemegang' => $request->pemegang,
                        'kondisi' => $request->kondisi,
                        'status' => $request->status 
                    ]); 
                return redirect('/transaksi/aset')->with('message','Data Berhasil Diinput!');
            }
        } catch (\Exception $e) {
            return back()->with('gagal','Data Gagal Diinput!');
        }
    }

    public function detailAset($id){
        $data = DB::table('t_aset')
                    ->join('t_barang','t_aset.kd_barang','=','t_barang.kd_barang')
                    ->join('m_jenis','t_barang.kd_jenis','=','m_jenis.kd_jenis')
                    ->join('m_lokasi','t_aset.kd_lokasi','=','m_lokasi.kd_lokasi')
                    ->join('m_ruang','t_aset.kd_ruang','=','m_ruang.kd_ruang')
                    ->join('m_kategori','t_barang.kd_kategori','=','m_kategori.kd_kategori')
                    ->join('t_barang_masuk','t_barang.kd_barang','t_barang_masuk.kd_barang')
                    ->join('t_stok_barang','t_barang.kd_barang','=','t_stok_barang.kd_barang')
                    ->join('m_vendor','t_barang_masuk.kd_vendor','=','m_vendor.kd_vendor')
                    ->where('t_aset.no_aset',$id)
                    ->get();
        return $data;
    }

    public function getAset(){
        $data = DB::table('t_aset')
                    ->join('t_barang','t_aset.kd_barang','=','t_barang.kd_barang')
                    ->join('t_barang_masuk','t_barang.kd_barang','t_barang_masuk.kd_barang')
                    ->join('m_ruang','t_aset.kd_ruang','=','m_ruang.kd_ruang')
                    ->join('m_lokasi','t_aset.kd_lokasi','=','m_lokasi.kd_lokasi')
                    ->join('m_jenis','t_barang.kd_jenis','=','m_jenis.kd_jenis')
                    ->get();
        return $data;
    }

    public function updateAset($id, $kondisi, $status){
        DB::table('t_aset')
            ->where('no_aset',$id)
            ->update([
                'kondisi' => $kondisi,
                'status' => $status
            ]);
    }

    public function addPemberhentianAset(Request $request){
        $rules = [
            'noAset' => 'required',
            'tanggalPemberhentian' => 'required',
        ];

        $messages = [
            'required' => 'Wajib Diisi!'
        ];

        $this->validate($request, $rules, $messages);

        try {
            $query = DB::table('t_pemberhentian_aset')
                            ->insert([
                                'no_aset' => $request->noAset,
                                'tanggal_pemberhentian' => $request->tanggalPemberhentian,
                                'keterangan' => $request->keterangan
                            ]);
            if($query){
                $this->updateAset($request->noAset, $request->kondisi, $request->status);
                return redirect('/aset/pemberhentian')->with('message','Data Berhasil Diinput!');
            } else {
                throw new Exception();
            }

        } catch (\Exception $e) {
            return back()->with('gagal','Gagal Menginput Data!');
        }
    }

    public function getMutasiAset(){
        $data = DB::table('t_aset')
                    ->join('t_barang','t_aset.kd_barang','=','t_barang.kd_barang')
                    ->join('m_ruang','t_aset.kd_ruang','=','m_ruang.kd_ruang')
                    ->join('m_lokasi','t_aset.kd_lokasi','=','m_lokasi.kd_lokasi')
                    ->where('t_aset.status','Aktif')
                    ->paginate(5);
        return $data;
    }

    public function updateMutasiAset($id, $lokasi, $ruang, $pemegang){
        DB::table('t_aset')
            ->where('no_aset',$id)
            ->update([
                'kd_lokasi' => $lokasi,
                'kd_ruang' => $ruang,
                'pemegang' => $pemegang
            ]);
    }

    public function addMutasiAset(Request $request){
        $rules = [
            'noAset' => 'required',
            'tanggalMutasi' => 'required',
            'lokasiSekarang' => 'required',
            'ruangSekarang' => 'required',
            'pemegangSekarang' => 'required'
        ];

        $messages = [
            'required' => 'Wajib Diisi!'
        ];

        $this->validate($request, $rules, $messages);

        try {
            $query = DB::table('t_mutasi_aset')
                            ->insert([
                                'no_aset' => $request->noAset,
                                'tanggal_mutasi' => $request->tanggalMutasi,
                                'lokasi_awal' => $request->lokasiAwal,
                                'ruang_awal' => $request->ruangAwal,
                                'pemegang_awal' => $request->pemegangAwal,
                                'kd_lokasi' => $request->lokasiSekarang,
                                'kd_ruang' => $request->ruangSekarang,
                                'pemegang_sekarang' => $request->pemegangSekarang
                            ]);
            if($query){
                $this->updateMutasiAset($request->noAset, $request->lokasiSekarang, $request->ruangSekarang, $request->pemegangSekarang);
                return redirect('/aset/mutasi')->with('message','Data Berhasil Diinput!');
            } else {
                throw new Exception();
            }

        } catch (\Exception $e) {
            return back()->with('gagal','Gagal Menginput Data!');
        }
    }

    public function totalAset(){
        $data = DB::table('t_aset')
                    ->count();
        return $data;
    }

    public function totalAsetNonaktif(){
        $data = DB::table('t_aset')
                    ->where('status','Nonaktif')
                    ->count();
        return $data;
    }

    public function totalNilaiAset(){
        $data = DB::table('t_aset')
                    ->join('t_barang','t_aset.kd_barang','=','t_barang.kd_barang')
                    ->join('t_barang_masuk','t_barang.kd_barang','t_barang_masuk.kd_barang')
                    ->join('m_ruang','t_aset.kd_ruang','=','m_ruang.kd_ruang')
                    ->join('m_lokasi','t_aset.kd_lokasi','=','m_lokasi.kd_lokasi')
                    ->sum('t_barang_masuk.harga');
        return $data;
    }

    public function cetakLaporanAset(){
        $totalNilaiAset = $this->formatRupiah($this->totalNilaiAset());
        $formatRupiah = new asetController;
        $data = $this->getAset();
        
        $pdf = PDF::loadview('transaksi.aset.lap_aset',[
            'data' => $data,
            'totalNilaiAset' => $totalNilaiAset,
            'formatRupiah' => $formatRupiah
        ])
        ->setPaper('a4','landscape')
        ->setWarnings(false);

        return $pdf->download('lap_aset');
    }
}

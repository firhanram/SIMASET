<?php

namespace App\Http\Controllers\transaksi\barang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class barangController extends Controller
{
    public function autoNumber(){
        $kdBarang = DB::table('t_barang')
                        ->select(DB::raw('MAX(RIGHT(kd_barang, 12)) as maxKode'));
        
        if($kdBarang->count() > 0){
            foreach($kdBarang->get() as $row){
                $noUrut = (int) substr($row->maxKode,7, 5);
                $noUrut++;
                $kodeBaru = "RZK-BRG".sprintf("%05s", $noUrut);
            }
        } else {
            $kodeBaru = "RZK-BRG00001";
        }

        return $kodeBaru;
    }

    public function getBarang(){
        $barang = DB::table('t_barang')
                        ->join('m_jenis','t_barang.kd_jenis','=','m_jenis.kd_jenis')
                        ->join('m_kategori','t_barang.kd_kategori','=','m_kategori.kd_kategori')
                        ->paginate(5);
        return $barang;
    }

    public function addBarang(Request $request){
        
        $rules = [
            'nmBarang' => 'required',
            'jenis' => 'required',
            'kategori' => 'required',
            'nomorSeri' => 'required'
        ];

        $messages = [
            'required' => 'Wajib Diisi!'
        ];

        $this->validate($request, $rules, $messages);

        try {
            DB::table('t_barang')
                ->insert([
                    'kd_barang' => $request->kdBarang,
                    'no_seri' => $request->nomorSeri,
                    'nm_barang' => $request->nmBarang,
                    'spesifikasi' => $request->spesifikasi,
                    'satuan' => $request->satuan,
                    'kd_jenis' => $request->jenis,
                    'kd_kategori' => $request->kategori,
                ]);
            return redirect('/transaksi/barang')->with('message','Data Berhasil Disimpan!');
        } catch (\Exception $e) {
            return back()->with('gagal','Data Gagal Disimpan!');
        }
    }

    public function berdasarkanKode($id){
        $data = DB::table('t_barang')
                    ->join('m_jenis','t_barang.kd_jenis','=','m_jenis.kd_jenis')
                    ->join('m_kategori','t_barang.kd_kategori','=','m_kategori.kd_kategori')
                    ->where('kd_barang',$id)
                    ->get();
        return $data;
    }

    public function detailBarang($id){
        $data = $this->berdasarkanKode($id);
        return $data;
    }

    public function updateBarang(Request $request){
        try {
            DB::table('t_barang')
                ->where('kd_barang',$request->kdBarang)
                ->update([
                    'nm_barang' => $request->nmBarang,
                    'no_seri' => $request->nomorSeri,
                    'kd_jenis' => $request->jenis,
                    'kd_kategori' => $request->kategori,
                    'satuan' => $request->satuan,
                    'spesifikasi' => $request->spesifikasi
                ]);
            return redirect('/transaksi/barang')->with('berhasil','Data Berhasil Diupdate!');
        } catch (\Exception $e) {
            return back()->with('gagal','Data Gagal Diupdate!');
        }
    }

    public function countBarang(){
        $data = DB::table('t_barang')
                    ->count();
        return $data;
    }

    public function barangMasukPerHari(){
        date_default_timezone_set('Asia/Jakarta');
        $today = date('Y-m-d');
        
        $data = DB::table('t_barang_masuk')
                    ->join('t_barang','t_barang_masuk.kd_barang','=','t_barang.kd_barang')
                    ->join('m_jenis','t_barang.kd_jenis','=','m_jenis.kd_jenis')
                    ->join('m_kategori','t_barang.kd_kategori','=','m_kategori.kd_kategori')
                    ->where('t_barang_masuk.tanggal_masuk',$today)
                    ->paginate(5);
        return $data;
    }

    public function barangKeluarPerHari(){
        date_default_timezone_set('Asia/Jakarta');
        $today = date('Y-m-d');
        
        $data = DB::table('t_barang_keluar')
                    ->join('t_barang','t_barang_keluar.kd_barang','=','t_barang.kd_barang')
                    ->join('m_jenis','t_barang.kd_jenis','=','m_jenis.kd_jenis')
                    ->join('m_kategori','t_barang.kd_kategori','=','m_kategori.kd_kategori')
                    ->where('t_barang_keluar.tanggal_keluar',$today)
                    ->paginate(5);
        return $data;
    }


    public function getStokBarang(){
        $data = DB::table('t_barang')
                    ->join('m_jenis','t_barang.kd_jenis','=','m_jenis.kd_jenis')
                    ->join('m_kategori','t_barang.kd_kategori','=','m_kategori.kd_kategori')
                    ->join('t_stok_barang','t_barang.kd_barang','=','t_stok_barang.kd_barang')
                    ->paginate(5);
        return $data;
    }
    
}

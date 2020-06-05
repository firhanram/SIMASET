<?php

namespace App\Http\Controllers\pages;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Http\Controllers\user\userController;
use App\Http\Controllers\transaksi\barang\barangController;
use App\Http\Controllers\jenis\jenisController;
use App\Http\Controllers\kategori\kategoriController;
use App\Http\Controllers\vendor\vendorController;
use App\Http\Controllers\transaksi\barang_masuk\barangMasukController;
use App\Http\Controllers\transaksi\barang_keluar\barangKeluarController;
use App\Http\Controllers\transaksi\inventory\inventoryController;
use App\Http\Controllers\transaksi\aset\asetController;
use App\Http\Controllers\lokasi\lokasiController;
use App\Http\Controllers\ruang\ruangController;
use App\Http\Controllers\transaksi\pengajuan_barang\pengajuanBarangController;
use App\Http\Controllers\login\loginController;
use App\Http\Controllers\peminjaman\inventory\peminjamanInventoryController;
use App\Http\Controllers\pemakaian\inventory\pemakaianInventoryController;
use App\Http\Controllers\peminjaman\aset\peminjamanAsetController;
use App\Http\Controllers\history\peminjaman\aset\histPeminjamanAsetController;
use App\Http\Controllers\history\peminjaman\inventory\histPeminjamanInventoryController;
use App\Http\Controllers\history\pemakaian\inventory\histPemakaianInventoryController;
use App\Http\Controllers\history\pengajuan\histPengajuanBarangController;


class pagesController extends Controller
{
    public function dashboard_admin (){
        $totalAset = new asetController;
        $totalBarang = new barangController;
        $barangMasukPerHari = new barangController;
        $barang = new barangController;
        $user = new userController;
        $aset = new asetController;
        $inventory = new inventoryController;
        $pengajuanBarang = new pengajuanBarangController;
        $pemakaianInventory = new pemakaianInventoryController;
        $peminjamanInventory = new peminjamanInventoryController;
        $peminjamanAset = new peminjamanAsetController;

        return view('admin.dashboard',[
            'totalAset' => $totalAset->totalAset(),
            'totalBarang' => $totalBarang->countBarang(),
            'barangMasukPerHari' => $barangMasukPerHari->barangMasukPerHari(),
            'barangKeluarPerHari' => $barang->barangKeluarPerHari(),
            'totalUser' => $user->totalUser(),
            'totalAsetNonaktif' => $aset->totalAsetNonaktif(),
            'totalInventory' => $inventory->totalInventory(),
            'pengajuan' => $pengajuanBarang->getPengajuan(),
            'harga' => $pengajuanBarang,
            'dataPeminjamanInventoryBelumTersetujui' => $peminjamanInventory->getDataBelumTersetujui(),
            'dataPemakaianInventoryBelumTersetujui' => $pemakaianInventory->getDataBelumTersetujui(),
            'peminjamanAset' => $peminjamanAset->getDataBelumTersetujui(),
            'pengajuanBarang' => $pengajuanBarang->getDataBelumTersetujui()
            ]);
    }

    public function loginPage(){
        return view('login.login');
    }

    public function userPage(){
        $data = new userController;
        return view('user.user',['data' => $data->tbUser()]);
    }

    public function tambahUserPage(){
        date_default_timezone_set('Asia/Jakarta');
        $role = new userController;
        return view('user.tambahUser',['role' => $role->userRoles()]);
    }

    public function editUserPage($id){
        $userController = new userController;

        $data = $userController->user_id($id);
        $role = $userController->userRoles();

        return view('user.editUser',['data' => $data,
                                     'role' => $role]);
    }

    public function jenisPage(){
        return view('jenis.jenis');
    }

    public function kategoriPage(){
        
        return view('kategori.kategori');
    }

    public function ruangPage(){
        return view('ruang.ruang');
    }

    public function lokasiPage(){
        return view('lokasi.lokasi');
    }

    public function vendorPage(){
        return view('vendor.vendor');
    }

    public function barangPage(){
        $data = new barangController;
        return view('transaksi.barang.barang',['data' => $data->getBarang()]);
    }

    public function tambahBarangPage(){
        $jenis = new jenisController;
        $kategori = new kategoriController;
        $kd_barang = new barangController;

        return view('transaksi.barang.tambahBarang',[
            'jenis' => $jenis->getJenis(),
            'kategori' => $kategori->getKategori(),
            'kd_barang' => $kd_barang->autoNumber()
        ]);
    }

    public function editBarangPage($id){
        $jenis = new jenisController;
        $kategori = new kategoriController;
        $barang = new barangController;

        $data = $barang->berdasarkanKode($id);

        return view('transaksi.barang.editBarang',[
            'jenis' => $jenis->getJenis(),
            'kategori' => $kategori->getKategori(),
            'data' => $data,
            'barang' => $barang->getBarang()
        ]);
    }

    public function barangMasukPage(){
        return view('transaksi.barang_masuk.barang_masuk');
    }

    public function tambahBarangMasukPage(){
        $barang = new barangController;
        $vendor = new vendorController;
        return view('transaksi.barang_masuk.tambah_barang_masuk',[
            'barang' => $barang->getBarang(),
            'vendor' => $vendor->getVendor()
            ]);
    }

    public function detailBarangMasukPage($id){
        $data = DB::table('t_barang_masuk')
                    ->join('t_barang','t_barang_masuk.kd_barang','=','t_barang.kd_barang')
                    ->join('m_vendor','t_barang_masuk.kd_vendor','=','m_vendor.kd_vendor')
                    ->where('id_barang_masuk',$id)
                    ->get();
        $harga = new barangMasukController;

        return view('transaksi.barang_masuk.detail_barang_masuk',[
            'data' => $data,
            'harga' => $harga
        ]);
    }

    public function barangKeluarPage(){
        return view('transaksi.barang_keluar.barang_keluar');
    }

    public function tambahBarangKeluarPage(){
        date_default_timezone_set('Asia/Jakarta');
        $stock = new barangKeluarController;
        return view('transaksi.barang_keluar.tambah_barang_keluar',['stock' => $stock->getStokBarang()]);
    }

    public function inventoryPage(){
        return view('transaksi.inventory.inventory');
    }

    public function tambahInventoryPage(){
        date_default_timezone_set('Asia/Jakarta');

        $barang = new barangController;
        $noInventory = new inventoryController;

        return view('transaksi.inventory.tambah_inventory',[
            'barang' => $barang->getBarang(),
            'noInventory' => $noInventory->autoNumber()
        ]);
    }

    public function detailInventoryPage($id){
        $data = new inventoryController;
        $harga = new barangMasukController;
        return view('transaksi.inventory.detail_inventory',[
            'data' => $data->detailInventory($id),
            'harga' => $harga
            ]);
    }

    public function asetPage(){
        return view('transaksi.aset.aset');
    }

    public function tambahAsetPage(){
        $barang = new barangController;
        $noAset = new asetController;
        $lokasi = new lokasiController;
        $ruang = new ruangController;

        return view('transaksi.aset.tambah_aset',[
            'barang' => $barang->getBarang(),
            'noAset' => $noAset->autoNumber(),
            'lokasi' => $lokasi->getLokasi(),
            'ruang' => $ruang->getRuang()
            ]);
    }

    public function detailAsetPage($id){
        $data = new asetController;
        $harga = new barangMasukController;

        return view('transaksi.aset.detail_aset',[
            'data' => $data->detailAset($id),
            'harga' => $harga
            ]);
    }

    public function pemberhentianPage(){
        return view('transaksi.aset.pemberhentian');
    }

    public function mutasiPage(){
        return view('transaksi.aset.mutasi');
    }

    public function inputPemberhentianAsetPage(){
        $aset = new asetController;
        return view('transaksi.aset.input_pemberhentian',['aset' => $aset->getAset()]);
    }

    public function inputMutasiAsetPage(){
        $lokasi = new lokasiController;
        $ruang = new ruangController;
        $aset = new asetController;

        return view('transaksi.aset.input_mutasi_aset',[
            'aset' => $aset->getMutasiAset(),
            'ruang' => $ruang->getRuang(),
            'lokasi' => $lokasi->getLokasi()
        ]);
    }

    //laporan
    public function lapBarangMasukPage(){
        return view('laporan.lap_barang_masuk');
    }

    public function lapBarangKeluarPage(){
        return view('laporan.lap_barang_keluar');
    }

    public function lapAsetPage(){
        return view('laporan.lap_aset');
    }

    //manager pages
    public function dashboardManager(){
        // $barang = new barangController;
        // $inventory = new inventoryController;
        
        return view('manager.dashboard');
    }

    public function pengajuanBarangPage(){
        $user = new userController;

        date_default_timezone_set('Asia/Jakarta');
        return view('pengajuan_barang.pengajuan_barang',[
            'user' => $user->tbUser()
        ]);
    }

    public function historyPengajuanBarangPage(Request $request){
        $pengajuanBarang = new histPengajuanBarangController;
        $harga = new pengajuanBarangController;

        return view('history.pengajuan.history_pengajuan_barang',[
            'data' => $pengajuanBarang->getHistoryPengajuanBarang($request),
            'harga' => $harga
        ]);
    }

    public function histPengajuanBarangPage(){
        $pengajuanBarang = new histPengajuanBarangController;
        $harga = new pengajuanBarangController;

        return view('history.pengajuan.history_pengajuan_barang',[
            'data' => $pengajuanBarang->getAllHistoryPengajuanBarang(),
            'harga' => $harga
        ]);
    }

    public function historyPeminjamanAsetPage(Request $request){
        $peminjamanAset = new histPeminjamanAsetController;

        return view('history.peminjaman.aset.history_peminjaman_aset',[
            'data' => $peminjamanAset->getHistoryPeminjamanAset($request)
        ]);
    }

    public function histPeminjamanAsetPage(){
        $peminjamanAset = new histPeminjamanAsetController;

        return view('history.peminjaman.aset.history_peminjaman_aset',[
            'data' => $peminjamanAset->getAllHistoryPeminjamanAset()
        ]);
    }

    public function historyPeminjamanInventoryPage(Request $request){
        $peminjamanInventory = new histPeminjamanInventoryController;

        return view('history.peminjaman.inventory.history_peminjaman_inventory',[
            'data' => $peminjamanInventory->getHistoryPeminjamanInventory($request)
        ]);
    }

    public function histPeminjamanInventoryPage(){
        $peminjamanInventory = new histPeminjamanInventoryController;

        return view('history.peminjaman.inventory.history_peminjaman_inventory',[
            'data' => $peminjamanInventory->getAllHistoryPeminjamanInventory()
        ]);
    }

    public function historyPemakaianInventoryPage(Request $request){
        $pemakaianInventory = new histPemakaianInventoryController;

        return view('history.pemakaian.inventory.history_pemakaian_inventory',[
            'data' => $pemakaianInventory->getHistoryPemakaianInventory($request)
        ]);
    }

    public function histPemakaianInventoryPage(){
        $pemakaianInventory = new histPemakaianInventoryController;

        return view('history.pemakaian.inventory.history_pemakaian_inventory',[
            'data' => $pemakaianInventory->getAllHistoryPemakaianInventory()
        ]);
    }

    public function historyLoginPage(Request $request){
        $login = new loginController;
        return view('history.login',[
            'data' => $login->getHistoryLogin($request)
        ]);
    }

    //dirut pages
    public function dashboardDirut(){
        $peminjamanAset = new peminjamanAsetController;
        $pengajuanBarang = new pengajuanBarangController;
        $aset = new asetController;
        $barang = new barangController;
        $inventory = new inventoryController;

        return view('dirut.dashboard',[
            'totalAset' => $aset->totalAset(),
            'totalBarang' => $barang->countBarang(),
            'totalAsetNonaktif' => $aset->totalAsetNonaktif(),
            'totalInventory' => $inventory->totalInventory(),
            'peminjamanAset' => $peminjamanAset->getDataBelumTersetujui(),
            'pengajuanBarang' => $pengajuanBarang->getDataBelumTersetujui()
        ]);
    }

    //data
    public function dataAsetPage(){
        return view('data.aset');
    }

    public function dataInventoryPage(){
        return view('data.inventory');
    }

    public function dataBarangPage(){
        return view('data.barang');
    }

    public function dataBarangMasukPage(){
        return view('data.barang_masuk');
    }

    public function dataBarangKeluarPage(){
        return view('data.barang_keluar');
    }

    //peminjaman inventory
    public function peminjamanInventoryPage($id){
        $peminjamanInventory = new peminjamanInventoryController;

        return view('peminjaman.inventory.peminjaman_inventory',[
            'data' => $peminjamanInventory->getPeminjamanInventory($id)
        ]);
    }

    //pemakaian inventory
    public function pemakaianInventoryPage($id){
        $pemakaianInventory = new pemakaianInventoryController;

        return view('pemakaian.inventory.pemakaian_inventory',[
            'data' => $pemakaianInventory->getPemakaianInventory($id)
        ]);
    }

    //peminjaman aset
    public function peminjamanAsetPage($id){
        $peminjamanAset = new peminjamanAsetController;

        return view('peminjaman.aset.peminjaman_aset',[
            'data' => $peminjamanAset->getDataAset($id)
        ]);
    }
}

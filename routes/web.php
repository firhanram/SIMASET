<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','pages\pagesController@loginPage');
Route::get('/login','pages\pagesController@loginPage');
Route::post('/userLogin','login\loginController@login');
Route::get('/logout','logout\logoutController@logout');

Route::group(['middleware' => ['checkLogin','is_admin']], function(){
    Route::get('/admin','pages\pagesController@dashboard_admin');
    Route::get('/user','pages\pagesController@userPage');
    Route::get('/user/tambahUser','pages\pagesController@tambahUserPage');
    Route::post('/user/tambahUser/add','user\userController@tambahUser');
    Route::get('/user/editUser/{id}','pages\pagesController@editUserPage');
    Route::post('/user/editUser/update','user\userController@updateUser');
    Route::get('/user/deleteUser/{id}','user\userController@deleteUser');
    Route::get('/master/jenis','pages\pagesController@jenisPage');
    Route::get('/master/kategori','pages\pagesController@kategoriPage');
    Route::get('/master/ruang','pages\pagesController@ruangPage');
    Route::get('/master/lokasi','pages\pagesController@lokasiPage');
    Route::get('/master/vendor','pages\pagesController@vendorPage');
    Route::get('/transaksi/barang','pages\pagesController@barangPage');
    Route::get('/transaksi/barang/tambah_barang','pages\pagesController@tambahBarangPage');
    Route::post('/transaksi/barang/tambah_barang/add','transaksi\barang\barangController@addBarang');
    Route::get('/transaksi/barang/edit_barang/{id}','pages\pagesController@editBarangPage');
    Route::post('/transaksi/barang/edit_barang/update','transaksi\barang\barangController@updateBarang');
    Route::get('/transaksi/barang_masuk','pages\pagesController@barangMasukPage');
    Route::get('/transaksi/barang_masuk/tambah_barang_masuk','pages\pagesController@tambahBarangMasukPage');
    Route::post('/transaksi/barang_masuk/tambah_barang_masuk/add','transaksi\barang_masuk\barangMasukController@addBarangMasuk');
    Route::get('/transaksi/barang_masuk/detail_barang_masuk/{id}','pages\pagesController@detailBarangMasukPage');
    Route::get('/transaksi/barang_keluar','pages\pagesController@barangKeluarPage');
    Route::get('/transaksi/barang_keluar/tambah_barang_keluar','pages\pagesController@tambahBarangKeluarPage');
    Route::post('/transaksi/barang_keluar/tambah_barang_keluar/add','transaksi\barang_keluar\barangKeluarController@addBarangKeluar');
    Route::get('/transaksi/inventory','pages\pagesController@inventoryPage');
    Route::get('/transaksi/inventory/tambah_inventory','pages\pagesController@tambahInventoryPage');
    Route::post('/transaksi/inventory/tambah_inventory/add','transaksi\inventory\inventoryController@addInventory');
    Route::get('/transaksi/inventory/detail_inventory/{id}','pages\pagesController@detailInventoryPage');
    Route::get('/transaksi/aset','pages\pagesController@asetPage');
    Route::get('/transaksi/aset/tambah_aset','pages\pagesController@tambahAsetPage');   
    Route::post('/transaksi/aset/tambah_aset/add','transaksi\aset\asetController@addAset');
    Route::get('/transaksi/aset/detail_aset/{id}','pages\pagesController@detailAsetPage');
    Route::get('/aset/pemberhentian','pages\pagesController@pemberhentianPage');
    Route::get('/aset/mutasi','pages\pagesController@mutasiPage');
    Route::get('/aset/pemberhentian/input_pemberhentian_aset','pages\pagesController@inputPemberhentianAsetPage');
    Route::post('/aset/pemberhentian/input_pemberhentian_aset/add','transaksi\aset\asetController@addPemberhentianAset');
    Route::get('/aset/mutasi/input_mutasi_aset','pages\pagesController@inputMutasiAsetPage');
    Route::post('/aset/mutasi/input_mutasi_aset/add','transaksi\aset\asetController@addMutasiAset');
    Route::get('/laporan/barang_masuk','pages\pagesController@lapBarangMasukPage');
    Route::post('/laporan/barang_masuk/cetak','transaksi\barang_masuk\barangMasukController@cetakBarangMasukPerBulan');
    Route::get('/laporan/barang_keluar','pages\pagesController@lapBarangKeluarPage');
    Route::post('/laporan/barang_keluar/cetak','transaksi\barang_keluar\barangKeluarController@cetakBarangKeluarPerBulan');
    Route::get('/laporan/aset','pages\pagesController@lapAsetPage');
    Route::post('/laporan/aset/cetak','transaksi\aset\asetController@cetakLaporanAset');
    Route::get('/admin/history_pengajuan_barang','pages\pagesController@histPengajuanBarangPage');
    Route::get('/admin/history_peminjaman_aset','pages\pagesController@histPeminjamanAsetPage');
    Route::get('/admin/history_peminjaman_inventory','pages\pagesController@histPeminjamanInventoryPage');
    Route::get('/admin/history_pemakaian_inventory','pages\pagesController@histPemakaianInventoryPage');
    Route::get('/admin/history_login','pages\pagesController@historyLoginPage');
});

Route::group(['middleware' => ['checkLogin','is_manager']], function(){
    Route::get('/manager','pages\pagesController@dashboardManager');
    Route::get('/manager/pengajuan_barang','pages\pagesController@pengajuanBarangPage');
    Route::post('/manager/pengajuan_barang/add','transaksi\pengajuan_barang\pengajuanBarangController@addPengajuan');
    Route::get('/manager/history_pengajuan_barang','pages\pagesController@historyPengajuanBarangPage');
    Route::get('/manager/history_login','pages\pagesController@historyLoginPage');
    Route::get('/manager/peminjaman_inventory/{id}','pages\pagesController@peminjamanInventoryPage');
    Route::post('/manager/peminjaman_inventory/add','peminjaman\inventory\peminjamanInventoryController@addPeminjamanInventory');
    Route::get('/manager/pemakaian_inventory/{id}','pages\pagesController@pemakaianInventoryPage');
    Route::post('/manager/pemakaian_inventory/add','pemakaian\inventory\pemakaianInventoryController@addPemakaianInventory');
    Route::get('/manager/peminjaman_aset/{id}','pages\pagesController@peminjamanAsetPage');
    Route::post('/manager/peminjaman_aset/add','peminjaman\aset\peminjamanAsetController@addPeminjamanAset');
    Route::get('/manager/history_pengajuan_barang','pages\pagesController@historyPengajuanBarangPage');
    Route::get('/manager/history_peminjaman_aset','pages\pagesController@historyPeminjamanAsetPage');
    Route::get('/manager/history_peminjaman_inventory','pages\pagesController@historyPeminjamanInventoryPage');
    Route::get('/manager/history_pemakaian_inventory','pages\pagesController@historyPemakaianInventoryPage');
});

Route::group(['middleware' => ['checkLogin','is_dirut']], function(){
    Route::get('/direkturUtama','pages\pagesController@dashboardDirut');
    Route::get('/direkturUtama/history_login','pages\pagesController@historyLoginPage');
    Route::get('/direkturUtama/data_aset','pages\pagesController@dataAsetPage');
    Route::get('/direkturUtama/data_inventory','pages\pagesController@dataInventoryPage');
    Route::get('/direkturUtama/data_barang','pages\pagesController@dataBarangPage');
    Route::get('/direkturUtama/data_barang_masuk','pages\pagesController@dataBarangMasukPage');
    Route::get('/direkturUtama/data_barang_keluar','pages\pagesController@dataBarangKeluarPage');
    Route::get('/direkturUtama/history_pengajuan_barang','pages\pagesController@histPengajuanBarangPage');
    Route::get('/direkturUtama/history_peminjaman_aset','pages\pagesController@histPeminjamanAsetPage');
    Route::get('/direkturUtama/history_peminjaman_inventory','pages\pagesController@histPeminjamanInventoryPage');
    Route::get('/direkturUtama/history_pemakaian_inventory','pages\pagesController@histPemakaianInventoryPage');
}); 



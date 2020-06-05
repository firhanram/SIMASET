@extends('layouts.app')

@section('title', 'Aset')
@section('body', 'id=page-top')
@section('wrapper','id=wrapper')

@section('content')
<!-- Sidebar -->
@include('admin.sidebar')

<div id="content-wrapper" class="d-flex flex-column"><!-- content wrapper-->
    <div class="content"><!-- main content -->
        @include('layouts.topbar')<!-- topbar -->
        <div class="container-fluid"><!-- Begin Container Fluid -->
            <div class="row"><!-- begin card detail barang masuk -->
                <div class="col-sm-8 m-auto">
                    <div class="card shadow-sm">
                        <div class="card-header bg-danger text-light font-weight-bold">
                            <span>Detail Barang Aset</span>
                        </div>
                        <div class="card-body">
                            @foreach($data as $row)
                            <div class="form-row">
                                <div class="form-group col-sm-4">
                                    <label for="noAset"><strong>Nomor Aset</strong></label>
                                    <input type="text" readonly class="form-control-plaintext" id="noAset" value="{{$row->no_aset}}">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="pemegang"><strong>Pemegang</strong></label>
                                    <input type="text" readonly class="form-control-plaintext" id="pemegang" value="{{$row->pemegang}}">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="lokasi"><strong>Lokasi</strong></label>
                                    <input type="text" readonly class="form-control-plaintext" id="lokasi" value="{{$row->nm_lokasi}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-4">
                                    <label for="ruang"><strong>Ruang</strong></label>
                                    <input type="text" readonly class="form-control-plaintext" id="ruang" value="{{$row->nm_ruang}}">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="lantai"><strong>Lantai</strong></label>
                                    <input type="text" readonly class="form-control-plaintext" id="lantai" value="{{$row->lantai}}">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="kondisi"><strong>Kondisi Aset</strong></label>
                                    <input type="text" readonly class="form-control-plaintext" id="kondisi" value="{{$row->kondisi}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-4">
                                    <label for="status"><strong>Status Aset</strong></label>
                                    <input type="text" readonly class="form-control-plaintext" id="ruang" value="{{$row->status}}">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="jenis"><strong>Jenis Barang</strong></label>
                                    <input type="text" readonly class="form-control-plaintext" id="jenis" value="{{$row->nm_jenis}}">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="kategori"><strong>Kategori Barang</strong></label>
                                    <input type="text" readonly class="form-control-plaintext" id="kategori" value="{{$row->nm_kategori}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-4">
                                    <label for="tanggalMasuk"><strong>Tanggal Masuk Barang</strong></label>
                                    <input type="text" readonly class="form-control-plaintext" id="tanggalMasuk" value="{{$row->tanggal_masuk}}">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="noTransaksi"><strong>Nomor Transaksi</strong></label>
                                    <input type="text" readonly class="form-control-plaintext" id="noTransaksi" value="{{$row->no_transaksi}}">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="tanggalTransaksi"><strong>Tanggal Transaksi</strong></label>
                                    <input type="text" readonly class="form-control-plaintext" id="tanggalTransaksi" value="{{$row->tanggal_transaksi}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-4">
                                    <label for="kdBarang"><strong>Kode Barang</strong></label>
                                    <input type="text" readonly class="form-control-plaintext" id="kdBarang" value="{{$row->kd_barang}}"> 
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="nmBarang"><strong>Nama Barang</strong></label>
                                    <input type="text" readonly class="form-control-plaintext" id="nmBarang" value="{{$row->nm_barang}}">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="harga"><strong>Harga</strong></label>
                                    <input type="text" readonly class="form-control-plaintext" id="harga" value="{{$harga->formatRupiah($row->harga)}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-4">
                                    <label for="jumlah"><strong>Jumlah</strong></label>
                                    <input type="text" readonly class="form-control-plaintext" id="jumlah" value="{{$row->jumlah}}">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="satuan"><strong>Satuan</strong></label>
                                    <input type="text" readonly class="form-control-plaintext" id="satuan" value="{{$row->satuan}}"> 
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="vendor"><strong>Vendor</strong></label>
                                    <input type="text" readonly class="form-control-plaintext" id="vendor" value="{{$row->nm_vendor}}">
                                </div>
                            </div>
                            @endforeach
                            <div class="row justify-content-end">
                                <a href="{{url('/transaksi/aset')}}" class="btn btn-warning btn-sm mr-2">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end of card detail barang masuk -->
    </div><!-- end of main content -->
    @include('layouts.footer')
</div><!-- end of content wrapper -->
@endsection

@section('scrollTop')
<a href="#page-top" class="scroll-to-top rounded">
    <i class="fas fa-angle-up"></i>
</a>
@endsection

@section('modal')
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><!-- logout modal -->
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="{{ url('/logout') }}">Logout</a>
        </div>
      </div>
    </div>
</div><!-- end of logout modal -->
@endsection
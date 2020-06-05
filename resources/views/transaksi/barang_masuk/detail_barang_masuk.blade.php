@extends('layouts.app')

@section('title', 'Barang Masuk')
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
                            <span>Detail Barang Masuk</span>
                        </div>
                        <div class="card-body">
                            @foreach($data as $row)
                            <div class="form-group row">
                                <label for="tanggalMasuk" class="form-label col-sm-4"><strong>Tanggal Masuk</strong></label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="tanggalMasuk" value="{{$row->tanggal_masuk}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="noTransaksi" class="form-label col-sm-4"><strong>Nomor Transaksi</strong></label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="noTransaksi" value="{{$row->no_transaksi}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggalTransaksi" class="form-label col-sm-4"><strong>Tanggal Transaksi</strong></label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="tanggalTransaksi" value="{{$row->tanggal_transaksi}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kdBarang" class="form-label col-sm-4"><strong>Kode Barang</strong></label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="kdBarang" value="{{$row->kd_barang}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nmBarang" class="form-label col-sm-4"><strong>Nama Barang</strong></label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="nmBarang" value="{{$row->nm_barang}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="harga" class="form-label col-sm-4"><strong>Harga</strong></label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="harga" value="{{$harga->formatRupiah($row->harga)}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jumlah" class="form-label col-sm-4"><strong>Jumlah</strong></label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="jumlah" value="{{$row->jumlah}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="satuan" class="form-label col-sm-4"><strong>Satuan</strong></label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="satuan" value="{{$row->satuan}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="vendor" class="form-label col-sm-4"><strong>Vendor</strong></label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="vendor" value="{{$row->nm_vendor}}">
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <a href="{{url('/transaksi/barang_masuk')}}" class="btn btn-warning btn-sm mr-2">Kembali</a>
                            </div>
                            @endforeach
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
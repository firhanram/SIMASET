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
            <div class="row"><!-- begin card input barang masuk -->
                <div class="col-sm-8 m-auto">
                    <div class="card shadow-sm">
                        <div class="card-header bg-danger text-light font-weight-bold">
                            <span>Input Barang Masuk</span>
                        </div>
                        <div class="card-body">
                            <form action="{{url('/transaksi/barang_masuk/tambah_barang_masuk/add')}}" method="POST">
                                {{csrf_field()}}
                                <div class="form-row">
                                    <div class="form-group col-sm-6">
                                        <label for="tanggalMasuk">Tanggal Masuk*</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                            <input type="date" class="form-control form-control-rounded @error('tanggalMasuk') is-invalid @enderror" name="tanggalMasuk" value="{{date('Y-m-d')}}">
                                            @error('tanggalMasuk')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="kdBarang">Kode Barang*</label>
                                        <select name="kdBarang" id="kdBarang" class="form-control form-control-rounded custom-select @error('kdBarang') is-invalid @enderror">
                                            <option value="">--Pilih Barang--</option>
                                            @foreach ($barang as $row)
                                                <option value="{{$row->kd_barang}}">{{$row->kd_barang.' | '.$row->nm_barang}}</option>
                                            @endforeach
                                        </select>
                                        @error('kdBarang')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6">
                                        <label for="noTransaksi">Nomor Transaksi</label>
                                        <input type="text" class="form-control form-control-rounded" id="noTransaksi" name="noTransaksi">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="tanggalTransaksi">Tanggal Transaksi</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                            <input type="date" id="tanggalTransaksi" class="form-control form-control-rounded" name="tanggalTransaksi">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-3">
                                        <label for="qty">Qty</label>
                                        <input type="number" name="qty" class="form-control form-control-rounded">
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="haraga">Harga</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    Rp
                                                </span>
                                            </div>
                                            <input type="text" id="harga" class="form-control form-control-rounded" name="harga">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-5">
                                        <label for="kdVendor">Vendor</label>
                                        <select name="kdVendor" id="kdVendor" class="form-control form-control-rounded custom-select">
                                            <option value="">--Pilih Vendor--</option>
                                            @foreach ($vendor as $row)
                                                <option value="{{$row->kd_vendor}}">{{$row->nm_vendor}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea name="keterangan" id="keterangan" class="form-control form-control-rounded"></textarea>
                                </div>
                                <div class="row justify-content-end">
                                    <button type="submit" class="btn btn-danger btn-sm mr-2">Submit</button>
                                    <a href="{{url('/transaksi/barang_masuk')}}" class="btn btn-warning btn-sm mr-2">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- end of card input barang masuk -->
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
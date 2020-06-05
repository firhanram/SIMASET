@extends('layouts.app')

@section('title', 'Peminjaman Inventory')
@section('body', 'id=page-top')
@section('wrapper','id=wrapper')

@section('content')
<!-- Sidebar -->
@include('manager.sidebar')

<div id="content-wrapper" class="d-flex flex-column"><!-- content wrapper-->
    <div class="content"><!-- main content -->
        @include('layouts.topbar')<!-- topbar -->
        <div class="container-fluid"><!-- Begin Container Fluid -->
            <div class="row"><!-- begin card input barang masuk -->
                <div class="col-sm-6 m-auto">
                    <div class="card shadow-sm">
                        <div class="card-header bg-danger text-light font-weight-bold">
                            <span>Input Pengajuan Peminjaman Inventory</span>
                        </div>
                        <div class="card-body">
                            @if(session('error'))
                                <div class="row mt-2"><!-- alert -->
                                    <div class="col-sm-12">
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert" >
                                        <span>{{ session('error') }}</span>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>     
                                    </div>
                                </div><!-- end of alert -->
                            @endif
                            <form action="{{url('/manager/peminjaman_inventory/add')}}" method="POST">
                                {{csrf_field()}}
                                @foreach($data as $row)
                                <div class="form-group row">
                                    <label for="tanggalPeminjaman" class="col-form-label col-sm-4">Tanggal Peminjaman*</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control form-control-rounded @error('tanggalPeminjaman') is-invalid @enderror" name="tanggalPeminjaman" id="tanggalPeminjaman">
                                        @error('tanggalPeminjaman')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                         @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tanggalPengembalian" class="col-form-label col-sm-4">Tanggal Pengembalian*</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control form-control-rounded @error('tanggalPengembalian') is-invalid @enderror" name="tanggalPengembalian" id="tanggalPengembalian">
                                        @error('tanggalPengembalian')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div> 
                                </div>
                                <div class="form-group row">
                                    <label for="noInventory" class="col-sm-label col-sm-4">Nomor Inventory</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-rounded" name="noInventory" id="noInventory"  value="{{$row->no_inventory}}"readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nmBarang" class="col-sm-label col-sm-4">Nama Barang</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-rounded" name="nmBarang" id="nmBarang" value="{{$row->nm_barang}}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jenis" class="col-sm-label col-sm-4">Jenis Barang</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-rounded" name="jenis" id="jenis" value="{{$row->nm_jenis}}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="satuan" class="col-sm-label col-sm-4">Satuan Barang</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-rounded" name="satuan" id="satuan" value="{{$row->satuan}}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jumlahTersedia" class="col-sm-label col-sm-4">Jumlah Tersedia</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="jumlahTersedia" id="jumlahTersedia" class="form-control form-control-rounded" value="{{$row->jumlah}}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jumlah" class="col-sm-label col-sm-4">Qty*</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control form-control-rounded @error('jumlah') is-invalid @enderror" name="jumlah">
                                        @error('jumlah')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="keterangan" class="col-form-label col-sm-4">Keterangan</label>
                                    <div class="col-sm-8">
                                        <textarea name="keterangan" id="keterangan" class="form-control form-control-rounded"></textarea>
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <button type="submit" class="btn btn-danger btn-sm mr-2">Submit</button>
                                    <a href="{{url('/manager')}}" class="btn btn-warning btn-sm">Kembali</a>
                                </div>
                                @endforeach
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
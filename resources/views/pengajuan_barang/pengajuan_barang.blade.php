@extends('layouts.app')

@section('title', 'Pengajuan Barang')
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
                            <span>Input Pengajuan Barang</span>
                        </div>
                        <div class="card-body">
                            @if(session('berhasil'))
                                <div class="row mt-2"><!-- alert -->
                                    <div class="col-sm-12">
                                    <div class="alert alert-success alert-dismissible fade show" role="alert" >
                                        <span>{{ session('berhasil') }}</span>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>     
                                    </div>
                                </div><!-- end of alert -->
                            @endif
                            @if(session('gagal'))
                                <div class="row mt-2"><!-- alert -->
                                    <div class="col-sm-12">
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert" >
                                        <span>{{ session('gagal') }}</span>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>     
                                    </div>
                                </div><!-- end of alert -->
                            @endif
                            <form action="{{url('/manager/pengajuan_barang/add')}}" method="POST">
                                {{csrf_field()}}
                                <div class="form-group row">
                                    <label for="tanggalPengajuan" class="col-form-label col-sm-4">Tanggal Pengajuan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-rounded" name="tanggalPengajuan" id="tanggalPengajuan" value="{{date('Y-m-d')}}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nmBarang" class="col-sm-label col-sm-4">Nama Barang*</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-rounded @error('nmBarang') is-invalid @enderror" name="nmBarang" id="nmBarang">
                                        @error('nmBarang')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jenis" class="col-sm-label col-sm-4">Jenis Barang*</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-rounded @error('jenis') is-invalid @enderror" name="jenis" id="jenis">
                                        @error('jenis')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kategori" class="col-sm-label col-sm-4">Kategori Barang*</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-rounded @error('kategori') is-invalid @enderror" name="kategori" id="kategori">
                                        @error('kategori')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="satuan" class="col-sm-label col-sm-4">Satuan Barang*</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-rounded @error('satuan') is-invalid @enderror" name="satuan" id="satuan">
                                        @error('satuan')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jumlah" class="col-sm-label col-sm-4">Jumlah*</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control form-control-rounded @error('jumlah') is-invalid @enderror" name="jumlah" id="jumlah">
                                        @error('jumlah')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="harga" class="col-sm-label col-sm-4">Harga*</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-rounded @error('harga') is-invalid @enderror" name="harga" id="harga">
                                        @error('harga')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="keterangan" class="col-form-label col-sm-4">Keteragan</label>
                                    <div class="col-sm-8">
                                        <textarea name="keterangan" id="keterangan" class="form-control form-control-rounded"></textarea>
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <button type="submit" class="btn btn-danger btn-sm mr-2">Submit</button>
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
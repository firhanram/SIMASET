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
            <div class="row"><!-- begin card input barang masuk -->
                <div class="col-sm-8 m-auto">
                    <div class="card shadow-sm">
                        <div class="card-header bg-danger text-light font-weight-bold">
                            <span>Input Pemberhentian Aset</span>
                        </div>
                        <div class="card-body">
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
                            <form action="{{url('/aset/pemberhentian/input_pemberhentian_aset/add')}}" method="POST">
                                {{csrf_field()}}
                                <div class="form-row">
                                    <div class="form-group col-sm-6">
                                        <label for="noAset">Nomor Aset*</label>
                                        <select name="noAset" id="noAset" class="form-control form-control-rounded custom-select @error('noAset') is-invalid @enderror">
                                            <option value="">--Pilih Aset--</option>
                                            @foreach ($aset as $row)
                                                <option value="{{$row->no_aset}}">{{$row->no_aset.' | '.$row->nm_barang}}</option>
                                            @endforeach
                                        </select>
                                        @error('noAset')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="tanggalPemberhentian">Tanggal Pemberhentian*</label>
                                        <input type="date" class="form-control form-control-rounded @error('tanggalPemberhentian') is-invalid @enderror" name="tanggalPemberhentian" id="tanggalPemberhentian">
                                        @error('tanggalPemberhentian')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div> 
                                </div>
                                <div class="form-row">
                                    <div class="form-gorup col-sm-6">
                                        <label for="kondisi">Kondisi Aset</label>
                                        <select name="kondisi" id="kondisi" class="form-control form-control-rounded custom-select">
                                            <option value="" selected>---Kondisi Aset---</option>
                                            <option value="Baik">Baik</option>
                                            <option value="Rusak">Rusak</option>
                                        </select>
                                    </div>
                                    <div class="form-gorup col-sm-6">
                                        <label for="status">Status Aset</label>
                                        <select name="status" id="status" class="form-control form-control-rounded custom-select">
                                            <option value="" selected>---Status Aset---</option>
                                            <option value="Aktif">Aktif</option>
                                            <option value="Nonaktif">Nonaktif</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea name="keterangan" id="keterangan" class="form-control form-control-rounded"></textarea>
                                </div>
                                <div class="row justify-content-end mt-2">
                                    <button type="submit" class="btn btn-danger btn-sm mr-3">Submit</button>
                                    <a href="{{url('/transaksi/aset')}}" class="btn btn-warning btn-sm mr-3">Kembali</a>
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
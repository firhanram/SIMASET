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
                <div class="col-sm-6 m-auto">
                    <div class="card shadow-sm">
                        <div class="card-header bg-danger text-light font-weight-bold">
                            <span>Input Aset</span>
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
                            <form action="{{url('/transaksi/aset/tambah_aset/add')}}" method="POST">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="noInventory">Nomor Aset</label>
                                    <input type="text" readonly name="noAset" class="form-control form-control-rounded" value="{{$noAset}}">
                                </div>
                                <div class="form-group">
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
                                <div class="form-row">
                                    <div class="form-group col-sm-6">
                                        <label for="lokasi">Lokasi*</label>
                                        <select name="lokasi" id="lokasi" class="form-control form-control-rounded custom-select @error('lokasi') is-invalid @enderror">
                                            <option value="">--Pilih Lokasi--</option>
                                            @foreach($lokasi as $row)
                                                <option value="{{$row->kd_lokasi}}">{{$row->nm_lokasi}}</option>
                                            @endforeach
                                        </select>
                                        @error('lokasi')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="ruang">Ruang*</label>
                                        <select name="ruang" id="ruang" class="form-control form-control-rounded custom-select @error('ruang') is-invalid @enderror">
                                            <option value="">--Pilih Ruang--</option>
                                            @foreach($ruang as $row)
                                                <option value="{{$row->kd_ruang}}">{{$row->nm_ruang}}</option>
                                            @endforeach
                                        </select>
                                        @error('ruang')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="pemegang">Pemegang</label>
                                    <input type="text" name="pemegang" id="pemegang" class="form-control form-control-rounded">
                                </div>
                                <div class="form-row">
                                    <div class="form-gorup col-sm-6">
                                        <label for="kondisi">Kondisi</label>
                                        <select name="kondisi" id="kondisi" class="form-control form-control-rounded custom-select">
                                            <option value="Baik" selected>Baik</option>
                                            <option value="Rusak">Rusak</option>
                                        </select>
                                    </div>
                                    <div class="form-gorup col-sm-6">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control form-control-rounded custom-select">
                                            <option value="Aktif" selected>Aktif</option>
                                            <option value="Nonaktif">Nonaktif</option>
                                        </select>
                                    </div>
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
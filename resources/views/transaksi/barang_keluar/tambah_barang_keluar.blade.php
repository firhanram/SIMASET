@extends('layouts.app')

@section('title', 'Input Barang Keluar')
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
                            <span>Input Barang Keluar</span>
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
                            <form action="{{url('/transaksi/barang_keluar/tambah_barang_keluar/add')}}" method="POST">
                                {{csrf_field()}}
                                <div class="form-row">
                                    <div class="form-group col-sm-6">
                                        <label for="kdBarang">Kode Barang*</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#modalKodeBarang">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                            <input type="text" class="form-control form-control-rounded @error('kdBarang') is-invalid @enderror" name="kdBarang" id="kdBarang">
                                            @error('kdBarang')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror        
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="tanggalKeluar">Tanggal Keluar*</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                            <input type="date" class="form-control form-control-rounded @error('tanggalKeluar') is-invalid @enderror" name="tanggalKeluar">
                                            @error('tanggalKeluar')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror      
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-4">
                                        <label for="nmBarang">Nama Barang</label>
                                        <input type="text" class="form-control form-control-rounded" id="nmBarang" name="nmBarang" readonly>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="jenis">Jenis Barang</label>
                                        <input type="text" class="form-control form-control-rounded" id="jenis" name="jenis" readonly>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="kategori">Kategori Barang</label>
                                        <input type="text" class="form-control form-control-rounded" id="kategori" name="kategori" id="kategori" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-2">
                                        <label for="qty">Qty</label>
                                        <input type="number" name="qty" class="form-control form-control-rounded">
                                    </div>
                                    <div class="form-group col-sm-2">
                                        <label for="stock">Stock Awal</label>
                                        <input type="text" name="stock" id="stock" class="form-control form-control-rounded" readonly>
                                    </div>
                                    <div class="form-group col-sm-8">
                                        <label for="satuan">Satuan</label>
                                        <input type="text" name="satuan" id="satuan" class="form-control form-control-rounded" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea name="keterangan" id="keterangan" class="form-control form-control-rounded"></textarea>
                                </div>
                                <div class="row justify-content-end">
                                    <button type="submit" class="btn btn-danger btn-sm mr-2">Submit</button>
                                    <a href="{{url('/transaksi/barang_keluar')}}" class="btn btn-warning btn-sm mr-2">Kembali</a>
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

<div class="modal fade" id="modalKodeBarang" tabindex="-1" role="dialog" aria-labelledby="labelKodeBarang" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="labelKodeBarang">Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="bg-danger text-light text-center">
                          <tr>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jenis</th>
                            <th>Kategori</th>
                            <th>stock</th>
                            <th>Satuan</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($stock as $row)
                          <tr>
                            <td>{{$row->kd_barang}}</td>
                            <td>{{$row->nm_barang}}</td>
                            <td>{{$row->nm_jenis}}</td>
                            <td>{{$row->nm_kategori}}</td>
                            <td>{{$row->jumlah}}</td>
                            <td>{{$row->satuan}}</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-warning" id="select" 
                                    data-kode="{{ $row->kd_barang}}" 
                                    data-barang="{{$row->nm_barang}}" 
                                    data-jenis="{{$row->nm_jenis}}"
                                    data-stock="{{$row->jumlah}}"
                                    data-kategori="{{$row->nm_kategori}}"
                                    data-satuan="{{$row->satuan}}">
                                    Select
                                </button>
                            </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                      {{$stock->links()}}
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script src="{{asset('assets/js/transaksi/barang_keluar/barangKeluar.js')}}"></script>
@endsection
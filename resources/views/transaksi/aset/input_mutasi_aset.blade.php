@extends('layouts.app')

@section('title', 'Mutasi Aset')
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
                            <form action="{{url('/aset/mutasi/input_mutasi_aset/add')}}" method="POST">
                                {{csrf_field()}}
                                <div class="form-row">
                                    <div class="form-group col-sm-6">
                                        <label for="noAset">Nomor Aset*</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#modalNoAset">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                            <input type="text" class="form-control form-control-rounded @error('noAset') is-invalid @enderror" name="noAset" id="noAset">
                                            @error('noAset')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror        
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="tanggalMutasi">Tanggal Mutasi*</label>
                                        <input type="date" class="form-control form-control-rounded @error('tanggalMutasi') is-invalid @enderror" name="tanggalMutasi" id="tanggalMutasi">
                                        @error('tanggalMutasi')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div> 
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6">
                                        <label for="lokasiAwal">Lokasi Awal</label>
                                        <input type="text" class="form-control form-control-rounded" readonly id="lokasiAwal" name="lokasiAwal">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="lokasiSekarang">Lokasi Sekarang*</label>
                                        <select name="lokasiSekarang" id="lokasiSekarang" class="form-control form-control-rounded custom-select  @error('lokasiSekarang') is-invalid @enderror">
                                            <option value="">---Lokasi---</option>
                                            @foreach($lokasi as $row)
                                                <option value="{{$row->kd_lokasi}}">{{$row->nm_lokasi}}</option>
                                            @endforeach
                                        </select>
                                        @error('lokasiSekarang')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6">
                                        <label for="ruangAwal">Ruang Awal</label>
                                        <input type="text" class="form-control form-control-rounded" id="ruangAwal" name="ruangAwal" readonly>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="ruangSekarang">Ruang Sekarang*</label>
                                        <select name="ruangSekarang" id="ruangSekarang" class="form-control form-control-rounded custom-select @error('ruangSekarang') is-invalid @enderror">
                                            <option value="">---Ruang---</option>
                                            @foreach($ruang as $row)
                                                <option value="{{$row->kd_ruang}}">{{$row->nm_ruang}}</option>
                                            @endforeach
                                        </select>
                                        @error('ruangSekarang')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6">
                                        <label for="pemegangAwal">Pemegang Awal</label>
                                        <input type="text" class="form-control form-control-rounded" id="pemegangAwal" name="pemegangAwal" readonly>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="pemegangSekarang">Pemegang Sekarang*</label>
                                        <input type="text" class="form-control form-control-rounded @error('pemegangSekarang') is-invalid @enderror" id="pemegangSekarang" name="pemegangSekarang">
                                        @error('pemegangSekarang')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row justify-content-end mt-2">
                                    <button type="submit" class="btn btn-danger btn-sm mr-3">Submit</button>
                                    <a href="{{url('/aset/mutasi')}}" class="btn btn-warning btn-sm mr-3">Kembali</a>
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

<div class="modal fade" id="modalNoAset" tabindex="-1" role="dialog" aria-labelledby="labelNoAset" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="labelKodeBarang">Aset</h5>
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
                            <th>Nomor Aset</th>
                            <th>Nama Barang</th>
                            <th>Pemegang</th>
                            <th>Lokasi</th>
                            <th>Ruang</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($aset as $row)
                          <tr>
                            <td>{{$row->no_aset}}</td>
                            <td>{{$row->nm_barang}}</td>
                            <td>{{$row->pemegang}}</td>
                            <td>{{$row->nm_lokasi}}</td>
                            <td>{{$row->nm_ruang}}</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-warning" id="select" 
                                    data-kode="{{ $row->no_aset}}" 
                                    data-pemegang="{{$row->pemegang}}"
                                    data-lokasi="{{$row->nm_lokasi}}"
                                    data-ruang="{{$row->nm_ruang}}">
                                    Select
                                </button>
                            </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                      {{$aset->links()}}
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
  <script src="{{asset('assets/js/transaksi/aset/mutasi.js')}}"></script>
@endsection
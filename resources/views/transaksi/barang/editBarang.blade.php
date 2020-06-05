@extends('layouts.app')

@section('title', 'Tambah Barang')
@section('body', 'id=page-top')
@section('wrapper','id=wrapper')

@section('content')
<!-- Sidebar -->
@include('admin.sidebar')

<div id="content-wrapper" class="d-flex flex-column"><!-- content-wrapper -->
    
    <div id="content"><!-- main content -->
        <!-- topbar -->
        @include('layouts.topbar')

        <div class="container-fluid"><!-- page content -->
            <div class="row"><!-- row of user user form -->
               <div class="col-sm-8 m-auto"><!-- col of form add user -->
                    <div class="card shadow-sm"><!-- card -->
                        <div class="card-header text-light font-weight-bold bg-danger"><!-- card header -->
                            <span>Input Barang</span>
                        </div><!-- end of card header -->
                        <div class="card-body"><!-- body of card -->
                            @if(session('gagal'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert" >
                                    <span>{{session('gagal')}}</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <form action="{{url('/transaksi/barang/edit_barang/update')}}" method="post">
                                {{csrf_field()}}
                                @foreach($data as $row)
                                <div class="form-row">
                                    <div class="form-group col-sm-6">
                                        <label for="kdBarang">Kode Barang</label>
                                        <input type="text" class="form-control form-control-rounded" name="kdBarang" id="kdBarang" value="{{$row->kd_barang}}" readonly>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="nmBarang">Nama Barang*</label>
                                        <input type="text" class="form-control form-control-rounded" name="nmBarang" id="nmBarang" value="{{$row->nm_barang}}">
                                    </div>
                                </div>
                                @endforeach
                                <div class="form-row">
                                    <div class="form-group col-sm-6">
                                        <label for="jenis">Jenis*</label>
                                        <select name="jenis" id="jenis" class="form-control form-control-rounded custom-select">
                                            <option value="">--Pilih Jenis---</option>
                                            @foreach($jenis as $row)
                                                <option value="{{$row->kd_jenis}}">{{$row->nm_jenis}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="kategori">Kategori*</label>
                                        <select name="kategori" id="kategori" class="form-control form-control-rounded custom-select">
                                            <option value="">--Pilih Kategori---</option>
                                            @foreach($kategori as $row)
                                                <option value="{{$row->kd_kategori}}">{{$row->nm_kategori}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @foreach($data as $row)
                                <div class="form-row">
                                    <div class="form-group col-sm-6">
                                        <label for="nomorSeri">Nomor Seri*</label>
                                        <input type="text" class="form-control form-control-rounded" name="nomorSeri" id="nomorSeri" value="{{$row->no_seri}}">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="satuan">Satuan</label>
                                        <input type="text" class="form-control form-control-rounded" name="satuan" id="satuan" value="{{$row->satuan}}"">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="spesifikasi">Spesifikasi</label>
                                    <textarea name="spesifikasi" id="spesifikasi" class="form-control form-control-rounded" >{{$row->spesifikasi}}</textarea>
                                </div>
                                <div class="row justify-content-end mr-1">
                                    <button class="btn btn-sm btn-danger font-weight-bold mr-1" type="submit">Update</button>
                                    <a href="{{url('/transaksi/barang ')}}" class="btn btn-warning btn-sm font-weight-bold">Kembali</a>
                                </div>
                                @endforeach
                            </form>
                        </div><!-- end of body of card -->
                    </div><!-- end of card -->
               </div><!-- end of col add user -->
            </div><!-- end of row user form -->
        </div><!-- end of page content -->
        @include('layouts.footer')
    </div> <!-- end of main content -->
</div><!-- end of content-wrapper -->
@endsection

@section('scrollTop')
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

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

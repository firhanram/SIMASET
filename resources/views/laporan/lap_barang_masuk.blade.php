@extends('layouts.app')

@section('title', 'Laporan Barang Masuk')
@section('body', 'id=page-top')
@section('wrapper','id=wrapper')

@section('content')
<!-- Sidebar -->
@include('admin.sidebar')

<div id="content-wrapper" class="d-flex flex-column"><!-- content wrapper-->
    <div class="content"><!-- main content -->
        @include('layouts.topbar')<!-- topbar -->
        <div class="container-fluid"><!-- Begin Container Fluid -->
            <div class="row justify-content-center"><!-- begin card input barang masuk -->
                <div class="col-sm-6">
                    <div class="card shadow-sm">
                        <div class="card-header bg-danger text-light font-weight-bold">
                            <span>Cetak Laporan Barang Masuk Per Bulan</span>
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
                            <form action="{{url('/laporan/barang_masuk/cetak')}}" method="POST">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="bulan"><strong>Bulan</strong></label>
                                    <select name="bulan" id="bulan" class="form-control form-control-rounded custom-select">
                                        <option value="January">January</option>
                                        <option value="Febuary">Febuary</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="June">June</option>
                                        <option value="July">July</option>
                                        <option value="August">August</option>
                                        <option value="September">September</option>
                                        <option value="October">October</option>
                                        <option value="November">November</option>
                                        <option value="December">December</option>
                                    </select>
                                </div>
                                <div class="row justify-content-end">
                                    <button type="submit" class="btn btn-danger btn-sm mr-2">Cetak</button>
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
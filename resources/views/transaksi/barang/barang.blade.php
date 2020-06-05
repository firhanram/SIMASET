@extends('layouts.app')

@section('title', 'Barang')
@section('body', 'id=page-top')
@section('wrapper','id=wrapper')

@section('content')
<!-- Sidebar -->
@include('admin.sidebar')

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content"><!-- Main Content -->
      @include('layouts.topbar')<!-- Topbar -->    
      <div class="container-fluid"><!-- Begin Container Fluid -->
        <div class="row">
            <div class="col-xl-3">
                <a class="btn btn-danger" href="{{ url('transaksi/barang/tambah_barang')}}" role="button">
                    <i class="fas fa-plus-circle"></i>
                    <span>Input Barang</span>
                </a>
            </div>
        </div>
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
              <div class="alert alert-success alert-dismissible fade show" role="alert" >
                  <span>{{ session('gagal') }}</span>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>     
            </div>
          </div><!-- end of alert -->
        @endif
        <div class="row"> <!-- Begin Data Barang -->
          @livewire('barang.barang-index')
        </div> <!-- End of Data Barang -->
      </div> <!-- End of Container-Fluid -->  
    @include('layouts.footer')<!-- Footer -->
    </div> <!-- End Of Main Content -->
</div><!-- End of Content Wrapper -->
@endsection<!-- End of Page Wrapper -->

@section('scrollTop')
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
@endsection

@section('modal')
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
</div>
@endsection
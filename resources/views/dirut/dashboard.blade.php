@extends('layouts.app')

@section('title', 'Dashboard')
@section('body', 'id=page-top')
@section('wrapper','id=wrapper')

@section('content')
<!-- Sidebar -->
@include('dirut.sidebar')

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

      <!-- Topbar -->
      @include('layouts.topbar')

      <!-- Begin Page Content -->
      <div class="container-fluid">
    
        <div class="row"><!-- data all -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow-sm h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Aset</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalAset}}</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-warehouse fa-3x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow-sm h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Barang</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalBarang}}</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-boxes fa-3x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow-sm h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Aset Nonaktif</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalAsetNonaktif}}</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-times-circle fa-3x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow-sm h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Inventory</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalInventory}}</div>
                  </div>
                  <div class="col-auto">
                    <i class="fab fa-dropbox fa-3x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- /data all -->

        @if($pengajuanBarang > 0)
        <div class="row mt-3"><!-- pengajuan barang  -->
           @livewire('pengajuan.pengajuan-masuk')
        </div><!-- /pengajuan barang  -->
        @endif

        @if($peminjamanAset > 0)
        <div class="row mt-3">
          @livewire('peminjaman.aset.peminjaman-aset-index')
        </div>
        @endif
      <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
   @include('layouts.footer')

  </div>
  <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->
@endsection

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
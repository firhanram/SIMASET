@extends('layouts.app')

@section('title', 'Dashboard')
@section('body', 'id=page-top')
@section('wrapper','id=wrapper')

@section('content')
<!-- Sidebar -->
@include('manager.sidebar')

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

      <!-- Topbar -->
      @include('layouts.topbar')

      <!-- Begin Page Content -->
      <div class="container-fluid">
        @if(session()->has('message'))
          <div class="row">
            <div class="col-sm-12">
              <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                <span>{{session('message')}}</span>
                <button class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
             </div>
            </div>
          </div>
        @endif
        <div class="row mt-3"><!-- daftar inventory -->
            @livewire('inventory.daftar-inventory')
        </div><!-- daftar inventory -->

        <div class="row mt-3">
            @livewire('aset.daftar-aset')
        </div>
      </div> <!-- /.container-fluid -->

      <!-- Footer -->
      @include('layouts.footer')

    </div><!-- End of Main Content -->
  
</div><!-- End of Content Wrapper -->
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
@extends('layouts.app')

@section('title', 'User')
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
            <div class="row"><!-- button tambah user -->
                <div class="col-sm-3">
                    <a href="{{url('/user/tambahUser')}}" class="btn btn-danger">
                        <i class="fas fa-plus-circle"></i>
                        <span class="font-weight-bold">Tambah User</span>
                    </a>
                </div>
            </div><!-- end of button tambah user -->
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
            <div class="row mt-2"><!-- row of user data -->
               <div class="col-sm-12"><!-- col of user data -->
                    <div class="card shadow-sm"><!-- card -->
                        <div class="card-header text-light font-weight-bold bg-danger"><!-- card header -->
                            <span>Daftar User</span>
                        </div><!-- end of card header -->
                        <div class="card-body"><!-- body of card -->
                            @livewire('search-user')
                        </div><!-- end of body of card -->
                    </div><!-- end of card -->
               </div><!-- end of user data -->
            </div><!-- end of user data -->
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

@extends('layouts.app')

@section('title', 'History Pemakaian Inventory')
@section('body', 'id=page-top')
@section('wrapper','id=wrapper')

@section('content')
<!-- Sidebar -->
@if(session()->get('role_id') == 1)
    @include('admin.sidebar')
@elseif(session()->get('role_id') == 2)
    @include('manager.sidebar') 
@elseif(session()->get('role_id') == 3)
    @include('dirut.sidebar') 
@endif

<div id="content-wrapper" class="d-flex flex-column"><!-- content wrapper-->
    <div class="content"><!-- main content -->
        @include('layouts.topbar')<!-- topbar -->
        <div class="container-fluid"><!-- Begin Container Fluid -->
            <div class="row"><!-- begin card input barang masuk -->
                <div class="col-sm-12">
                    <div class="card shadow-sm">
                        <div class="card-header bg-danger text-light font-weight-bold">
                            <span>History Pemakaian Inventory</span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive mt-2">
                                <table class="table table-bordered table-hover">
                                    <thead class="text-center font-weight-bold text-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal Pemakaian</th>
                                            <th>No. Inventory</th>
                                            <th>Nama Barang</th>
                                            <th>Jenis Barang</th>
                                            <th>Jumlah Pemakaian</th>
                                            <th>Pemakai</th>
                                            <th>Status</th>
                                            <th>Penyetuju</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-dark">
                                        @foreach($data as $row)
                                        <tr>
                                            <td class="text-center">{{$loop->iteration}}</td>
                                            <td>{{$row->tanggal_pemakaian}}</td>
                                            <td>{{$row->no_inventory}}</td>
                                            <td>{{$row->nm_barang}}</td>
                                            <td>{{$row->nm_jenis}}</td>
                                            <td class="text-center">{{$row->qty}}</td>
                                            <td>{{$row->fullName}}</td>
                                            <td class="text-center">
                                                @if($row->status_pemakaian == 'Disetujui')
                                                    <span class="btn btn-sm btn-success font-weight-bold">{{$row->status_pemakaian}}</span>
                                                @elseif($row->status_pemakaian == 'Tidak Disetujui')
                                                    <span class="btn btn-sm btn-danger font-weight-bold">{{$row->status_pemakaian}}</span>
                                                @else
                                                    <span class="btn btn-sm btn-info font-weight-bold">{{$row->status_pemakaian}}</span>
                                                @endif
                                            </td>
                                            <td>{{$row->penyetuju}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$data->links()}}
                            </div>
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
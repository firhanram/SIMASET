@extends('layouts.app')

@section('title', 'Dashboard')
@section('body', 'id=page-top')
@section('wrapper','id=wrapper')

@section('content')
<!-- Sidebar -->
@include('admin.sidebar')

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

      <!-- Topbar -->
      @include('layouts.topbar')

      <!-- Begin Page Content -->
      <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
        <div class="row">
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
                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Users</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalUser}}</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-user fa-3x text-gray-300"></i>
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
      </div>

      <div class="row">
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
      </div>

      <div class="row mt-3">
        <div class="col-sm-12 col-xl-6 col-lg-12 col-12 col-md-12"><!-- table barang masuk -->
          <div class="card shadow-sm">
            <div class="card-header bg-danger">
              <span class="text-white font-weight-bold">
                Data Barang Masuk Hari Ini
              </span>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-bordered table-hover">
                <thead class="bg-white text-center text-dark font-weight-bold">
                  <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jenis</th>
                    <th>Kategori</th>
                    <th>Qty</th>
                    <th>Satuan</th>
                  </tr>
                </thead>
                <tbody class="text-dark">
                  @foreach($barangMasukPerHari as $row)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$row->nm_barang}}</td>
                    <td>{{$row->nm_jenis}}</td>
                    <td>{{$row->nm_kategori}}</td>
                    <td>{{$row->jumlah}}</td>
                    <td>{{$row->satuan}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{$barangMasukPerHari->links()}}
            </div>
          </div>
        </div><!-- end table barang masuk -->

        <div class="col-sm-12 col-xl-6 col-lg-12 col-12 col-md-12"><!-- table barang keluar -->
          <div class="card shadow-sm">
            <div class="card-header bg-danger">
              <span class="text-white font-weight-bold">
                Data Barang Keluar Hari Ini
              </span>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-bordered table-hover">
                <thead class="bg-white text-center text-dark font-weight-bold">
                  <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jenis</th>
                    <th>Kategori</th>
                    <th>Qty</th>
                    <th>Satuan</th>
                  </tr>
                </thead>
                <tbody class="text-dark">
                  @foreach($barangKeluarPerHari as $row)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$row->nm_barang}}</td>
                    <td>{{$row->nm_jenis}}</td>
                    <td>{{$row->nm_kategori}}</td>
                    <td>{{$row->jumlah}}</td>
                    <td>{{$row->satuan}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{$barangKeluarPerHari->links()}}
            </div>
          </div>
        </div><!-- end table barang keluar -->
      </div>

      <div class="row mt-3"><!-- data daftar pengajuan barang -->
        <div class="col-sm-12"><!-- table daftar pengajuan barang -->
          <div class="card shadow-sm">
            <div class="card-header bg-danger">
              <span class="text-white font-weight-bold">Daftar Pengajuan Barang</span>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover">
                  <thead class="bg-white font-weight-bold text-center text-dark">
                    <tr>
                      <th>Tanggal Pengajuan</th>
                      <th>Nama Barang</th>
                      <th>Jenis Barang</th>
                      <th>Kategori Barang</th>
                      <th>Satuan Barang</th>
                      <th>Jumlah</th>
                      <th>Harga</th>
                      <th>Keterangan</th>
                      <th>Pengaju</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody class="text-dark">
                    @foreach($pengajuan as $row)
                    <tr>
                      <td>{{$row->tanggal_pengajuan}}</td>
                      <td>{{$row->nm_barang}}</td>
                      <td>{{$row->jenis_barang}}</td>
                      <td>{{$row->kategori_barang}}</td>
                      <td>{{$row->satuan_barang}}</td>
                      <td>{{$row->jumlah}}</td>
                      <td>{{$harga->formatRupiah($row->harga)}}</td>
                      <td>{{$row->keterangan}}</td>
                      <td>{{$row->fullName}}</td>
                      <td>
                        <span class="btn btn-sm btn-success">{{$row->status_pengajuan}}</span>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{$pengajuan->links()}}
              </div>
            </div>
          </div>
        </div><!-- /table pengajuan barang -->
      </div><!-- data daftar pengajuan barang -->

      @if($dataPeminjamanInventoryBelumTersetujui > 0)
      <div class="row mt-3">
        <div class="col-sm-12">
          @livewire('peminjaman.inventory.peminjaman-inventory-index')
        </div>       
      </div>
      @endif

      @if($dataPemakaianInventoryBelumTersetujui > 0)
      <div class="row mt-3">
        <div class="col-sm-12">
          @livewire('pemakaian.inventory.pemakaian-inventory-index')
        </div>
      </div>
      @endif

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
<!-- sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/dashboard') }}">
      <div class="sidebar-brand-icon">
        <img src="{{asset('assets/img/logo.png')}}" class="img-fluid" alt="">
      </div>
     
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link text-dark" href="{{ url('/direkturUtama')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseData" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-table"></i>
        <span>Data</span>
      </a>
      <div id="collapseData" class="collapse" aria-labelledby="headingData" data-parent="#accordionSidebar">
        <div class="bg-danger font-weight-bold py-2 collapse-inner rounded">
          <a class="collapse-item text-light" href="{{ url('/direkturUtama/data_inventory') }}">Inventory</a>
          <a class="collapse-item text-light" href="{{ url('/direkturUtama/data_aset') }}">Aset</a>
          <a class="collapse-item text-light" href="{{ url('/direkturUtama/data_barang') }}">Barang</a>
          <a class="collapse-item text-light" href="{{ url('/direkturUtama/data_barang_masuk') }}">Barang Masuk</a>
          <a class="collapse-item text-light" href="{{ url('/direkturUtama/data_barang_keluar') }}">Barang Keluar</a>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseHistory" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-history"></i>
        <span>History</span>
      </a>
      <div id="collapseHistory" class="collapse" aria-labelledby="headingHistory" data-parent="#accordionSidebar">
        <div class="bg-danger font-weight-bold py-2 collapse-inner rounded">
          <a class="collapse-item text-light" href="{{ url('/direkturUtama/history_pengajuan_barang') }}">Pengajuan Barang</a>
          <a class="collapse-item text-light" href="{{ url('/direkturUtama/history_peminjaman_aset') }}">Peminjaman Aset</a>
          <a class="collapse-item text-light" href="{{ url('/direkturUtama/history_peminjaman_inventory') }}">Peminjaman Inventory</a>
          <a class="collapse-item text-light" href="{{ url('/direkturUtama/history_pemakaian_inventory') }}">Pemakaian Inventory</a>
          <a class="collapse-item text-light" href="{{ url('/direkturUtama/history_login')}}">Login</a>
        </div>
      </div>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0 " id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->
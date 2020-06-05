<!-- sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

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
      <a class="nav-link" href="{{ url('/dashboard')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-database"></i>
        <span>Master</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Data:</h6>
          <a class="collapse-item" href="{{ url('/aset') }}">Barang</a>
          <a class="collapse-item" href="{{ url('/inventaris')}}">Vendor</a>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAset" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-warehouse"></i>
        <span>Aset</span>
      </a>
      <div id="collapseAset" class="collapse" aria-labelledby="headingAset" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="{{ url('/jenis')}}">Transaksi</a>
          <a class="collapse-item" href="{{ url('/aset/lokasi')}}">Lokasi</a>
          <a class="collapse-item" href="{{ url('/aset/ruang')}}">Ruang</a>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseInventory" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fab fa-dropbox"></i>
        <span>Transaksi</span>
      </a>
      <div id="collapseInventory" class="collapse" aria-labelledby="headingInventory" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="{{ url('/inventory/inv_barang_masuk')}}">Barang Masuk</a>
          <a class="collapse-item" href="{{ url('/inventory/inv_barang_keluar')}}">Barang Keluar</a>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/dashboard')}}">
        <i class="fas fa-building"></i>
        <span>Cabang</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-book"></i>
        <span>Laporan</span>
      </a>
      <div id="collapseLaporan" class="collapse" aria-labelledby="headingLaporan" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="{{ url('/lap_barang_masuk') }}">Barang Masuk</a>
          <a class="collapse-item" href="{{ url('/lap_barang_keluar') }}">Barang Keluar</a>
          <a class="collapse-item" href="cards.html">Aset</a>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/user')}}">
        <i class="fas fa-address-book"></i>
        <span>User</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->
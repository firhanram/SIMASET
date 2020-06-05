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
      <a class="nav-link text-dark" href="{{ url('/admin')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-database"></i>
        <span>Data Master</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-danger font-weight-bold py-2 collapse-inner rounded">
          <h6 class="collapse-header text-light">Data:</h6>
          <a class="collapse-item text-light" href="{{ url('/master/jenis') }}">Jenis</a>
          <a class="collapse-item text-light" href="{{ url('/master/kategori')}}">Kategori</a>
          <a class="collapse-item text-light" href="{{ url('/master/ruang')}}">Ruang</a>
          <a class="collapse-item text-light" href="{{ url('/master/lokasi')}}">Lokasi</a>
          <a class="collapse-item text-light" href="{{ url('/master/vendor')}}">Vendor</a>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAset" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-warehouse"></i>
        <span>Aset</span>
      </a>
      <div id="collapseAset" class="collapse" aria-labelledby="headingAset" data-parent="#accordionSidebar">
        <div class="bg-danger font-weight-bold py-2 collapse-inner rounded">
          <a class="collapse-item text-light" href="{{ url('/aset/pemberhentian')}}">Pemberhentian</a>
          <a class="collapse-item text-light" href="{{ url('/aset/mutasi')}}">Mutasi</a>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseInventory" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fab fa-dropbox"></i>
        <span>Data Transaksi</span>
      </a>
      <div id="collapseInventory" class="collapse" aria-labelledby="headingInventory" data-parent="#accordionSidebar">
        <div class="bg-danger font-weight-bold py-2 collapse-inner rounded">
          <a class="collapse-item text-light" href="{{ url('/transaksi/barang_masuk')}}">Barang Masuk</a>
          <a class="collapse-item text-light" href="{{ url('/transaksi/barang_keluar')}}">Barang Keluar</a>
          <a class="collapse-item text-light" href="{{ url('/transaksi/barang')}}">Barang</a>
          <a class="collapse-item text-light" href="{{ url('/transaksi/inventory')}}">Inventory</a>
          <a class="collapse-item text-light" href="{{ url('/transaksi/aset')}}">Aset</a>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-book"></i>
        <span>Laporan</span>
      </a>
      <div id="collapseLaporan" class="collapse" aria-labelledby="headingLaporan" data-parent="#accordionSidebar">
        <div class="bg-danger font-weight-bold py-2 collapse-inner rounded">
          <a class="collapse-item text-light" href="{{ url('/laporan/barang_masuk') }}">Barang Masuk</a>
          <a class="collapse-item text-light" href="{{ url('/laporan/barang_keluar') }}">Barang Keluar</a>
          <a class="collapse-item text-light" href="{{ url('laporan/aset')}}">Aset</a>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/user')}}">
        <i class="fas fa-address-book"></i>
        <span>User</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseHistory" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-history"></i>
        <span>History</span>
      </a>
      <div id="collapseHistory" class="collapse" aria-labelledby="headingHistory" data-parent="#accordionSidebar">
        <div class="bg-danger font-weight-bold py-2 collapse-inner rounded">
          <a class="collapse-item text-light" href="{{ url('/admin/history_pengajuan_barang') }}">Pengajuan Barang</a>
          <a class="collapse-item text-light" href="{{ url('/admin/history_peminjaman_aset') }}">Peminjaman Aset</a>
          <a class="collapse-item text-light" href="{{ url('/admin/history_peminjaman_inventory') }}">Peminjaman Inventory</a>
          <a class="collapse-item text-light" href="{{ url('/admin/history_pemakaian_inventory') }}">Pemakaian Inventory</a>
          <a class="collapse-item text-light" href="{{ url('/admin/history_login')}}">Login</a>
        </div>
      </div>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0 " id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->
<div class="bg-light border-right" id="sidebar-wrapper">
  <div class="sidebar-heading">Sistem Pergudangan </div>
  <div class="list-group list-group-flush">
    <a href="{{ url('/home') }}" class="list-group-item list-group-item-action bg-light">Dashboard</a>
    <a href="{{ route('employee.index') }}" class="list-group-item list-group-item-action bg-light">Data Karyawan</a>
    <a href="{{ route('supplier.index') }}" class="list-group-item list-group-item-action bg-light">Seksi Pemasok</a>
    <a href="{{ route('product.index') }}" class="list-group-item list-group-item-action bg-light">Data Barang</a>
    <a href="{{ route('sell.index') }}" class="list-group-item list-group-item-action bg-light">Barang Diambil</a>
    <a href="{{ route('purchase.index') }}" class="list-group-item list-group-item-action bg-light">Barang Masuk</a>
    <a href="{{ route('report.index') }}" class="list-group-item list-group-item-action bg-light">Laporan Pengambilan</a>
    <a href="{{ route('report2.index') }}" class="list-group-item list-group-item-action bg-light">Laporan Barang Masuk</a>

    <!-- yang hanya bisa diakses admin -->
    @if(Auth::user()->akses == 'admin')
    <li class="nav-item dropdown" style="list-style-type: none;">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: black;">
        Database
      </a>

      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('category.index') }}"></i>Kategori Barang</a>
        <a class="dropdown-item" href="{{ route('unit.index') }}"></i>Satuan</a>
        <a class="dropdown-item" href="{{ route('user.index') }}">User</a>
      </div>
    </li>
    @endif

    <a href="{{ url('/about') }}" class="list-group-item list-group-item-action bg-light">About</a>
  </div>
</div>
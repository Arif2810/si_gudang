<!-- Left side column. contains the logo and sidebar -->
<!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->

    <!-- search form -->
    <!-- /.search form -->

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li>
        <a href="{{ url('/home') }}">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <li>
        <a href="{{ route('employee.index') }}">
          <i class="fa fa-address-book"></i> <span> Data Karyawan</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>
      <li>
        <a href="{{ route('supplier.index') }}">
          <i class="fa fa-user"></i> <span>Supplier</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>
      <li>
        <a href="{{ route('product.index') }}">
          <i class="glyphicon glyphicon-shopping-cart"></i> <span>Data Barang</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>
      <li>
        <a href="{{ route('sell.index') }}">
          <i class="glyphicon glyphicon-floppy-open"></i> <span>Pengambilan Barang</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>

      <li>
        <a href="{{ route('report.index') }}">
          <i class="glyphicon glyphicon-book"></i> <span>Laporan Pengambilan</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>

      <li>
        <a href="{{ route('purchase.index') }}">
          <i class="glyphicon glyphicon-floppy-save"></i> <span>Barang Masuk</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>

      <li>
        <a href="{{ route('report2.index') }}">
          <i class="glyphicon glyphicon-book"></i> <span>Laporan Barang Masuk</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>

      <!-- yang hanya bisa diakses admin -->
      @if(Auth::user()->akses == 'admin')
      <li class="treeview">
        <a href="#">
          <i class="fa fa-database"></i> <span>Databases</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('category.index') }}"><i class="fa fa-circle-o"></i>Kategori Barang</a></li>
          <li><a href="{{ route('unit.index') }}"><i class="fa fa-circle-o"></i>Unit</a></li>
          <li><a href="{{ route('agama.index') }}"><i class="fa fa-circle-o"></i> Agama</a></li>
          <li><a href="{{ route('user.index') }}"><i class="fa fa-circle-o"></i> User</a></li>
          <li><a href="{{ route('gender.index') }}"><i class="fa fa-circle-o"></i> Gender</a></li>
        </ul>
      </li>
      @endif

      <li>
        <a href="{{ url('/about') }}">
          <i class="glyphicon glyphicon-info-sign"></i> <span>About</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->

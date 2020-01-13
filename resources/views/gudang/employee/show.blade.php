<!DOCTYPE html>
<html lang="en">

<head>

  @include('templates.head')
  <title>Detail Karyawan</title>

</head>

<body>

  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    @include('templates.sidebar')
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
      @include('templates.header')

      <!-- Main content -->
      <section class="content mt-2">
        <div class="container-fluid">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detail data karyawan ikpp</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div>
                <a href="{{ url('/employee') }}"> <button class="btn btn-primary btn-sm"><i class="#"></i> Kembali</button></a>
              </div><br>

              <h5>{{ $employees->nama_karyawan }} / {{ $employees->sap }}</h5>
              <p>
                Tanggal Masuk Kerja : {{ $employees->tgl_daftar }} <br>
                Telepon {{ $employees->telp }}
              </p>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </section>

    </div>
  </div>
  @include('templates.scripts')
</body>
</html>

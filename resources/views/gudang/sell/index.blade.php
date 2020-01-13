<!DOCTYPE html>
<html lang="en">
<head>
  @include('templates.head')
  <title>Halaman Pengambilan</title>
  <style type="text/css">
    .bawah{
      min-height: 200px
    }
  </style>
</head>

<body>
  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    @include('templates.sidebar')
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
      @include('templates.header')

      <!-- Content Header (Page header) -->
      <section class="content mt-2">
        <div class="container-fluid">
          <h3>Data Pengambilan Barang</h3>
          <hr>
        </div>
      </section>

      <!-- Main content -->
      <section class="content mt-2">
        <div class="container-fluid">

          <div class="row">
            <div class="col-md-4 pl-3 pr-3">
              @include('gudang/validation')
              <form action="{{ route('sell.store') }}" method="post">

                  <div class="form-group">
                    <label>Tanggal</label>
                    <input required="" class="form-control form-control-sm" type="date" name="tgl_sell">
                  </div>

                  <div class="form-group">
                    <label>Pengambil</label>
                    <select class="form-control form-control-sm" name="id_karyawan">
                      <option>- SAPid -</option>
                      @foreach($employees as $employee)
                      <option value="{{$employee->id_karyawan}}">{{$employee->sap}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Nama Barang</label>
                    <select class="form-control form-control-sm" name="id_produk">
                      <option>- Nama barang -</option>
                      @foreach($products as $product)
                      <option value="{{$product->id_produk}}">{{$product->nama_produk}}</option>
                      @endforeach
                    </select>
                    <div style="color: salmon">
                      <small><i>nama barang harus sudah terdaftar di data barang</i></small>
                    </div>
                  </div>


                  <div class="form-group">
                    <label>Jumlah</label>
                    <input class="form-control" type="text" name="qty">
                  </div>

                  <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Tambahkan">
                    {{csrf_field()}}
                  </div>

              </form> 
            </div>

            <div class="col-md-8 pl-3 pr-3">
              <h5 class="box-title">Data Barang yang diambil</h5>
              @include('gudang/notification')
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <?php $no=1; ?>
                  <tr style="background-color: rgb(230, 230, 230);">
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Pengambil</th>
                    <th>Jumlah</th>
                    <th>Action</th>                 
                  </tr>
                </thead>
                <tbody>
                  @foreach($sells as $sell)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $sell->tgl_sell }}</td>
                    <td>{{ $sell->kode_produk }}</td>
                    <td>{{ $sell->nama_produk }}</td>
                    <td>{{ $sell->nama_karyawan }}</td>
                    <td>{{ $sell->qty }}</td>

                    <td>
                      <form action="{{ url('sell')}}/{{$sell->id_sell}}" method="post">
                        {{method_field('delete')}}
                        {{csrf_field()}}
                        <input class="btn btn-danger btn-sm" type="submit" name="submit" value="Cancel">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="DELETE">
                      </form>
                      
                    </td>
                  </tr>
                  @endforeach
                  <tr>
                    
                  </tr>
                </tbody>
              </table>
              <div style="margin-top: 20px">
                <a href="{{ route('sell.update') }}" class="btn btn-success"><i class="glyphicon glyphicon-circle-arrow-right"></i> Selesai</a>
              </div> 
            </div>

          </div>
        </div>
      </section>
      <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
  </div>
  <!-- ./wrapper -->

  @include('templates.scripts')

  <!-- page script -->
  <script>
    $(function () {
      $('#example1').DataTable()
      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      })
    })
  </script>

  @include('templates.modal')
</body>
</html>

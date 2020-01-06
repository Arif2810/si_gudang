<!DOCTYPE html>
<html lang="en">
<head>
  @include('templates.head')
  <title>Barang Masuk</title>
  <style type="text/css">
    .bawah{
      min-height: 300px
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
          <h3>Data Barang Masuk</h3>
          <hr>
        </div>
      </section>

      <!-- Main content -->
      <section class="content mt-2">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-4 pl-3 pr-3">
                @include('gudang/validation')
                <form action="{{ route('purchase.store') }}" method="post">

                  <div class="form-group">
                    <label>Tanggal</label>
                    <input required="" class="form-control form-control-sm" type="date" name="tgl_purchase">
                  </div>

                  <div class="form-group">
                    <label>Nama Barang</label>
                    <select class="form-control form-control-sm" name="id_produk">
                      <option>- Nama barang -</option>
                      @foreach($products as $product)
                      <option value="{{$product->id_produk}}">{{$product->nama_produk}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Jumlah</label>
                    <input class="form-control" type="text" name="qty_purchase">
                  </div>

                  <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Tambahkan">
                    {{csrf_field()}}
                  </div>
 
                </form>
            </div>


            <div class="col-md-8">
              <h5>Data Barang yang masuk</h5>

                @include('gudang/notification')
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <?php $no=1; ?>
                    <tr style="background-color: rgb(230, 230, 230);">
                      <th>No</th>
                      <th>Tanggal Masuk</th>
                      <th>Kode Barang</th>
                      <th>Nama Barang</th>
                      <th>Supplier</th>
                      <th>Jumlah</th>
                      <th>Action</th>                 
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($purchases as $purchase)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $purchase->tgl_purchase }}</td>
                      <td>{{ $purchase->products->kode_produk }}</td>
                      <td>{{ $purchase->products->nama_produk }}</td>
                      <td>{{ $purchase->products->id_supplier }}</td>
                      <td>{{ $purchase->qty_purchase }}</td>

                      <td>
                        <form action="{{ url('purchase')}}/{{$purchase->id_purchase}}" method="post">
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
                  <a href="{{ route('purchase.update') }}" class="btn btn-success"><i class="glyphicon glyphicon-circle-arrow-right"></i> Selesai</a>
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

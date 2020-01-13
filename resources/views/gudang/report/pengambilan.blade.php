<!DOCTYPE html>
<html lang="en">
<head>
  @include('templates.head')
  <title>Laporan Pengambilan</title>
  <style type="text/css">
    @media print{
      .tambah{
        display: none;
      }
      
    }
  </style>
</head>

<body>
  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="tambah">
      @include('templates.sidebar')
      
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
      @include('templates.header')

      <!-- Main content -->
      <section class="content mt-2">
        <div class="container-fluid">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Laporan pengambilan barang</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <?php $no=1; ?>
                  <tr style="background-color: rgb(230, 230, 230);">
                    <th>No</th>
                    <th>Tanggal Pengambilan</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Diambil oleh</th>
                    <th>Keterangan</th>
                    @if(Auth::user()->akses !== 'admin')
                      <th style="display: none;" class="none">Action</th>
                    @else
                      <th class="none">Action</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                  @foreach($sells as $sell)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $sell->tgl_sell }}</td>
                    <td>{{ $sell->products->kode_produk }}</td>
                    <td>{{ $sell->products->nama_produk }}</td>
                    <td>{{ $sell->qty }}</td>
                    <td>{{ $sell->employees->sap }}</td>
                    <td>{{ $sell->products->ket_produk }}</td>
                    @if(Auth::user()->akses !== 'admin')
                    <td style="display: none;" class="none">
                      <button style="display: none;" class="btn btn-danger btn-sm" data-delid={{$sell->id_sell}} data-toggle="modal" data-target="#delete"><i class="glyphicon glyphicon-trash"></i> Hapus</button> 
          					</td>
                    @else
                    <td class="none">
                      <button class="btn btn-danger btn-sm" data-delid={{$sell->id_sell}} data-toggle="modal" data-target="#delete"><i class="glyphicon glyphicon-trash"></i> Hapus</button> 
                    </td>
                    @endif
                  </tr>
                  @endforeach  
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
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

  <!-- modal -->
  <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="background-color: rgb(200, 200, 200)">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span> 
          </button>
          <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
        </div>
        <form action="{{route('report.destroy', 'test')}}" method="post">
          {{method_field('delete')}}
          {{csrf_field()}}
          <div class="modal-body" style="background-color: rgb(230, 230, 230)">
            <p class="text-center">Apakah anda yakin akan menghapus ini?</p>
            <input type="hidden" name="id_sell" id="del_id" value="">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger">Ya, hapus ini</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak, kembali</button>
          </div>
        </form>
      </div>
    </div>  
  </div>

  @include('templates.modal')
</body>
</html>

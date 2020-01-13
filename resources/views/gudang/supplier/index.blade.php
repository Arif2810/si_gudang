<!DOCTYPE html>
<html lang="en">

<head>

  @include('templates.head')
  <title>Seksi Pemasok</title>

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
              <h3 class="box-title">Data Pemasok</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              @include('gudang/notification')
              <div>
                @if(Auth::user()->akses == 'admin')
                <a href="{{ route('supplier.create') }}"> <button class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-plus"></i> Tambah seksi pemasok</button></a>
                @endif
              </div><br>
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <?php $no=1; ?>
                  <tr style="background-color: rgb(230, 230, 230);">
                    <th>No</th>
                    <th>Nama Seksi</th>
                    @if(Auth::user()->akses !== 'admin')
                      <th style="display: none;" class="none">Action</th>
                    @else
                      <th class="none">Action</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                  @foreach($suppliers as $supplier)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $supplier->nama_supplier }}</td>
                      @if(Auth::user()->akses == 'admin')
                    <td>
                      <a href="supplier/{{$supplier->id_supplier}}/edit"><button class="btn btn-warning btn-xs">Edit</button></a>
                      <button class="btn btn-danger btn-xs" data-delid={{$supplier->id_supplier}} data-toggle="modal" data-target="#delete"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
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
        <form action="{{route('supplier.destroy', 'test')}}" method="post">
          {{method_field('delete')}}
          {{csrf_field()}}
          <div class="modal-body" style="background-color: rgb(230, 230, 230)">
            <p class="text-center">Apakah anda yakin akan menghapus ini?</p>
            <input type="hidden" name="id_supplier" id="del_id" value="">
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

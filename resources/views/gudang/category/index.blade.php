<!DOCTYPE html>
<html lang="en">
<head>
  @include('templates.head')
  <title>Halaman Kategori</title>
  <style type="text/css">
    .bawah{
      min-height: 600px;
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

      <!-- Main content -->
      <section class="content mt-2">
        <div class="container-fluid">
          <div class="box" style="padding: 0 30px">
            <div class="box-header">
              <h5 class="box-title">Tambah data kategori</h5>
            </div>
            <div class="box-body">
              @include('gudang/validation')
              <form action="{{ url('/category') }}" method="post">
                <div class="form-group">
                  <label>Kategori</label>
                  <!-- <input class="form-control" type="text" name="nama_kategori"> -->
                  {!!Form::text('nama_kategori', null, ['class'=>'form-control'])!!}
                </div>
                <div class="form-group">
                  <input class="btn btn-primary" type="submit" name="submit" value="Tambahkan">
                  {{csrf_field()}}
                </div>
              </form>
            </div>
          </div>
          <hr>
        </div>
      </section>

      <section class="content mt-2 bawah">
        <div class="container-fluid">
          <div class="box" style="padding: 0 30px">
            <div class="box-header">
              <h3 class="box-title">Data kategori barang</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              @include('gudang/notification')
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <?php $no=1; ?>
                  <tr style="background-color: rgb(230, 230, 230);">
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Action</th>                 
                  </tr>
                </thead>
                <tbody>
                  @foreach($categories as $categories)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $categories->nama_kategori }}</td>
                    <td>
                      <a href="{{ url('category') }}/{{$categories->id_kategori}}/edit"><button class="btn btn-warning btn-xs">Edit</button></a>
                      <button class="btn btn-danger btn-xs" data-delid={{$categories->id_kategori}} data-toggle="modal" data-target="#delete"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
                    </td>
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
        <form action="{{route('category.destroy', 'test')}}" method="post">
          {{method_field('delete')}}
          {{csrf_field()}}
          <div class="modal-body" style="background-color: rgb(230, 230, 230)">
            <p class="text-center">Apakah anda yakin akan menghapus ini?</p>
            <input type="hidden" name="id_kategori" id="del_id" value="">
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

<!DOCTYPE html>
<html lang="en">
<head>
  @include('templates.head')
  <title>Halaman Gender</title>
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
          <div class="box" style="padding: 0 20px">
            <div class="box-header">
              <h5 class="box-title">Tambah data gender karyawan</h5>
            </div>
            <div class="box-body">
              @include('gudang/validation')
              <form action="{{ url('/gender') }}" method="post">
                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <!-- <input class="form-control" type="text" name="nama_agama"> -->
                  {!!Form::text('nama_gender', null, ['class'=>'form-control'])!!}
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
      <section class="content mt-2">
        <div class="container-fluid">
          <div class="box" style="padding: 0 20px">
            <div class="box-header">
              <h3 class="box-title">Data gender karyawan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              @include('gudang/notification')
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <?php $no=1; ?>
                  <tr style="background-color: rgb(230, 230, 230);">
                    <th>No</th>
                    <th>Jenis Kelamin</th>
                    <th>Action</th>                 
                  </tr>
                </thead>
                <tbody>
                  @foreach($genders as $genders)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $genders->nama_gender }}</td>
                    <td>
                      <a href="gender/{{$genders->id_gender}}/edit"><button class="btn btn-warning btn-sm">Edit</button></a>
                      <button class="btn btn-danger btn-sm" data-delid={{$genders->id_gender}} data-toggle="modal" data-target="#delete"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
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
        <form action="{{route('gender.destroy', 'test')}}" method="post">
          {{method_field('delete')}}
          {{csrf_field()}}
          <div class="modal-body" style="background-color: rgb(230, 230, 230)">
            <p class="text-center">Apakah anda yakin akan menghapus ini?</p>
            <input type="hidden" name="id_gender" id="del_id" value="">
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

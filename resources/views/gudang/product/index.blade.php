<!DOCTYPE html>
<html lang="en">

<head>
  @include('templates.head')
  <title>Halaman Data Barang</title>
  <style type="text/css">
    section{
      min-height: 500px;
    }

    section img{
      width: 50px;
    }
    @media print{
      .print{
        display: none;
      }
    }
  </style>
</head>

<body>
  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="print">
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
              <h3 class="box-title">Data barang di gudang</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              @include('gudang/notification')
              <div style="margin-bottom: 10px;" class="print">
                @if(Auth::user()->akses == 'admin')
                <a href="{{ route('product.create') }}"> <button class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-plus"></i> Tambah data barang</button></a>
                @endif
              </div>

              <div style="margin-bottom: 10px;" class="print">
                <form class="form-inline" action="{{ route('product.index') }}" method="get">
                  <div class="form-group">
                    <input type="text" name="cari" class="form-control" placeholder="nama barang...">
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Cari</button>
                  </div>
                </form>
              </div>
              
              <table class="table table-bordered table-hover">
                <thead>
                  <?php $no=1; ?>
                  <tr style="background-color: rgb(230, 230, 230);">
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Foto</th>
                    <th>Stok</th>
                    <th class="print">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($products as $product)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $product->kode_produk }}</td>
                    <td>{{ $product->nama_produk }}</td>
                    <td>{{ $product->categories->nama_kategori }}</td>
                    <td><img src="{{asset('image/'.$product->image)}}" alt="gambar"></td>
                    <td>{{ $product->stok_produk }}</td>
                    <td class="print">
                      <a href="product/{{$product->id_produk}}/show"><button class="btn btn-primary btn-sm">Detail</button></a>
                      @if(Auth::user()->akses == 'admin')
                        <a href="product/{{$product->id_produk}}/edit"><button class="btn btn-warning btn-sm">Edit</button></a>
                        <button class="btn btn-danger btn-sm" data-delid={{$product->id_produk}} data-toggle="modal" data-target="#delete"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
                      @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

              <div class="print">
                <ul class="pagination">
                  {{ $products->links() }}
                </ul>
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

  <!-- modal -->
  <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="background-color: rgb(200, 200, 200)">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
        </div>
        <form action="{{route('product.destroy', 'test')}}" method="post">
          {{method_field('delete')}}
          {{csrf_field()}}
          <div class="modal-body" style="background-color: rgb(230, 230, 230)">
            <p class="text-center">Apakah anda yakin akan menghapus ini?</p>
            <input type="hidden" name="id_produk" id="del_id" value="">
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

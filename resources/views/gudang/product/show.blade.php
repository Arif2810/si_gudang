<!DOCTYPE html>
<html lang="en">

<head>
  @include('templates.head')
  <title>Detail Barang</title>
  <style type="text/css">
    section{
      min-height: 1000px;
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
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Detail data barang</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div>
              <a href="{{ url('/product') }}"> <button class="btn btn-primary btn-sm"><i class="#"></i> Kembali</button></a>
            </div><br>
            <div class="card" style="width: 22rem;">
              <img class="card-img-top" src="{{asset('image/'.$products->image)}}" style="width: 100%;margin-bottom: 10px;">
              <div class="card-body">
                <p class="card-text"><b>{{ $products->kode_produk }} / {{ $products->nama_produk }}</b><br>
                  {{ $products->categories->nama_kategori }}<br>
                  Supplier : <b>{{ $products->suppliers->nama_supplier }}</b><br>
                  stok : {{ $products->stok_produk }} {{ $products->units->nama_unit }}<br>
                  lokasi : {{ $products->lokasi }}<br>
                  Keterangan : {{ $products->ket_produk }}
                </p>
              </div>
            </div>
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
</body>
</html>

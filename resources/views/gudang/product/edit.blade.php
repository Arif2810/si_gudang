<!DOCTYPE html>
<html lang="en">

<head>
  @include('templates.head')
  <title>Edit Barang</title>
  <style type="text/css">
  	section img{
  		width: 30%;
  		padding-bottom: 10px;
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
			              <h5 class="box-title">Edit data barang</h5>
			            </div>
			            <div class="box-body">
			            	@include('gudang/validation')
			            	{!! Form::model($products,['route'=>['product.update',$products->id_produk],'method'=>'PUT', 'enctype'=>'multipart/form-data']) !!}

			            	<div class="row">
		            			<div class="col-md-6 pl-3 pr-3">
				            		<div class="form-group">
										<label>Kode Barang</label>
										<input class="form-control" type="text" name="kode_produk" value="{{ $products->kode_produk }}">
									</div>
									<div class="form-group">
										<label>Nama Barang</label>
										<input class="form-control" type="text" name="nama_produk" value="{{ $products->nama_produk }}">
									</div>
									<div class="form-group">
										<label>Kategori Barang</label>
										{{ Form::select('id_kategori', \App\Category::pluck('nama_kategori', 'id_kategori'), NULL, ['class'=>'form-control']) }}
									</div><br>
									<div class="form-group">
										<label>Supplier</label>
										{{ Form::select('id_supplier', \App\Supplier::pluck('nama_supplier', 'id_supplier'), NULL, ['class'=>'form-control']) }}
									</div><br>
									<div class="form-group">
										<label>Foto Barang</label><br>
										<img src="{{asset('image/'.$products->image)}}" alt="gambar">
										<input type="file" name="image" value="{{ $products->image }}" class="form-control">
									</div>
		            			</div>
		            			<div class="col-md-6 pl-3 pr-3">
									<div class="form-group">
										<label>Stok Barang</label>
										<input class="form-control" type="number" name="stok_produk" value="{{ $products->stok_produk }}">
									</div><br>
									<div class="form-group">
										<label>Satuan Barang</label>
										{{ Form::select('id_unit', \App\Unit::pluck('nama_unit', 'id_unit'), NULL, ['class'=>'form-control']) }}
									</div>
									<div class="form-group">
										<label>Lokasi</label>
										<input class="form-control" type="text" name="lokasi" value="{{ $products->lokasi }}">
									</div>
									<div class="form-group">
										<label>Keterangan</label>
										<textarea class="form-control" type="text" name="ket_produk" rows="4">{{ $products->ket_produk }}</textarea>
									</div>
									<div class="form-group">
										<input class="btn btn-primary btn-sm" type="submit" name="submit" value="Simpan">
										<input type="reset" class="btn btn-danger btn-sm" value="Reset">
										{{csrf_field()}}
										<input type="hidden" name="_method" value="PUT">
									</div>	
		            			</div>
		            		</div>
			            </div>
        			</div>
	        	</div>
	        </section>
		</div>
		<!-- /.content-wrapper -->
	</div>
	@include('templates.scripts')
</body>
</html>

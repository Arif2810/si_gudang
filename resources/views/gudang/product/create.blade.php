<!DOCTYPE html>
<html lang="en">

<head>

  @include('templates.head')
  <title>Tambah Barang</title>

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
	            			<div class="box-header">
				              <h5 class="box-title">Tambah data barang gudang</h5>
				            </div>
				            <div class="box-body">
				            	@include('gudang/validation')
				            	@include('gudang/notification')
				            	<form action="{{ url('/product') }}" method="post" enctype="multipart/form-data">
				            		<div class="row">
				            			<div class="col-md-6 pl-3 pr-3">
				            				<div class="form-group">
												<label>Kode Barang</label>
												<input required="" class="form-control" type="text" name="kode_produk">
											</div>
											<div class="form-group">
												<label>Nama Produk</label>
												<input required="" class="form-control" type="text" name="nama_produk">
											</div>
											<div class="form-group">
												<label>Kategori</label>
												<select class="form-control" name="id_kategori">
													<option>- Kategori Produk -</option>
													@foreach($categories as $category)
													<option value="{{$category->id_kategori}}">{{$category->nama_kategori}}</option>
													@endforeach
												</select>
											</div>
											<div class="form-group">
												<label>Supplier</label>
												<select class="form-control" name="id_supplier">
													<option>- Supplier -</option>
													@foreach($suppliers as $supplier)
													<option value="{{$supplier->id_supplier}}">{{$supplier->nama_supplier}}</option>
													@endforeach
												</select>
											</div>
											<div class="form-group">
												<label>Foto Barang</label>
									            <input type="file" name="image" value="" class="form-control">
								            </div>
				            			</div>
				            			<div class="col-md-6 pl-3 pr-3">
											<div class="form-group">
												<label>Stok</label>
												<input required="" class="form-control" type="number" name="stok_produk">
											</div>
											<div class="form-group">
												<label>Satuan</label>
												<select class="form-control" name="id_unit">
													<option>-- Satuan Produk --</option>
													@foreach($units as $unit)
													<option value="{{ $unit->id_unit }}">{{ $unit->nama_unit }}</option>
													@endforeach
												</select>
											</div>
											<div class="form-group">
												<label>Lokasi Barang</label>
												<input required="" class="form-control" type="text" name="lokasi">
											</div>
											<div class="form-group">
												<label>Keterangan</label>
												<textarea class="form-control" type="text" name="ket_produk" rows="4" placeholder="Masukkan keterangan ..."></textarea>
												<!-- <input required="" class="form-control" type="text" name="stok_produk"> -->
											</div>
											<div>
												<input class="btn btn-primary" type="submit" name="submit" value="Tambahkan">
												{{csrf_field()}}
												<input type="reset" class="btn btn-danger" value="Reset">
											</div>	
				            			</div>
				            		</div>
				            	</form>
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

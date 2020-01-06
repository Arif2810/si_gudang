<!DOCTYPE html>
<html lang="en">

<head>

  @include('templates.head')
  <title>Tambah Karyawan</title>

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
				              <h5 class="box-title">Tambah data supplier</h5>
				            </div>
				            <div class="box-body">
				            	@include('gudang/validation')
				            	@include('gudang/notification')
				            	<form action="{{ url('/supplier') }}" method="post">
									<div>
										<label>Nama Supplier</label>
										<input required="" class="form-control" type="text" name="nama_supplier">
									</div><br>
									<div>
										<label>Kontak Person</label>
										<input required="" class="form-control" type="text" name="cp">
									</div><br>
									<div>
										<label>Nomor Telepon</label>
										<input required="" class="form-control" type="text" name="telp_supplier">
									</div><br>
									<div>
										<label>Alamat</label>
										<textarea class="form-control" type="text" name="alamat_supplier" cols="80" rows="3"></textarea>
									</div><br><br>
									<div>
										<input class="btn btn-primary" type="submit" name="submit" value="Tambahkan">
										{{csrf_field()}}
										<input type="reset" class="btn btn-danger" value="Reset">
									</div>
				            	</form>
				            </div>
	            		</div>
	        		</div>

	        	</div>
	        </section>
	        <!-- end Main content -->

		</div>
		<!-- /.content-wrapper -->

	</div>
	@include('templates.scripts')
</body>
</html>

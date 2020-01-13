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
			              <h5 class="box-title">Tambah data karyawan PT. IKPP</h5>
			            </div>
			            <div class="box-body">
			            	@include('gudang/validation')
			            	@include('gudang/notification')
			            	<form action="{{ url('/employee') }}" method="post">
			            		<div class="row">
			            			<div class="col-md-6 pl-4 pr-4">
			            				<div class="form-group">
											<label>SAPid</label>
											<input required="" class="form-control" type="text" name="sap">
										</div>
										<div class="form-group">
											<label>Nama</label>
											<input required="" class="form-control" type="text" name="nama_karyawan">
										</div>
			            			</div>
			            			<div class="col-md-6 pl-4 pr-4">
			            				<div class="form-group">
											<label>Tanggal Masuk</label>
											<input required="" class="form-control" type="date" name="tgl_daftar" value="<?=date('Y-m-d')?>">
										</div>
										<div class="form-group">
											<label>No Telepon</label>
											<input class="form-control" type="text" name="telp">
										</div>
										<div class="form-group">
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
	        </section>

	</div>
@include('templates.scripts')
</body>
</html>

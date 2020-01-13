<!DOCTYPE html>
<html lang="en">

<head>

  @include('templates.head')
  <title>Edit Karyawan</title>

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
			              <h5 class="box-title">Edit data karyawan pt. ikpp</h5>
			            </div>
			            <div class="box-body">
			            	@include('gudang/validation')
			            	{!! Form::model($employees,['route'=>['employee.update',$employees->id_karyawan],'method'=>'PUT']) !!}

			            	<div class="row">
		            			<div class="col-md-6 pl-4 pr-4">
		            				<div class="form-group">
										<label>SAP</label>
										<input class="form-control" type="text" name="sap" value="{{ $employees->sap }}">
									</div>
									<div class="form-group">
										<label>Nama</label>
										<input class="form-control" type="text" name="nama_karyawan" value="{{ $employees->nama_karyawan }}">
									</div>
		            			</div>

		            			<div class="col-md-6 pl-4 pr-4">
		            				<div class="form-group">
										<label>Tanggal Daftar</label>
										<input class="form-control" type="date" name="tgl_daftar" value="{{ $employees->tgl_daftar }}">
									</div>
									<div class="form-group">
										<label>No Telepon</label>
										<input class="form-control" type="text" name="telp" value="{{ $employees->telp }}">
									</div>
									<div class="form-group">
										<input class="btn btn-primary" type="submit" name="submit" value="Simpan">
										<input type="reset" class="btn btn-danger" value="Reset">
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
	</div>	
@include('templates.scripts')
</body>
</html>

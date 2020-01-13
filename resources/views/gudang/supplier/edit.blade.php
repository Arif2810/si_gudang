<!DOCTYPE html>
<html lang="en">

<head>

  @include('templates.head')
  <title>Edit Supplier</title>

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
				              <h5 class="box-title">Edit data supplier</h5>
				            </div>
				            <div class="box-body">
				            	@include('gudang/validation')
				            	{!! Form::model($suppliers,['route'=>['supplier.update',$suppliers->id_supplier],'method'=>'PUT']) !!}
								<div class="form-group">
									<label>Nama Supplier</label>
									<input class="form-control" type="text" name="nama_supplier" value="{{ $suppliers->nama_supplier }}">
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
	        </section>

		</div>
		<!-- /.content-wrapper -->

	</div>
	@include('templates.scripts')
</body>
</html>

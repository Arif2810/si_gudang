<!DOCTYPE html>
<html lang="en">
<head>
  @include('templates.head')
  <title>Edit Satuan</title>
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
			              <h5 class="box-title">Edit data satuan</h5>
			            </div>
			            <div class="box-body">
			            	@include('gudang/validation')
			            	@include('gudang/notification')
			            	<form action="{{ url('/unit') }}/{{ $units->id_unit }}" method="post">
			            		<div>
									<label>Satuan</label>
									<input class="form-control" type="text" name="nama_unit" value="{{ $units->nama_unit }}">
								</div><br><br>								
								<div>
									<input class="btn btn-primary" type="submit" name="submit" value="Simpan">
									<input type="reset" class="btn btn-danger" value="Reset">
									{{csrf_field()}}
									<input type="hidden" name="_method" value="PUT">
								</div>
			            	</form>
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
<!DOCTYPE html>
<html lang="en">
<head>
  @include('templates.head')
  <title>Edit Gender</title>
  <style type="text/css">
    .bawah{
      min-height: 600px;
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
			              <h5 class="box-title">Edit data jenis kelamin</h5>
			            </div>
			            <div class="box-body">
			            	@include('gudang/validation')
			            	@include('gudang/notification')
			            	<form action="{{ url('/gender')}}/{{ $genders->id_gender }}" method="post">
			            		<div class="form-group">
									<label>Jenis Kelamin</label>
									<input class="form-control" type="text" name="nama_gender" value="{{ $genders->nama_gender }}">
								</div>							
								<div class="form-group">
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
	</div>
	@include('templates.scripts')
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  @include('templates.head')
  <title>Pengaturan User</title>
  <style type="text/css">
  	section{
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
			              <h5 class="box-title">Setting user</h5>
			              <hr>
			            </div>
			            <div class="box-body">
			            	@if(session('result') == 'success')
			            	<div class="alert alert-info" role="alert">
			            		Data Berhasil di update
			            	</div>
			            	@elseif(session('result') == 'fail')
			            	<div class="alert alert-danger" role="alert">
			            		Data gagal di update !
			            	</div>
			            	@endif
			            	<form action="{{ route('user.setting') }}" method="post">
								<div class="form-group">
									<label>Nama</label>
									<input class="form-control" type="text" name="name" value="{{ old('name', $users->name) }}" required="">
								</div>
								<div class="form-group">
									<label>Username</label>
									@if(Auth::user()->akses !== 'admin')
										<h4 style="font-style:italic;color:salmon;"><strong>{{$users->username}}</strong></h4>
										<input class="form-control" type="hidden" name="username" value="{{ old('username', $users->username) }}" required="">
									@else
										<input class="form-control" type="text" name="username" value="{{ old('username', $users->username) }}" required="">
									@endif
								</div>
								<div class="form-group">
									<label>Email</label>
									<input class="form-control" type="email" name="email" value="{{ old('email', $users->email) }}" required="">
								</div>
								<div class="form-group">
									<label>Password</label>
									<input class="form-control" type="password" name="password">
									<div class="form-text text-muted">
										<small>kosongkan password apabila tidak diubah</small>
									</div>
								</div>
								<div class="form-group">
									<label>Ulangi Password</label>
									<input class="form-control" type="password" name="repassword">
								</div>
								<div class="form-group">
									<input class="btn btn-primary" type="submit" name="submit" value="Simpan">
									<input type="reset" class="btn btn-danger" value="Reset">
									{{csrf_field()}}
									<!-- <input type="hidden" name="_method" value="PUT"> -->
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

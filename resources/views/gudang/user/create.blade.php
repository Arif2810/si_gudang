<!DOCTYPE html>
<html lang="en">
<head>
  @include('templates.head')
  <title>Tambah User</title>
  <style type="text/css">
  	section{
  		min-height: 800px;
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
			              <h5 class="box-title">Tambah data user</h5>
			            </div>
			            <div class="box-body">
			            	@include('gudang/validation')
			            	@include('gudang/notification')
			            	<form action="{{ url('/user') }}" method="post">
			            		<div class="form-group">
									<label>Nama</label>
									<input required="" class="form-control{{ $errors->has('name') ? ' has-error' : '' }}" type="text" name="name" value="{{ old('name') }}">
									@if ($errors->has('name'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('name') }}</strong>
	                                    </span>
	                                @endif
								</div>
								<div class="form-group">
									<label>Username</label>
									<input required="" class="form-control{{ $errors->has('username') ? ' has-error' : '' }}" type="text" name="username" value="{{ old('username') }}">
									@if ($errors->has('username'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('username') }}</strong>
	                                    </span>
	                                @endif
								</div>
								<div class="form-group">
									<label>Email</label>
									<input required="" class="form-control{{ $errors->has('email') ? ' has-error' : '' }}" type="email" name="email" value="{{ old('email') }}">
									@if ($errors->has('email'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('email') }}</strong>
	                                    </span>
	                                @endif
								</div>
								<div class="form-group">
									<label>Password</label>
									<input required="" class="form-control{{ $errors->has('password') ? ' has-error' : '' }}" type="password" name="password">
									@if ($errors->has('password'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('password') }}</strong>
	                                    </span>
	                                @endif
								</div>
								<div class="form-group">
									<label>Ulangi Password</label>
									<input required="" class="form-control{{ $errors->has('repassword') ? ' has-error' : '' }}" type="password" name="repassword">
									@if ($errors->has('repassword'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('repassword') }}</strong>
	                                    </span>
	                                @endif
								</div>
								<div class="form-group">
									<?php
										$val = old('akses'); 
									?>
									<label>Hak akses</label>
									<select class="form-control{{ $errors->has('akses') ? ' has-error' : '' }}" name="akses" required="">
										<option value=""{{ $val==""?'selected':'' }}>-- Pilih hak akses sebagai : --</option>
										<option value="operator" {{ $val=="operator"?'selected':'' }}>Operator</option>
										<option value="admin" {{ $val=="admin"?'selected':'' }}>Administrator</option>
									</select>
									@if ($errors->has('akses'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('akses') }}</strong>
	                                    </span>
	                                @endif
									<!-- <input required="" class="form-control" type="password" name="password"> -->
								</div><br>
								<div>
									<input class="btn btn-primary" type="submit" name="submit" value="Tambahkan">
									{{csrf_field()}}
									<input type="reset" class="btn btn-danger" value="Reset">
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
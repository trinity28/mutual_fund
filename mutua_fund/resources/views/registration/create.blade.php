@extends('layouts/master')
@section('content')
	<div class="col-sm-8 blog-main">

  		<h1>Register </h1>
  		 <form method='POST' action="/register">
  		{{ csrf_field()}}

		  <div class="form-group">
		    <label for="name">Name</label>
		    <input type="text" class="form-control" id="name" name='name' >
		  </div>

		  <div class="form-group">
			   <label for="email">Email</label>
			   <input type="email "id='email' name='email' class='form-control'>


		  </div>

		   <div class="form-group">
			   <label for="password">Password</label>
			   <input type="password" id='password' name='password' class='form-control'>


		  </div>

		 <div class="form-group">
			   <label for="password_confirmation">Confirm Password</label>
			   <input type="password" id='password_confirmation' name='password_confirmation' class='form-control'>


		  </div>


		  <button type="submit" class="btn btn-primary">Submit</button>
		  

		</form>
		<div>
		@include('layouts.errors')
		</div>

  	</div>
 	
@endsection
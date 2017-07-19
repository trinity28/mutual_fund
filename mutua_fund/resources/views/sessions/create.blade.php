@extends('layouts/master')
@section('content')
	<div class="col-sm-8 blog-main">

  		<h1>Sign In </h1>
  		 <form method='POST' method="/login">
  		{{ csrf_field()}}

		
		  <div class="form-group">
			   <label for="email">Email</label>
			   <input type="email "id='email' name='email' class='form-control'>


		  </div>

		   <div class="form-group">
			   <label for="password">Password</label>
			   <input type="password" id='password' name='password' class='form-control'>


		  </div>



		  <button type="submit" class="btn btn-primary">Submit</button>
		  

		</form>
		<div>
		@include('layouts.errors')
		</div>

  	</div>
 	
@endsection
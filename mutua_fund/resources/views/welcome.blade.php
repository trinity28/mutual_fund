@extends('layouts/master')
@section('content')

         <form method='POST' method="/">
        {{ csrf_field()}}

        
          <div class="form-group">
               <label for="keyword">Search</label>
               <input type="text" id='keyword' name='keyword' class='form-control'>


          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
          

        </form>
        <br />
  <form method='POST' method="/">
        {{ csrf_field()}}

          <div class="form-group">
            <label for="code">scheme code</label>
            <input type="text" class="form-control" id="code" name='code' >
          </div>

          <div class="form-group">
               <label for="bnav">Buy nav</label>
               <input type="text" id='bnav' name='bnav' class='form-control'>


          </div>

          <div class="form-group">
               <label for="invest">Invested amount</label>
               <input type="text" id='invest' name='invest' class='form-control'>


          </div>

    
          <button type="submit" class="btn btn-primary">Submit</button>
          </form>
@endsection
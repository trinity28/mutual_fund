@extends('layouts/master')
@section('content')
<div class="container">
 
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Fund</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
       
        <div class="modal-body">
          <form method='POST' action="/investment">
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
         
        </div>
        <div class="modal-footer">
           <button type="submit" class="btn btn-primary">Submit</button>
        </div>
         </form>
      </div>
      
    </div>
  </div>
   <form class="navbar-form navbar-left" method='POST' action="/detail">
    {{ csrf_field()}}

      <div class="form-group">
        <input type="text" id='code' name='code' class='form-control' placeholder='enter scheme code to find details'>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    
</div>
 <h2>Your Investments:-</h2>
<table class="table table-bordered">
         <thead>
      <tr>
        <th>Scheme_Code</th>
        <th>buy_nav</th>
        <th>investment amount</th>
        <th>current_nav</th>
        <th>current_value</th>
      </tr>
    </thead>
       @foreach($posts as $post)
    <tbody>
   
      <tr>
        <td>{{ $post->scheme_id }} </td>
        <td>{{ $post->buy_nav }}</td>
        <td>{{ $post->invest_amnt }}</td>
        <td>{{ $post->current_nav }}</td>
        <td>{{ $post->current_value }}</td>
      </tr>
    </tbody>
     @endforeach
  </table>
        



       












  
@endsection
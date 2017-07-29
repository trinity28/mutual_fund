@extends('layouts/master')
@section('content')

 
 <h2>Your History:-</h2>
<table class="table table-bordered" id="example">
         <thead>
      <tr>
        <th>Scheme_Code</th>
        <th>buy_nav</th>
        <th>investment amount</th>
       
        <th>final_value</th>
         <th>Status</th>
      </tr>
    </thead>
       @foreach($funds as $post)
    <tbody>
   
      <tr>
        <td>{{ $post->scheme_id }} </td>
        <td>{{ $post->buy_nav }}</td>
        <td>{{ $post->invest_amnt }}</td>
       
        <td>{{ $post->final_value }}</td>
           <td>Closed</td>
      
                   
      </tr>
    </tbody>
     @endforeach
  </table>
     <script type="text/javascript">
     $(document).ready(function() {
    $('#example').DataTable();
} );   </script>



       












  
@endsection
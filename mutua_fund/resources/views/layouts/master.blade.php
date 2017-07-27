
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
         <link href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href=" //maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
       

  </head>

  <body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Mutual Fund App</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
       @if(Auth::check())
         <form  class="navbar-form navbar-left" role="search" method='POST' action="/">
        {{ csrf_field()}}

        
          <div class="form-group">
           <input type="text" class="form-control" id='keyword' name='keyword' placeholder="Search">
          </div>

          <button type="submit" class="btn btn-default">
              <span class="glyphicon glyphicon-search"></span>
          </button>
                

        </form>
           <a class="navbar-text" href="#">Welcome {{Auth::user()->name}}</a>
           <a class="navbar-text" href="/logout">logout</a>

           @else
            <a class="navbar-text" href="/login" style ="color:white">Login</a>
           <a class="navbar-text" href="/register" style ="color:white">Register</a>
          @endif
    </ul>
     
  </div>

</nav>

   

    <div class="container">

      <div class="row">

       @yield('content')


       

        </div><!-- /.blog-main -->
     
    </div><!-- /.container -->

       <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
  </body>
</html>

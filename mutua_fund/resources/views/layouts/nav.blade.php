   <div class="blog-masthead">
      <div class="container">
        <nav class="nav blog-nav">
         

          @if(Auth::check())
           <a class="nav-link ml-auto" href="#">{{Auth::user()->name}}</a>
           <a class="nav-link" href="/logout">logout</a>

             <form  class="navbar-form navbar-left" role="search" method='POST' action="/">
        {{ csrf_field()}}

        
          <div class="form-group">
           <input type="text" class="form-control" id='keyword' name='keyword' >
          </div>

          <button type="submit" class="btn btn-default">
              <span class="glyphicon glyphicon-search"></span>
          </button>
                

        </form>
           @else
            <a  href="/login">Login</a>
           <a  href="/register">Register</a>
          @endif
        </nav>
      </div>
    </div>
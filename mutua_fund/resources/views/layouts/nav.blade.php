   <div class="blog-masthead">
      <div class="container">
        <nav class="nav blog-nav">
         

          @if(Auth::check())
           <a class="nav-link ml-auto" href="#">{{Auth::user()->name}}</a>
           <a class="nav-link" href="/logout">logout</a>
           @else
            <a class="nav-link" href="/login">login</a>
           <a class="nav-link" href="/register">register</a>
          @endif
        </nav>
      </div>
    </div>
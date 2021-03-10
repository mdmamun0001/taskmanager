<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-light">
  <div class="container">


    <a class="navbar-brand" href="">
      <img src="" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
      <ul class="navbar-nav ml-auto">
        
        @guest
          <li><a class="nav-link" style="color:black;" href="{{ route('login') }}">Login</a></li>
          <li><a class="nav-link" style="color:black;" href="{{ route('register') }}">Register</a></li>
        @else
          <li class="nav-item dropdown">
            <a style="color:black;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              
              {{ Auth::user()->name}}
              <span class="caret"></span>
            </a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown">

              <a class="dropdown-item" href="">
                My dashboard
              </a>

              <a class="dropdown-item" href=""
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              
              Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        </li>
      @endguest
    </ul>

  </div>
</div>
</nav>
<!-- End Navbar Part -->

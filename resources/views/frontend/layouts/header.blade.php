<header class="navigation fixed-top">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-white">
      <a class="navbar-brand order-1" href="index.html">
        <img class="img-fluid" width="100px" src="{{ url('public/frontend/images/logo.png')}}"
          alt="Reader | Hugo Personal Blog Template">
      </a>
      <div class="collapse navbar-collapse text-center order-lg-2 order-3" id="navigation">
        
        <ul class="navbar-nav mx-auto">

          <li class="nav-item">
            <a class="nav-link" href="{{url('/')}}">Home</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">Category <i class="ti-angle-down ml-1"></i>
            </a>
            <div class="dropdown-menu">
              
              <a class="dropdown-item" href="#">Learning</a>
              
              <a class="dropdown-item" href="#">Technical</a>

              <a class="dropdown-item" href="#">Motivational</a>

              <a class="dropdown-item" href="#">Sports</a>
              
              
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">About Us</a>
          </li>


          <li class="nav-item">
            <a class="nav-link" href="#">Contact Us</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Privacy Policy</a>
          </li>
 

        </ul>
      </div>

      <div class="order-2 order-lg-3 d-flex align-items-center">


       
          <div class="nav-item">
              <a class="btn btn-primary" href="{{url('login')}}">Log In</a>
              <a class="btn btn-primary" href="{{url('register')}}">Register</a>
            </div>
      
        <!-- search -->
        <!-- <form class="search-bar">
          <input id="search-query" name="s" type="search" placeholder="Type &amp; Hit Enter...">
        </form>
        
        <button class="navbar-toggler border-0 order-1" type="button" data-toggle="collapse" data-target="#navigation">
          <i class="ti-menu"></i>
        </button> -->
      </div>

    </nav>
  </div>
</header>
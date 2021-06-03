<div class="menu">
  <nav class="navbar navigation">
    <div class="container">
      <!-- *** Navbar Links *** -->
      <div id="navbar" class="navbar-collapse collapse text-center">
        <ul class="nav navbar-nav">


          <!-- *** Shop Starts *** -->
          <li class="dropdown ">
            <a href="{{ url('shop') }}">Shop</a>
          </li>
          <!-- *** Shop Ends *** -->


          <!-- *** Home Starts *** -->
          <li class="dropdown ">
            <a href="{{ url('/') }}">Home</a>
          </li>
          <!-- *** Home Ends *** -->


          <!-- *** About Starts *** -->
          <li class="dropdown ">
            <a href="{{ url('about') }}">About</a>
          </li>
          <!-- *** About Ends *** -->


          <!-- *** Contact Starts *** -->
          <li class="dropdown ">
            <a href="{{ url('contact') }}">Contact</a>
          </li>
          <!-- *** Contact Ends *** -->


        </ul>
      </div>
    </div>
  </nav>
</div>

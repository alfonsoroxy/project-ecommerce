<main>
  <!-- *** Top Header Bar Starts *** -->
    <div class="top-header">
      <div class="container">
        <div class="row">
          <div class="col-md-1 col-xs-12 col-sm-1">
            <!-- *** Company Logo *** -->
            <div class="logo text-center">
              <a href="{{ url('/') }}">
                <!-- *** Replace Company Logo Here *** -->
                <svg width="135px" height="29px" viewBox="0 0 155 29" version="1.1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink">
                  <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" font-size="40"
                  font-family="AustinBold, Austin" font-weight="bold">
                    <g id="Group" transform="translate(-108.000000, -297.000000)" fill="#000000">
                      <text id="AVIATO">
                        <tspan x="108.94" y="325">LOGO</tspan>
                      </text>
                    </g>
                  </g>
                </svg>
              </a>
            </div>
          </div>


          <div class="col-md-11 col-xs-12 col-sm-11">
            <ul class="top-menu text-right list-inline">
              <!-- *** Cart Start *** -->
              <li class="dropdown cart-nav dropdown-slide">
                <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i class="tf-ion-android-cart"></i>Cart
                  <span>({{Cart::count()}})</span>
                </a>
                <div class="dropdown-menu cart-dropdown">
                  <!-- Cart Item -->
                  @foreach (Cart::content() as $item)
                  <div class="media">
                    <a class="pull-left" href="#!">
                      <img class="media-object" src="{{ asset('frontend/images/shop/products') }}/{{$item->model->image}}.jpg" alt="{{$item->model->name}}" />
                    </a>
                    <div class="media-body">
                      <h4 class="media-heading"><a href="{{ route('product.details', ['slug' => $item->model->slug])}}">{{$item->model->name}}</a></h4>
                      <div class="cart-price">
                        <span>{{$item->qty}}x : ₱.{{$item->subtotal}}</span>
                      </div>
                    </div>
                    <div class="remove">
                      <a href="#!" wire:click.prevent="destroy('{{$item->rowId }}')"><i class="tf-ion-close"></i></a>
                  </div>

                  </div><!-- / Cart Item -->
                  @endforeach
                  <div class="cart-summary">
                    <span>Subtotal</span>
                    <span class="total-price">{{Cart::subtotal()}}</span>
                  </div>
                  <ul class="text-center cart-buttons">
                    <li><a href="{{ url('cart') }}" class="btn btn-small">View Cart</a></li>
                    <li><a href="#" wire:click.prevent="checkout" class="btn btn-small">Checkout</a></li>
                  </ul>
                </div>
              <!-- *** Cart Ends *** -->
              </li>


              <!-- *** Login Authentication Starts *** -->
              @if(Route::has('login'))
                @auth
                  <!-- *** Admin *** -->
                  @if(Auth::user()->utype === 'ADM')
                    <li class="dropdown search dropdown-slide text-right list-inline">
                      <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                        <i class="tf-ion-android-person"></i> {{Auth::user()->name}}
                        <i class="tf-ion-ios-arrow-down"></i></a>
                      <ul class="dropdown-menu search-dropdown">
                        <li>
                          <li class="text-center list-inline"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        </li>
                        <li class="text-center list-inline">
                          <a title="Categories" href="{{ route('admin.categories') }}">Categories</a>
                        </li>
                        <li class="text-center list-inline">
                          <a title="Products" href="{{ route('admin.products') }}">Products</a>
                        </li>
                        <li class="text-center list-inline">
                          <a title="All Orders" href="{{ route('admin.orders') }}">All Orders</a>
                        </li>
                        <li class="text-center list-inline"><a href="{{ route('logout') }}"
                          onclick="event.preventDefault(); document.getElementById('logout-form')
                          .submit();">Logout</a>
                        </li>
                        <form id="logout-form" method="post" action="{{ ('logout') }}">
                          @csrf
                        </form>
                      </ul>
                    </li>


                  <!-- *** Customer *** -->
                  @else
                  <li class="dropdown search dropdown-slide text-right list-inline">
                    <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                      <i class="tf-ion-android-person"></i> {{Auth::user()->name}}
                      <i class="tf-ion-ios-arrow-down"></i></a>
                    <ul class="dropdown-menu search-dropdown">
                      <li class="text-center list-inline">
                        <a title="Dashboard" href="{{ route('user.dashboard') }}">Dashboard</a>
                      </li>
                      <li class="text-center list-inline">
                        <a title="My Orders" href="{{ route('user.orders') }}">My Orders</a>
                      </li>
                      <li class="text-center list-inline"><a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form')
                        .submit();">Logout</a>
                      </li>
                      <form id="logout-form" method="post" action="{{ ('logout') }}">
                        @csrf
                      </form>
                    </ul>
                  </li>
                  @endif
                @else
                  <li><a href="{{ route('login') }}">Log In</a></li>
                  <li><a href="{{ route('register') }}">Sign In</a></li>
                @endif
              @endif
              <!-- *** Login Authentication Ends *** -->


            </ul>
          </div>
          <!-- *** Cart Ends *** -->
        </div>
      </div>
    </div>
  <!-- *** Top Header Bar Ends *** -->

  <!-- *** Navigation Bar *** -->
  @include('partials.navbar')
  <h2 class="mt-40"><center>Where You Can Find Us</center></h2>
  <p><center>CONNECT WITH THE INFLAMMATE</center></p>
  <div class="page-wrapper">
    @if(Session::has('message'))
    <center><div class="alert alert-success" role="alert">
      <i class="tf-ion-checkmark-circled"></i><span> {{Session::get('message')}} </span>
    </div></center>
    @endif
  	<div class="contact-section">
  		<div class="container">
  			<div class="row">
  				<!-- Contact Form -->
  				<div class="contact-form col-md-6 " >
  					<form id="contact-form" wire:submit.prevent="addContact">
              @csrf

  						<div class="form-group">
  							<input type="text" placeholder="Name" class="form-control" name="contact_name" id="name" wire:model="contact_name">
                @error('contact_name') <span class="text-danger">{{$message}}</span> @enderror
  						</div>

  						<div class="form-group">
  							<input type="email" placeholder="Email" class="form-control" name="contact_email" id="email" wire:model="contact_email">
                @error('contact_email') <span class="text-danger">{{$message}}</span> @enderror
  						</div>

  						<div class="form-group">
  							<input type="number" placeholder="Contact Number" class="form-control" name="contact_number" id="subject" wire:model="contact_number">
                @error('contact_number') <span class="text-danger">{{$message}}</span> @enderror
  						</div>

  						<div class="form-group">
  							<textarea rows="6" placeholder="Message" class="form-control" name="contact_message" id="message" wire:model="contact_message"></textarea>
                @error('contact_message') <span class="text-danger">{{$message}}</span> @enderror
  						</div>

  						<div id="cf-submit">
  							<input name="submit" type="submit" id="contact-submit" class="btn btn-transparent" value="Submit">
  						</div>

  					</form>
  				</div>
  				<!-- ./End Contact Form -->

  				<!-- Contact Details -->
  				<div class="contact-details col-md-6 " >
  					<div class="google-map">
  						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15440.251578642647!2d121.07321007810665!3d14.652371186310999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b9de72a12fe9%3A0x10dd168aaa998be3!2sPansol%2C%20Quezon%20City%2C%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1622543380364!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
  					</div>
  					<ul class="contact-short-info" >
  						<li>
  							<i class="tf-ion-ios-home"></i>
  							<span>Pansol, Quezon City</span>
  						</li>
  						<li>
  							<i class="tf-ion-android-phone-portrait"></i>
  							<span>Phone: +63-9770119610</span>
  						</li>
  						<li>
  							<i class="tf-ion-android-mail"></i>
  							<span>Email: inflammate007@gmail.com</span>
  						</li>
  					</ul>
  					<!-- Footer Social Links -->
  					<div class="social-icon">
  						<ul>
  							<li><a class="fb-icon" href="https://www.facebook.com/themefisher"><i class="tf-ion-social-facebook"></i></a></li>
  							<li><a href="https://www.twitter.com/themefisher"><i class="tf-ion-social-twitter"></i></a></li>
  							<li><a href="https://themefisher.com/"><i class="tf-ion-social-dribbble-outline"></i></a></li>
  							<li><a href="https://themefisher.com/"><i class="tf-ion-social-googleplus-outline"></i></a></li>
  							<li><a href="https://themefisher.com/"><i class="tf-ion-social-pinterest-outline"></i></a></li>
  						</ul>
  					</div>
  					<!--/. End Footer Social Links -->
  				</div>
  				<!-- / End Contact Details -->

  			</div> <!-- end row -->
  		</div> <!-- end container -->
  	</div>
  </div>
</main>

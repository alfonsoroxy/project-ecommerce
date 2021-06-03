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

  <!-- *** Main Banner Starts *** -->
  <div class="hero-slider">
    <div class="slider-item th-fullpage hero-area" style="background-image: url(frontend/images/slider/slider-1.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 text-center">
            <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">The beauty of nature <br> is hidden in details.</h1>
            <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">VIEW OUR PRODUCTS</p>
            <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn" href="{{ url('shop') }}">Shop Now</a>
          </div>
        </div>
      </div>
    </div>
    <div class="slider-item th-fullpage hero-area" style="background-image: url(frontend/images/slider/slider-3.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 text-left">
            <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">Nature always wears the <br> color of the spirit.</h1>
            <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">VIEW OUR PRODUCTS</p>
            <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn" href="{{ url('shop') }}">Shop Now</a>
          </div>
        </div>
      </div>
    </div>
    <div class="slider-item th-fullpage hero-area" style="background-image: url(frontend/images/slider/slider-2.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 text-right">
            <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">The most beautiful things <br> are always hidden.</h1>
            <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">VIEW OUR PRODUCTS</p>
            <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn" href="{{ url('shop') }}">Shop Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- *** Main Banner Ends *** -->

  <!-- *** Featured Products Starts *** -->
  <div class="products section bg-gray">
  	<div class="container">
  		<div class="row">
  			<div class="title text-center">
  				<h2>Featured Products</h2>
  			</div>
  		</div>
      <!-- *** Product Item *** -->
  		<div class="row">
        @foreach($fproducts as $fproduct)
  			<div class="col-md-4">
  				<div class="product-item">
  					<div class="product-thumb">
  						<!-- <span class="bage">Sale</span> -->
  						<img class="img-responsive" src="{{ asset('frontend/images/shop/products') }}/{{$fproduct->image}}.jpg" alt="{{ $fproduct->name }}" />
  						<div class="preview-meta">
  							<ul>
  								<li>
  									<span  data-toggle="modal" data-target="#product-modal">
  										<i class="tf-ion-ios-search-strong"></i>
  									</span>
  								</li>
  								<li>
                    <a href="#">
                      <i class="tf-ion-ios-heart"></i>
                    </a>
  								</li>
                  <li>
                    <a href="#" wire:click.prevent="store({{$fproduct->id}}, '{{$fproduct->name}}', {{$fproduct->regular_price}})">
                      <i class="tf-ion-android-cart"></i>
                    </a>
                  </li>
  							</ul>
              </div>
  					</div>
  					<div class="product-content">
  						<h4><a href="{{ route('product.details', ['slug' => $fproduct->slug]) }}">{{ $fproduct->name }}</a></h4>
  						<p class="price">P. {{ $fproduct->regular_price }}</p>
  					</div>
  				</div>
  			</div>
        @endforeach

  		  <!-- *** Modal Starts *** -->
        @foreach($fproducts as $fproduct)
    		<div class="modal product-modal fade" id="product-modal">
  			 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  				 <i class="tf-ion-close"></i>
  			 </button>
  		   <div class="modal-dialog " role="document">
  		    <div class="modal-content">
  			    <div class="modal-body">
  			     	<div class="row">
  			        <div class="col-md-8 col-sm-6 col-xs-12">
  			        	<div class="modal-image">
  				        	<img class="img-responsive" src="{{ asset('frontend/images/shop/products') }}/{{ $fproduct->image }}.jpg" alt="product-img" />
  			        	</div>
  			        </div>
  			        <div class="col-md-4 col-sm-6 col-xs-12">
  			        	<div class="product-short-details">
  			        		<h2 class="product-title">{{ $fproduct->name }}</h2>
  			        		<p class="product-price">P. {{ $fproduct->regular_price }}</p>
  			        		<p class="product-short-description">{{ $fproduct->short_description }}</p>
  			        		<a href="#" wire:click.prevent="store({{$fproduct->id}}, '{{$fproduct->name}}', {{$fproduct->regular_price}})" class="btn btn-main">Add To Cart</a>
  			        		<a href="{{ route('product.details', ['slug' => $fproduct->slug]) }}" class="btn btn-transparent">View Product Details</a>
  			        	</div>
  			        </div>
  			      </div>
  			    </div>
  		    </div>
  		  </div>
  		</div>
      @endforeach
      <!-- *** Modal Ends *** -->
    </div>

   </div>
  </div>
  <!-- *** Featured Products Ends *** -->


  <!-- *** Newsfeed on Instagram*** -->
  <div class="section instagram-feed">
  	<div class="container">
  		<div class="row">
  			<div class="title">
  				<h2>View us on Instagram</h2>
  			</div>
  		</div>
  		<div class="row">
  			<div class="col-12">
  				<div class="instagram-slider" id="instafeed" data-accessToken="IGQVJYeUk4YWNIY1h4OWZANeS1wRHZARdjJ5QmdueXN2RFR6NF9iYUtfcGp1NmpxZA3RTbnU1MXpDNVBHTzZAMOFlxcGlkVHBKdjhqSnUybERhNWdQSE5hVmtXT013MEhOQVJJRGJBRURn"></div>
  			</div>
  		</div>
  	</div>
  </div>
</main>

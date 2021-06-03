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

  <!-- *** breadcrumb *** -->
  <div class="single-product">
  	<div class="container">
  		<div class="row">
  			<div class="col-md-12">
  				<ol class="breadcrumb">
  					<li><a href="{{ url('/') }}">Home</a></li>
  					<li><a href="{{ url('shop') }}">Shop</a></li>
  					<li class="active">{{$product->name}}</li>
  				</ol>
  			</div>

      <!-- *** Image Starts *** -->
  		<div class="row mt-20">
  			<div class="col-md-5">
  				<div class="single-product-slider">
  					<div class='item active'>
              <img class="img-responsive" src="{{ asset('frontend/images/shop/products') }}/{{$product->image}}.jpg" alt="{{$product->name}}" />
  					</div>
  				</div>
  			</div>

        <!-- *** Product Description Starts *** -->
  			<div class="col-md-7">
  				<div class="single-product-details">
            <!-- *** Product Name *** -->
            <div>
  					  <h2>{{$product->name}}</h2>
            </div>

            <!-- *** Product Price *** -->
            <div>
  					  <p class="product-price">₱.{{$product->regular_price}}</p>
            </div>

            <!-- *** Product Short Description *** -->
            <div>
  					  <p class="product-description mt-20">{!! $product->short_description !!}</p>
            </div>

            <!-- *** Product Availability *** -->
            <div class="product-quantity">
  						<span>Availability: </span><i>{{$product->stock_status}}</i>
  					</div>

            <!-- *** Product Category *** -->
            <!-- <div class="product-category">
  						<span>Categories:</span>
  						<ul>
                <li><a href="#"></a></li>
  						</ul>
  					</div> -->

  					<a href="#" wire:click.prevent="store({{$product->id}}, '{{$product->name}}', {{$product->regular_price}})" class="btn btn-main mt-20">Add To Cart</a>
  				</div>
  			</div>
  		</div>

      <!-- *** Details Start *** -->
  		<div class="row">
  			<div class="col-xs-12">
  				<div class="tabCommon mt-20">
  					<ul class="nav nav-tabs">
  						<li class="active"><a data-toggle="tab" href="#details" aria-expanded="true">Details</a></li>
  						<!-- <li class=""><a data-toggle="tab" href="#reviews" aria-expanded="false">Reviews</a></li> -->
  					</ul>
  					<div class="tab-content patternbg">
              <!-- *** Product Details *** -->
  						<div id="details" class="tab-pane fade active in">
  							<h4>Product Description</h4>
  							<p>{!! $product->description !!}</p>
              </div>
              <!-- *** Product Description Ends *** -->


  						<!-- <div id="reviews" class="tab-pane fade">
  				      <div class="post-comments">
  						    <ul class="media-list comments-list m-bot-50 clearlist">
  								  <li class="media">
  								    <a class="pull-left" href="#!">
  								      <img class="media-object comment-avatar" src="{{ asset('frontend/images/blog/avater-1.jpg') }}" alt="" width="50" height="50" />
  								    </a>
  								    <div class="media-body">
  								      <div class="comment-info">
  								        <h4 class="comment-author">
  								          <a href="#!">Jonathon Andrew</a>
                          </h4>
  								        <time datetime="2013-04-06T13:53">July 02, 2015, at 11:34</time>
  								        <a class="comment-button" href="#!"><i class="tf-ion-chatbubbles"></i>Reply</a>
  								      </div>
  								      <p>
  								        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at magna ut ante eleifend eleifend.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod laborum minima, reprehenderit laboriosam officiis praesentium? Impedit minus provident assumenda quae.
  								      </p>
  								    </div>
  								  </li>
  							  </ul>
  							</div>
  						</div> -->

  					</div>
  					<div class="products related-products section">
  						<div class="container">
  							<div class="row">
  								<div class="title text-center">
  									<h2>Related Products</h2>
  								</div>
  							</div>
  							@foreach ($related_products as $r_product)
      					<div class="col-sm-4">
      						<div class="product-item">
      							<div class="product-thumb">
      								<img class="img-responsive" src="{{ asset('frontend/images/shop/single-products') }}/{{$r_product->image}}.jpg" alt="{{$r_product->name}}" />
      								<div class="preview-meta">
      									<ul>
      										<li>
      											<a href="{{ route('product.details', ['slug' => $r_product->slug]) }}">
      												<i class="tf-ion-ios-search-strong"></i>
      											</a>
      										</li>
      										<li>
                            <a href="#">
      												<i class="tf-ion-ios-heart"></i>
      											</a>
      										</li>
      										<li>
      											<a href="#!"><i class="tf-ion-android-cart"></i></a>
      										</li>
      									</ul>
      								</div>
      							</div>
      							<div class="product-content">
      								<h4><a href="{{ route('product.details', ['slug' => $r_product->slug]) }}">{{$r_product->name}}</a></h4>
      								<p class="price">{{$r_product->regular_price}}</p>
      							</div>
      						</div>
      					</div>
      					@endforeach
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
         <!-- *** Details End *** -->
    		</div>
    	</div>
    </div>
  </div>
</main>

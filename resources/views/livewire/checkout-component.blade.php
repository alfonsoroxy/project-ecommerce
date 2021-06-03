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

	<!-- *** breadcrumb *** -->
	<div class="page-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="content">
						<h1 class="page-name">Checkout</h1>
						<ol class="breadcrumb">
							<li><a href="{{ url('/') }}">Home</a></li>
							<li class="active">Checkout</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="page-wrapper">
		<form wire:submit.prevent="placeOrder">
		@csrf
	   <div class="checkout shopping">
	      <div class="container">
	         <div class="row">
						 	<!-- *** Billing Details Start *** -->
	            <div class="col-md-8">
	               <div class="block billing-details">
	                  <h4 class="widget-title">Billing Details</h4>
	                  <div class="checkout-form">
											<div class="checkout-country-code clearfix">
												 <div class="form-group">
														<label for="user_post_code">First Name</label>
														<input type="text"class="form-control" name="zipcode" value="" wire:model="firstname">
														@error('firstname') <p class="text-danger">{{ $message }}</p> @enderror
												 </div>
												 <div class="form-group" >
														<label for="user_city">Last Name</label>
														<input type="text" class="form-control" name="city" value="" wire:model="lastname">
														@error('lastname') <p class="text-danger">{{ $message }}</p> @enderror
												 </div>
											</div>
											<div class="checkout-country-code clearfix">
												 <div class="form-group">
														<label for="user_post_code">Zip Code</label>
														<input type="number" class="form-control" name="zipcode" wire:model="zipcode" value="">
														@error('zipcode') <p class="text-danger">{{ $message }}</p> @enderror
												 </div>
												 <div class="form-group" >
														<label for="user_city">Phone Number</label>
														<input type="number" class="form-control" name="city" wire:model="mobile" value="">
														@error('mobile') <p class="text-danger">{{ $message }}</p> @enderror
												 </div>
											</div>
											<div class="form-group">
												 <label for="user_address">Street and Apartment# 1</label>
												 <input type="text" class="form-control" placeholder="" wire:model="line1">
												 @error('line1') <p class="text-danger">{{ $message }}</p> @enderror
											</div>
											<div class="form-group">
												 <label for="user_address">Street and Apartment# 2</label>
												 <input type="text" class="form-control" placeholder="" wire:model="line2">
												 @error('line2') <p class="text-danger">{{ $message }}</p> @enderror
											</div>
											<div class="form-group">
												 <label for="user_address">Email Address</label>
												 <input type="text" class="form-control" placeholder="" wire:model="email">
												 @error('email') <p class="text-danger">{{ $message }}</p> @enderror
											</div>
											<div class="form-group">
												 <label for="user_address">Province</label>
												 <input type="text" class="form-control" placeholder="" wire:model="province">
												 @error('province') <p class="text-danger">{{ $message }}</p> @enderror
											</div>
	                     <div class="checkout-country-code clearfix">
	                        <div class="form-group">
	                           <label for="user_post_code">Country</label>
	                           <input type="text" class="form-control" name="zipcode" wire:model="country" value="">
														 @error('country') <p class="text-danger">{{ $message }}</p> @enderror
	                        </div>
	                        <div class="form-group" >
	                           <label for="user_city">City</label>
	                           <input type="text" class="form-control" name="city" wire:model="city" value="">
														 @error('city') <p class="text-danger">{{ $message }}</p> @enderror
	                        </div>
	                     </div>
											 <div class="form-control" >
												 <label><input value="1" type="checkbox" wire:model="ship_to_different">
													<span>Ship to different address</span>
												</label>
											 </div>
	                  </div>
	               </div>
	            </div>
							<!-- *** Billing Details End *** -->

							<!-- *** Order Summary *** -->
							<div class="col-md-4">
							   <div class="product-checkout-details">
							      <div class="block">
							         <h4 class="widget-title">Order Summary</h4>
							         @foreach (Cart::content() as $item)
							         <div class="media product-card">
							            <a class="pull-left" href="{{ route('product.details', ['slug' => $item->model->slug])}}">
							               <img class="media-object" src="{{ asset('frontend/images/shop/products') }}/{{$item->model->image}}.jpg" alt="{{$item->model->name}}" />
							            </a>
							            <div class="media-body">
							               <h4 class="media-heading"><a href="{{ route('product.details', ['slug' => $item->model->slug])}}">{{$item->model->name}}</a></h4>
							               <p class="price">{{$item->qty}}x: ₱.{{$item->subtotal}}</p>
							               <a class="product-remove text-danger" href="#!" wire:click.prevent="destroy('{{$item->rowId }}')">Remove</a>
							            </div>
							         </div>
							         @endforeach
											 <!-- *** For Coupons *** -->
							         <!-- <div class="discount-code">
							            <p>Have a discount ? <a data-toggle="modal" data-target="#coupon-modal" href="#!">enter it here</a></p>
							         </div> -->
							         <ul class="summary-prices">
							            <li>
							               <span>Subtotal:</span>
							               <span class="price">{{Cart::subtotal()}}</span>
							            </li>
							            <li>
							               <span>Tax:</span>
							               <span class="price">{{Cart::tax()}}</span>
							            </li>
							            <li>
							               <span>Shipping:</span>
							               <span>Free</span>
							            </li>
							         </ul>
							         <div class="summary-total">
							            <span>Total</span>
							            <span>₱.{{Cart::total()}}</span>
							         </div>
							         <div class="verified-icon">
							            <img src="{{ asset('frontend/images/shop/verified.png') }}">
							         </div>
							      </div>
							   </div>
							</div>
	         </div>

					 <!-- *** Ship to Different Address Start *** -->
					 @if($ship_to_different)
					 <div class="row">
						<div class="col-md-12">
							<div class="block billing-details">
								 <h4 class="widget-title">Shipping Details</h4>
								 <div class="checkout-form">
									 <div class="checkout-country-code clearfix">
											<div class="form-group">
												 <label for="user_post_code">First Name</label>
												 <input type="text"class="form-control" name="zipcode" value="" wire:model="s_firstname">
												 @error('s_firstname') <p class="text-danger">{{ $message }}</p> @enderror
											</div>
											<div class="form-group" >
												 <label for="user_city">Last Name</label>
												 <input type="text" class="form-control" name="city" value="" wire:model="s_lastname">
													@error('s_lastname') <p class="text-danger">{{ $message }}</p> @enderror
											</div>
									 </div>
									 <div class="checkout-country-code clearfix">
											<div class="form-group">
												 <label for="user_post_code">Zip Code</label>
												 <input type="number" class="form-control" name="zipcode" wire:model="s_zipcode" value="">
												 @error('s_zipcode') <p class="text-danger">{{ $message }}</p> @enderror
											</div>
											<div class="form-group" >
												 <label for="user_city">Phone Number</label>
												 <input type="number" class="form-control" name="city" wire:model="s_mobile" value="">
													@error('s_mobile') <p class="text-danger">{{ $message }}</p> @enderror
											</div>
									 </div>
									 <div class="form-group">
											<label for="user_address">Street and Apartment# 1</label>
											<input type="text" class="form-control" placeholder="" wire:model="s_line1">
											@error('s_line1') <p class="text-danger">{{ $message }}</p> @enderror
									 </div>
									 <div class="form-group">
											<label for="user_address">Street and Apartment# 2</label>
											<input type="text" class="form-control" placeholder="" wire:model="s_line2">
											@error('s_line2') <p class="text-danger">{{ $message }}</p> @enderror
									 </div>
									 <div class="form-group">
											<label for="user_address">Email Address</label>
											<input type="text" class="form-control" placeholder="" wire:model="s_email">
											@error('s_email') <p class="text-danger">{{ $message }}</p> @enderror
									 </div>
									 <div class="form-group">
											<label for="user_address">Province</label>
											<input type="text" class="form-control" placeholder="" wire:model="s_province">
											@error('s_province') <p class="text-danger">{{ $message }}</p> @enderror
									 </div>
										<div class="checkout-country-code clearfix">
											 <div class="form-group">
													<label for="user_post_code">Country</label>
													<input type="text" class="form-control" name="zipcode" wire:model="s_country" value="">
													@error('s_country') <p class="text-danger">{{ $message }}</p> @enderror
											 </div>
											 <div class="form-group" >
													<label for="user_city">City</label>
													<input type="text" class="form-control" name="city" wire:model="s_city" value="">
													@error('s_city') <p class="text-danger">{{ $message }}</p> @enderror
											 </div>
										</div>
								 </div>
							</div>
						</div>
					</div>
					@endif
					<!-- *** Ship to Different Address End *** -->

					<!-- *** Payment Method Start *** -->
					 <div class="row">
						 <div class="col-md-6">
								<div class="product-checkout-details">
									 <div class="block">
											<h4 class="widget-title">Payment Method</h4>

											<!-- *** Debit / Credit Card *** -->
											@if($paymentmode == 'card')
											<div class="block billing-details">
											@if(Session::has('stripe_error'))
												<div class="alert alert-danger" role="alert">{{ Session::get('stripe_error') }}</div>
											@endif
												<div class="form-group">
													 <label for="card-no">Card Number</label>
													 <input type="text" name="card-no" class="form-control" placeholder="•••• •••• •••• ••••" wire:model="card_no">
													 @error('card_no') <p class="text-danger">{{ $message }}</p> @enderror
												</div>

												<div class="form-group">
													 <label for="exp-month">Expiry Month</label>
													 <input type="text" name="exp-month" class="form-control" placeholder="MM" wire:model="exp_month">
													 @error('exp_month') <p class="text-danger">{{ $message }}</p> @enderror
												</div>

												<div class="form-group">
													 <label for="exp-year">Expiry Year</label>
													 <input type="text" name="exp-year" class="form-control" placeholder="YYYY" wire:model="exp_year">
													 @error('exp_year') <p class="text-danger">{{ $message }}</p> @enderror
												</div>

												<div class="form-group">
													 <label for="cvc">CVC</label>
													 <input type="password" name="cvc" class="form-control" placeholder="CVC" wire:model="cvc">
													 @error('cvc') <p class="text-danger">{{ $message }}</p> @enderror
												</div>
											</div>
											@endif


											<div class="media product-card">
												<label class="form-control">
													<input name="payment-method" value="cod" type="radio" wire:model="paymentmode">
													<span>Cash on Delivery</span>
												</label>
												<label class="form-control">
													<input name="payment-method" id="payment-method-visa" value="card" type="radio" wire:model="paymentmode">
													<span>Debit / Credit Card</span>
												</label>
												<label class="form-control">
													<input name="payment-method" id="payment-method-paypal" value="paypal" type="radio" wire:model="paymentmode">
													<span>Paypal</span>
												</label>
												@error('paymentmode') <p class="text-danger">{{ $message }}</p> @enderror
											</div>
									 </div>
									 <div class="summary-total">
											<span>Total</span>
											@if(Session::has('checkout'))
											<span>₱.{{Session::get('checkout') ['total']}}</span>
											@endif
									 </div>
									 <button type="submit" class="btn btn-main mt-20">Place Order</button>
								</div>
						 </div>

							<div class="col-md-6">
								 <div class="product-checkout-details">
										<div class="block">
											 <h4 class="widget-title">Shipping Method</h4>
											 	<p class=""><span class="title">Flat Rate</span></p>
 												<p class=""><span class="title">Fixed ₱.0.00</span></p>
											 <div class="media product-card">
												 <div class="discount-code">
														<p>Have a discount ? <a data-toggle="modal" data-target="#coupon-modal" href="#!">enter it here</a></p>
												 </div>
											 </div>
										</div>
								 </div>
							</div>
						</div>
						<!-- *** Payment Method End *** -->

					</div>
	      </div>
			</form>
	  </div>

	   <!-- Modal For Coupons -->
	   <div class="modal fade" id="coupon-modal" tabindex="-1" role="dialog">
	      <div class="modal-dialog" role="document">
	         <div class="modal-content">
	            <div class="modal-body">
	               <form>
	                  <div class="form-group">
	                     <input class="form-control" type="text" placeholder="Enter Coupon Code">
	                  </div>
	                  <button type="submit" class="btn btn-main">Apply Coupon</button>
	               </form>
	            </div>
	         </div>
	      </div>
	   </div>

</main>

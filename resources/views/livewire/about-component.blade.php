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


  <!-- *** About Section Start *** -->
  <div class="about section">
  	<div class="container">
  		<div class="row">
  			<div class="col-md-6">
  				<img class="img-responsive" src="{{ asset('frontend/images/about/about.jpg') }}">
  			</div>
  			<div class="col-md-6">
  				<h2 class="mt-40">About Our Shop</h2>
  				<p>The company called Inflammate is one of a new rising clothing line businesses in the <strong>Pansol, Quezon City</strong>. it was established on <strong><time datetime="2021-02-21">February 21, 2021</time></strong> during the pandemic by <strong>Raine Dayan</strong>. with his kindhearted personality, Dayan is started to plan a small clothing line just to <strong>help the people in their community</strong> and they also <strong>saved half of their profit from the clothing line every two months just for the charity</strong>.</p>
  				<p>The company name is based on the  latin words, <strong>Ite Inflammate Omnia</strong>. It means <strong>“Go Forth and Set the World on Fire”</strong>. these words are commonly associated with <strong>St. Ignatius of Loyola, the founder of Society of Jesuits</strong>.</p>
  				<p>They are motivated to continue this business clothing because they think of the <strong>children who are in the period of hunger</strong>, especially in this pandemic where scarcity is around. </p>
  			</div>
  		</div>

      <div class="row">
        <div class="col-md-6">
  				<h2 class="mt-40">Our Mission</h2>
          <p>Our mission is to create a clothing business that can offer superior design, quality and value to the consumer.</p>
          <p>We will accomplish this by being committed to offering great service and real value to our business partners and consumers.</p>
          <p>We will provide a pleasant, fair and diverse environment.</p>
  			</div>
        <div class="col-md-6 mt-40">
  				<img class="img-responsive" src="{{ asset('frontend/images/about/mission.jpg') }}">
  			</div>
  		</div>

      <div class="row">
        <div class="col-md-6 mt-40">
  				<img class="img-responsive" src="{{ asset('frontend/images/about/vision.jpg') }}">
  			</div>
        <div class="col-md-6">
  				<h2 class="mt-40">Our Vision</h2>
  				<p>In align with our services and businesses to have a social and environmental conscience to help and build a better future for all.</p>
  				<p>To maximize the access for childrens and customers to necessary support in their aspiration in life.</p>
  				<p>To increase our impact every year and postitively change more lives by providing designs with an opportunities for people to live happier, healthier and safer life.</p>
          <a href="{{ url('contact') }}" class="btn btn-main mt-20">Contact Us</a>
  			</div>
  		</div>

  	</div>
  </div>
  <!-- *** About Section End *** -->

  <!-- *** Testimonial Start *** -->
  <div class="title">
    <h2>Testimonials</h2>
  </div>
  <div class="hero-slider">
    <div class="slider-item th-fullpage hero-area" style="background-image: url(frontend/images/testimonial/slider.jpg);">
      <div class="team-members ">
        <div class="container">
          <div class="row">
            <div class="col-md-3">
      				<div class="team-member text-center">
                <div class="product-item">
                  <div class="product-thumb">
                    <img class="img-responsive" src="{{ asset('frontend/images/team/team-1.jpg') }}" alt="Dayan" />
                    <div class="preview-meta">
                      <ul>
                        <li>
                          <a href="{{ url('https://www.facebook.com/alfonsoroxy') }}"><i class="tf-ion-social-facebook"></i></a>
                        </li>
                        <li>
                          <a title="johndoe@gmail.com" href="#!"><i class="tf-ion-social-googleplus"></i></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
      					<p class="h4">Raine Dayan</p>
      					<p >Founder</p>
      				</div>
      			</div>

            <div class="col-md-3">
      				<div class="team-member text-center">
                <div class="product-item">
                  <div class="product-thumb">
                    <img class="img-responsive" src="{{ asset('frontend/images/team/team-2.jpg') }}" alt="Quides" />
                    <div class="preview-meta">
                      <ul>
                        <li>
                          <a href="{{ url('https://www.facebook.com/profile.php?id=100000481414570') }}"><i class="tf-ion-social-facebook"></i></a>
                        </li>
                        <li>
                          <a title="reyquides_02@yahoo.com" href="#!"><i class="tf-ion-social-yahoo"></i></a>
                        </li>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <p class="h4">Rey Vincent Quides</p>
      					<p>Editor</p>
      				</div>
      			</div>

            <div class="col-md-3">
              <div class="team-member text-center">
                <div class="product-item">
                  <div class="product-thumb">
                    <img class="img-responsive" src="{{ asset('frontend/images/team/team-3.jpg') }}" alt="Sagun" />
                    <div class="preview-meta">
                      <ul>
                        <li>
                          <a href="{{ url('https://www.facebook.com/ayelle.sagun') }}"><i class="tf-ion-social-facebook"></i></a>
                        </li>
                        <li>
                          <a title="ayellejeremy@yahoo.com"href="#!"><i class="tf-ion-social-googleplus"></i></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <p class="h4">Ayelle Sagun</p>
                <p>Researcher</p>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="slider-item th-fullpage hero-area" style="background-image: url(frontend/images/testimonial/slider.jpg);">
      <div class="team-members ">
        <div class="container">
          <div class="row">

            <div class="col-md-3">
      				<div class="team-member text-center">
                <div class="product-item">
                  <div class="product-thumb">
                    <img class="img-responsive" src="{{ asset('frontend/images/team/team-4.jpg') }}" alt="Alfonso" />
                    <div class="preview-meta">
                      <ul>
                        <li>
                          <a href="{{ url('https://www.facebook.com/alfonsoroxy') }}"><i class="tf-ion-social-facebook"></i></a>
                        </li>
                        <li>
                          <a title="alfonsoroxy06@gmail.com" href="#!"><i class="tf-ion-social-googleplus"></i></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <p class="h4">Roxy Alfonso</p>
      					<p>Developer</p>
      				</div>
      			</div>

            <div class="col-md-3">
      				<div class="team-member text-center">
                <div class="product-item">
                  <div class="product-thumb">
                    <img class="img-responsive" src="{{ asset('frontend/images/team/team-5.jpg') }}" alt="Buenafe" />
                    <div class="preview-meta">
                      <ul>
                        <li>
                          <a href="{{ url('https://www.facebook.com/mico.s.buenafe') }}"><i class="tf-ion-social-facebook"></i></a>
                        </li>
                        <li>
                          <a title="micobuenafe1515@gmail.com" href="#!"><i class="tf-ion-social-googleplus"></i></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <p class="h4">Mico Santos Buenafe</p>
      					<p>Researcher</p>
      				</div>
      			</div>

            <div class="col-md-3">
      				<div class="team-member text-center">
                <div class="product-item">
                  <div class="product-thumb">
                    <img class="img-responsive" src="{{ asset('frontend/images/team/team-6.jpg') }}" alt="Binalayo" />
                    <div class="preview-meta">
                      <ul>
                        <li>
                          <a href="{{ url('https://www.facebook.com/allyssa.1989') }}"><i class="tf-ion-social-facebook"></i></a>
                        </li>
                        <li>
                          <a title="allyssa.1989@yahoo.com" href="#!"><i class="tf-ion-social-yahoo"></i></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <p class="h4">Allysa Binalayo</p>
      					<p>Researcher</p>
      				</div>
      			</div>

          </div>
        </div>
      </div>
    </div>

    <div class="slider-item th-fullpage hero-area" style="background-image: url(frontend/images/testimonial/slider.jpg);">
      <div class="team-members ">
        <div class="container">
          <div class="row">

            <div class="col-md-3">
      				<div class="team-member text-center">
                <div class="product-item">
                  <div class="product-thumb">
                    <img class="img-responsive" src="{{ asset('frontend/images/team/team-7.jpg') }}" alt="Sevilla" />
                    <div class="preview-meta">
                      <ul>
                        <li>
                          <a href="{{ url('https://www.facebook.com/christian.sevilla.144') }}"><i class="tf-ion-social-facebook"></i></a>
                        </li>
                        <li>
                          <a title="christianebuensevilla@gmail.com" href="#!"><i class="tf-ion-social-googleplus"></i></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <p class="h4">Christian Sevilla</p>
      					<p>Editor</p>
      				</div>
      			</div>

            <div class="col-md-3">
      				<div class="team-member text-center">
                <div class="product-item">
                  <div class="product-thumb">
                    <img class="img-responsive" src="{{ asset('frontend/images/team/team-8.jpg') }}" alt="Engay" />
                    <div class="preview-meta">
                      <ul>
                        <li>
                          <a href="{{ url('https://www.facebook.com/dorritoo') }}"><i class="tf-ion-social-facebook"></i></a>
                        </li>
                        <li>
                          <a title="engaymarcbryan@gmail.com" href="#!"><i class="tf-ion-social-googleplus"></i></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <p class="h4">Marc Bryan Engay</p>
      					<p>Researcher</p>
      				</div>
      			</div>

            <div class="col-md-3">
      				<div class="team-member text-center">
                <div class="product-item">
                  <div class="product-thumb">
                    <img class="img-responsive" src="{{ asset('frontend/images/team/team-9.jpg') }}" alt="Molina" />
                    <div class="preview-meta">
                      <ul>
                        <li>
                          <a href="{{ url('https://www.facebook.com/mervel.molina') }}"><i class="tf-ion-social-facebook"></i></a>
                        </li>
                        <li>
                          <a title="mervel_molina@yahoo.com" href="#"><i class="tf-ion-social-yahoo"></i></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <p class="h4">Mervel Molina</p>
      					<p>Editor</p>
      				</div>
      			</div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- *** Testimonial End *** -->


  <!-- <div class="section video-testimonial bg-1 overly-white text-center mt-50">
  	<div class="container">
  		<div class="row">
  			<div class="col-md-12">
  				<h2>Video presentation</h2>
  				<a class="play-icon" href="https://www.youtube.com/watch?v=oyEuk8j8imI&amp;rel=0" data-toggle="lightbox">
  					<i class="tf-ion-ios-play"></i>
  				</a>
  			</div>
  		</div>
  	</div>
  </div> -->
</main>

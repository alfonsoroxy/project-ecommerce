<main>
  <div>
    <!-- *** breadcrumb *** -->
    <div class="page-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="content">
              <h1 class="page-name">Admin Order Details</h1>
              <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('admin/orders') }}">All Orders</a></li>
                <li class="active">Order Details</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>

    <style>
    nav svg {
      height: 20px;
    }
    nav .hidden {
      display: block !important;
    }
  </style>

    <div class="container" style="padding: 30px 0;">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="row">
                <div class="col-md-6">
                    Order Details
                </div>
                <div class="col-md-6">
                  <a href="{{ route('admin.orders') }}" class="btn btn-success pull-right">All Orders</a>
                </div>
              </div>
            </div>
            <div class="panel-body">
              <table class="table">
                <tr>
                  <th>Order ID</th>
                  <td>{{$order->id}}</td>
                  <th>Order Date</th>
                  <td>{{$order->created_at}}</td>
                  <th>Status</th>
                  <td>{{$order->status}}</td>
                  @if($order->status == 'delivered')
                  <th>Delivery Date</th>
                  <td>{{$order->delivered_date}}</td>

                  @elseif($order->status == 'canceled')
                  <th>Cancellation Date</th>
                  <td>{{$order->canceled_date}}</td>

                  @endif
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="row">
                <div class="col-md-6">
                    Ordered Items
                </div>
                <div class="col-md-6">

                </div>
              </div>
            </div>
            <div class="panel-body">
          	  <div class="cart shopping">
          	    <div class="container">
          	      <div class="row">
          	        <div class="col-md-8 col-md-offset-2">
          	          <div class="block">
          	            <div class="product-list">
          	              <form>
          	                <table class="table">
          	                  <thead>
          	                    <tr>
          	                      <th class="">Name Item</th>
          	                      <th class="">Price Item</th>
          												<th class="">Quantity</th>
          												<th class="">Subtotal</th>
          	                    </tr>
          	                  </thead>
          	                  <tbody>
          											@foreach ($order->orderItems as $item)
          											<!-- *** Item name and Image *** -->
          											<tr class="">
          	                      <td class="">
          	                        <div class="product-info">
          														<a href="{{ route('product.details', ['slug' => $item->product->slug])}}">
          	                          <img width="80" src="{{ asset('frontend/images/shop/products') }}/{{$item->product->image}}.jpg" alt="{{$item->product->name}}" />
          	                          <span>{{$item->product->name}}</span></a>
          	                        </div>
          	                      </td>
          												<!-- *** Price Item *** -->
          	                      <td class="">₱.{{$item->price}}
          												</td>
          												<!-- *** Quantity *** -->
          												<td class="">
                                    <div class="">
                                      <h5>{{$item->quantity}}</h5>
                                    </div>
          												</td>
          												<!--	*** Subtotal *** -->
          												<td class="">₱.{{$item->price * $item->quantity}}
          												</td>
          	                    </tr>
          										@endforeach
          	                  </tbody>
          	                </table>
          	              </form>
          	            </div>
          	          </div>
          	        </div>
          	      </div>
          	    </div>
          	  </div>

              <div class="product-checkout-details">
                 <div class="block">
                    <h4 class="widget-title text-center">Order Summary</h4>
                    <ul class="summary-prices">
                       <li>
                          <span>Subtotal:</span>
                          <span class="price">{{$order->subtotal}}</span>
                       </li>
                       <li>
                          <span>Tax:</span>
                          <span class="price">{{$order->tax}}</span>
                       </li>
                       <li>
                          <span>Shipping:</span>
                          <span>Free Shipping</span>
                       </li>
                    </ul>
                    <div class="summary-total">
                       <span>Total</span>
                       <span>₱.{{$order->total}}</span>
                    </div>
                 </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
                Billing Details
            </div>
            <div class="panel-body">
              <table class="table">
                <tr>
                  <th>First Name</th>
                  <td>{{$order->firstname}}</td>
                  <th>Last Name</th>
                  <td>{{$order->lastname}}</td>
                </tr>
                <tr>
                  <th>Phone</th>
                  <td>{{$order->mobile}}</td>
                  <th>Email</th>
                  <td>{{$order->email}}</td>
                </tr>
                <tr>
                  <th>Line1</th>
                  <td>{{$order->line1}}</td>
                  <th>Line2</th>
                  <td>{{$order->line2}}</td>
                </tr>
                <tr>
                  <th>City</th>
                  <td>{{$order->city}}</td>
                  <th>Province</th>
                  <td>{{$order->province}}</td>
                </tr>
                <tr>
                  <th>Country</th>
                  <td>{{$order->country}}</td>
                  <th>ZIP Code</th>
                  <td>{{$order->zipcode}}</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>

      @if($order->is_shipping_different)
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
                Shipping Details
            </div>
            <div class="panel-body">
              <table class="table">
                <tr>
                  <th>First Name</th>
                  <td>{{$order->shipping->firstname}}</td>
                  <th>Last Name</th>
                  <td>{{$order->shipping->lastname}}</td>
                </tr>
                <tr>
                  <th>Phone</th>
                  <td>{{$order->shipping->mobile}}</td>
                  <th>Email</th>
                  <td>{{$order->shipping->email}}</td>
                </tr>
                <tr>
                  <th>Line1</th>
                  <td>{{$order->shipping->line1}}</td>
                  <th>Line2</th>
                  <td>{{$order->shipping->line2}}</td>
                </tr>
                <tr>
                  <th>City</th>
                  <td>{{$order->shipping->city}}</td>
                  <th>Province</th>
                  <td>{{$order->shipping->province}}</td>
                </tr>
                <tr>
                  <th>Country</th>
                  <td>{{$order->shipping->country}}</td>
                  <th>ZIP Code</th>
                  <td>{{$order->shipping->zipcode}}</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
      @endif

      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
                Transaction
            </div>
            <div class="panel-body">
              <table class="table">
                <tr>
                  <th>Transaction Mode</th>
                  <td>{{$order->transaction->mode}}</td>
                </tr>
                <tr>
                  <th>Status</th>
                  <td>{{$order->transaction->status}}</td>
                </tr>
                <tr>
                  <th>Transaction Date</th>
                  <td>{{$order->transaction->created_at}}</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</main>

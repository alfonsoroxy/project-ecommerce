<style>
  nav svg {
    height: 20px;
  }
  nav .hidden {
    display: block !important;
  }
</style>
<main>
  <!-- *** breadcrumb *** -->
  <div class="page-header">
  	<div class="container">
  		<div class="row">
  			<div class="col-md-12">
  				<div class="content">
  					<h1 class="page-name">My Orders</h1>
  					<ol class="breadcrumb">
              <li><a href="{{ url('/') }}">Home</a></li>
  						<li class="active">My Orders</li>
  					</ol>
  				</div>
  			</div>
  		</div>
  	</div>
	</div>

  <div>
    <div class="container" style="padding: 30px 0;">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
                All Orders
            </div>
            <div class="panel-body">
              <table class="table table-stripped">
                <thread>
                  <tr>
                    <th>Order ID</th>
                    <th>Subtotal</th>
                    <!-- <th>Discount</th> -->
                    <th>Tax</th>
                    <th>Total</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Zip Code</th>
                    <th>Status</th>
                    <th>Order Date</th>
                    <th>Action</th>
                  </tr>
                </thread>
                <tbody>
                  @foreach($orders as $order)
                  <tr>
                    <td>{{$order->id}}</td>
                    <td>P.{{$order->subtotal}}</td>
                    <!-- <th>{{$order->discount}}</th> -->
                    <td>P.{{$order->tax}}</td>
                    <td>P.{{$order->total}}</td>
                    <td>{{$order->firstname}}</td>
                    <td>{{$order->lastname}}</td>
                    <td>{{$order->mobile}}</td>
                    <td>{{$order->email}}</td>
                    <td>{{$order->zipcode}}</td>
                    <td>{{$order->status}}</td>
                    <td>{{$order->created_at}}</td>
                    <td><a href="{{ route('user.ordersdetails', ['order_id' => $order->id]) }}" class="btn btn-info btn-sm">Details</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{$orders->links()}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

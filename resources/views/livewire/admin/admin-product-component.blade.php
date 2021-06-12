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
            <h1 class="page-name">Admin Product</h1>
            <ol class="breadcrumb">
              <li><a href="{{ url('/') }}">Home</a></li>
              <li class="active">Products</li>
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
              <div class="row">
                <div class="col-md-6">
                  All Product
                </div>
                <div class="col-md-6">
                  <a href="{{ route('admin.addproduct') }}" class="btn btn-success pull-right">Add New</a>
                </div>
              </div>
            </div>
            <div class="panel-body">
              <table class="table table-striped">
                <thread>
                  <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Stock</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                </thread>
                <tbody>
                  @foreach($products as $product)
                    <tr>
                      <td>{{$product->id}}</td>
                      <td><img src="{{ asset('frontend/images/shop/products') }}/{{$product->image}}" width="60" /></td>
                      <td>{{$product->name}}</td>
                      <td>{{$product->stock_status}}</td>
                      <td>{{$product->regular_price}}</td>
                      <td>{{$product->category->name}}</td>
                      <td>{{$product->created_at}}</td>
                      <td>
                        <a href="{{ route('admin.editproduct', ['product_slug' => $product->slug]) }}"><i class="tf-pencil2 text-info"></i></a>
                        <a href="#" onclick="confirm('Are you sure, You want do delete this product? ') || event.stopImmediatePropagation()"wire:click.prevent="deleteProduct({{$product->id}})" style="margin-left: 15px;"><i class="tf-ion-ios-trash text-danger"></i></a>
                      </td>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              {{$products->links()}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

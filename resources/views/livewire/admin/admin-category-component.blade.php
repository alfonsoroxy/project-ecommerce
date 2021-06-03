<main>
  <!-- *** breadcrumb *** -->
  <div class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="content">
            <h1 class="page-name">Admin Category</h1>
            <ol class="breadcrumb">
              <li><a href="{{ url('/') }}">Home</a></li>
              <li class="active">Admin Category</li>
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
                  Add Categories
                </div>
                <div class="col-md-6">
                  <a href="{{ route('admin.addcategory') }}" class="btn btn-success pull-right">Add New</a>
                </div>
              </div>
            </div>
            <div class="panel-body">
              @if(Session::has('message'))
                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
              @endif
              <table class="table table-striped">
                <thread>
                  <tr>
                    <th>Id</th>
                    <th>Category Name</th>
                    <th>Slug</th>
                    <th>Action</th>
                  </tr>
                </thread>
                <tbody>
                  @foreach($categories as $category)
                    <tr>
                      <td>{{$category->Id}}</td>
                      <td>{{$category->name}}</td>
                      <td>{{$category->slug}}</td>
                      <td>
                        <a href="{{ route('admin.editcategory', ['category_slug' => $category->slug]) }}"><i class="tf-pencil2"></i></a>
                        <a href="#" onclick="confirm('Are you sure, You want do delete this category? ') || event.stopImmediatePropagation()" wire:click.prevent="deleteCategory({{$category->id}})" style="margin-left: 15px;"><i class="tf-ion-ios-trash text-danger"></i></a>
                      </td>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              {{$categories->links()}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

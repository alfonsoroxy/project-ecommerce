<main>
  <!-- *** breadcrumb *** -->
  <div class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="content">
            <h1 class="page-name">Add New Category</h1>
            <ol class="breadcrumb">
              <li><a href="{{ url('/') }}">Home</a></li>
              <li><a href="{{ url('admin/categories') }}">Admin Category</a></li>
              <li class="active">Add New Category</li>
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
                  Add New Category
                </div>
                <div class="col-md-6">
                  <a href="{{ route('admin.categories') }}" class="btn btn-success pull-right">All Categories</a>
                </div>
              </div>
            </div>
            <div class="panel-body">
              @if(Session::has('message'))
                <div class="alert alert-success" role="alert"><i class="tf-ion-checkmark-circled"></i> {{Session::get('message')}}</div>
              @endif
              <form class="form-horizontal" wire:submit.prevent="storeCategory">
                <div class="form-group">
                  <label class="col-md-4 control-label">Category Name</label>
                  <div class="col-md-4">
                    <input type="text" placeholder="Category Name" class="form-control input-md" wire:model="name" wire:keyup="generateslug" />
                    @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Category Slug</label>
                  <div class="col-md-4">
                    <input type="text" placeholder="Category Slug" class="form-control input-md" wire:model="slug" />
                    @error('slug') <p class="text-danger">{{ $message }}</p> @enderror
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label"></label>
                  <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

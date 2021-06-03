<main>
  <!-- *** breadcrumb *** -->
  <div class="page-header">
  	<div class="container">
  		<div class="row">
  			<div class="col-md-12">
  				<div class="content">
  					<h1 class="page-name">Review & Rating</h1>
  					<ol class="breadcrumb">
              <li><a href="{{ url('/') }}">Home</a></li>
  						<li><a href="{{ url('user/orders') }}">My Orders</a></li>
  						<li class="active">Review & Rating</li>
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
          @if(Session::has('message'))
          <center><div class="alert alert-success" role="alert">
            <i class="tf-ion-checkmark-circled"></i><span> {{Session::get('message')}} </span>
          </div></center>
          @endif

          <!-- *** Comment Item Starts *** -->
            <div class="post-comments">
              <h4 class="widget-title">Add Review for</h4>
              <ul class="media-list comments-list m-bot-50 clearlist">
                <li class="media">
                  <a class="pull-left" href="#!">
                    <img class="media-object comment-avatar" src="{{ asset('frontend/images/shop/products') }}/{{$orderItem->product->image}}.jpg" alt="{{$orderItem->product->name}}" width="100" height="100" />
                  </a>
                  <div class="media-body">
                    <div class="comment-info">
                      <h4 class="comment-author">
                        <a href="#!"><strong>{{$orderItem->product->name}}</strong></a>
                        <!-- <time datetime="2013-04-06T13:53">July 02, 2015, at 11:34</time> -->
                      </h4>

                      <form wire:submit.prevent="addReview">
                        @csrf
                        <div class="form-group">
                          <label class="col-md-4 control-label">Your Rating</label>
                          <div class="col-md-12">
                            <ul class="rate-area">
                              <input type="radio" id="5-star" name="rating" value="5" wire:model="rating"/><label for="5-star" title="Amazing">5 stars</label>
                              <input type="radio" id="4-star" name="rating" value="4" wire:model="rating"/><label for="4-star" title="Good">4 stars</label>
                              <input type="radio" id="3-star" name="rating" value="3" wire:model="rating"/><label for="3-star" title="Average">3 stars</label>
                              <input type="radio" id="2-star" name="rating" value="2" wire:model="rating"/><label for="2-star" title="Not Good">2 stars</label>
                              <input type="radio" id="1-star" name="rating" value="1" wire:model="rating"/><label for="1-star" title="Bad">1 star</label>
                              @error('rating') <span class="text-danger">{{$message}}</span> @enderror
                            </ul>
                          </div>
                          <div class="col-md-12">
                          <label class="col-md-4 control-label mt-20">Your Review</label>
                          <div class="col-md-12">
                            <textarea class="form-control" id="description" wire:model="comment" cols="45" rows="8"></textarea>
                            @error('comment') <span class="text-danger">{{$message}}</span> @enderror
                          </div>
                        </div>
                        <input name="submit" type="submit" class="btn btn-main mt-20 pull-right" value="Submit">
                      </form>
                    </div>

                  </div>
                </li>
              </ul>
            </div>
          </div>
        <!-- *** Comment Item Ends *** -->

      </div>
    </div>
  </div>
</main>

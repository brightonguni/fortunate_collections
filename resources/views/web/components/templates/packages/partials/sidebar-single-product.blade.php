@foreach($products->take(1) as $product)
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
      <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
      	<div class="flipper">
      		<div class="front">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-12 p-1">
                    <!-- front content -->
                    <div class="product-categories text-left p-0 m-0">
                      <h3 class="btn gradient-dodger-blue">
                        {{ $product->category->title }}
                      </h3>
                    </div>
                    <img class="card-image-small img-fluid img-responsive" 
                      src="{{asset('assets/images/products/'.$product->avatar)}}" 
                      alt="teacher"
                    >
                    <div class="product-title text-center ">
                      <h3 class="text-hover">
                        <strong>{{ str_limit($product->name,'60') }}</strong>
                      </h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      		</div>
      		<div class="back">
            <a href="{{ route('web_product.show',['id' => $product->id]) }}">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-1">
                      <!-- back content -->
                      <div class="product-title text-center mt-5">
                        <h3 class="text-hover">
                          <strong>{{ str_limit($product->name,'60') }}</strong>
                        </h3>
                      </div>
                      <div class="product-description">
                        <p class="text-hover text-height">{{ str_limit($product->description ,'200') }}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </a>
      		</div>
      	</div>
      </div>
    </div>
  </div>
@endforeach
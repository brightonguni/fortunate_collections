
  <div class="container-fluid p-2">
    @if(count($productByCategories) > 0)
      <div class="row">
        @foreach($productByCategories->take(8) as $product)
          <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 p-1">
            <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
            	<div class="flipper">
            		<div class="front">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-12 p-1">
                          <div class="product-categories text-left p-0 m-0">
                            <h3>{{  $category->title }}</h3>
                          </div>
                          <div class="card-image-small" style="background-image: url('{{ asset('assets/images/products/'.$product->product->avatar)}}')"></div>
                          {{-- <div class="product-sub-categories">
                            <ul>
                            <li><small>Sub Categories</small></li>
                              @foreach($product->sub_categories as $sub_category)
                              <li class="btn gradient-pastel-green p-1 m-1">{{ $sub_category->title }}</li>
                              @endforeach
                            </ul>
                          </div> --}}
                          <div class="product-title text-center ">
                            <h3 class="text-hover" style="font-size: 16px;">
                              <strong>{{ str_limit($product->product->name,'20') }}</strong>
                            </h3>
                          </div>
                          <div class="product-title text-center ">
                            <h1 class="text-hover" style="font-size: 16px;">
                              <strong>{{ $product->product->unit_price }}</strong>
                            </h1>
                          </div>
                          <div class="product-title text-center ">
                            <h1 class="text-hover" style="font-size: 16px;">
                              <strong>{{ $product->product->brand->title }}</strong>
                            </h1>
                          </div>
                          <div class="product-title text-center ">
                            <h1 class="text-hover" style="font-size: 16px;">
                              <strong>{{ $product->product->color->title }}</strong>
                            </h1>
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
                            <div class="card-image-small animated" style="background-image: url('{{ asset('assets/images/products/'.$product->product->product_avatar)}}')"></div>
                            <div class="product-title text-center mt-5">
                              <h3 class="text-hover" style="height: 50px;">
                                <strong>{{ str_limit($product->product->name,'60') }}</strong>
                              </h3>
                            </div>
                            <div class="product-description text-center" style="height: 100px;">
                              <p class="text-hover text-height">{{ str_limit($product->product->description,'100') }}</p>
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
        @endforeach
      </div>
    @endif
  </div>
  <div class="paginations text-right">
  <div class="row">
    <div class="col-12 text-right">
       <p style="padding: 10px;"> {{ $productByCategories->links() }}</p>
    </div>
  </div>
</div>



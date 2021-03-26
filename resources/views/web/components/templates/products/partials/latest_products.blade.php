@if($latest_products)
  <div class="container-fluid pt-5 mt-5 pb-5 mb-5">
    <div class="row">
      <div class="col-12">
        <div class="row">
          @foreach($latest_products->take(8) as $product)
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 p-1">
              <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
              	<div class="flipper">
              		<div class="front pb-5 mb-5">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-12 p-0">
                            <div class="product-categories style="height: 50px;" text-left p-0 m-0">
                              <ul>
                                @foreach($product->categories->take(3) as $category)
                                <li style="font-weight: 200;" class="btn btn-outline-danger btn-sm text-capitalize p-1 m-1">{{ str_limit($category->title,'15') }}</li>
                                @endforeach
                              </ul>
                            </div>
                            <div class="card-image-small" style="background-image: url('{{ asset('assets/images/products/'.$product->avatar)}}')"></div>
                            <div class="product-sub-categories" style="height: 50px;">
                              <ul>
                                @foreach($product->sub_categories->take(3) as $sub_category)
                                <li  style="font-weight: 200;" class="btn btn-outline-danger btn-sm text-capitalize p-1 m-1">{{ str_limit($sub_category->title,'15') }}</li>
                                @endforeach
                              </ul>
                            </div>
                            <div class="product-title text-center ">
                              <p class="text-hover" style="font-size: 16px;  font-weight: 500;">
                              {{ str_limit($product->name,'30') }}
                              </p>
                            </div>
                            <div class="product-title text-center ">
                              <h2 class="text-hover" style="font-size: 18px;  font-weight: 900;">
                                {{ str_limit($product->unit_price,'20') }}
                              </h2>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer p-0 m-0">
                        <div class="product-brand text-right">
                          <img  style="font-weight: 200; width: 50px; height: 50px;" class="img-responsive" src="{{ URL::asset('assets/images/products/brand/'.$product->brand->avatar)}}"  alt="{{  $product->brand->name}}" >
                        </div>
                      </div>
                    </div>
              		</div>
              		<div class="back">
                    <a href="{{ route('web_product.show',['id' => $product->id]) }}">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-1 mb-2">
                              <!-- back content -->
                              <div class="product-title text-center m-2">
                                <h3 class="text-hover">
                                  <strong>{{ str_limit($product->name,'60') }}</strong>
                                </h3>
                              </div>
                              <div class="product-description">
                                <p class="text-hover text-height">{{ str_limit($product->description,'100') }}</p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="card-footer p-0 m-0">
                          <div class="product-brand text-right">
                            <img  style="font-weight: 200; width: 50px; height: 50px;" class="img-responsive" src="{{ URL::asset('assets/images/products/brand/'.$product->brand->avatar)}}"  alt="{{  $product->brand->name}}" >
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
      </div>
    </div>
  </div>
  @endif
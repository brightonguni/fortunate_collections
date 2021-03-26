
@include('web.components.templates.products.partials.page.product-page')
@include('web.components.templates.products.partials.latest_products')
<d class="container-fluid">
  <div class="row">
    <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8">
      @if(count($products) > 0)
        <div class="row">
          @foreach($products->take(8) as $product)
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 p-1">
              <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
              	<div class="flipper">
              		<div class="front pb-2 mb-2">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-12 p-1">
                            <div class="product-categories style="height: 50px;" text-left p-0 m-0">
                              <ul>
                                @foreach($product->categories->take(3) as $category)
                                <li style="font-weight: 100;" class="btn btn-sm btn-outline-dark text-capitalize p-1 m-1">{{ str_limit($category->title,'15') }}</li>
                                @endforeach
                              </ul>
                            </div>
                            <div class="card-image-small" style="background-image: url('{{ asset('assets/images/products/'.$product->avatar)}}')"></div>
                            <div class="product-sub-categories" style="height: 50px;">
                              <ul>
                                @foreach($product->sub_categories as $sub_category)
                                <li  style="font-weight: 100;" class="btn btn-outline-dark btn-sm text-capitalize p-1 m-1">{{str_limit( $sub_category->title,'15') }}</li>
                                @endforeach
                              </ul>
                            </div>
                            <div class="product-title text-center">
                              <p class="text-hover" style="font-size: 16px; font-weight: 500;">
                                {{ str_limit($product->name,'20') }}
                              </p>
                            </div>
                            <div class="product-title text-center ">
                              <h2 class="text-hover" style="font-size: 18px; font-weight: 500;">
                                {{ $product->unit_price}}
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
                              <div class="product-title text-center mt-5">
                                <h3 class="text-hover">
                                  <strong>{{ str_limit($product->name,'40') }}</strong>
                                </h3>
                              </div>
                              <div class="product-description">
                                <p class="text-hover text-height">{{ str_limit($product->description,'100') }}</p>
                              </div>
                              <div class="product-brand">
                                <img  class="img-responsive" src="{{ URL::asset('assets/images/products/brand'.$product->avatar)}}"  alt="{{  $product->brand->name}}" >
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
        @else
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <p class="text-center">sorry no products yet ....</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endif
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
      @include('web.components.templates.products.partials.categories')
    </div>
  </div>
@if(count($blogs) > 0)
  @include('web._partials.blogs._blog')
@endif
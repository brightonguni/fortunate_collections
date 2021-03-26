@include('web.components.templates.products.partials.page.product-category-page')
@if($product_categories)
  <div class="container-fluid pt-5 mt-5">
    <div class="row">
      @foreach($product_categories->take(8) as $category)
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 p-1">
          <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
          	<div class="flipper">
          		<div class="front">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12 p-1">
                        <!-- front content -->
                        <div class="product-categories text-left p-0 m-0">
                          <h3 class="btn  btn-outline-dark btn-sm">
                            {{ $category->title }}
                          </h3>
                        </div>
                        <div class="card-image-small" style="background-image: url('{{ asset('assets/images/products/category/'.$category->avatar)}}')"></div>
                        <div class="product-title text-center ">
                          <p class="text-hover" style="font-size: 16px;">
                            <strong>{{ str_limit($category->title,'20') }}</strong>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
          		</div>
          		<div class="back">
                <a href="{{ route('web_product_category.show',['id' => $category->id]) }}">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-1">
                          <!-- back content -->
                          <div class="product-title text-center mt-5">
                            <p class="text-hover">
                              {{ str_limit($category->title,'40') }}
                            </p>
                          </div>
                          <div class="product-description">
                            <p class="text-hover text-height">{{ str_limit($category->description,'100') }}</p>
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
    <div class="card-link p-2 m-2 text-center">
      <a class="btn btn-md  btn-outline-dark btn-lg text-center"
        href="{{ route('web_product_category.index') }}"><strong>Find Out More</strong>
        <span class="fa fa-angle-double-right"></span>
      </a>
    </div>
  </div>
@endif
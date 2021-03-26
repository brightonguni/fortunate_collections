@include('web.components.templates.packages.partials.page.package-page')
  <div class="container-fluid">
    <div class="row pt-5 mt-5">
      <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        @if(count($packages) > 0)
          <div class="row">
            @foreach($packages as $package)
              <div class="col-xs-12 col-sm-12 col-md- col-lg-4 p-1">
                <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                	<div class="flipper">
                		<div class="front">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-12 p-1">
                              <!-- front content -->
                              <div class="package-categories text-center p-0 m-0">
                                @if(count($package->package_categories) > 0)
                                  <ul>
                                    <li><small>services:</small></li>
                                    @foreach($package->package_categories->take(3) as $category)
                                    <li class="btn gradient-pastel-green p-1 m-1">{{ $category->title }}</li>
                                    @endforeach
                                  </ul>
                                @endif
                              </div>
                              <div class="card-image-small" style="background-image: url('{{ asset('assets/images/packages/'.$package->avatar)}}');"></div>
                              <div class="package-title text-center ">
                                <h3 class="text-hover text-uppercase mt-1">
                                  <strong>{{ str_limit($package->name,'25') }}</strong>
                                </h3>
                              </div>
                              <div class="package-price text-center">
                                  <h1><strong>{{ $package->package_price }}</strong></h1>
                              </div>
                              <div class="product-categories text-center p-0 m-0">
                                @if(count($package->products) > 0)
                                <ul>
                                  <li><small>Products:</small></li>
                                  @foreach($package->products->take(3) as $product)
                                  <li class="btn gradient-pastel-green p-1 m-1">{{ $product->name }}</li>
                                  @endforeach
                                </ul>
                                @endif
                              </div>
                              <div class="package-services text-center p-0 m-0">
                                @if(count($package->services) > 0)
                                  <ul>
                                    <li><small>services:</small></li>
                                    @foreach($package->services->take(3) as $service)
                                    <li class="btn gradient-pastel-green p-1 m-1">{{ $service->title }}</li>
                                    @endforeach
                                  </ul>
                                @endif
                              </div>
                              <div class="package-description text-center mt-1 mb-1" style="height: 100px;">
                                <p class="text-hover text-height">{{ str_limit($package->description ,'100')}}</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                		</div>
                		<div class="back">
                      <a href="{{ route('web_package.show',['id' => $package->id]) }}">
                        <div class="card">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-1">
                                <!-- back content -->
                                <div class="package-title text-center mt-5">
                                  <h3 class="text-hover text-center">
                                    <strong>{{ str_limit($package->name,'60') }}</strong>
                                  </h3>
                                </div>
                                <div class="package-price text-center">
                                  <h1><strong>{{ $package->package_price }}</strong></h1>
                                </div>
                                <div class="package-description  mt-1 mb-1">
                                  <p class="text-hover text-height text-center">{{ str_limit($package->description ,'200')}}</p>
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
        <div class="card-link p-5 m-5 text-center">
          <a class="btn btn-lg btn-ouline-dark text-center"
            href="{{ route('web_package.index') }}"><strong>Find Out More</strong>
            <span class="fa fa-angle-double-right"></span>
          </a>
        </div>
        @else
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <p class="text-center">no packages yet</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endif
      </div>
      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              @include('web.components.templates.packages.partials.categories')
          </div>
        </div>
      </div>
    </div>
  </div>
@if(count($blogs) > 0)
  @include('web._partials.blogs._blog')
@endif

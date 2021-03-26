@include('web.components.templates.packages.partials.page.package-page')
  <div class="container-fluid pt-5 mt-5">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @if(count($packages) > 0)
          <div class="row">
            @foreach($packages->take(4) as $package)
              <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 p-1">
                <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                	<div class="flipper">
                		<div class="front">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-12 p-2">
                              <!-- front content -->
                              @if(!empty($package->avatar))
                               <div class="card-image-small" style="background-image: url('{{ asset('assets/images/packages/'.$package->avatar)}}');"></div>
                              @endif
                              <div class="package-title text-center" style="height: 50px;">
                                <h2 class="text-hover text-uppercase pt-2" style="font-weight: 300 !important;">
                                  <strong>{{ str_limit($package->name,'40') }}</strong>
                                </h2>
                              </div>
                              <div class="package-product text-center p-0 m-0">
                                @if(count($package->products) > 0)
                                <ul>
                                  <li><small>products:</small></li>
                                  @foreach($package->products as $product)
                                    <li class="btn gradient-pastel-green p-1 m-1">{{ $product->name }}</li>
                                  @endforeach
                                </ul>
                                @endif
                              </div>
                              <div class="product-services text-center p-0 m-0">
                                @if(count($package->services) > 0)
                                  <ul>
                                    <li><small>services:</small></li>
                                    @foreach($package->services as $service)
                                      <li class="btn btn-sm btn-outline-dark p-1 m-1">{{ $service->title }}</li>
                                    @endforeach
                                  </ul>
                                @endif
                              </div>
                              @if(!empty($package->description))
                                <div class="package-description text-center" style="height: 100px;">
                                  <p class="text-hover text-height">
                                    {{ str_limit($package->description,'180') }}
                                  </p>
                                </div>
                              @endif
                              @if($package->package_price > 0)
                              <div class="package-price text-center">
                                <h1><strong>{{ $package->package_price }}</strong></h1>
                              </div>
                              @endif
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
                                  <h3 class="text-hover">
                                    <strong>{{ str_limit($package->name,'60') }}</strong>
                                  </h3>

                                </div>
                                <div class="product-categories text-center p-0 m-0">
                                @if(count($package->products) > 0)
                                <h5>Package Products</h5>
                                @foreach($package->products->take(3) as $product)
                                <ul>
                                  <li class="btn gradient-pastel-green p-1 m-1">{{ $product->name }}</li>
                                </ul>
                                @endforeach
                                @endif
                              </div>
                              <div class="product-categories text-left p-0 m-0">
                                @if(count($package->services) > 0)
                                  <h5>Package Services</h5>
                                  @foreach($package->services->take(3) as $service)
                                    <ul>
                                      <li class="fa fa-tasks"><span class="ml-2 pl-2">{{  $service->title }}</span></li>
                                    </ul>
                                  @endforeach
                                @endif
                              </div>
                                <div class="package-description pt-2 mt-2">
                                  <p class="text-hover text-height">{{ str_limit($package->description ,'200')}}</p>
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
        <div class="card-link p-2 m-2 text-center">
          <a class="btn btn-lg btn-outline-dark text-center"
            href="{{ route('web_package.index') }}"><strong>Find Out More</strong>
            <span class="fa fa-angle-double-right"></span>
          </a>
        </div>
      </div>
    </div>
  </div>
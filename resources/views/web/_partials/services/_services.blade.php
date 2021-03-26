{{-- @include('web.components.templates.services.partials.page.service-page') --}}
@if(!empty($services))
  <div class="container-fluid p-3 m-3">
    <div class="row">
      <div class="col-12 text-center">
        <h2>Services</h2>
      </div>
    </div>
    <div class="row">
      @foreach($services->take(4) as $service)
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 p-1">
          <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
          	<div class="flipper">
          		<div class="front">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12 p-1">
                        <!-- front content -->
                        <div class="service-categories pt-2 pb-2">
                          <div class="font-medium text-dark-medium">
                            <ul class="list-inline">
                              @foreach($service->categories as $category)
                                  <li class="btn  btn-outline-dark btn-sm p-1 m-1">{{ $category->title }}</li>
                              @endforeach
                            </ul>
                          </div> 
                        </div>
                        <div class="card-image-small" style="background-image: url('{{ asset('assets/images/services/'.$service->avatar)}}')"></div>
                        <div class="product-title text-center ">
                          <h3 class="text-hover">{{ str_limit($service->title,'20') }}</h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
          		</div>
          		<div class="back">
                <a href="{{ route('web_service.show',['id' => $service->id]) }}">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-1">
                          <!-- back content -->
                          <div class="product-title text-center mt-5">
                            <h3 class="text-hover">
                              <strong>{{ str_limit($service->title,'60') }}</strong>
                            </h3>
                          </div>
                          <div class="product-description">
                            <p class="text-hover text-height">{{ $service->description }}</p>
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
    <div class="row">
      <div class="col-12 text-center">
        <div class="service-url">
          <a class="btn btn-lg btn-outline-dark" href="{{ route('web_service.index') }}">Find Out More</a>
        </div>
      </div>
    </div>
  </div>
@endif
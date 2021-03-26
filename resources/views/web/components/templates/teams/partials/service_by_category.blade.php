
@if($serviceByCategories)
  <h3>Related Services</h3>
  <div class="row">
    @foreach($serviceByCategories as $service)
      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
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
                          {{ $service->category->title }}
                        </h3>
                      </div>
                      <img class="card-image-small img-fluid img-responsive" 
                        src="{{asset('assets/images/services/'.$service->avatar)}}" 
                        alt="teacher"
                      >
                      <div class="product-title text-center ">
                        <h3 class="text-hover">
                          <strong>{{ str_limit($service->title,'60') }}</strong>
                        </h3>
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
@endif

   
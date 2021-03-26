
@if($packageByCategories)
  <div  class="container-fluid">
    <div class="row p-3 m-3">
      @foreach($packageByCategories as $package)
       <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 p-1">
          <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
          	<div class="flipper">
          		<div class="front">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12 p-1">
                        <!-- front content -->
                        <div class="package-categories text-left p-0 m-0">
                          <h3 class="btn gradient-dodger-blue">
                            {{ $package->service->title }}
                          </h3>
                        </div>
                        <img class="card-image-small img-fluid img-responsive" 
                          src="{{asset('assets/images/packages/'.$package->avatar)}}" 
                          alt="teacher"
                        >
                        <div class="package-title text-center ">
                          <h3 class="text-hover">
                            <strong>{{ str_limit($package->name,'60') }}</strong>
                          </h3>
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
                            <h3 class="text-hover">
                              <strong>{{ str_limit($package->name,'60') }}</strong>
                            </h3>
                          </div>
                          <div class="package-description">
                            <p class="text-hover text-height">{{ $package->description }}</p>
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
  </div>
@endif


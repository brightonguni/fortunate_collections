
<div class="manux-dishes">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      @if(count($serviceByCategories) > 0)
        <h3>{{ $category->title }} </h3>
        <div class="row">
          @foreach($serviceByCategories as $service)
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 p-1">
              <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
              	<div class="flipper">
              		<div class="front">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-12 p-1">
                            <!-- front content -->
                              <div class="service-category pb-0 mb-0">
                                <h3 class="btn btn-sm btn-outline-dark">{{ $category->title }}</h3>
                              </div>
                            <div class="card-image-small" style="background-image: url('{{ asset('assets/images/services/'.$service->service->avatar)}}');"></div>
                            <div class="product-title text-center" style="height: 50px;">
                              <h3 class="text-hover">
                                <strong>{{ str_limit($service->service->title,'60') }}</strong>
                              </h3>
                            </div>
                            <div class="service-description" style="height: 100px;">
                              <p>{{ str_limit($service->service->description, '100' )}}</p>
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
                                  <strong>{{ str_limit($service->service->title,'60') }}</strong>
                                </h3>
                              </div>
                              <div class="product-description">
                                <p class="text-hover text-height">{{ $service->service->description }}</p>
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
  </div>
</div>
         
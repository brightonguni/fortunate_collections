
<div class="container-fluid">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      @if(count($services) > 0)
        <div class="row">
          @foreach($services as $service)
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 p-1">
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
                              <h3 class="text-hover">
                                <strong>{{ str_limit($service->title,'30') }}</strong>
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
                                  <strong>{{ str_limit($service->title,'40') }}</strong>
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
        <div class="paginations text-right">
          <div class="row">
            <div class="col-12 text-right">
               <p style="padding: 10px;"> {{ $services->links() }}</p>
            </div>
          </div>
        </div>
        @else
        <div class="row bg-dark-gray">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <p>No services in the systems yet .... </p>
              </div>
            </div>
          </div>
        </div>
      @endif
    </div>
  </div>
</div>
@if(count($blogs) > 0)
  <div class="blog-partials">
    @include('web._partials.blogs._blog')
  </div>
@endif
 

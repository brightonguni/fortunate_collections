
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-5">
    @if(count($package_categories) > 0)
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="row package-content-wrapper pt-2">
            @foreach($package_categories as $package)  
              <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 p-1">
                <a href="{{ route('web_product_category.show',['id' => $package->id]) }}">
                  <div class="card m-1 p-1">
                    <div class="card-body m-0 p-0">
                      <div class="package-content-wrap p-1">
                        <div class="package-title">
                          <h3 class="package-title text-capitalize pt-3 pl-md-3"><strong>{{ str_limit($package->title,'80') }}</strong></h3>
                        </div>
                        <div class="row">
                          <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                            <div class="package-description pt-0 text-left ml-3" style= "height: 150px;">
                              <p class="text-hover text-height">{{ str_limit($package->description ,'150') }}</p>
                            </div>
                          </div>
                          <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                            <div class="blog-image card-img-top text-center">
                              <img class=" package-image img-fluid img-responsive img-circle" 
                                style="width: 50px; height: 50px; border-radius: 25px;" 
                                src="{{URL::asset('assets/images/packages/category/'.$package->avatar)}}" alt=""
                              >
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      @endif
    </div>
  </div>
@if(count($blogs) > 0 )
  @include('web._partials.blogs._blog')
@endif
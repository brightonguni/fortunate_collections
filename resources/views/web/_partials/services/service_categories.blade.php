@include('web.components.templates.services.partials.page.service-category-page')
 @if($service_categories)
  <div class="container-fluid pt-2 mt-2">
    <div class="row">
      <div class="col-12 text-center">
        <h2>Service Categories</h2>
      </div>
    </div>
    <div class="row">
      @foreach($service_categories->take(6) as $service)  
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 p-1">
          <a href="{{ route('web_service_category.show',['id' => $service->id]) }}">
            <div class="card m-1 p-1 fadeInUpBig fade-in">
              <div class="card-body m-0 p-0">
                <div class="service-content-wrap p-1 text-center">
                  <h3 class="service-title text-capitalize text-center pl-3 pt-3 pd-0 text-hover">
                    <strong>{{ str_limit($service->title,'50') }}</strong>
                  </h3>
                  <div class="row">
                    <div class="col-xs-12 col-sm-9 col-md-8 col-lg-8 pl-2 pr-0">
                    <div class="service-description pt-0 text-left ml-4" style= "height: 150px;">
                      <p class="text-hover text-height">{{ str_limit($service->description ,'150') }}</p>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-3 col-md-4 col-lg-4 p-0 text-center">
                    <div class="blog-image card-img-top text-center">
                      <img class=" service-image img-fluid img-responsive img-circle" 
                        style="width: 50px; height: 50px; border-radius: 25px;" 
                        src="{{URL::asset('assets/images/services/category/'.$service->avatar)}}" alt=""
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
    <div class="row pb-5 mb-5">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-3">
        <div class="card-link text-center">
          <a class="btn btn-lg  btn-outline-dark"
             href="{{ route('web_service_category.index') }}">
            Find Out More<span class="fa fa-angle-right"></span>
          </a>
        </div>
      </div>
    </div>
  </div>
@endif

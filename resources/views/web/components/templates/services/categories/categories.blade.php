
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-5">
   @include('web.components.templates.services.partials.page.service-category-page')
   <div class="container-fluid">
    @if(count($service_categories) > 0)
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="row service-content-wrapper pt-2">
            @foreach($service_categories as $service)  
              <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 p-1">
                <a href="{{ route('web_service_category.show',['id' => $service->id]) }}">
                  <div class="card m-1 p-1">
                    <div class="card-body m-0 p-0">
                      <div class="service-content-wrap p-1">
                        <div class="service-title">
                          <h3 class="service-title text-capitalize pt-3 pl-md-3"><strong>{{ str_limit($service->title,'80') }}</strong></h3>
                        </div>
                        <div class="row">
                          <div class="col-xs-12 col-sm-9 col-md-8 col-lg-8">
                            <div class="service-description pt-0 text-left ml-3" style= "height: 150px;">
                              <p class="text-hover text-height">{{ str_limit($service->description ,'150') }}</p>
                            </div>
                          </div>
                          <div class="col-xs-12 col-sm-3 col-md-4 col-lg-4">
                            <div class="service-category-image" style="background-image: url('{{ asset('assets/images/services/category/'.$service->avatar)}}')"></div>
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
      @else
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <p>sorry we dont have service categories yet ....</p>
              </div
            </div>
          </div>
        </div>
      </div>
    @endif
  </div>
</div>
</div>
@if(count($blogs) > 0)
  @include('web._partials.blogs._blog')
@endif
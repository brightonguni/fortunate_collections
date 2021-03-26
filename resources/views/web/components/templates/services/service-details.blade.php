<div class="service-detail-wrap  p-3 m-3">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      @include('web.components.templates.services.partials.page.service-page')
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 p-1">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="card-image-large text-center" style="background-image: url('{{ asset('assets/images/services/'.$service->avatar)}}')"></div>       
              <div class="service-title text-center">
                <h2 class="service-title">{{ $service->title }}</h2>
              </div>
              <div class="card-description ">
                <p class="text-hover text-height">{{ $service->description }}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
          <div class="row">
            <div class="col-12">
              @include('web.components.templates.services.partials._service') 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
    @include('web.components.templates.services.partials.service_by_category')
  </div>
</div> 
@if(count($blogs) > 0)
  <div class="blog-partials">
    @include('web._partials.blogs._blog')
  </div>
@endif
 

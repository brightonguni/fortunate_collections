

<div id="services" class="container-fluid">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
      @if($stores)
        @foreach($aboutUsPage as $about)  
          <div class="col-12">
            <div class="blog-title text-left">
              <h3 class="store-name text-hover">{{ $about->store->name }}</h3>
            </div>
            <div class="card-description">
              <p class="text-hover">{{  $about->store->description  }}</p>
            </div>
            <div class="card-text content-url pt-4 pb-4">
              <a class="btn btn-lg   btn-outline-dark" 
                href="{{ route('web_about_us.show',
                ['id' => $about->id]) }}"
              >
                Get Branch Details
              </a>
            </div>
          </div>
        @endforeach
      @endif
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
      @include('web.components.templates.services.partials._service')
    </div>
  </div>
</div>
@if(count($services) > 0 )
  @include('web._partials.services._services')
@endif
@if(count($blogs) > 0)
  <div class="blog-partials pb-3">
    @include('web._partials.blogs._blog')
  </div>
@endif

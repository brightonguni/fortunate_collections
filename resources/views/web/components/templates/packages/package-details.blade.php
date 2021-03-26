@include('web.components.templates.packages.partials.page.package-page')
<div class="container-fluid">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
              <div class="blog-image card-img-top text-left p-1">
                <img class="card-image-large  img-fluid img-responsive" 
                src="{{asset('assets/images/packages/'.$package->avatar)}}" 
                alt="teacher">
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
              <div class="package-title text-center">
                <h3 class="text-hover text-capitalize">{{ $package->name }}</h3>
              </div>
              <div class="package-description">
                <p class="text-hover text-height"> {{ $package->description  }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('web.components.templates.packages.partials.package_by_category')
@if(count($blogs) > 0)
  @include('web._partials.blogs._blog')
@endif
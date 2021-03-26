  {{--  @include('web.components.templates.services.categories.services-categories')  --}}
  <div class="container-fluied service-category-wrap  p-3 m-3">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @if($category)
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 m-0 p-0">
                  <div class="card-image-large" style="background-image: url('{{ asset('assets/images/services/category/'.$category->avatar)}}');"></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="padding-top: 40px; padding-bottom: 20px">
                  <div class="card-title">
                    <h3><strong>{{  $category->title }}</strong></h3>
                  </div>
                  <div class="card-description">
                    <p>{{$category->description }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endif
      </div>
    </div>
  </div>
  <div class="row p-3 m-3">
    <div class="col-col-xs-12 col-sm-12 col-md-12 col-lg-12">
      @if(count($serviceByCategories) > 0)
        @include('web.components.templates.services.partials.service_by_category')  
      @endif
    </div>
  </div>
@if(count($blogs) > 0)
  @include('web._partials.blogs._blog')
@endif


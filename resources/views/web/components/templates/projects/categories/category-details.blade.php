
@if($category)
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="card">
        <div class="card-header gradient-dodger-blue">
          <div class="category-reference">
            <h3>{{ ('Category Reference #') }}{{ $category->id }}</h3>
          </div>
          <h3><strong>{{  $category->title }}</strong></h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-5 col-lg-5 m-0 p-0">
              <div class="card-image" style="width: 100%; height: 500%;">
                <img class="card-image-small img-responsive" 
                  src="{{ asset('assets/images/projects/category/'.$category->avatar)}}" 
                  alt class="{{ $category->title }}">
              </div>
            </div>
            <div class="col-md-7 col-lg-7" style="padding-top: 40px; padding-bottom: 20px">
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
    </div>
  </div>
@endif
@if($projectByCategories)
  <div class="row">
    <div class="col-12">
      @include('web.components.templates.projects.partials.project_by_category')  
    </div>
  </div>
@endif
<div class="row">
  <div class="col-12">
    @include('web._partials.FAQ._faq')
  </div>
</div>
<div class="row">
  <div class="col-12">
    @include('web._partials.blogs._blog')
  </div>
</div>


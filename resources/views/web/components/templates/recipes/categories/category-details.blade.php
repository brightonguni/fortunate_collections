<div class="container-fluid mb-2">
  <div class="row">
    <div class="col-12">
      @if($recipe_category)
        <div class="row">
          <div class="col-md-5 col-lg-5">
            <div class="card-image">
              <img class="card-image-large img-responsive img-thumbnail" 
                src="{{ asset('assets/images/recipes/category/'.$recipe_category->avatar)}}"
                alt class="">
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 pt-4 pb-4">
            <div class="card-title">
              <h2>{{  $recipe_category->title }}</h2>
            </div>
            <div class="card-description">
              <p>{{$recipe_category->description }}</p>
            </div>
          </div>
        </div>
      @endif
    </div>
  </div>
</div>
@include('web.components.templates.recipes.partials.receip_by_category')
@if(count($blogs) > 0)
  @include('web._partials.blogs._blog')
@endif    
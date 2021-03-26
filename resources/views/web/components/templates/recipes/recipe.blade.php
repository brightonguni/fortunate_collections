@include('web.components.templates.recipes.partials.page.recipe-page')

  <div class="container-fluid mt-2 mb-2">
    @if(count($recipes) > 0)
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
          <div class="row">
            @foreach($recipes as $recipe)
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 m-1">
                <a  href="{{ route('web_recipe.show',['id' => $recipe->id]) }}">
                  <div class="card p-0 m-0">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <div class="card-image-small" style="background-image: url('{{ asset('assets/images/recipes/'.$recipe->avatar)}}')"></div>
                          <div class="recipe-category text-center pt-1 mt-1">
                            <a href="{{ route('web_recipe_category.show',['id' => $recipe->id]) }}" class="btn btn-sm btn-outline-dark btn-block" >{{   $recipe->category->title}}</a>
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <div class="recipe-title text-left text-capitalize">
                             <h3><strong>{{ str_limit($recipe->title,'80') }}</strong></h3>
                          </div>
                      
                          <div class="card-description" style="height: 150px;">
                            <h3 class="text-hover">Ingredients</h3>
                            @foreach($recipe->ingredients->take(5) as $ingredient)
                            <ul class="list-unstyled">
                              <li class="fa fa-gear pr-2 ml-2"><span class="ml-2">{{ str_limit($ingredient->description,'50') }}</span></li>
                            </ul>
                            @endforeach
                          </div>
                          <div class="card-description" style="height: 150px;">
                            <h3 class="text-hover">Method</h3>
                            @foreach($recipe->methods->take(5) as $method)
                            <ul class="list-unstyled">
                              <li class="fa fa-folder-o pr-2 ml-2"><span class="ml-2">{{ str_limit($method->description,'50') }}</span></li>
                            </ul>
                             @endforeach
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            @endforeach
            <div class="row">
              <div class="col-12">
                <div class="paginations text-right">
                  <div class="row">
                    <div class="col-12 text-right">
                       <p style="padding: 10px;"> {{ $recipes->links() }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 hidden-sm hidden-xs">
        @include('web.components.templates.recipes.partials.categories')
      </div>
    </div>
    @else
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <p>no recipes yet ...</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endif
</div>
@if(count($blogs) > 0)
  @include('web._partials.blogs._blog')
@endif

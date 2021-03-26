    
@include('web.components.templates.recipes.partials.page.recipe-page')
<div class="container-fluid pt-5 mt-5">
  <div class="row p-2 m-2">
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
      @if(count($recipes) > 0)
        <div class="row">
          @foreach($recipes->take(4) as $recipe)  
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 m-0 p-0 fade-in">
              <a href="{{ route('web_recipe.show',['id' => $recipe->id]) }}">
                <div class="card p-1 m-1 fadeInRight fade-in">
                  <div class="card-body cdk-drag-animating">
                    <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="card-image-small" style="background-image: url('{{ asset('assets/images/recipes/'.$recipe->avatar)}}')"></div>
                        <div class="recipe-category">
                          <a href="{{ route('web_recipe_category.show',['id' => $recipe->id]) }}" class="btn btn-sm btn-outline-dark"  $recipe->category->title}}</a>
                        </div> 
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="project-title text-left m-1 p-1 text-capitalize">
                           <h3 class="text-hover"><strong>{{ str_limit($recipe->title,'80') }}</strong></h3>
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
        </div>
        <div class="row pt-5">
          <div class="col-12 p-2 text-center">
            <div class="card-link">
              <a class="btn btn-md gradient-dodger-blue"
                href="{{ route('web_recipe.index') }}"><strong>Find Out More </strong>
                <span class="fa fa-angle-double-right"></span>
              </a>
            </div>
          </div>
        </div>
      @endif
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

    </div>
  </div>
</div>



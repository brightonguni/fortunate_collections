  @if(count($recipeByCategories) > 0)
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 m-0 p-0">
          <div class="row">
            @foreach($recipeByCategories as $recipe)
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 m-1">
                <div class="card p-0 m-0">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="card-image-small" style="background-image: url('{{ asset('assets/images/recipes/'.$recipe->avatar)}}')"></div>
                        <div class="recipe-category text-center pt-1 mt-1">
                          <a href="{{ route('web_recipe_category.show',['id' => $recipe->id]) }}" class="btn btn-sm btn-outline-dark" >{{   $recipe->category->title}}</a>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="recipe-title text-left text-capitalize">
                           <h3><strong>{{ str_limit($recipe->title,'80') }}</strong></h3>
                        </div>
                    
                        <div class="card-description mb-2" style="height: 180px;">
                          <h3 class="text-hover">Ingredients</h3>
                          @if(count($recipe->ingredients) > 0)
                            @foreach($recipe->ingredients->take(5) as $ingredient)
                              <ul class="list-unstyled mb-2">
                                <li class="fa fa-gear pr-2 ml-2"><span class="ml-2">{{ str_limit($ingredient->description,'50') }}</span></li>
                              </ul>
                            @endforeach
                            @else
                              <div class="container">
                               <div class="row">
                                 <div class="col-12">
                                   <div class="card">
                                     <div class="card-body">
                                       <p>sorry no recipe ingredients supplied yet ....</p>
                                     </div>
                                   </div>
                                 </div>
                               </div>
                             </div>
                          @endif
                        </div>
                        <div class="card-description mb-2" style="height: 180px;">
                          <h3 class="text-hover">Method</h3>
                          @if(count($recipe->methods) > 0)
                            @foreach($recipe->methods->take(5) as $method)
                            <ul class="list-unstyled mb-2">
                              <li class="fa fa-folder-o pr-2 ml-2"><span class="ml-2">{{ str_limit($method->description,'50') }}</span></li>
                            </ul>
                             @endforeach
                             @else
                             <div class="container">
                               <div class="row">
                                 <div class="col-12">
                                   <div class="card">
                                     <div class="card-body">
                                       <p>sorry no recipe methods supplied yet ....</p>
                                     </div>
                                   </div>
                                 </div>
                               </div>
                             </div>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="row">
                      <div class="col-12 text-right">
                        <a  class="btn btn-lg btn-hover-bluedark" href="{{ route('web_recipe.show',['id' => $recipe->id]) }}">Find Out More</a>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          @endforeach
          <div class="container">
            <div class="row">
              <div class="col-12 text-center">
                <div class="paginations">
                  <div class="row">
                    <div class="col-12 text-right">
                       <p style="padding: 10px;"> {{ $recipeByCategories->links() }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="row product-categories">
         @include('web.components.templates.recipes.partials.categories')
      </div>
    </div>
  </div>
</div>
@else
<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <p>sorry no recipes with this category yet ...</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endif

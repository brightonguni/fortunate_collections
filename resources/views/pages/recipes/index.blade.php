@extends('layouts.app')
@section('content')
  <!-- Breadcubs Area Start Here -->
  <div class="breadcrumbs-area">
    <h3>Manage recipes</h3>
    <ul>
      <li>recipes</li>
      <li>
          <a href="{{ route('recipe.index') }}">View recipes</a>
      </li>
      <li>
          <a href="{{ route('recipe.create') }}">Create recipe</a>
      </li>
      <li>Categories</li>
      <li>
          <a href="{{ route('recipe_category.index') }}">Categories</a>
      </li>  
      <li>
          <a href="{{ route('recipe_category.create') }}">Create category</a>
      </li>
      <li>Ingredients</li>
      <li>
          <a href="{{ route('recipe_ingredient.index') }}">Ingredients</a>
      </li>  
      <li>
          <a href="{{ route('recipe_ingredient.create') }}">Add Ingredients</a>
      </li>
      <li>Methods</li>
      <li>
          <a href="{{ route('recipe_method.index') }}">Methods</a>
      </li>  
      <li>
          <a href="{{ route('recipe_method.create') }}">Add Method</a>
      </li>
    </ul>
  </div>
  <div class="row gutters-20">
    <div class="col-md-4">
      <div class="dashboard-summery-one mg-b-20">
        <div class="row align-items-center">
          <div class="col-6">
            <div class="item-icon bg-light-green ">
              <i class="fas fa-snowboarding fa-4x text-green"></i>
            </div>
          </div>
          <div class="col-6">
            <div class="item-content">
              <div class="item-title">Active</div>
                <div class="item-number">
                  <span 
                    class="counter" 
                    data-num="{{ $statistics->active }}"
                  >
                    {{ $statistics->active }}
                  </span>  
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="dashboard-summery-one mg-b-20">
        <div class="row align-items-center">
          <div class="col-6">
            <div class="item-icon bg-light-yellow">
              <i class="fas text-orange fa-4x fa-ban"></i>
            </div>
          </div>
          <div class="col-6">
            <div class="item-content">
              <div class="item-title">Suspended</div>
              <div class="item-number">
                <span 
                  class="counter" 
                  data-num="{{ $statistics->blocked }}"
                >
                  {{ $statistics->blocked }}
                </span> 
              </div> 
            </div>
          </div>
        </div>
      </div>
  </div>
   <div class="col-xl-3 col-sm-6 col-md-4">
      <div class="dashboard-summery-one mg-b-20">
        <div class="row align-items-center">
            <div class="col-6">
                <div class="item-icon bg-light-red">
                    <i class="fas fa-asterisk fa-4x text-red"></i>
                </div>
            </div>
            <div class="col-6">
                <div class="item-content">
                    <div class="item-title">Total</div>
                 <div class="item-number"><span class="counter" data-num="{{ $statistics->total }}">{{ $statistics->total }}</span></div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
   @component('components.modals.alert')
        Alert Component
    @endcomponent
    @component('components.modals.recipes.delete-recipe')
        delete-recipe Component
    @endcomponent
    @component('components.modals.recipes.category.delete-recipe-category')
        delete-recipe Component
    @endcomponent
  @if(session()->has('permission_error'))
    <div 
      class="alert alert-danger"
    >
      {{ session()->get('permission_error') }}
    </div>
  @endif
    <div class="card ui-tab-card">
      <div class="card-body p-0">
        <div class="border-nav-tab">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#recipes" role="tab" aria-selected="true">recipes</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" data-toggle="tab" href="#create-recipes" role="tab" aria-selected="true"> New recipe</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#recipe-categories" role="tab" aria-selected="false">recipe Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#create-categories" role="tab" aria-selected="true"> New Category</a>
            </li>
          </ul>

          <div class="tab-content">
            <div class="tab-pane fade show active" id="recipes" role="tabpanel">
              <div class="row gutters-20">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  @component('components.tables.recipes.recipes',['recipes' => $recipes, 'canDo' => $canDo ])
                    recipes-table Component
                  @endcomponent
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="recipe-categories" role="tabpanel">
              <div class="row gutters-20">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  @component('components.tables.recipes.category.recipe-categories',['recipe_categories' => $recipe_categories ,'canDo' => $canDo,'recipes_category'=> $recipes_category, ])
                    recipe Categories edit form Component
                  @endcomponent
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="create-recipes" role="tabpanel">
              <div class="row gutters-20 m-4">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  @component('components.forms.recipes.create',[ 'licensors'=>$licensors,'recipes_category'=> $recipes_category,'stores'=>$stores,'recipes' => $recipes, 'canDo' => $canDo])
                      recipe Create Form Component
                  @endcomponent
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="create-categories" role="tabpanel">
              <div class="row gutters-20 m-4">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  @component('components.forms.recipes.category.create',[ 'licensors'=>$licensors,'recipes_category'=> $recipes_category,'stores'=>$stores,'recipes' => $recipes, 'canDo' => $canDo])
                      recipe Create Form Component
                  @endcomponent
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

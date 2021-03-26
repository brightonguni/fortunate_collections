@extends('layouts.web.app')
@section('content')
  <div class="container pt-5 mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumbs-area">
          <h3>Recipe Details</h3>
          <ul>
            <li>
                <a href="{{ route('web_recipe.index') }}">Home</a>
            </li>
            <li>Recipes</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="row gutters-20">
    <div class="col-12 col-xl-12 col-12-xxxl">
      @component('web.components.templates.recipes.recipe-details',[
        'service_categories'=>$service_categories,
        'stores'=>$stores,'products'=> $products,'blog_page'=>$blog_page,'recipe_page'=>$recipe_page,
        'recipe' => $recipe,'recipes' => $recipes, 'services' => $services,'recipe_categories'=>$recipe_categories,
        'blogs' =>$blogs, 'events' => $events ])
        recipe-table Component
      @endcomponent
    </div>
  </div>
@endsection


@extends('layouts.web.app')
@section('content')
  <div class="container pt-2 mt-2">
    <div class="row">
      <div class="col-md-12">
        <div class="container pt-5 mt-5">
          <div class="row">
            <div class="col-md-12">
              <div class="breadcrumbs-area">
                <h2>Recipes</h2>
                <ul>
                  <li>
                      <a href="{{ route('web_recipe.index') }}">Home</a>
                  </li>
                  <li>Receips</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12 col-xl-12 col-12-xxxl">
      @component('web.components.templates.recipes.recipe',[
        'service_categories'=>$service_categories,
        'stores'=>$stores,'products'=> $products,'blog_page'=>$blog_page,'recipe_page'=>$recipe_page,
        'recipe_categories'=> $recipe_categories,'recipes' => $recipes , 
        'services' => $services,'blogs' =>$blogs, 
        'events' => $events])
        faqs-table Component
      @endcomponent
    </div>
  </div>
@endsection
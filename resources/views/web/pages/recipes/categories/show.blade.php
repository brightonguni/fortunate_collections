@extends('layouts.web.app')
@section('content')
  <div class="container pt-5 mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumbs-area">
          <h3>recipe Category Details</h3>
          <ul>
            <li>
                <a href="{{ route('web_recipe_category.index') }}">Home</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="row gutters-20">
    <div class="col-12 col-xl-12 col-12-xxxl">
      @component('web.components.templates.recipes.categories.category-details',
      ['stores'=>$stores,
      'products' =>$products,
      'recipeByCategories' =>$recipeByCategories,
      'categories' =>$categories,'service_categories'=>$service_categories,
      'events' => $events,'recipe_category' => $recipe_category,'recipe_page'=>$recipe_page,
      'blogs' => $blogs,'blog_page'=>$blog_page,'recipe_page'=>$recipe_page,
      'services' =>$services,'recipe_page' =>$recipe_page,'recipe_categories'=>$recipe_categories,
      'faqs' =>$faqs, ])
       product category-table Component
      @endcomponent
    </div>
  </div>
@endsection

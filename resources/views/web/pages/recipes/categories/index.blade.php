@extends('layouts.web.app')
@section('content')
  <div class="container pt-5 mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumbs-area">
          <h3>recipe Categories</h3>
          <ul>
            <li>
                <a href="{{ route('web_recipe_category.index') }}">Home</a>
            </li>
            <li>recipe categories</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
 
  <div class="row gutters-20">
    <div class="col-12 col-xl-12 col-12-xxxl">
      @component('web.components.templates.recipes.categories.categories',
      ['products'=>$products,
      'stores'=>$stores,'events'=>$events, 'service_categories'=>$service_categories,
      'blogs'=> $blogs,'blog_page'=>$blog_page,'recipe_page'=>$recipe_page,
      'services' => $services,'recipe_page' =>$recipe_page,
      'racipe_categories' => $recipe_categories])
        product-categories-table Component
      @endcomponent
    </div>
  </div>
@endsection

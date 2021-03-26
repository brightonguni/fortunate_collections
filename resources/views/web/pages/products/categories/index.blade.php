@extends('layouts.web.app')
@section('content')
  <div class="container pt-5 mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumbs-area">
          <h3>Product Categories</h3>
          <ul>
            <li>
                <a href="{{ route('web_product_category.index') }}">Home</a>
            </li>
            <li>Product categories</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
 
  <div class="row gutters-20">
    <div class="col-12 col-xl-12 col-12-xxxl">
      @component('web.components.templates.products.categories.categories',
      ['products'=>$products,
      'stores'=>$stores,'events'=>$events, 
      'blogs'=> $blogs,'blog_page'=>$blog_page,'product_page'=>$product_page,
      'services' => $services,'service_categories'=>$service_categories,
      'categories' => $categories])
        product-categories-table Component
      @endcomponent
    </div>
  </div>
@endsection

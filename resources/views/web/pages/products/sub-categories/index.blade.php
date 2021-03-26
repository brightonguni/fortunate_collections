@extends('layouts.web.app')
@section('content')
  <div class="container pt-5 mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumbs-area">
          <h3>Product Sub Categories</h3>
          <ul>
            <li>
                <a href="{{ route('web_product_sub_category.index') }}">Sub Categories</a>
            </li>
            <li>Product categories</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
 
  <div class="row gutters-20">
    <div class="col-12 col-xl-12 col-12-xxxl">
      @component('web.components.templates.products.sub-categories.sub-categories',
      ['products'=>$products,
      'stores'=>$stores,'events'=>$events, 
      'blogs'=> $blogs,'blog_page'=>$blog_page,'product_page'=>$product_page,
      'services' => $services,'service_categories'=>$service_categories,
      'sub_categories' => $sub_categories])
        product-categories-table Component
      @endcomponent
    </div>
  </div>
@endsection

@extends('layouts.web.app')
@section('content')
 <div class="container pt-5 mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumbs-area">
          <h3>Product Category Details</h3>
          <ul>
            <li>
                <a href="{{ route('web_product_category.index') }}">Home</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
 </div>
 
  <div class="row gutters-20">
    <div class="col-12 col-xl-12 col-12-xxxl">
      @component('web.components.templates.products.categories.category-details',
      ['stores'=>$stores,
      'products' =>$products,
      'productByCategories' =>$productByCategories,
      'categories' =>$categories,'service_categories'=>$service_categories,
      'events' => $events,'category' => $category,
      'blogs' => $blogs,'blog_page'=>$blog_page,'product_page'=>$product_page,
      'services' =>$services,
      'faqs' =>$faqs, ])
       product category-table Component
      @endcomponent
    </div>
  </div>
@endsection

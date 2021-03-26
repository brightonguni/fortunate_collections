@extends('layouts.web.app')
@section('content')
  <div class="container pt-5 mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumbs-area">
          <h2>Products</h2>
          <ul>
            <li>
                <a href="{{ route('web_product.index') }}">Products</a>
            </li>
            <li>Categories</li>
            <li>
                <a href="{{ route('web_product_category.index') }}">View Product Categories</a>
            </li>
            <li>Sub Categories</li>
            <li>
                <a href="{{ route('web_product_sub_category.index') }}">View Product Sub Categories</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="row gutters-20">
    <div class="col-xl-12 col-md-12 col-lg-12 col-12-xxxl">
      @component('web.components.templates.products.products',[
        'service_categories'=>$service_categories,
        'stores'=>$stores,'categories'=>$categories,'sub_categories' => $sub_categories,'latest_products' =>$latest_products,
        'products' => $products,'events'=>$events,'blog_page'=>$blog_page,'product_page'=>$product_page,
        'services' => $services, 'blogs' =>$blogs ])
        products-table Component
      @endcomponent
    </div>
  </div>
@endsection

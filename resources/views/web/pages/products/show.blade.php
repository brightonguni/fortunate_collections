@extends('layouts.web.app')
@section('content')
  <div class="container pt-5 mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumbs-area">
          <h2>Products</h2>
          <ul>
            <li>
                <a href="{{ route('web_product.index') }}">Home</a>
            </li>
            <li>All Products</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Dashboard summery End Here -->
  <!-- Dashboard Content Start Here -->
  <div class="row gutters-20">
    <div class="col-12 col-xl-12 col-12-xxxl">
      @component('web.components.templates.products.product-details',[
        'service_categories'=>$service_categories,'stores'=>$stores,
        'categories'=>$categories,'products'=>$products,'sub_categories' => $sub_categories,
        'productByCategories'=>$productByCategories,'blog_page'=>$blog_page,'product_page'=>$product_page,
        'product'=>$product, 'events'=>$events,'blogs' =>$blogs,'latest_products'=>$latest_products,
        'services' =>$services])
        product-table Component
      @endcomponent
    </div>
  </div>
@endsection

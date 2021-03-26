@extends('layouts.web.app')
@section('content')
  <div class="breadcrumbs-area">
    <h3>Package Categories</h3>
    <ul>
      <li>
          <a href="{{ route('web_package_category.index') }}">Home</a>
      </li>
      <li>Package categories</li>
    </ul>
  </div>
 
  <div class="row gutters-20">
    <div class="col-12 col-xl-12 col-12-xxxl">
      @component('web.components.templates.packages.categories.categories',
      ['products'=>$products,
      'stores'=>$stores,'events'=>$events, 'service_categories'=>$service_categories,
      'blogs'=> $blogs,'blog_page'=>$blog_page,
      'services' => $services,
      'package_categories' => $package_categories])
        product-categories-table Component
      @endcomponent
    </div>
  </div>
@endsection

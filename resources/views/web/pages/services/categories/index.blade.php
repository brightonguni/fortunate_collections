@extends('layouts.web.app')
@section('content')
  <div class="container pt-5 mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumbs-area pb-5 mb-5">
          <h3>Service Categories</h3>
          <ul>
            <li>
                <a href="{{ route('web_service_category.index') }}">Home</a>
            </li>
            <li>Service categories</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
 
  <div class="row gutters-20">
    <div class="col-12 col-xl-12 col-12-xxxl">
      @component('web.components.templates.services.categories.categories',
      [
        'products'=>$products,
        'services'=>$services,
        'stores'=>$stores,'blog_page'=>$blog_page,'service_page'=>$service_page,
        'events'=>$events, 
        'blogs'=> $blogs,
        'service_categories'=>$service_categories,
        'services' => $services,
        'categories' => $categories])
        product-categories-table Component
      @endcomponent
    </div>
  </div>
@endsection

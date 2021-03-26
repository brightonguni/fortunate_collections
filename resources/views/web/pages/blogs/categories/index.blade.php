@extends('layouts.web.app')
@section('content')

  <!-- Breadcubs Area Start Here -->
   <div class="container pt-5 mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumbs-area">
          <h3>Blog Categories</h3>
          <ul>
            <li>
                <a href="{{ route('web_blog_category.index') }}">Home</a>
            </li>
            <li>Blog categories</li>
          </ul>
        </div>
      </div>
    </div>
   </div>
  <div class="row gutters-20">
   
  <!-- Dashboard summery End Here -->
  <!-- Dashboard Content Start Here -->
  <div class="row gutters-20">
    <div class="col-12 col-xl-12 col-12-xxxl">
      @component('web.components.templates.blogs.categories.categories',[
        'service_categories'=>$service_categories,
        'blog_page'=>$blog_page,'stores'=>$stores,'
        products'=> $products,'events'=>$events, 
        'blogs'=>$blogs, 'services' => $services,
        'categories' => $categories])
        blog-categories-table Component
      @endcomponent
    </div>
  </div>
@endsection

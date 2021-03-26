@extends('layouts.web.app')
@section('content')
  <!-- Breadcubs Area Start Here -->
   <div class="container pt-5 mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumbs-area">
          <h3>Blog Category Details</h3>
          <ul>
            <li>
                <a href="{{ route('web_blog_category.index') }}">Home</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
   </div>
   
  <div class="row gutters-20">
    <div class="col-12 col-xl-12 col-12-xxxl">
      @component('web.components.templates.blogs.categories.category-details',[
        'service_categories'=>$service_categories,'blog_page'=>$blog_page,'stores'=>$stores,'products'=> $products,'blogByCategories' =>$blogByCategories,'categories' =>$categories,'events' => $events,'category' => $category,'blogs' => $blogs,'services' =>$services ])
        blog category-table Component
      @endcomponent
    </div>
  </div>
@endsection

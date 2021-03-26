@extends('layouts.web.app')
@section('content')

  <!-- Breadcubs Area Start Here -->
   <div class="container pt-5 mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumbs-area pb-5 mb-5">
          <h3>Blog Articles</h3>
          <ul>
            <li>
                <a href="{{ route('web_blog.index') }}">Back to Articles</a>
            </li>
            <li>Articles</li>
          </ul>
        </div>
      </div>
    </div>
   </div>
    <!-- Breadcubs Area End Here -->
    <!-- Dashboard summary Start Here -->
 <div class="row gutters-20">
    <div class="col-12 col-xl-12 col-12-xxxl">
      @component('web.components.templates.blogs.blogs',[
        'products'=> $products,
        'services'=>$services,
        'blog_page'=>$blog_page,
        'events'=> $events,
        'blogs' => $blogs,
        'faqs' => $faqs,
        'faq_page'=>$faq_page,'faq_categories' =>$faq_categories,
        'service_categories'=>$service_categories,
        'categories' => $categories])
        blog-table Component
      @endcomponent
    </div>
  </div>
@endsection

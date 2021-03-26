@extends('layouts.web.app')
@section('content')
  <div class="breadcrumbs-area pb-5 mb-5">
    <h3>Blog Article Details</h3>
    <ul>
      <li>
          <a href="{{ route('web_blog.index') }}">Home</a>
      </li>
    </ul>
  </div>
  @component('web.components.modals.comments')
    comment Component
  @endcomponent 
  <div class="row gutters-20">
    <div class="col-12 col-xl-12 col-12-xxxl">
      @component('web.components.templates.blogs.blog-details',[
        'products'=> $products,
        'blog_page'=>$blog_page,
        'comments' => $comments,
        'categories' =>$categories,
        'blog' => $blog,
        'events' => $events, 
        'service_categories'=>$service_categories,
        'relatedBlog' =>$relatedBlog,
        'blogs' => $blogs,
        'services' =>$services ])
        blog-table Component
      @endcomponent
    </div>
  </div>
@endsection

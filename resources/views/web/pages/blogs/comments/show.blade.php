@extends('layouts.web.app')
@section('content')
 <div class="container pt-5 mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumbs-area pb-5 mb-5">
          <h3>Comment Details</h3>
          <ul>
            <li>
                <a href="{{ route('web_blog.index') }}">Home</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
 </div>
  @component('web.components.modals.comments',['service_categories'=>$service_categories,'comment' => $comment,'events' => $events, 'relatedBlog' =>$relatedBlog,'blogs' => $blogs,'services' =>$services ])
    comment Component
  @endcomponent 
  <div class="row gutters-20">
    <div class="col-12 col-xl-12 col-12-xxxl">
      @component('web.components.templates.blogs.comments.comment-details',['service_categories'=>$service_categories,'comment' => $comment,'events' => $events, 'relatedBlog' =>$relatedBlog,'blogs' => $blogs,'services' =>$services ])
        blog-table Component
      @endcomponent
    </div>
  </div>
@endsection

@extends('layouts.web.app')
@section('content')
<div class="container pt-5 mt-5">
  <div class="row">
    <div class="col-md-12">
      <div class="breadcrumbs-area">
        <ul>
          <li>
              <a href="{{ route('web_faq.index') }}">Home</a>
          </li>
          <li>FAQs</li>
        </ul>
      </div>
    </div>
   </div>
</div>
  <div class="row m-3">
    <div class="col-12 col-xl-12 col-12-xxxl">
      @component('web.components.templates.FAQ.faqs',[
        'stores'=>$stores,
        'faq_categories' => $faq_categories,
        'faq_categories' => $faq_categories,
        'faqs' => $faqs , 
        'services' => $services,
        'blogs' =>$blogs, 
        'events' => $events,
        'blog_page'=>$blog_page,
        'faq_page'=>$faq_page,
        'products'=>$products])
        faqs-table Component
      @endcomponent
    </div>
  </div>
@endsection
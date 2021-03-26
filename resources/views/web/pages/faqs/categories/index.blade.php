@extends('layouts.web.app')
@section('content')
  <div class="breadcrumbs-area pb-5 mb-5">
    <h3>Frequently Asked Questions Categories</h3>
    <ul>
      <li>FAQs Categories</li>
      <li>
          <a href="{{ route('web_faq_category.index') }}">Home</a>
      </li>
    </ul>
  </div>
  <div class="row gutters-20">
    <div class="col-12 col-xl-12 col-12-xxxl">
      @component('web.components.templates.FAQ.categories.categories',['blog_page'=>$blog_page,'faq_page'=>$faq_page,'stores'=>$stores,'products' =>$products,'events'=>$events, 'blogs', 'services' => $services,'faq_categories' => $faq_categories])
        faq-categories-table Component
      @endcomponent
    </div>
  </div>
@endsection

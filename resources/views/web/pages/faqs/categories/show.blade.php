@extends('layouts.web.app')
@section('content')
  <!-- Breadcubs Area Start Here -->
  <div class="breadcrumbs-area pb-5 mb-5">
    <h3>FAQ Category Details</h3>
    <ul>
      <li>
          <a href="{{ route('web_faq_category.index') }}">Home</a>
      </li>
    </ul>
  </div>
  <div class="row gutters-20">
    <div class="col-12 col-xl-12 col-12-xxxl">
      @component('web.components.templates.FAQ.categories.category-details',['faq_page'=>$faq_page,'blog_page'=>$blog_page,'stores'=>$stores,'products'=>$products,'faqByCategories' =>$faqByCategories,'events' => $events,'faq_categories' => $faq_categories,'faq_category' => $faq_category,'blogs' => $blogs,'services' =>$services ])
        faq category-table Component
      @endcomponent
    </div>
  </div>
@endsection

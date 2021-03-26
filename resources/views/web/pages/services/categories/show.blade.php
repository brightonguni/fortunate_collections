@extends('layouts.web.app')
@section('content')
  <div class="container pt-5 mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumbs-area pb-5 mb-5">
          <h3>Service Category</h3>
          <ul>
            <li>
                <a href="{{ route('web_service_category.index') }}">Home</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="row gutters-20">
    <div class="col-12 col-xl-12 col-12-xxxl">
      @component('web.components.templates.services.categories.category-details',
      [
        'stores'=>$stores,
        'products' =>$products,
        'serviceByCategories' =>$serviceByCategories,
        'categories' =>$categories,'service_categories'=>$service_categories,
        'events' => $events,
        'category' => $category,
        'blogs' => $blogs,'blog_page'=>$blog_page,'service_page'=>$service_page,
        'services' =>$services,'faq_page'=>$faq_page,
        'faqs' =>$faqs, ])
       product category-table Component
      @endcomponent
    </div>
  </div>
@endsection

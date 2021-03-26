@extends('layouts.web.app')
@section('content')
@if(count($aboutUs) > 0)
  <div class="aboutUs">
    <div class="wrapper p-2 m-2">
      @include('web._partials.about.about')
    </div>
  </div>
  @endif
  @if(count($service_categories) > 0)
    <div class="service-categories">
      <div class="wrapper p-2 m-2">
        @include('web._partials.services.service_categories')
      </div>
    </div>
  @endif
  @if(count($packages) > 0)
    <div class="packages">
      <div class="wrapper p-2 m-2">
        @include('web._partials.packages.packages')
      </div>
    </div>
  @endif
  @if(count($services) > 0)
    <div class="services">
      <div class="wrapper p-2 m-2">
        @include('web._partials.services._services')
      </div>
    </div>
  @endif
  @if(count($product_categories) > 0)
    <div class="product-categories p-2 m-2">
      @include('web._partials.products.category.product-categories')
    </div>
  @endif
  
  
  @if(count($latest_products) > 0)
    <div class="latest-products">
      <div class="wrapper p-2 m-2">
        <h2 class="new-arrivals text-center">New Arrivals</h2>
        @include('web.components.templates.products.partials.latest_products')
      </div>
    </div>
  @endif
  @if(count($products) > 0)
    <div class="products p-2 m-2">
      @include('web._partials.products._products')
    </div>
  @endif
  @if(count($faqs) > 0 )
    <div class="faq">
      <div class="wrapper p-2 m-2">
        @include('web._partials.FAQ._faq')
      </div>
    </div>
  @endif
  @if(count($projects) > 0 )
    <div class="projects">
      <div class="wrapper p-2 m-2">
        @include('web._partials.projects.projects')
      </div>
    </div>
  @endif

  {{-- <div class="team pt-4 pb-4">
    <div class="wrapper pt-5 pb-5 ">
     @include('web._partials.team.team')
    </div>
  </div>   --}}
@if(count($blogs) > 0)
  <div class="blog p-2 m-2">
     @include('web._partials.blogs._blog')
  </div>
@endif
@endsection

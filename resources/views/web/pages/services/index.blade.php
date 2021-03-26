@extends('layouts.web.app')
@section('content')
  <!-- Breadcubs Area Start Here -->
  <div class="container pt-5 mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumbs-area">
          <h3>Services</h3>
          <ul>
            <li>
                <a href="{{ route('web_service.index') }}">Home</a>
            </li>
            <li>All services</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="row gutters-20">
    <div class="col-12 col-xl-12 col-12-xxxl">
      @component('web.components.templates.services.services',
      ['stores'=>$stores,
      'products'=> $products,'service_categories'=>$service_categories,
      'events'=>$events,'blog_page'=>$blog_page,'service_page'=>$service_page,
      'services' => $services, 
      'blogs' =>$blogs,
      'faqs' => $faqs ])
        services-table Component
      @endcomponent
    </div>
  </div>
@endsection

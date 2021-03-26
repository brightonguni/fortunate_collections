@extends('layouts.web.app')
@section('content')
  <!-- Breadcubs Area Start Here -->
  <div class="container pt-5 mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumbs-area pb-5 mb-5">
          <h3>Service Information</h3>
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
  <!-- Dashboard summery End Here -->
  <!-- Dashboard Content Start Here -->
  <div class="row gutters-20">
    <div class="col-12 col-xl-12 col-12-xxxl">
      @component('web.components.templates.services.service-details',
      ['stores'=>$stores,
      'products'=> $products,
      'service_events' => $service_events, 
      'events'=>$events,'blog_page'=>$blog_page,'service_page'=>$service_page,
      'service' => $service ,'blogs' =>$blogs,
      'services' =>$services,'service_categories'=>$service_categories,
      'faqs' => $faqs,
      'serviceByCategories' => $serviceByCategories
      ])
        services-table Component
      @endcomponent
    </div>
  </div>
@endsection

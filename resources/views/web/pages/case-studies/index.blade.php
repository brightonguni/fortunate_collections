@extends('layouts.web.app')
@section('content')

  <!-- Breadcubs Area Start Here -->
  <div class="breadcrumbs-area">
    <h3>case studies</h3>
    <ul class="gradient-dodger-blue">
      <li>
          <a href="{{ route('web_case_study.index') }}">Home</a>
      </li>
      <li>case studies</li>
    </ul>
  </div>
  <!-- Breadcubs Area End Here -->
  <!-- Dashboard summery Start Here -->
 <div class="row gutters-20">
    <div class="col-12 col-xl-12 col-12-xxxl">
      @component('web.components.templates.case-studies.case-studies',['service_categories'=>$service_categories,'stores'=>$stores,'products'=> $products, 'events' => $events,'services'=> $services, 'case_categories' => $case_categories, 'case_studies' => $case_studies, 'categories' => $categories])
        case-studies-template Component
      @endcomponent
    </div>
  </div>
@endsection

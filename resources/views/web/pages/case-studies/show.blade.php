@extends('layouts.web.app')
@section('content')
  <!-- Breadcubs Area Start Here -->
  <div class="breadcrumbs-area">
    <h3>Case Study Details</h3>
    <ul class="gradient-dodger-blue">
      <li>
          <a href="{{ route('web_case_study.index') }}">Home</a>
      </li>
      <li>Categories</li>
    </ul>
  </div>
  <!-- Dashboard summery End Here -->
  <!-- Dashboard Content Start Here -->
  <div class="row gutters-20">
    <div class="col-12 col-xl-12 col-12-xxxl">
      @component('web.components.templates.case-studies.case-study-details',['service_categories'=>$service_categories,'stores'=>$stores,'products'=> $products,'case_study' => $case_study, 'categories' => $categories ])
        services-table Component
      @endcomponent
    </div>
  </div>
@endsection

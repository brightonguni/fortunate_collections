@extends('layouts.web.app')
@section('content')
  <!-- Breadcubs Area Start Here -->
  <div class="breadcrumbs-area">
    <h3>Case Studies Categories</h3>
    <ul class="gradient-dodger-blue">
      <li>
          <a href="{{ route('web_case_study_category.index') }}">Home</a>
      </li>
      <li>Categories</li>
    </ul>
  </div>
  <!-- Dashboard summery End Here -->
  <!-- Dashboard Content Start Here -->
  <div class="row gutters-20">
    <div class="col-12 col-xl-12 col-12-xxxl">
      @component('web.components.templates.case-studies.categories.category-details',['service_categories'=>$service_categories,'stores'=>$stores,'products'=> $products,'case_studies' => $case_studies,'events' => $events,'category' => $category,'blogs' => $blogs,'services' =>$services ])
        case-category-table Component
      @endcomponent
    </div>
  </div>
@endsection

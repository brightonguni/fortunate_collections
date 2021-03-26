@extends('layouts.web.app')
@section('content')
  <!-- Breadcubs Area Start Here -->
  <div class="container pt-5 mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumbs-area pb-5 mb-5">
          <ul>
            <li>
                <a href="{{ route('home.index') }}">Home</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Dashboard summery End Here -->
  <!-- Dashboard Content Start Here -->
  <div class="row gutters-20">
    <div class="col-12 col-xl-12 col-12-xxxl">
      @component('web.components.templates.about_us.about_us',['service_page'=>$service_page,'blog_page' =>$blog_page,'service_categories' => $service_categories,'stores'=>$stores,'products'=> $products,'events' =>$events,'aboutUsPage' => $aboutUsPage,'services'=>$services,'blogs'=>$blogs ])
        about-us Component
      @endcomponent
    </div>
  </div>
@endsection

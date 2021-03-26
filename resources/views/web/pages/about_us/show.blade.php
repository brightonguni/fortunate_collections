@extends('layouts.web.app')
@section('content')
  <!-- Breadcubs Area Start Here -->
  <div class="container pt-5 mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumbs-area m-3 pb-5 mb-5">
          <ul>
            <li>
                <a href="{{ route('web_about_us.index') }}">Home</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="row gutters-20">
    <div class="col-12 col-xl-12 col-12-xxxl">
      @component('web.components.templates.about_us.about-details',[
          'aboutUsPage' => $aboutUsPage,
          'events' => $events, 
          'services' => $services,
      'service_page'=>$service_page,'blog_page' =>$blog_page,
          'blogs'=>$blogs,
          'products'=> $products ,
          'stores' =>$stores, 'service_categories'=>$service_categories
          ])
        about-us Page Component
      @endcomponent
    </div>
  </div>
@endsection

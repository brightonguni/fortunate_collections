@extends('layouts.web.app')
@section('content')
  <!-- Breadcubs Area Start Here -->
   <div class="container pt-5 mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumbs-area">
          <h3>Packages</h3>
          <ul>
            <li>
                <a href="{{ route('web_package.index') }}">Home</a>
            </li>
            <li>All Packages</li>
          </ul>
        </div>
      </div>
    </div>
   </div>
   
  <div class="row gutters-20">
    <div class="col-12 col-xl-12 col-12-xxxl">
      @component('web.components.templates.packages.packages',
      [
        'stores'=>$stores,
        'products'=> $products,
        'packages'=> $packages,'package_categories'=>$package_categories,
        'events'=>$events,'service_categories'=>$service_categories,
        'services' => $services, 
        'blogs' =>$blogs,'blog_page'=>$blog_page,'package_page'=>$package_page,
        'faqs' => $faqs ])
        packages-table Component
      @endcomponent
    </div>
  </div>
@endsection

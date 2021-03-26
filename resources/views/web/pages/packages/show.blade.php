@extends('layouts.web.app')
@section('content')
  <!-- Breadcubs Area Start Here -->
   <div class="container pt-5 mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumbs-area">
          <h3>Package Information</h3>
          <ul>
            <li>
                <a href="{{ route('web_project.index') }}">Home</a>
            </li>
            <li>All projects</li>
          </ul>
        </div>
      </div>
    </div>
   </div>
   
  <!-- Dashboard summery End Here -->
  <!-- Dashboard Content Start Here -->
  <div class="row gutters-20">
    <div class="col-12 col-xl-12 col-12-xxxl">
      @component('web.components.templates.packages.package-details',
      [
        'stores'=>$stores,'packageByCategories' => $packageByCategories,
        'products'=> $products, 
        'blog_page'=>$blog_page,'package_page'=>$package_page,
        'services' => $services ,'package_services',
        'blogs' =>$blogs,'package'=> $package,
        'faqs' => $faqs,
      ])
        packages-table Component
      @endcomponent
    </div>
  </div>
@endsection

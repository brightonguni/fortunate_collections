@extends('layouts.web.app')
@section('content')
  <!-- Breadcubs Area Start Here -->
   <div class="container pt-5 mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumbs-area">
          <h3>Contact Us</h3>
          <ul>
            <li>
                <a href="{{ route('web_contact_us.index') }}">Home</a>
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
      @component('web.components.templates.contacts.contacts',
                [
                  'stores'=>$stores,
                  'products'=> $products,'service_categories'=>$service_categories,
                  'case_studies' => $case_studies, 
                  'stores' => $stores,'contact_page'=>$contact_page,
                  'blogs' => $blogs,'blog_page'=>$blog_page,
                  'events' => $events,'blog_page'=>$blog_page,
                  'services' =>$services
                ])
        contact-us Component
      @endcomponent
    </div>
  </div>
@endsection

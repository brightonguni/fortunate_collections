@extends('layouts.web.app')
@section('content')
 <div class="container pt-5 mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumbs-area">
          <h3>Get Information</h3>
          <ul>
            <li>
                <a href="{{ route('web_contact_us.index') }}">Home</a>
            </li>
            <li>Contact Details</li>
          </ul>
        </div>
      </div>
    </div>
 </div>
  <div class="row gutters-20">
    <div class="col-12 col-xl-12 col-12-xxxl">
      @component('web.components.templates.contacts.contact-details',[
        'blog_page'=>$blog_page,'service_categories'=>$service_categories,'store'=>$store,
        'stores'=>$stores,'products'=> $products,'case_studies' => $case_studies, 
        'service' => $service,'blogs' => $blogs,'contact_page'=>$contact_page,
        'events' => $events,'services' =>$services,'contact'=>$contact
         //'contact' => $contact, 
         ])
        contact-page Component
      @endcomponent
    </div>
  </div>
@endsection

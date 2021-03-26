@extends('layouts.web.app')
@section('content')
  <div class="breadcrumbs-area">
    <h2>Our Events</h2>
    <ul class="gradient-dodger-blue">
      <li>
          <a href="{{ route('web_event.index') }}">Home</a>
      </li>
      <li>events</li>
    </ul>
  </div>
 <div class="row gutters-20">
    <div class="col-12 col-xl-12 col-12-xxxl">
      @component('web.components.templates.bookings.events.events',
                ['stores'=>$stores, 
                'products'=> $products,
                'events' => $events,'blog_page'=>$blog_page,
                'services'=> $services,'service_categories'=>$service_categories,
                'blogs'=>$blogs
                ])
        events-template Component
      @endcomponent
    </div>
  </div>
@endsection

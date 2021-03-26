@extends('layouts.web.app')
@section('content')
  <div class="breadcrumbs-area">
    <h3>Events</h3>
    <ul class="gradient-dodger-blue">
      <li>
          <a href="{{ route('web_event_booking.index') }}">Home</a>
      </li>
      <li>All Events</li>
    </ul>
  </div>
 <div class="row gutters-20">
    <div class="col-12 col-xl-12 col-12-xxxl">
      @component('web.components.tables.bookings.events',
        [
          'stores'=>$stores,'blog_page'=>$blog_page,
          'products'=> $products,
          'bookings' => $bookings, 
          'venues' =>$venues,'service_categories'=>$service_categories,
          'events' => $events
        ])
        events-table Component
      @endcomponent
    </div>
  </div>
@endsection

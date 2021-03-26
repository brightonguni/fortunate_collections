@extends('layouts.web.app')
@section('content')
  <div class="breadcrumbs-area">
    <h3>Event Details</h3>
    <ul class="gradient-dodger-blue">
      <li>
          <a href="{{ route('web_event.index') }}">Home</a>
      </li>
      <li>All events</li>
    </ul>
  </div>
  <div class="row gutters-20">
    <div class="col-12 col-xl-12 col-12-xxxl">
      @component('web.components.templates.bookings.events.event-details',
      [
        'stores'=>$stores,'blog_page'=>$blog_page,
        'products'=> $products,
        'event'=> $event ,
        'blogs'=>$blogs, 'service_categories'=>$service_categories,
        'services' => $services,
        'events' => $events
      ])
        event-table Component
      @endcomponent
    </div>
  </div>
@endsection

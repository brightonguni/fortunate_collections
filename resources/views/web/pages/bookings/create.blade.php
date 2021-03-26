@extends('layouts.web.app')
@section('content')
  <!-- Breadcubs Area Start Here -->
  <div class="breadcrumbs-area">
    <h2>New bookings</h2>
    <ul class="gradient-dodger-blue">
      <li>
          <a href="{{route('web_event.index')}}">Home</a>
      </li>
      <li>Create a booking</li>
    </ul>
  </div>
  @component('web.components.modals.alert')
      Alert Component
  @endcomponent
  <div class="row gutters-20">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="card ui-tab-card">
        <div class="tab-content">
          <div class="tab-pane fade show active" id="tab1" role="tabpanel">
            <div class="card-body">
              @component('web.components.forms.booking.create',
                [ 'products'=> $products,
                  'licensors' =>$licensors,
                  'stores' => $stores,
                  'categories' => $categories,
                  'services' => $services, 
                  'venues' => $venues,
                  'events' => $events,
                  'event' => $event,'service_categories'=>$service_categories,
                  'blogs' => $blogs
                ])
                  booking-Create Form Component
              @endcomponent
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

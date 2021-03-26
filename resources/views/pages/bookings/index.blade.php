@extends('layouts.app')
@section('content')

  <!-- Breadcubs Area Start Here -->
  <div class="breadcrumbs-area">
    <h3>Manage Bookings</h3>
    <ul>
      <li>Bookings</li>
      <li>
          <a href="{{ route('booking.index') }}">View Bookings</a>
      </li>
      <li>
          <a href="{{ route('booking.create') }}">Create Booking</a>
      </li>
      <li>Venues</li>
      <li>
          <a href="{{route('booking_venue.index')}}">View Venues</a>
      </li>
      <li>
          <a href="{{route('booking_venue.create')}}">create a Venue</a>
      </li>
      <li>Events</li>
      <li>
          <a href="{{ route('booking_event.index') }}">View Events</a>
      </li>
      <li>
          <a href="{{ route('booking_event.create') }}">Create an Event</a>
      </li>
    </ul>
  </div>
  <div class="row gutters-20">
    <div class="col-md-4">
      <div class="dashboard-summery-one mg-b-20">
        <div class="row align-items-center">
          <div class="col-6">
            <div class="item-icon bg-light-green ">
              <i class="fas fa-snowboarding fa-4x text-green"></i>
            </div>
          </div>
          <div class="col-6">
            <div class="item-content">
              <div class="item-title">Active</div>
                <div class="item-number">
                  <span 
                    class="counter" 
                    data-num="{{ $statistics->active }}"  
                  >
                    {{ $statistics->active }} 
                  </span>  
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="dashboard-summery-one mg-b-20">
        <div class="row align-items-center">
          <div class="col-6">
            <div class="item-icon bg-light-yellow">
              <i class="fas text-orange fa-4x fa-ban"></i>
            </div>
          </div>
          <div class="col-6">
            <div class="item-content">
              <div class="item-title">Suspended</div>
              <div class="item-number">
                <span 
                  class="counter" 
                  data-num="{{ $statistics->blocked }}"  
                >
                  {{ $statistics->blocked }} 
                </span> 
              </div> 
            </div>
          </div>
        </div>
      </div>
  </div>
  <div class="col-md-4">
    <div class="dashboard-summery-one mg-b-20">
      <div class="row align-items-center">
        <div class="col-6">
          <div class="item-icon bg-light-red">
            <i class="fas fa-trash fa-4x text-red"></i>
          </div>
        </div>
        <div class="col-6">
          <div class="item-content">
            <div 
              class="item-title"
            >
              Deleted
            </div>
              <div class="item-number">
                <span 
                  class="counter" 
                  {{--  data-num="{{ ('$statistics->deleted ')}}"  --}}
                >
                {{--  {{ ('$statistics->deleted') }}  --}}
              </span> 
              </div> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  @if(session()->has('permission_error'))
    <div 
      class="alert alert-danger"
    >
      {{ session()->get('permission_error') }}
    </div>
  @endif
  <div class="card ui-tab-card">
      <div class="card-body p-0">
        <div class="border-nav-tab">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#view-bookings" role="tab" aria-selected="true">View Bookings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#create-booking" role="tab" aria-selected="true"> New Booking</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#booking-categories" role="tab" aria-selected="false">Booking Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#create-categories" role="tab" aria-selected="true"> New Category</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#booking-venues" role="tab" aria-selected="false">Venues</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#create-venue" role="tab" aria-selected="true"> New Venue</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#booking-events" role="tab" aria-selected="false">Events</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#create-event" role="tab" aria-selected="true"> New Event</a>
            </li>
          </ul>

          <div class="tab-content">
            <div class="tab-pane fade show active" id="view-bookings" role="tabpanel">
              <div class="row gutters-20">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  @component('components.tables.bookings.bookings',['bookings' => $bookings, 'canDo' => $canDo ,'categories' => $categories,'venues' =>$venues,'events' => $events,'licensors'=>$licensors,'stores'=>$stores,'statistics' => $statistics])
                    bookings-table Component
                  @endcomponent
                </div>
              </div>
            </div>
            <div class="tab-pane fade show" id="create-booking" role="tabpanel">
              <div class="row gutters-20">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  @component('components.forms.bookings.create',[ 'licensors' =>$licensors,'stores' => $stores,'categories' => $categories,'services' => $services, 'venues' => $venues,'events' => $events ])
                    booking-Create Form Component
                  @endcomponent
                </div>
              </div>
            </div>
            <div class="tab-pane fade show" id="booking-categories" role="tabpanel">
              <div class="row gutters-20">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  @component('components.tables.bookings.categories.categories',[ 'canDo' => $canDo ,'statistics' => $statistics,'categories' => $categories])
                    categories-table Component
                  @endcomponent
                </div>
              </div>
            </div>  
            <div class="tab-pane fade show" id="create-categories" role="tabpanel">
              <div class="row gutters-20">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  @component('components.forms.bookings.categories.create',[ 'canDo','statistics' => $statistics, ])
                    Booking-category Create Form Component
                  @endcomponent
                </div>
              </div>
            </div>
            <div class="tab-pane fade show" id="booking-venues" role="tabpanel">
              <div class="row gutters-20">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  @component('components.tables.bookings.venues.venues',[ 'canDo' => $canDo ,'venues' => $venues,'statistics' => $statistics])
                    venues-table Component
                  @endcomponent
                </div>
              </div>
            </div>
            <div class="tab-pane fade show" id="create-venue" role="tabpanel">
              <div class="row gutters-20">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  @component('components.forms.bookings.venues.create',[ 'licensors' => $licensors, 'stores' => $stores])
                    venue Types Create Form Component
                  @endcomponent
                </div>
              </div>
            </div>
            <div class="tab-pane fade show" id="booking-events" role="tabpanel">
              <div class="row gutters-20">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  @component('components.tables.bookings.events.events',[ 'licensors' => $licensors,'stores' => $stores,'statistics' => $statistics,'canDo' => $canDo ,'events' => $events])
                    event-table Component
                  @endcomponent
                </div>
              </div>
            </div>
            <div class="tab-pane fade show" id="create-event" role="tabpanel">
              <div class="row gutters-20">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  @component('components.forms.bookings.events.create',[ 'canDo','licensors' => $licensors,'services'=>$services, 'stores' => $stores,'venues' => $venues ])
                    event-Create Form Component
                  @endcomponent
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

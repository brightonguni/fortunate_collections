@extends('layouts.app')
@section('content')
  <div class="breadcrumbs-area">
    <h3>Categories</h3>
    <ul>
      <li>
        <a href="{{route('booking.category.index')}}">Home</a>
      </li>
      <li>Create Category</li>
    </ul>
  </div>
  <div class="row gutters-20">
    <div class="col-md-12">
      <div class="card ui-tab-card">
        <div class="card-body p-4">
          <a href="javascript:history.back()" class="mt-2 float-right"><i class="fas fa-chevron-circle-left" style="font-size: 25px;"></i></a>
          <h5 class="card-title mt-1">Create Category</h5>
        </div>
      </div>
    </div>
  </div>
  @component('components.modals.alert')
      Alert Component
  @endcomponent
  <div class="row gutters-20">
    <div class="col-md-12">
      <div class="card ui-tab-card">
        <div class="tab-content">
          <div class="tab-pane fade show active" id="tab1" role="tabpanel">
            <div class="card-body">
              @component('components.forms.bookings.categories.create',[ 'canDo' ])
                Booking-category Create Form Component
              @endcomponent
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@extends('layouts.app')
@section('content')
  <!-- Breadcubs Area Start Here -->
  <div class="breadcrumbs-area">
    <h3>booking Summary</h3>
    <ul class="gradient-dodger-blue">
      <li>
        <a href="{{ route('booking.index') }}">Home</a>
      </li>
      <li>booking Details</li>
    </ul>
  </div>
  <!-- Breadcubs Area End Here -->
  <!-- bookings Table Area Start Here -->
  <div class="row gutters-20">
    <div class="col-md-12">
      <div class="card ui-tab-card">
        <div class="card-body p-0">
          <div class="border-nav-tab">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-selected="true">Bookings</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#credit-card" role="tab" aria-selected="false">Events</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#tab5" role="tab" aria-selected="false">Venues</a>
              </li>
              
              @if( in_array('team_update', $canDo) )
                <li class="nav-item">
                  <a class="nav-link" 
                    href="{{ route('booking.edit', ['id' => $booking->id ]) }}"  
                    aria-selected="false"
                  > 
                    Edit
                  </a>
                </li>
              @endif
              </ul>
                </div>
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
                    <div class="heading-layout1">
                      <div class="item-title">
                        <h3>About booking</h3>
                      </div>
                    </div>
                    <div class="single-info-details">
                      <div class="item-img">
                        <img src="{{asset('img/figure/teacher.jpg')}}" alt="teacher">
                      </div>
                      <div class="item-content">
                        <div class="header-inline item-header">
                          <h3 class="text-dark-medium font-medium">{{ $booking->title }}</h3>
                          <div class="header-elements">
                            <ul>
                              @if(isset($storeBelongs) && $storeBelongs && in_array('booking_update', $canDo))
                                <li><a href="{{ $booking->id }}/edit"><i class="far fa-edit"></i></a></li>
                              @endif
                              @if(isset($storeBelongs) && $storeBelongs && in_array('booking_delete', $canDo))
                                <li><a class="dropdown-item" data-target-id="{{$booking->id}}" data-toggle="modal" data-target="#delete"><i class="fas fa-trash-alt"></i></a></li>
                              @endif
                                {{--<li><a href="#"><i class="far fa-edit"></i></a></li>--}}
{{--                                                <li><a href="#"><i class="fas fa-print"></i></a></li>--}}
{{--                                                <li><a href="#"><i class="fas fa-download"></i></a></li>--}}
                            </ul>
                          </div>
                        </div>
                      <div class="info-table table-responsive">
                        <table class="table text-nowrap">
                          <tbody>
                            <tr>
                              <td>ID No:</td>
                              <td class="font-medium text-dark-medium">{{ $booking->id }}</td>
                            </tr>
                            <tr>
                              <td>booking Name:</td>
                              <td class="font-medium text-dark-medium">{{ $booking->title }}</td>
                            </tr>
                            <tr>
                              <td>booking Category:</td>
                              <td class="font-medium text-dark-medium">{{ $booking->category }}</td>
                            </tr>
                            <tr>
                              <td>From Date:</td>
                              <td class="font-medium text-dark-medium">{{ $booking->start_date }}</td>
                            </tr>
                            <tr>
                              <td>To Date:</td>
                              <td class="font-medium text-dark-medium">{{ $booking->end_date }}</td>
                            </tr>
                            <tr>
                              <td>Description:</td>
                              <td class="font-medium text-dark-medium">{{ $booking->description }}</td>
                            </tr>
                            <tr>
                              <td>Date Created:</td>
                              <td class="font-medium text-dark-medium">{{ $booking->created_at->format('d F Y H:i') }}</td>
                            </tr>
                            <tr>
                              <td>Status:</td>
                              <td class="font-medium text-dark-medium">{{ ($booking->active)? 'Active' : 'Suspended'}}</td>
                            </tr>
                            @if($booking->hasLicensor())
                              <tr>
                                  <td>Licensor:</td>
                                  <td class="font-medium text-dark-medium">{{ $booking->licensor->name}}</td>
                              </tr>
                            @endif
                            @if($booking->hasStore())
                              <tr>
                                  <td>Store:</td>
                                  <td class="font-medium text-dark-medium">{{ $booking->store->name}}</td>
                              </tr>
                            @endif
                            @if($booking->hasProject())
                              <tr>
                                  <td>Project:</td>
                                  <td class="font-medium text-dark-medium">{{ $booking->project->name}}</td>
                              </tr>
                            @endif
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="credit-card" role="tabpanel">
                </div>
              </div>
            </div>
          </div>
        </div>
      <script>
@endsection

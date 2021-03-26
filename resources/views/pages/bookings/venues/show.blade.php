@extends('layouts.app')
@section('content')
  <!-- Breadcubs Area Start Here -->
  <div class="breadcrumbs-area">
    <h3>venue Summary</h3>
    <ul>
      <li>
        <a href="{{ route('booking_venue.index') }}">Home</a>
      </li>
      <li>venue Details</li>
    </ul>
  </div>
  <!-- Breadcubs Area End Here -->
  <!-- venues Table Area Start Here -->
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
                  <a class="nav-link" data-toggle="tab" href="#credit-card" role="tab" aria-selected="false">venues</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#tab5" role="tab" aria-selected="false">Events</a>
              </li>
              
              @if( in_array('booking_venue_update', $canDo) )
                <li class="nav-item">
                  <a class="nav-link" 
                    href="{{ route('booking_venue.edit', ['id' => $venue->id ]) }}"  
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
                        <h3>About venue</h3>
                      </div>
                    </div>
                    <div class="single-info-details">
                      <div class="item-img">
                        <img src="{{URL::asset('assets/images/Bookings/venue'.$venue->avatar)}}" alt="no image">
                      </div>
                      <div class="item-content">
                        <div class="header-inline item-header">
                          <h3 class="text-dark-medium font-medium">{{ $venue->title }}</h3>
                          <div class="header-elements">
                            <ul>
                              @if(isset($storeBelongs) && $storeBelongs && in_array('venue_update', $canDo))
                                <li><a href="{{ $venue->id }}/edit"><i class="far fa-edit"></i></a></li>
                              @endif
                              @if(isset($storeBelongs) && $storeBelongs && in_array('team_delete', $canDo))
                                <li><a class="dropdown-item" data-target-id="{{$venue->id}}" data-toggle="modal" data-target="#delete"><i class="fas fa-trash-alt"></i></a></li>
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
                              <td class="font-medium text-dark-medium">{{ $venue->id }}</td>
                            </tr>
                            <tr>
                              <td>venue Name:</td>
                              <td class="font-medium text-dark-medium">{{ $venue->title }}</td>
                            </tr>
                            <tr>
                              <td>venue Street:</td>
                              <td class="font-medium text-dark-medium">{{ $venue->street }}</td>
                            </tr>
                            <tr>
                              <td>Suburb:</td>
                              <td class="font-medium text-dark-medium">{{ $venue->suburb }}</td>
                            </tr>
                            <tr>
                              <td>Postal Code:</td>
                              <td class="font-medium text-dark-medium">{{ $venue->postal_code }}</td>
                            </tr>
                            <tr>
                              <td>City:</td>
                              <td class="font-medium text-dark-medium">{{ $venue->city }}</td>
                            </tr>
                            <tr>
                              <td>State / Province:</td>
                              <td class="font-medium text-dark-medium">{{ $venue->state_province }}</td>
                            </tr>
                            <tr>
                              <td>Country:</td>
                              <td class="font-medium text-dark-medium">{{ $venue->country }}</td>
                            </tr>
                            <tr>
                              <td>Date Created:</td>
                              <td class="font-medium text-dark-medium">{{ $venue->created_at->format('d F Y H:i') }}</td>
                            </tr>
                            <tr>
                              <td>Status:</td>
                              <td class="font-medium text-dark-medium">{{ ($venue->active)? 'Active' : 'Suspended'}}</td>
                            </tr>
                            {{-- @if($team->hasLicensor())
                              <tr>
                                  <td>Licensor:</td>
                                  <td class="font-medium text-dark-medium">{{ $venue->licensor->name}}</td>
                              </tr>
                            @endif
                            @if($team->hasStore())
                              <tr>
                                  <td>Store:</td>
                                  <td class="font-medium text-dark-medium">{{ $venue->store->name}}</td>
                              </tr>
                            @endif
                            @if($venue->hasProject())
                              <tr>
                                  <td>Project:</td>
                                  <td class="font-medium text-dark-medium">{{ $team->project->name}}</td>
                              </tr>
                            @endif --}}
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

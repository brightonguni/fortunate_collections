@extends('layouts.app')
@section('content')
  <!-- Breadcubs Area Start Here -->
  <div class="breadcrumbs-area">
    <h3>Store Address Details</h3>
    <ul>
      <li>
        <a href="{{ route('store_address.index') }}">Home</a>
      </li>
      <li>address Details</li>
    </ul>
  </div>
  <!-- Breadcubs Area End Here -->
  <!-- addresss Table Area Start Here -->
  <div class="row gutters-20">
    <div class="col-md-12">
      <div class="card ui-tab-card">
        <div class="card-body p-0">
          <div class="border-nav-tab">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-selected="true">addresses</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#credit-card" role="tab" aria-selected="false">addresss</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#tab5" role="tab" aria-selected="false">Events</a>
              </li>
              
              @if( in_array('store_address_update', $canDo) )
                <li class="nav-item">
                  <a class="nav-link" 
                    href="{{ route('store_address.edit', ['id' => $address->id ]) }}"  
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
                        <h3>Store Address Details</h3>
                      </div>
                    </div>
                    <div class="single-info-details">
                      <div class="item-content">
                        <div class="header-inline item-header">
                          <div class="header-elements">
                            <ul>
                              @if(isset($storeBelongs) && $storeBelongs && in_array('store_address_update', $canDo))
                                <li><a href="{{ $address->id }}/edit"><i class="far fa-edit"></i></a></li>
                              @endif
                              @if(isset($storeBelongs) && $storeBelongs && in_array('store_address_delete', $canDo))
                                <li><a class="dropdown-item" data-target-id="{{$address->id}}" data-toggle="modal" data-target="#delete"><i class="fas fa-trash-alt"></i></a></li>
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
                              <td class="font-medium text-dark-medium">{{ $address->id }}</td>
                            </tr>
                            <tr>
                                <td>Store:</td>
                                <td class="font-medium text-dark-medium">{{ $address->store->name}}</td>
                            </tr>
                            <tr>
                              <td>address Street:</td>
                              <td class="font-medium text-dark-medium">{{ $address->street }}</td>
                            </tr>
                            <tr>
                              <td>Suburb:</td>
                              <td class="font-medium text-dark-medium">{{ $address->suburb }}</td>
                            </tr>
                            <tr>
                              <td>Postal Code:</td>
                              <td class="font-medium text-dark-medium">{{ $address->postal_code }}</td>
                            </tr>
                            <tr>
                              <td>City:</td>
                              <td class="font-medium text-dark-medium">{{ $address->city }}</td>
                            </tr>
                            <tr>
                              <td>State / Province:</td>
                              <td class="font-medium text-dark-medium">{{ $address->state_province }}</td>
                            </tr>
                            <tr>
                              <td>Country:</td>
                              <td class="font-medium text-dark-medium">{{ $address->country }}</td>
                            </tr>
                            <tr>
                              <td>Date Created:</td>
                              <td class="font-medium text-dark-medium">{{ $address->created_at->format('d F Y H:i') }}</td>
                            </tr>
                            <tr>
                              <td>Status:</td>
                              <td class="font-medium text-dark-medium">{{ ($address->active)? 'Active' : 'Suspended'}}</td>
                            </tr>
                            <tr>
                                <td>Licensor:</td>
                                <td class="font-medium text-dark-medium">{{ $address->licensor->name}}</td>
                            </tr>
                            <tr>
                              <td><strong>Summary</strong></td>
                              <td>{{ $address->description }}</td>
                            </tr>
                            
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
@endsection

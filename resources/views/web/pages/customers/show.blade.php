@extends('layouts.app')
@section('content')
  <!-- Breadcubs Area Start Here -->
  <div class="breadcrumbs-area">
    <h3>User</h3>
    <ul class="gradient-dodger-blue">
      <li>
        <a href="{{ route('users.index') }}">Home</a>
      </li>
      <li>Customer Details</li>
    </ul>
  </div>
  <!-- Breadcubs Area End Here -->
  <!-- User Table Area Start Here -->
  <div class="row gutters-20">
    <div class="col-md-12">
      <div class="card ui-tab-card">
        <div class="card-body p-0">
          <div class="border-nav-tab">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-selected="true">Profile</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#credit-card" role="tab" aria-selected="false">Skills</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#tab5" role="tab" aria-selected="false">My Projects</a>
              </li>
              @if( in_array('transaction_list', $canDo) )
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#orders" role="tab" aria-selected="false">My Teams</a>
                </li>
              @endif
              @if( in_array('customer_update', $canDo) )
                <li class="nav-item">
                  <a class="nav-link" 
                    href="{{ route('users.edit', ['id' => $customer->id ]) }}"  
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
                        <h3>About Me</h3>
                      </div>
                    </div>
                    <div class="single-info-details">
                      <div class="item-img">
                        <img src="{{asset('img/figure/teacher.jpg')}}" alt="teacher">
                      </div>
                      <div class="item-content">
                        <div class="header-inline item-header">
                          <h3 class="text-dark-medium font-medium">{{ $customer->name }}</h3>
                          <div class="header-elements">
                            <ul>
                              @if(isset($storeBelongs) && $storeBelongs && in_array('customer_update', $canDo))
                                <li><a href="{{ $customer->id }}/edit"><i class="far fa-edit"></i></a></li>
                              @endif
                              @if(isset($storeBelongs) && $storeBelongs && in_array('customer_delete', $canDo))
                                <li><a class="dropdown-item" data-target-id="{{$customer->id}}" data-toggle="modal" data-target="#delete"><i class="fas fa-trash-alt"></i></a></li>
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
                              <td class="font-medium text-dark-medium">{{ $customer->id }}</td>
                            </tr>
                            <tr>
                              <td>First Name:</td>
                              <td class="font-medium text-dark-medium">{{ $customer->first_name }}</td>
                            </tr>
                            <tr>
                              <td>Last Name:</td>
                              <td class="font-medium text-dark-medium">{{ $customer->last_name }}</td>
                            </tr>
                            <tr>
                              <td>Phone:</td>
                              <td class="font-medium text-dark-medium">{{ $customer->phone }}</td>
                            </tr>
                            <tr>
                              <td>Joining Date:</td>
                              <td class="font-medium text-dark-medium">{{ $customer->created_at->format('d F Y H:i') }}</td>
                            </tr>
                            <tr>
                              <td>E-mail:</td>
                              <td class="font-medium text-dark-medium">{{ $customer->email }}</td>
                            </tr>
                            <tr>
                              <td>Status:</td>
                              <td class="font-medium text-dark-medium">{{ ($customer->active)? 'Active' : 'Suspended'}}</td>
                            </tr>
                            @if($customer->hasLicensor())
                              <tr>
                                  <td>Licensor:</td>
                                  <td class="font-medium text-dark-medium">{{ $customer->licensor->name}}</td>
                              </tr>
                            @endif
                            <tr>
                              <td>Role:</td>
                              <td class="font-medium text-dark-medium">{{ $customer->role()->name }}</td>
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
      <script>
@endsection

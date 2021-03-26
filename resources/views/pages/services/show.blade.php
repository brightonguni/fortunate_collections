@extends('layouts.app')
@section('content')
  <!-- Breadcubs Area Start Here -->
  <div class="breadcrumbs-area">
    <h3>Service</h3>
    <ul>
      <li>
        <a href="{{ route('service.index') }}">Home</a>
      </li>
      <li>Service Details</li>
    </ul>
  </div>
  <!-- Breadcubs Area End Here -->
  <!-- User Table Area Start Here -->
  <div class="row gutters-20">
    <div class="col-md-12">
      <div class="card ui-tab-card">
        <div class="card-body p-0">
          <div class="border-nav-tab">
              @if( in_array('service_update', $canDo) )
                <li class="nav-item">
                  <a class="nav-link" 
                    href="{{ route('service.edit', ['id' => $service->id ]) }}"  
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
                        <h3>About Service</h3>
                      </div>
                    </div>
                    <div class="single-info-details">
                      <div class="item-img">
                        <div class="card-image-small" style="background-image: url('{{ asset('assets/images/services/'.$service->avatar)}}');"></div> 
                        <img style="" 
                            src="{{asset('assets/images/services/'.$service->avatar)}}" 
                            alt="no service image" 
                      </div>
                      <div class="item-content">
                        <div class="header-inline item-header">
                          <h3 class="text-dark-medium font-medium">{{ $service->title }}</h3>
                          <div class="header-elements">
                            <ul>
                              {{-- @if(isset($storeBelongs) && $storeBelongs && in_array('service_update', $canDo)) --}}
                                <li><a href="{{ $service->id }}/edit"><i class="far fa-edit"></i></a></li>
                              {{-- @endif --}}
                              {{-- @if(isset($storeBelongs) && $storeBelongs && in_array('service_delete', $canDo)) --}}
                                <li><a class="dropdown-item" data-target-id="{{$service->id}}" data-toggle="modal" data-target="#delete"><i class="fas fa-trash-alt"></i></a></li>
                              {{-- @endif --}}
                            </ul>
                          </div>
                        </div>
                      <div class="info-table table-responsive">
                        <table class="table text-nowrap">
                          <tbody>
                            <tr>
                              <td>ID No:</td>
                              <td class="font-medium text-dark-medium">{{ $service->id }}</td>
                            </tr>
                            <tr>
                              <td>Service Title :</td>
                              <td class="font-medium text-dark-medium">{{ $service->title }}</td>
                            </tr>
                            <tr>
                              <td>Description:</td>
                              <td class="font-medium text-dark-medium">{{ $service->description }}</td>
                            </tr>
                            
                            <tr>
                              <td>Date Created:</td>
                              <td class="font-medium text-dark-medium">{{ $service->created_at->format('d F Y H:i') }}</td>
                            </tr>
                           
                            <tr>
                              <td>Status:</td>
                              <td class="font-medium text-dark-medium">{{ ($service->active)? 'Active' : 'Suspended'}}</td>
                            </tr>
                            {{-- @if($service->hasLicensor())
                              <tr>
                                  <td>Licensor:</td>
                                  <td class="font-medium text-dark-medium">{{ $service->licensor->name}}</td>
                              </tr>
                            @endif
                            @if($service->hasStore())
                              <tr>
                                  <td>Store:</td>
                                  <td class="font-medium text-dark-medium">{{ $service->store->name}}</td>
                              </tr>
                            @endif
                            @if($team->hasProject())
                              <tr>
                                  <td>Project:</td>
                                  <td class="font-medium text-dark-medium">{{ $tservice->project->name}}</td>
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
@endsection

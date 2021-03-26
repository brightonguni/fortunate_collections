@extends('layouts.app')
@section('content')
  <!-- Breadcubs Area Start Here -->
  <div class="breadcrumbs-area">
    <h3>Manage Services</h3>
    <ul>
      <li>Services</li>
      <li>
          <a href="{{ route('service.index') }}">View Services</a>
      </li>
      <li>
          <a href="{{ route('service.create') }}">Create service</a>
      </li>
      <li>Categories</li>
      <li>
          <a href="{{ route('service_category.index') }}">Categories</a>
      </li>
      <li>
          <a href="{{ route('service_category.create') }}">Create category</a>
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
   <div class="col-xl-3 col-sm-6 col-md-4">
      <div class="dashboard-summery-one mg-b-20">
        <div class="row align-items-center">
            <div class="col-6">
                <div class="item-icon bg-light-red">
                    <i class="fas fa-asterisk fa-4x text-red"></i>
                </div>
            </div>
            <div class="col-6">
                <div class="item-content">
                    <div class="item-title">Total</div>
                 <div class="item-number"><span class="counter" data-num="{{ $statistics->total }}">{{ $statistics->total }}</span></div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
   @component('components.modals.alert')
        Alert Component
    @endcomponent
    @component('components.modals.services.delete-service')
        delete-service Component
    @endcomponent
    @component('components.modals.services.category.delete-service-category')
        delete-service Component
    @endcomponent
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
                <a class="nav-link active" data-toggle="tab" href="#services" role="tab" aria-selected="true">Services</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" data-toggle="tab" href="#create-services" role="tab" aria-selected="true"> New Service</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#service-categories" role="tab" aria-selected="false">Service Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#create-categories" role="tab" aria-selected="true"> New Category</a>
            </li>
          </ul>

          <div class="tab-content">
            <div class="tab-pane fade show active" id="services" role="tabpanel">
              <div class="row gutters-20">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  @component('components.tables.services.services',['services' => $services, 'canDo' => $canDo ])
                    services-table Component
                  @endcomponent
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="service-categories" role="tabpanel">
              <div class="row gutters-20">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  @component('components.tables.services.category.service-categories',['service_categories' => $service_categories ,'canDo' => $canDo ])
                    Service Categories edit form Component
                  @endcomponent
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="create-services" role="tabpanel">
              <div class="row gutters-20 m-4">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  @component('components.forms.services.create',[ 'licensors'=>$licensors,'categories'=> $categories,'stores'=>$stores,'services' => $services, 'canDo' => $canDo])
                      Service Create Form Component
                  @endcomponent
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="create-categories" role="tabpanel">
              <div class="row gutters-20 m-4">
                <div class="col-12 col-xl-12 col-12-xxxl col-sm-12 col-md-12 col-lg-12">
                  @component('components.forms.services.category.create',[ 'licensors'=>$licensors,'categories'=> $categories,'stores'=>$stores,'services' => $services, 'canDo' => $canDo])
                      Service Create Form Component
                  @endcomponent
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

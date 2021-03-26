@extends('layouts.app')
@section('content')
  <div class="breadcrumbs-area">
    <h3>Manage Packages</h3>
    <ul>
       <li>Packages</li>
      <li>
          <a href="{{ route('package.index') }}">* Packages</a>
      </li>
      <li>
          <a href="{{ route('package.create') }}">Create package</a>
      </li>
      <li>Package Categories</li>
      <li>
          <a href="{{ route('package_category.index') }}">* Categories</a>
      </li>
      <li>
          <a href="{{ route('package_category.create') }}">Create Category</a>
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
                <span class="counter" data-num="{{ $statistics->blocked }}">
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
                  data-num="{{ $statistics->total }}"
                >
                {{ $statistics->total }}
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
  <div class="row gutters-20">
    <div class="col-md-12">
      <div class="card ui-tab-card">
        <div class="card-body p-0">
          <div class="border-nav-tab">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#packages" role="tab" aria-selected="true">packages</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#tab5" role="tab" aria-selected="false">New package</a>
              </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
  </div>
  <div class="row gutters-20">
    <div class="col-12 col-xl-12 col-12-xxxl">
      @component('components.tables.packages.packages',['storeBelongs' => $storeBelongs,'statistics' => $statistics, 'packages' => $packages, 'stores' => $stores,'services'=>$services,'package_categories'=>$package_categories, 'licensors' => $licensors, 'canDo' => $canDo])
        teams-table Component
      @endcomponent
    </div>
  </div>
@endsection

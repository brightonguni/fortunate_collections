@extends('layouts.app')
@section('content')
  <!-- Breadcubs Area Start Here -->
  <div class="breadcrumbs-area">
    <h3>Package Categories</h3>
    <ul>
      <li>
          <a href="{{ route('package_category.index') }}">Home</a>
      </li>
      <li>
          <a href="{{ route('package_category.create') }}">Create Package Category</a>
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
  @if(session()->has('permission_error'))
    <div 
      class="alert alert-danger"
    >
      {{ session()->get('permission_error') }}
    </div>
  @endif
  <div class="row gutters-20">
    <div class="col-12 col-xl-12 col-12-xxxl">
      @component('components.tables.packages.category.categories',['package_categories' => $package_categories, 'canDo' => $canDo ])
        package-categories-table Component
      @endcomponent
    </div>
  </div>
@endsection
